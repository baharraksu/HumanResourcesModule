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
            <button class="btn btn-outline-warning me-2" onclick="resetSettings()">
                <i class="fas fa-undo me-2"></i>Sıfırla
            </button>
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
    // Tüm ayarları topla
    const settings = collectAllSettings();
    
    // Ayarları localStorage'a kaydet
    localStorage.setItem('hrSystemSettings', JSON.stringify(settings));
    
    // Başarı mesajı göster
    showToast('Ayarlar kaydediliyor...', 'info');
    
    // Simüle edilmiş kaydetme işlemi
    setTimeout(() => {
        showToast('Tüm ayarlar başarıyla kaydedildi!', 'success');
        
        // Kaydedilen ayarları göster
        displaySavedSettings();
    }, 2000);
}

function collectAllSettings() {
    const settings = {};
    
    // Genel ayarlar
    settings.general = {
        systemName: document.getElementById('systemName').value,
        defaultLanguage: document.getElementById('defaultLanguage').value,
        timezone: document.getElementById('timezone').value,
        dateFormat: document.getElementById('dateFormat').value,
        timeFormat: document.getElementById('timeFormat').value
    };
    
    // Şirket ayarları
    settings.company = {
        companyName: document.getElementById('companyName')?.value || 'Firma Adı',
        address: document.getElementById('companyAddress')?.value || 'Firma Adresi',
        phone: document.getElementById('companyPhone')?.value || 'Firma Telefonu',
        email: document.getElementById('companyEmail')?.value || 'firma@email.com',
        website: document.getElementById('companyWebsite')?.value || 'www.firma.com',
        taxNumber: document.getElementById('taxNumber')?.value || 'Vergi No'
    };
    
    // İK ayarları
    settings.hr = {
        defaultLeaveDays: document.getElementById('defaultLeaveDays')?.value || 20,
        overtimeRate: document.getElementById('overtimeRate')?.value || 1.5,
        workingHours: document.getElementById('workingHours')?.value || 8,
        probationPeriod: document.getElementById('probationPeriod')?.value || 90
    };
    
    // Bildirim ayarları
    settings.notifications = {
        newEmployee: document.getElementById('newEmployeeNotification').checked,
        leaveRequest: document.getElementById('leaveRequestNotification').checked,
        attendance: document.getElementById('attendanceNotification').checked,
        payroll: document.getElementById('payrollNotification').checked,
        emailNotifications: document.getElementById('emailNotifications').checked,
        smsNotifications: document.getElementById('smsNotifications')?.checked || false
    };
    
    // Güvenlik ayarları
    settings.security = {
        minPasswordLength: document.getElementById('minPasswordLength').value,
        passwordExpiryDays: document.getElementById('passwordExpiryDays').value,
        maxLoginAttempts: document.getElementById('maxLoginAttempts').value,
        accountLockoutMinutes: document.getElementById('accountLockoutMinutes').value,
        twoFactorAuth: document.getElementById('twoFactorAuth').checked,
        sessionTimeout: document.getElementById('sessionTimeout').checked,
        ipRestriction: document.getElementById('ipRestriction').checked,
        auditLog: document.getElementById('auditLog').checked
    };
    
    return settings;
}

function loadSavedSettings() {
    const savedSettings = localStorage.getItem('hrSystemSettings');
    if (savedSettings) {
        const settings = JSON.parse(savedSettings);
        applySettingsToForm(settings);
        showToast('Kaydedilen ayarlar yüklendi', 'info');
    }
}

function applySettingsToForm(settings) {
    // Genel ayarlar
    if (settings.general) {
        if (document.getElementById('systemName')) document.getElementById('systemName').value = settings.general.systemName;
        if (document.getElementById('defaultLanguage')) document.getElementById('defaultLanguage').value = settings.general.defaultLanguage;
        if (document.getElementById('timezone')) document.getElementById('timezone').value = settings.general.timezone;
        if (document.getElementById('dateFormat')) document.getElementById('dateFormat').value = settings.general.dateFormat;
        if (document.getElementById('timeFormat')) document.getElementById('timeFormat').value = settings.general.timeFormat;
    }
    
    // Şirket ayarları
    if (settings.company) {
        if (document.getElementById('companyName')) document.getElementById('companyName').value = settings.company.companyName;
        if (document.getElementById('companyAddress')) document.getElementById('companyAddress').value = settings.company.address;
        if (document.getElementById('companyPhone')) document.getElementById('companyPhone').value = settings.company.phone;
        if (document.getElementById('companyEmail')) document.getElementById('companyEmail').value = settings.company.email;
        if (document.getElementById('companyWebsite')) document.getElementById('companyWebsite').value = settings.company.website;
        if (document.getElementById('taxNumber')) document.getElementById('taxNumber').value = settings.company.taxNumber;
    }
    
    // İK ayarları
    if (settings.hr) {
        if (document.getElementById('defaultLeaveDays')) document.getElementById('defaultLeaveDays').value = settings.hr.defaultLeaveDays;
        if (document.getElementById('overtimeRate')) document.getElementById('overtimeRate').value = settings.hr.overtimeRate;
        if (document.getElementById('workingHours')) document.getElementById('workingHours').value = settings.hr.workingHours;
        if (document.getElementById('probationPeriod')) document.getElementById('probationPeriod').value = settings.hr.probationPeriod;
    }
    
    // Bildirim ayarları
    if (settings.notifications) {
        if (document.getElementById('newEmployeeNotification')) document.getElementById('newEmployeeNotification').checked = settings.notifications.newEmployee;
        if (document.getElementById('leaveRequestNotification')) document.getElementById('leaveRequestNotification').checked = settings.notifications.leaveRequest;
        if (document.getElementById('attendanceNotification')) document.getElementById('attendanceNotification').checked = settings.notifications.attendance;
        if (document.getElementById('payrollNotification')) document.getElementById('payrollNotification').checked = settings.notifications.payroll;
        if (document.getElementById('emailNotifications')) document.getElementById('emailNotifications').checked = settings.notifications.emailNotifications;
        if (document.getElementById('smsNotifications')) document.getElementById('smsNotifications').checked = settings.notifications.smsNotifications;
    }
    
    // Güvenlik ayarları
    if (settings.security) {
        if (document.getElementById('minPasswordLength')) document.getElementById('minPasswordLength').value = settings.security.minPasswordLength;
        if (document.getElementById('passwordExpiryDays')) document.getElementById('passwordExpiryDays').value = settings.security.passwordExpiryDays;
        if (document.getElementById('maxLoginAttempts')) document.getElementById('maxLoginAttempts').value = settings.security.maxLoginAttempts;
        if (document.getElementById('accountLockoutMinutes')) document.getElementById('accountLockoutMinutes').value = settings.security.accountLockoutMinutes;
        if (document.getElementById('twoFactorAuth')) document.getElementById('twoFactorAuth').checked = settings.security.twoFactorAuth;
        if (document.getElementById('sessionTimeout')) document.getElementById('sessionTimeout').checked = settings.security.sessionTimeout;
        if (document.getElementById('ipRestriction')) document.getElementById('ipRestriction').checked = settings.security.ipRestriction;
        if (document.getElementById('auditLog')) document.getElementById('auditLog').checked = settings.security.auditLog;
    }
}

function displaySavedSettings() {
    const savedSettings = localStorage.getItem('hrSystemSettings');
    if (savedSettings) {
        const settings = JSON.parse(savedSettings);
        console.log('Kaydedilen ayarlar:', settings);
        
        // Ayarları konsola yazdır (geliştirici için)
        const settingsInfo = document.createElement('div');
        settingsInfo.className = 'alert alert-info mt-3';
        settingsInfo.innerHTML = `
            <h6>Kaydedilen Ayarlar:</h6>
            <ul class="mb-0">
                <li>Sistem Adı: ${settings.general?.systemName || 'N/A'}</li>
                <li>Varsayılan Dil: ${settings.general?.defaultLanguage || 'N/A'}</li>
                <li>Zaman Dilimi: ${settings.general?.timezone || 'N/A'}</li>
                <li>Bildirimler: ${settings.notifications?.newEmployee ? 'Açık' : 'Kapalı'}</li>
                <li>Güvenlik: ${settings.security?.twoFactorAuth ? '2FA Açık' : '2FA Kapalı'}</li>
            </ul>
        `;
        
        // Mevcut bilgi mesajını kaldır
        const existingInfo = document.querySelector('.alert-info');
        if (existingInfo) existingInfo.remove();
        
        // Yeni bilgi mesajını ekle
        document.querySelector('.card-body').appendChild(settingsInfo);
    }
}

function resetSettings() {
    if (confirm('Tüm ayarları sıfırlamak istediğinizden emin misiniz?')) {
        localStorage.removeItem('hrSystemSettings');
        location.reload();
        showToast('Ayarlar sıfırlandı', 'warning');
    }
}

// Tab değişikliklerinde otomatik kaydetme
document.querySelectorAll('#settingsTabs button[data-bs-toggle="tab"]').forEach(tab => {
    tab.addEventListener('shown.bs.tab', function (event) {
        const targetTab = event.target.getAttribute('data-bs-target');
        console.log('Aktif tab:', targetTab);
    });
});

// Form değişikliklerini izle ve otomatik kaydet
document.querySelectorAll('input, select, textarea').forEach(input => {
    input.addEventListener('change', function() {
        // Değişiklik olduğunda otomatik kaydetme
        console.log('Ayar değişti:', this.id, this.value);
        
        // Otomatik kaydetme seçeneği (isteğe bağlı)
        // autoSaveSettings();
    });
});

// Sayfa yüklendiğinde kaydedilen ayarları yükle
document.addEventListener('DOMContentLoaded', function() {
    loadSavedSettings();
});
</script>

<?php include 'views/layout/footer.php'; ?>
