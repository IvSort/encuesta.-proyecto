<?php

namespace App\Controllers;

use App\Models\Clientes_model;
use CodeIgniter\Controller;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rclientes extends Controller
{
    public function reporte()
    {
        $clientesModel = new Clientes_model();
        $data['clientes'] = $clientesModel->findAll();

        echo view('plantillas/header');
        echo view('paginas/reporte_clientes', $data);
        echo view('plantillas/footer');
    }

    public function generarPdf()
    {
        $clientesModel = new Clientes_model();
        $clientes = $clientesModel->findAll();

        $pdf = new TCPDF();
        $pdf->AddPage();

        $html = '<h1>Reporte de Clientes</h1>';
        $html .= '<table border="1" cellpadding="3">';
        $html .= '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RUC</th>
                        <th>Dirección</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';
        foreach ($clientes as $cliente) {
            $html .= '<tr>
                        <td>' . $cliente['idcliente'] . '</td>
                        <td>' . $cliente['nombre'] . '</td>
                        <td>' . $cliente['ruc'] . '</td>
                        <td>' . $cliente['direccion'] . '</td>
                      </tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';

        $pdf->writeHTML($html);
        $pdf->Output('reporte_clientes.pdf', 'D');
    }

    public function generarExcel()
    {
        $clientesModel = new Clientes_model();
        $clientes = $clientesModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'RUC');
        $sheet->setCellValue('D1', 'Dirección');

        $sheet->getColumnDimension('A')->setWidth(10); 
        $sheet->getColumnDimension('B')->setWidth(25); 
        $sheet->getColumnDimension('C')->setWidth(20); 
        $sheet->getColumnDimension('D')->setWidth(30); 
        $row = 2;
        foreach ($clientes as $cliente) {
            $sheet->setCellValue('A' . $row, $cliente['idcliente']);
            $sheet->setCellValue('B' . $row, $cliente['nombre']);
            $sheet->setCellValue('C' . $row, $cliente['ruc']);
            $sheet->setCellValue('D' . $row, $cliente['direccion']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reporte_clientes.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
