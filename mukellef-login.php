<?php
// Eğer form gönderilmişse
$error = null;
$vkn_tcno = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vkn_tcno = isset($_POST['vkn_tcno']) ? $_POST['vkn_tcno'] : '';
    $sifre = isset($_POST['sifre']) ? $_POST['sifre'] : '';
    
    // Form kontrolleri
    if (empty($vkn_tcno) || empty($sifre)) {
        $error = "VKN/TCKN ve şifre alanları zorunludur.";
    } else {
        // Mock veri kontrolü - gerçek sistemde bu kısım veritabanı sorgusu olacaktır
        $error = "Geçersiz VKN/TCKN veya şifre. Lütfen bilgilerinizi kontrol ediniz.";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SMMM Saliha Çiçek mükellef paneli giriş sayfası. Mükelleflerimiz için özel bulut ve şirket yönetim paneline buradan giriş yapabilirsiniz.">
    <meta name="keywords" content="mükellef giriş, mali müşavir panel, muhasebe portalı, Saliha Çiçek, mükellef işlemleri">
    <meta name="author" content="SMMM Saliha Çiçek">
    <meta name="robots" content="noindex, nofollow">
    
    <title>Mükellef Giriş Paneli | SMMM Saliha Çiçek</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
    <style>
        .login-card {
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .login-card .card-header {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 25px;
        }
        .login-form-container {
            max-width: 450px;
            margin: 0 auto;
        }
        .form-logo {
            margin-bottom: 15px;
        }
        .login-links {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .login-links:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .link-logo {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .btn-login {
            padding: 10px 20px;
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header Bölümü -->
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <span class="fw-bold text-primary">SMMM</span> <span class="fw-bold">Saliha Çiçek</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Ana Sayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hakkimizda.html">Hakkımızda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hizmetler.html">Hizmetlerimiz</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="iletisim.html">İletişim</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-primary btn-sm rounded-pill px-3 py-2 d-flex align-items-center active" href="mukellef-login.php">
                                <i class="fas fa-user-lock me-2"></i>Mükellef Giriş
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Sayfa Başlığı -->
    <section class="page-header bg-primary py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="fw-bold mb-3">Mükellef Giriş Paneli</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-white text-decoration-none">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Mükellef Giriş</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Giriş Formu ve Faydalı Bağlantılar -->
    <section class="login-section py-5">
        <div class="container">
            <div class="row">
                <!-- Giriş Formu -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="login-form-container">
                        <div class="card login-card">
                            <div class="card-header">
                                <!-- SVG Logo -->
                                <svg class="form-logo" width="80" height="80" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" fill="#ffffff" />
                                    <circle cx="40" cy="30" r="12" fill="#0d6efd" />
                                    <path d="M40,50 C24,50 20,65 20,65 L60,65 C60,65 56,50 40,50 Z" fill="#0d6efd" />
                                    <circle cx="40" cy="40" r="38" fill="none" stroke="#ffffff" stroke-width="2" />
                                </svg>
                                <h2 class="h4 fw-bold mb-0">Mükellef Yönetim Paneli</h2>
                                <p class="text-white-50 mb-0">Şirket ve Mali Verilerinize Erişin</p>
                            </div>
                            <div class="card-body p-4">
                                <?php if($error): ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i> <?php echo $error; ?>
                                </div>
                                <?php endif; ?>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="mb-3">
                                        <label for="vkn_tcno" class="form-label">VKN veya TCKN</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            <input type="text" class="form-control" id="vkn_tcno" name="vkn_tcno" placeholder="Vergi No veya TC Kimlik No" value="<?php echo htmlspecialchars($vkn_tcno); ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="sifre" class="form-label">Şifre</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifrenizi girin" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                            <label class="form-check-label" for="remember">
                                                Beni hatırla
                                            </label>
                                        </div>
                                        <a href="#" class="text-decoration-none">Şifremi unuttum</a>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-login">
                                            <i class="fas fa-sign-in-alt me-2"></i>Giriş Yap
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer bg-light text-center p-3">
                                <p class="mb-0">Giriş yapamıyor musunuz? <a href="iletisim.html" class="text-decoration-none">Destek alın</a></p>
                            </div>
                        </div>
                        
                        <!-- Bilgi Kutusu -->
                        <div class="alert alert-info mt-4" role="alert">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-info-circle fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="alert-heading h5">Güvenli Giriş Bilgileri</h4>
                                    <p class="mb-0">Şirketinize özel bulut sistemine ve mali verilerinize erişmek için VKN/TCKN ve şifreniz ile giriş yapabilirsiniz. Şifrenizi kimseyle paylaşmayın ve düzenli olarak değiştirin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Faydalı Bağlantılar -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="h5 mb-0">Faydalı Bağlantılar</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <!-- İnteraktif Vergi Dairesi -->
                                <div class="col-md-6">
                                    <a href="https://ivd.gib.gov.tr/" target="_blank" class="text-decoration-none">
                                        <div class="card h-100 border login-links">
                                            <div class="card-body text-center p-3">
                                                <!-- İnteraktif Vergi Dairesi Logo -->
                                                <svg class="link-logo" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="60" height="60" rx="10" fill="#f8f9fa" />
                                                    <rect x="10" y="15" width="40" height="30" rx="2" fill="#0d6efd" opacity="0.8" />
                                                    <rect x="15" y="20" width="30" height="5" rx="1" fill="white" />
                                                    <rect x="15" y="30" width="30" height="5" rx="1" fill="white" />
                                                    <circle cx="30" cy="45" r="5" fill="#0d6efd" />
                                                </svg>
                                                <h4 class="card-title h6 mt-2">İnteraktif Vergi Dairesi</h4>
                                                <p class="card-text small text-muted">Vergi işlemlerinizi online yapın</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- E-Fatura Portal -->
                                <div class="col-md-6">
                                    <a href="https://ebelge.gib.gov.tr/" target="_blank" class="text-decoration-none">
                                        <div class="card h-100 border login-links">
                                            <div class="card-body text-center p-3">
                                                <!-- E-Fatura Portal Logo -->
                                                <svg class="link-logo" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="60" height="60" rx="10" fill="#f8f9fa" />
                                                    <rect x="10" y="15" width="40" height="30" rx="2" fill="#28a745" opacity="0.8" />
                                                    <rect x="15" y="20" width="30" height="2" rx="1" fill="white" />
                                                    <rect x="15" y="25" width="30" height="2" rx="1" fill="white" />
                                                    <rect x="15" y="30" width="30" height="2" rx="1" fill="white" />
                                                    <rect x="15" y="35" width="20" height="2" rx="1" fill="white" />
                                                    <path d="M40,35 L45,40 L40,45" stroke="white" stroke-width="2" fill="none" />
                                                </svg>
                                                <h4 class="card-title h6 mt-2">E-Belge Portal</h4>
                                                <p class="card-text small text-muted">e-Fatura ve e-Arşiv işlemleri</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- Dijital Vergi Dairesi -->
                                <div class="col-md-6">
                                    <a href="https://dijital.gib.gov.tr/" target="_blank" class="text-decoration-none">
                                        <div class="card h-100 border login-links">
                                            <div class="card-body text-center p-3">
                                                <!-- Dijital Vergi Dairesi Logo -->
                                                <svg class="link-logo" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="60" height="60" rx="10" fill="#f8f9fa" />
                                                    <rect x="10" y="10" width="40" height="40" rx="5" fill="#6f42c1" opacity="0.8" />
                                                    <rect x="20" y="20" width="20" height="5" rx="1" fill="white" />
                                                    <rect x="20" y="30" width="20" height="5" rx="1" fill="white" />
                                                    <circle cx="15" cy="20" r="2" fill="white" />
                                                    <circle cx="15" cy="30" r="2" fill="white" />
                                                    <circle cx="15" cy="40" r="2" fill="white" />
                                                </svg>
                                                <h4 class="card-title h6 mt-2">Dijital Vergi Dairesi</h4>
                                                <p class="card-text small text-muted">Tüm vergi işlemleri tek yerde</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- E-Devlet -->
                                <div class="col-md-6">
                                    <a href="https://www.turkiye.gov.tr/" target="_blank" class="text-decoration-none">
                                        <div class="card h-100 border login-links">
                                            <div class="card-body text-center p-3">
                                                <!-- E-Devlet Logo -->
                                                <svg class="link-logo" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="60" height="60" rx="10" fill="#f8f9fa" />
                                                    <rect x="10" y="15" width="40" height="30" rx="2" fill="#dc3545" opacity="0.8" />
                                                    <path d="M20,30 L40,30 M20,25 L40,25 M20,35 L40,35" stroke="white" stroke-width="2" />
                                                    <path d="M25,20 L25,40 M30,20 L30,40 M35,20 L35,40" stroke="white" stroke-width="2" />
                                                </svg>
                                                <h4 class="card-title h6 mt-2">e-Devlet</h4>
                                                <p class="card-text small text-muted">Kamu hizmetlerine erişim</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- SGK İşveren -->
                                <div class="col-md-6">
                                    <a href="https://uyg.sgk.gov.tr/IsverenSistemi" target="_blank" class="text-decoration-none">
                                        <div class="card h-100 border login-links">
                                            <div class="card-body text-center p-3">
                                                <!-- SGK İşveren Logo -->
                                                <svg class="link-logo" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="60" height="60" rx="10" fill="#f8f9fa" />
                                                    <circle cx="30" cy="30" r="20" fill="#17a2b8" opacity="0.8" />
                                                    <path d="M20,35 L40,35 M25,25 L25,35 M35,25 L35,35" stroke="white" stroke-width="2" />
                                                    <circle cx="30" cy="20" r="5" fill="white" />
                                                </svg>
                                                <h4 class="card-title h6 mt-2">SGK İşveren</h4>
                                                <p class="card-text small text-muted">SGK işveren sistemi</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- GİB Mükellef Bilgileri -->
                                <div class="col-md-6">
                                    <a href="https://www.gib.gov.tr/" target="_blank" class="text-decoration-none">
                                        <div class="card h-100 border login-links">
                                            <div class="card-body text-center p-3">
                                                <!-- GİB Logo -->
                                                <svg class="link-logo" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="60" height="60" rx="10" fill="#f8f9fa" />
                                                    <rect x="15" y="20" width="30" height="25" rx="2" fill="#fd7e14" opacity="0.8" />
                                                    <path d="M15,15 L45,15 L30,5 Z" fill="#fd7e14" opacity="0.8" />
                                                    <rect x="20" y="25" width="20" height="3" rx="1" fill="white" />
                                                    <rect x="20" y="32" width="20" height="3" rx="1" fill="white" />
                                                    <rect x="20" y="39" width="20" height="3" rx="1" fill="white" />
                                                </svg>
                                                <h4 class="card-title h6 mt-2">GİB</h4>
                                                <p class="card-text small text-muted">Gelir İdaresi Başkanlığı</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Destek Bilgileri -->
                    <div class="card mt-4">
                        <div class="card-header bg-light">
                            <h3 class="h5 mb-0">Teknik Destek</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="h6 fw-bold">SMMM Saliha Çiçek</h4>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-phone text-primary me-2"></i> 0537 346 51 61</li>
                                        <li class="mb-2"><i class="fas fa-envelope text-primary me-2"></i> info@salihacicek.com</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="h6 fw-bold">Çalışma Saatleri</h4>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">Pazartesi - Cuma: 09:00 - 18:00</li>
                                        <li class="mb-2">Cumartesi: 09:00 - 14:00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer Bölümü -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h3 class="h5 mb-4">SMMM Saliha Çiçek</h3>
                    <p>Profesyonel mali müşavirlik ve <a href="https://www.ubden.com.tr/" target="_blank" class="text-white text-decoration-underline">Ubden® Teknoloji</a> iş ortaklığıyla IT çözümleri sunuyoruz.</p>
                    <div class="social-links mt-4">
                        <a href="https://www.linkedin.com/company/smmm-saliha-cicek/" class="text-white me-3" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="h5 mb-4">İletişim Bilgileri</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-map-marker-alt me-2"></i> Gazi Mustafa Kemalpaşa, Atatürk Cd. No:72, 59500 Çerkezköy/Tekirdağ</li>
                        <li class="mb-3"><i class="fas fa-phone me-2"></i> <a href="tel:+905373465161" class="text-white text-decoration-none">0537 346 51 61</a></li>
                        <li class="mb-3"><i class="fas fa-envelope me-2"></i> <a href="mailto:info@salihacicek.com" class="text-white text-decoration-none">info@salihacicek.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3 class="h5 mb-4">Çalışma Saatleri</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">Pazartesi - Cuma: 09:00 - 18:00</li>
                        <li class="mb-2">Cumartesi: 09:00 - 14:00</li>
                        <li class="mb-2">Pazar: Kapalı</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0">© 2025 SMMM Saliha Çiçek. Tüm hakları saklıdır.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="text-white text-decoration-none">Gizlilik Politikası</a></li>
                        <li class="list-inline-item ms-3"><a href="#" class="text-white text-decoration-none">Hizmet Şartları</a></li>
                        <li class="list-inline-item ms-3"><a href="#" class="text-white text-decoration-none">Çerez Politikası</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="small text-secondary mb-1">Powered and Design by <a href="https://www.ubden.com.tr/" target="_blank" class="text-white text-decoration-none">Ubden®</a></p>
                    <p class="small text-secondary"><a href="https://www.ubden.com.tr/" target="_blank" class="text-white text-decoration-none">Teknoloji ve Yazılım Danışmanlık</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html> 