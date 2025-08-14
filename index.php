<?php
// Ana dizin index.php - İnsan Kaynakları Sistemi
session_start();

// Autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Hata raporlama
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Basit routing
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Ana sayfa için
if ($path === '/' || $path === '/İnsanKaynaklarıModül/' || $path === '/İnsanKaynaklarıModül') {
    include __DIR__ . '/public/views/dashboard-minimal.php';
    exit;
}

// Diğer sayfalar için public/index.php'ye yönlendir
if (strpos($path, 'İnsanKaynaklarıModül') !== false) {
    include __DIR__ . '/public/index.php';
    exit;
}

// Varsayılan olarak public'e yönlendir
header('Location: public/');
exit;
?>
