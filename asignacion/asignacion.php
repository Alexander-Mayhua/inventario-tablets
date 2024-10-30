<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .sidebar {
            background-color: #1a2942;
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }
        
        .sidebar .nav-link {
            color: #ffffff80;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .sidebar .nav-link:hover {
            color: white;
            background-color: #243555;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f5f8fa;
            min-height: 100vh;
            padding: 0px;
        }
        
        .metric-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .progress {
            height: 6px;
            margin-top: 10px;
        }
        
        .chart-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .nav-item .badge-new {
            background-color: #3498db;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: 5px;
        }
        .d-flex{
            background-color:  #3498db;
           
        }
        .titulo{
            padding-left: 50px;
            height: 100px;
            padding-top: 30px;
            color: #f5f8fa;
        }
        .titulo h4{
            font-size: 30px;
        }

    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-auto">
                <div class="sidebar">
                    <h4 class="px-3 mb-4">VIBE.</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php">
                                <i class="bi bi-house-door"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../tabletas/tabletas.php">
                                <i class="bi bi-tablet"></i> Tabletas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../persona/persona.php">
                                <i class="bi bi-people"></i> Personas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../asignacion/asignacion.php">
                                <i class="bi bi-clipboard-check"></i> Asignación
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="#">
                                <i class="bi bi-cart"></i> Purchase Vibe
                                <span class="badge-new">NEW</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-text"></i> Documentation
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col">
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="titulo">
                            <h4>SISTEMA DE INVENTARIO</h4>
                           
                        </div>
                        <div class="d-flex">
                            <input type="search" class="form-control me-2" placeholder="Buscar...">
                            <button class="btn btn-outline-secondary">Github</button>
                            <button class="btn btn-primary ms-2">Nuevo +</button>
                        </div>
                    </div>

                   

                    
                   

        
                   
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Traffic Chart
        const trafficCtx = document.getElementById('trafficChart').getContext('2d');
        new Chart(trafficCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Tráfico',
                    data: [30, 45, 35, 50, 40, 60],
                    fill: true,
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    borderColor: 'rgba(52, 152, 219, 1)',
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Product Views Chart
        const productCtx = document.getElementById('productChart').getContext('2d');
        new Chart(productCtx, {
            type: 'doughnut',
            data: {
                labels: ['Producto A', 'Producto B', 'Producto C'],
                datasets: [{
                    data: [45, 30, 25],
                    backgroundColor: [
                        'rgba(52, 152, 219, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(155, 89, 182, 1)'
                    ]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>