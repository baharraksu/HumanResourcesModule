<?php
$pageTitle = 'Dashboard - İnsan Kaynakları Sistemi';

// Basit istatistikler (veritabanından alınacak)
$totalCount = 0; // Şimdilik 0, daha sonra veritabanından alınacak
$departments = [
    'İnsan Kaynakları' => 0,
    'Bilgi Teknolojileri' => 0,
    'Muhasebe' => 0,
    'Satış' => 0,
    'Üretim' => 0
];
$recentEmployees = []; // Şimdilik boş, daha sonra veritabanından alınacak

include __DIR__ . '/layout/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard
        </h1>
        <p class="text-muted">İnsan Kaynakları Yönetim Sistemi Genel Bakış</p>
    </div>
</div>

<!-- İstatistik Kartları -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Toplam Çalışan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalCount ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Aktif Çalışanlar
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalCount ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Departman Sayısı
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Bekleyen İzinler
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik ve Tablo Satırı -->
<div class="row">
    <!-- Departman Dağılımı Grafiği -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Departman Bazında Çalışan Dağılımı</h6>
            </div>
            <div class="card-body">
                <canvas id="departmentChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Son Eklenen Çalışanlar -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Son Eklenen Çalışanlar</h6>
            </div>
            <div class="card-body">
                <?php if (empty($recentEmployees)): ?>
                    <p class="text-muted text-center">Henüz çalışan eklenmemiş.</p>
                <?php else: ?>
                    <?php foreach ($recentEmployees as $employee): ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0"><?= htmlspecialchars($employee['first_name'] . ' ' . $employee['last_name']) ?></h6>
                                <small class="text-muted">
                                    <?= htmlspecialchars($employee['position_title'] ?? 'Pozisyon belirtilmemiş') ?>
                                </small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <div class="text-center mt-3">
                    <a href="/employees" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-right me-1"></i>
                        Tüm Çalışanları Gör
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hızlı İşlemler -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hızlı İşlemler</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="/employees/add" class="btn btn-success w-100">
                            <i class="fas fa-plus me-2"></i>
                            Yeni Çalışan Ekle
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="/leave-requests" class="btn btn-info w-100">
                            <i class="fas fa-calendar-plus me-2"></i>
                            İzin Talebi Oluştur
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="/reports" class="btn btn-warning w-100">
                            <i class="fas fa-chart-line me-2"></i>
                            Rapor Oluştur
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="/departments" class="btn btn-secondary w-100">
                            <i class="fas fa-cogs me-2"></i>
                            Departman Yönetimi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Departman grafiği
const ctx = document.getElementById('departmentChart').getContext('2d');
const departmentChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?= json_encode(array_keys($departments)) ?>,
        datasets: [{
            data: <?= json_encode(array_values($departments)) ?>,
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#36b9cc',
                '#f6c23e',
                '#e74a3b'
            ],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

<?php include __DIR__ . '/layout/footer.php'; ?>
