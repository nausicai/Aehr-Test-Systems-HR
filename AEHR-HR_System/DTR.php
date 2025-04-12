<?php
include "session/admin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AEHR - H.R. System - DTR Submission</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- Custom styles for tables -->
    <style>
        
        .table thead th {
            background-color: #FE5A1D;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table tbody tr td {
            color: #333;
        }

        .btn-primary {
            background-color: #FE5A1D;
            border-color: #FE5A1D;
        }

        .btn-primary:hover {
            background-color: #db4104;
            border-color: #db4104;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .card {
            border: 3px solidrgb(0, 0, 0);
        }

        .card-header {
            background-color: rgb(255, 255, 255);
            color: white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #FE5A1D !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: rgb(0, 0, 0) !important;
            border-color: rgb(0, 0, 0) !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: rgb(0, 0, 0) !important;
            border-color: rgb(0, 0, 0) !important;
            color: white !important;
        }

        .modal-content {
            border-radius: 10px;
           
        }

        .modal-header {
            background-color: #FE5A1D;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-body {
            overflow-x: auto;
        }

        .modal-body table {
            width: 100%;
            margin-bottom: 0;
            min-width: 1200px;
        }

        .modal-body table th {
            background-color: #FE5A1D;
            color: white;
        }

        .modal-body table td {
            padding: 10px;
        }

        .modal-footer {
            
        }

        .modal-footer .btn {
            background-color: #FE5A1D;
            border-color: #FE5A1D;
            color: white;
        }

        .modal-footer .btn:hover {
            background-color: #db4104;
            border-color: #db4104;
        }

        .text-orange {
            color: #FE5A1D !important;
        }
    /* Add a border between Total Hours and Regular Holiday OT */

    </style>
</head>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.location.hash) {
            let element = document.querySelector(window.location.hash);
            if (element) {
                setTimeout(() => {
                    let yOffset = element.getBoundingClientRect().top + window.scrollY - 150; // Adjust offset to position table at top
                    window.scrollTo({ top: yOffset, behavior: "smooth" });
                }, 500); // Delay ensures the content is fully loaded before scrolling
            }
        }
    });
</script>

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
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Submissions
    </div>

    <!-- Nav Item - Direct Link to DTR.php -->
    <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="DTR.php" style="background-color: #db4104; border-radius: 5px;">
            <i class="fas fa-fw fa-table text-white font-weight-bold"></i>
            <span class="font-weight-bold">DTR Submission</span>
        </a>
    </li>

    <!-- Nav Item - Bill -->
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
        </a>
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
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Account Manager</span>
                    <img class="img-profile" src="img/undraw_posting_photo.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">DTR Submissions</h1>
                
            </div>



            <style>

:root {
     --table-header-color: #FE5A1D;
     
        }

.form-container {
            text-align: left;
            margin-top: 20px;
           
            overflow-y: auto;
            padding-right: 10px;
        }

        .form-container h3 {
            color: var(--text-color);
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            color: #555;
        }

        .input-group input {
            width: 98%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color var(--transition-speed);
        }

        .input-group input:focus {
            border-color: var(--primary-color);
            outline: none;
        }
.table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: var(--table-header-color);
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        table tr:nth-child(even) {
            background-color:rgb(241, 241, 241);
        }

        table tr:hover {
            background-color:rgb(221, 221, 221);
            transition: background-color var(--transition-speed);
        }
form-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .form-container th, .form-container td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .form-container th {
            background-color: var(--table-header-color);
            color: white;
            font-weight: 600;
        }

        .form-container input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        .form-container input[type="text"] {
            width: 120px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }


        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .spinner-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

    .input-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .spinner-label {
        font-size: 16px;
        color: var(--text-color);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .styled-select {
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background-color: white;
        cursor: pointer;
        transition: border-color var(--transition-speed), box-shadow var(--transition-speed);
    }

    .styled-select:hover {
        border-color: var(--primary-color);
        box-shadow: 0 0 8px rgba(245, 124, 0, 0.2);
    }

    .styled-select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 12px rgba(245, 124, 0, 0.3);
    }
    

</style>



        <!-- Main Content -->
        <div id="content">



        <style>
    .form-container {
    display: flex;
    justify-content: space-between;
    gap: 20px; /* Adds space between tables */
    align-items: flex-start; /* Aligns both tables at the top */
}

.table-wrapper {
    display: flex;
    align-items: stretch; /* Ensures row alignment */
}

table {
    border-collapse: collapse;
    width: auto; /* Ensures it doesn't stretch unnecessarily */
    table-layout: fixed;
}

th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}

thead tr {
    height: 60px; /* Set the same height for both table headers */
}


th {
    vertical-align: middle; /* Ensures text remains centered */
    padding: 10px;
}

/* Ensure rows in both tables match height dynamically */
tbody tr {
    display: table-row;
    height: 40px;
}

#mainTable {
    flex: 2; /* Allows the main table to take more space */
}

#secondTable {
    flex: 1; /* Allows the second table to be smaller */
}


/* Darker grey background for Employee No. and Employee Name columns in tbody */
#mainTable tbody tr td:first-child,
#mainTable tbody tr td:nth-child(2) {
    background-color:rgba(169, 169, 169, 0.24); /* Dark Grey */
}






</style>

            <!-- DTR Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
                    <h6 class="m-0 font-weight-bold text-orange">Compiled DTR Submission</h6>
                </div>
                    <div class="card-body">
                    
                    <div class="dashboard">
    
</div>
        



<div class="spinner-container" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
    <label for="dateRange" class="spinner-label">
        <i class="fas fa-calendar-alt"></i> Select Date Range:
    </label>
    
    <select id="dateRange" class="styled-select"></select>

 
    <!-- Button container to align buttons to the right -->
    <div style="display: flex; gap: 10px; margin-left: auto;">

        <!-- Search Bar with Icon -->
<div style="position: relative; display: flex; align-items: center;">
    <i class="fas fa-search" style="position: absolute; left: 12px; color: white; font-size: 14px;"></i>
    <input type="text" id="searchInput" class="styled-select" placeholder="Search Employee..."
        style="width: 180px; height: 38px; padding: 8px 8px 8px 35px; font-size: 14px; border: none; border-radius: 5px;
               outline: none; font-weight: normal; background-color: #6366F1; color: white; 
               box-shadow: none; transition: 0.2s;">
</div>

<!-- Apply styles for placeholder text -->
<style>
    #searchInput::placeholder {
        color: white;
        opacity: 1; /* Ensures visibility */
        font-weight: normal;
    }
</style>


        <button id="editBtn" class="btn btn-warning text-white">
            <i class="fas fa-edit"></i> Edit
        </button>
        <button id="exportBtn" class="btn btn-success">
            <i class="fas fa-file-export"></i> Export Excel
        </button>
    </div>
</div>


<script>
// Search function for filtering table rows
document.getElementById("searchInput").addEventListener("keyup", function () {
    let searchValue = this.value.toLowerCase();
    let tableRows = document.querySelectorAll("#mainTable tbody tr");

    tableRows.forEach(row => {
        let employeeNo = row.cells[0].querySelector("input").value.toLowerCase();
        let employeeName = row.cells[1].querySelector("input").value.toLowerCase();

        if (employeeNo.includes(searchValue) || employeeName.includes(searchValue)) {
            row.style.display = ""; // Show row
        } else {
            row.style.display = "none"; // Hide row
        }
    });
});
</script>


<!-- Confirmation Modal -->
<div class="modal fade" id="confirmSaveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Save</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to save changes?
            </div>
            <div class="modal-footer">
                <button id="cancelSaveBtn" type="button" class="btn btn-secondary" style="background-color: red; border-color: red;">Cancel</button>
                <button id="confirmSaveBtn" class="btn btn-success" style="background-color: green; border-color: green;">Yes, Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green; border-color: green">
                <h5 class="modal-title">Success</h5>
            </div>
            <div class="modal-body" style="text-align: center;">
                Changes have been successfully saved!
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="successOkBtn" type="button" class="btn btn-primary" style="background-color: green; border-color: green;">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("searchInput").addEventListener("keyup", function () {
    let searchValue = this.value.toLowerCase();

    // Select all table rows from mainTable and secondTable
    let mainRows = document.querySelectorAll("#mainTable tbody tr");
    let secondRows = document.querySelectorAll("#secondTable tbody tr");

    mainRows.forEach((row, index) => {
        let employeeNoInput = row.cells[0].querySelector("input");
        let employeeNameInput = row.cells[1]?.querySelector("input");

        let employeeNo = employeeNoInput ? employeeNoInput.value.toLowerCase() : "";
        let employeeName = employeeNameInput ? employeeNameInput.value.toLowerCase() : "";

        if (employeeNo.includes(searchValue) || employeeName.includes(searchValue)) {
            row.style.display = ""; // Show row in mainTable
            if (secondRows[index]) secondRows[index].style.display = ""; // Show corresponding row in secondTable
        } else {
            row.style.display = "none"; // Hide row in mainTable
            if (secondRows[index]) secondRows[index].style.display = "none"; // Hide corresponding row in secondTable
        }
    });
});
</script>




<!-- No Changes Detected Modal -->
<div class="modal fade" id="noChangesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: orange; border-color: orange;">
                <h5 class="modal-title">No Changes Detected</h5>
            </div>
            <div class="modal-body" style="text-align: center;">
                No changes were made. Please modify data before saving.
            </div>
        </div>
    </div>
</div>




<form id="dtrForm" method="POST">
    <div class="form-container">
        <table id="mainTable">
            <thead>
                <tr>
                    <th rowspan="2">Employee No.</th>
                    <th rowspan="2">Employee Name</th>
                    <th rowspan="2">General</th>
                    <th rowspan="2">Admin</th>
                    <th rowspan="2">Finance</th>
                    <th rowspan="2">Design</th>
                    <th colspan="6">Operations/Customer Service</th>
                    <th rowspan="2">Warranty</th>
                    <th rowspan="2">Billable Service</th>
                    <th rowspan="2">Upgrade</th>
                    <th rowspan="2">Pre-Sales Support</th>
                    <th rowspan="2">Special Project</th>
                    <th rowspan="2" style="color: yellow" >Total Hours</th>
                </tr>
                <tr>
                    <th>Board Repair</th>
                    <th>PM</th>
                    <th>Technical Support</th>
                    <th>Maintenance Support</th>
                    <th>Logistics & Comm.</th>
                    <th>CDT/Reports/Meetings</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="employeeNo"  readonly></td>
                    <td><input type="text" name="employeeName"  readonly></td>
                    
                    <td><input type="number" name="general" class="hourInput"></td>
                    <td><input type="number" name="admin" class="hourInput"></td>
                    <td><input type="number" name="finance" class="hourInput"></td>
                    <td><input type="number" name="design" class="hourInput"></td>
                    <td><input type="number" name="boardRepair" class="hourInput"></td>
                    <td><input type="number" name="pm" class="hourInput"></td>

                    <td><input type="number" name="technicalSupport" class="hourInput"></td>
                    <td><input type="number" name="maintenance" class="hourInput"></td>
                    <td><input type="number" name="logistics" class="hourInput"></td>
                    <td><input type="number" name="reports" class="hourInput"></td>

                    <td><input type="number" name="warranty" class="hourInput"></td>
                    <td><input type="number" name="billableService" class="hourInput"></td>
                    <td><input type="number" name="upgrade" class="hourInput"></td>
                    <td><input type="number" name="preSales" class="hourInput"></td>
                    <td><input type="number" name="specialProject" class="hourInput"></td>

                    <td><input type="number" id="totalHours" name="totalHours" class="total_hours"readonly></td>
                </tr>
            </tbody>
        </table>


        <table id="secondTable">
        <thead>
    <tr>
        <th rowspan="2">Weekend Support <span style="color: yellow">(Days)</span></th>
        <th rowspan="2">Regular Holiday Overtime <span style="color: yellow">(Hours)</span></th>
        <th rowspan="2">Special Holiday Overtime <span style="color: yellow">(Hours)</span></th>
        <th rowspan="2">Regular Overtime <span style="color: yellow">(Hours)</span></th>
        <th rowspan="2">Night Differential <span style="color: yellow">(Hours)</span></th>
        <th rowspan="2">Salary Deduction <span style="color: yellow">(Hours)</span></th>
        <th colspan="2">LEAVE CONVERSION</th>
    </tr>
    <tr>
        <th>VL <span style="color: yellow">(Hours)</span></th>
        <th>SL <span style="color: yellow">(Hours)</span></th>
    </tr>
</thead>

            <tbody>
                <tr>
                    <td><input type="number" name="weekendSupport" class="hourInput2"></td>
                    <td><input type="number" name="regularHolidayOvertime" class="hourInput2"></td>
                    <td><input type="number" name="specialHolidayOvertime" class="hourInput2"></td>
                    <td><input type="number" name="regularOvertime" class="hourInput2"></td>
                    <td><input type="number" name="nightDifferential" class="hourInput2"></td>
                    <td><input type="number" name="salaryDeduction" class="hourInput2"></td>
                    <td><input type="number" name="vlHours" class="hourInput2"></td>
                    <td><input type="number" name="slHours" class="hourInput2"></td>
                </tr>
            </tbody>
        </table>


        <input type="hidden" name="year" id="yearHidden">
        <input type="hidden" name="month" id="monthHidden">
        <input type="hidden" name="dayFrom" id="dayFromHidden">
        <input type="hidden" name="dayTo" id="dayToHidden">
        <input type="hidden" name="shift" id="shiftHidden">
    </div>

</div>

 </div>
 </div>
 </form>


    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        const currentDay = currentDate.getDate();
        const dateRangeSelect = document.getElementById("dateRange");

        function populateDateRanges() {
            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            dateRangeSelect.innerHTML = "";

            for (let month = 0; month < 12; month++) {
                const lastDay = new Date(currentYear, month + 1, 0).getDate();
                const firstHalf = `${months[month]} 1 - 15, ${currentYear}`;
                const secondHalf = `${months[month]} 16 - ${lastDay}, ${currentYear}`;

                let firstOption = new Option(firstHalf, `${currentYear}-${month + 1}-1:${currentYear}-${month + 1}-15`);
                let secondOption = new Option(secondHalf, `${currentYear}-${month + 1}-16:${currentYear}-${month + 1}-${lastDay}`);

                if (month === currentMonth) {
                    if (currentDay <= 15) firstOption.selected = true;
                    else secondOption.selected = true;
                }

                dateRangeSelect.appendChild(firstOption);
                dateRangeSelect.appendChild(secondOption);
            }
        }

        populateDateRanges();

        dateRangeSelect.addEventListener("change", function () {
            fetchDTRData(this.value);
        });

        function fetchDTRData(dateRange) {
            if (!dateRange || !dateRange.includes(":")) {
                console.error("Invalid date range format:", dateRange);
                return;
            }

            let [startDate, endDate] = dateRange.split(":");

            if (!startDate || !endDate) {
                console.error("Invalid startDate or endDate:", startDate, endDate);
                return;
            }

            let [year, monthIndex, dayFrom] = startDate.split("-");
            let [yearTo, monthIndexTo, dayTo] = endDate.split("-");

            // Convert month number to month name (to match DB format)
            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            let month = months[parseInt(monthIndex, 10) - 1]; // Example: "3" → "March"


            fetch("CRUD/fetch_compiled_dtr.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `year=${year}&month=${month}&dayFrom=${dayFrom}&dayTo=${dayTo}`
            })
            .then(response => response.json())
            .then(data => {
            
                updateTable(data);
            })
            .catch(error => console.error("Error fetching DTR data:", error));
        }

        function formatNumber(value) {
        let num = parseFloat(value);
        return Number.isInteger(num) ? num : num.toFixed(1);
    }

    function updateTable(data) {
        const tbody1 = document.querySelector("#mainTable tbody");
        const tbody2 = document.querySelector("#secondTable tbody");

        if (!tbody1 || !tbody2) {
            console.error("Table body not found.");
            return;
        }

        tbody1.innerHTML = "";
        tbody2.innerHTML = "";

        if (data.length === 0) {
            tbody1.innerHTML = `<tr><td colspan="18" style="text-align:center;">No records found.</td></tr>`;
            tbody2.innerHTML = `<tr><td colspan="8" style="text-align:center;">No records found.</td></tr>`;
            return;
        }

        data.forEach(entry => {
            let row1 = `<tr>
                <td><input type="text" name="employeeNo" value="${entry.employee_no}" readonly></td>
                <td><input type="text" name="employeeName" value="${entry.employee_name}" readonly></td>
                <td><input type="number" name="general" class="hourInput" value="${formatNumber(entry.general_field || 0)}"></td>
                <td><input type="number" name="admin" class="hourInput" value="${formatNumber(entry.admin_field || 0)}"></td>
                <td><input type="number" name="finance" class="hourInput" value="${formatNumber(entry.finance_field || 0)}"></td>
                <td><input type="number" name="design" class="hourInput" value="${formatNumber(entry.design_field || 0)}"></td>
                <td><input type="number" name="boardRepair" class="hourInput" value="${formatNumber(entry.board_repair || 0)}"></td>
                <td><input type="number" name="pm" class="hourInput" value="${formatNumber(entry.pm || 0)}"></td>
                <td><input type="number" name="technicalSupport" class="hourInput" value="${formatNumber(entry.tech_support || 0)}"></td>
                <td><input type="number" name="maintenance" class="hourInput" value="${formatNumber(entry.maint_support || 0)}"></td>
                <td><input type="number" name="logistics" class="hourInput" value="${formatNumber(entry.log_comm || 0)}"></td>
                <td><input type="number" name="reports" class="hourInput" value="${formatNumber(entry.report_meeting || 0)}"></td>
                <td><input type="number" name="warranty" class="hourInput" value="${formatNumber(entry.warranty || 0)}"></td>
                <td><input type="number" name="billableService" class="hourInput" value="${formatNumber(entry.bill_service || 0)}"></td>
                <td><input type="number" name="upgrade" class="hourInput" value="${formatNumber(entry.upgrades || 0)}"></td>
                <td><input type="number" name="preSales" class="hourInput" value="${formatNumber(entry.presales_supp || 0)}"></td>
                <td><input type="number" name="specialProject" class="hourInput" value="${formatNumber(entry.special_proj || 0)}"></td>
                <td><input type="number" name="totalHours" class=" "value="${formatNumber(entry.total_hours || 0)}" readonly></td>
            </tr>`;

            let row2 = `<tr>
                <td><input type="number" name="weekendSupport" class="hourInput2" value="${formatNumber(entry.weekends_supp || 0)}"></td>
                <td><input type="number" name="regularHolidayOvertime" class="hourInput2" value="${formatNumber(entry.regholiday_ot || 0)}"></td>
                <td><input type="number" name="specialHolidayOvertime" class="hourInput2" value="${formatNumber(entry.specholiday_ot || 0)}"></td>
                <td><input type="number" name="regularOvertime" class="hourInput2" value="${formatNumber(entry.reg_ot || 0)}"></td>
                <td><input type="number" name="nightDifferential" class="hourInput2" value="${formatNumber(entry.night_diff || 0)}"></td>
                <td><input type="number" name="salaryDeduction" class="hourInput2" value="${formatNumber(entry.salary_deduc || 0)}"></td>
                <td><input type="number" name="vlHours" class="hourInput2" value="${formatNumber(entry.vl || 0)}"></td>
                <td><input type="number" name="slHours" class="hourInput2" value="${formatNumber(entry.sl || 0)}"></td>
            </tr>`;

            tbody1.innerHTML += row1;
            tbody2.innerHTML += row2;
        });
    }



        fetchDTRData(dateRangeSelect.value);
    });

    function updateTotalHours() {
    document.querySelectorAll("#mainTable tbody tr").forEach(row => {
        const inputs = row.querySelectorAll(".hourInput");
        const totalHoursInput = row.querySelector("input[name='totalHours']");

        inputs.forEach(input => {
            input.addEventListener("input", () => {
                let total = 0;
                let hasDecimal = false;

                inputs.forEach(field => {
                    let value = field.value.trim();
                    if (value) {
                        let num = parseFloat(value) || 0;
                        if (!Number.isInteger(num)) {
                            hasDecimal = true;
                        }
                        total += num;
                    }
                });

                totalHoursInput.value = hasDecimal ? total.toFixed(1) : total;
            });
        });
    });
}

// Call the function after the table updates
document.addEventListener("DOMContentLoaded", () => {
    setTimeout(updateTotalHours, 500); 
});

    </script>




<style>
/* Default state: No border, read-only */
.hourInput, .hourInput2, .total_hours {
    border: none !important; /* Initially hidden border */
    background: transparent;
    outline: none;
    pointer-events: none;
    transition: border 0.2s ease-in-out;
}

.editable {
    border: 0.5px solid black !important;  
    background: rgba(255, 162, 162, 0.72) !important;  
    pointer-events: auto !important;  
    padding: 5px;
    border-radius: 4px;
    outline: none;
}


/* Table cells should allow borders */
td {
    border: 1px solid transparent !important; /* Ensure the cell has a default border */
}
input[type="number"], input[type="text"] {
    border: none !important; /* Remove !important */
    box-shadow: none;
    background: transparent;
}


/* Optional: Adjust padding to prevent empty space */
input {
    padding: 5px;
}

</style>


<!-- For edit and save button -->
<!-- Updated Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("editBtn");
    const exportBtn = document.getElementById("exportBtn");
    const cancelSaveBtn = document.getElementById("cancelSaveBtn");
    const successOkBtn = document.getElementById("successOkBtn");
    const noChangesOkBtn = document.getElementById("noChangesOkBtn");
    const confirmExportBtn = document.getElementById("confirmExportBtn");

    let isEditing = false;
    let editedRows = new Set();
    let originalValues = new Map();

    // Edit/Cancel button logic
    editBtn.addEventListener("click", function () {
        if (isEditing) {
            resetInputs();
            recalculateTotalHours();
        } else {
            document.querySelectorAll(".hourInput, .hourInput2, .total_hours").forEach(input => {
                originalValues.set(input, input.value);
            });
        }

        toggleEditingMode();
    });

    function toggleEditingMode() {
        isEditing = !isEditing;

        document.querySelectorAll(".hourInput, .hourInput2").forEach(input => {
            if (isEditing) {
                input.classList.add("editable");
                input.removeAttribute("readonly");
            } else {
                input.classList.remove("editable");
                input.setAttribute("readonly", "true");
            }
        });

        editBtn.innerHTML = isEditing ? '<i class="fas fa-times"></i> Cancel' : '<i class="fas fa-edit"></i> Edit';
        editBtn.classList.toggle("btn-danger", isEditing);
        editBtn.classList.toggle("btn-warning", !isEditing);

        exportBtn.innerHTML = isEditing ? '<i class="fas fa-save"></i> Save' : '<i class="fas fa-file-export"></i> Export';
    }

    function resetInputs() {
        document.querySelectorAll(".hourInput, .hourInput2").forEach(input => {
            if (originalValues.has(input)) {
                input.value = originalValues.get(input);
                input.dispatchEvent(new Event("input")); 
            }
        });

        originalValues.clear();
        editedRows.clear();
    }

    document.querySelectorAll("#mainTable tbody, #secondTable tbody").forEach(tbody => {
        tbody.addEventListener("input", function (event) {
            let input = event.target;
            if (input.classList.contains("hourInput") || input.classList.contains("hourInput2")) {
                let row = input.closest("tr");
                if (row) {
                    editedRows.add(row);
                }
                recalculateTotalHours();
            }
        });
    });

    function recalculateTotalHours() {
        document.querySelectorAll("tr").forEach(row => {
            let hourInputs = row.querySelectorAll(".hourInput, .hourInput2");
            let totalHoursField = row.querySelector(".total_hours");

            if (totalHoursField) {
                let total = 0;
                hourInputs.forEach(input => {
                    total += parseFloat(input.value) || 0;
                });
                totalHoursField.value = total.toFixed(2);
            }
        });
    }

    // **Save Button Functionality (Handles Saving Edited Data)**
    exportBtn.addEventListener("click", function () {
        if (isEditing) {
            if (editedRows.size > 0) {
                let data = [];
                const mainRows = document.querySelectorAll('#mainTable tbody tr');
                const secondRows = document.querySelectorAll('#secondTable tbody tr');

                const editedIndices = new Set();
                editedRows.forEach(row => {
                    const tbody = row.closest('tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr'));
                    const index = rows.indexOf(row);
                    editedIndices.add(index);
                });

                editedIndices.forEach(index => {
                    const mainRow = mainRows[index];
                    const secondRow = secondRows[index];

                    if (!mainRow || !secondRow) {
                        console.error("Mismatched rows for index:", index);
                        return;
                    }

                    const employeeNoInput = mainRow.querySelector("input[name='employeeNo']");
                    const employeeNameInput = mainRow.querySelector("input[name='employeeName']");

                    if (!employeeNoInput || !employeeNameInput) {
                        alert("Error: Employee details not found for row index " + index);
                        return;
                    }

                    const employeeNo = employeeNoInput.value.trim();
                    const employeeName = employeeNameInput.value.trim();

                    if (employeeNo === "" || employeeName === "") {
                        alert("Error: Employee details are empty for row index " + index);
                        return;
                    }

                    let rowData = { employeeNo, employeeName };

                    mainRow.querySelectorAll('input').forEach(input => {
                        if (!['employeeNo', 'employeeName'].includes(input.name)) {
                            rowData[input.name] = input.value.trim() || "0";
                        }
                    });

                    secondRow.querySelectorAll('input').forEach(input => {
                        rowData[input.name] = input.value.trim() || "0";
                    });

                    data.push(rowData);
                });

                if (data.length === 0) {
                    new bootstrap.Modal(document.getElementById("noChangesModal")).show();
                    return;
                }

                let confirmModal = new bootstrap.Modal(document.getElementById("confirmSaveModal"));
                confirmModal.show();

                document.getElementById("confirmSaveBtn").addEventListener("click", function onConfirm() {
                    confirmModal.hide();
                    fetch("CRUD/submit_edit_dtr.php", {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: { "Content-Type": "application/json" }
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            new bootstrap.Modal(document.getElementById("successModal")).show();
                            isEditing = false;
                            toggleEditingMode();
                            editedRows.clear();
                        } else {
                            alert("Error: " + result.error);
                        }
                    })
                    .catch(error => console.error("Error:", error));
                }, { once: true });

            } else {
                new bootstrap.Modal(document.getElementById("noChangesModal")).show();
            }
        } else {
            // **Show Confirm Export Modal when NOT in Editing Mode**
            let confirmExportModal = new bootstrap.Modal(document.getElementById("confirmExportModal"));
            confirmExportModal.show();
        }
    });

    // **Proceed with Export after Confirmation**
   // Handle Export Confirmation
   document.getElementById("confirmExportBtn").addEventListener("click", function () {
    $("#confirmExportModal").modal("hide");

    // Get the selected date range
    const dateRangeSelect = document.getElementById("dateRange");
    const selectedDateRange = dateRangeSelect.value;

    setTimeout(function () {
        $("#successExportModal").modal("show");
    }, 500);

    setTimeout(function () {
        window.location.href = `export_compiledDTR.php?dateRange=${encodeURIComponent(selectedDateRange)}`;
    }, 500);
});


// Handle Success Export "OK" button click
document.getElementById("exportSuccessOkBtn").addEventListener("click", function () {
    $("#successExportModal").modal("hide"); // Close success modal when "OK" is clicked
});


    cancelSaveBtn.addEventListener("click", function () {
        resetInputs();
        recalculateTotalHours();
        isEditing = false;
        toggleEditingMode();
        location.reload();
    });

    successOkBtn.addEventListener("click", function () {
        document.getElementById("dtrForm").reset();
    });
});


    </script>


<!-- Confirm Export Modal -->
<div class="modal fade" id="confirmExportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green">
                <h5 class="modal-title">Confirm Export</h5>
            </div>
            <div class="modal-body" style="text-align: center;">
                Are you sure you want to export the data into an Excel file?
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="cancelExportBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: red">Cancel</button>
                <button id="confirmExportBtn" class="btn btn-success" style="background-color: green; border-color:green">Yes, Export</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Export Modal -->
<div class="modal fade" id="successExportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green; border-color: green">
                <h5 class="modal-title">Export Successful</h5>
            </div>
            <div class="modal-body" style="text-align: center;">
                The data has been successfully exported!
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="exportSuccessOkBtn" type="button" class="btn btn-primary" style="background-color: green; border-color: green;">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Refresh the page when clicking "Cancel" in the Confirm Export modal
    document.getElementById("cancelExportBtn").addEventListener("click", function () {
        location.reload(); // Refresh the page
    });

    

    // Refresh the page when clicking "OK" in the Success Export modal
    document.getElementById("exportSuccessOkBtn").addEventListener("click", function () {
        location.reload(); // Refresh the page
    });
});
</script>








  
            
                <div class="card shadow mb-4">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-orange">Employee Submission</h6>
                </div>

                                <div class="table-responsive">
                                <div class="mt-3 d-flex justify-content-between align-items-center" style="margin-left: 20px; margin-right: 20px; ">
    <strong id="submissionCount2">0 employees have submitted</strong>

    <!-- Search Bar with Icon -->
    <div style="position: relative; display: flex; align-items: center;">
        <i class="fas fa-search" style="position: absolute; left: 12px; color: white; font-size: 14px;"></i>
        <input type="text" id="searchInput2" class="styled-select" placeholder="Search Employee..."
            style="width: 180px; height: 38px; padding: 8px 8px 8px 35px; font-size: 14px; border: none; border-radius: 5px;
                   outline: none; font-weight: normal; background-color: #6366F1; color: white; 
                   box-shadow: none; transition: 0.2s;">
    </div>
</div>

                            <table class="table table-bordered" id="dtrTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Employee No.</th>
                                    <th>Employee Name</th>
                                    <th>Status</th>
                                    <th>Submission Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="dtrTableBody">
                                <!-- Data will be inserted here dynamically -->
                            </tbody>
                        </table>
                       

                            </div>

                            <style>
                                .dataTables_info {
                                    display: none;
                                }
                                .dataTables_filter {
                                    display: none;
                                }
                                th {
                                    pointer-events: none; /* Disables click sorting */
                                    background-image: none !important; /* Removes arrow icons */
                                }
                                th.sorting:before,
                                th.sorting:after,
                                th.sorting_asc:before,
                                th.sorting_asc:after,
                                th.sorting_desc:before,
                                th.sorting_desc:after {
                                    display: none !important;
                                }

                                #searchInput2::placeholder {
    color: white;
    opacity: 1; /* Ensures full color visibility */
}


                            </style>

                            <!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this submission?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: green; border-color: green">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete" style="background-color: red">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById("confirmDelete").addEventListener("click", function() {
    location.reload(); // Refresh the page
});
</script>

<!-- Success Modal -->
<div class="modal fade" id="successModald" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red; border-color: red">
                <h5 class="modal-title" >Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Submission deleted successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="successOkButton" data-dismiss="modal" style="background-color: red; border-color: red">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Refresh Page on OK Click -->
<script>
document.getElementById("successOkBtn").addEventListener("click", function() {
    location.reload();
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput2");
    const deleteModal = new bootstrap.Modal(document.getElementById("deleteConfirmationModal"));
    const successModal = new bootstrap.Modal(document.getElementById("successModald"));
    let deleteEmpNo = null;

    searchInput.addEventListener("keyup", function () {
        let filter = searchInput.value.toLowerCase();
        document.querySelectorAll("#dtrTableBody tr").forEach(row => {
            let empName = row.cells[1].textContent.toLowerCase();
            row.style.display = empName.includes(filter) ? "" : "none";
        });
    });

    document.querySelector("#dtrTableBody").addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-btn")) {
            deleteEmpNo = event.target.getAttribute("data-employee");
            deleteModal.show();
        }
    });

    document.getElementById("confirmDelete").addEventListener("click", function () {
        if (deleteEmpNo) {
            fetch("CRUD/delete_dtr.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `employee_no=${deleteEmpNo}`
            })
            .then(response => response.text())
            .then(() => {
                deleteModal.hide();
                successModal.show();
            })
            .catch(error => console.error("Error deleting submission:", error));
        }
    });

    
});

</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dateRangeSelect = document.getElementById("dateRange");
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        const currentDay = currentDate.getDate();
        const searchInput = document.getElementById("searchInput");

        function populateDateRanges() {
            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            dateRangeSelect.innerHTML = "";

            for (let month = 0; month < 12; month++) {
                const lastDay = new Date(currentYear, month + 1, 0).getDate();
                const firstHalf = `${months[month]} 1 - 15, ${currentYear}`;
                const secondHalf = `${months[month]} 16 - ${lastDay}, ${currentYear}`;

                let firstOption = new Option(firstHalf, `${currentYear}-${month + 1}-1:${currentYear}-${month + 1}-15`);
                let secondOption = new Option(secondHalf, `${currentYear}-${month + 1}-16:${currentYear}-${month + 1}-${lastDay}`);

                if (month === currentMonth) {
                    if (currentDay <= 15) firstOption.selected = true;
                    else secondOption.selected = true;
                }

                dateRangeSelect.appendChild(firstOption);
                dateRangeSelect.appendChild(secondOption);
            }
        }

        populateDateRanges();

        dateRangeSelect.addEventListener("change", function () {
            fetchDTRData(this.value);
        });

        function fetchDTRData(dateRange) {
            if (!dateRange || !dateRange.includes(":")) {
                console.error("Invalid date range format:", dateRange);
                return;
            }

            let [startDate, endDate] = dateRange.split(":");

            fetch("CRUD/get_dtr_stat.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `startDate=${startDate}&endDate=${endDate}`
            })
            .then(response => response.json())
            .then(data => {
                updateTable(data);
            })
            .catch(error => { 
                console.error("Error fetching DTR data:", error);
            });
        }

        function updateTable(data) {
    const tbody = document.getElementById("dtrTableBody");
    const submissionCountElement = document.getElementById("submissionCount2");

    tbody.innerHTML = "";

    if (data.length === 0) {
        tbody.innerHTML = `<tr><td colspan="5" style="text-align:center;">No records found.</td></tr>`;
        submissionCountElement.innerHTML = `<span style="color: red;">0/0</span> employees have submitted`;
        return;
    }

    // Sort: Latest submission dates first, then "Not Submitted" at the bottom
    data.sort((a, b) => {
        let dateA = a.sub_date ? new Date(a.sub_date) : 0;
        let dateB = b.sub_date ? new Date(b.sub_date) : 0;
        return dateB - dateA; // Sort in descending order (latest first)
    });

    let totalEmployees = data.length;
    let submittedCount = 0;

    data.forEach(row => {
        let status, actionButton = "", deleteButton = "";

        if (row.sub_date) {
            submittedCount++;
            status = '<span class="text-success font-weight-bold">Submitted</span>';
            actionButton = `<button class="btn btn-info btn-sm view-btn" data-name="${row.name}">Search</button>`;
            deleteButton = `<button class="btn btn-danger btn-sm delete-btn" data-employee="${row.employee_no}">Delete</button>`;
        } else {
            status = '<span class="text-danger font-weight-bold">Not Submitted</span>';
        }

        let formattedDate = row.sub_date
            ? new Date(row.sub_date).toLocaleString("en-US", {
                  year: "numeric",
                  month: "2-digit",
                  day: "2-digit",
                  hour: "2-digit",
                  minute: "2-digit",
                  hour12: true
              })
            : "N/A";

        let tr = `<tr>
            <td>${row.employee_no}</td>
            <td>${row.name}</td>
            <td>${status}</td>
            <td>${formattedDate}</td>
            <td>${actionButton} ${deleteButton}</td>
        </tr>`;
        tbody.innerHTML += tr;
    });

    let numberColor = submittedCount === totalEmployees ? "green" : "red";
    submissionCountElement.innerHTML = `<span style="color: ${numberColor};">${submittedCount}/${totalEmployees}</span> employees have submitted`;

    document.querySelectorAll(".view-btn").forEach(button => {
        button.addEventListener("click", function () {
            let empName = this.getAttribute("data-name");
            searchInput.value = empName;
            searchInput.focus();
            searchInput.scrollIntoView({ behavior: "smooth", block: "center" });
        });
    });
}



        fetchDTRData(dateRangeSelect.value);
    });
</script>

    

                        </div>

                        
                    </div>

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
                                            <input type="text" class="form-control" style="border-color: grey" id="adminUsername" name="adminUsername" required>
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
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style=" background-color: #858796; border-color: #858796">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="updateAdminAccount()"style="background-color: green; border-color: green" >Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" style="background-color: #858796; border-color: #858796">Cancel</button>
                    <a class="btn btn-primary" href="logout_admin.php" style="background-color: red; border-color: red">Logout</a>
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

        

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

        <!-- Custom JavaScript for Edit/Save functionality -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const editButtons = document.querySelectorAll('.edit-btn');

                editButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const cells = row.querySelectorAll('td');
                        const isEditing = row.getAttribute('data-editing') === 'true';

                        if (isEditing) {
                            // Save logic
                            let hasChanges = false;
                            cells.forEach(cell => {
                                if (cell.getAttribute('contenteditable') === 'true') {
                                    cell.setAttribute('contenteditable', 'false');
                                    if (cell.textContent !== cell.getAttribute('data-original')) {
                                        hasChanges = true;
                                    }
                                }
                            });

                            if (hasChanges) {
                                // Show success modal
                                $('#successModal').modal('show');
                            }

                            // Change button back to Edit
                            this.innerHTML = '<i class="fas fa-edit"></i> Edit';
                            this.classList.remove('btn-warning');
                            this.classList.add('btn-success');
                            row.setAttribute('data-editing', 'false');
                        } else {
                            // Edit logic
                            cells.forEach(cell => {
                                if (cell !== cells[cells.length - 1] && cell !== cells[cells.length - 2]) {
                                    cell.setAttribute('contenteditable', 'true');
                                    cell.setAttribute('data-original', cell.textContent);
                                }
                            });

                            // Change button to Save
                            this.innerHTML = '<i class="fas fa-save"></i> Save';
                            this.classList.remove('btn-success');
                            this.classList.add('btn-warning');
                            row.setAttribute('data-editing', 'true');
                        }
                    });
                });
            });

            // Function to handle "View" button click
            document.addEventListener("DOMContentLoaded", function () {
                const viewButtons = document.querySelectorAll('.view-btn');
                viewButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        // Get the row data
                        const row = this.closest('tr');
                        const empNo = row.cells[0].textContent;
                        const empName = row.cells[1].textContent;
                        const status = row.cells[2].textContent;
                        const submissionDate = row.cells[3].textContent;

                        // Fetch additional data (replace with actual data fetching logic)
                        const additionalData = {
                            Category: "Category Data",
                            General: "General Data",
                            Admin: "Admin Data",
                            Finance: "Finance Data",
                            Design: "Design Data",
                            BoardRepair: "Board Repair Data",
                            PM: "PM Data",
                            TechnicalSupport: "Technical Support Data",
                            MaintenanceSupport: "Maintenance Support Data",
                            LogisticsComm: "Logistics & Comm. Data",
                            CDTReportsMeetings: "CDT/Reports/Meetings Data",
                            Warranty: "Warranty Data",
                            BillableService: "Billable Service Data",
                            Upgrade: "Upgrade Data",
                            PreSalesSupport: "Pre-Sales Support Data",
                            SpecialProject: "Special Project Data",
                            TotalHours: "Total Hours Data",
                            RegularHolidayOT: "Regular Holiday OT Data",
                            SpecialHolidayOT: "Special Holiday OT Data",
                            RegularOT: "Regular OT Data",
                            NightDiffOT: "Night Diff OT Data",
                            SalaryDeduction: "Salary Deduction Data",
                            LeaveConversion: "Leave Conversion Data",
                            LeaveBalances: "Leave Balances Data"
                        };

                        // Populate the modal with the data
                        document.getElementById('viewEmpNo').textContent = empNo;
                        document.getElementById('viewEmpName').textContent = empName;
                        document.getElementById('viewCategory').textContent = additionalData.Category;
                        document.getElementById('viewGeneral').textContent = additionalData.General;
                        document.getElementById('viewAdmin').textContent = additionalData.Admin;
                        document.getElementById('viewFinance').textContent = additionalData.Finance;
                        document.getElementById('viewDesign').textContent = additionalData.Design;
                        document.getElementById('viewBoardRepair').textContent = additionalData.BoardRepair;
                        document.getElementById('viewPM').textContent = additionalData.PM;
                        document.getElementById('viewTechnicalSupport').textContent = additionalData.TechnicalSupport;
                        document.getElementById('viewMaintenanceSupport').textContent = additionalData.MaintenanceSupport;
                        document.getElementById('viewLogisticsComm').textContent = additionalData.LogisticsComm;
                        document.getElementById('viewCDTReportsMeetings').textContent = additionalData.CDTReportsMeetings;
                        document.getElementById('viewWarranty').textContent = additionalData.Warranty;
                        document.getElementById('viewBillableService').textContent = additionalData.BillableService;
                        document.getElementById('viewUpgrade').textContent = additionalData.Upgrade;
                        document.getElementById('viewPreSalesSupport').textContent = additionalData.PreSalesSupport;
                        document.getElementById('viewSpecialProject').textContent = additionalData.SpecialProject;
                        document.getElementById('viewTotalHours').textContent = additionalData.TotalHours;
                        document.getElementById('viewRegularHolidayOT').textContent = additionalData.RegularHolidayOT;
                        document.getElementById('viewSpecialHolidayOT').textContent = additionalData.SpecialHolidayOT;
                        document.getElementById('viewRegularOT').textContent = additionalData.RegularOT;
                        document.getElementById('viewNightDiffOT').textContent = additionalData.NightDiffOT;
                        document.getElementById('viewSalaryDeduction').textContent = additionalData.SalaryDeduction;
                        document.getElementById('viewLeaveConversion').textContent = additionalData.LeaveConversion;
                        document.getElementById('viewLeaveBalances').textContent = additionalData.LeaveBalances;
                        document.getElementById('viewStatus').textContent = status;

                        // Show the modal
                        $('#viewDataModal').modal('show');
                    });
                });
            });

            $(document).ready(function() {
        // Initialize DataTables for the first table
        $('#dtrTable').DataTable({
            "paging": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10,
            "dom": 'lftip'
        });

        // Initialize DataTables for the second table
        $('#dtrTable2').DataTable({
            "paging": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10,
            "dom": 'lftip'
        });
    });
        </script>



    </body>
</html>
        