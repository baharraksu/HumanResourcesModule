<?php
// Test routing functionality
$page = $_GET['page'] ?? 'test';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routing Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Routing Test</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Test Navigation</h5>
                    </div>
                    <div class="card-body">
                        <p>Current page: <strong><?= htmlspecialchars($page) ?></strong></p>
                        
                        <h6>Test Links:</h6>
                        <ul class="list-unstyled">
                            <li><a href="index.php?page=employees" class="btn btn-primary btn-sm mb-2">Çalışanlar</a></li>
                            <li><a href="index.php?page=departments" class="btn btn-info btn-sm mb-2">Departmanlar</a></li>
                            <li><a href="index.php?page=leave-requests" class="btn btn-success btn-sm mb-2">İzin Kayıtları</a></li>
                            <li><a href="index.php?page=attendance" class="btn btn-warning btn-sm mb-2">Devam Takibi</a></li>
                            <li><a href="index.php?page=payroll" class="btn btn-secondary btn-sm mb-2">Bordro</a></li>
                            <li><a href="index.php?page=reports" class="btn btn-dark btn-sm mb-2">Raporlar</a></li>
                            <li><a href="index.php?page=settings" class="btn btn-outline-primary btn-sm mb-2">Ayarlar</a></li>
                        </ul>
                        
                        <h6>Test View/Edit Links:</h6>
                        <ul class="list-unstyled">
                            <li><a href="index.php?page=employees-view&id=1" class="btn btn-outline-info btn-sm mb-2">Çalışan Detay (ID:1)</a></li>
                            <li><a href="index.php?page=employees-edit&id=1" class="btn btn-outline-warning btn-sm mb-2">Çalışan Düzenle (ID:1)</a></li>
                            <li><a href="index.php?page=departments-view&id=1" class="btn btn-outline-success btn-sm mb-2">Departman Detay (ID:1)</a></li>
                            <li><a href="index.php?page=departments-edit&id=1" class="btn btn-outline-danger btn-sm mb-2">Departman Düzenle (ID:1)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Current Status</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>GET Parameters:</strong></p>
                        <pre><?php print_r($_GET); ?></pre>
                        
                        <p><strong>Requested Page:</strong> <?= htmlspecialchars($page) ?></p>
                        
                        <p><strong>Current Directory:</strong> <?= __DIR__ ?></p>
                        
                        <p><strong>Include Path Test:</strong></p>
                        <?php
                        $testFile = 'views/layout/header.php';
                        if (file_exists($testFile)) {
                            echo '<span class="text-success">✓ Header file exists</span>';
                        } else {
                            echo '<span class="text-danger">✗ Header file not found</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Back Button Test</h5>
                    </div>
                    <div class="card-body">
                        <p>Test the "Geri Dön" button functionality:</p>
                        <a href="index.php?page=employees" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Geri Dön (Çalışanlar)
                        </a>
                        <a href="index.php?page=departments" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left me-1"></i>
                            Geri Dön (Departmanlar)
                        </a>
                        <a href="index.php?page=leave-requests" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left me-1"></i>
                            Geri Dön (İzin Kayıtları)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
