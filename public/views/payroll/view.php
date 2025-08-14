<?php
$pageTitle = 'Bordro Detayı - İnsan Kaynakları Sistemi';

// Bordro ID'sini al
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php?page=payroll');
    exit;
}

// Bordro bilgilerini al (bu kısım daha sonra implement edilecek)
$payroll = [
    'id' => $id,
    'employee_name' => 'Ahmet Yılmaz',
    'employee_number' => 'EMP001',
    'department' => 'Mutfak',
    'period' => 'Ocak 2024',
    'gross_salary' => 12000.00,
    'tax_rate' => 15,
    'sgk_rate' => 10,
    'tax_amount' => 1800.00,
    'sgk_amount' => 1200.00,
    'net_salary' => 9000.00,
    'bonuses' => 300.00,
    'deductions' => 150.00,
    'status' => 'Onaylandı',
    'created_date' => '2024-01-15',
    'approved_by' => 'Fatma Özkan (İK)',
    'approved_date' => '2024-01-16',
    'notes' => 'Ocak ayı bordrosu başarıyla hazırlandı ve onaylandı.',
    'working_days' => 22,
    'overtime_hours' => 8,
    'overtime_rate' => 25.00
];

include 'views/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-file-invoice-dollar me-2"></i>
                    Bordro Detayı
                </h1>
                <p class="text-muted">Bordro bilgilerini görüntüleyin</p>
            </div>
            <div>
                <a href="index.php?page=payroll" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=payroll-edit&id=<?= $id ?>" class="btn btn-primary">
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
                    Bordro Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Dönem</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-primary"><?= htmlspecialchars($payroll['period']) ?></span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext">
                            <span class="status-badge active"><?= htmlspecialchars($payroll['status']) ?></span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Brüt Maaş</label>
                        <p class="form-control-plaintext"><?= number_format($payroll['gross_salary'], 2, ',', '.') ?> ₺</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Net Maaş</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-success"><?= number_format($payroll['net_salary'], 2, ',', '.') ?> ₺</span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Vergi Kesintisi</label>
                        <p class="form-control-plaintext text-danger">-<?= number_format($payroll['tax_amount'], 2, ',', '.') ?> ₺</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">SGK Kesintisi</label>
                        <p class="form-control-plaintext text-danger">-<?= number_format($payroll['sgk_amount'], 2, ',', '.') ?> ₺</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Ek Ödemeler</label>
                        <p class="form-control-plaintext text-success">+<?= number_format($payroll['bonuses'], 2, ',', '.') ?> ₺</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Kesintiler</label>
                        <p class="form-control-plaintext text-danger">-<?= number_format($payroll['deductions'], 2, ',', '.') ?> ₺</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışma Günü</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['working_days']) ?> gün</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Mesai Saati</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['overtime_hours']) ?> saat</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Notlar</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['notes']) ?></p>
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
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['employee_name']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Sicil No</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['employee_number']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Departman</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['department']) ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow mb-4">
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
                        <p class="form-control-plaintext"><?= htmlspecialchars($payroll['approved_by']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Onay Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($payroll['approved_date'])) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Oluşturulma Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($payroll['created_date'])) ?></p>
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
                    Maaş Dağılımı
                </h6>
            </div>
            <div class="card-body">
                <canvas id="salaryChart" width="300" height="300"></canvas>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-tools me-2"></i>
                    Hızlı İşlemler
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-success" onclick="downloadPayslip(<?= $id ?>)">
                        <i class="fas fa-download me-2"></i>
                        Bordro İndir
                    </button>
                    <button class="btn btn-info" onclick="printPayslip(<?= $id ?>)">
                        <i class="fas fa-print me-2"></i>
                        Bordro Yazdır
                    </button>
                    <button class="btn btn-warning" onclick="sendPayslip(<?= $id ?>)">
                        <i class="fas fa-envelope me-2"></i>
                        E-posta Gönder
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Maaş dağılımı grafiği
const ctx = document.getElementById('salaryChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Net Maaş', 'Vergi', 'SGK', 'Ek Ödemeler'],
        datasets: [{
            data: [
                <?= $payroll['net_salary'] ?>,
                <?= $payroll['tax_amount'] ?>,
                <?= $payroll['sgk_amount'] ?>,
                <?= $payroll['bonuses'] ?>
            ],
            backgroundColor: [
                '#28a745',
                '#dc3545',
                '#ffc107',
                '#17a2b8'
            ],
            borderWidth: 2,
            borderColor: '#fff'
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

// Hızlı işlemler
function downloadPayslip(id) {
    showToast('Bordro indiriliyor...', 'info');
    // Burada indirme işlemi implement edilecek
}

function printPayslip(id) {
    showToast('Bordro yazdırılıyor...', 'info');
    // Burada yazdırma işlemi implement edilecek
}

function sendPayslip(id) {
    showToast('Bordro e-posta ile gönderiliyor...', 'info');
    // Burada e-posta gönderme işlemi implement edilecek
}
</script>

<?php include 'views/layout/footer.php'; ?>
