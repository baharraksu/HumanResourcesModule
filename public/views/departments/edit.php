<?php
$pageTitle = 'Departman Düzenle - İnsan Kaynakları Sistemi';

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
                    <i class="fas fa-edit me-2"></i>
                    Departman Düzenle
                </h1>
                <p class="text-muted">Departman bilgilerini güncelleyin</p>
            </div>
            <div>
                <a href="index.php?page=departments" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>
                    Geri Dön
                </a>
                <a href="index.php?page=departments-view&id=<?= $id ?>" class="btn btn-info">
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
                    <i class="fas fa-building me-2"></i>
                    Departman Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="#" id="editDepartmentForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($department['id']) ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Departman Adı *</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($department['name']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label">Departman Kodu *</label>
                            <input type="text" class="form-control" id="code" name="code" value="<?= htmlspecialchars($department['code']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Durum</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Aktif" <?= $department['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="Pasif" <?= $department['status'] == 'Pasif' ? 'selected' : '' ?>>Pasif</option>
                                <option value="Geçici" <?= $department['status'] == 'Geçici' ? 'selected' : '' ?>>Geçici</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="budget" class="form-label">Yıllık Bütçe (₺)</label>
                            <input type="number" class="form-control" id="budget" name="budget" step="0.01" min="0" value="<?= htmlspecialchars($department['budget']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="location" class="form-label">Lokasyon</label>
                            <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($department['location']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="working_hours" class="form-label">Çalışma Saatleri</label>
                            <input type="text" class="form-control" id="working_hours" name="working_hours" value="<?= htmlspecialchars($department['working_hours']) ?>" placeholder="Örn: 08:00 - 17:00">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($department['description']) ?></textarea>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3 text-primary">
                        <i class="fas fa-user-tie me-2"></i>
                        Yönetici Bilgileri
                    </h6>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="manager" class="form-label">Yönetici Adı</label>
                            <input type="text" class="form-control" id="manager" name="manager" value="<?= htmlspecialchars($department['manager']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="manager_email" class="form-label">Yönetici E-posta</label>
                            <input type="email" class="form-control" id="manager_email" name="manager_email" value="<?= htmlspecialchars($department['manager_email']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="manager_phone" class="form-label">Yönetici Telefon</label>
                            <input type="tel" class="form-control" id="manager_phone" name="manager_phone" value="<?= htmlspecialchars($department['manager_phone']) ?>">
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
document.getElementById('editDepartmentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show success message
    showToast('Departman bilgileri başarıyla güncellendi', 'success');
    
    // Redirect to view page after a short delay
    setTimeout(() => {
        window.location.href = 'index.php?page=departments-view&id=<?= $id ?>';
    }, 1500);
});

function resetForm() {
    if (confirm('Formu sıfırlamak istediğinizden emin misiniz?')) {
        document.getElementById('editDepartmentForm').reset();
        showToast('Form sıfırlandı', 'info');
    }
}

// Auto-save functionality
let autoSaveTimer;
const formInputs = document.querySelectorAll('#editDepartmentForm input, #editDepartmentForm select, #editDepartmentForm textarea');

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
