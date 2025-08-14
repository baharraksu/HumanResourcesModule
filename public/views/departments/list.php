<?php
$pageTitle = 'Departmanlar - İnsan Kaynakları Sistemi';
$currentPage = 'departments';
$breadcrumb = 'Departmanlar';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-building me-2"></i>Departmanlar
            </h1>
            <p class="page-subtitle">Şirket departmanlarını yönetin ve organize edin</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                <i class="fas fa-plus me-2"></i>Yeni Departman Ekle
            </button>
        </div>
    </div>
</div>

<!-- Department Statistics -->
<div class="stats-grid mb-4">
    <div class="stat-card primary">
        <div class="stat-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">9</div>
            <div class="stat-label">Toplam Departman</div>
        </div>
    </div>

    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">156</div>
            <div class="stat-label">Toplam Çalışan</div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">9</div>
            <div class="stat-label">Departman Müdürü</div>
        </div>
    </div>

    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">85%</div>
            <div class="stat-label">Ortalama Performans</div>
        </div>
    </div>
</div>

<!-- Departments List -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>Departman Listesi
                </h5>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control search-input" placeholder="Departman ara..." data-target="#departmentsTable">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="departmentsTable">
                <thead>
                    <tr>
                        <th>Departman</th>
                        <th>Müdür</th>
                        <th>Çalışan Sayısı</th>
                        <th>Bütçe</th>
                        <th>Durum</th>
                        <th>Oluşturulma</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Usta</h6>
                                    <span class="department-code">UST</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Ahmet Yılmaz</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">20</span>
                        </td>
                        <td>
                            <span class="budget">₺150,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>15.01.2020</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(1)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(1)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(1, 'Usta')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Mutfak</h6>
                                    <span class="department-code">MUT</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Fatma Demir</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">25</span>
                        </td>
                        <td>
                            <span class="budget">₺125,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>20.03.2021</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(2)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(2)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(2, 'Mutfak')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-broom"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Temizlik Personeli</h6>
                                    <span class="department-code">TEM</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Ayşe Özkan</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">15</span>
                        </td>
                        <td>
                            <span class="budget">₺75,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>10.05.2021</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(3)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(3)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(3, 'Temizlik Personeli')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Sekreter</h6>
                                    <span class="department-code">SEK</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Ali Veli</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">10</span>
                        </td>
                        <td>
                            <span class="budget">₺60,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>15.07.2021</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(4)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(4)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(4, 'Sekreter')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Finans</h6>
                                    <span class="department-code">FIN</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Zeynep Kaya</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">8</span>
                        </td>
                        <td>
                            <span class="budget">₺100,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>01.09.2021</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(5)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(5)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(5, 'Finans')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Mühendis</h6>
                                    <span class="department-code">MUH</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Mehmet Kaya</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">12</span>
                        </td>
                        <td>
                            <span class="budget">₺200,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>20.11.2021</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(6)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(6)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(6, 'Mühendis')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Bilişimci</h6>
                                    <span class="department-code">BIL</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Can Demir</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">8</span>
                        </td>
                        <td>
                            <span class="budget">₺120,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>05.01.2022</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(7)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(7)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(7, 'Bilişimci')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">Muhasebe</h6>
                                    <span class="department-code">MUH</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Elif Yılmaz</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">10</span>
                        </td>
                        <td>
                            <span class="budget">₺80,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>10.06.2019</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(8)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(8)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(8, 'Muhasebe')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="department-info">
                                <div class="department-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="department-details">
                                    <h6 class="department-name">İnsan Kaynakları</h6>
                                    <span class="department-code">İK</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Admin User</span>
                            </div>
                        </td>
                        <td>
                            <span class="employee-count">5</span>
                        </td>
                        <td>
                            <span class="budget">₺90,000</span>
                        </td>
                        <td>
                            <span class="status-badge active">Aktif</span>
                        </td>
                        <td>01.01.2020</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary" onclick="viewDepartment(9)" title="Görüntüle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="editDepartment(9)" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteDepartment(9, 'İnsan Kaynakları')" title="Sil">
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

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Yeni Departman Ekle
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Departman Adı</label>
                        <input type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback">Departman adı gereklidir.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departman Kodu</label>
                        <input type="text" class="form-control" name="code" required>
                        <div class="invalid-feedback">Departman kodu gereklidir.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Açıklama</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bütçe</label>
                        <input type="number" class="form-control" name="budget" min="0" step="1000">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteDepartmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>Departman Silme Onayı
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong id="deleteDepartmentName"></strong> departmanını silmek istediğinizden emin misiniz?</p>
                <p class="text-muted small">Bu işlem geri alınamaz ve departmanın tüm verileri kalıcı olarak silinecektir.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteDepartmentBtn">
                    <i class="fas fa-trash me-2"></i>Evet, Sil
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Department List Specific Styles */
.department-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.department-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, var(--primary-color), #7c3aed);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.department-name {
    margin: 0 0 0.25rem 0;
    font-weight: 600;
    color: var(--dark-color);
}

.department-code {
    font-size: 0.75rem;
    color: var(--secondary-color);
    background: var(--light-color);
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-weight: 500;
}

.manager-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.manager-avatar {
    width: 2rem;
    height: 2rem;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.875rem;
}

.employee-count {
    font-weight: 600;
    color: var(--primary-color);
}

.budget {
    font-weight: 600;
    color: var(--success-color);
}

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

/* Responsive Design */
@media (max-width: 768px) {
    .department-info {
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
// Department Management Functions
function viewDepartment(id) {
    window.location.href = `index.php?page=departments-view&id=${id}`;
}

function editDepartment(id) {
    window.location.href = `index.php?page=departments-edit&id=${id}`;
}

function deleteDepartment(id, name) {
    document.getElementById('deleteDepartmentName').textContent = name;
    document.getElementById('confirmDeleteDepartmentBtn').onclick = function() {
        // Perform delete operation
        showToast(`${name} departmanı başarıyla silindi`, 'success');
        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteDepartmentModal'));
        modal.hide();
        
        // Remove row from table
        const row = document.querySelector(`tr[data-department-id="${id}"]`);
        if (row) {
            row.remove();
        }
    };
    
    const modal = new bootstrap.Modal(document.getElementById('deleteDepartmentModal'));
    modal.show();
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Add data attributes to rows for easier management
    const rows = document.querySelectorAll('#departmentsTable tbody tr');
    rows.forEach((row, index) => {
        row.setAttribute('data-department-id', index + 1);
    });
    
    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();
                showToast('Departman başarıyla eklendi', 'success');
                const modal = bootstrap.Modal.getInstance(document.getElementById('addDepartmentModal'));
                modal.hide();
                form.reset();
            }
            form.classList.add('was-validated');
        });
    });
});
</script>

<?php include 'views/layout/footer.php'; ?>
