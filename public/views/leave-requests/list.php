<?php
$pageTitle = 'İzin Kayıtları - İnsan Kaynakları Sistemi';
$currentPage = 'leave-requests';
$breadcrumb = 'İzin Kayıtları';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-calendar-alt me-2"></i>İzin Kayıtları
            </h1>
            <p class="page-subtitle">Çalışan izinlerini ve mesai kayıtlarını yönetin</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeaveModal">
                <i class="fas fa-plus me-2"></i>Yeni İzin Kaydı
            </button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addOvertimeModal">
                <i class="fas fa-clock me-2"></i>Mesai Kaydı
            </button>
        </div>
    </div>
</div>

<!-- Leave Statistics -->
<div class="stats-grid mb-4">
    <div class="stat-card primary">
        <div class="stat-icon">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">16</div>
            <div class="stat-label">Toplam İzin Hakkı</div>
        </div>
    </div>

    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">12</div>
            <div class="stat-label">Kullanılan İzin</div>
        </div>
    </div>

    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">4</div>
            <div class="stat-label">Kalan İzin</div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-hourglass-half"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">156</div>
            <div class="stat-label">Toplam Mesai Saati</div>
        </div>
    </div>
</div>

<!-- Filters and Search -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-2">
                <label class="form-label">İzin Türü</label>
                <select class="form-select" id="typeFilter">
                    <option value="">Tümü</option>
                    <option value="Yıllık İzin">Yıllık İzin</option>
                    <option value="Hastalık">Hastalık</option>
                    <option value="Mazeret">Mazeret</option>
                    <option value="Ücretsiz">Ücretsiz</option>
                    <option value="Mesai">Mesai</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Departman</label>
                <select class="form-select" id="departmentFilter">
                    <option value="">Tümü</option>
                    <option value="Usta">Usta</option>
                    <option value="Mutfak">Mutfak</option>
                    <option value="Temizlik">Temizlik Personeli</option>
                    <option value="Sekreter">Sekreter</option>
                    <option value="Finans">Finans</option>
                    <option value="Mühendis">Mühendis</option>
                    <option value="Bilişimci">Bilişimci</option>
                    <option value="Muhasebe">Muhasebe</option>
                    <option value="İK">İnsan Kaynakları</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Başlangıç</label>
                <input type="date" class="form-control" id="startDateFilter">
            </div>
            <div class="col-md-2">
                <label class="form-label">Bitiş</label>
                <input type="date" class="form-control" id="endDateFilter">
            </div>
            <div class="col-md-2">
                <label class="form-label">Arama</label>
                <input type="text" class="form-control search-input" placeholder="Ad, soyad..." data-target="#leaveTable">
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button class="btn btn-outline-primary" onclick="applyFilters()">
                        <i class="fas fa-filter me-2"></i>Filtrele
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leave Records Table -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>İzin ve Mesai Kayıtları
                </h5>
            </div>
            <div class="col-md-6 text-end">
                <span class="text-muted">Toplam <strong id="totalCount">0</strong> kayıt</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="leaveTable">
                <thead>
                    <tr>
                        <th>Çalışan</th>
                        <th>İzin Türü</th>
                        <th>Başlangıç</th>
                        <th>Bitiş</th>
                        <th>Süre</th>
                        <th>Sebep</th>
                        <th>Giren Kişi</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="employee-info">
                                <div class="employee-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-details">
                                    <div class="employee-name">Ahmet Yılmaz</div>
                                    <div class="employee-department">Usta</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-info">Yıllık İzin</span></td>
                        <td>15.01.2024</td>
                        <td>22.01.2024</td>
                        <td>8 gün</td>
                        <td>Yıllık izin kullanımı</td>
                        <td>İK Uzmanı</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary btn-sm" onclick="viewLeave(1)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editLeave(1)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteLeave(1)" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="employee-info">
                                <div class="employee-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-details">
                                    <div class="employee-name">Fatma Demir</div>
                                    <div class="employee-department">Mutfak</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-warning">Hastalık</span></td>
                        <td>18.01.2024</td>
                        <td>20.01.2024</td>
                        <td>3 gün</td>
                        <td>Sağlık sorunu</td>
                        <td>İK Uzmanı</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary btn-sm" onclick="viewLeave(2)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editLeave(2)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteLeave(2)" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="employee-info">
                                <div class="employee-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-details">
                                    <div class="employee-name">Mehmet Kaya</div>
                                    <div class="employee-department">Mühendis</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-success">Mesai</span></td>
                        <td>25.01.2024</td>
                        <td>25.01.2024</td>
                        <td>4 saat</td>
                        <td>Proje teslimi</td>
                        <td>İK Uzmanı</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary btn-sm" onclick="viewLeave(3)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editLeave(3)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteLeave(3)" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Leave Modal -->
<div class="modal fade" id="addLeaveModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni İzin Kaydı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="leaveForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Çalışan</label>
                            <select class="form-select" required>
                                <option value="">Seçiniz</option>
                                <option value="1">Ahmet Yılmaz - Usta</option>
                                <option value="2">Fatma Demir - Mutfak</option>
                                <option value="3">Mehmet Kaya - Mühendis</option>
                                <option value="4">Ayşe Özkan - Temizlik</option>
                                <option value="5">Ali Veli - Sekreter</option>
                                <option value="6">Zeynep Kaya - Finans</option>
                                <option value="7">Can Demir - Bilişimci</option>
                                <option value="8">Elif Yılmaz - Muhasebe</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">İzin Türü</label>
                            <select class="form-select" required>
                                <option value="">Seçiniz</option>
                                <option value="Yıllık İzin">Yıllık İzin</option>
                                <option value="Hastalık">Hastalık</option>
                                <option value="Mazeret">Mazeret</option>
                                <option value="Ücretsiz">Ücretsiz</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Başlangıç Tarihi</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bitiş Tarihi</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Sebep</label>
                            <textarea class="form-control" rows="3" placeholder="İzin sebebini açıklayın..." required></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" form="leaveForm" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Overtime Modal -->
<div class="modal fade" id="addOvertimeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Mesai Kaydı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="overtimeForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Çalışan</label>
                            <select class="form-select" required>
                                <option value="">Seçiniz</option>
                                <option value="1">Ahmet Yılmaz - Usta</option>
                                <option value="2">Fatma Demir - Mutfak</option>
                                <option value="3">Mehmet Kaya - Mühendis</option>
                                <option value="4">Ayşe Özkan - Temizlik</option>
                                <option value="5">Ali Veli - Sekreter</option>
                                <option value="6">Zeynep Kaya - Finans</option>
                                <option value="7">Can Demir - Bilişimci</option>
                                <option value="8">Elif Yılmaz - Muhasebe</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tarih</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Başlangıç Saati</label>
                            <input type="time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bitiş Saati</label>
                            <input type="time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Toplam Saat</label>
                            <input type="number" class="form-control" placeholder="0" min="0" step="0.5" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mesai Oranı</label>
                            <select class="form-select" required>
                                <option value="1.5">1.5x (Normal)</option>
                                <option value="2.0">2.0x (Pazar)</option>
                                <option value="2.5">2.5x (Resmi Tatil)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Açıklama</label>
                            <textarea class="form-control" rows="3" placeholder="Mesai sebebini açıklayın..." required></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" form="overtimeForm" class="btn btn-success">Kaydet</button>
            </div>
        </div>
    </div>
</div>

<style>
.employee-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.employee-avatar {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
}

.employee-details {
    display: flex;
    flex-direction: column;
}

.employee-name {
    font-weight: 600;
    color: var(--dark-color);
}

.employee-department {
    font-size: 0.875rem;
    color: var(--secondary-color);
}
</style>

<script>
function viewLeave(id) {
    window.location.href = `index.php?page=leave-view&id=${id}`;
}

function editLeave(id) {
    window.location.href = `index.php?page=leave-edit&id=${id}`;
}

function deleteLeave(id) {
    if (confirm('Bu izin kaydını silmek istediğinizden emin misiniz?')) {
        showToast('İzin kaydı silindi', 'success');
    }
}

function applyFilters() {
    showToast('Filtreler uygulandı', 'success');
}

// Form submit handlers
document.getElementById('leaveForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showToast('İzin kaydı başarıyla eklendi!', 'success');
    $('#addLeaveModal').modal('hide');
});

document.getElementById('overtimeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showToast('Mesai kaydı başarıyla eklendi!', 'success');
    $('#addOvertimeModal').modal('hide');
});
</script>

<?php include 'views/layout/footer.php'; ?>
