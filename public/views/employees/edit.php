<?php
$pageTitle = 'Çalışan Düzenle - İnsan Kaynakları Sistemi';

// Çalışan ID'sini al
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: /employees');
    exit;
}

// Çalışan bilgilerini al (bu kısım daha sonra implement edilecek)
$employee = [
    'id' => $id,
    'employee_number' => 'EMP001',
    'first_name' => 'Örnek',
    'last_name' => 'Çalışan',
    'email' => 'ornek@firma.com',
    'phone' => '555-1234',
    'birth_date' => '1990-01-01',
    'hire_date' => '2020-01-01',
    'position_id' => 1,
    'department_id' => 1,
    'salary' => 5000.00
];

include 'views/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-edit me-2"></i>
            Çalışan Düzenle
        </h1>
        <p class="text-muted">Çalışan bilgilerini güncelleyin</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Çalışan Bilgileri</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="#" id="editEmployeeForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($employee['id']) ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="employee_number" class="form-label">Çalışan Numarası *</label>
                            <input type="text" class="form-control" id="employee_number" name="employee_number" value="<?= htmlspecialchars($employee['employee_number']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Ad *</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= htmlspecialchars($employee['first_name']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Soyad *</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($employee['last_name']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-posta *</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($employee['email']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($employee['phone']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birth_date" class="form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= htmlspecialchars($employee['birth_date']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="hire_date" class="form-label">İşe Başlama Tarihi *</label>
                            <input type="date" class="form-control" id="hire_date" name="hire_date" value="<?= htmlspecialchars($employee['hire_date']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="salary" class="form-label">Maaş *</label>
                            <input type="number" class="form-control" id="salary" name="salary" step="0.01" min="0" value="<?= htmlspecialchars($employee['salary']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Departman</label>
                            <select class="form-control" id="department" name="department">
                                <option value="">Departman Seçin</option>
                                <option value="Usta" <?= $employee['department'] == 'Usta' ? 'selected' : '' ?>>Usta</option>
                                <option value="Mutfak" <?= $employee['department'] == 'Mutfak' ? 'selected' : '' ?>>Mutfak</option>
                                <option value="Temizlik Personeli" <?= $employee['department'] == 'Temizlik Personeli' ? 'selected' : '' ?>>Temizlik Personeli</option>
                                <option value="Sekreter" <?= $employee['department'] == 'Sekreter' ? 'selected' : '' ?>>Sekreter</option>
                                <option value="Finans" <?= $employee['department'] == 'Finans' ? 'selected' : '' ?>>Finans</option>
                                <option value="Mühendis" <?= $employee['department'] == 'Mühendis' ? 'selected' : '' ?>>Mühendis</option>
                                <option value="Bilişimci" <?= $employee['department'] == 'Bilişimci' ? 'selected' : '' ?>>Bilişimci</option>
                                <option value="Muhasebe" <?= $employee['department'] == 'Muhasebe' ? 'selected' : '' ?>>Muhasebe</option>
                                <option value="İnsan Kaynakları" <?= $employee['department'] == 'İnsan Kaynakları' ? 'selected' : '' ?>>İnsan Kaynakları</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position_id" class="form-label">Pozisyon</label>
                            <select class="form-control" id="position_id" name="position_id">
                                <option value="">Pozisyon Seçin</option>
                                <option value="1" <?= $employee['position_id'] == 1 ? 'selected' : '' ?>>Yönetici</option>
                                <option value="2" <?= $employee['position_id'] == 2 ? 'selected' : '' ?>>Uzman</option>
                                <option value="3" <?= $employee['position_id'] == 3 ? 'selected' : '' ?>>Teknisyen</option>
                                <option value="4" <?= $employee['position_id'] == 4 ? 'selected' : '' ?>>Asistan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Değişiklikleri Kaydet
                            </button>
                            <a href="index.php?page=employees" class="btn btn-secondary ms-2">
                                <i class="fas fa-arrow-left me-2"></i>
                                Geri Dön
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Form handling
document.getElementById('editEmployeeForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show success message
    showToast('Çalışan bilgileri başarıyla güncellendi', 'success');
    
    // Redirect to view page after a short delay
    setTimeout(() => {
        window.location.href = 'index.php?page=employees-view&id=<?= $id ?>';
    }, 1500);
});

// Auto-save functionality
let autoSaveTimer;
const formInputs = document.querySelectorAll('#editEmployeeForm input, #editEmployeeForm select');

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
