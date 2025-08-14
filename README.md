# 🚀 Modern İnsan Kaynakları Yönetim Sistemi

Modern, kullanıcı dostu ve responsive tasarıma sahip insan kaynakları yönetim sistemi. Bu proje, çalışan yönetimi, departman yönetimi, izin takibi ve raporlama gibi temel İK işlevlerini sağlar.

## ✨ Özellikler

### 🎨 Modern Arayüz
- **Responsive Design**: Tüm cihazlarda mükemmel görünüm
- **Dark Sidebar**: Modern sidebar navigasyon sistemi
- **Gradient Tasarım**: Çekici renk geçişleri ve gölgeler
- **Animasyonlar**: Smooth geçişler ve hover efektleri
- **Font Awesome**: Zengin ikon kütüphanesi

### 🔧 Teknik Özellikler
- **PHP 8.0+**: Modern PHP özellikleri
- **Bootstrap 5.3**: En güncel CSS framework
- **Vanilla JavaScript**: Framework bağımsız JavaScript
- **Chart.js**: İnteraktif grafikler ve istatistikler
- **CSS Variables**: Kolay özelleştirilebilir tasarım sistemi

### 📊 Modüller
- **Dashboard**: Genel bakış ve istatistikler
- **Çalışan Yönetimi**: CRUD işlemleri ve detaylı bilgiler
- **Departman Yönetimi**: Organizasyon yapısı
- **İzin Talepleri**: İzin yönetimi ve onay süreçleri
- **Devam Takibi**: Giriş-çıkış kayıtları
- **Bordro**: Maaş ve ödeme yönetimi
- **Raporlar**: Detaylı analiz ve raporlar
- **Ayarlar**: Sistem konfigürasyonu

## 🚀 Kurulum

### Gereksinimler
- PHP 8.0 veya üzeri
- Apache/Nginx web sunucusu
- mod_rewrite etkin
- Composer (opsiyonel)

### Adım 1: Projeyi İndirin
```bash
git clone [repository-url]
cd İnsanKaynaklarıModül
```

### Adım 2: Web Sunucusu Yapılandırması
Projeyi web sunucunuzun document root'una kopyalayın veya virtual host olarak yapılandırın.

**Apache için:**
```apache
<VirtualHost *:80>
    ServerName ik-sistemi.local
    DocumentRoot /path/to/İnsanKaynaklarıModül/public
    
    <Directory /path/to/İnsanKaynaklarıModül/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**Nginx için:**
```nginx
server {
    listen 80;
    server_name ik-sistemi.local;
    root /path/to/İnsanKaynaklarıModül/public;
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### Adım 3: Dosya İzinleri
```bash
chmod -R 755 public/
chmod -R 644 public/.htaccess
```

### Adım 4: Tarayıcıda Açın
```
http://localhost/İnsanKaynaklarıModül/public/
```

## 📁 Proje Yapısı

```
İnsanKaynaklarıModül/
├── public/                 # Web erişilebilir dosyalar
│   ├── css/               # Stil dosyaları
│   ├── js/                # JavaScript dosyaları
│   ├── views/             # PHP view dosyaları
│   │   ├── layout/        # Header ve footer
│   │   ├── employees/     # Çalışan sayfaları
│   │   ├── departments/   # Departman sayfaları
│   │   └── ...
│   ├── .htaccess         # URL rewriting
│   └── index.php         # Ana routing dosyası
├── src/                   # PHP sınıfları
├── config/                # Konfigürasyon dosyaları
├── database/              # Veritabanı şemaları
└── vendor/                # Composer bağımlılıkları
```

## 🎯 Kullanım

### Dashboard
Ana sayfa, sistem genelinde önemli istatistikleri gösterir:
- Toplam çalışan sayısı
- Aktif çalışanlar
- Departman sayısı
- Bekleyen izin talepleri
- Haftalık devam takibi grafiği
- Son aktiviteler

### Çalışan Yönetimi
- **Liste Görünümü**: Tüm çalışanları tablo halinde listeler
- **Filtreleme**: Departman, durum ve arama ile filtreleme
- **CRUD İşlemleri**: Ekleme, düzenleme, silme
- **Detaylı Bilgiler**: Kişisel, iş ve iletişim bilgileri

### Departman Yönetimi
- **Organizasyon Yapısı**: Hiyerarşik departman görünümü
- **Müdür Atama**: Departman müdürü belirleme
- **Bütçe Takibi**: Departman bütçe yönetimi
- **Performans Metrikleri**: Departman bazında istatistikler

## 🎨 Özelleştirme

### Renk Teması
CSS değişkenlerini düzenleyerek renk temasını özelleştirebilirsiniz:

```css
:root {
    --primary-color: #4f46e5;      /* Ana renk */
    --secondary-color: #64748b;    /* İkincil renk */
    --success-color: #10b981;      /* Başarı rengi */
    --warning-color: #f59e0b;      /* Uyarı rengi */
    --danger-color: #ef4444;       /* Tehlike rengi */
}
```

### Sidebar Genişliği
```css
:root {
    --sidebar-width: 280px;           /* Genişletilmiş sidebar */
    --sidebar-collapsed-width: 70px;  /* Daraltılmış sidebar */
}
```

### Gölge Efektleri
```css
:root {
    --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
}
```

## 📱 Responsive Tasarım

Sistem tüm cihaz boyutlarında optimize edilmiştir:

- **Desktop**: Tam özellikli sidebar ve geniş layout
- **Tablet**: Responsive tablolar ve uyarlanabilir grid
- **Mobile**: Mobil öncelikli navigasyon ve touch-friendly butonlar

## 🔧 Geliştirme

### Yeni Sayfa Ekleme
1. `public/views/` altında yeni klasör oluşturun
2. Sayfa dosyasını oluşturun ve header/footer include edin
3. `public/index.php`'de routing ekleyin
4. CSS ve JavaScript dosyalarını güncelleyin

### Yeni Modül Ekleme
1. `src/Models/` altında model sınıfı oluşturun
2. `src/Repositories/` altında repository sınıfı oluşturun
3. `src/Services/` altında service sınıfı oluşturun
4. View dosyalarını oluşturun

## 🚀 Performans Optimizasyonu

- **CSS/JS Minification**: Üretim ortamında dosyaları sıkıştırın
- **Image Optimization**: Resimleri optimize edin
- **Caching**: Browser ve server-side caching kullanın
- **CDN**: Statik dosyalar için CDN kullanın

## 🔒 Güvenlik

- **Input Validation**: Tüm kullanıcı girdilerini doğrulayın
- **SQL Injection**: Prepared statements kullanın
- **XSS Protection**: Output escaping uygulayın
- **CSRF Protection**: Token-based koruma ekleyin

## 📊 Veritabanı

Sistem MySQL/MariaDB ile çalışır. Veritabanı şeması `database/schema.sql` dosyasında bulunur.

## 🤝 Katkıda Bulunma

1. Fork yapın
2. Feature branch oluşturun (`git checkout -b feature/amazing-feature`)
3. Commit yapın (`git commit -m 'Add amazing feature'`)
4. Push yapın (`git push origin feature/amazing-feature`)
5. Pull Request oluşturun

## 📝 Lisans

Bu proje MIT lisansı altında lisanslanmıştır.

## 📞 Destek

Herhangi bir sorun veya öneri için:
- Issue oluşturun
- Email gönderin
- Dokümantasyonu inceleyin

## 🎉 Teşekkürler

Bu projeyi mümkün kılan tüm açık kaynak projelere teşekkürler:
- Bootstrap
- Font Awesome
- Chart.js
- PHP Community

---

**Not**: Bu proje geliştirme aşamasındadır ve production ortamında kullanmadan önce kapsamlı test yapılması önerilir.
