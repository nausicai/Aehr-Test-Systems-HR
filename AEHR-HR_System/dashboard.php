<?php include "session/admin.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AEHR - H.R. System - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<style>


.sidebar {
        background-color: #FE5A1D !important;
        background-image: none !important;
        padding-top: 5px;
    }
    
    .card-header .font-weight-bold.text-primary,
    .card-header .font-weight-bold.text-info,
    .card-header .font-weight-bold.text-success,
    .card-header .font-weight-bold.text-warning {
        color: #FE5A1D !important;
    }
    
    /* Table headers */
    .table thead th {
        background-color: #FE5A1D !important;
        color: white !important;
    }
    
    /* DataTables sorting icons */
    .table thead th.sorting:after,
    .table thead th.sorting_asc:after,
    .table thead th.sorting_desc:after {
        color: white !important;
    }

   /* ===== Modern Card Styling ===== */
.card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    border-radius: 12px !important;
    overflow: hidden;
    border: none !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
    background: white;
    position: relative;
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 24px rgba(254, 90, 29, 0.15) !important;
    z-index: 10;
}

/* Gradient border effect on hover */
.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FE5A1D, #FF8C42);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.card:hover::before {
    opacity: 1;
}

/* Dashboard stat cards (DTR, Leave, Bills, Pending) */
.card.border-left-primary,
.card.border-left-info,
.card.border-left-success,
.card.border-left-warning {
    border-left: 4px solid transparent !important; /* Hide default border */
}

.card.border-left-primary:hover {
    background: linear-gradient(135deg, rgba(78, 115, 223, 0.05), white);
}

.card.border-left-info:hover {
    background: linear-gradient(135deg, rgba(54, 185, 204, 0.05), white);
}

.card.border-left-success:hover {
    background: linear-gradient(135deg, rgba(28, 200, 138, 0.05), white);
}

.card.border-left-warning:hover {
    background: linear-gradient(135deg, rgba(246, 194, 62, 0.05), white);
}

/* Card content hover effects */
.card:hover .card-body {
    background-color: transparent;
}

.card:hover .text-primary {
    color: #FE5A1D !important;
}

/* Smooth icon animation */
.card .fa-2x {
    transition: transform 0.3s ease;
}

.card:hover .fa-2x {
    transform: scale(1.1);
}

/* Stats cards (DTR, Leave, Bills, Pending) */
.card .h5 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    transition: color 0.3s ease;
}

.card:hover .h5 {
    color: #FE5A1D;
}

/* Subtle text animation */
.card .text-xs {
    transition: all 0.3s ease;
}

.card:hover .text-xs {
    transform: translateX(3px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card {
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05) !important;
    }
    
    .col-xl-3, .col-md-6 {
        padding-left: 8px;
        padding-right: 8px;
    }
}

/* Table cards (DTR Submission, Bill Submission, Leave) */
.card.shadow.mb-4 {
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
}

.card.shadow.mb-4:hover {
    box-shadow: 0 8px 30px rgba(254, 90, 29, 0.12) !important;
}

/* Image hover effects */
.card img {
    transition: all 0.4s ease;
    border-radius: 8px;
}

.card:hover img {
    opacity: 0.9;
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* "Show more details" link animation */
.card a[href*="details"] {
    color: #6c757d;
    transition: all 0.3s ease;
    display: inline-block;
}

.card:hover a[href*="details"] {
    color: #FE5A1D !important;
    transform: translateX(5px);
}

</style>
<a class="sidebar-brand" href="dashboard.php" style="display: block; padding: 12px 0; transition: all 0.3s ease;">
    <div style="display: flex; align-items: center; justify-content: center; font-family: 'Nunito', sans-serif; 
              transition: all 0.3s ease;">
        <!-- Animated Logo Container (now with logo-icon class) -->
        <div class="logo-icon" style="width: 42px; height: 42px; background: rgba(255,255,255,0.1); border: 1.8px solid white;
                  border-radius: 50%; display: flex; align-items: center; justify-content: center;
                  margin-right: 14px; transition: all 0.3s ease; transform-origin: center;">
            <i class="fas fa-users" style="color: white; font-size: 1.2rem; transition: all 0.3s ease;"></i>
        </div>
        
        <!-- Text Content (now wrapped in logo-text div) -->
        <div class="logo-text" style="text-align: left; transition: all 0.3s ease;">
            <div style="font-weight: 800; font-size: 1.3rem; color: white; line-height: 1.2;
                      transition: all 0.2s ease; display: inline-block;">
                <span style="transition: all 0.3s ease;">HR</span> SYSTEM
            </div>
            <div style="font-weight: 500; font-size: 0.65rem; color: rgba(255,255,255,0.8); 
                      letter-spacing: 1.8px; margin-top: 4px; text-transform: uppercase;
                      transition: all 0.3s ease;">
                AEHR TEST SYSTEMS
            </div>
        </div>
    </div>
</a>

<style>
    /* Hover Effects */
    .sidebar-brand:hover {
        transform: translateY(-2px);
    }
    
    .sidebar-brand:hover .fa-users {
        transform: rotate(10deg) scale(1.1);
        color: #f8f8f8;
    }
    
    .sidebar-brand:hover div div:first-child {
        letter-spacing: 0.5px;
    }
    
    .sidebar-brand:hover div div:last-child {
        letter-spacing: 2px;
        color: white !important;
    }
    
    .sidebar-brand:hover > div > div:first-child {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(255,255,255,0.2);
        background: rgba(255,255,255,0.15);
    }
    
    /* Pulse Animation */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .sidebar-brand:active > div > div:first-child {
        animation: pulse 0.5s ease;
    }
    /* Sidebar minimized state */
.sidebar.toggled .sidebar-brand .logo-text {
    display: none !important;
}

.sidebar.toggled .sidebar-brand .logo-icon {
    margin-right: 0;
}

.sidebar.toggled .sidebar-brand > div {
    justify-content: center;
    width: 115%;
}
</style>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


                                <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php" style="background-color: #db4104; border-radius: 5px;">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

         <!-- Heading -->
 <div class="sidebar-heading">
    Submissions
</div>

            <!-- Nav Item - Direct Link to DTR.php -->
<li class="nav-item">
    <a class="nav-link" href="DTR.php">
        <i class="fas fa-fw fa-table"></i>
        <span>DTR Submission</span>
    </a>
</li>

            <!-- Nav Item - Bills -->
            <li class="nav-item">
                <a class="nav-link " href="Bills.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                        <span>Bill Submission</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Monitoring
            </div>

            <!-- Nav Item - Leave -->
            <li class="nav-item">
                <a class="nav-link" href="Leave.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Leave Monitoring</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>


            <!-- Nav Item - Employee management -->
            <li class="nav-item">
                <a class="nav-link" href="EmployeeManagement.php">
                    
                    <i class="fas fa-users-cog"></i>  
<span>Employee Management</span>
            </li>

           
<li>
    <a ></a>
</li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="logo">
                        <img src="img/ATS_Logo.png" alt="Logo" width="250" height="50">
                    </div>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Account Manager</span>
                                <img class="img-profile" src="img/undraw_posting_photo.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- Open Manage Account Modal -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#manageAccountModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Manage Account
                                 </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    

                            <!-- Manage Account Modal -->
                    <div class="modal fade" id="manageAccountModal" tabindex="-1" role="dialog" aria-labelledby="manageAccountModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="manageAccountModalLabel">Manage Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="manageAccountForm">
                                        <div class="form-group">
                                            <label for="adminUsername">New Username</label>
                                            <input type="text" class="form-control" id="adminUsername" name="adminUsername" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="adminPassword">New Password</label>
                                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmPassword" required>
                                        </div>
                                        <div id="passwordError" class="text-danger" style="display: none;">Passwords do not match!</div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="updateAdminAccount()" style="background-color: green; border-color: green">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function updateAdminAccount() {
                            let username = document.getElementById('adminUsername').value.trim();
                            let password = document.getElementById('adminPassword').value.trim();
                            let confirmPassword = document.getElementById('confirmPassword').value.trim();
                            let errorDiv = document.getElementById('passwordError');
                        
                            // Validate password match
                            if (password !== confirmPassword) {
                                errorDiv.style.display = "block";
                                return;
                            } else {
                                errorDiv.style.display = "none";
                            }
                        
                            // Send AJAX request to update the database
                            let formData = new FormData();
                            formData.append("adminUsername", username);
                            formData.append("adminPassword", password);
                        
                            fetch("CRUD/update_admin.php", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => response.json())  // Parse JSON response
                            .then(data => {
                                console.log(data); // Debugging
                        
                                if (data.status === "success") {
                                    // Close the fill-up modal
                                    $('#manageAccountModal').modal('hide');
                        
                                    // Show confirmation modal
                                    setTimeout(() => {
                                        $('#confirmationModal').modal('show');
                                    }, 500); // Delay for smooth transition
                                } else {
                                    alert(data.message); // Show error if update fails
                                }
                            })
                            .catch(error => console.error('Fetch Error:', error));
                        }
                        </script>
                        
                        <!-- Confirmation Modal -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Success</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Your account has been successfully updated.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.reload();">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                        



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">



                    <?php
require 'CRUD/db.php';

// Get current date
$currentDate = new DateTime();
$year = $currentDate->format("Y");
$month = $currentDate->format("m");
$day = $currentDate->format("d");

// Determine the start and end dates for the range
if ($day <= 15) {
    $startDate = new DateTime("$year-$month-01");
    $endDate = new DateTime("$year-$month-15");
} else {
    $startDate = new DateTime("$year-$month-16");
    $endDate = new DateTime("$year-$month-" . $currentDate->format("t")); // 't' gives last day of month
}

// Format the date for display (e.g., March 01, 2025 - March 15, 2025)
$formattedDateRange = $startDate->format("F d ") . " - " . $endDate->format("F d ");

// Convert to string format for AJAX request
$startDateSQL = $startDate->format("Y-m-d");
$endDateSQL = $endDate->format("Y-m-d");
?>

<!-- DTR Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="DTR.php" style="text-decoration: none;">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            DTR Submission
                        </div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="dtrCount">Loading...</div>
                        <div class="text-left text-xs text-gray-600 font-weight-bold">
                            Date: <span id="dtrDateRange"><?= $formattedDateRange; ?></span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Get the current date range
    var startDate = "<?= $startDateSQL ?>";
    var endDate = "<?= $endDateSQL ?>";

    // AJAX request to fetch DTR submission stats
    $.ajax({
        url: "CRUD/get_dtr_stat.php",
        type: "POST",
        data: { startDate: startDate, endDate: endDate },
        dataType: "json",
        success: function(response) {
            if (response.error) {
                $("#dtrCount").text("Error");
                console.log(response.error);
                return;
            }

            let totalEmployees = response.length; // Total employees
            let submittedDTR = response.filter(emp => emp.sub_date !== null).length; // Count employees who submitted

            $("#dtrCount").text(submittedDTR + "/" + totalEmployees); // Update dashboard
        },
        error: function(xhr, status, error) {
            $("#dtrCount").text("Error");
            console.error("AJAX Error:", error);
        }
    });
});
</script>


                        <!-- Leave (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="Leave.php" style="text-decoration: none;">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Leave Monitoring
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" >Check Leave Balances</div>
                                            </div>
                                        
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Bills Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="Bills.php" style="text-decoration: none;">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Bills Submission
                        </div>
                        <div class="text-s text-gray-700 mt-2">
                            <div>OP Department: <span class="font-weight-bold" id="operationsCount">0</span></div>
                            <div>HR Department: <span class="font-weight-bold" id="hrCount">0</span></div>
                            <div>CS Department: <span class="font-weight-bold" id="csCount">0</span></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="text-left text-xs text-gray-600 font-weight-bold" id="currentMonthYear"></div>
            </div>
        </div>
    </a>
</div>

<!-- JavaScript to Fetch Approved Count -->
<script>
    function fetchApprovedCount() {
        fetch('CRUD/get_bills.php') // Fetch data from get_bills.php
            .then(response => response.json())
            .then(data => {
                const currentDate = new Date();
                const currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Format as MM
                const currentYear = currentDate.getFullYear();

                // Filter only approved bills for the current month
                let approvedBills = data.filter(bill => 
                    bill.status === 'Approved' && 
                    bill.sub_date.startsWith(`${currentYear}-${currentMonth}`)
                );

                // Count approved submissions for each department
                let operationsCount = approvedBills.filter(bill => bill.department === 'OPERATIONS DEPARTMENT').length;
                let hrCount = approvedBills.filter(bill => bill.department === 'HUMAN RESOURCES DEPARTMENT').length;
                let csCount = approvedBills.filter(bill => bill.department === 'CS DEPARTMENT').length;

                // Update the UI with department-specific counts
                document.getElementById('operationsCount').textContent = operationsCount || "0";
                document.getElementById('hrCount').textContent = hrCount || "0";
                document.getElementById('csCount').textContent = csCount || "0";

                // Display current month and year at the bottom
                document.getElementById('currentMonthYear').textContent = 
                    `Date: ${currentDate.toLocaleString('en-US', { month: 'long' })} ${currentYear}`;
            })
            .catch(error => console.error('Error fetching approved count:', error));
    }

    // Run function on page load
    document.addEventListener('DOMContentLoaded', fetchApprovedCount);
</script>




                        

                        <!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="Bills.php#billsTable" style="text-decoration: none;">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Bills Submissions
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="pendingCount">00</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- JavaScript to Fetch Pending Count -->
<script>
    function fetchPendingCount() {
        fetch('CRUD/get_bills.php') // Fetch data from get_bills.php
            .then(response => response.json())
            .then(data => {
                // Filter pending bills
                let pendingCount = data.filter(bill => bill.status === 'Pending').length;

                // Update the pending count on the page
                document.getElementById('pendingCount').textContent = pendingCount;
            })
            .catch(error => console.error('Error fetching pending count:', error));
    }

    // Run function on page load
    document.addEventListener('DOMContentLoaded', fetchPendingCount);
</script>



                    </div>



                    <!-- Content Row -->
                    <div class="row ">

                        <!-- Pie Chart -->
<div class="col-xl-4 col-lg-5 mx-auto">
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Employees with DTR</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="dtrPieChart"></canvas>
            </div>
            <!-- Submission Counter -->
            <div class="mt-3 text-center font-weight-bold text-gray-700">
                <span id="submissionText">Loading...</span>
                <div class="text-xs font-weight-bold text-gray-700">
                            Date: <span id="dtrDateRange"><?= $formattedDateRange; ?></span>
                        </div>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Submitted
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Did not submit
                </span>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var startDate = "<?= $startDate->format('Y-m-d') ?>";
    var endDate = "<?= $endDate->format('Y-m-d') ?>";

    $.ajax({
        url: "CRUD/get_dtr_stat.php",
        type: "POST",
        data: { startDate: startDate, endDate: endDate },
        dataType: "json",
        success: function(response) {
            if (response.error) {
                console.log(response.error);
                return;
            }

            let totalEmployees = response.length;
            let submittedDTR = response.filter(emp => emp.sub_date !== null).length;
            let notSubmittedDTR = totalEmployees - submittedDTR;

            // Update text counter
            $("#submissionText").html(`${submittedDTR}/${totalEmployees} employees have submitted`);

            // Create Pie Chart
            var ctx = document.getElementById("dtrPieChart").getContext("2d");
            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Submitted", "Did not submit"],
                    datasets: [{
                        data: [submittedDTR, notSubmittedDTR],
                        backgroundColor: ["#28a745", "#dc3545"], // Green & Red
                        hoverBackgroundColor: ["#218838", "#c82333"],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: "#dddfeb",
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: { display: false },
                    cutoutPercentage: 60,
                }
            });
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });
});
</script>



                                                
                       <!-- DTR Table -->
<div class="card shadow mb-4" style="flex: 1; min-width: 0;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DTR Submission</h6>
        <small class="text-muted">Current period: <span id="dateRange"></span></small>
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;"> <!-- Added scrolling -->
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>Employee No.</th>
                        <th>Employee Name</th>
                        <th>Status</th>
                        <th>Submission Date</th>
                    </tr>
                </thead>
                <tbody id="dtrTableBody">
                    <!-- Data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
        <a class="text-right d-block mt-2" href="DTR.php#dtrTable2">Show more details &rarr;</a>

        
    </div>
</div>

<?php
require 'CRUD/db.php';

// Get current date
$currentDate = new DateTime();
$year = $currentDate->format("Y");
$month = $currentDate->format("m");
$day = $currentDate->format("d");

// Determine the start and end dates for the current period
if ($day <= 15) {
    $startDate = new DateTime("$year-$month-01");
    $endDate = new DateTime("$year-$month-15");
} else {
    $startDate = new DateTime("$year-$month-16");
    $endDate = new DateTime("$year-$month-" . $currentDate->format("t")); // 't' gives last day of month
}

// Format dates for display and AJAX
$formattedDateRange = $startDate->format("F d, Y") . " - " . $endDate->format("F d, Y");
$startDateSQL = $startDate->format("Y-m-d");
$endDateSQL = $endDate->format("Y-m-d");
?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Set the date range in the header
    document.getElementById("dateRange").textContent = "<?= $formattedDateRange ?>";

    fetchSubmittedDTR("<?= $startDateSQL ?>", "<?= $endDateSQL ?>");

    function fetchSubmittedDTR(startDate, endDate) {
        fetch('CRUD/get_dtr_stat.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `startDate=${startDate}&endDate=${endDate}`
        })
        .then(response => response.json())
        .then(data => {
            let dtrTableBody = document.getElementById("dtrTableBody");
            dtrTableBody.innerHTML = ""; // Clear previous entries

            // Sort by latest submission date (null values at bottom)
            data.sort((a, b) => {
                if (!a.sub_date) return 1;  // If a has no sub_date, move it down
                if (!b.sub_date) return -1; // If b has no sub_date, move it down
                return new Date(b.sub_date) - new Date(a.sub_date); // Sort descending
            });

            let rowCount = 0;
            data.forEach((entry) => {
                let statusText = entry.sub_date ? '<span class="text-success font-weight-bold">Submitted</span>' 
                                                : '<span class="text-danger font-weight-bold">Not Submitted</span>';

                let row = `
                    <tr>
                        <td>${entry.employee_no}</td>
                        <td>${entry.name}</td>
                        <td>${statusText}</td>
                        <td>${entry.sub_date ? entry.sub_date : '-'}</td>
                    </tr>
                `;
                dtrTableBody.innerHTML += row;
                rowCount++;
            });

            // If no employees exist, show a message
            if (rowCount === 0) {
                dtrTableBody.innerHTML = `<tr><td colspan="4" class="text-center text-danger">No employee records found</td></tr>`;
            }
        })
        .catch(error => console.error("Error fetching DTR data:", error));
    }
});
</script>



                                                
                    </div>



                    <!-- Content Row -->
<div class="row d-flex">

    <!-- Bill Submission (Left Side) -->
<div class="col-lg-6 mb-4 d-flex">
    <div class="card shadow mb-4 w-100 d-flex flex-column">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bill Submission</h6>
        </div>
        <div class="card-body d-flex flex-column flex-grow-1">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" 
                     style="width: 100%; max-width: 25rem; height: 180px; object-fit: cover;" 
                     src="img/bill-img.png" alt="Bill Submission">
            </div>
            <div class="table-responsive flex-grow-1" style="max-height: 300px; overflow-y: auto;">
                <table class="table table-bordered" id="billTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Employee No.</th>
                            <th>Employee Name</th>
                            <th>Status</th>
                            <th>Submission Date</th>
                        </tr>
                    </thead>
                    <tbody id="billTableBody">
                        <!-- Data will be loaded dynamically -->
                    </tbody>
                </table>
            </div>
            <div class="text-right d-block mt-2">
                <a href="Bills.php#billsTable">Show more details &rarr;</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("CRUD/get_bills.php")
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("billTableBody");
            tableBody.innerHTML = ""; // Clear existing data

            if (data.length === 0) {
                tableBody.innerHTML = "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
            } else {
                data.forEach(row => {
                    let statusColor = row.status === "Approved" ? "green" : "orange";
                    tableBody.innerHTML += `
                        <tr>
                            <td>${row.employee_no}</td>
                            <td>${row.name}</td>
                            <td style="color:${statusColor};"><strong>${row.status}</strong></td>
                            <td>${row.sub_date}</td>
                        </tr>
                    `;
                });
            }
        })
        .catch(error => console.error("Error fetching bill submissions:", error));
});
</script>



    <!-- Vacation Leave / Sick Leave (Right Side) -->
<div class="col-lg-6 mb-4 d-flex">
    <div class="card shadow mb-4 w-100 d-flex flex-column">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vacation Leave / Sick Leave</h6>
        </div>
        <div class="card-body d-flex flex-column flex-grow-1">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" 
                     style="width: 100%; max-width: 25rem; height: 180px; object-fit: cover;" 
                     src="img/vacation-illustration.png" 
                     alt="Vacation Leave Illustration">
            </div>
            <div class="table-responsive flex-grow-1" style="max-height: 300px; overflow-y: auto;">
                <table class="table table-bordered" id="leaveTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Employee No.</th>
                            <th>Employee Name</th>
                            <th>Vacation Leave (VL)</th>
                            <th>Sick Leave (SL)</th>
                        </tr>
                    </thead>
                    <tbody id="leaveTableBody">
                        <!-- Data will be loaded here via AJAX -->
                    </tbody>
                </table>
            </div>
            <div class="text-right d-block mt-2">
                <a href="Leave.php">Show more details &rarr;</a>
            </div>
        </div>
    </div>
</div>

<!-- AJAX to Fetch Data Without Changing fetch_leave_data.php -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('CRUD/fetch_leave_data.php') // Fetch data from the PHP file
            .then(response => response.text()) // Get response as text (HTML)
            .then(data => {
                // Remove the "Action" column before inserting
                let parser = new DOMParser();
                let doc = parser.parseFromString("<table>" + data + "</table>", "text/html");
                let rows = doc.querySelectorAll("tr");

                rows.forEach(row => {
                    let lastCell = row.lastElementChild;
                    if (lastCell) lastCell.remove(); // Remove last column (Action column)
                });

                document.getElementById('leaveTableBody').innerHTML = rows.length ? [...rows].map(r => r.outerHTML).join('') : '<tr><td colspan="4" class="text-center">No employees found</td></tr>';
            })
            .catch(error => console.error('Error fetching leave data:', error));
    });
</script>



</div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AEHR Test Systems 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="logout_admin.php" style="background-color: red; border-color: red">Logout</a>
</div>

            </div>
        </div>
    </div>
    <style>
        .modal-header{
            background-color: #FE5A1D;

        }
        .modal-title{
            color: white;
        }
    </style>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>




</body>

</html>