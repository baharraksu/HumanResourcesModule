<?php
$pageTitle = 'İzin Kaydı Detayı - İnsan Kaynakları Sistemi';

// İzin ID'sini al
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php?page=leave-requests');
    exit;
}

// İzin bilgilerini al (bu kısım daha sonra implement edilecek)
$leave = [
    'id' => $id,
    'employee_name' => 'Ahmet Yılmaz',
    'employee_number' => 'EMP001',
    'department' => 'Mutfak',
    'leave_type' => 'Yıllık İzin',
    'start_date' => '2024-01-15',
    'end_date' => '2024-01-19',
    'total_days' => 5,
    'status' => 'Onaylandı',
    'request_date' => '2024-01-10',
    'approved_by' => 'Fatma Özkan (İK)',
    'approved_date' => '2024-01-11',
    'reason' => 'Aile ziyareti için yıllık izin kullanımı',
    'notes' => 'Çalışan 5 günlük yıllık izin talebinde bulundu. Talebi uygun görülmüştür.',
    'remaining_leave' => 11,
    'used_leave' => 5
];

include 'views/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-calendar-alt me-2"></i>
                    İzin Kaydı Detayı
                </h1>
                <p class="text-muted">İzin kaydı bilgilerini görüntüleyin</p>
            </div>
            <div>
                <a href="index.php?page=leave-requests" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=leave-edit&id=<?= $id ?>" class="btn btn-primary">
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
                    İzin Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">İzin Türü</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-primary"><?= htmlspecialchars($leave['leave_type']) ?></span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext">
                            <span class="status-badge active"><?= htmlspecialchars($leave['status']) ?></span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Başlangıç Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($leave['start_date'])) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Bitiş Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($leave['end_date'])) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Toplam Gün</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-info"><?= htmlspecialchars($leave['total_days']) ?> gün</span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Talep Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($leave['request_date'])) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">İzin Sebebi</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($leave['reason']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Notlar</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($leave['notes']) ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user me-2"></i>
                    Çalışan Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışan Adı</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($leave['employee_name']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Sicil No</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($leave['employee_number']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Departman</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-secondary"><?= htmlspecialchars($leave['department']) ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-check-circle me-2"></i>
                    Onay Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Onaylayan</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($leave['approved_by']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Onay Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($leave['approved_date'])) ?></p>
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
                    İzin Durumu
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-success"><?= $leave['remaining_leave'] ?></div>
                            <div class="stat-label text-muted">Kalan İzin</div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning"><?= $leave['used_leave'] ?></div>
                            <div class="stat-label text-muted">Kullanılan İzin</div>
                        </div>
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-12 mb-3">
                        <div class="stat-item">
                            <div class="stat-number text-primary">16</div>
                            <div class="stat-label text-muted">Toplam İzin Hakkı</div>
                        </div>
                    </div>
                </div>
                
                <div class="progress mb-3" style="height: 8px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($leave['remaining_leave'] / 16) * 100 ?>%" aria-valuenow="<?= $leave['remaining_leave'] ?>" aria-valuemin="0" aria-valuemax="16"></div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= ($leave['used_leave'] / 16) * 100 ?>%" aria-valuenow="<?= $leave['used_leave'] ?>" aria-valuemin="0" aria-valuemax="16"></div>
                </div>
                
                <div class="d-flex justify-content-between text-muted small">
                    <span>Kalan: <?= $leave['remaining_leave'] ?> gün</span>
                    <span>Kullanılan: <?= $leave['used_leave'] ?> gün</span>
                </div>
            </div>
        </div>
        
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-clock me-2"></i>
                    Hızlı İşlemler
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary btn-sm" onclick="printLeave()">
                        <i class="fas fa-print me-2"></i>
                        Yazdır
                    </button>
                    <button class="btn btn-outline-success btn-sm" onclick="exportLeave()">
                        <i class="fas fa-download me-2"></i>
                        Dışa Aktar
                    </button>
                    <button class="btn btn-outline-info btn-sm" onclick="sendNotification()">
                        <i class="fas fa-bell me-2"></i>
                        Bildirim Gönder
                    </button>
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

.progress {
    background-color: #e9ecef;
    border-radius: 0.5rem;
}

.progress-bar {
    border-radius: 0.5rem;
}
</style>

<script>
function printLeave() {
    showToast('Yazdırma özelliği yakında eklenecek', 'info');
}

function exportLeave() {
    showToast('Dışa aktarma özelliği yakında eklenecek', 'info');
}

function sendNotification() {
    showToast('Bildirim gönderildi', 'success');
}
</script>

<?php include 'views/layout/footer.php'; ?>
