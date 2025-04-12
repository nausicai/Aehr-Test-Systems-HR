<?php
include "session/employee.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Balances - ATS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f57c00;
            --secondary-color: #ff6b6b;
            --accent-color: #d32f2f;
            --header-color: rgba(44, 62, 80, 0.9);
            --light-color: #fff9f2;
            --dark-color: #333;
            --gray-color: #f5f5f5;
            --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --header-height: 220px;
            --container-width: 720px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background-image: url('img/AEHR_bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            padding: 30px 20px;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .dashboard-container {
            width: 100%;
            max-width: var(--container-width);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            border-radius: 18px;
            text-align: center;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            overflow: hidden;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .dashboard-container:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.35);
        }

        .dashboard-header {
            background: var(--header-color);
            color: white;
            padding: 30px 25px;
            text-align: center;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            min-height: var(--header-height);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,0,0,0.15), transparent);
            z-index: -1;
        }

        .dashboard-header:hover {
            background: rgba(44, 62, 80, 0.95);
        }

        .logo {
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .logo img {
            height: 70px;
            transition: var(--transition);
            filter: drop-shadow(0 3px 6px rgba(0,0,0,0.3));
        }

        .logo:hover img {
            transform: scale(1.1) rotate(-5deg);
            filter: drop-shadow(0 5px 12px rgba(0,0,0,0.4));
        }

        .welcome-message {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
            text-shadow: 0 2px 5px rgba(0,0,0,0.3);
            transition: var(--transition);
        }

        .welcome-message:hover {
            transform: scale(1.05);
            color: var(--primary-color);
            text-shadow: 0 3px 8px rgba(245, 124, 0, 0.4);
        }

        .welcome-message::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
            transition: var(--transition);
        }

        .welcome-message:hover::after {
            width: 70px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }

        .user-info {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
            transition: var(--transition);
        }

        .user-info:hover {
            transform: scale(1.05);
        }

        .user-icon {
            background: rgba(255,255,255,0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 1.2rem;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.3);
            transition: var(--transition);
            cursor: pointer;
        }

        .user-icon:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.15) rotate(10deg);
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        #username {
            transition: var(--transition);
            font-weight: 500;
        }

        .user-info:hover #username {
            color: var(--primary-color);
            text-shadow: 0 0 12px rgba(245, 124, 0, 0.5);
        }

        .dashboard-content {
            padding: 30px;
        }

        .section-title {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
            padding-bottom: 12px;
            transition: var(--transition);
            font-weight: 600;
        }

        .section-title:hover {
            color: var(--header-color);
            transform: scale(1.02);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 3px;
            transition: var(--transition);
        }

        .section-title:hover::after {
            width: 100px;
            height: 4px;
        }

        .leave-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 25px;
        }

        .leave-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border-top: 4px solid var(--primary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .leave-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(245,124,0,0.05), transparent);
            z-index: 0;
            transition: var(--transition);
        }

        .leave-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .leave-card:hover::before {
            background: linear-gradient(135deg, rgba(245,124,0,0.1), transparent);
        }

        .leave-icon-container {
            position: relative;
            margin-bottom: 20px;
            z-index: 1;
            transition: var(--transition);
        }

        .leave-card:hover .leave-icon-container {
            transform: scale(1.1);
        }

        .leave-icon {
            font-size: 2.2rem;
            color: var(--primary-color);
            position: relative;
            z-index: 2;
            transition: var(--transition);
        }

        .leave-card:hover .leave-icon {
            color: var(--secondary-color);
            transform: rotate(10deg);
        }

        .leave-icon-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(245, 124, 0, 0.1);
            z-index: 1;
            transition: var(--transition);
        }

        .leave-card:hover .leave-icon-bg {
            background: rgba(255, 107, 107, 0.15);
            width: 80px;
            height: 80px;
        }

        .leave-type {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
            position: relative;
            z-index: 1;
            transition: var(--transition);
        }

        .leave-card:hover .leave-type {
            color: var(--header-color);
            transform: scale(1.03);
        }

        .leave-hours {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 12px 0;
            position: relative;
            z-index: 1;
            transition: var(--transition);
        }

        .leave-card:hover .leave-hours {
            transform: scale(1.08);
            text-shadow: 0 2px 8px rgba(245, 124, 0, 0.3);
        }

        .leave-subtext {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
            transition: var(--transition);
        }

        .leave-card:hover .leave-subtext {
            color: #555;
        }

        .leave-progress {
            width: 100%;
            height: 6px;
            background: var(--gray-color);
            border-radius: 3px;
            margin-top: 15px;
            overflow: hidden;
            position: relative;
            z-index: 1;
            transition: var(--transition);
        }

        .leave-card:hover .leave-progress {
            height: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            width: 0%;
            transition: width 0.8s ease, background 0.3s ease;
        }

        /* Back Button Style */
        .back-btn-container {
            position: absolute;
            top: 25px;
            left: 25px;
            z-index: 10;
            transition: var(--transition);
        }

        .back-btn-container:hover {
            transform: translateX(-5px);
        }

        .back-btn {
            background: white;
            text-align: center;
            width: 120px;
            border-radius: 10px;
            height: 45px;
            position: relative;
            color: black;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: var(--transition);
        }

        .back-btn:hover {
            box-shadow: 0 6px 18px rgba(0,0,0,0.2);
        }

        .back-btn-arrow {
            background: black;
            border-radius: 8px;
            height: 41px;
            width: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 2px;
            top: 2px;
            z-index: 10;
            transition: all 0.5s ease;
        }

        .back-btn:hover .back-btn-arrow {
            width: 116px;
            background: var(--header-color);
        }

        .back-btn-text {
            position: relative;
            z-index: 5;
            padding-left: 35px;
            transition: all 0.3s ease;
        }

        .back-btn:hover .back-btn-text {
            color: white;
        }

        .back-btn svg {
            height: 20px;
            width: 20px;
            transition: var(--transition);
        }

        .back-btn:hover svg {
            transform: rotate(360deg);
        }

        .back-btn svg path {
            fill: white;
        }

        .current-date {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
            transition: var(--transition);
        }

        .dashboard-header:hover .current-date {
            color: var(--primary-color);
            transform: scale(1.03);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .animated {
            animation: fadeIn 0.6s ease forwards;
        }

        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }

        /* Loading spinner */
        .loader {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 4px solid var(--primary-color);
            width: 45px;
            height: 45px;
            animation: spin 1s linear infinite;
            margin: 30px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 800px) {
            .dashboard-container {
                margin: 15px;
                max-width: 95%;
            }
            
            .dashboard-header {
                padding: 25px 20px;
            }
            
            .dashboard-content {
                padding: 25px;
            }
        }

        @media (max-width: 650px) {
            .leave-cards {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .welcome-message {
                font-size: 1.4rem;
            }
            
            .back-btn-container {
                top: 15px;
                left: 15px;
            }

            .logo img {
                height: 60px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 15px;
            }
            
            .dashboard-header {
                padding: 20px 15px;
                min-height: 200px;
            }

            .dashboard-content {
                padding: 20px;
            }

            .logo img {
                height: 55px;
            }

            .back-btn {
                width: 100px;
                height: 40px;
                font-size: 0.9rem;
            }

            .back-btn-arrow {
                height: 36px;
                width: 28px;
            }

            .back-btn:hover .back-btn-arrow {
                width: 96px;
            }

            .back-btn-text {
                padding-left: 30px;
            }

            .leave-card {
                padding: 20px;
            }

            .welcome-message {
                font-size: 1.3rem;
            }
            
            .leave-hours {
                font-size: 1.8rem;
            }
            
            .leave-icon {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <div class="back-btn-container">
        <button class="back-btn" id="backButton">
            <div class="back-btn-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                    <path d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                    <path d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path>
                </svg>
            </div>
            <span class="back-btn-text">Back</span>
        </button>
    </div>

    <div class="dashboard-container animated">
        <div class="dashboard-header">
            <div class="logo">
                <img src="img/DarkModeLogo.png" alt="ATS Logo" class="animated delay-1">
            </div>
            <div class="current-date animated delay-1" id="currentDate"></div>
            <div class="welcome-message animated delay-2">
                Your Leave Balances
            </div>
            <div class="user-info animated delay-2">
                <div class="user-icon">
                    <i class="fas fa-user"></i>
                </div>
                <span id="username"><?php echo htmlspecialchars($employee_name); ?></span>
            </div>
        </div>

        <div class="dashboard-content">
            <h3 class="section-title animated delay-1">
                Leave Information
            </h3>
            
            <div class="leave-cards">
                <div class="leave-card animated delay-1" id="vlCard">
                    <div class="leave-icon-container">
                        <div class="leave-icon-bg"></div>
                        <i class="fas fa-umbrella-beach leave-icon"></i>
                    </div>
                    <div class="leave-type">Vacation Leave</div>
                    <div class="leave-hours" id="vlHours">0</div>
                    <div class="leave-subtext">Hours Available</div>
                    <div class="leave-progress">
                        <div class="progress-bar" id="vlProgress"></div>
                    </div>
                </div>

                <div class="leave-card animated delay-2" id="slCard">
                    <div class="leave-icon-container">
                        <div class="leave-icon-bg"></div>
                        <i class="fas fa-procedures leave-icon"></i>
                    </div>
                    <div class="leave-type">Sick Leave</div>
                    <div class="leave-hours" id="slHours">0</div>
                    <div class="leave-subtext">Hours Available</div>
                    <div class="leave-progress">
                        <div class="progress-bar" id="slProgress"></div>
                    </div>
                </div>
            </div>

            <div class="loader" id="loader"></div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set current date
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            $('#currentDate').text(today.toLocaleDateString('en-US', options));

            // Back button functionality
            $('#backButton').click(function() {
                window.history.back();
            });

            // Show loader while fetching data
            $('#loader').show();

            // Fetch leave balances via AJAX
            $.ajax({
                url: 'CRUD/emp_get_leave.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (!response.error) {
                        // Update cards
                        $('#vlHours').text(response.vl)
                            .css('color', response.vl > 0 ? 'var(--primary-color)' : 'var(--accent-color)');
                        $('#slHours').text(response.sl)
                            .css('color', response.sl > 0 ? 'var(--primary-color)' : 'var(--accent-color)');
                        
                        // Calculate and animate progress bars
                        const vlPercent = Math.min(100, (response.vl / 80) * 100);
                        const slPercent = Math.min(100, (response.sl / 80) * 100);
                        
                        $('#vlProgress').css('width', vlPercent + '%');
                        $('#slProgress').css('width', slPercent + '%');
                        
                        // Change progress bar color if leave is low
                        if (vlPercent < 25) {
                            $('#vlProgress').css('background', 'var(--accent-color)');
                            $('#vlCard').css('border-top-color', 'var(--accent-color)');
                            $('#vlCard .leave-icon').css('color', 'var(--accent-color)');
                            $('#vlCard .leave-icon-bg').css('background', 'rgba(211, 47, 47, 0.1)');
                        }
                        
                        if (slPercent < 25) {
                            $('#slProgress').css('background', 'var(--accent-color)');
                            $('#slCard').css('border-top-color', 'var(--accent-color)');
                            $('#slCard .leave-icon').css('color', 'var(--accent-color)');
                            $('#slCard .leave-icon-bg').css('background', 'rgba(211, 47, 47, 0.1)');
                        }
                    } else {
                        console.error(response.error);
                        showError('Failed to load leave balances');
                    }
                    $('#loader').hide();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching leave balances:", error);
                    showError('Network error. Please try again.');
                    $('#loader').hide();
                }
            });

            // Function to show error message
            function showError(message) {
                const errorDiv = $(`
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> ${message}
                    </div>
                `);
                $('.dashboard-content').prepend(errorDiv);
                setTimeout(() => errorDiv.fadeOut(), 3000);
            }
        });

        // Add CSS for error message
        $('<style>').text(`
            .error-message {
                background: var(--accent-color);
                color: white;
                padding: 12px 20px;
                border-radius: 8px;
                margin-bottom: 20px;
                text-align: center;
                animation: fadeIn 0.4s ease;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                font-size: 0.9rem;
            }
            .error-message i {
                font-size: 1.1rem;
            }
        `).appendTo('head');
    </script>

    <script>
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
    </script>
</body>
</html>