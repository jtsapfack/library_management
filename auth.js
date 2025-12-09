document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const loginForm = document.getElementById('loginForm');
    const messageArea = document.getElementById('messageArea');
    const helpLink = document.getElementById('helpLink');

    // Toggle password visibility
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });

    // Handle form submission
    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value;
        const remember = document.getElementById('remember').checked;

        // Clear previous messages
        clearMessage();

        // Basic validation
        if (!username || !password) {
            showMessage('Please fill in all fields', 'error');
            return;
        }

        // Show loading state
        const loginBtn = document.querySelector('.btn-login');
        const originalText = loginBtn.innerHTML;
        loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Authenticating...';
        loginBtn.disabled = true;

        try {
            // Simulate API call - Replace with real authentication
            const isAuthenticated = await authenticateUser(username, password);
            
            if (isAuthenticated) {
                showMessage('Login successful! Redirecting...', 'success');
                
                // Store session if "Remember me" is checked
                if (remember) {
                    localStorage.setItem('rememberedUser', username);
                }
                
                // Store authentication token (in real app, this would be a JWT or session token)
                sessionStorage.setItem('authToken', generateToken());
                sessionStorage.setItem('user', username);
                
                // Redirect to dashboard after delay
                setTimeout(() => {
                    window.location.href = 'dashboard.html';
                }, 1500);
            } else {
                showMessage('Invalid username or password', 'error');
            }
        } catch (error) {
            showMessage('Authentication error. Please try again.', 'error');
            console.error('Login error:', error);
        } finally {
            // Reset button state
            loginBtn.innerHTML = originalText;
            loginBtn.disabled = false;
        }
    });

    // Simulated authentication function - Replace with real API call
    async function authenticateUser(username, password) {
        // Simulate API delay
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        // In a real application, this would be an API call to your backend
        // For demo purposes, using hardcoded credentials
        const validUsers = {
            'librarian': 'SecurePass123!',
            'admin': 'Admin@Library2024'
        };

        return validUsers[username] === password;
    }

    // Generate a simple token (in real app, this would come from your backend)
    function generateToken() {
        return 'token_' + Math.random().toString(36).substr(2) + Date.now().toString(36);
    }

    // Display message to user
    function showMessage(message, type) {
        messageArea.textContent = message;
        messageArea.className = 'messages ' + type;
        messageArea.style.display = 'block';
        
        // Auto-hide success messages
        if (type === 'success') {
            setTimeout(clearMessage, 3000);
        }
    }

    // Clear message display
    function clearMessage() {
        messageArea.style.display = 'none';
        messageArea.textContent = '';
        messageArea.className = 'messages';
    }

    // Help link handler
    helpLink.addEventListener('click', function(e) {
        e.preventDefault();
        showMessage('Please email admin@library-system.com for assistance', 'success');
    });

    // Check for remembered user
    const rememberedUser = localStorage.getItem('rememberedUser');
    if (rememberedUser) {
        document.getElementById('username').value = rememberedUser;
        document.getElementById('remember').checked = true;
    }

    // Security: Clear token on page load if coming from logout
    if (window.location.search.includes('logout=true')) {
        sessionStorage.removeItem('authToken');
        sessionStorage.removeItem('user');
        showMessage('You have been logged out successfully', 'success');
    }
});
