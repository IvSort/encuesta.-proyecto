<?php

namespace App\Controllers;

use App\Models\Historial_model;
use CodeIgniter\Controller;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rhistorial extends Controller
{
    public function index()
    {
        $model = new Historial_model();
        $db = \Config\Database::connect();
        $builder = $db->table('historial');
        $builder->select('historial.idhistorial, cliente.nombre as cliente_nombre, productos.nombre as producto_nombre, historial.precio, historial.cantidad, historial.importe');
        $builder->join('cliente', 'cliente.idcliente = historial.idcliente');
        $builder->join('productos', 'productos.idproductos = historial.idproductos');
        $query = $builder->get();
        $data['historial'] = $query->getResultArray();
        echo view('plantillas/header');
        echo view('paginas/rhistorial', $data);
        echo view('plantillas/footer');
    }

    public function exportPdf()
{
    $db = \Config\Database::connect();
    $builder = $db->table('historial');
    $builder->select('historial.idhistorial, cliente.nombre as cliente_nombre, productos.nombre as producto_nombre, historial.precio, historial.cantidad, historial.importe');
    $builder->join('cliente', 'cliente.idcliente = historial.idcliente');
    $builder->join('productos', 'productos.idproductos = historial.idproductos');
    $builder->orderBy('historial.idhistorial', 'ASC'); // Ordenar por ID Historial
    $query = $builder->get();
    $historial = $query->getResultArray();

    // Crear nueva instancia de TCPDF
    $pdf = new TCPDF();

    // Configurar la información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Reporte de Historial');
    $pdf->SetSubject('Reporte de Historial de Ventas');
    $pdf->SetKeywords('TCPDF, PDF, report, ventas, historial');

    // Añadir una página
    $pdf->AddPage();

    // Establecer fuente
    $pdf->SetFont('helvetica', '', 12);

    // Título del documento
    $html = '<h1>Reporte de Historial</h1>';
    $html .= '<table border="1" cellpadding="3">';
    $html .= '<thead>
                <tr>
                    <th>ID Historial</th>
                    <th>Nombre del Cliente</th>
                    <th>Nombre del Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                </tr>
              </thead>';
    $html .= '<tbody>';
    foreach ($historial as $item) {
        $html .= '<tr>
                    <td>' . $item['idhistorial'] . '</td>
                    <td>' . $item['cliente_nombre'] . '</td>
                    <td>' . $item['producto_nombre'] . '</td>
                    <td>' . $item['precio'] . '</td>
                    <td>' . $item['cantidad'] . '</td>
                    <td>' . $item['importe'] . '</td>
                  </tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';

    // Escribir el contenido HTML en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Salida del PDF
    $pdf->Output('reporte_historial.pdf', 'D');
}


    public function exportExcel()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('historial');
        $builder->select('historial.idhistorial, cliente.nombre as cliente_nombre, productos.nombre as producto_nombre, historial.precio, historial.cantidad, historial.importe');
        $builder->join('cliente', 'cliente.idcliente = historial.idcliente');
        $builder->join('productos', 'productos.idproductos = historial.idproductos');
        $query = $builder->get();
        $data = $query->getResultArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID Historial');
        $sheet->setCellValue('B1', 'Nombre del Cliente');
        $sheet->setCellValue('C1', 'Nombre del Producto');
        $sheet->setCellValue('D1', 'Precio');
        $sheet->setCellValue('E1', 'Cantidad');
        $sheet->setCellValue('F1', 'Importe');

        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['idhistorial']);
            $sheet->setCellValue('B' . $row, $item['cliente_nombre']);
            $sheet->setCellValue('C' . $row, $item['producto_nombre']);
            $sheet->setCellValue('D' . $row, $item['precio']);
            $sheet->setCellValue('E' . $row, $item['cantidad']);
            $sheet->setCellValue('F' . $row, $item['importe']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'historial.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
