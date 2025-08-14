<?php
$pageTitle = 'Yeni Çalışan Ekle - İnsan Kaynakları Sistemi';
include __DIR__ . '/../layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-plus me-2"></i>
            Yeni Çalışan Ekle
        </h1>
        <p class="text-muted">Sisteme yeni çalışan bilgilerini girin</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Çalışan Bilgileri</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/employees/add">
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
                            <label for="department_id" class="form-label">Departman</label>
                            <select class="form-control" id="department_id" name="department_id">
                                <option value="">Departman Seçin</option>
                                <option value="1">İnsan Kaynakları</option>
                                <option value="2">Bilgi Teknolojileri</option>
                                <option value="3">Muhasebe</option>
                                <option value="4">Satış</option>
                                <option value="5">Üretim</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position_id" class="form-label">Pozisyon</label>
                            <select class="form-control" id="position_id" name="position_id">
                                <option value="">Pozisyon Seçin</option>
                                <option value="1">Yönetici</option>
                                <option value="2">Uzman</option>
                                <option value="3">Teknisyen</option>
                                <option value="4">Asistan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Çalışanı Kaydet
                            </button>
                            <a href="/employees" class="btn btn-secondary ms-2">
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

<?php include __DIR__ . '/../layout/footer.php'; ?>
