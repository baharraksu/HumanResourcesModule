<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Sayfası - İnsan Kaynakları Sistemi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3 mb-0">
                            <i class="fas fa-check-circle me-2"></i>
                            Test Sayfası Çalışıyor!
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success">
                            <i class="fas fa-info-circle me-2"></i>
                            Eğer bu sayfayı görüyorsanız, PHP ve Bootstrap çalışıyor demektir.
                        </div>
                        
                        <h2 class="h4 mb-3">📁 Mevcut Dosyalar (Doğrudan Erişim):</h2>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <a href="views/dashboard-minimal.php" class="btn btn-outline-primary w-100 mb-2">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="views/employees/list.php" class="btn btn-outline-info w-100 mb-2">
                                    <i class="fas fa-users me-2"></i>Çalışanlar
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="views/departments/list.php" class="btn btn-outline-success w-100 mb-2">
                                    <i class="fas fa-building me-2"></i>Departmanlar
                                </a>
                            </div>
                        </div>
                        
                        <h2 class="h4 mb-3">🔗 Routing Test (index.php ile):</h2>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <a href="index.php" class="btn btn-primary w-100 mb-2">
                                    <i class="fas fa-home me-2"></i>Ana Sayfa
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?page=employees" class="btn btn-info w-100 mb-2">
                                    <i class="fas fa-users me-2"></i>Çalışanlar
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?page=departments" class="btn btn-success w-100 mb-2">
                                    <i class="fas fa-building me-2"></i>Departmanlar
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?page=profile" class="btn btn-warning w-100 mb-2">
                                    <i class="fas fa-user-circle me-2"></i>Profil
                                </a>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <a href="index.php?page=leave-requests" class="btn btn-outline-primary w-100 mb-2">
                                    <i class="fas fa-calendar-alt me-2"></i>İzin Kayıtları
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?page=attendance" class="btn btn-outline-info w-100 mb-2">
                                    <i class="fas fa-clock me-2"></i>Devam Takibi
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?page=payroll" class="btn btn-outline-success w-100 mb-2">
                                    <i class="fas fa-file-invoice-dollar me-2"></i>Bordro
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?page=reports" class="btn btn-outline-warning w-100 mb-2">
                                    <i class="fas fa-chart-bar me-2"></i>Raporlar
                                </a>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <a href="index.php?page=settings" class="btn btn-outline-secondary w-100 mb-2">
                                    <i class="fas fa-cog me-2"></i>Ayarlar
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="debug.php" class="btn btn-outline-dark w-100 mb-2">
                                    <i class="fas fa-bug me-2"></i>Debug
                                </a>
                            </div>
                        </div>
                        
                        <h2 class="h4 mb-3">⚙️ Sistem Bilgileri:</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">PHP Bilgileri</h6>
                                        <p class="mb-1"><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
                                        <p class="mb-1"><strong>Current Directory:</strong> <?php echo __DIR__; ?></p>
                                        <p class="mb-0"><strong>Request URI:</strong> <?php echo $_SERVER['REQUEST_URI'] ?? 'N/A'; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Test Sonuçları</h6>
                                        <p class="mb-1"><strong>Bootstrap:</strong> <span class="text-success">✓ Yüklendi</span></p>
                                        <p class="mb-1"><strong>Font Awesome:</strong> <span class="text-success">✓ Yüklendi</span></p>
                                        <p class="mb-0"><strong>PHP:</strong> <span class="text-success">✓ Çalışıyor</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
