<?php
$pageTitle = 'Sayfa Bulunamadı - İnsan Kaynakları Sistemi';
$currentPage = '404';
$breadcrumb = '404';
include 'views/layout/header.php';
?>

<!-- 404 Error Page -->
<div class="error-page">
    <div class="error-content text-center">
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        
        <h1 class="error-title">404</h1>
        <h2 class="error-subtitle">Sayfa Bulunamadı</h2>
        
        <p class="error-description">
            Aradığınız sayfa mevcut değil veya taşınmış olabilir. 
            Lütfen URL'yi kontrol edin veya ana sayfaya dönün.
        </p>
        
        <div class="error-actions">
            <a href="/İnsanKaynaklarıModül/public/" class="btn btn-primary btn-lg">
                <i class="fas fa-home me-2"></i>Ana Sayfaya Dön
            </a>
            <button class="btn btn-outline-secondary btn-lg ms-3" onclick="history.back()">
                <i class="fas fa-arrow-left me-2"></i>Geri Git
            </button>
        </div>
        
        <div class="error-help mt-4">
            <h5>Yardımcı olabilecek linkler:</h5>
            <div class="help-links">
                <a href="/İnsanKaynaklarıModül/public/employees" class="help-link">
                    <i class="fas fa-users me-2"></i>Çalışanlar
                </a>
                <a href="/İnsanKaynaklarıModül/public/departments" class="help-link">
                    <i class="fas fa-building me-2"></i>Departmanlar
                </a>
                <a href="/İnsanKaynaklarıModül/public/reports" class="help-link">
                    <i class="fas fa-chart-bar me-2"></i>Raporlar
                </a>
                <a href="/İnsanKaynaklarıModül/public/settings" class="help-link">
                    <i class="fas fa-cog me-2"></i>Ayarlar
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* 404 Error Page Styles */
.error-page {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.error-content {
    max-width: 600px;
}

.error-icon {
    width: 8rem;
    height: 8rem;
    background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 3rem;
    color: white;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.7);
    }
    70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(245, 158, 11, 0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
    }
}

.error-title {
    font-size: 6rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 0;
    line-height: 1;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.error-subtitle {
    font-size: 2rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.error-description {
    font-size: 1.1rem;
    color: var(--secondary-color);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.error-actions {
    margin-bottom: 3rem;
}

.help-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
    margin-top: 1rem;
}

.help-link {
    display: inline-flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    background: var(--light-color);
    color: var(--dark-color);
    text-decoration: none;
    border-radius: 0.75rem;
    transition: all 0.3s;
    font-weight: 500;
}

.help-link:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Responsive Design */
@media (max-width: 768px) {
    .error-title {
        font-size: 4rem;
    }
    
    .error-subtitle {
        font-size: 1.5rem;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .error-actions .btn {
        margin: 0.5rem 0;
    }
    
    .help-links {
        flex-direction: column;
        align-items: center;
    }
    
    .help-link {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?php include 'views/layout/footer.php'; ?>
