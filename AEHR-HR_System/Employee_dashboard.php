<?php
session_start();
include "CRUD/db.php"; // Database connection

if (!isset($_SESSION["employee_no"])) { // Use the correct session variable
    header("Location: index.php");
    exit();
}

$employee_no = $_SESSION["employee_no"]; // Ensure it matches the update query

$sql = "SELECT name FROM employees WHERE employee_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$stmt->bind_result($employee_name);
$stmt->fetch();
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - ATS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            background: linear-gradient(135deg, #ff6b6b, #f57c00);
            padding: 20px;
        }

        .dashboard-container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-container:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        .logo img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .welcome-message span {
            color: #f57c00;
        }

        .options-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .option-btn {
            padding: 15px;
            background: #f57c00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .option-btn:hover {
            background: #d32f2f;
            transform: translateY(-5px);
        }

        .option-btn i {
            font-size: 20px;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #d32f2f, #f57c00);
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .edit-profile-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .edit-profile-btn:hover {
            background: linear-gradient(135deg, #d32f2f, #f57c00);
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
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
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
            animation: fadeIn 0.3s ease;
        }

        .modal-content h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .modal-content p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .modal-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .modal-buttons button.confirm {
            background: #f57c00;
            color: white;
        }

        .modal-buttons button.confirm:hover {
            background: #d32f2f;
            transform: translateY(-5px);
        }

        .modal-buttons button.cancel {
            background: #e0e0e0;
            color: #333;
        }

        .modal-buttons button.cancel:hover {
            background: #bdbdbd;
            transform: translateY(-5px);
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .error-message {
            color: #d32f2f;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
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

        @media (max-width: 480px) {
            .dashboard-container {
                padding: 25px;
            }
            .welcome-message {
                font-size: 20px;
            }
            .option-btn {
                font-size: 16px;
                padding: 12px;
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
            .modal-buttons button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
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
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
            animation: fadeIn 0.3s ease;
        }

        .success-popup-content i {
            font-size: 48px;
            color: #4caf50;
            margin-bottom: 20px;
            animation: bounce 1s ease;
        }

        .success-popup-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .success-popup-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .success-popup-content button {
            padding: 10px 20px;
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .success-popup-content button:hover {
            background: #45a049;
            transform: translateY(-3px);
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
    </style>
</head>

<body>
    <div class="dashboard-container">
        <div class="logo">
            <img src="img/ATS_Logo.png" alt="ATS Logo">
        </div>
        <div class="welcome-message">
            Welcome, <span id="username"><?php echo htmlspecialchars($employee_name); ?></span>
        </div>
        <div class="options-container">
            <button class="option-btn" onclick="window.location.href='employee_DTR.php'">
                <i class="fas fa-calendar-check"></i> DTR Submission
            </button>
            <button class="option-btn" onclick="window.location.href='leave_monitoring_employee.php'">
                <i class="fas fa-clipboard-list"></i> Leave Monitoring
            </button>
            <button class="option-btn" onclick="window.location.href='bills_submission_employee.php'">
                <i class="fas fa-file-invoice-dollar"></i> Bills Submission
            </button>
        </div>
    </div>

    <!-- Back Button -->
    <button class="back-btn" id="backButton">
        <i class="fas fa-arrow-left"></i> Logout
    </button>

    <!-- Edit Profile Button -->
    <button class="edit-profile-btn" id="editProfileButton">
        <i class="fas fa-user-edit"></i> Edit Account
    </button>

    <!-- Logout Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content">
            <h2>Logout Confirmation</h2>
            <p>Are you sure you want to log out?</p>
            <div class="modal-buttons">
                <button class="confirm" onclick="confirmLogout()">Yes, Logout</button>
                <button class="cancel" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Edit Account Modal -->
    <div class="modal" id="editProfileModal">
        <div class="modal-content">
            <h2>Edit Account</h2>
            <input type="text" id="newUsername" class="input-field" placeholder="New Account">
            <input type="password" id="newPassword" class="input-field" placeholder="New Password">
            <input type="password" id="confirmPassword" class="input-field" placeholder="Confirm Password">
            <div class="error-message" id="passwordError">Passwords do not match</div>
            <div class="modal-buttons">
                <button class="confirm" onclick="changeProfile()">Change</button>
                <button class="cancel" onclick="closeEditModal()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div class="modal" id="notificationModal">
        <div class="modal-content">
            <p id="notificationMessage"></p>
            <div class="modal-buttons">
            <button class="confirm" onclick="closeNotificationModal()">OK</button>
            </div>
        </div>
    </div>

    <script>
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

            passwordError.style.display = "none";

            // Validation
            if (!username || !password || !confirmPassword) {
                passwordError.textContent = "All fields are required.";
                passwordError.style.display = "block";
                return;
            }

            if (password.length < 6) {
                passwordError.textContent = "Password must be at least 6 characters long.";
                passwordError.style.display = "block";
                return;
            }

            if (password !== confirmPassword) {
                passwordError.textContent = "Passwords do not match.";
                passwordError.style.display = "block";
                return;
            }

            fetch("CRUD/update_profile.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ username, password })
            })
            .then(response => response.json())
            .then(data => {
                notificationMessage.textContent = data.message;
                document.getElementById("notificationModal").style.display = "flex";
                
                if (data.success) {
                    closeEditModal();
                }
            })
            .catch(() => {
                notificationMessage.textContent = "An error occurred.";
                document.getElementById("notificationModal").style.display = "flex";
            });
        }

        function closeEditModal() {
            document.getElementById("editProfileModal").style.display = "none";
        }

        function closeNotificationModal() {
            document.getElementById("notificationModal").style.display = "none";
        }

        function confirmLogout() {
            window.location.href = 'index.php';
        }

        document.addEventListener("DOMContentLoaded", fetchUserDetails);

        document.getElementById('backButton').addEventListener('click', () => {
            document.getElementById('logoutModal').style.display = 'flex';
        });

        document.getElementById('editProfileButton').addEventListener('click', () => {
            document.getElementById('editProfileModal').style.display = 'flex';
        });

        function closeModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }
    </script>
</body>

</html>
