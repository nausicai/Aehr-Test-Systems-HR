<?php
session_start();
include "CRUD/db.php"; // Database connection

$error = "";
$showSetupModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hrs_account = trim($_POST["hrs_account"]);
    $hrs_password = trim($_POST["hrs_password"]);

    // Select employee_no instead of id
    $stmt = $conn->prepare("SELECT employee_no, hrs_account, hrs_password FROM employees WHERE hrs_account = ?");
    $stmt->bind_param("s", $hrs_account);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($employee_no, $db_account, $db_password);
        $stmt->fetch();

        if (empty($db_password)) {
            // No password set, require account setup
            $_SESSION["employee_no"] = $employee_no;
            $_SESSION["hrs_account"] = $db_account;
            $_SESSION["first_login"] = true;
            $showSetupModal = true; // Flag for modal
        } elseif (password_verify($hrs_password, $db_password)) {
            // Correct password, allow login
            $_SESSION["employee_no"] = $employee_no;
            $_SESSION["hrs_account"] = $db_account;
            $_SESSION["first_login"] = false;
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

        .container {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            text-align: center;
        }

        .logo img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .login-box h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .tab-btn {
            padding: 12px 22px;
            border: none;
            background: #eee;
            color: #333;
            cursor: pointer;
            border-radius: 20px;
            font-size: 15px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            background: #f57c00;
            color: white;
        }

        .form-container {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .form-container.active {
            display: block;
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 15px;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: #f57c00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #d32f2f;
        }

        .modal {
    display: none; 
    align-items: center;
    justify-content: center;
    position: fixed;
    z-index: 20; /* Increase to make sure it appears above everything */
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}



.modal-content {
    background-color: white;
    padding: 30px;
    border-radius: 12px;
    width: 90%;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    position: relative;
}

.close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 20px;
            cursor: pointer;
            background: none;
            border: none;
            color: black;
        }

        .modal-content button {
            padding: 5px 10px;
            background: #f57c00;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal-content button:hover {
            background: #d32f2f;
        }

        #setupModal {
    z-index: 10; /* Lower than the error modal */
}

        
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="img/ATS_Logo.png" alt="ATS Logo">
        </div>
        <div class="login-box">
            <h2>Human Resource System Login</h2>
            <div class="tabs">
                <button id="employeeTab" class="tab-btn active" onclick="showLogin('employee')">Employee</button>
                <button id="adminTab" class="tab-btn" onclick="showLogin('admin')">Admin</button>
            </div>

            <!-- Employee Login Form -->
            <div id="employeeLogin" class="form-container active">
                <form id="employeeForm">
                    <div class="input-group">
                        <label for="empUsername">Employee No./Account</label>
                        <input type="text" id="empUsername" name="empUsername" required>
                    </div>
                    <div class="input-group">
                        <label for="empPassword">Password</label>
                        <input type="password" id="empPassword" name="empPassword">
                    </div>
                    <button type="button" class="btn" onclick="loginEmployee()">Login</button>
                </form>
            </div>

            <!-- Admin Login Form -->
            <div id="adminLogin" class="form-container">
                <form id="adminForm">
                    <div class="input-group">
                        <label for="adminUsername">Admin Account</label>
                        <input type="text" id="adminUsername" name="adminUsername" required>
                    </div>
                    <div class="input-group">
                        <label for="adminPassword">Password</label>
                        <input type="password" id="adminPassword" name="adminPassword" required>
                    </div>
                    <button type="button" class="btn" onclick="loginAdmin()">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="modal" class="modal" onclick="closeOutside(event, 'modal')">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal()">×</button>
            <p id="modalMessage"></p>
        </div>
    </div>

    <!-- Setup Account Modal -->
    <div id="setupModal" class="modal" onclick="closeOutside(event, 'setupModal')">
        <div class="modal-content">
            <button class="close-btn" onclick="closeSetupModal()">×</button>
            <h2>Set Up Your Account</h2>
            <p>Please update your new account details before proceeding.</p>
            
            <div class="input-group">
                <label for="newUsername">New Username</label>
                <input type="text" id="newUsername">
            </div>

            <div class="input-group">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword">
            </div>
            
            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword">
            </div>
            
            <button class="btn" onclick="setupAccount()">Save Changes</button>
        </div>
    </div>

    <script>
        // Switch between Employee & Admin login
        function showLogin(type) {
            document.querySelectorAll('.form-container').forEach(form => form.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(tab => tab.classList.remove('active'));

            document.getElementById(`${type}Login`).classList.add('active');
            document.getElementById(`${type}Tab`).classList.add('active');
        }


    function loginEmployee() {
    let username = document.getElementById('empUsername').value.trim();
    let password = document.getElementById('empPassword').value.trim();

    if (!username) {
        showModal("Please enter your account.");
        return;
    }

    let formData = new FormData();
    formData.append("empUsername", username);
    formData.append("empPassword", password);

    fetch("CRUD/employee_login.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "setup") {
            sessionStorage.setItem("employee_no", data.employee_no); // Store in sessionStorage
            document.getElementById('setupModal').style.display = 'flex';
            document.getElementById('newUsername').value = username;
        } else if (data.status === "success") {
            window.location.href = data.redirect;
        } else {
            showModal(data.message);
        }
    })
    .catch(error => console.error('Fetch Error:', error));
}



function setupAccount() {
    let employeeNo = sessionStorage.getItem("employee_no"); // Retrieve from sessionStorage
    let newUsername = document.getElementById('newUsername').value.trim();
    let newPassword = document.getElementById('newPassword').value.trim();
    let confirmPassword = document.getElementById('confirmPassword').value.trim();

    if (!newUsername || !newPassword || !confirmPassword) {
        showModal("All fields are required.");
        return;
    }

    if (newPassword.length < 6) {
        showModal("Password must be at least 6 characters long.");
        return;
    }

    if (newPassword !== confirmPassword) {
        showModal("Passwords do not match.");
        return;
    }

    let formData = new FormData();
    formData.append("employee_no", employeeNo);
    formData.append("newUsername", newUsername);
    formData.append("newPassword", newPassword);

    fetch("CRUD/setup_account.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            window.location.href = data.redirect;
        } else {
            showModal(data.message);
        }
    })
    .catch(error => console.error('Fetch Error:', error));
}




        // Admin Login
        function loginAdmin() {
            let username = document.getElementById('adminUsername').value.trim();
            let password = document.getElementById('adminPassword').value.trim();

            if (!username || !password) {
                showModal("Please fill in all fields.");
                return;
            }

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
                    window.location.href = data.redirect;
                } else {
                    showModal(data.message);
                }
            })
            .catch(error => console.error('Fetch Error:', error));
        }

        // Modal functions
        function showModal(message) {
            document.getElementById('modalMessage').textContent = message;
            document.getElementById('modal').style.display = 'flex';
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
    </script>
</body>