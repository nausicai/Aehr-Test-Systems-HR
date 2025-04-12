<?php
include "session/employee.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - ATS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('img/AEHR_bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.3) 100%);
            z-index: 1;
        }

        .dashboard-container {
            width: 100%;
            max-width: 530px;
            background: rgba(255, 255, 255, 0.85); /* Changed transparency */
            padding: 35px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border-radius: 16px;
            text-align: center;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Removed backdrop-filter */
        }

        .dashboard-container:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        .logo {
            position: relative;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100%;
            max-width: 330px;
            transition: transform 0.3s ease;
        }

        .logo:hover img {
            transform: scale(1.05);
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #f57c00, transparent);
            border-radius: 50%;
            filter: blur(1px);
        }

        .welcome-message {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        .welcome-message span {
            color: #f57c00;
            position: relative;
        }

        .welcome-message span::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #f57c00, #d32f2f);
            border-radius: 2px;
        }

        .options-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Updated Button Styles */
        .option-btn {
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            color: white;
            font-family: inherit;
            padding: 0.35em;
            padding-left: 1.2em;
            font-size: 17px;
            font-weight: 500;
            border-radius: 0.9em;
            border: none;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(245, 124, 0, 0.3);
            overflow: hidden;
            position: relative;
            height: 2.8em;
            padding-right: 3.3em;
            cursor: pointer;
            width: 100%;
            justify-content: flex-start;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .option-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #d32f2f, #f57c00);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .option-btn:hover::before {
            opacity: 1;
        }

        .option-btn .icon {
            background: white;
            margin-left: 1em;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 2.2em;
            width: 2.2em;
            border-radius: 0.7em;
            box-shadow: 0 3px 10px rgba(211, 47, 47, 0.3);
            right: 0.3em;
            transition: all 0.3s;
        }

        .option-btn:hover .icon {
            width: calc(100% - 0.6em);
        }

        .option-btn .icon i {
            font-size: 1.1em;
            transition: transform 0.3s;
            color: #d32f2f;
        }

        .option-btn:hover .icon i {
            transform: translateX(0.1em);
        }

        .option-btn:active .icon {
            transform: scale(0.95);
        }

        .option-btn:hover {
            box-shadow: 0 6px 20px rgba(245, 124, 0, 0.4);
        }

        /* Action Buttons (Logout and Edit Account) */
        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .action-btn {
            background: linear-gradient(135deg, #333, #555);
            color: white;
            font-family: inherit;
            padding: 0.35em;
            padding-left: 1.2em;
            font-size: 17px;
            font-weight: 500;
            border-radius: 0.9em;
            border: none;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            height: 2.8em;
            padding-right: 3.3em;
            cursor: pointer;
            width: 100%;
            justify-content: flex-start;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #555, #333);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .action-btn:hover::before {
            opacity: 1;
        }

        .action-btn .icon {
            background: white;
            margin-left: 1em;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 2.2em;
            width: 2.2em;
            border-radius: 0.7em;
            box-shadow: 0 3px 10px rgba(85, 85, 85, 0.3);
            right: 0.3em;
            transition: all 0.3s;
        }

        .action-btn:hover .icon {
            width: calc(100% - 0.6em);
        }

        .action-btn .icon i {
            font-size: 1.1em;
            transition: transform 0.3s;
            color: #555;
        }

        .action-btn:hover .icon i {
            transform: translateX(0.1em);
        }

        .action-btn:active .icon {
            transform: scale(0.95);
        }

        .action-btn:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        /* User Profile Badge */
        .profile-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            z-index: 3;
        }

        .profile-badge:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Date and Time Display */
        .datetime-display {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 3;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 420px;
            width: 90%;
            position: relative;
            overflow: hidden;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #f57c00, #d32f2f);
        }

        .modal-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            margin-bottom: 20px;
            position: relative;
        }

        .modal-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(245, 124, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .modal-logo:hover {
            transform: rotate(15deg) scale(1.1);
        }

        .modal-logo i {
            font-size: 36px;
            color: white;
        }

        .modal-content h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        .modal-content h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, #f57c00, #d32f2f);
            border-radius: 3px;
        }

        .modal-content p {
            font-size: 16px;
            margin-bottom: 25px;
            color: #555;
            line-height: 1.5;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        .modal-buttons button {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .modal-buttons button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .modal-buttons button:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .modal-buttons button.confirm {
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 124, 0, 0.3);
        }

        .modal-buttons button.confirm:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(245, 124, 0, 0.4);
        }

        .modal-buttons button.confirm:active {
            transform: translateY(0);
        }

        .modal-buttons button.cancel {
            background: #f1f1f1;
            color: #555;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .modal-buttons button.cancel:hover {
            background: #e0e0e0;
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-buttons button.cancel:active {
            transform: translateY(0);
        }

        .input-field {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            background: rgba(255, 255, 255, 0.8);
        }

        .input-field:focus {
            border-color: #f57c00;
            outline: none;
            box-shadow: 0 0 0 3px rgba(245, 124, 0, 0.2);
            background: white;
        }

        .error-message {
            color: #d32f2f;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none;
            text-align: left;
            padding-left: 5px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }

        /* Success Popup */
        .success-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .success-popup-content {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
            animation: fadeIn 0.3s ease;
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #4caf50, #45a049);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
            transition: transform 0.3s ease;
        }

        .success-icon:hover {
            transform: rotate(15deg) scale(1.1);
        }

        .success-icon i {
            font-size: 36px;
            color: white;
        }

        .success-popup-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .success-popup-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 25px;
        }

        .success-popup-content button {
            padding: 12px 25px;
            background: linear-gradient(135deg, #4caf50, #45a049);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }

        .success-popup-content button:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(76, 175, 80, 0.4);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .dashboard-container {
                padding: 25px;
                margin-top: 50px;
            }
            .welcome-message {
                font-size: 20px;
            }
            .option-btn, .action-btn {
                font-size: 16px;
            }
            .modal-content {
                padding: 20px;
            }
            .modal-content h2 {
                font-size: 20px;
            }
            .modal-content p {
                font-size: 14px;
            }
            .modal-buttons, .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            .modal-buttons button {
                width: 100%;
            }
            .modal-logo, .success-icon {
                width: 60px;
                height: 60px;
            }
            .modal-logo i, .success-icon i {
                font-size: 28px;
            }
            
            .datetime-display {
                top: 10px;
                left: 10px;
                font-size: 12px;
                padding: 5px 10px;
            }
            
            .profile-badge {
                top: 10px;
                right: 10px;
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Date and Time Display -->
    <div class="datetime-display" id="datetime"></div>
    
    <!-- Profile Badge -->
    <div class="profile-badge" id="profileBadge">
        <?php echo strtoupper(substr($employee_name, 0, 1)); ?>
    </div>
    
    <div class="dashboard-container">
        <div class="logo">
            <img src="img/ATSPH_Logo.png" alt="ATS Logo">
        </div>
        <div class="welcome-message">
            Welcome, <span id="username"><?php echo htmlspecialchars($employee_name); ?></span>
        </div>
        <div class="options-container">
            <button class="option-btn" onclick="window.location.href='employee_DTR.php'">
                DTR Submission
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </button>
            <button class="option-btn" onclick="window.location.href='leave_monitoring_employee.php'">
                Leave Monitoring
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </button>
            <button class="option-btn" onclick="window.location.href='bills_submission_employee.php'">
                Bills Submission
                <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
            </button>
            
            <!-- Action Buttons (Logout and Edit Account) -->
            <div class="action-buttons">
                <button class="action-btn" id="logoutButton">
                    Logout
                    <div class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                </button>
                
                <button class="action-btn" id="editProfileButton">
                    Edit Account
                    <div class="icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-logo">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                <h2>Logout Confirmation</h2>
                <p>Are you sure you want to log out of your account?</p>
            </div>
            <div class="modal-buttons">
                <button class="confirm" onclick="confirmLogout()">
                    <i class="fas fa-check"></i> Yes, Logout
                </button>
                <button class="cancel" onclick="closeModal()">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Edit Account Modal -->
    <div class="modal" id="editProfileModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-logo">
                    <i class="fas fa-user-edit"></i>
                </div>
                <h2>Update Your Account</h2>
                <p>Please enter your new account details below</p>
            </div>
            <div class="form-group">
                <label for="newUsername">New Username</label>
                <input type="text" id="newUsername" class="input-field" placeholder="Enter new username">
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" class="input-field" placeholder="Enter new password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" class="input-field" placeholder="Confirm new password">
                <div class="error-message" id="passwordError">Passwords do not match</div>
            </div>
            <div class="modal-buttons">
                <button class="confirm" onclick="changeProfile()">
                    <i class="fas fa-save"></i> Save Changes
                </button>
                <button class="cancel" onclick="closeEditModal()">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div class="modal" id="notificationModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-logo" id="notificationIcon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2 id="notificationTitle">Success</h2>
                <p id="notificationMessage">Your changes have been saved successfully.</p>
            </div>
            <div class="modal-buttons">
                <button class="confirm" onclick="closeNotificationModal()">
                    <i class="fas fa-check"></i> OK
                </button>
            </div>
        </div>
    </div>

    <script>
        // Update date and time display
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById('datetime').textContent = now.toLocaleDateString('en-US', options);
        }
        
        function fetchUserDetails() {
            fetch('CRUD/get_employee.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('username').textContent = data.name;
                    } else {
                        console.error("Error:", data.error);
                    }
                })
                .catch(error => console.error('Error fetching user data:', error));
        }

        function changeProfile() {
            const username = document.getElementById("newUsername").value.trim();
            const password = document.getElementById("newPassword").value.trim();
            const confirmPassword = document.getElementById("confirmPassword").value.trim();
            const passwordError = document.getElementById("passwordError");
            const notificationMessage = document.getElementById("notificationMessage");
            const notificationTitle = document.getElementById("notificationTitle");
            const notificationIcon = document.getElementById("notificationIcon");

            passwordError.style.display = "none";

            // Validation
            if (!username || !password || !confirmPassword) {
                passwordError.textContent = "All fields are required.";
                passwordError.style.display = "block";
                document.getElementById("editProfileModal").style.animation = "shake 0.5s";
                setTimeout(() => {
                    document.getElementById("editProfileModal").style.animation = "";
                }, 500);
                return;
            }

            if (password.length < 6) {
                passwordError.textContent = "Password must be at least 6 characters long.";
                passwordError.style.display = "block";
                document.getElementById("editProfileModal").style.animation = "shake 0.5s";
                setTimeout(() => {
                    document.getElementById("editProfileModal").style.animation = "";
                }, 500);
                return;
            }

            if (password !== confirmPassword) {
                passwordError.textContent = "Passwords do not match.";
                passwordError.style.display = "block";
                document.getElementById("editProfileModal").style.animation = "shake 0.5s";
                setTimeout(() => {
                    document.getElementById("editProfileModal").style.animation = "";
                }, 500);
                return;
            }

            fetch("CRUD/update_profile.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ username, password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    notificationTitle.textContent = "Success";
                    notificationMessage.textContent = data.message;
                    notificationIcon.innerHTML = '<i class="fas fa-check-circle"></i>';
                    notificationIcon.style.background = "linear-gradient(135deg, #4caf50, #45a049)";
                    document.getElementById("notificationModal").style.display = "flex";
                    document.getElementById("username").textContent = username;
                    closeEditModal();
                } else {
                    notificationTitle.textContent = "Error";
                    notificationMessage.textContent = data.message;
                    notificationIcon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
                    notificationIcon.style.background = "linear-gradient(135deg, #d32f2f, #b71c1c)";
                    document.getElementById("notificationModal").style.display = "flex";
                }
            })
            .catch(() => {
                notificationTitle.textContent = "Error";
                notificationMessage.textContent = "An error occurred while processing your request.";
                notificationIcon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
                notificationIcon.style.background = "linear-gradient(135deg, #d32f2f, #b71c1c)";
                document.getElementById("notificationModal").style.display = "flex";
            });
        }

        function closeEditModal() {
            document.getElementById("editProfileModal").style.display = "none";
            // Clear fields when closing
            document.getElementById("newUsername").value = "";
            document.getElementById("newPassword").value = "";
            document.getElementById("confirmPassword").value = "";
            document.getElementById("passwordError").style.display = "none";
        }

        function closeNotificationModal() {
            document.getElementById("notificationModal").style.display = "none";
        }

        function confirmLogout() {
            window.location.href = 'logout_emp.php';
        }

        document.addEventListener("DOMContentLoaded", function() {
            fetchUserDetails();
            updateDateTime();
            setInterval(updateDateTime, 1000);
            
            // Profile badge click shows edit modal
            document.getElementById('profileBadge').addEventListener('click', function() {
                document.getElementById('editProfileModal').style.display = 'flex';
                setTimeout(() => {
                    document.getElementById("newUsername").focus();
                }, 300);
            });
        });

        document.getElementById('logoutButton').addEventListener('click', () => {
            document.getElementById('logoutModal').style.display = 'flex';
        });

        document.getElementById('editProfileButton').addEventListener('click', () => {
            document.getElementById('editProfileModal').style.display = 'flex';
            // Focus on first field when opening
            setTimeout(() => {
                document.getElementById("newUsername").focus();
            }, 300);
        });

        function closeModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.addEventListener('click', (event) => {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

        // Prevent logout when navigating or refreshing
        sessionStorage.setItem("activeSession", "true");

        // Log out only when all tabs are closed
        window.addEventListener("unload", function() {
            sessionStorage.removeItem("activeSession");
            setTimeout(() => {
                if (!sessionStorage.getItem("activeSession")) {
                    fetch("logout_emp.php", { method: "POST", keepalive: true });
                }
            }, 500);
        });
    </script>
</body>
</html>