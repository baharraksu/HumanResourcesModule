<?php
$pageTitle = 'Dashboard - İnsan Kaynakları Sistemi';
$currentPage = 'dashboard';
$breadcrumb = 'Dashboard';
include 'views/layout/header.php';
?>

<!-- Dashboard Content -->
<div class="dashboard-content">
    <!-- Welcome Section -->
    <div class="welcome-section mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="welcome-title">Hoş Geldiniz! 👋</h1>
                <p class="welcome-subtitle">İnsan Kaynakları Yönetim Sistemi Dashboard'ına hoş geldiniz. Bugün <?= date('d F Y, l') ?></p>
            </div>
            <div class="col-md-4 text-end">
                <div class="quick-stats">
                    <div class="stat-item">
                        <span class="stat-label">Bugün</span>
                        <span class="stat-value"><?= date('d') ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Ay</span>
                        <span class="stat-value"><?= date('M') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid mb-4">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">156</div>
                <div class="stat-label">Toplam Çalışan</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    +12 bu ay
                </div>
            </div>
        </div>

        <div class="stat-card success">
            <div class="stat-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">142</div>
                <div class="stat-label">Aktif Çalışanlar</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    +8 bu ay
                </div>
            </div>
        </div>

        <div class="stat-card info">
            <div class="stat-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">12</div>
                <div class="stat-label">Departman</div>
                <div class="stat-change neutral">
                    <i class="fas fa-minus"></i>
                    Değişiklik yok
                </div>
            </div>
        </div>

        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">23</div>
                <div class="stat-label">Bekleyen İzin</div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i>
                    -5 bu hafta
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-chart-line me-2"></i>Haftalık Devam Takibi</h5>
                </div>
                <div class="card-body">
                    <canvas id="attendanceChart" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-chart-pie me-2"></i>Çalışan Durumu</h5>
                </div>
                <div class="card-body">
                    <canvas id="employeeChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Activity -->
    <div class="row mb-4">
        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3>🚀 Hızlı İşlemler</h3>
            <div class="quick-actions-grid">
                <a href="/İnsanKaynaklarıModül/public/employees/add" class="quick-action-btn success">
                    <i class="fas fa-plus"></i>
                    <span>Yeni Çalışan Ekle</span>
                </a>
                
                <a href="/İnsanKaynaklarıModül/public/employees" class="quick-action-btn primary">
                    <i class="fas fa-users"></i>
                    <span>Çalışanları Listele</span>
                </a>
                
                <a href="/İnsanKaynaklarıModül/public/leave-requests" class="quick-action-btn warning">
                    <i class="fas fa-calendar-alt"></i>
                    <span>İzin Yönetimi</span>
                </a>
                
                <a href="/İnsanKaynaklarıModül/public/reports" class="quick-action-btn info">
                    <i class="fas fa-chart-line"></i>
                    <span>Raporlar</span>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-history me-2"></i>Son Aktiviteler</h5>
                </div>
                <div class="card-body">
                    <div class="activity-timeline">
                        <div class="activity-item">
                            <div class="activity-icon success">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <h6>Yeni çalışan eklendi</h6>
                                <p>Ahmet Yılmaz - Mutfak departmanına katıldı</p>
                                <span class="activity-time">2 saat önce</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon warning">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="activity-content">
                                <h6>İzin talebi onaylandı</h6>
                                <p>Fatma Garson'un 3 günlük izin talebi onaylandı</p>
                                <span class="activity-time">4 saat önce</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon info">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="activity-content">
                                <h6>Departman güncellendi</h6>
                                <p>Servis departmanı bilgileri güncellendi</p>
                                <span class="activity-time">1 gün önce</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon primary">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="activity-content">
                                <h6>Yeni rapor oluşturuldu</h6>
                                <p>Aylık çalışan performans raporu hazırlandı</p>
                                <span class="activity-time">2 gün önce</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Department Overview -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-sitemap me-2"></i>Departman Genel Bakış</h5>
                </div>
                <div class="card-body">
                    <div class="department-overview">
                        <div class="department-item">
                            <div class="dept-info">
                                <h6>Mutfak</h6>
                                <span class="dept-count">24 çalışan</span>
                            </div>
                            <div class="dept-progress">
                                <div class="progress">
                                    <div class="progress-bar" style="width: 85%"></div>
                                </div>
                                <span class="progress-text">85% devam</span>
                            </div>
                        </div>

                        <div class="department-item">
                            <div class="dept-info">
                                <h6>Servis</h6>
                                <span class="dept-count">18 çalışan</span>
                            </div>
                            <div class="dept-progress">
                                <div class="progress">
                                    <div class="progress-bar" style="width: 92%"></div>
                                </div>
                                <span class="progress-text">92% devam</span>
                            </div>
                        </div>

                        <div class="department-item">
                            <div class="dept-info">
                                <h6>Muhasebe</h6>
                                <span class="dept-count">8 çalışan</span>
                            </div>
                            <div class="dept-progress">
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-text">100% devam</span>
                            </div>
                        </div>

                        <div class="department-item">
                            <div class="dept-info">
                                <h6>İnsan Kaynakları</h6>
                                <span class="dept-count">6 çalışan</span>
                            </div>
                            <div class="dept-progress">
                                <div class="progress">
                                    <div class="progress-bar" style="width: 95%"></div>
                                </div>
                                <span class="progress-text">95% devam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-calendar-alt me-2"></i>Yaklaşan Etkinlikler</h5>
                </div>
                <div class="card-body">
                    <div class="events-grid">
                        <div class="event-item">
                            <div class="event-date">
                                <span class="day">15</span>
                                <span class="month">Ara</span>
                            </div>
                            <div class="event-content">
                                <h6>Yılbaşı Kutlaması</h6>
                                <p>Tüm çalışanlar için yılbaşı organizasyonu</p>
                                <span class="event-time">14:00 - 18:00</span>
                            </div>
                            <div class="event-actions">
                                <button class="btn btn-sm btn-outline-primary">Detay</button>
                            </div>
                        </div>

                        <div class="event-item">
                            <div class="event-date">
                                <span class="day">20</span>
                                <span class="month">Ara</span>
                            </div>
                            <div class="event-content">
                                <h6>Performans Değerlendirme</h6>
                                <p>Yıllık çalışan performans değerlendirme toplantısı</p>
                                <span class="event-time">09:00 - 12:00</span>
                            </div>
                            <div class="event-actions">
                                <button class="btn btn-sm btn-outline-primary">Detay</button>
                            </div>
                        </div>

                        <div class="event-item">
                            <div class="event-date">
                                <span class="day">25</span>
                                <span class="month">Ara</span>
                            </div>
                            <div class="event-content">
                                <h6>Eğitim Programı</h6>
                                <p>Yeni çalışanlar için oryantasyon eğitimi</p>
                                <span class="event-time">10:00 - 16:00</span>
                            </div>
                            <div class="event-actions">
                                <button class="btn btn-sm btn-outline-primary">Detay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Specific Styles */
.dashboard-content {
    animation: fadeInUp 0.6s ease-out;
}

.welcome-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
}

.welcome-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.welcome-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.quick-stats {
    display: flex;
    gap: 1rem;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    padding: 1rem;
    border-radius: 0.75rem;
    backdrop-filter: blur(10px);
}

.stat-label {
    display: block;
    font-size: 0.875rem;
    opacity: 0.8;
}

.stat-value {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
}

/* Enhanced Stats Cards */
.stat-card {
    position: relative;
    overflow: hidden;
}

.stat-card::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(30px, -30px);
}

.stat-content {
    position: relative;
    z-index: 1;
}

.stat-change {
    font-size: 0.75rem;
    font-weight: 500;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.stat-change.positive {
    color: var(--success-color);
}

.stat-change.negative {
    color: var(--danger-color);
}

.stat-change.neutral {
    color: var(--secondary-color);
}

/* Quick Actions */
.quick-actions-grid {
    display: grid;
    gap: 1rem;
}

.quick-action-btn {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: var(--light-color);
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--dark-color);
    transition: all 0.3s;
}

.quick-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    border-color: var(--primary-color);
    color: var(--primary-color);
}

.action-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
}

.quick-action-btn.primary .action-icon { background: var(--primary-color); }
.quick-action-btn.success .action-icon { background: var(--success-color); }
.quick-action-btn.info .action-icon { background: var(--info-color); }
.quick-action-btn.warning .action-icon { background: var(--warning-color); }

.action-content h6 {
    margin: 0 0 0.25rem 0;
    font-weight: 600;
}

.action-content p {
    margin: 0;
    font-size: 0.875rem;
    color: var(--secondary-color);
}

/* Activity Timeline */
.activity-timeline {
    position: relative;
}

.activity-timeline::before {
    content: '';
    position: absolute;
    left: 1.25rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--border-color);
}

.activity-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    position: relative;
}

.activity-icon {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.875rem;
    flex-shrink: 0;
    z-index: 1;
}

.activity-icon.success { background: var(--success-color); }
.activity-icon.warning { background: var(--warning-color); }
.activity-icon.info { background: var(--info-color); }
.activity-icon.primary { background: var(--primary-color); }

.activity-content h6 {
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.activity-content p {
    font-size: 0.75rem;
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
}

.activity-time {
    font-size: 0.75rem;
    color: var(--secondary-color);
}

/* Department Overview */
.department-overview {
    display: grid;
    gap: 1rem;
}

.department-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    background: var(--light-color);
    border-radius: 0.75rem;
}

.dept-info h6 {
    margin: 0 0 0.25rem 0;
    font-weight: 600;
}

.dept-count {
    font-size: 0.875rem;
    color: var(--secondary-color);
}

.dept-progress {
    text-align: right;
}

.progress {
    width: 150px;
    height: 8px;
    background: #e2e8f0;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--success-color), var(--primary-color));
    border-radius: 4px;
    transition: width 0.3s ease;
}

.progress-text {
    font-size: 0.75rem;
    color: var(--secondary-color);
}

/* Events Grid */
.events-grid {
    display: grid;
    gap: 1rem;
}

.event-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: var(--light-color);
    border-radius: var(--border-radius);
    transition: all 0.3s;
}

.event-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.event-date {
    text-align: center;
    background: var(--primary-color);
    color: white;
    padding: 1rem;
    border-radius: 0.75rem;
    min-width: 80px;
}

.event-date .day {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
}

.event-date .month {
    display: block;
    font-size: 0.875rem;
    text-transform: uppercase;
    opacity: 0.9;
}

.event-content {
    flex: 1;
}

.event-content h6 {
    margin: 0 0 0.25rem 0;
    font-weight: 600;
}

.event-content p {
    margin: 0 0 0.5rem 0;
    font-size: 0.875rem;
    color: var(--secondary-color);
}

.event-time {
    font-size: 0.75rem;
    color: var(--primary-color);
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .welcome-title {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .quick-actions-grid {
        grid-template-columns: 1fr;
    }
    
    .department-overview {
        grid-template-columns: 1fr;
    }
    
    .events-grid {
        grid-template-columns: 1fr;
    }
    
    .event-item {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<?php include 'views/layout/footer.php'; ?>
