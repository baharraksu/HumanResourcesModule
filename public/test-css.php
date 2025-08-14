<?php
// Dinamik base path tespiti
$basePath = '';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
if (strpos($scriptName, '/İnsanKaynaklarıModül/public/') !== false) {
    $basePath = '/İnsanKaynaklarıModül/public';
} elseif (strpos($scriptName, '/public/') !== false) {
    $basePath = '/public';
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Test</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= $basePath ?>/css/style.css" rel="stylesheet">
    
    <style>
        .test-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            margin: 2rem 0;
            text-align: center;
        }
        .css-test {
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            border-radius: var(--border-radius);
            margin: 1rem 0;
            box-shadow: var(--shadow-lg);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">CSS Test Sayfası</h1>
        
        <div class="test-box">
            <h3>✅ Bootstrap CSS Yüklendi</h3>
            <p>Bu kutu Bootstrap ile stillendirildi</p>
        </div>
        
        <div class="css-test">
            <h3>✅ Custom CSS Yüklendi</h3>
            <p>Bu kutu custom CSS değişkenleri ile stillendirildi</p>
        </div>
        
        <div class="alert alert-info">
            <h4>Test Sonuçları:</h4>
            <ul>
                <li><strong>Base Path:</strong> <?= $basePath ?: 'Tespit edilemedi' ?></li>
                <li><strong>CSS Dosya Yolu:</strong> <?= $basePath ?>/css/style.css</li>
                <li><strong>CSS Dosyası Mevcut:</strong> <?= file_exists('css/style.css') ? 'Evet' : 'Hayır' ?></li>
                <li><strong>Tam CSS Yolu:</strong> <?= __DIR__ ?>/css/style.css</li>
            </ul>
        </div>
        
        <div class="text-center">
            <a href="<?= $basePath ?>/" class="btn btn-primary">Ana Sayfaya Dön</a>
            <a href="<?= $basePath ?>/employees" class="btn btn-success">Çalışanlar</a>
            <a href="<?= $basePath ?>/departments" class="btn btn-info">Departmanlar</a>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
