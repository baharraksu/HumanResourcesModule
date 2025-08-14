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

<!-- New Reports List -->
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-list me-2"></i>Yeni Oluşturulan Raporlar</h5>
    </div>
    <div class="card-body">
        <div id="reportsList">
            <!-- New reports will be added here dynamically -->
            <div class="text-center text-muted py-4">
                <i class="fas fa-file-alt fa-3x mb-3"></i>
                <p>Henüz rapor oluşturulmadı</p>
                <p class="small">Rapor oluşturmak için yukarıdaki butonları kullanın</p>
            </div>
        </div>
    </div>
</div>

<!-- Report Details Modal -->
<div class="modal fade" id="reportDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rapor Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Rapor Adı</label>
                        <p class="form-control-plaintext" id="reportDetailName">-</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Rapor Türü</label>
                        <p class="form-control-plaintext" id="reportDetailType">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Oluşturulma Tarihi</label>
                        <p class="form-control-plaintext" id="reportDetailDate">-</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext" id="reportDetailStatus">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Açıklama</label>
                        <p class="form-control-plaintext" id="reportDetailDescription">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold text-muted">Toplam Çalışan</label>
                        <p class="form-control-plaintext" id="reportDetailEmployees">-</p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold text-muted">Aktif Çalışan</label>
                        <p class="form-control-plaintext" id="reportDetailActive">-</p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold text-muted">Departman</label>
                        <p class="form-control-plaintext" id="reportDetailDepartments">-</p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold text-muted">Ort. Performans</label>
                        <p class="form-control-plaintext" id="reportDetailPerformance">-</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="downloadReport(1)">İndir</button>
            </div>
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

function generateReport(type = 'general') {
    // Rapor türüne göre Türkçe isim belirle
    const reportNames = {
        'general': 'Genel Rapor',
        'new-hires': 'Yeni İşe Alımlar Raporu',
        'turnover': 'İşten Ayrılanlar Raporu',
        'training': 'Eğitim ve Gelişim Raporu',
        'attendance': 'Devam Takibi Raporu',
        'leave-analysis': 'İzin Analizi Raporu',
        'salary-analysis': 'Maaş Analizi Raporu',
        'performance': 'Performans Raporu',
        'financial': 'Finansal Rapor',
        'employee': 'Çalışan Raporu'
    };
    
    const reportName = reportNames[type] || `${type.charAt(0).toUpperCase() + type.slice(1)} Raporu`;
    
    showToast(`${reportName} oluşturuluyor...`, 'info');
    
    // Rapor oluşturma simülasyonu
    setTimeout(() => {
        const reportId = Date.now();
        const reportData = {
            id: reportId,
            type: type,
            name: reportName,
            date: new Date().toLocaleDateString('tr-TR'),
            status: 'Tamamlandı'
        };
        
        // Yeni raporu listeye ekle
        addReportToList(reportData);
        
        // Son oluşturulan raporlar tablosuna da ekle
        addReportToRecentTable(reportData);
        
        showToast(`${reportName} başarıyla oluşturuldu`, 'success');
    }, 2000);
}

function downloadReport(id) {
    showToast('Rapor indiriliyor...', 'info');
    
    // Rapor indirme simülasyonu
    setTimeout(() => {
        const link = document.createElement('a');
        
        // Rapor türüne göre dosya adı oluştur
        const reportTypes = {
            'new-hires': 'Yeni_Ise_Alimlar',
            'turnover': 'Isten_Ayrilanlar',
            'training': 'Egitim_ve_Gelisim',
            'attendance': 'Devam_Takibi',
            'leave-analysis': 'Izin_Analizi',
            'salary-analysis': 'Maas_Analizi',
            'performance': 'Performans',
            'financial': 'Finansal',
            'employee': 'Calisan',
            'general': 'Genel'
        };
        
        const reportType = reportTypes[id] || 'Rapor';
        const fileName = `${reportType}_Raporu_${new Date().toLocaleDateString('tr-TR').replace(/\./g, '-')}.csv`;
        
        link.href = 'data:text/csv;charset=utf-8,Report ID,Type,Name,Date,Status\n' + 
                    `${id},${reportType},${reportType} Raporu,${new Date().toLocaleDateString('tr-TR')},Tamamlandı`;
        link.download = fileName;
        link.click();
        
        showToast('Rapor başarıyla indirildi', 'success');
    }, 1500);
}

function viewReport(id) {
    // Rapor detayları modal'ını göster
    const modal = new bootstrap.Modal(document.getElementById('reportDetailsModal'));
    
    // Rapor türüne göre açıklama ve metrikler belirle
    const reportDetails = {
        'new-hires': {
            name: 'Yeni İşe Alımlar Raporu',
            type: 'İşe Alım',
            description: 'Bu rapor yeni işe alınan çalışanların detaylı analizini ve işe alım trendlerini içerir.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        },
        'turnover': {
            name: 'İşten Ayrılanlar Raporu',
            type: 'İşten Ayrılma',
            description: 'Bu rapor işten ayrılan çalışanların nedenlerini ve işten ayrılma oranlarını analiz eder.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        },
        'training': {
            name: 'Eğitim ve Gelişim Raporu',
            type: 'Eğitim',
            description: 'Bu rapor çalışan eğitim programlarını, gelişim hedeflerini ve eğitim etkinliğini değerlendirir.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        },
        'attendance': {
            name: 'Devam Takibi Raporu',
            type: 'Devam Takibi',
            description: 'Bu rapor çalışanların giriş-çıkış saatlerini, devam oranlarını ve mesai durumlarını analiz eder.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        },
        'leave-analysis': {
            name: 'İzin Analizi Raporu',
            type: 'İzin Analizi',
            description: 'Bu rapor izin türlerini, kullanım oranlarını ve izin planlamasını değerlendirir.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        },
        'salary-analysis': {
            name: 'Maaş Analizi Raporu',
            type: 'Maaş Analizi',
            description: 'Bu rapor departman bazında maaş dağılımını, maaş trendlerini ve adalet analizini içerir.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        },
        'general': {
            name: 'Genel Rapor',
            type: 'Genel',
            description: 'Bu rapor genel sistem durumunu ve performans metriklerini içerir.',
            metrics: {
                total_employees: 156,
                active_employees: 142,
                departments: 9,
                avg_performance: 89
            }
        }
    };
    
    // Rapor verisini al (gerçek uygulamada API'den gelecek)
    const reportData = reportDetails['general'] || reportDetails['general']; // Varsayılan olarak genel rapor
    
    // Modal içeriğini doldur
    document.getElementById('reportDetailName').textContent = reportData.name;
    document.getElementById('reportDetailType').textContent = reportData.type;
    document.getElementById('reportDetailDate').textContent = new Date().toLocaleDateString('tr-TR');
    document.getElementById('reportDetailStatus').textContent = 'Tamamlandı';
    document.getElementById('reportDetailDescription').textContent = reportData.description;
    document.getElementById('reportDetailEmployees').textContent = reportData.metrics.total_employees;
    document.getElementById('reportDetailActive').textContent = reportData.metrics.active_employees;
    document.getElementById('reportDetailDepartments').textContent = reportData.metrics.departments;
    document.getElementById('reportDetailPerformance').textContent = reportData.metrics.avg_performance;
    
    modal.show();
}

function exportAllReports() {
    showToast('Tüm raporlar hazırlanıyor...', 'info');
    
    // Toplu export simülasyonu
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = 'data:text/csv;charset=utf-8,Report ID,Type,Name,Date,Status\n' +
                    '1,General,Genel Rapor,20.01.2024,Tamamlandı\n' +
                    '2,Employee,Çalışan Raporu,20.01.2024,Tamamlandı\n' +
                    '3,Performance,Performans Raporu,20.01.2024,Tamamlandı\n' +
                    '4,Financial,Finansal Rapor,20.01.2024,Tamamlandı';
        link.download = `tum_raporlar_${new Date().toLocaleDateString('tr-TR').replace(/\./g, '-')}.csv`;
        link.click();
        
        showToast('Tüm raporlar başarıyla indirildi', 'success');
    }, 3000);
}

// Function to add new report to table
function addReportToList(reportData) {
    const reportsList = document.getElementById('reportsList');
    if (!reportsList) return;
    
    // Eğer "Henüz rapor oluşturulmadı" mesajı varsa kaldır
    const noReportsMessage = reportsList.querySelector('.text-center.text-muted');
    if (noReportsMessage) {
        noReportsMessage.remove();
    }
    
    const reportItem = document.createElement('div');
    reportItem.className = 'report-item';
    reportItem.innerHTML = `
        <div class="report-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="report-content">
            <h6>${reportData.name}</h6>
            <p>Oluşturulma: ${reportData.date}</p>
            <p>Durum: <span class="badge bg-success">${reportData.status}</span></p>
        </div>
        <div class="report-actions">
            <button class="btn btn-sm btn-outline-primary" onclick="viewReport(${reportData.id})">
                <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-sm btn-outline-success" onclick="downloadReport(${reportData.id})">
                <i class="fas fa-download"></i>
            </button>
        </div>
    `;
    
    reportsList.insertBefore(reportItem, reportsList.firstChild);
}

// Function to add report to recent reports table
function addReportToRecentTable(reportData) {
    const recentTable = document.querySelector('.table tbody');
    if (!recentTable) return;
    
    // Rapor türüne göre badge rengi belirle
    const typeBadges = {
        'new-hires': 'bg-primary',
        'turnover': 'bg-warning',
        'training': 'bg-info',
        'attendance': 'bg-success',
        'leave-analysis': 'bg-secondary',
        'salary-analysis': 'bg-danger',
        'performance': 'bg-warning',
        'financial': 'bg-success',
        'employee': 'bg-primary',
        'general': 'bg-info'
    };
    
    const badgeClass = typeBadges[reportData.type] || 'bg-info';
    const typeLabels = {
        'new-hires': 'İşe Alım',
        'turnover': 'İşten Ayrılma',
        'training': 'Eğitim',
        'attendance': 'Devam Takibi',
        'leave-analysis': 'İzin Analizi',
        'salary-analysis': 'Maaş Analizi',
        'performance': 'Performans',
        'financial': 'Finansal',
        'employee': 'Çalışan',
        'general': 'Genel'
    };
    
    const typeLabel = typeLabels[reportData.type] || reportData.type;
    
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${reportData.name}</td>
        <td><span class="badge ${badgeClass}">${typeLabel}</span></td>
        <td>Admin User</td>
        <td>${reportData.date}</td>
        <td><span class="badge bg-success">${reportData.status}</span></td>
        <td>
            <button class="btn btn-sm btn-success" onclick="downloadReport(${reportData.id})">
                <i class="fas fa-download"></i>
            </button>
            <button class="btn btn-sm btn-info" onclick="viewReport(${reportData.id})">
                <i class="fas fa-eye"></i>
            </button>
        </td>
    `;
    
    // Yeni raporu tablonun en üstüne ekle
    recentTable.insertBefore(newRow, recentTable.firstChild);
    
    // Tabloda maksimum 10 satır olsun
    const rows = recentTable.querySelectorAll('tr');
    if (rows.length > 10) {
        recentTable.removeChild(rows[rows.length - 1]);
    }
}
</script>

<?php include 'views/layout/footer.php'; ?>
