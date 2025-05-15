/*
* SMMM Saliha Çiçek - Ana JavaScript Dosyası
* salihacicek.com
*/

// Sayfa yüklendiğinde çalışacak kod
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll efekti
    const navbar = document.querySelector('.navbar');
    
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow');
                navbar.classList.add('py-2');
                navbar.classList.remove('py-3');
            } else {
                navbar.classList.remove('shadow');
                navbar.classList.add('py-3');
                navbar.classList.remove('py-2');
            }
        });
    }
    
    // AOS Animasyon Kütüphanesi (Eğer CDN eklenirse kullanılabilir)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true
        });
    }
    
    // Smooth Scroll - İç sayfa bağlantıları için
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Form Doğrulama (İletişim sayfası için)
    const contactForm = document.querySelector('#contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Form doğrulama işlemleri
            let isValid = true;
            const nameInput = document.querySelector('#name');
            const emailInput = document.querySelector('#email');
            const messageInput = document.querySelector('#message');
            
            // İsim kontrolü
            if (!nameInput.value.trim()) {
                showError(nameInput, 'Lütfen adınızı giriniz');
                isValid = false;
            } else {
                showSuccess(nameInput);
            }
            
            // Email kontrolü
            if (!emailInput.value.trim()) {
                showError(emailInput, 'Lütfen email adresinizi giriniz');
                isValid = false;
            } else if (!isValidEmail(emailInput.value)) {
                showError(emailInput, 'Lütfen geçerli bir email adresi giriniz');
                isValid = false;
            } else {
                showSuccess(emailInput);
            }
            
            // Mesaj kontrolü
            if (!messageInput.value.trim()) {
                showError(messageInput, 'Lütfen mesajınızı giriniz');
                isValid = false;
            } else {
                showSuccess(messageInput);
            }
            
            // Form geçerliyse gönderim işlemi
            if (isValid) {
                // Form verilerini bir sunucuya göndermek için burada AJAX kodu olacak
                // Şimdilik sadece başarı mesajı gösterelim
                const successMessage = document.querySelector('#formSuccess');
                if (successMessage) {
                    successMessage.classList.remove('d-none');
                    contactForm.reset();
                    
                    // 5 saniye sonra mesajı gizle
                    setTimeout(() => {
                        successMessage.classList.add('d-none');
                    }, 5000);
                }
            }
        });
    }
    
    // Hata mesajı gösterme fonksiyonu
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        formGroup.classList.add('has-error');
        
        let errorElement = formGroup.querySelector('.error-message');
        
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.className = 'error-message text-danger mt-1';
            formGroup.appendChild(errorElement);
        }
        
        errorElement.textContent = message;
    }
    
    // Başarı durumunu gösterme fonksiyonu
    function showSuccess(input) {
        const formGroup = input.closest('.form-group');
        formGroup.classList.remove('has-error');
        
        const errorElement = formGroup.querySelector('.error-message');
        if (errorElement) {
            errorElement.textContent = '';
        }
    }
    
    // Email doğrulama fonksiyonu
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});

// Google Haritalar API'si yüklendikten sonra çalışacak kod
function initMap() {
    // Harita oluşturma (Google Maps API aktif edilirse kullanılabilir)
    if (document.getElementById('map')) {
        // Çerkezköy koordinatları
        const cerkezkoy = { lat: 41.2861, lng: 27.9822 };
        
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: cerkezkoy,
        });
        
        const marker = new google.maps.Marker({
            position: cerkezkoy,
            map: map,
            title: 'SMMM Saliha Çiçek'
        });
    }
} 