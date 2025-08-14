<?php
$pageTitle = 'Bordro Düzenle - İnsan Kaynakları Sistemi';

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
    'period' => '2024-01',
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
                    <i class="fas fa-edit me-2"></i>
                    Bordro Düzenle
                </h1>
                <p class="text-muted">Bordro bilgilerini güncelleyin</p>
            </div>
            <div>
                <a href="index.php?page=payroll" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=payroll-view&id=<?= $id ?>" class="btn btn-info">
                    <i class="fas fa-eye me-1"></i>
                    Görüntüle
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-invoice-dollar me-2"></i>
                    Bordro Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="#" id="editPayrollForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($payroll['id']) ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="employee_name" class="form-label">Çalışan Adı</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" value="<?= htmlspecialchars($payroll['employee_name']) ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employee_number" class="form-label">Sicil No</label>
                            <input type="text" class="form-control" id="employee_number" name="employee_number" value="<?= htmlspecialchars($payroll['employee_number']) ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Departman</label>
                            <input type="text" class="form-control" id="department" name="department" value="<?= htmlspecialchars($payroll['department']) ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="period" class="form-label">Dönem *</label>
                            <input type="month" class="form-control" id="period" name="period" value="<?= htmlspecialchars($payroll['period']) ?>" required>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3 text-primary">
                        <i class="fas fa-calculator me-2"></i>
                        Maaş Hesaplamaları
                    </h6>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gross_salary" class="form-label">Brüt Maaş (₺) *</label>
                            <input type="number" class="form-control" id="gross_salary" name="gross_salary" step="0.01" min="0" value="<?= htmlspecialchars($payroll['gross_salary']) ?>" required onchange="calculateNetSalary()">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tax_rate" class="form-label">Vergi Oranı (%)</label>
                            <input type="number" class="form-control" id="tax_rate" name="tax_rate" step="0.1" min="0" max="100" value="<?= htmlspecialchars($payroll['tax_rate']) ?>" onchange="calculateNetSalary()">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sgk_rate" class="form-label">SGK Oranı (%)</label>
                            <input type="number" class="form-control" id="sgk_rate" name="sgk_rate" step="0.1" min="0" max="100" value="<?= htmlspecialchars($payroll['sgk_rate']) ?>" onchange="calculateNetSalary()">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="working_days" class="form-label">Çalışma Günü</label>
                            <input type="number" class="form-control" id="working_days" name="working_days" min="1" max="31" value="<?= htmlspecialchars($payroll['working_days']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="overtime_hours" class="form-label">Mesai Saati</label>
                            <input type="number" class="form-control" id="overtime_hours" name="overtime_hours" min="0" step="0.5" value="<?= htmlspecialchars($payroll['overtime_hours']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="overtime_rate" class="form-label">Mesai Ücreti (₺/saat)</label>
                            <input type="number" class="form-control" id="overtime_rate" name="overtime_rate" step="0.01" min="0" value="<?= htmlspecialchars($payroll['overtime_rate']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bonuses" class="form-label">Ek Ödemeler (₺)</label>
                            <input type="number" class="form-control" id="bonuses" name="bonuses" step="0.01" min="0" value="<?= htmlspecialchars($payroll['bonuses']) ?>" onchange="calculateNetSalary()">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deductions" class="form-label">Kesintiler (₺)</label>
                            <input type="number" class="form-control" id="deductions" name="deductions" step="0.01" min="0" value="<?= htmlspecialchars($payroll['deductions']) ?>" onchange="calculateNetSalary()">
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3 text-primary">
                        <i class="fas fa-info-circle me-2"></i>
                        Hesaplanan Değerler
                    </h6>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Vergi Tutarı (₺)</label>
                            <input type="text" class="form-control" id="tax_amount_display" value="<?= number_format($payroll['tax_amount'], 2, ',', '.') ?>" readonly>
                            <input type="hidden" id="tax_amount" name="tax_amount" value="<?= htmlspecialchars($payroll['tax_amount']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">SGK Tutarı (₺)</label>
                            <input type="text" class="form-control" id="sgk_amount_display" value="<?= number_format($payroll['sgk_amount'], 2, ',', '.') ?>" readonly>
                            <input type="hidden" id="sgk_amount" name="sgk_amount" value="<?= htmlspecialchars($payroll['sgk_amount']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Net Maaş (₺)</label>
                            <input type="text" class="form-control" id="net_salary_display" value="<?= number_format($payroll['net_salary'], 2, ',', '.') ?>" readonly>
                            <input type="hidden" id="net_salary" name="net_salary" value="<?= htmlspecialchars($payroll['net_salary']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Durum</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Hazırlandı" <?= $payroll['status'] == 'Hazırlandı' ? 'selected' : '' ?>>Hazırlandı</option>
                                <option value="Onaylandı" <?= $payroll['status'] == 'Onaylandı' ? 'selected' : '' ?>>Onaylandı</option>
                                <option value="Ödendi" <?= $payroll['status'] == 'Ödendi' ? 'selected' : '' ?>>Ödendi</option>
                                <option value="İptal Edildi" <?= $payroll['status'] == 'İptal Edildi' ? 'selected' : '' ?>>İptal Edildi</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="notes" class="form-label">Notlar</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"><?= htmlspecialchars($payroll['notes']) ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Değişiklikleri Kaydet
                            </button>
                            <button type="button" class="btn btn-secondary ms-2" onclick="resetForm()">
                                <i class="fas fa-undo me-2"></i>
                                Sıfırla
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Form handling
document.getElementById('editPayrollForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show success message
    showToast('Bordro bilgileri başarıyla güncellendi', 'success');
    
    // Redirect to view page after a short delay
    setTimeout(() => {
        window.location.href = 'index.php?page=payroll-view&id=<?= $id ?>';
    }, 1500);
});

function resetForm() {
    if (confirm('Formu sıfırlamak istediğinizden emin misiniz?')) {
        document.getElementById('editPayrollForm').reset();
        showToast('Form sıfırlandı', 'info');
    }
}

// Net maaş hesaplama
function calculateNetSalary() {
    const grossSalary = parseFloat(document.getElementById('gross_salary').value) || 0;
    const taxRate = parseFloat(document.getElementById('tax_rate').value) || 0;
    const sgkRate = parseFloat(document.getElementById('sgk_rate').value) || 0;
    const bonuses = parseFloat(document.getElementById('bonuses').value) || 0;
    const deductions = parseFloat(document.getElementById('deductions').value) || 0;
    
    const taxAmount = (grossSalary * taxRate) / 100;
    const sgkAmount = (grossSalary * sgkRate) / 100;
    const netSalary = grossSalary - taxAmount - sgkAmount + bonuses - deductions;
    
    // Display calculated values
    document.getElementById('tax_amount_display').value = taxAmount.toFixed(2).replace('.', ',');
    document.getElementById('tax_amount').value = taxAmount.toFixed(2);
    document.getElementById('sgk_amount_display').value = sgkAmount.toFixed(2).replace('.', ',');
    document.getElementById('sgk_amount').value = sgkAmount.toFixed(2);
    document.getElementById('net_salary_display').value = netSalary.toFixed(2).replace('.', ',');
    document.getElementById('net_salary').value = netSalary.toFixed(2);
}

// Auto-save functionality
let autoSaveTimer;
const formInputs = document.querySelectorAll('#editPayrollForm input, #editPayrollForm select, #editPayrollForm textarea');

formInputs.forEach(input => {
    input.addEventListener('input', function() {
        clearTimeout(autoSaveTimer);
        autoSaveTimer = setTimeout(() => {
            // Auto-save logic would go here
            console.log('Auto-saving...');
        }, 2000);
    });
});

// Initial calculation
calculateNetSalary();
</script>

<?php include 'views/layout/footer.php'; ?>
