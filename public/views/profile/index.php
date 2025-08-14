<?php
$pageTitle = 'Profil - İnsan Kaynakları Sistemi';
$currentPage = 'profile';
$breadcrumb = 'Profil';

// Kullanıcı bilgilerini al (bu kısım daha sonra implement edilecek)
$user = [
    'id' => 1,
    'username' => 'admin',
    'first_name' => 'Fatma',
    'last_name' => 'Özkan',
    'email' => 'fatma.ozkan@firma.com',
    'phone' => '+90 555 123 45 67',
    'position' => 'İnsan Kaynakları Uzmanı',
    'department' => 'İnsan Kaynakları',
    'employee_number' => 'EMP001',
    'hire_date' => '2020-03-15',
    'birth_date' => '1985-06-20',
    'address' => 'İstanbul, Türkiye',
    'emergency_contact' => 'Mehmet Özkan (Eş) - +90 555 987 65 43',
    'profile_photo' => null,
    'last_login' => '2024-01-20 14:30:00',
    'status' => 'Aktif',
    'permissions' => ['admin', 'hr_manager', 'employee_view', 'employee_edit', 'payroll_view', 'reports_view']
];

include 'views/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-circle me-2"></i>
                    Profil
                </h1>
                <p class="text-muted">Kişisel bilgilerinizi görüntüleyin ve güncelleyin</p>
            </div>
            <div>
                <button class="btn btn-primary" onclick="editProfile()">
                    <i class="fas fa-edit me-1"></i>
                    Profili Düzenle
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <!-- Profile Card -->
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <div class="profile-photo mb-3">
                    <?php if ($user['profile_photo']): ?>
                        <img src="<?= htmlspecialchars($user['profile_photo']) ?>" alt="Profil Fotoğrafı" class="rounded-circle" width="120" height="120">
                    <?php else: ?>
                        <div class="profile-photo-placeholder">
                            <i class="fas fa-user fa-4x text-muted"></i>
                        </div>
                    <?php endif; ?>
                </div>
                
                <h5 class="card-title mb-1"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h5>
                <p class="text-muted mb-2"><?= htmlspecialchars($user['position']) ?></p>
                <p class="text-muted mb-3"><?= htmlspecialchars($user['department']) ?></p>
                
                <div class="profile-stats">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">156</div>
                                <div class="stat-label">Gün</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">12</div>
                                <div class="stat-label">İzin</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">4</div>
                                <div class="stat-label">Kalan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-tools me-2"></i>
                    Hızlı İşlemler
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="changePassword()">
                        <i class="fas fa-key me-2"></i>
                        Şifre Değiştir
                    </button>
                    <button class="btn btn-outline-info" onclick="viewActivity()">
                        <i class="fas fa-history me-2"></i>
                        Aktivite Geçmişi
                    </button>
                    <button class="btn btn-outline-warning" onclick="exportProfile()">
                        <i class="fas fa-download me-2"></i>
                        Profil İndir
                    </button>
                    <button class="btn btn-outline-secondary" onclick="printProfile()">
                        <i class="fas fa-print me-2"></i>
                        Profil Yazdır
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <!-- Personal Information -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-info-circle me-2"></i>
                    Kişisel Bilgiler
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Ad Soyad</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Kullanıcı Adı</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['username']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">E-posta</label>
                        <p class="form-control-plaintext">
                            <a href="mailto:<?= htmlspecialchars($user['email']) ?>"><?= htmlspecialchars($user['email']) ?></a>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Telefon</label>
                        <p class="form-control-plaintext">
                            <a href="tel:<?= htmlspecialchars($user['phone']) ?>"><?= htmlspecialchars($user['phone']) ?></a>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Doğum Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($user['birth_date'])) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">İşe Başlama Tarihi</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y', strtotime($user['hire_date'])) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Sicil No</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['employee_number']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext">
                            <span class="status-badge active"><?= htmlspecialchars($user['status']) ?></span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Adres</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['address']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Acil Durum İletişim</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['emergency_contact']) ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Work Information -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-briefcase me-2"></i>
                    İş Bilgileri
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Pozisyon</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['position']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Departman</label>
                        <p class="form-control-plaintext"><?= htmlspecialchars($user['department']) ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Son Giriş</label>
                        <p class="form-control-plaintext"><?= date('d.m.Y H:i', strtotime($user['last_login'])) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışma Süresi</label>
                        <p class="form-control-plaintext">
                            <?php
                            $hireDate = new DateTime($user['hire_date']);
                            $now = new DateTime();
                            $interval = $hireDate->diff($now);
                            echo $interval->y . ' yıl, ' . $interval->m . ' ay, ' . $interval->d . ' gün';
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Permissions -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-shield-alt me-2"></i>
                    Yetkiler
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($user['permissions'] as $permission): ?>
                        <div class="col-md-4 mb-2">
                            <span class="badge bg-success me-1">
                                <i class="fas fa-check me-1"></i>
                                <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $permission))) ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profil Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Ad *</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Soyad *</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-posta *</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="birth_date" class="form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= htmlspecialchars($user['birth_date']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Adres</label>
                            <textarea class="form-control" id="address" name="address" rows="2"><?= htmlspecialchars($user['address']) ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="emergency_contact" class="form-label">Acil Durum İletişim</label>
                            <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="<?= htmlspecialchars($user['emergency_contact']) ?>">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" form="editProfileForm" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Şifre Değiştir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mevcut Şifre *</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Yeni Şifre *</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Yeni Şifre Tekrar *</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" form="changePasswordForm" class="btn btn-primary">Şifre Değiştir</button>
            </div>
        </div>
    </div>
</div>

<style>
.profile-photo-placeholder {
    width: 120px;
    height: 120px;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: var(--primary-color);
}

.profile-stats {
    border-top: 1px solid #e3e6f0;
    padding-top: 1rem;
}

.stat-item {
    padding: 0.5rem;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary-color);
}

.stat-label {
    font-size: 0.875rem;
    color: var(--secondary-color);
}
</style>

<script>
// Edit Profile
function editProfile() {
    const modal = new bootstrap.Modal(document.getElementById('editProfileModal'));
    modal.show();
}

// Change Password
function changePassword() {
    const modal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
    modal.show();
}

// View Activity
function viewActivity() {
    showToast('Aktivite geçmişi yükleniyor...', 'info');
}

// Export Profile
function exportProfile() {
    showToast('Profil bilgileri indiriliyor...', 'info');
}

// Print Profile
function printProfile() {
    showToast('Profil yazdırılıyor...', 'info');
}

// Form handling
document.getElementById('editProfileForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show success message
    showToast('Profil bilgileri başarıyla güncellendi', 'success');
    
    // Hide modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
    modal.hide();
    
    // Reload page to show updated information
    setTimeout(() => {
        location.reload();
    }, 1500);
});

document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if (newPassword !== confirmPassword) {
        showToast('Yeni şifreler eşleşmiyor!', 'error');
        return;
    }
    
    // Show success message
    showToast('Şifre başarıyla değiştirildi', 'success');
    
    // Hide modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
    modal.hide();
    
    // Reset form
    document.getElementById('changePasswordForm').reset();
});
</script>

<?php include 'views/layout/footer.php'; ?>
