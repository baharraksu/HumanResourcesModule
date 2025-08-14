<?php
$pageTitle = 'Raporlar - İnsan Kaynakları Sistemi';
$currentPage = 'reports';
$breadcrumb = 'Raporlar';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-chart-bar me-2"></i>Raporlar
            </h1>
            <p class="page-subtitle">Detaylı analiz ve raporlar ile iş süreçlerinizi optimize edin</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" onclick="generateReport()">
                <i class="fas fa-plus me-2"></i>Yeni Rapor
            </button>
            <button class="btn btn-outline-secondary ms-2" onclick="exportAllReports()">
                <i class="fas fa-download me-2"></i>Tümünü İndir
            </button>
        </div>
    </div>
</div>

<!-- Report Statistics -->
<div class="stats-grid mb-4">
    <div class="stat-card primary">
        <div class="stat-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">24</div>
            <div class="stat-label">Toplam Rapor</div>
        </div>
    </div>

    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">156</div>
            <div class="stat-label">Çalışan Analizi</div>
        </div>
    </div>

    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">89%</div>
            <div class="stat-label">Devam Oranı</div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">₺2.4M</div>
            <div class="stat-label">Toplam Maaş</div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-line me-2"></i>Aylık Çalışan Performansı</h5>
            </div>
            <div class="card-body">
                <canvas id="performanceChart" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-pie me-2"></i>Departman Dağılımı</h5>
            </div>
            <div class="card-body">
                <canvas id="departmentChart" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Report Categories -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-users me-2"></i>Çalışan Raporları</h5>
            </div>
            <div class="card-body">
                <div class="report-category">
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="report-content">
                            <h6>Yeni İşe Alımlar</h6>
                            <p>Bu ay işe alınan çalışanların detaylı analizi</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="generateReport('new-hires')">Oluştur</button>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="fas fa-user-minus"></i>
                        </div>
                        <div class="report-content">
                            <h6>İşten Ayrılanlar</h6>
                            <p>İşten ayrılan çalışanların nedenleri ve analizi</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="generateReport('turnover')">Oluştur</button>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="report-content">
                            <h6>Eğitim ve Gelişim</h6>
                            <p>Çalışan eğitim programları ve gelişim raporu</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="generateReport('training')">Oluştur</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-area me-2"></i>Operasyonel Raporlar</h5>
            </div>
            <div class="card-body">
                <div class="report-category">
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="report-content">
                            <h6>Devam Takibi</h6>
                            <p>Günlük, haftalık ve aylık devam istatistikleri</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="generateReport('attendance')">Oluştur</button>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="report-content">
                            <h6>İzin Analizi</h6>
                            <p>İzin türleri ve kullanım oranları analizi</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="generateReport('leave-analysis')">Oluştur</button>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="report-content">
                            <h6>Maaş Analizi</h6>
                            <p>Departman bazında maaş dağılımı ve trendler</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="generateReport('salary-analysis')">Oluştur</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Reports -->
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-history me-2"></i>Son Oluşturulan Raporlar</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Rapor Adı</th>
                        <th>Tür</th>
                        <th>Oluşturan</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ocak 2024 Devam Raporu</td>
                        <td><span class="badge bg-info">Devam Takibi</span></td>
                        <td>Admin User</td>
                        <td>01.02.2024 14:30</td>
                        <td><span class="badge bg-success">Tamamlandı</span></td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="downloadReport(1)">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-info" onclick="viewReport(1)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2023 Yılı İşe Alım Analizi</td>
                        <td><span class="badge bg-primary">İşe Alım</span></td>
                        <td>HR Manager</td>
                        <td>31.01.2024 16:45</td>
                        <td><span class="badge bg-success">Tamamlandı</span></td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="downloadReport(2)">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-info" onclick="viewReport(2)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Q4 2023 Performans Değerlendirmesi</td>
                        <td><span class="badge bg-warning">Performans</span></td>
                        <td>Performance Team</td>
                        <td>30.01.2024 11:20</td>
                        <td><span class="badge bg-warning">İşleniyor</span></td>
                        <td>
                            <button class="btn btn-sm btn-warning" disabled>
                                <i class="fas fa-spinner fa-spin"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.report-category {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.report-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    transition: all 0.2s;
}

.report-item:hover {
    border-color: var(--primary-color);
    box-shadow: var(--shadow);
}

.report-icon {
    width: 3rem;
    height: 3rem;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 1.25rem;
}

.report-content {
    flex: 1;
}

.report-content h6 {
    margin-bottom: 0.25rem;
    color: var(--dark-color);
}

.report-content p {
    margin-bottom: 0.5rem;
    color: var(--secondary-color);
    font-size: 0.875rem;
}
</style>

<script>
// Performance Chart
const performanceCtx = document.getElementById('performanceChart').getContext('2d');
new Chart(performanceCtx, {
    type: 'line',
    data: {
        labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran'],
        datasets: [{
            label: 'Ortalama Performans',
            data: [85, 87, 89, 88, 91, 93],
            borderColor: 'rgb(79, 70, 229)',
            backgroundColor: 'rgba(79, 70, 229, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});

// Department Chart
const departmentCtx = document.getElementById('departmentChart').getContext('2d');
new Chart(departmentCtx, {
    type: 'doughnut',
    data: {
        labels: ['Usta', 'Mutfak', 'Temizlik', 'Sekreter', 'Finans', 'Mühendis', 'Bilişimci', 'Muhasebe', 'İK'],
        datasets: [{
            data: [20, 25, 15, 10, 8, 12, 8, 10, 5],
            backgroundColor: [
                '#4f46e5',
                '#10b981',
                '#f59e0b',
                '#06b6d4',
                '#ef4444'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

function generateReport(type) {
    showToast(`${type} raporu oluşturuluyor...`, 'info');
}

function downloadReport(id) {
    showToast('Rapor indiriliyor...', 'success');
}

function viewReport(id) {
    showToast('Rapor görüntüleniyor...', 'info');
}

function exportAllReports() {
    showToast('Tüm raporlar indiriliyor...', 'info');
}
</script>

<?php include 'views/layout/footer.php'; ?>
