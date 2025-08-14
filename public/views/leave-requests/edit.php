<?php
$pageTitle = 'İzin Kaydı Düzenle - İnsan Kaynakları Sistemi';

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
                    <i class="fas fa-edit me-2"></i>
                    İzin Kaydı Düzenle
                </h1>
                <p class="text-muted">İzin kaydı bilgilerini güncelleyin</p>
            </div>
            <div>
                <a href="index.php?page=leave-requests" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=leave-view&id=<?= $id ?>" class="btn btn-info">
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
                    <i class="fas fa-calendar-alt me-2"></i>
                    İzin Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="#" id="editLeaveForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($leave['id']) ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="leave_type" class="form-label">İzin Türü *</label>
                            <select class="form-control" id="leave_type" name="leave_type" required>
                                <option value="">İzin Türü Seçin</option>
                                <option value="Yıllık İzin" <?= $leave['leave_type'] == 'Yıllık İzin' ? 'selected' : '' ?>>Yıllık İzin</option>
                                <option value="Hastalık İzni" <?= $leave['leave_type'] == 'Hastalık İzni' ? 'selected' : '' ?>>Hastalık İzni</option>
                                <option value="Mazeret İzni" <?= $leave['leave_type'] == 'Mazeret İzni' ? 'selected' : '' ?>>Mazeret İzni</option>
                                <option value="Ücretsiz İzin" <?= $leave['leave_type'] == 'Ücretsiz İzin' ? 'selected' : '' ?>>Ücretsiz İzin</option>
                                <option value="Mesai" <?= $leave['leave_type'] == 'Mesai' ? 'selected' : '' ?>>Mesai</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Durum</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Beklemede" <?= $leave['status'] == 'Beklemede' ? 'selected' : '' ?>>Beklemede</option>
                                <option value="Onaylandı" <?= $leave['status'] == 'Onaylandı' ? 'selected' : '' ?>>Onaylandı</option>
                                <option value="Reddedildi" <?= $leave['status'] == 'Reddedildi' ? 'selected' : '' ?>>Reddedildi</option>
                                <option value="İptal Edildi" <?= $leave['status'] == 'İptal Edildi' ? 'selected' : '' ?>>İptal Edildi</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label">Başlangıç Tarihi *</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= htmlspecialchars($leave['start_date']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_date" class="form-label">Bitiş Tarihi *</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= htmlspecialchars($leave['end_date']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="total_days" class="form-label">Toplam Gün *</label>
                            <input type="number" class="form-control" id="total_days" name="total_days" value="<?= htmlspecialchars($leave['total_days']) ?>" min="0.5" step="0.5" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="request_date" class="form-label">Talep Tarihi</label>
                            <input type="date" class="form-control" id="request_date" name="request_date" value="<?= htmlspecialchars($leave['request_date']) ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="reason" class="form-label">İzin Sebebi *</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required><?= htmlspecialchars($leave['reason']) ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="notes" class="form-label">Notlar</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"><?= htmlspecialchars($leave['notes']) ?></textarea>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3 text-primary">
                        <i class="fas fa-user me-2"></i>
                        Çalışan Bilgileri
                    </h6>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="employee_name" class="form-label">Çalışan Adı</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" value="<?= htmlspecialchars($leave['employee_name']) ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employee_number" class="form-label">Sicil No</label>
                            <input type="text" class="form-control" id="employee_number" name="employee_number" value="<?= htmlspecialchars($leave['employee_number']) ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Departman</label>
                            <input type="text" class="form-control" id="department" name="department" value="<?= htmlspecialchars($leave['department']) ?>" readonly>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3 text-primary">
                        <i class="fas fa-check-circle me-2"></i>
                        Onay Bilgileri
                    </h6>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="approved_by" class="form-label">Onaylayan</label>
                            <input type="text" class="form-control" id="approved_by" name="approved_by" value="<?= htmlspecialchars($leave['approved_by']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="approved_date" class="form-label">Onay Tarihi</label>
                            <input type="date" class="form-control" id="approved_date" name="approved_date" value="<?= htmlspecialchars($leave['approved_date']) ?>">
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
document.getElementById('editLeaveForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show success message
    showToast('İzin kaydı başarıyla güncellendi', 'success');
    
    // Redirect to view page after a short delay
    setTimeout(() => {
        window.location.href = 'index.php?page=leave-view&id=<?= $id ?>';
    }, 1500);
});

function resetForm() {
    if (confirm('Formu sıfırlamak istediğinizden emin misiniz?')) {
        document.getElementById('editLeaveForm').reset();
        showToast('Form sıfırlandı', 'info');
    }
}

// Auto-calculate total days when dates change
document.getElementById('start_date').addEventListener('change', calculateDays);
document.getElementById('end_date').addEventListener('change', calculateDays);

function calculateDays() {
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;
    
    if (startDate && endDate) {
        const start = new Date(startDate);
        const end = new Date(endDate);
        const diffTime = Math.abs(end - start);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both start and end dates
        
        if (diffDays > 0) {
            document.getElementById('total_days').value = diffDays;
        }
    }
}

// Auto-save functionality
let autoSaveTimer;
const formInputs = document.querySelectorAll('#editLeaveForm input, #editLeaveForm select, #editLeaveForm textarea');

formInputs.forEach(input => {
    input.addEventListener('input', function() {
        clearTimeout(autoSaveTimer);
        autoSaveTimer = setTimeout(() => {
            // Auto-save logic would go here
            console.log('Auto-saving...');
        }, 2000);
    });
});
</script>

<?php include 'views/layout/footer.php'; ?>
