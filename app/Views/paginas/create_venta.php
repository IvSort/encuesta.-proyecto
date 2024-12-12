<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Formulario</h5>
                    </div>

                    <div class="card-body">
                    <form action="<?= base_url('ventas/store') ?>" method="post" id="ventaForm">
                    <div class="row">
                    <input type="hidden" id="nombreCliente" name="nombreCliente">
                        <div class="form-group col-md-6">
                            <!-- <label for="cliente">Nombre</label> -->
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <!-- <?php foreach ($clientes as $cliente): ?> -->
                                    <!-- <option value="<?= $cliente['idcliente'] ?>" data-nombre="<?= $cliente['nombre'] ?>" data-ruc="<?= $cliente['ruc'] ?>" data-direccion="<?= $cliente['direccion'] ?>"> -->
                                        <!-- <?= $cliente['nombre'] ?> -->
                                    <!-- </option> -->
                                <!-- <?php endforeach; ?> -->
                            </select>
                        </div>
                        
                        <div class="form-group col-md-5">
                            <label for="ruc">Codigo</label>
                            <input type="text" class="form-control" id="ruc" name="ruc" >
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="direccion">Apellido</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha">ESCUELA</label>
                            <input type="text" class="form-control"  name="fecha" value="Ingeniería de Sistemas" required readonly
                            >
                        </div>
                    </div>
                    <!-- <H5>Agregar productos</H5> -->
                    <!-- <div class="row"> -->
                        <!-- <div class="form-group col-md-10"> -->
                            <!-- <label for="producto">Producto</label> -->
                            <!-- <select name="producto" class="form-select" id="producto"> -->
                                <!-- <option value="">Seleccionar producto</option> -->
                                <!-- <?php foreach ($productos as $producto): ?> -->
                                    <!-- <option value="<?= $producto['idproductos'] ?>" data-nombre="<?= $producto['nombre'] ?>" -->
                                        <!-- data-imagen="<?= base_url('uploads/' . $producto['imagen']) ?>" -->
                                        <!-- data-precio="<?= $producto['precio'] ?>" data-stock="<?= $producto['stock'] ?>"> -->
                                        <!-- <?= $producto['nombre'] ?></option> -->
                                <!-- <?php endforeach; ?> -->
                            <!-- </select> -->
                        <!-- </div> -->
                        <!-- <div class="form-group col-md-2"> -->
                            <!-- <button type="button" class="btn btn-secondary" id="agregarProducto"> -->
                                        <!-- <i class="bi bi-cart-plus"></i> Agregar Producto -->
                                    <!-- </button> -->
                        <!-- </div> -->
                    <!-- </div> -->

                    <!-- <div class="table-responsive mt-3"> -->
                        <!-- <table class="table table-bordered" id="productosTable"> -->
                            <!-- <thead> -->
                                <!-- <tr> -->
                                    <!-- <th>ID</th> -->
                                    <!-- <th>Nombre</th> -->
                                    <!-- <th>Imagen</th> -->
                                    <!-- <th>Precio</th> -->
                                    <!-- <th>Stock</th> -->
                                    <!-- <th>Cantidad</th> -->
                                    <!-- <th>Importe</th> -->
                                    <!-- <th>Opción</th> -->
                                <!-- <!-- </tr> --> -->
                                <!-- </thead> -->
                            <!-- <!-- <tbody> --> -->

                            <!-- </tbody> -->
                        <!-- </table> -->
                    <!-- </div> -->

                    <!-- <div class="row mt-3"> -->
                        <!-- <div class="col-md-4"> -->
                            <!-- <div class="form-group"> -->
                                <!-- <label for="subtotal">Subtotal:</label> -->
                                <!-- <input type="text" class="form-control" id="subtotal" name="subtotal" readonly value=0> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        <!-- <div class="col-md-4"> -->
                            <!-- <div class="form-group"> -->
                                <!-- <label for="igv">IGV 18% :</label> -->
                                <!-- <input type="text" class="form-control" id="igv" name="igv" value="0.0" readonly> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        <!-- <div class="col-md-4"> -->
                            <!-- <div class="form-group"> -->
                                <!-- <label for="total" >Total:</label> -->
                                <!-- <input type="text" class="form-control" id="total" name="total" readonly value=0> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <input type="hidden" name="productos" id="productos">

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Guardar datos
                        </button>
                        <button id="descargar-boleta" class="btn btn-primary"></button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        var today = new Date().toISOString().split('T')[0];
        document.getElementById('fecha').value = today;

        document.getElementById('cliente').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var ruc = selectedOption.getAttribute('data-ruc');
            var direccion = selectedOption.getAttribute('data-direccion');

            document.getElementById('ruc').value = ruc;
            document.getElementById('direccion').value = direccion;
        });


        document.getElementById('agregarProducto').addEventListener('click', function () {
            var productoSelect = document.getElementById('producto');
            var selectedOption = productoSelect.options[productoSelect.selectedIndex];

            if (selectedOption.value) {
                var id = selectedOption.value;
                var nombre = selectedOption.getAttribute('data-nombre');
                var imagen = selectedOption.getAttribute('data-imagen');
                var precio = parseFloat(selectedOption.getAttribute('data-precio'));
                var stock = parseInt(selectedOption.getAttribute('data-stock'));
                var cantidad = 1;
                var importe = precio * cantidad;

                var tbody = document.getElementById('productosTable').getElementsByTagName('tbody')[0];
                var newRow = tbody.insertRow();

                newRow.innerHTML = `
                <td>${id}</td>
                <td>${nombre}</td>
                <td><img src="${imagen}" alt="${nombre}" style="width: 50px; height: 50px;"></td>
                <td>${precio.toFixed(2)}</td>
                <td>${stock}</td>
                <td><input type="number" class="form-control cantidad" value="${cantidad}" min="1" max="${stock}" data-precio="${precio}"></td>
                <td class="importe">${importe.toFixed(2)}</td>
                <td><button type="button" class="btn btn-danger eliminarProducto"><i class="bi bi-trash"></i></button></td>
            `;

                actualizarTotales();


                newRow.querySelector('.eliminarProducto').addEventListener('click', function () {
                    newRow.remove();
                    actualizarTotales();
                });

                newRow.querySelector('.cantidad').addEventListener('change', function () {
                    var nuevaCantidad = parseInt(this.value);
                    var nuevoImporte = nuevaCantidad * parseFloat(this.getAttribute('data-precio'));
                    newRow.querySelector('.importe').textContent = nuevoImporte.toFixed(2);
                    actualizarTotales();
                });

                productoSelect.value = '';
            }
        });

        function actualizarTotales() {
            var subtotal = 0;
            var productos = [];

            document.querySelectorAll('#productosTable tbody tr').forEach(function (row) {
                var id = row.cells[0].innerText;
                var nombre = row.cells[1].innerText;
                var imagen = row.cells[2].querySelector('img').src;
                var precio = parseFloat(row.cells[3].innerText);
                var stock = parseInt(row.cells[4].innerText);
                var cantidad = parseInt(row.querySelector('.cantidad').value);
                var importe = parseFloat(row.querySelector('.importe').innerText);

                productos.push({ id, nombre, imagen, precio, stock, cantidad, importe });

                subtotal += importe;
            });

            var igv = subtotal * 0.18;
            var total = subtotal + igv;

            document.getElementById('subtotal').value = subtotal.toFixed(2);
            document.getElementById('igv').value = igv.toFixed(2);
            document.getElementById('total').value = total.toFixed(2);

            document.getElementById('productos').value = JSON.stringify(productos);
        }
    });
    document.getElementById('descargar-boleta').addEventListener('click', function() {
    window.location.href = '/ventas/generarPdf'; 
});
document.getElementById('cliente').addEventListener('change', function() {
        var clienteSelect = document.getElementById('cliente');
        var clienteNombre = clienteSelect.options[clienteSelect.selectedIndex].getAttribute('data-nombre');
        

        document.getElementById('nombreCliente').value = clienteNombre;
        

        var ruc = clienteSelect.options[clienteSelect.selectedIndex].getAttribute('data-ruc');
        var direccion = clienteSelect.options[clienteSelect.selectedIndex].getAttribute('data-direccion');
        
        document.getElementById('ruc').value = ruc;
        document.getElementById('direccion').value = direccion;
    });

</script>