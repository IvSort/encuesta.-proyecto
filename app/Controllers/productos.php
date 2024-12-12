<?php

namespace App\Controllers;

use App\Models\Productos_model;

class productos extends BaseController
{
    public function index()
    {
        $model = new Productos_model();
        $data['productos'] = $model->findAll();
        echo view('plantillas/header');
        echo view('paginas/productos', $data);
        echo view('plantillas/footer');
    }

    public function guardarProducto()
    {
        $model = new Productos_model();

        // Validar los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombreProducto' => 'required|min_length[3]',
            'precioProducto' => 'required|decimal',
            'stockProducto' => 'required|integer',
            'imagenProducto' => 'permit_empty|is_image[imagenProducto]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $imagen = $this->request->getFile('imagenProducto');
        $imagenNombre = '';

        if ($imagen && $imagen->isValid()) {
            $imagenNombre = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'public/uploads', $imagenNombre);
        }

        $data = [
            'nombre' => $this->request->getPost('nombreProducto'),
            'precio' => $this->request->getPost('precioProducto'),
            'stock' => $this->request->getPost('stockProducto'),
            'imagen' => $imagenNombre
        ];

        $model->save($data);

        return redirect()->to('/productos')->with('success', 'Producto creado con éxito.');
    }

    public function editarProducto($id)
    {
        $model = new Productos_model();
        $data['producto'] = $model->find($id);

        if (!$data['producto']) {
            return redirect()->to('/productos')->with('error', 'Producto no encontrado.');
        }

        return view('editar_producto', $data);
    }

    public function actualizarProducto($id)
{
    $productosModel = new Productos_model();

    $data = [
        'nombre' => $this->request->getPost('nombreProducto'),
        'precio' => $this->request->getPost('precioProducto'),
        'stock' => $this->request->getPost('stockProducto')
    ];

    // Manejar la imagen
    $imagen = $this->request->getFile('imagenProducto');
    if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
        // Generar un nombre único para la imagen
        $nuevoNombre = $imagen->getRandomName();
        // Mover la imagen a la carpeta de uploads
        $imagen->move(FCPATH . 'uploads', $nuevoNombre);

        // Obtener el nombre de la imagen anterior para eliminarla
        $productoActual = $productosModel->find($id);
        if ($productoActual && !empty($productoActual['imagen'])) {
            $rutaImagenAnterior = FCPATH . 'uploads/' . $productoActual['imagen'];
            if (file_exists($rutaImagenAnterior)) {
                unlink($rutaImagenAnterior); // Eliminar la imagen anterior
            }
        }

        // Agregar el nombre de la nueva imagen al array de datos
        $data['imagen'] = $nuevoNombre;
    }

    // Actualizar los datos del producto en la base de datos
    $productosModel->update($id, $data);

    // Redirigir a la página de productos o mostrar un mensaje de éxito
    return redirect()->to(base_url('productos'))->with('message', 'Producto actualizado correctamente');
}


    public function eliminarProducto($id)
    {
        $model = new Productos_model();
        $model->delete($id);

        return redirect()->to('/productos')->with('success', 'Producto eliminado con éxito.');
    }
}
