<?php
echo "<h1>Debug Bilgileri</h1>";

echo "<h2>Server Bilgileri:</h2>";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? 'N/A') . "<br>";
echo "SCRIPT_NAME: " . ($_SERVER['SCRIPT_NAME'] ?? 'N/A') . "<br>";
echo "PHP_SELF: " . ($_SERVER['PHP_SELF'] ?? 'N/A') . "<br>";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'N/A') . "<br>";
echo "Current Directory: " . __DIR__ . "<br>";

echo "<h2>Path Analysis:</h2>";
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
echo "Original URI: " . $request_uri . "<br>";
echo "Parsed Path: " . $path . "<br>";

echo "<h2>File Existence:</h2>";
echo "index.php exists: " . (file_exists('index.php') ? 'YES' : 'NO') . "<br>";
echo "views/dashboard-minimal.php exists: " . (file_exists('views/dashboard-minimal.php') ? 'YES' : 'NO') . "<br>";
echo "views/layout/header.php exists: " . (file_exists('views/layout/header.php') ? 'YES' : 'NO') . "<br>";

echo "<h2>Include Test:</h2>";
try {
    include 'views/layout/header.php';
    echo "✅ Header include başarılı!<br>";
} catch (Exception $e) {
    echo "❌ Header include hatası: " . $e->getMessage() . "<br>";
}

echo "<h2>Apache Modules:</h2>";
echo "mod_rewrite: " . (function_exists('apache_get_modules') && in_array('mod_rewrite', apache_get_modules()) ? 'ENABLED' : 'UNKNOWN') . "<br>";

echo "<h2>Test Links:</h2>";
echo '<a href="views/dashboard-minimal.php">Dashboard (Doğrudan)</a><br>';
echo '<a href="views/employees/list.php">Çalışanlar (Doğrudan)</a><br>';
echo '<a href="views/departments/list.php">Departmanlar (Doğrudan)</a><br>';
?>
