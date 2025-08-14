<?php
$pageTitle = 'Devam Takibi - İnsan Kaynakları Sistemi';
$currentPage = 'attendance';
$breadcrumb = 'Devam Takibi';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-clock me-2"></i>Devam Takibi
            </h1>
            <p class="page-subtitle">Çalışanların giriş-çıkış saatlerini ve devam durumlarını takip edin</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAttendanceModal">
                <i class="fas fa-plus me-2"></i>Manuel Kayıt
            </button>
            <button class="btn btn-outline-secondary ms-2" onclick="exportAttendance()">
                <i class="fas fa-download me-2"></i>Rapor İndir
            </button>
        </div>
    </div>
</div>

<!-- Attendance Statistics -->
<div class="stats-grid mb-4">
    <div class="stat-card primary">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">142</div>
            <div class="stat-label">Bugün Gelen</div>
        </div>
    </div>

    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">138</div>
            <div class="stat-label">Zamanında Gelen</div>
        </div>
    </div>

    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">4</div>
            <div class="stat-label">Geç Gelen</div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">14</div>
            <div class="stat-label">Gelmeyen</div>
        </div>
    </div>
</div>

<!-- Date Selection and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Tarih</label>
                <input type="date" class="form-control" id="attendanceDate" value="<?= date('Y-m-d') ?>">
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
                <label class="form-label">Durum</label>
                <select class="form-select" id="statusFilter">
                    <option value="">Tümü</option>
                    <option value="Geldi">Geldi</option>
                    <option value="Gelmedi">Gelmedi</option>
                    <option value="İzinli">İzinli</option>
                    <option value="Hastalık">Hastalık</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Arama</label>
                <input type="text" class="form-control search-input" placeholder="Ad, soyad veya sicil no..." data-target="#attendanceTable">
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button class="btn btn-outline-primary" onclick="applyAttendanceFilters()">
                        <i class="fas fa-filter me-2"></i>Filtrele
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Attendance Table -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>Devam Takibi - <?= date('d.m.Y') ?>
                </h5>
            </div>
            <div class="col-md-6 text-end">
                <span class="text-muted">Toplam <strong id="totalCount">156</strong> çalışan</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="attendanceTable">
                <thead>
                    <tr>
                        <th>Çalışan</th>
                        <th>Giriş Saati</th>
                        <th>Çıkış Saati</th>
                        <th>Çalışma Süresi</th>
                        <th>Durum</th>
                        <th>Gecikme</th>
                        <th>Not</th>
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
                                    <div class="employee-department">Mutfak</div>
                                </div>
                            </div>
                        </td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td>9 saat</td>
                        <td><span class="badge bg-success">Geldi</span></td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-info btn-sm" onclick="viewAttendanceDetails(1)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editAttendance(1)">
                                    <i class="fas fa-edit"></i>
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
                                    <div class="employee-department">Servis</div>
                                </div>
                            </div>
                        </td>
                        <td>08:15</td>
                        <td>17:00</td>
                        <td>8.75 saat</td>
                        <td><span class="badge bg-warning">Geç Geldi</span></td>
                        <td>15 dk</td>
                        <td>Trafik yoğunluğu</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-info btn-sm" onclick="viewAttendanceDetails(2)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editAttendance(2)">
                                    <i class="fas fa-edit"></i>
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
                                    <div class="employee-department">Muhasebe</div>
                                </div>
                            </div>
                        </td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td><span class="badge bg-danger">Gelmedi</span></td>
                        <td>-</td>
                        <td>Hastalık izni</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-info btn-sm" onclick="viewAttendanceDetails(3)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editAttendance(3)">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Attendance Modal -->
<div class="modal fade" id="addAttendanceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manuel Devam Kaydı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="attendanceForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Çalışan</label>
                            <select class="form-select" required>
                                <option value="">Seçiniz</option>
                                <option value="1">Ahmet Yılmaz - Mutfak</option>
                                <option value="2">Fatma Demir - Servis</option>
                                <option value="3">Mehmet Kaya - Muhasebe</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tarih</label>
                            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Giriş Saati</label>
                            <input type="time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Çıkış Saati</label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Durum</label>
                            <select class="form-select" required>
                                <option value="">Seçiniz</option>
                                <option value="Geldi">Geldi</option>
                                <option value="Gelmedi">Gelmedi</option>
                                <option value="İzinli">İzinli</option>
                                <option value="Hastalık">Hastalık</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Not</label>
                            <input type="text" class="form-control" placeholder="Açıklama...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" form="attendanceForm" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</div>

<!-- Attendance Details Modal -->
<div class="modal fade" id="attendanceDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Devam Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çalışan</label>
                        <p class="form-control-plaintext" id="detailEmployeeName">-</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Departman</label>
                        <p class="form-control-plaintext" id="detailDepartment">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Tarih</label>
                        <p class="form-control-plaintext" id="detailDate">-</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Durum</label>
                        <p class="form-control-plaintext" id="detailStatus">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Giriş Saati</label>
                        <p class="form-control-plaintext" id="detailCheckIn">-</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Çıkış Saati</label>
                        <p class="form-control-plaintext" id="detailCheckOut">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Toplam Saat</label>
                        <p class="form-control-plaintext" id="detailTotalHours">-</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Mesai</label>
                        <p class="form-control-plaintext" id="detailOvertime">-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold text-muted">Notlar</label>
                        <p class="form-control-plaintext" id="detailNotes">-</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="editAttendance(1)">Düzenle</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Attendance Modal -->
<div class="modal fade" id="editAttendanceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Devam Kaydı Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editAttendanceForm">
                    <input type="hidden" id="editAttendanceId" name="id">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Çalışan</label>
                            <select class="form-select" id="editEmployeeId" name="employee_id" required>
                                <option value="">Seçiniz</option>
                                <option value="1">Ahmet Yılmaz - Mutfak</option>
                                <option value="2">Fatma Demir - Servis</option>
                                <option value="3">Mehmet Kaya - Muhasebe</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tarih</label>
                            <input type="date" class="form-control" id="editDate" name="date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Giriş Saati</label>
                            <input type="time" class="form-control" id="editCheckIn" name="check_in" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Çıkış Saati</label>
                            <input type="time" class="form-control" id="editCheckOut" name="check_out">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Durum</label>
                            <select class="form-select" id="editStatus" name="status" required>
                                <option value="">Seçiniz</option>
                                <option value="Geldi">Geldi</option>
                                <option value="Gelmedi">Gelmedi</option>
                                <option value="İzinli">İzinli</option>
                                <option value="Hastalık">Hastalık</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Not</label>
                            <input type="text" class="form-control" id="editNotes" name="notes" placeholder="Açıklama...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" form="editAttendanceForm" class="btn btn-primary">Güncelle</button>
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
function viewAttendanceDetails(id) {
    // Devam detayları modal'ını göster
    const modal = new bootstrap.Modal(document.getElementById('attendanceDetailsModal'));
    
    // Örnek veri (gerçek uygulamada API'den gelecek)
    const attendanceData = {
        id: id,
        employee_name: 'Ahmet Yılmaz',
        department: 'Mutfak',
        date: '2024-01-20',
        check_in: '08:30',
        check_out: '17:30',
        status: 'Geldi',
        total_hours: '8.5',
        overtime: '0.5',
        notes: 'Normal mesai'
    };
    
    // Modal içeriğini doldur
    document.getElementById('detailEmployeeName').textContent = attendanceData.employee_name;
    document.getElementById('detailDepartment').textContent = attendanceData.department;
    document.getElementById('detailDate').textContent = attendanceData.date;
    document.getElementById('detailCheckIn').textContent = attendanceData.check_in;
    document.getElementById('detailCheckOut').textContent = attendanceData.check_out;
    document.getElementById('detailStatus').textContent = attendanceData.status;
    document.getElementById('detailTotalHours').textContent = attendanceData.total_hours;
    document.getElementById('detailOvertime').textContent = attendanceData.overtime;
    document.getElementById('detailNotes').textContent = attendanceData.notes;
    
    modal.show();
}

function editAttendance(id) {
    // Düzenleme modal'ını göster
    const modal = new bootstrap.Modal(document.getElementById('editAttendanceModal'));
    
    // Örnek veri (gerçek uygulamada API'den gelecek)
    const attendanceData = {
        id: id,
        employee_id: '1',
        date: '2024-01-20',
        check_in: '08:30',
        check_out: '17:30',
        status: 'Geldi',
        notes: 'Normal mesai'
    };
    
    // Form alanlarını doldur
    document.getElementById('editEmployeeId').value = attendanceData.employee_id;
    document.getElementById('editDate').value = attendanceData.date;
    document.getElementById('editCheckIn').value = attendanceData.check_in;
    document.getElementById('editCheckOut').value = attendanceData.check_out;
    document.getElementById('editStatus').value = attendanceData.status;
    document.getElementById('editNotes').value = attendanceData.notes;
    
    modal.show();
}

function applyAttendanceFilters() {
    const date = document.getElementById('attendanceDate').value;
    const department = document.getElementById('departmentFilter').value;
    const status = document.getElementById('statusFilter').value;
    
    if (!date && !department && !status) {
        showToast('Lütfen en az bir filtre seçin', 'warning');
        return;
    }
    
    // Filtreleri uygula
    const table = document.getElementById('attendanceTable');
    const rows = table.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        let showRow = true;
        
        if (date) {
            const rowDate = row.querySelector('.attendance-date').textContent;
            if (rowDate !== date) showRow = false;
        }
        
        if (department) {
            const rowDept = row.querySelector('.attendance-department').textContent;
            if (rowDept !== department) showRow = false;
        }
        
        if (status) {
            const rowStatus = row.querySelector('.attendance-status').textContent;
            if (rowStatus !== status) showRow = false;
        }
        
        row.style.display = showRow ? '' : 'none';
    });
    
    showToast('Filtreler uygulandı', 'success');
}

function exportAttendance() {
    const date = document.getElementById('attendanceDate').value;
    const department = document.getElementById('departmentFilter').value;
    
    // Excel/CSV export simülasyonu
    showToast('Devam takibi raporu hazırlanıyor...', 'info');
    
    setTimeout(() => {
        // Gerçek uygulamada burada dosya indirme işlemi yapılır
        const link = document.createElement('a');
        link.href = 'data:text/csv;charset=utf-8,Employee,Department,Date,Check In,Check Out,Status\nAhmet Yılmaz,Mutfak,2024-01-20,08:30,17:30,Geldi\nFatma Demir,Servis,2024-01-20,08:15,17:15,Geldi';
        link.download = `devam_takibi_${date || 'tum'}_${department || 'tum'}.csv`;
        link.click();
        
        showToast('Rapor başarıyla indirildi', 'success');
    }, 2000);
}

// Form submit handler
document.getElementById('attendanceForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Form verilerini al
    const formData = new FormData(this);
    
    // Başarı mesajı göster
    showToast('Devam kaydı başarıyla eklendi', 'success');
    
    // Modal'ı kapat
    const modal = bootstrap.Modal.getInstance(document.getElementById('addAttendanceModal'));
    modal.hide();
    
    // Formu temizle
    this.reset();
    
    // Sayfayı yenile (gerçek uygulamada tablo güncellenir)
    setTimeout(() => {
        location.reload();
    }, 1500);
});

// Edit form submit handler
document.getElementById('editAttendanceForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Form verilerini al
    const formData = new FormData(this);
    
    // Başarı mesajı göster
    showToast('Devam kaydı başarıyla güncellendi', 'success');
    
    // Modal'ı kapat
    const modal = bootstrap.Modal.getInstance(document.getElementById('editAttendanceModal'));
    modal.hide();
    
    // Formu temizle
    this.reset();
    
    // Sayfayı yenile (gerçek uygulamada tablo güncellenir)
    setTimeout(() => {
        location.reload();
    }, 1500);
});
</script>

<?php include 'views/layout/footer.php'; ?>
