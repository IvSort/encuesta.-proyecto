<?php

namespace App\Controllers;

use TCPDF;
use App\Models\Ventas_model;
use App\Models\Historial_model;
use App\Models\Productos_model;
use App\Models\Clientes_model;
use CodeIgniter\Controller;

class Ventas extends Controller
{
    public function create()
    {
        $productosModel = new Productos_model();
        $clientesModel = new Clientes_model();

        $data['productos'] = $productosModel->findAll();
        $data['clientes'] = $clientesModel->findAll();

        echo view('plantillas/header');
        echo view('paginas/create_venta', $data);
        echo view('plantillas/footer');
    }

    public function store()
    {
        $ventasModel = new Ventas_model();
        $historialModel = new Historial_model();
        
        // Datos recibidos del formulario
        $namess=['nombreCliente'=>$this->request->getPost('nombreCliente')];
        $data = [
            'nombreCliente' => $this->request->getPost('cliente'),  // Usamos el nombre del cliente aquí
            'ruc' => $this->request->getPost('ruc'),
            'fecha' => $this->request->getPost('fecha'),
            'direccion' => $this->request->getPost('direccion'),
            'total' => $this->request->getPost('total'),
        ];
        
        // Guardar la venta en la base de datos
        $ventasModel->save($data);
        
        // Obtener los productos
        $productos = json_decode($this->request->getPost('productos'), true);
        
        // Guardar el historial de productos
        foreach ($productos as $producto) {
            $historialData = [
                'idcliente' => $this->request->getPost('cliente'),
                'idproductos' => $producto['id'],
                'precio' => $producto['precio'],
                'cantidad' => $producto['cantidad'],
                'importe' => $producto['importe'],
            ];
            $historialModel->save($historialData);
        }
    
        date_default_timezone_set('America/Lima');
        
        // Datos del cliente
        $cliente = [
            'nombre' => $namess['nombreCliente'],
            'ruc' => $data['ruc'],
            'direccion' => $data['direccion'],
        ];
        
        $total = $data['total']; // Total de la venta
        $fechaHora = date('d/m/Y H:i:s');
        
        // Inicializar TCPDF
        $pdf = new TCPDF();
        $pdf->AddPage();
        
        // Ruta del logo
        $rutaImagen = base_url('img/photos/logo.jpg');
        
        // HTML para la boleta de venta
        $html = '<table style="width: 100%; margin-bottom: 20px;" cellpadding="5">';
        $html .= '<tr>
                    <td style="text-align: left; width: 70%;">
                        <h3>Boleta de Venta</h3>
                        <p><strong>Fecha y Hora:</strong> ' . $fechaHora . '</p>
                    </td>
                    <td style="text-align: right; width: 30%;">
                        <img src="' . $rutaImagen . '" width="100" height="50">
                    </td>
                  </tr>';
        $html .= '</table>';
        
        // Detalles del cliente
        $html .= '<table border="1" cellpadding="5" style="width: 100%;">';
        $html .= '<tr><td><strong>Nombre:</strong> ' . $cliente['nombre'] . '</td></tr>';
        $html .= '<tr><td><strong>RUC:</strong> ' . $cliente['ruc'] . '</td></tr>';
        $html .= '<tr><td><strong>Dirección:</strong> ' . $cliente['direccion'] . '</td></tr>';
        $html .= '</table><br><br>';
        
        // Detalles de los productos
        $html .= '<h3>Detalles de Productos</h3>';
        $html .= '<table border="1" cellpadding="3">';
        $html .= '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Importe</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';
        foreach ($productos as $producto) {
            $html .= '<tr>
                        <td>' . $producto['id'] . '</td>
                        <td>' . $producto['nombre'] . '</td>
                        <td>' . $producto['precio'] . '</td>
                        <td>' . $producto['cantidad'] . '</td>
                        <td>' . $producto['importe'] . '</td>
                      </tr>';
        }
        $html .= '</tbody>';
        $html .= '</table><br><br>';
        
        // Total de la venta
        $html .= '<table border="1" cellpadding="5" style="width: 100%;">';
        $html .= '<tr>
                    <td><strong>Total:</strong> ' . number_format($total, 2) . '</td>
                  </tr>';
        $html .= '</table>';
        
        // Establecer los encabezados HTTP para la descarga del PDF
        $this->response->setHeader('Content-Type', 'application/pdf');
        $this->response->setHeader('Content-Disposition', 'attachment; filename="boleta_venta.pdf"');
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');
        
        // Escribir el PDF
        $pdf->writeHTML($html);
        
        // Forzar la descarga del PDF
        $pdf->Output('boleta_venta.pdf', 'D');

        exit;
      
        return redirect()->to(base_url('/ventas'));
    }
    
    
}
