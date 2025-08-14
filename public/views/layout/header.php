<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'İnsan Kaynakları Sistemi' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-users-cog"></i>
                <span>İK Sistemi</span>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=employees" class="nav-link <?= $currentPage === 'employees' ? 'active' : '' ?>">
                        <i class="fas fa-user-tie"></i>
                        <span>Çalışanlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=departments" class="nav-link <?= $currentPage === 'departments' ? 'active' : '' ?>">
                        <i class="fas fa-building"></i>
                        <span>Departmanlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=leave-requests" class="nav-link <?= $currentPage === 'leave-requests' ? 'active' : '' ?>">
                        <i class="fas fa-calendar-alt"></i>
                        <span>İzin Talepleri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=attendance" class="nav-link <?= $currentPage === 'attendance' ? 'active' : '' ?>">
                        <i class="fas fa-clock"></i>
                        <span>Devam Takibi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=payroll" class="nav-link <?= $currentPage === 'payroll' ? 'active' : '' ?>">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Bordro</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=reports" class="nav-link <?= $currentPage === 'reports' ? 'active' : '' ?>">
                        <i class="fas fa-chart-bar"></i>
                        <span>Raporlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=settings" class="nav-link <?= $currentPage === 'settings' ? 'active' : '' ?>">
                        <i class="fas fa-cog"></i>
                        <span>Ayarlar</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navigation -->
        <nav class="top-nav">
            <div class="nav-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="breadcrumb">
                    <span class="breadcrumb-item"><?= $breadcrumb ?? 'Dashboard' ?></span>
                </div>
            </div>
            
            <div class="nav-right">
                <div class="nav-item">
                    <button class="notification-btn" id="notificationBtn">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </button>
                </div>
                
                <div class="nav-item dropdown">
                    <button class="user-dropdown" id="userDropdown" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">Admin Kullanıcı</span>
                            <span class="user-role">İK Müdürü</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?page=profile"><i class="fas fa-user me-2"></i>Profil</a></li>
                        <li><a class="dropdown-item" href="index.php?page=settings"><i class="fas fa-cog me-2"></i>Ayarlar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?page=logout"><i class="fas fa-sign-out-alt me-2"></i>Çıkış</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Flash Messages -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= $_SESSION['success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?= $_SESSION['error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
