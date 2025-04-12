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
    <title>AEHR - H.R. System - Leave Monitoring</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- In Leave.php head section -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <style>
/* Add this to your existing style section */
.btn-group {
    display: flex;
    gap: 5px;
}

.btn-edit {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    white-space: nowrap;
}
.btn-reset {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    white-space: nowrap;
}

.btn-reset:hover {
    background-color: #c82333;
}

.btn-edit:hover {
    background-color: #218838;
}


.btn-edit i, .btn-reset i {
    margin-right: 5px;
}
        /* Reset Leave Radio Inputs */
.radio-inputs {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 350px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin: 20px auto;
}

.radio-inputs > * {
    margin: 6px;
}

.radio-input:checked + .radio-tile {
    border-color: #dc3545;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    color: #dc3545;
}

.radio-input:checked + .radio-tile:before {
    transform: scale(1);
    opacity: 1;
    background-color: #dc3545;
    border-color: #dc3545;
}

.radio-input:checked + .radio-tile .radio-icon svg {
    fill: #dc3545;
    stroke: #dc3545;
}

.radio-input:checked + .radio-tile .radio-label {
    color: #dc3545;
}

.radio-input:focus + .radio-tile {
    border-color: #dc3545;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px rgba(220, 53, 69, 0.2);
}

.radio-input:focus + .radio-tile:before {
    transform: scale(1);
    opacity: 1;
}

.radio-tile {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 80px;
    min-height: 80px;
    border-radius: 0.5rem;
    border: 2px solid #b5bfd9;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    transition: 0.15s ease;
    cursor: pointer;
    position: relative;
}

.radio-tile:before {
    content: "";
    position: absolute;
    display: block;
    width: 0.75rem;
    height: 0.75rem;
    border: 2px solid #b5bfd9;
    background-color: #fff;
    border-radius: 50%;
    top: 0.25rem;
    left: 0.25rem;
    opacity: 0;
    transform: scale(0);
    transition: 0.25s ease;
}

.radio-tile:hover {
    border-color: #dc3545;
}

.radio-tile:hover:before {
    transform: scale(1);
    opacity: 1;
}

.radio-icon svg {
    width: 2rem;
    height: 2rem;
    fill: #494949;
    stroke: #494949;
}

.radio-label {
    color: #707070;
    transition: 0.375s ease;
    text-align: center;
    font-size: 13px;
}

.radio-input {
    clip: rect(0 0 0 0);
    -webkit-clip-path: inset(100%);
    clip-path: inset(100%);
    height: 1px;
    overflow: hidden;
    position: absolute;
    white-space: nowrap;
    width: 1px;
}
/* Add this to your existing style section */
.radio-icon i {
    color: #495057;
    transition: all 0.3s ease;
}

.radio-input:checked + .radio-tile .radio-icon i {
    color: #dc3545;
}

.radio-tile:hover .radio-icon i {
    color: #dc3545;
}

.radio-label {
    font-size: 14px;
    font-weight: 500;
    margin-top: 8px;
}

        /* In Leave.php style section */
body {
    font-family: 'Poppins', sans-serif;
}
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            background-color: #FE5A1D;
            color: white;
        }
        .modal-footer {
            border-top: none;
        }
        .btn-save {
            background-color: #28a745;
            color: white;
        }
        .btn-save:hover {
            background-color: #218c3b;
        }
.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #28a745;
    color: white;
    padding: 15px 20px;
    border-radius: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    z-index: 1000;
}

        
        .sidebar {
            background-color: #FE5A1D !important;
            background-image: none !important;
            padding-top: 5px;
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

        .modal-footer {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Custom styles for the table header */
        #leaveTable thead th {
            background-color: #FE5A1D;
            color: white;
        }

        /* Custom styles for the "Employee Leave Balances" text */
        .card-header h6 {
            color: #FE5A1D;
        }

        /* Custom styles for the "Generate Report" button */
        .btn-primary {
            background-color: #FE5A1D;
            border-color: #FE5A1D;
        }

        .btn-primary:hover {
            background-color: #db4104;
            border-color: #db4104;
        }

        /* Additional UI improvements */
        .card {
            border: 1px solidrgb(0, 0, 0);
            border-radius: 10px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solidrgb(0, 0, 0);
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .table-bordered {
            border: 1px solidrgb(0, 0, 0);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solidrgb(0, 0, 0);
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
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

            <!-- Nav Item - DTR -->
            <li class="nav-item">
                <a class="nav-link" href="DTR.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>DTR Submission</span>
                </a>
            </li>

            <!-- Nav Item - Bills -->
            <li class="nav-item">
                <a class="nav-link" href="Bills.php">
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
                <a class="nav-link text-white font-weight-bold" href="Leave.php" style="background-color: #db4104; border-radius: 5px;">
                    <i class="fas fa-fw fa-chart-area text-white font-weight-bold"></i>
                    <span>Leave Monitoring</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>

            <!-- Nav Item - Employee Management -->
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
                        <h1 class="h3 mb-0 text-gray-800">Leave Monitoring</h1>
                        
                    </div>

                    <style>
    /* Hide the search bar */
.dataTables_filter {
    display: none !important;
}

/* Hide "Showing X to Y of Z entries" label */
.dataTables_info {
    display: none !important;
}

/* Disable sorting and remove arrows */
.dataTables_wrapper .dataTables_scrollHead th,
table.dataTable thead th {
    pointer-events: none !important;
    background-image: none !important;
    cursor: default !important;
    position: relative;
}

/* Force remove sorting arrows */
table.dataTable thead th::after,
table.dataTable thead th::before {
    display: none !important;
    content: "" !important;
}

</style>


<style>
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
    #searchLeave::placeholder {
        color: white;
        opacity: 1; /* Ensures visibility */
        font-weight: normal;
    }
</style>


                    <!-- Leave Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Employee Leave Balances</h6>
                        </div>

                        <div class="card-body">

<div class="row mb-3 align-items-center">
    <div class="col-md-8" style="position: relative; display: flex; align-items: center;">
        <i class="fas fa-search" style="position: absolute; left: 25px; color: white; font-size: 14px;"></i>
        <input type="text" id="searchLeave" class="styled-select" placeholder="Search Employee..."
            style="width: 100%; max-width: 300px; height: 38px; padding: 8px 8px 8px 35px; font-size: 14px; 
                   border: none; border-radius: 5px; outline: none; font-weight: normal; 
                   background-color: #6366F1; color: white; box-shadow: none; transition: 0.2s;">
    </div>

    <div class="col-md-4 text-right" style="display: flex; gap: 10px; justify-content: flex-end;">
        <button id="resetAllButton" class="btn btn-danger">
            <i class="fas fa-undo"></i> Reset All
        </button>
        <button id="incrementButton" class="btn btn-success">
            <i class="fas fa-plus"></i> Increment Balance
        </button>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Increment</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to increment all employee leave balances?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="confirmIncrement">Yes, Increment</button>
            </div>
        </div>
    </div>
</div>

<!-- Reset All Confirmation Modal -->
<div class="modal fade" id="resetAllModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset All Leave Balances</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reset ALL employee leave balances?</p>
                <div class="radio-inputs">
                    <label>
                        <input class="radio-input" type="radio" name="resetAllType" value="VL">
                        <span class="radio-tile">
                            <span class="radio-icon">
                                <i class="fas fa-umbrella-beach" style="font-size: 1.5rem;"></i>
                            </span>
                            <span class="radio-label">Vacation Leave</span>
                        </span>
                    </label>
                    <label>
                        <input class="radio-input" type="radio" name="resetAllType" value="SL">
                        <span class="radio-tile">
                            <span class="radio-icon">
                                <i class="fas fa-procedures" style="font-size: 1.5rem;"></i>
                            </span>
                            <span class="radio-label">Sick Leave</span>
                        </span>
                    </label>
                    <label>
                        <input class="radio-input" type="radio" name="resetAllType" value="BOTH" checked>
                        <span class="radio-tile">
                            <span class="radio-icon">
                                <i class="fas fa-sync-alt" style="font-size: 1.5rem;"></i>
                            </span>
                            <span class="radio-label">Both</span>
                        </span>
                    </label>
                </div>
                <p class="text-danger mt-3"><strong>Warning:</strong> This action cannot be undone!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmResetAll">Reset All</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Leave balances updated successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="refreshPage"data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("incrementButton").addEventListener("click", function () {
    $("#confirmModal").modal("show");
});

document.getElementById("confirmIncrement").addEventListener("click", function () {
    fetch("CRUD/increase_leave.php", {
        method: "POST",
    })
    .then(response => response.json())
    .then(data => {
        $("#confirmModal").modal("hide"); // Close confirmation modal
        if (data.status) {
            $("#successModal").modal("show"); // Show success modal
        } else {
            alert("Error: " + data.message); // Show error if something fails
        }
    })
    .catch(error => console.error("Error:", error));
});

// Reset All functionality
document.getElementById("resetAllButton").addEventListener("click", function() {
    $("#resetAllModal").modal("show");
});

document.getElementById("confirmResetAll").addEventListener("click", function() {
    let resetType = $('input[name="resetAllType"]:checked').val();
    
    // Show loading state
    $(this).html('<i class="fas fa-spinner fa-spin"></i> Resetting...');
    $(this).prop('disabled', true);
    
    fetch("CRUD/reset_all_leave.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "reset_type=" + encodeURIComponent(resetType)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            $("#resetAllModal").modal("hide");
            // Show success popup and refresh
            let popup = $('<div class="popup">All leave balances reset successfully! Refreshing...</div>');
            $('body').append(popup);
            popup.fadeIn().delay(1000).fadeOut(function() {
                $(this).remove();
                location.reload();
            });
        } else {
            // Show the actual error message from the server
            alert("Error: " + data.message);
            $("#resetAllModal").modal("hide");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred: " + error.message);
    })
    .finally(() => {
        // Reset button state
        $('#confirmResetAll').html('Reset All');
        $('#confirmResetAll').prop('disabled', false);
    });
});

// Refresh the page when clicking "OK" in the success modal
document.getElementById("refreshPage").addEventListener("click", function () {
    location.reload(); // Refresh the page after clicking OK
});
</script>

    <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
        <table class="table table-bordered" id="leaveTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Employee No.</th>
                    <th>Employee Name</th>
                    <th>Vacation Leave (VL)</th>
                    <th>Sick Leave (SL)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="leaveTableBody">
                <!-- Data will be loaded here via AJAX -->
            </tbody>
        </table>
    </div>
</div>


                    </div>
                </div>

                

                <script>
                    $(document).ready(function() {
    $('#searchLeave').on('keyup', function() {
        let value = $(this).val().toLowerCase();
        $('#leaveTableBody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

                </script>

<script>
$(document).ready(function() {
    function loadLeaveData() {
        $.ajax({
            url: 'CRUD/fetch_leave_data.php',
            type: 'GET',
            dataType: 'json', // Ensure response is JSON
            success: function(response) {
                let uniqueEmployees = new Set(); // Track unique employee numbers
                let tableContent = ""; // Store table rows before inserting

                response.forEach(function(item) {
                    if (!uniqueEmployees.has(item.employee_no)) {
                        uniqueEmployees.add(item.employee_no); // Mark employee as seen

                        tableContent += `
                            <tr>
                                <td>${item.employee_no}</td>
                                <td>${item.employee_name}</td>
                                <td>${item.vl_balance}</td>
                                <td>${item.sl_balance}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary btn-edit"
                                        data-employee="${item.employee_no}"
                                        data-vl="${item.vl_balance}"
                                        data-sl="${item.sl_balance}">Edit</button>
                                </td>
                            </tr>
                        `;
                    }
                });

                $('#leaveTableBody').html(tableContent); // Populate table after filtering
            },
            error: function() {
                $('#leaveTableBody').html('<tr><td colspan="5" class="text-center">Error loading data</td></tr>');
            }
        });
    }

    loadLeaveData(); // Load data on page load

    // Handle edit button click
    $(document).on('click', '.btn-edit', function() {
        let employeeNo = $(this).data('employee');
        let vlBal = $(this).data('vl');
        let slBal = $(this).data('sl');

        $('#editEmployeeNo').val(employeeNo);
        $('#editVL').val(vlBal);
        $('#editSL').val(slBal);
        $('#editLeaveModal').modal('show');
    });
});
</script>

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

       <!-- Edit Leave Modal -->
<div class="modal fade" id="editLeaveModal" tabindex="-1" role="dialog" aria-labelledby="editLeaveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLeaveModalLabel">Edit Leave Balances</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editLeaveForm">
                    <input type="hidden" id="editEmployeeNo" name="employee_no">
                    <div class="form-group">
                        <label for="editVL">Vacation Leave (VL)</label>
                        <input type="number" class="form-control" id="editVL" name="vlBalance" required>
                    </div>
                    <div class="form-group">
                        <label for="editSL">Sick Leave (SL)</label>
                        <input type="number" class="form-control" id="editSL" name="slBalance" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red; border-color:red">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveLeaveChanges" style="background-color: green; border-color:green">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Reset Leave Modal -->
<div class="modal fade" id="resetLeaveModal" tabindex="-1" role="dialog" aria-labelledby="resetLeaveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetLeaveModalLabel">Reset Leave Balances</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="resetEmployeeNo">
                <p>Select which leave balances to reset:</p>
                <div class="radio-inputs">
                    <label>
                        <input class="radio-input" type="radio" name="resetType" value="VL">
                        <span class="radio-tile">
                            <span class="radio-icon">
                                <i class="fas fa-umbrella-beach" style="font-size: 1.5rem;"></i>
                            </span>
                            <span class="radio-label">Vacation Leave</span>
                        </span>
                    </label>
                    <label>
                        <input class="radio-input" type="radio" name="resetType" value="SL">
                        <span class="radio-tile">
                            <span class="radio-icon">
                                <i class="fas fa-procedures" style="font-size: 1.5rem;"></i>
                            </span>
                            <span class="radio-label">Sick Leave</span>
                        </span>
                    </label>
                    <label>
                        <input class="radio-input" type="radio" name="resetType" value="BOTH" checked>
                        <span class="radio-tile">
                            <span class="radio-icon">
                                <i class="fas fa-sync-alt" style="font-size: 1.5rem;"></i>
                            </span>
                            <span class="radio-label">Both</span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #6c757d; border-color: #6c757d">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmReset" style="background-color: #dc3545; border-color: #dc3545">Reset</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    function loadLeaveData() {
        $.ajax({
            url: 'CRUD/fetch_leave_data.php',
            type: 'GET',
            success: function(response) {
                $('#leaveTableBody').html(response); // Populate table body
            },
            error: function() {
                $('#leaveTableBody').html('<tr><td colspan="5" class="text-center">Error loading data</td></tr>');
            }
        });
    }

    loadLeaveData(); // Call function on page load

    // Handle edit button click
    $(document).on('click', '.btn-edit', function() {
        let employeeNo = $(this).data('employee');
        let vlBal = $(this).data('vl');
        let slBal = $(this).data('sl');

        $('#editEmployeeNo').val(employeeNo);
        $('#editVL').val(vlBal);
        $('#editSL').val(slBal);
        $('#editLeaveModal').modal('show');
    });

    // Handle save changes button
    $('#saveLeaveChanges').click(function() {
        let formData = $('#editLeaveForm').serialize(); // Serialize form data

        $.ajax({
            url: 'CRUD/edit_leave.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.trim() === "success") {
                    $('#editLeaveModal').modal('hide'); // Close edit modal
                    $('#successModal').modal('show'); // Show success modal
                    loadLeaveData(); // Reload leave data
                } else {
                    alert("Error updating leave balances!");
                }
            },
            error: function() {
                alert("Failed to connect to the server.");
            }
        });
    });
});

</script>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green; border-color:green>
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h5 class="text-success">Leave Balances Updated Successfully!</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

         


    
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #858796; border-color: #858796">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="updateAdminAccount()" style="background-color: green; border-color: green">Save Changes</button>
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

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function () {
    let selectedRow = null; // To keep track of the row being edited

    // Initialize DataTable
    $('#leaveTable').DataTable({
        "paging": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true,
        "pageLength": 10
    });

    // Handle Edit Button Click
    $('#leaveTable').on('click', '.btn-edit', function () {
        selectedRow = $(this).closest('tr'); // Store the selected row
        let empName = selectedRow.find('td:eq(1)').text().trim();
        let vlBalance = selectedRow.find('td:eq(2)').text().trim();
        let slBalance = selectedRow.find('td:eq(3)').text().trim();

        $('#empName').val(empName);
        $('#vlBalance').val(vlBalance);
        $('#slBalance').val(slBalance);

        $('#editLeaveModal').modal('show');
    });

    // Save Changes
    $('#saveChanges').click(function () {
        if (selectedRow) {
            let newVlBalance = $('#vlBalance').val();
            let newSlBalance = $('#slBalance').val();

            selectedRow.find('td:eq(2)').text(newVlBalance);
            selectedRow.find('td:eq(3)').text(newSlBalance);

            $('#editLeaveModal').modal('hide');

            // Show success popup
            $('#successPopup').fadeIn().delay(2000).fadeOut();
        }
    });

   // Handle reset button click
$(document).on('click', '.btn-reset', function() {
    let employeeNo = $(this).data('employee');
    $('#resetEmployeeNo').val(employeeNo);
    $('#resetLeaveModal').modal('show');
});
// Handle confirm reset button
$('#confirmReset').click(function() {
    let employeeNo = $('#resetEmployeeNo').val();
    let resetType = $('input[name="resetType"]:checked').val();
    
    // Show loading state
    $(this).html('<i class="fas fa-spinner fa-spin"></i> Resetting...');
    $(this).prop('disabled', true);
    
    $.ajax({
        url: 'CRUD/reset_leave.php',
        type: 'POST',
        dataType: 'json',
        data: {
            employee_no: employeeNo,
            reset_type: resetType
        },
        success: function(response) {
            if (response.status === 'success') {
                $('#resetLeaveModal').modal('hide');
                
                // Show success popup and then refresh the page
                let popup = $('<div class="popup">Leave balances reset successfully! Refreshing...</div>');
                $('body').append(popup);
                popup.fadeIn().delay(1000).fadeOut(function() {
                    $(this).remove();
                    // Refresh the page after the popup disappears
                    location.reload();
                });
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("Failed to connect to the server. Error: " + error);
        },
        complete: function() {
            // Reset button state
            $('#confirmReset').html('Reset');
            $('#confirmReset').prop('disabled', false);
        }
    });
});
    function loadLeaveData() {
        $.ajax({
            url: 'CRUD/fetch_leave_data.php',
            type: 'GET',
            success: function(response) {
                $('#leaveTableBody').html(response); // Populate table body
                $('#leaveTable').DataTable().destroy();
                $('#leaveTable').DataTable({
                    "paging": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "lengthChange": true,
                    "pageLength": 10
                });
            },
            error: function() {
                $('#leaveTableBody').html('<tr><td colspan="5" class="text-center">Error loading data</td></tr>');
            }
        });
    }
});
</script>
    </div>


</body>
</html>