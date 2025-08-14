<?php
$pageTitle = 'Çalışanlar - İnsan Kaynakları Sistemi';
$currentPage = 'employees';
$breadcrumb = 'Çalışanlar / Liste';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-users me-2"></i>Çalışanlar
            </h1>
            <p class="page-subtitle">Sistemdeki tüm çalışanları görüntüleyin ve yönetin</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="/İnsanKaynaklarıModül/public/employees/add" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Yeni Çalışan Ekle
            </a>
            <button class="btn btn-outline-secondary ms-2" onclick="exportToCSV('employeesTable', 'calisanlar.csv')">
                <i class="fas fa-download me-2"></i>CSV İndir
            </button>
        </div>
    </div>
</div>

<!-- Filters and Search -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
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
            <div class="col-md-3">
                <label class="form-label">Durum</label>
                <select class="form-select" id="statusFilter">
                    <option value="">Tümü</option>
                    <option value="Aktif">Aktif</option>
                    <option value="İzinli">İzinli</option>
                    <option value="Pasif">Pasif</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Arama</label>
                <input type="text" class="form-control search-input" placeholder="Ad, soyad veya sicil no..." data-target="#employeesTable">
            </div>
            <div class="col-md-3">
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

<!-- Employees Table -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>Çalışan Listesi
                </h5>
            </div>
            <div class="col-md-6 text-end">
                <span class="text-muted">Toplam <strong id="totalCount">0</strong> çalışan</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="employeesTable">
                <thead>
                    <tr>
                        <th>Çalışan</th>
                        <th>Sicil No</th>
                        <th>Departman</th>
                        <th>Pozisyon</th>
                        <th>İşe Başlama</th>
                        <th>Durum</th>
                        <th>İletişim</th>
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
                                    <h6 class="employee-name">Ahmet Yılmaz</h6>
                                    <span class="employee-email">ahmet.yilmaz@firma.com</span>
                                </div>
                            </div>
                        </td>
                        <td>EMP001</td>
                        <td>
                            <span class="badge bg-primary">Mutfak</span>
                        </td>
                        <td>Şef</td>
                        <td>15.01.2020</td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>
                            <div class="contact-info">
                                <span class="phone">+90 555 123 45 67</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewEmployee(1)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editEmployee(1)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteEmployee(1, 'Ahmet Yılmaz')" title="Sil">
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
                                    <h6 class="employee-name">Fatma Garson</h6>
                                    <span class="employee-email">fatma.garson@firma.com</span>
                                </div>
                            </div>
                        </td>
                        <td>EMP002</td>
                        <td>
                            <span class="badge bg-success">Servis</span>
                        </td>
                        <td>Garson</td>
                        <td>20.03.2021</td>
                        <td>
                            <span class="status-badge leave">İzinli</span>
                        </td>
                        <td>
                            <div class="contact-info">
                                <span class="phone">+90 555 234 56 78</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewEmployee(2)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editEmployee(2)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteEmployee(2, 'Fatma Garson')" title="Sil">
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
                                    <h6 class="employee-name">Mehmet Muhasebeci</h6>
                                    <span class="employee-email">mehmet.muhasebeci@firma.com</span>
                                </div>
                            </div>
                        </td>
                        <td>EMP003</td>
                        <td>
                            <span class="badge bg-info">Muhasebe</span>
                        </td>
                        <td>Muhasebe Uzmanı</td>
                        <td>10.06.2019</td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>
                            <div class="contact-info">
                                <span class="phone">+90 555 345 67 89</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewEmployee(3)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editEmployee(3)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteEmployee(3, 'Mehmet Muhasebeci')" title="Sil">
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
                                    <h6 class="employee-name">Ayşe İK</h6>
                                    <span class="employee-email">ayse.ik@firma.com</span>
                                </div>
                            </div>
                        </td>
                        <td>EMP004</td>
                        <td>
                            <span class="badge bg-warning">İK</span>
                        </td>
                        <td>İK Uzmanı</td>
                        <td>05.09.2022</td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>
                            <div class="contact-info">
                                <span class="phone">+90 555 456 78 90</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewEmployee(4)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editEmployee(4)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteEmployee(4, 'Ayşe İK')" title="Sil">
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>Çalışan Silme Onayı
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong id="deleteEmployeeName"></strong> adlı çalışanı silmek istediğinizden emin misiniz?</p>
                <p class="text-muted small">Bu işlem geri alınamaz ve çalışanın tüm verileri kalıcı olarak silinecektir.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash me-2"></i>Evet, Sil
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Employee List Specific Styles */
.page-header {
    background: white;
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.page-subtitle {
    color: var(--secondary-color);
    margin-bottom: 0;
}

/* Employee Info */
.employee-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.employee-avatar {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, var(--primary-color), #7c3aed);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.employee-name {
    margin: 0 0 0.25rem 0;
    font-weight: 600;
    color: var(--dark-color);
}

.employee-email {
    font-size: 0.875rem;
    color: var(--secondary-color);
}

/* Status Badges */
.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.status-badge.active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success-color);
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.status-badge.leave {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning-color);
    border: 1px solid rgba(245, 158, 11, 0.2);
}

.status-badge.inactive {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger-color);
    border: 1px solid rgba(239, 68, 68, 0.2);
}

/* Contact Info */
.contact-info {
    font-size: 0.875rem;
}

.contact-info .phone {
    color: var(--primary-color);
    font-weight: 500;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.action-buttons .btn {
    width: 2rem;
    height: 2rem;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Department Badges */
.badge {
    font-size: 0.75rem;
    font-weight: 500;
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .employee-info {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .action-buttons .btn {
        width: 100%;
        height: auto;
        padding: 0.5rem;
    }
}
</style>

<script>
// Employee Management Functions
function viewEmployee(id) {
    window.location.href = `index.php?page=employees-view&id=${id}`;
}

function editEmployee(id) {
    window.location.href = `index.php?page=employees-edit&id=${id}`;
}

function deleteEmployee(id, name) {
    document.getElementById('deleteEmployeeName').textContent = name;
    document.getElementById('confirmDeleteBtn').onclick = function() {
        // Perform delete operation
        showToast(`${name} başarıyla silindi`, 'success');
        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
        modal.hide();
        
        // Remove row from table
        const row = document.querySelector(`tr[data-employee-id="${id}"]`);
        if (row) {
            row.remove();
            updateTotalCount();
        }
    };
    
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function applyFilters() {
    const department = document.getElementById('departmentFilter').value;
    const status = document.getElementById('statusFilter').value;
    const searchTerm = document.querySelector('.search-input').value.toLowerCase();
    
    const rows = document.querySelectorAll('#employeesTable tbody tr');
    let visibleCount = 0;
    
    rows.forEach(row => {
        const dept = row.querySelector('td:nth-child(3)').textContent;
        const stat = row.querySelector('td:nth-child(6)').textContent;
        const text = row.textContent.toLowerCase();
        
        let show = true;
        
        if (department && !dept.includes(department)) show = false;
        if (status && !stat.includes(status)) show = false;
        if (searchTerm && !text.includes(searchTerm)) show = false;
        
        row.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });
    
    document.getElementById('totalCount').textContent = visibleCount;
}

function updateTotalCount() {
    const visibleRows = document.querySelectorAll('#employeesTable tbody tr:not([style*="display: none"])');
    document.getElementById('totalCount').textContent = visibleRows.length;
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    updateTotalCount();
    
    // Add event listeners for filters
    document.getElementById('departmentFilter').addEventListener('change', applyFilters);
    document.getElementById('statusFilter').addEventListener('change', applyFilters);
    
    // Add data attributes to rows for easier management
    const rows = document.querySelectorAll('#employeesTable tbody tr');
    rows.forEach((row, index) => {
        row.setAttribute('data-employee-id', index + 1);
    });
});
</script>

<?php include 'views/layout/footer.php'; ?>
