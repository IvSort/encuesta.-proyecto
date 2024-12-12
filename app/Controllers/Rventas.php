<?php

namespace App\Controllers;

use App\Models\Ventas_model;
use App\Models\Clientes_model;
use CodeIgniter\Controller;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rventas extends Controller
{
    public function reporte()
    {
        $ventasModel = new Ventas_model();
        $clientesModel = new Clientes_model();

        $ventas = $ventasModel->findAll();

        foreach ($ventas as &$venta) {
            // Obtener el nombre del cliente
            $cliente = $clientesModel->find($venta['nombreCliente']);
            $venta['nombreCliente'] = $cliente['nombre'];
        }

        $data['ventas'] = $ventas;

        echo view('plantillas/header');
        echo view('paginas/reporte_ventas', $data);
        echo view('plantillas/footer');
    }

    public function generarPdf()
    {
        $ventasModel = new Ventas_model();
        $clientesModel = new Clientes_model();

        $ventas = $ventasModel->findAll();

        foreach ($ventas as &$venta) {
            $cliente = $clientesModel->find($venta['nombreCliente']);
            $venta['nombreCliente'] = $cliente['nombre'];
        }

        $pdf = new TCPDF();
        $pdf->AddPage();

        $html = '<h1>Reporte de Ventas</h1>';
        $html .= '<table border="1" cellpadding="3">';
        $html .= '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Cliente</th>
                        <th>RUC</th>
                        <th>Fecha</th>
                        <th>Dirección</th>
                        <th>Total</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';
        foreach ($ventas as $venta) {
            $html .= '<tr>
                        <td>' . $venta['id'] . '</td>
                        <td>' . $venta['nombreCliente'] . '</td>
                        <td>' . $venta['ruc'] . '</td>
                        <td>' . $venta['fecha'] . '</td>
                        <td>' . $venta['direccion'] . '</td>
                        <td>' . $venta['total'] . '</td>
                      </tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';

        $pdf->writeHTML($html);
        $pdf->Output('reporte_ventas.pdf', 'D');
    }

    public function generarExcel()
    {
        $ventasModel = new Ventas_model();
        $clientesModel = new Clientes_model();

        $ventas = $ventasModel->findAll();

        foreach ($ventas as &$venta) {
            $cliente = $clientesModel->find($venta['nombreCliente']);
            $venta['nombreCliente'] = $cliente['nombre'];
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre del Cliente');
        $sheet->setCellValue('C1', 'RUC');
        $sheet->setCellValue('D1', 'Fecha');
        $sheet->setCellValue('E1', 'Dirección');
        $sheet->setCellValue('F1', 'Total');

        $row = 2;
        foreach ($ventas as $venta) {
            $sheet->setCellValue('A' . $row, $venta['id']);
            $sheet->setCellValue('B' . $row, $venta['nombreCliente']);
            $sheet->setCellValue('C' . $row, $venta['ruc']);
            $sheet->setCellValue('D' . $row, $venta['fecha']);
            $sheet->setCellValue('E' . $row, $venta['direccion']);
            $sheet->setCellValue('F' . $row, $venta['total']);
            
            $sheet->getColumnDimension('A')->setWidth(10); 
            $sheet->getColumnDimension('B')->setWidth(25); 
            $sheet->getColumnDimension('C')->setWidth(20); 
            $sheet->getColumnDimension('D')->setWidth(20);  
            $sheet->getColumnDimension('E')->setWidth(25);
            $sheet->getColumnDimension('F')->setWidth(10); 

            
            $sheet->getStyle('A' . $row . ':F' . $row)->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reporte_ventas.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
