<?php
session_start([
    'use_strict_mode' => 1,
    'cookie_httponly' => 1,
    'cookie_secure' => 0, // Set to 1 if using HTTPS
    'use_only_cookies' => 1,
    'sid_length' => 128,
]);

include "CRUD/db.php"; // Database connection

$error = "";
$showSetupModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hrs_account = trim($_POST["hrs_account"]);
    $hrs_password = trim($_POST["hrs_password"]);

    $stmt = $conn->prepare("SELECT employee_no, hrs_account, hrs_password FROM employees WHERE hrs_account = ?");
    $stmt->bind_param("s", $hrs_account);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($employee_no, $db_account, $db_password);
        $stmt->fetch();

        if (empty($db_password)) {
            // First login setup
            $_SESSION["employee_no"] = $employee_no;
            $_SESSION["hrs_account"] = $db_account;
            $_SESSION["first_login"] = true;
            $_SESSION["last_activity"] = time(); // Track user activity
            session_regenerate_id(true); // Prevent session fixation
            $showSetupModal = true;
        } elseif (password_verify($hrs_password, $db_password)) {
            // Successful login
            $_SESSION["employee_no"] = $employee_no;
            $_SESSION["hrs_account"] = $db_account;
            $_SESSION["first_login"] = false;
            $_SESSION["last_activity"] = time();
            session_regenerate_id(true);
            header("Location: employee_dashboard.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Account does not exist!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H.R. System - Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff6b00;
            --primary-dark: #e65100;
            --primary-light: #ff8f00;
            --secondary-color: #e53935;
            --secondary-dark: #c62828;
            --secondary-light: #ff5252;
            --accent-color: #ffab40;
            --text-color: #333;
            --light-text: #777;
            --bg-light: rgba(255, 255, 255, 0.8);
            --bg-dark: rgba(0, 0, 0, 0.4);
            --border-radius: 12px;
            --box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 20px;
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('img/AEHR_bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            background-attachment: fixed;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--bg-dark), rgba(0, 0, 0, 0.6));
            z-index: 1;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
            text-align: center;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
            transform: scale(1);
        }

        .container:active {
            transform: scale(1.02);
        }

        .logo {
            margin-bottom: 25px;
            position: relative;
        }

        .logo img {
            width: 100%;
            max-width: 280px;
            filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.2));
            transition: var(--transition);
        }

        .logo:hover img {
            transform: scale(1.05);
        }

        .login-box h2 {
            color: var(--text-color);
            font-weight: 600;
            margin-bottom: 30px;
            font-size: 28px;
            position: relative;
            display: inline-block;
        }

        .login-box h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 3px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .tab-btn {
            padding: 12px 25px;
            border: none;
            background: rgba(238, 238, 238, 0.8);
            color: var(--text-color);
            cursor: pointer;
            border-radius: 25px;
            font-size: 15px;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            transform: translateZ(0);
        }

        .tab-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary-light));
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .tab-btn.active {
            color: white;
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.4);
            transform: translateY(-2px) scale(1.05);
        }

        .tab-btn.active::before {
            opacity: 1;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary-light));
        }

        .tab-btn:hover:not(.active) {
            background: rgba(221, 221, 221, 0.9);
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .form-container.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .input-group {
            text-align: left;
            margin-bottom: 25px;
            position: relative;
        }

        .input-group label {
            font-size: 15px;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: var(--text-color);
            padding-left: 5px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 57px;
            color: var(--light-text);
            font-size: 16px;
            transform: translateY(-50%);
            transition: var(--transition);
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: var(--transition);
            background-color: rgba(249, 249, 249, 0.8);
            line-height: 1.5;
            color: var(--text-color);
        }

        .input-group input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.2);
            background-color: white;
        }

        .input-group input:focus + i {
            color: var(--primary-color);
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary-light));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            transform: translateZ(0);
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .btn:hover {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px) scale(1.02);
        }

        .btn:hover::after {
            left: 100%;
        }

        .btn:active {
            transform: translateY(1px) scale(0.98);
        }

        .btn i {
            margin-right: 8px;
        }

        .forgot-password {
            text-align: right;
            margin-top: -15px;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: var(--light-text);
            font-size: 13px;
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-password a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        .modal {
            display: none; 
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 450px;
            text-align: center;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: slideDown 0.4s ease;
            transform-style: preserve-3d;
        }

        @keyframes slideDown {
            from { transform: translateY(-50px) translateZ(20px); opacity: 0; }
            to { transform: translateY(0) translateZ(0); opacity: 1; }
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
            color: #777;
            transition: var(--transition);
        }

        .close-btn:hover {
            color: var(--secondary-color);
            transform: rotate(90deg);
        }

        #setupModal {
            z-index: 1001;
        }

        /* Enhanced Error/Success Messages */
        .notification {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease-out;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .notification i {
            margin-right: 12px;
            font-size: 18px;
        }

        .error-notification {
            background-color: #ffebee;
            color: var(--secondary-color);
            border-left: 4px solid var(--secondary-color);
        }

        .warning-notification {
            background-color: #fff8e1;
            color: #ff8f00;
            border-left: 4px solid #ff8f00;
        }

        .success-notification {
            background-color: #e8f5e9;
            color: #388e3c;
            border-left: 4px solid #388e3c;
        }

        .info-notification {
            background-color: #e3f2fd;
            color: #1976d2;
            border-left: 4px solid #1976d2;
        }

        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced Modal Styling */
        .modal-content h2 {
            margin-bottom: 25px;
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 24px;
        }

        .modal-content h2 i {
            font-size: 26px;
            color: var(--primary-color);
        }

        .modal-content p {
            margin-bottom: 25px;
            line-height: 1.6;
            color: #555;
            font-size: 15px;
        }

        /* Input error state */
        .input-error {
            border-color: var(--secondary-color) !important;
            background-color: #fff5f5 !important;
        }

        .input-error:focus {
            box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.2) !important;
        }

        .error-text {
            color: var(--secondary-color);
            font-size: 13px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Footer */
        .footer {
            margin-top: 25px;
            font-size: 12px;
            color: var(--light-text);
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                max-width: 95%;
                transform: none !important;
            }
            
            .container:active {
                transform: none !important;
            }
            
            .login-box h2 {
                font-size: 24px;
            }
            
            .tabs {
                gap: 10px;
            }
            
            .tab-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="img/ATSPH_Logo.png" alt="ATS Logo">
        </div>
        <div class="login-box">
            <h2>Human Resource System Login</h2>
            <div class="tabs">
                <button id="employeeTab" class="tab-btn active" onclick="showLogin('employee')">
                    <i class="fas fa-user-tie"></i> Employee
                </button>
                <button id="adminTab" class="tab-btn" onclick="showLogin('admin')">
                    <i class="fas fa-user-shield"></i> Admin
                </button>
            </div>

            <!-- Employee Login Form -->
            <div id="employeeLogin" class="form-container active">
                <form id="employeeForm" onsubmit="loginEmployee(); return false;">
                    <div class="input-group">
                        <label for="empUsername">Employee No./Account</label>
                        <i class="fas fa-user"></i>
                        <input type="text" id="empUsername" name="empUsername" required onkeydown="handleKeyPress(event, 'empPassword')" placeholder="Enter your employee account">
                    </div>
                    <div class="input-group">
                        <label for="empPassword">Password</label>
                        <i class="fas fa-lock"></i>
                        <input type="password" id="empPassword" name="empPassword" onkeydown="handleKeyPress(event, 'employeeLoginBtn', true)" placeholder="Enter your password">
                    </div>
                    
                    <div class="forgot-password">
                        <a href="#" onclick="showModal('Please contact the HR department to reset your password.', 'info')">Forgot Password?</a>
                    </div>
                
                    <button type="submit" id="employeeLoginBtn" class="btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>

            <!-- Admin Login Form -->
            <div id="adminLogin" class="form-container">
                <form id="adminForm" onsubmit="loginAdmin(); return false;">
                    <div class="input-group">
                        <label for="adminUsername">Admin Account</label>
                        <i class="fas fa-user-shield"></i>
                        <input type="text" id="adminUsername" name="adminUsername" required onkeydown="handleKeyPress(event, 'adminPassword')" placeholder="Enter admin username">
                    </div>
                    <div class="input-group">
                        <label for="adminPassword">Password</label>
                        <i class="fas fa-key"></i>
                        <input type="password" id="adminPassword" name="adminPassword" required onkeydown="handleKeyPress(event, 'adminLoginBtn', true)" placeholder="Enter admin password">
                    </div>
                    
                    <div class="forgot-password">
                        <a href="#" onclick="showModal('Please contact system administrator for password reset.', 'info')">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" id="adminLoginBtn" class="btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>
            
            <div class="footer">
                <p>Need help? <a href="#" onclick="showModal('Please contact the HR department for assistance.', 'info')">Contact Support</a></p>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="modal" class="modal" onclick="closeOutside(event, 'modal')">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal()">×</button>
            <div id="modalMessage" class="notification error-notification">
                <i class="fas fa-exclamation-circle"></i>
                <span>Error message will appear here</span>
            </div>
        </div>
    </div>

    <!-- Setup Account Modal -->
    <div id="setupModal" class="modal" onclick="closeOutside(event, 'setupModal')">
        <div class="modal-content">
            <button class="close-btn" onclick="closeSetupModal()">×</button>
            <h2><i class="fas fa-user-cog"></i> Set Up Your Account</h2>
            <p>Please update your account details before proceeding. This will be your login credentials for future access.</p>
            
            <div class="input-group">
                <label for="newUsername">New Username</label>
                <i class="fas fa-user-edit"></i>
                <input type="text" id="newUsername" onkeydown="handleKeyPress(event, 'newPassword')" placeholder="Choose a username">
                <div id="usernameError" class="error-text" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span></span>
                </div>
            </div>

            <div class="input-group">
                <label for="newPassword">New Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="newPassword" onkeydown="handleKeyPress(event, 'confirmPassword')" placeholder="Create a password (min 6 chars)">
                <div id="passwordError" class="error-text" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span></span>
                </div>
            </div>
            
            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="confirmPassword" onkeydown="handleKeyPress(event, 'setupAccountBtn', true)" placeholder="Re-enter your password">
                <div id="confirmError" class="error-text" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span></span>
                </div>
            </div>
            
            <button type="button" id="setupAccountBtn" class="btn" onclick="setupAccount()">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </div>

<!-- Success Modal -->
<div id="setupSuccessModal" class="modal">
    <div class="modal-content">
        <h2><i class="fas fa-check-circle" style="color: green;"></i> Success!</h2>
        <p>Your account has been set up successfully.</p>
        <p>Redirecting to your dashboard...</p>
    </div>
</div>

    <script>
        // Switch between Employee & Admin login
        function showLogin(type) {
            document.querySelectorAll('.form-container').forEach(form => form.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(tab => tab.classList.remove('active'));

            document.getElementById(`${type}Login`).classList.add('active');
            document.getElementById(`${type}Tab`).classList.add('active');
            
            // Focus on the first input field
            setTimeout(() => {
                document.getElementById(`${type === 'employee' ? 'empUsername' : 'adminUsername'}`).focus();
            }, 100);
        }

        function handleKeyPress(event, nextFieldId, isLastField = false) {
            if (event.key === "Enter") {
                event.preventDefault();
                if (isLastField) {
                    // If it's the last field, trigger the login button click
                    document.getElementById(nextFieldId).click();
                } else {
                    // Otherwise, move to the next field
                    let nextField = document.getElementById(nextFieldId);
                    if (nextField) {
                        nextField.focus();
                    }
                }
            }
        }

        function loginEmployee() {
            let username = document.getElementById('empUsername').value.trim();
            let password = document.getElementById('empPassword').value.trim();

            // Reset error states
            document.getElementById('empUsername').classList.remove('input-error');
            document.getElementById('empPassword').classList.remove('input-error');

            if (!username) {
                showModal("Please enter your account.", 'warning');
                document.getElementById('empUsername').classList.add('input-error');
                document.getElementById('empUsername').focus();
                return;
            }

            let formData = new FormData();
            formData.append("empUsername", username);
            formData.append("empPassword", password);

            // Show loading state
            const btn = document.getElementById('employeeLoginBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Authenticating...';
            btn.disabled = true;

            fetch("CRUD/employee_login.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "setup") {
                    sessionStorage.setItem("employee_no", data.employee_no);
                    document.getElementById('setupModal').style.display = 'flex';
                    document.getElementById('newUsername').value = username;
                    document.getElementById('newUsername').focus();
                } else if (data.status === "success") {
                    showModal("Login successful! Redirecting...", 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    showModal(data.message);
                    // Highlight the problematic field
                    if (data.message.includes("password")) {
                        document.getElementById('empPassword').classList.add('input-error');
                        document.getElementById('empPassword').focus();
                    } else if (data.message.includes("account")) {
                        document.getElementById('empUsername').classList.add('input-error');
                        document.getElementById('empUsername').focus();
                    }
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                showModal("An error occurred during login. Please try again.");
            })
            .finally(() => {
                btn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Login';
                btn.disabled = false;
            });
        }

        function setupAccount() {
    let employeeNo = sessionStorage.getItem("employee_no");
    let newUsername = document.getElementById('newUsername').value.trim();
    let newPassword = document.getElementById('newPassword').value.trim();
    let confirmPassword = document.getElementById('confirmPassword').value.trim();

    // Reset error states
    document.getElementById('newUsername').classList.remove('input-error');
    document.getElementById('newPassword').classList.remove('input-error');
    document.getElementById('confirmPassword').classList.remove('input-error');
    document.getElementById('usernameError').style.display = 'none';
    document.getElementById('passwordError').style.display = 'none';
    document.getElementById('confirmError').style.display = 'none';

    let isValid = true;

    if (!newUsername) {
        document.getElementById('newUsername').classList.add('input-error');
        document.getElementById('usernameError').style.display = 'flex';
        document.getElementById('usernameError').querySelector('span').textContent = 'Username is required';
        isValid = false;
    }

    if (!newPassword) {
        document.getElementById('newPassword').classList.add('input-error');
        document.getElementById('passwordError').style.display = 'flex';
        document.getElementById('passwordError').querySelector('span').textContent = 'Password is required';
        isValid = false;
    } else if (newPassword.length < 6) {
        document.getElementById('newPassword').classList.add('input-error');
        document.getElementById('passwordError').style.display = 'flex';
        document.getElementById('passwordError').querySelector('span').textContent = 'Password must be at least 6 characters';
        isValid = false;
    }

    if (!confirmPassword) {
        document.getElementById('confirmPassword').classList.add('input-error');
        document.getElementById('confirmError').style.display = 'flex';
        document.getElementById('confirmError').querySelector('span').textContent = 'Please confirm your password';
        isValid = false;
    } else if (newPassword !== confirmPassword) {
        document.getElementById('confirmPassword').classList.add('input-error');
        document.getElementById('confirmError').style.display = 'flex';
        document.getElementById('confirmError').querySelector('span').textContent = 'Passwords do not match';
        isValid = false;
    }

    if (!isValid) return;

    let formData = new FormData();
    formData.append("employee_no", employeeNo);
    formData.append("newUsername", newUsername);
    formData.append("newPassword", newPassword);

    // Show loading state
    const btn = document.getElementById('setupAccountBtn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    btn.disabled = true;

    fetch("CRUD/setup_account.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            // Close the setup modal (Assuming setup modal has id 'setupModal')
            let setupModal = document.getElementById('setupModal');
            if (setupModal) {
                setupModal.style.display = 'none'; // Hide modal
            }

            // Show success modal
            showModal("Account setup successful! Redirecting to dashboard...", 'success');

            // Delay the redirection to allow users to see the success modal
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 2000);
        } else {
            showModal(data.message || "Failed to set up account.");
            btn.disabled = false; // Re-enable button in case of failure
        }
    })
    .catch(error => {
        console.error('Fetch Error:', error);
        showModal("An error occurred during account setup. Please try again.");
        btn.disabled = false;
    })
    .finally(() => {
        btn.innerHTML = '<i class="fas fa-save"></i> Save Changes';
    });
}



        function loginAdmin() {
            let username = document.getElementById('adminUsername').value.trim();
            let password = document.getElementById('adminPassword').value.trim();

            // Reset error states
            document.getElementById('adminUsername').classList.remove('input-error');
            document.getElementById('adminPassword').classList.remove('input-error');

            if (!username || !password) {
                showModal("Please fill in all fields.", 'warning');
                if (!username) {
                    document.getElementById('adminUsername').classList.add('input-error');
                    document.getElementById('adminUsername').focus();
                } else {
                    document.getElementById('adminPassword').classList.add('input-error');
                    document.getElementById('adminPassword').focus();
                }
                return;
            }

            // Show loading state
            const btn = document.getElementById('adminLoginBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Authenticating...';
            btn.disabled = true;

            let formData = new FormData();
            formData.append("adminUsername", username);
            formData.append("adminPassword", password);

            fetch("CRUD/admin_login.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    showModal("Login successful! Redirecting...", 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    showModal(data.message);
                    if (data.message.includes("password")) {
                        document.getElementById('adminPassword').classList.add('input-error');
                        document.getElementById('adminPassword').focus();
                    } else if (data.message.includes("account")) {
                        document.getElementById('adminUsername').classList.add('input-error');
                        document.getElementById('adminUsername').focus();
                    }
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                showModal("An error occurred during login. Please try again.");
            })
            .finally(() => {
                btn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Login';
                btn.disabled = false;
            });
        }

        // Modal functions
        function showModal(message, type = 'error') {
            const modal = document.getElementById('modal');
            const modalMessage = document.getElementById('modalMessage');
            
            // Reset classes
            modalMessage.className = 'notification';
            
            // Set appropriate styling based on type
            switch(type) {
                case 'error':
                    modalMessage.classList.add('error-notification');
                    modalMessage.innerHTML = `<i class="fas fa-exclamation-circle"></i><span>${message}</span>`;
                    break;
                case 'warning':
                    modalMessage.classList.add('warning-notification');
                    modalMessage.innerHTML = `<i class="fas fa-exclamation-triangle"></i><span>${message}</span>`;
                    break;
                case 'success':
                    modalMessage.classList.add('success-notification');
                    modalMessage.innerHTML = `<i class="fas fa-check-circle"></i><span>${message}</span>`;
                    break;
                case 'info':
                    modalMessage.classList.add('info-notification');
                    modalMessage.innerHTML = `<i class="fas fa-info-circle"></i><span>${message}</span>`;
                    break;
            }
            
            modal.style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function closeSetupModal() {
            document.getElementById('setupModal').style.display = 'none';
        }

        function closeOutside(event, modalId) {
            if (event.target.id === modalId) {
                document.getElementById(modalId).style.display = 'none';
            }
        }

        // Check if there's a PHP error to show
        <?php if (!empty($error)): ?>
            document.addEventListener('DOMContentLoaded', function() {
                showModal("<?php echo $error; ?>");
            });
        <?php endif; ?>

        // Check if we need to show setup modal
        <?php if ($showSetupModal): ?>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('setupModal').style.display = 'flex';
                document.getElementById('newUsername').focus();
            });
        <?php endif; ?>

        // Prevent logout when navigating or refreshing
        sessionStorage.setItem("activeSession", "true");

        // Log out only when all tabs are closed
        window.addEventListener("unload", function() {
            sessionStorage.removeItem("activeSession");
            setTimeout(() => {
                if (!sessionStorage.getItem("activeSession")) {
                    fetch("logout.php", { method: "POST", keepalive: true });
                }
            }, 500);
        });
        
        // Focus on first input field on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('empUsername').focus();
        });
    </script>
</body>
</html>