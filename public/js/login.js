document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('loginButton');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const errorAlert = document.getElementById('errorAlert');
    const successAlert = document.getElementById('successAlert');
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    const registerLink = document.getElementById('registerLink');

    // Toggle password visibility
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Lihat' : 'Sembunyikan';
    });

    function showAlert(message, type = 'error') {
        hideAlerts();
        const alert = type === 'error' ? errorAlert : successAlert;
        alert.textContent = message;
        alert.style.display = 'block';
        
        setTimeout(() => {
            alert.style.display = 'none';
        }, 5000);
    }

    function hideAlerts() {
        errorAlert.style.display = 'none';
        successAlert.style.display = 'none';
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateForm() {
        const email = emailInput.value.trim();
        const password = passwordInput.value;

        if (!email) {
            showAlert('Email tidak boleh kosong');
            emailInput.focus();
            return false;
        }

        if (!isValidEmail(email)) {
            showAlert('Format email tidak valid');
            emailInput.focus();
            return false;
        }

        if (!password) {
            showAlert('Kata sandi tidak boleh kosong');
            passwordInput.focus();
            return false;
        }

        if (password.length < 6) {
            showAlert('Kata sandi minimal 6 karakter');
            passwordInput.focus();
            return false;
        }

        return true;
    }

    async function simulateLogin(email, password) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                if (email === 'demo@example.com' && password === 'password123') {
                    resolve({
                        success: true,
                        message: 'Login berhasil!',
                        user: {
                            email: email,
                            name: 'Demo User'
                        }
                    });
                } else {
                    reject({
                        success: false,
                        message: 'Email atau kata sandi salah. Coba gunakan demo@example.com / password123'
                    });
                }
            }, 1500);
        });
    }

    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        const email = emailInput.value.trim();
        const password = passwordInput.value;

        loginButton.textContent = 'Memproses...';
        loginForm.classList.add('loading');
        hideAlerts();

        try {
            const result = await simulateLogin(email, password);
            showAlert(result.message, 'success');
            
            setTimeout(() => {
                alert('Redirect ke dashboard... (Demo)');
            }, 2000);

        } catch (error) {
            showAlert(error.message);
        } finally {
            loginButton.textContent = 'Masuk';
            loginForm.classList.remove('loading');
        }
    });

    forgotPasswordLink.addEventListener('click', function(e) {
        e.preventDefault();
        showAlert('Fitur reset password akan segera tersedia', 'success');
    });

    registerLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Redirect ke halaman pendaftaran... (Demo)');
    });

    [emailInput, passwordInput].forEach(input => {
        input.addEventListener('input', hideAlerts);
    });

    setTimeout(() => {
        showAlert('Demo: gunakan email "demo@example.com" dan password "password123"', 'success');
    }, 1000);
});
