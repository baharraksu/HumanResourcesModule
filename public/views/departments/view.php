<?php
$pageTitle = 'Departman Detayı - İnsan Kaynakları Sistemi';

// Departman ID'sini al
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php?page=departments');
    exit;
}

// Departman bilgilerini al (bu kısım daha sonra implement edilecek)
$department = [
    'id' => $id,
    'name' => 'Mutfak',
    'code' => 'MUT',
    'manager' => 'Ahmet Yılmaz',
    'manager_email' => 'ahmet.yilmaz@firma.com',
    'manager_phone' => '+90 555 123 45 67',
    'employee_count' => 25,
    'budget' => 150000.00,
    'status' => 'Aktif',
    'created_date' => '2020-01-15',
    'description' => 'Restoran mutfak operasyonları ve yemek hazırlama süreçleri',
    'location' => 'Ana Bina -1. Kat',
    'working_hours' => '06:00 - 23:00'
];

include 'views/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-building me-2"></i>
                    Departman Detayı
                </h1>
                <p class="text-muted">Departman bilgilerini görüntüleyin</p>
            </div>
            <div>
                <a href="index.php?page=departments" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=departments-edit&id=<?= $id ?>" class="btn btn-primary">
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
                        <label class="form-label fw-bold text-muted">Departman Adı</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($department['name']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Departman Kodu</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-primary"><?= htmlspecialchars($department['code']) ?></span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext">
                            <span class="status-badge active"><?= htmlspecialchars($department['status']) ?></span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Oluşturulma Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($department['created_date'])) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışan Sayısı</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-info"><?= htmlspecialchars($department['employee_count']) ?> kişi</span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Yıllık Bütçe</label>
                        <p class="form-control-plaintext"><?= number_format($department['budget'], 2, ',', '.') ?> ₺</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Lokasyon</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($department['location']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışma Saatleri</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($department['working_hours']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Açıklama</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($department['description']) ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-tie me-2"></i>
                    Yönetici Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Yönetici Adı</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($department['manager']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">E-posta</label>
                        <p class="form-control-plaintext">
                            <a href="mailto:<?= htmlspecialchars($department['manager_email']) ?>"><?= htmlspecialchars($department['manager_email']) ?></a>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Telefon</label>
                        <p class="form-control-plaintext">
                            <a href="tel:<?= htmlspecialchars($department['manager_phone']) ?>"><?= htmlspecialchars($department['manager_phone']) ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-chart-pie me-2"></i>
                    İstatistikler
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-primary"><?= $department['employee_count'] ?></div>
                            <div class="stat-label text-muted">Toplam Çalışan</div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-success"><?= round($department['budget'] / 1000, 1) ?>K</div>
                            <div class="stat-label text-muted">Bütçe (₺)</div>
                        </div>
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning">85%</div>
                            <div class="stat-label text-muted">Doluluk Oranı</div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-info">4.2</div>
                            <div class="stat-label text-muted">Ortalama Performans</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-users me-2"></i>
                    Son Eklenen Çalışanlar
                </h6>
            </div>
            <div class="card-body">
                <div class="recent-employees">
                    <div class="employee-item">
                        <div class="employee-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="employee-info">
                            <h6 class="employee-name">Mehmet Demir</h6>
                            <span class="employee-position">Aşçı</span>
                        </div>
                        <span class="hire-date">2 gün önce</span>
                    </div>
                    
                    <div class="employee-item">
                        <div class="employee-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="employee-info">
                            <h6 class="employee-name">Fatma Özkan</h6>
                            <span class="employee-position">Yardımcı Aşçı</span>
                        </div>
                        <span class="hire-date">1 hafta önce</span>
                    </div>
                    
                    <div class="employee-item">
                        <div class="employee-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="employee-info">
                            <h6 class="employee-name">Ali Yıldız</h6>
                            <span class="employee-position">Temizlik Görevlisi</span>
                        </div>
                        <span class="hire-date">2 hafta önce</span>
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

.recent-employees {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.employee-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    border-radius: 0.5rem;
    background: #f8f9fa;
}

.employee-avatar {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: var(--primary-color);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.employee-info {
    flex: 1;
}

.employee-name {
    font-size: 0.875rem;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
}

.employee-position {
    font-size: 0.75rem;
    color: #6c757d;
}

.hire-date {
    font-size: 0.75rem;
    color: #6c757d;
    white-space: nowrap;
}
</style>

<?php include 'views/layout/footer.php'; ?>
