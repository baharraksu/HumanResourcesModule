<?php
$pageTitle = 'Çalışan Detayı - İnsan Kaynakları Sistemi';

// Çalışan ID'sini al
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php?page=employees');
    exit;
}

// Çalışan bilgilerini al (bu kısım daha sonra implement edilecek)
$employee = [
    'id' => $id,
    'employee_number' => 'EMP001',
    'first_name' => 'Ahmet',
    'last_name' => 'Yılmaz',
    'email' => 'ahmet.yilmaz@firma.com',
    'phone' => '+90 555 123 45 67',
    'birth_date' => '1990-01-01',
    'hire_date' => '2020-01-15',
    'position' => 'Şef',
    'department' => 'Mutfak',
    'salary' => 8500.00,
    'status' => 'Aktif',
    'address' => 'İstanbul, Türkiye',
    'emergency_contact' => 'Ayşe Yılmaz (Eş) - +90 555 987 65 43'
];

include 'views/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user me-2"></i>
                    Çalışan Detayı
                </h1>
                <p class="text-muted">Çalışan bilgilerini görüntüleyin</p>
            </div>
            <div>
                <a href="index.php?page=employees" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=employees-edit&id=<?= $id ?>" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i>
                    Düzenle
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-info-circle me-2"></i>
                    Temel Bilgiler
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışan Numarası</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($employee['employee_number']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Ad Soyad</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($employee['first_name'] . ' ' . $employee['last_name']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">E-posta</label>
                        <p class="form-control-plaintext">
                            <a href="mailto:<?= htmlspecialchars($employee['email']) ?>"><?= htmlspecialchars($employee['email']) ?></a>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Telefon</label>
                        <p class="form-control-plaintext">
                            <a href="tel:<?= htmlspecialchars($employee['phone']) ?>"><?= htmlspecialchars($employee['phone']) ?></a>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Doğum Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($employee['birth_date'])) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">İşe Başlama Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($employee['hire_date'])) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Pozisyon</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($employee['position']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Departman</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-primary"><?= htmlspecialchars($employee['department']) ?></span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Maaş</label>
                        <p class="form-control-plaintext"><?= number_format($employee['salary'], 2, ',', '.') ?> ₺</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext">
                            <span class="status-badge active"><?= htmlspecialchars($employee['status']) ?></span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Adres</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($employee['address']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Acil Durum İletişim</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($employee['emergency_contact']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-chart-line me-2"></i>
                    İstatistikler
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-primary">3</div>
                            <div class="stat-label text-muted">Kullanılan İzin</div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-success">13</div>
                            <div class="stat-label text-muted">Kalan İzin</div>
                        </div>
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning">156</div>
                            <div class="stat-label text-muted">Mesai Saati</div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-info">98%</div>
                            <div class="stat-label text-muted">Devam Oranı</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-clock me-2"></i>
                    Son Aktiviteler
                </h6>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">İşe Giriş</h6>
                            <p class="timeline-text">Bugün 08:00</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker bg-warning"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Öğle Molası</h6>
                            <p class="timeline-text">Dün 12:00-13:00</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">İzin Talebi</h6>
                            <p class="timeline-text">2 gün önce</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-item {
    padding: 1rem;
    border-radius: 0.5rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.stat-number {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.875rem;
}

.timeline {
    position: relative;
    padding-left: 1rem;
}

.timeline-item {
    position: relative;
    padding-bottom: 1rem;
}

.timeline-marker {
    position: absolute;
    left: -1.5rem;
    top: 0.25rem;
    width: 0.75rem;
    height: 0.75rem;
    border-radius: 50%;
}

.timeline-content {
    margin-left: 0.5rem;
}

.timeline-title {
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.timeline-text {
    font-size: 0.75rem;
    color: #6c757d;
    margin: 0;
}
</style>

<?php include 'views/layout/footer.php'; ?>
