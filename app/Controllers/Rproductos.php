<?php

namespace App\Controllers;

use App\Models\Productos_model;
use CodeIgniter\Controller;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rproductos extends Controller
{

    public function reporte()
    {
        $productosModel = new Productos_model();
        $data['productos'] = $productosModel->findAll();

        echo view('plantillas/header');
        echo view('paginas/reporte_productos', $data);
        echo view('plantillas/footer');
    }

    public function generarPdf()
    {
        $productosModel = new Productos_model();
        $productos = $productosModel->findAll();

        $pdf = new TCPDF();
        $pdf->AddPage();

        $html = '<h1>Reporte de Productos</h1>';
        $html .= '<table border="1" cellpadding="3">';
        $html .= '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';
        foreach ($productos as $producto) {
            $html .= '<tr>
                        <td>' . $producto['idproductos'] . '</td>
                        <td>' . $producto['nombre'] . '</td>
                        <td>' . $producto['precio'] . '</td>
                        <td>' . $producto['stock'] . '</td>
                        <td><img src="' . base_url('uploads/' . $producto['imagen']) . '" width="50" height="50"></td>
                      </tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';

        $pdf->writeHTML($html);
        $pdf->Output('reporte_productos.pdf', 'D');
    }

    public function generarExcel()
{
    $productosModel = new Productos_model();
    $productos = $productosModel->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nombre');
    $sheet->setCellValue('C1', 'Precio');
    $sheet->setCellValue('D1', 'Stock');
    $sheet->setCellValue('E1', 'Imagen');

    $row = 2;
    foreach ($productos as $producto) {
            $sheet->setCellValue('A' . $row, $producto['idproductos']);
            $sheet->setCellValue('B' . $row, $producto['nombre']);
            $sheet->setCellValue('C' . $row, $producto['precio']);
            $sheet->setCellValue('D' . $row, $producto['stock']);

            $sheet->getColumnDimension('A')->setWidth(10); 
            $sheet->getColumnDimension('B')->setWidth(25); 
            $sheet->getColumnDimension('C')->setWidth(10); 
            $sheet->getColumnDimension('D')->setWidth(10); 

            $sheet->getRowDimension($row)->setRowHeight(40);
            
            $sheet->getStyle('A' . $row . ':D' . $row)->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);
            // Agregar imagen
            $imagenPath = FCPATH . 'uploads/' . $producto['imagen'];
            if (file_exists($imagenPath)) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Producto Imagen');
                $drawing->setDescription('Imagen de ' . $producto['nombre']);
                $drawing->setPath($imagenPath);
                $drawing->setHeight(50);
                $drawing->setCoordinates('E' . $row);
                $drawing->setWorksheet($sheet);
            }
            $sheet->getStyle('E' . $row)->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'reporte_productos.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
}

}
