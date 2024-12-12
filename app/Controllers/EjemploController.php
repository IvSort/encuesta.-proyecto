<?php namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\ClienteModel;

class EjemploController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT productos.nombre AS producto, productos.precio, cliente.nombre AS cliente
            FROM productos
            JOIN cliente ON productos.idproductos = cliente.idcliente
        ");
        $result = $query->getResult();

        return view('ejemplo_vista', ['datos' => $result]);
    }
    public function generarPdf()
    {
        $cliente = $this->request->getGet('cliente');
    
        if (!$cliente) {
            return redirect()->back()->with('error', 'El nombre del cliente es requerido.');
        }
    
        
        $productos = $this->EjemploModel->findAll();
    
        // Crear nuevo PDF
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tu Nombre o Empresa');
        $pdf->SetTitle('Boleta de Venta');
        $pdf->SetSubject('Boleta personalizada');
        $pdf->SetKeywords('boleta, PDF, productos');
    
        // Configurar el encabezado y pie de página
        $pdf->SetHeaderData('', 0, 'Boleta de Venta', 'Generado para: ' . $cliente);
        $pdf->setHeaderFont(['helvetica', '', 10]);
        $pdf->setFooterFont(['helvetica', '', 8]);
        $pdf->SetMargins(15, 27, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);
        $pdf->SetAutoPageBreak(TRUE, 15);
        $pdf->SetFont('helvetica', '', 10);
    
        // Añadir una página
        $pdf->AddPage();
    
        // Título
        $html = "<h1>Boleta de Venta</h1>";
        $html .= "<p><strong>Cliente:</strong> " . esc($cliente) . "</p>";
        $html .= "<p><strong>Fecha:</strong> " . date('Y-m-d') . "</p>";
    
        // Tabla de productos
        $html .= "<table border='1' cellpadding='5' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($productos as $producto) {
            $html .= "<tr>
                        <td>" . esc($producto['idproductos']) . "</td>
                        <td>" . esc($producto['nombre']) . "</td>
                        <td>" . esc($producto['precio']) . "</td>
                        <td>" . esc($producto['stock']) . "</td>
                      </tr>";
        }
        $html .= "</tbody></table>";
    
        // Escribir el contenido en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Salida del PDF
        $pdf->Output("boleta_$cliente.pdf", 'I'); // I para mostrar en el navegador
    }
    
    
}
