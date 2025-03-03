<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Balances - ATS</title>
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
            max-width: 600px;
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

        .leave-balances {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .leave-balances h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .leave-balances table {
            width: 100%;
            border-collapse: collapse;
        }

        .leave-balances th, .leave-balances td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .leave-balances th {
            background-color: #f57c00;
            color: white;
        }

        .leave-balances tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .leave-balances tr:hover {
            background-color: #f1f1f1;
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
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #d32f2f, #f57c00);
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .icon {
            font-size: 24px;
            color: #f57c00;
        }

        @media (max-width: 480px) {
            .dashboard-container {
                padding: 25px;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 10px;
                margin-right: 10px;
            }
            .welcome-message {
                font-size: 20px;
            }
            .leave-balances h2 {
                font-size: 18px;
            }
            .leave-balances th, .leave-balances td {
                padding: 8px;
            }
            .back-btn {
                top: 10px;
                left: 10px;
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <button class="back-btn" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <div class="dashboard-container">
        <div class="logo">
            <img src="img/ATS_Logo.png" alt="ATS Logo">
        </div>
        <div class="welcome-message">
            Welcome, <span id="username">Employee</span>
        </div>
        <div class="leave-balances">
            <h2><i class="fas fa-calendar-alt icon"></i> Leave Balances</h2>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fas fa-umbrella-beach"></i> Vacation Leave (VL)</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-procedures"></i> Sick Leave (SL)</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Retrieve the username from localStorage
        const username = localStorage.getItem('username') || 'Employee';
        document.getElementById('username').textContent = username;

        // Add event listener to the back button
        document.getElementById('backButton').addEventListener('click', function() {
            window.location.href = 'employee_dashboard.php';
        });
    </script>
</body>
</html>