<?php
$pageTitle = 'Yeni Çalışan Ekle - İnsan Kaynakları Sistemi';
$currentPage = 'employees';
$breadcrumb = 'Çalışanlar / Yeni Ekle';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-user-plus me-2"></i>Yeni Çalışan Ekle
            </h1>
            <p class="text-muted">Sisteme yeni çalışan bilgilerini girin</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Çalışan Bilgileri</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="#" id="addEmployeeForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="employee_number" class="form-label">Çalışan Numarası *</label>
                            <input type="text" class="form-control" id="employee_number" name="employee_number" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Ad *</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Soyad *</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-posta *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birth_date" class="form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="hire_date" class="form-label">İşe Başlama Tarihi *</label>
                            <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="salary" class="form-label">Maaş *</label>
                            <input type="number" class="form-control" id="salary" name="salary" step="0.01" min="0" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Departman</label>
                            <select class="form-control" id="department" name="department">
                                <option value="">Departman Seçin</option>
                                <option value="Usta">Usta</option>
                                <option value="Mutfak">Mutfak</option>
                                <option value="Temizlik Personeli">Temizlik Personeli</option>
                                <option value="Sekreter">Sekreter</option>
                                <option value="Finans">Finans</option>
                                <option value="Mühendis">Mühendis</option>
                                <option value="Bilişimci">Bilişimci</option>
                                <option value="Muhasebe">Muhasebe</option>
                                <option value="İnsan Kaynakları">İnsan Kaynakları</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Pozisyon</label>
                            <select class="form-control" id="position" name="position">
                                <option value="">Pozisyon Seçin</option>
                                <option value="Yönetici">Yönetici</option>
                                <option value="Uzman">Uzman</option>
                                <option value="Teknisyen">Teknisyen</option>
                                <option value="Asistan">Asistan</option>
                                <option value="Çalışan">Çalışan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Çalışanı Kaydet
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
document.getElementById('addEmployeeForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show success message
    showToast('Çalışan başarıyla eklendi', 'success');
    
    // Redirect to employee list after a short delay
    setTimeout(() => {
        window.location.href = 'index.php?page=employees';
    }, 1500);
});

// Auto-save functionality
let autoSaveTimer;
const formInputs = document.querySelectorAll('#addEmployeeForm input, #addEmployeeForm select');

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
