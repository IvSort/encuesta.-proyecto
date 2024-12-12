<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">REPORTES</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h2>Top Encuestados</h2>
                                <div id="topClientesChart"></div>
                            </div>
                            <div class="col-6">
                                <h2 class="mt-0">Top Asignaturas preferidas
                                </h2>
                                <div id="topVentasChart"></div>
                            </div>
                        </div>
                        <!-- <h2 class="mt-5">Ventas por Fecha</h2> -->
                        <!-- <div id="ventasPorFechaChart"></div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
    // Generar colores dinámicos
    function dynamicColors(numColors) {
        let colors = [];
        for (let i = 0; i < numColors; i++) {
            let color = '#' + Math.floor(Math.random() * 16777215).toString(16);
            colors.push(color);
        }
        return colors;
    }

    // Datos de top clientes
    var topClientesOptions = {
        series: [{
            name: 'Compras',
            data: <?= json_encode(array_column($topclientes, 'cantidad')) ?>
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false, // Cambia a formato vertical
            }
        },
        colors: dynamicColors(<?= count($topclientes) ?>), // Colores dinámicos
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: <?= json_encode(array_column($topclientes, 'cliente_nombre')) ?>
        }
    };

    var topClientesChart = new ApexCharts(document.querySelector("#topClientesChart"), topClientesOptions);
    topClientesChart.render();

    // Datos de top ventas
    var topVentasOptions = {
        series: [{
            name: 'Cantidad Vendida',
            data: <?= json_encode(array_column($topventas, 'cantidad_vendida')) ?>
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false, // Cambia a formato vertical
            }
        },
        colors: dynamicColors(<?= count($topventas) ?>), // Colores dinámicos
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: <?= json_encode(array_column($topventas, 'producto_nombre')) ?>
        }
    };

    var topVentasChart = new ApexCharts(document.querySelector("#topVentasChart"), topVentasOptions);
    topVentasChart.render();

    // Datos de ventas por fecha
    var ventasPorFechaOptions = {
        series: [{
            name: 'Total Ventas',
            data: <?= json_encode(array_column($ventasporfecha, 'total')) ?>
        }],
        chart: {
            type: 'line',
            height: 350
        },
        colors: ['#008FFB'], // Color para la línea
        xaxis: {
            categories: <?= json_encode(array_column($ventasporfecha, 'fecha')) ?>
        },
        dataLabels: {
            enabled: false
        }
    };

    var ventasPorFechaChart = new ApexCharts(document.querySelector("#ventasPorFechaChart"), ventasPorFechaOptions);
    ventasPorFechaChart.render();
</script>