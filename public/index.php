<?php
session_start();

// Basit routing sistemi - GET parametresi ile
$page = $_GET['page'] ?? 'dashboard';

// Debug bilgisi
error_log("Requested page: " . $page);

// Sayfa yönlendirmeleri
switch ($page) {
    case 'employees':
        $pageTitle = 'Çalışanlar - İnsan Kaynakları Sistemi';
        $currentPage = 'employees';
        $breadcrumb = 'Çalışanlar / Liste';
        include 'views/employees/list.php';
        break;
        
    case 'employees-add':
        $pageTitle = 'Yeni Çalışan Ekle - İnsan Kaynakları Sistemi';
        $currentPage = 'employees';
        $breadcrumb = 'Çalışanlar / Yeni Ekle';
        include 'views/employees/add.php';
        break;
        
    case 'employees-view':
        $employeeId = $_GET['id'] ?? 0;
        $pageTitle = 'Çalışan Detayı - İnsan Kaynakları Sistemi';
        $currentPage = 'employees';
        $breadcrumb = 'Çalışanlar / Detay';
        include 'views/employees/view.php';
        break;
        
    case 'employees-edit':
        $employeeId = $_GET['id'] ?? 0;
        $pageTitle = 'Çalışan Düzenle - İnsan Kaynakları Sistemi';
        $currentPage = 'employees';
        $breadcrumb = 'Çalışanlar / Düzenle';
        include 'views/employees/edit.php';
        break;
        
    case 'departments':
        $pageTitle = 'Departmanlar - İnsan Kaynakları Sistemi';
        $currentPage = 'departments';
        $breadcrumb = 'Departmanlar';
        include 'views/departments/list.php';
        break;
        
    case 'departments-view':
        $departmentId = $_GET['id'] ?? 0;
        $pageTitle = 'Departman Detayı - İnsan Kaynakları Sistemi';
        $currentPage = 'departments';
        $breadcrumb = 'Departmanlar / Detay';
        include 'views/departments/view.php';
        break;
        
    case 'departments-edit':
        $departmentId = $_GET['id'] ?? 0;
        $pageTitle = 'Departman Düzenle - İnsan Kaynakları Sistemi';
        $currentPage = 'departments';
        $breadcrumb = 'Departmanlar / Düzenle';
        include 'views/departments/edit.php';
        break;
        
    case 'leave-requests':
        $pageTitle = 'İzin Kayıtları - İnsan Kaynakları Sistemi';
        $currentPage = 'leave-requests';
        $breadcrumb = 'İzin Kayıtları';
        include 'views/leave-requests/list.php';
        break;
        
    case 'leave-view':
        $leaveId = $_GET['id'] ?? 0;
        $pageTitle = 'İzin Kaydı Detayı - İnsan Kaynakları Sistemi';
        $currentPage = 'leave-requests';
        $breadcrumb = 'İzin Kayıtları / Detay';
        include 'views/leave-requests/view.php';
        break;
        
    case 'leave-edit':
        $leaveId = $_GET['id'] ?? 0;
        $pageTitle = 'İzin Kaydı Düzenle - İnsan Kaynakları Sistemi';
        $currentPage = 'leave-requests';
        $breadcrumb = 'İzin Kayıtları / Düzenle';
        include 'views/leave-requests/edit.php';
        break;
        
    case 'attendance':
        $pageTitle = 'Devam Takibi - İnsan Kaynakları Sistemi';
        $currentPage = 'attendance';
        $breadcrumb = 'Devam Takibi';
        include 'views/attendance/list.php';
        break;
        
    case 'payroll':
        $pageTitle = 'Bordro - İnsan Kaynakları Sistemi';
        $currentPage = 'payroll';
        $breadcrumb = 'Bordro';
        include 'views/payroll/list.php';
        break;
        
    case 'payroll-view':
        $payrollId = $_GET['id'] ?? 0;
        $pageTitle = 'Bordro Detayı - İnsan Kaynakları Sistemi';
        $currentPage = 'payroll';
        $breadcrumb = 'Bordro / Detay';
        include 'views/payroll/view.php';
        break;
        
    case 'payroll-edit':
        $payrollId = $_GET['id'] ?? 0;
        $pageTitle = 'Bordro Düzenle - İnsan Kaynakları Sistemi';
        $currentPage = 'payroll';
        $breadcrumb = 'Bordro / Düzenle';
        include 'views/payroll/edit.php';
        break;
        
    case 'reports':
        $pageTitle = 'Raporlar - İnsan Kaynakları Sistemi';
        $currentPage = 'reports';
        $breadcrumb = 'Raporlar';
        include 'views/reports/dashboard.php';
        break;
        
    case 'settings':
        $pageTitle = 'Ayarlar - İnsan Kaynakları Sistemi';
        $currentPage = 'settings';
        $breadcrumb = 'Ayarlar';
        include 'views/settings/index.php';
        break;
        
    case 'profile':
        $pageTitle = 'Profil - İnsan Kaynakları Sistemi';
        $currentPage = 'profile';
        $breadcrumb = 'Profil';
        include 'views/profile/index.php';
        break;
        
    case 'dashboard':
    default:
        $pageTitle = 'Dashboard - İnsan Kaynakları Sistemi';
        $currentPage = 'dashboard';
        $breadcrumb = 'Dashboard';
        include 'views/dashboard-minimal.php';
        break;
}
?>
