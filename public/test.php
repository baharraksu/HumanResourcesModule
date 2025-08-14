<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Sayfası</title>
</head>
<body>
    <h1>Test Sayfası Çalışıyor!</h1>
    <p>Eğer bu sayfayı görüyorsanız, PHP çalışıyor demektir.</p>
    
    <h2>Mevcut Dosyalar:</h2>
    <ul>
        <li><a href="views/dashboard-minimal.php">Dashboard (Doğrudan)</a></li>
        <li><a href="views/employees/list.php">Çalışanlar (Doğrudan)</a></li>
        <li><a href="views/departments/list.php">Departmanlar (Doğrudan)</a></li>
    </ul>
    
    <h2>Routing Test:</h2>
    <ul>
        <li><a href="/">Ana Sayfa (/)</a></li>
        <li><a href="/employees">Çalışanlar (/employees)</a></li>
        <li><a href="/departments">Departmanlar (/departments)</a></li>
    </ul>
    
    <h2>PHP Bilgileri:</h2>
    <p>PHP Version: <?php echo phpversion(); ?></p>
    <p>Current Directory: <?php echo __DIR__; ?></p>
    <p>Request URI: <?php echo $_SERVER['REQUEST_URI'] ?? 'N/A'; ?></p>
</body>
</html>
