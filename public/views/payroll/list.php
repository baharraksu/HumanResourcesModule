<?php
$pageTitle = 'Bordro - İnsan Kaynakları Sistemi';
$currentPage = 'payroll';
$breadcrumb = 'Bordro';
include 'views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="fas fa-money-bill-wave me-2"></i>Bordro
            </h1>
            <p class="page-subtitle">Çalışan maaş bordrolarını yönetin ve hesaplayın</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPayrollModal">
                <i class="fas fa-plus me-2"></i>Yeni Bordro
            </button>
            <button class="btn btn-outline-secondary ms-2" onclick="exportPayroll()">
                <i class="fas fa-download me-2"></i>Bordro İndir
            </button>
        </div>
    </div>
</div>

<!-- Payroll Statistics -->
<div class="stats-grid mb-4">
    <div class="stat-card primary">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">156</div>
            <div class="stat-label">Toplam Çalışan</div>
        </div>
    </div>

    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">₺2.4M</div>
            <div class="stat-label">Toplam Maaş</div>
        </div>
    </div>

    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-calculator"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">₺384K</div>
            <div class="stat-label">Vergi Kesintisi</div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="stat-content">
            <div class="stat-number">₺2.0M</div>
            <div class="stat-label">Net Ödeme</div>
        </div>
    </div>
</div>

<!-- Month Selection and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Dönem</label>
                <select class="form-select" id="payrollPeriod">
                    <option value="2024-01">Ocak 2024</option>
                    <option value="2024-02">Şubat 2024</option>
                    <option value="2024-03">Mart 2024</option>
                    <option value="2024-04">Nisan 2024</option>
                    <option value="2024-05">Mayıs 2024</option>
                    <option value="2024-06">Haziran 2024</option>
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
                <label class="form-label">Durum</label>
                <select class="form-select" id="statusFilter">
                    <option value="">Tümü</option>
                    <option value="Hazırlandı">Hazırlandı</option>
                    <option value="Onaylandı">Onaylandı</option>
                    <option value="Ödendi">Ödendi</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Arama</label>
                <input type="text" class="form-control search-input" placeholder="Ad, soyad veya sicil no..." data-target="#payrollTable">
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button class="btn btn-outline-primary" onclick="applyPayrollFilters()">
                        <i class="fas fa-filter me-2"></i>Filtrele
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payroll Table -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>Bordro Listesi - Ocak 2024
                </h5>
            </div>
            <div class="col-md-6 text-end">
                <span class="text-muted">Toplam <strong id="totalCount">156</strong> bordro</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="payrollTable">
                <thead>
                    <tr>
                        <th>Çalışan</th>
                        <th>Brüt Maaş</th>
                        <th>Vergi</th>
                        <th>SGK</th>
                        <th>Net Maaş</th>
                        <th>Ek Ödemeler</th>
                        <th>Kesintiler</th>
                        <th>Durum</th>
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
                        <td>₺15,000</td>
                        <td>₺2,250</td>
                        <td>₺1,500</td>
                        <td>₺11,250</td>
                        <td>₺500</td>
                        <td>₺200</td>
                        <td><span class="badge bg-success">Ödendi</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-info btn-sm" onclick="viewPayrollDetails(1)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editPayroll(1)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-success btn-sm" onclick="downloadPayslip(1)">
                                    <i class="fas fa-download"></i>
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
                        <td>₺12,000</td>
                        <td>₺1,800</td>
                        <td>₺1,200</td>
                        <td>₺9,000</td>
                        <td>₺300</td>
                        <td>₺150</td>
                        <td><span class="badge bg-warning">Onaylandı</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-info btn-sm" onclick="viewPayrollDetails(2)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editPayroll(2)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-success btn-sm" onclick="downloadPayslip(2)">
                                    <i class="fas fa-download"></i>
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
                        <td>₺18,000</td>
                        <td>₺2,700</td>
                        <td>₺1,800</td>
                        <td>₺13,500</td>
                        <td>₺800</td>
                        <td>₺300</td>
                        <td><span class="badge bg-info">Hazırlandı</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-info btn-sm" onclick="viewPayrollDetails(3)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="editPayroll(3)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-success btn-sm" onclick="downloadPayslip(3)">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Payroll Modal -->
<div class="modal fade" id="addPayrollModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Bordro Oluştur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="payrollForm">
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
                            <label class="form-label">Dönem</label>
                            <select class="form-select" required>
                                <option value="">Seçiniz</option>
                                <option value="2024-01">Ocak 2024</option>
                                <option value="2024-02">Şubat 2024</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Brüt Maaş</label>
                            <input type="number" class="form-control" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Vergi Oranı (%)</label>
                            <input type="number" class="form-control" placeholder="15" value="15" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">SGK Oranı (%)</label>
                            <input type="number" class="form-control" placeholder="10" value="10" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ek Ödemeler</label>
                            <input type="number" class="form-control" placeholder="0.00" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kesintiler</label>
                            <input type="number" class="form-control" placeholder="0.00" value="0">
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
                <button type="submit" form="payrollForm" class="btn btn-primary">Kaydet</button>
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
function viewPayrollDetails(id) {
    window.location.href = `index.php?page=payroll-view&id=${id}`;
}

function editPayroll(id) {
    window.location.href = `index.php?page=payroll-edit&id=${id}`;
}

function downloadPayslip(id) {
    showToast('Bordro indiriliyor...', 'info');
}

function applyPayrollFilters() {
    showToast('Filtreler uygulandı', 'success');
}

function exportPayroll() {
    showToast('Bordro raporu indiriliyor...', 'info');
}
</script>

<?php include 'views/layout/footer.php'; ?>
