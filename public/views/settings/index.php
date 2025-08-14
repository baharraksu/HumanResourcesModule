<?php
$pageTitle = 'Ayarlar - İnsan Kaynakları Sistemi';
$currentPage = 'settings';
$breadcrumb = 'Ayarlar';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-cog me-2"></i>Sistem Ayarları
            </h1>
            <p class="page-subtitle">Sistem yapılandırmasını ve kullanıcı tercihlerini yönetin</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" onclick="saveAllSettings()">
                <i class="fas fa-save me-2"></i>Tümünü Kaydet
            </button>
        </div>
    </div>
</div>

<!-- Settings Tabs -->
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="settingsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                    <i class="fas fa-cog me-2"></i>Genel
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab">
                    <i class="fas fa-building me-2"></i>Şirket
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="hr-tab" data-bs-toggle="tab" data-bs-target="#hr" type="button" role="tab">
                    <i class="fas fa-users me-2"></i>İK Ayarları
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                    <i class="fas fa-bell me-2"></i>Bildirimler
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                    <i class="fas fa-shield-alt me-2"></i>Güvenlik
                </button>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="settingsTabsContent">
            <!-- General Settings -->
            <div class="tab-pane fade show active" id="general" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Sistem Adı</label>
                        <input type="text" class="form-control" value="İnsan Kaynakları Sistemi" id="systemName">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sistem Versiyonu</label>
                        <input type="text" class="form-control" value="2.0.0" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Varsayılan Dil</label>
                        <select class="form-select" id="defaultLanguage">
                            <option value="tr" selected>Türkçe</option>
                            <option value="en">English</option>
                            <option value="de">Deutsch</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Zaman Dilimi</label>
                        <select class="form-select" id="timezone">
                            <option value="Europe/Istanbul" selected>İstanbul (UTC+3)</option>
                            <option value="Europe/London">Londra (UTC+0)</option>
                            <option value="America/New_York">New York (UTC-5)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tarih Formatı</label>
                        <select class="form-select" id="dateFormat">
                            <option value="d.m.Y" selected>DD.MM.YYYY</option>
                            <option value="Y-m-d">YYYY-MM-DD</option>
                            <option value="m/d/Y">MM/DD/YYYY</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Saat Formatı</label>
                        <select class="form-select" id="timeFormat">
                            <option value="H:i" selected>24 Saat</option>
                            <option value="h:i A">12 Saat (AM/PM)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Company Settings -->
            <div class="tab-pane fade" id="company" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Şirket Adı</label>
                        <input type="text" class="form-control" value="ABC Restoran Zinciri" id="companyName">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Şirket Kodu</label>
                        <input type="text" class="form-control" value="ABC001" id="companyCode">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Vergi Numarası</label>
                        <input type="text" class="form-control" value="1234567890" id="taxNumber">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SGK Numarası</label>
                        <input type="text" class="form-control" value="9876543210" id="sgkNumber">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Şirket Adresi</label>
                        <textarea class="form-control" rows="3" id="companyAddress">Atatürk Caddesi No:123, Merkez/İstanbul</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Telefon</label>
                        <input type="tel" class="form-control" value="+90 212 123 45 67" id="companyPhone">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-posta</label>
                        <input type="email" class="form-control" value="info@abcrestoran.com" id="companyEmail">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input type="url" class="form-control" value="https://www.abcrestoran.com" id="companyWebsite">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Şirket Logo</label>
                        <input type="file" class="form-control" id="companyLogo" accept="image/*">
                    </div>
                </div>
            </div>

            <!-- HR Settings -->
            <div class="tab-pane fade" id="hr" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Varsayılan İşe Başlama Saati</label>
                        <input type="time" class="form-control" value="08:00" id="defaultStartTime">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Varsayılan İş Bitiş Saati</label>
                        <input type="time" class="form-control" value="17:00" id="defaultEndTime">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Günlük Çalışma Saati</label>
                        <input type="number" class="form-control" value="8" min="1" max="24" id="dailyWorkHours">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Haftalık Çalışma Günü</label>
                        <input type="number" class="form-control" value="5" min="1" max="7" id="weeklyWorkDays">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Yıllık İzin Hakkı (Gün)</label>
                        <input type="number" class="form-control" value="14" min="0" max="365" id="annualLeaveDays">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Hastalık İzni (Gün)</label>
                        <input type="number" class="form-control" value="10" min="0" max="365" id="sickLeaveDays">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mazeret İzni (Gün)</label>
                        <input type="number" class="form-control" value="5" min="0" max="365" id="excuseLeaveDays">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ücretsiz İzin (Gün)</label>
                        <input type="number" class="form-control" value="30" min="0" max="365" id="unpaidLeaveDays">
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="tab-pane fade" id="notifications" role="tabpanel">
                <div class="row g-3">
                    <div class="col-12">
                        <h6 class="mb-3">E-posta Bildirimleri</h6>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                            <label class="form-check-label" for="emailNotifications">E-posta bildirimlerini etkinleştir</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Sunucu</label>
                        <input type="text" class="form-control" value="smtp.gmail.com" id="smtpServer">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Port</label>
                        <input type="number" class="form-control" value="587" id="smtpPort">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-posta Adresi</label>
                        <input type="email" class="form-control" value="noreply@abcrestoran.com" id="notificationEmail">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Şifre</label>
                        <input type="password" class="form-control" value="********" id="emailPassword">
                    </div>
                    
                    <div class="col-12">
                        <hr>
                        <h6 class="mb-3">Sistem Bildirimleri</h6>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="newEmployeeNotification" checked>
                            <label class="form-check-label" for="newEmployeeNotification">Yeni çalışan eklendiğinde bildirim</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="leaveRequestNotification" checked>
                            <label class="form-check-label" for="leaveRequestNotification">İzin talebi geldiğinde bildirim</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="attendanceNotification" checked>
                            <label class="form-check-label" for="attendanceNotification">Devam takibi uyarıları</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="payrollNotification" checked>
                            <label class="form-check-label" for="payrollNotification">Bordro hazırlandığında bildirim</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Minimum Şifre Uzunluğu</label>
                        <input type="number" class="form-control" value="8" min="6" max="20" id="minPasswordLength">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Şifre Geçerlilik Süresi (Gün)</label>
                        <input type="number" class="form-control" value="90" min="30" max="365" id="passwordExpiryDays">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Maksimum Başarısız Giriş</label>
                        <input type="number" class="form-control" value="5" min="3" max="10" id="maxLoginAttempts">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Hesap Kilitleme Süresi (Dakika)</label>
                        <input type="number" class="form-control" value="30" min="15" max="120" id="accountLockoutMinutes">
                    </div>
                    <div class="col-12">
                        <h6 class="mb-3">Güvenlik Seçenekleri</h6>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                            <label class="form-check-label" for="twoFactorAuth">İki faktörlü kimlik doğrulama</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="sessionTimeout" checked>
                            <label class="form-check-label" for="sessionTimeout">Oturum zaman aşımı</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="ipRestriction">
                            <label class="form-check-label" for="ipRestriction">IP adresi kısıtlaması</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="auditLog" checked>
                            <label class="form-check-label" for="auditLog">Denetim günlüğü</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function saveAllSettings() {
    // Tüm ayarları kaydet
    showToast('Ayarlar kaydediliyor...', 'info');
    
    // Simüle edilmiş kaydetme işlemi
    setTimeout(() => {
        showToast('Tüm ayarlar başarıyla kaydedildi!', 'success');
    }, 2000);
}

// Tab değişikliklerinde otomatik kaydetme
document.querySelectorAll('#settingsTabs button[data-bs-toggle="tab"]').forEach(tab => {
    tab.addEventListener('shown.bs.tab', function (event) {
        const targetTab = event.target.getAttribute('data-bs-target');
        console.log('Aktif tab:', targetTab);
    });
});

// Form değişikliklerini izle
document.querySelectorAll('input, select, textarea').forEach(input => {
    input.addEventListener('change', function() {
        // Değişiklik olduğunda otomatik kaydetme seçeneği
        console.log('Ayar değişti:', this.id, this.value);
    });
});
</script>

<?php include 'views/layout/footer.php'; ?>
