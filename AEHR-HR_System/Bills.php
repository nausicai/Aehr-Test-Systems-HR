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

    <title>AEHR - H.R. System - Bills Submission</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Custom styles */
        .sidebar {
            background-color: #FE5A1D !important;
            background-image: none !important;
            padding-top: 5px;
        }

        .btn-orange {
            background-color: #FE5A1D;
            border-color: #FE5A1D;
            color: white;
        }

        .btn-orange:hover {
            background-color: #db4104;
            border-color: #db4104;
        }

        .orange-text {
            color: #FE5A1D !important;
        }

        .bills-submission-card {
            border: 3px solidrgb(0, 0, 0) !important;
        }

        .table thead th {
            background-color: #FE5A1D;
            color: white;
        }

       

        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-badge.submitted {
            background-color: #28a745;
            color: white;
        }

        .status-badge.pending {
            background-color: #ffc107;
            color: black;
        }

        .status-badge.rejected {
            background-color: #dc3545;
            color: white;
        }

        .action-buttons .btn {
            margin: 2px;
        }

        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            z-index: 1000;
            width: 400px;
            text-align: center;
        }

        .popup img {
            max-width: 100%;
            border-radius: 10px;
        }

        .popup button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #FE5A1D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup button:hover {
            background-color: #db4104;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Checkbox and delete button styles */
        .checkbox-column {
            width: 30px;
        }

        .delete-button {
            display: none;
            margin-left: 10px;
        }

        .delete-button.active {
            display: inline-block;
        }

        .delete-all-button {
            margin-left: 10px;
            display: none;
        }

        .unselect-all-button {
            margin-left: 10px;
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            display: none;
        }

        .unselect-all-button:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Orange Theme for Pop-up Modal Headers */
.modal-header {
    background-color: #FE5A1D !important; /* Orange background */
    color: white !important; /* White text */
    border-bottom: 1px solid #db4104 !important; /* Darker orange border */
}

/* Ensure the close button (×) is visible */
.modal-header .close {
    color: white !important; /* White close button */
    text-shadow: none; /* Remove default text shadow */
    opacity: 1; /* Ensure full visibility */
}

/* Hover effect for the close button */
.modal-header .close:hover {
    color: #f8f9fa !important; /* Light gray on hover */
}
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
                <a class="nav-link" href="DTR.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>DTR Submission</span>
                </a>
            </li>

            <!-- Nav Item - Bills -->
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold" href="Bills.php" style="background-color: #db4104; border-radius: 5px;">
                    <i class="fas fa-file-invoice-dollar text-white font-weight-bold"></i>
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

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bills Submissions</h1>
                        
                    </div>


                    <style>
                     /* General Table Styling */
                     table {
    width: 100%; /* Reduce width slightly */
    font-size: 13px; /* Reduce text size */
    border-collapse: collapse;
    margin-bottom: 15px; /* Reduce bottom spacing */
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1); /* Slightly softer shadow */
}

/* Table Headers */
thead th {
    padding: 12px;
    text-align: left;
    font-weight: bold;
    border: 1px solid #ddd;
}

/* Department Information Header */
.department-table thead th {
    background-color: #0047AB; /* Orange */
    color: white;
}

/* Phone Allowance Request - Different Header Color */
.phone-table thead tr:first-child th {
    background-color: #0047AB; /* Darker Blue */
    color: white;
}

/* Column Headers Below it */
.phone-table thead tr:nth-child(2) th {
    background-color: #FE5A1D; /* Lighter Blue */
    color: white;
}


/* Table Cells */
td {
    padding: 10px;
    border: 1px solid #ddd;
}

/* Input Fields */
input, select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #f9f9f9;
}

/* Table Row Hover Effect */
tbody tr:hover {
    background-color: #f1f1f1;
}

/* Responsive Table */
@media (max-width: 768px) {
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
}

</style>


                   <!-- Bills Submission Table -->
<div class="card shadow mb-4 bills-submission-card">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold orange-text">Compiled Bills Submission</h6>
    </div>

    <div class="card-body">
        <!-- Date Selection & Buttons Row -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
           
        <!-- Date & Department Selection -->
        <div class="d-flex align-items-center flex-grow-0" style="color: black;">
    <!-- Department Selector -->
    <label for="deptselection" class="mr-2 mb-0" style="color: black;">
        <i class="fas fa-building" style="color: black;"></i> Department:
    </label>
    <select id="deptselection" class="form-control form-control-sm mr-3 placeholder-dark"
            style="width: 250px; color: black; background-color: white; border: 1px solid black;">
        <option value="" disabled selected hidden>Select a Department</option>
        <option value="Operations">OPERATIONS DEPARTMENT</option>
        <option value="HR">HUMAN RESOURCE DEPARTMENT</option>
        <option value="CS">CS DEPARTMENT</option>
    </select>

    <!-- Month Selector -->
    <label for="monthSelector" class="mr-2 mb-0" style="color: black;">
        <i class="fas fa-calendar-alt" style="color: black;"></i>  Month:
    </label>
    <input type="month" id="monthSelector" class="form-control form-control-sm" 
           style="width: 200px; color: black; background-color: white; border: 1px solid black;">
</div>



<style>
    select:focus, input:focus {
    outline: none;
    box-shadow: none;
    border: 1px solid black;
}
/* Lighter placeholder effect */
#deptselection option[disabled] {
    color: #aaa !important; /* Light gray placeholder */
}


</style>



            <!-- Button container aligned to the right -->
            <div class="d-flex gap-3" style="gap: 10px;">
               
                

                <!-- Export Button -->
<button id="exportBtn" class="btn"
    style="background-color: green; color: white; padding: 8px 16px; font-size: 14px; border-radius: 5px; border: none; white-space: nowrap;">
    <i class="fas fa-file-export"></i> Export Excel
</button>

<!-- Validation Modal -->
<div id="validationModal" class="custom-export-modal">
    <div class="custom-export-modal-content">
        <div class="custom-export-modal-header">
            <span class="custom-export-modal-title">⚠️ Missing Selection</span>
        </div>
        <div class="custom-export-modal-body">
            <p>Please select a department and month first.</p>
        </div>
        <div class="custom-export-modal-footer">
            <button id="okValidation" class="custom-export-ok-btn">OK</button>
        </div>
    </div>
</div>

<!-- Export Confirmation Modal -->
<div id="exportModal" class="custom-export-modal">
    <div class="custom-export-modal-content">
        <div class="custom-export-modal-header">
            <span class="custom-export-modal-title">Confirm Export</span>
        </div>
        <div class="custom-export-modal-body">
            <p id="exportMessage">Are you sure you want to export the data into an Excel file?</p>
        </div>
        <div class="custom-export-modal-footer">
            <button id="cancelExport" class="custom-export-cancel-btn">Cancel</button>
            <button id="confirmExport" class="custom-export-confirm-btn">Yes, Export</button>
            <button id="okExport" class="custom-export-ok-btn hidden">OK</button>
        </div>
    </div>
</div>

<!-- CSS for Custom Modals -->
<style>
.custom-export-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.custom-export-modal-content {
    background-color: white;
    width: 400px;
    margin: 15% auto;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
}

.custom-export-modal-header {
    background-color: #FE5A1D;
    color: white;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
}

.custom-export-modal-body {
    padding: 20px;
    font-size: 16px;
    color: #555;
}

.custom-export-modal-footer {
    display: flex;
    justify-content: center;
    padding: 15px;
    gap: 10px;
}

.custom-export-ok-btn {
    background-color: #FE5A1D;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.custom-export-ok-btn:hover {
    background-color:rgb(204, 72, 24);
}

.custom-export-cancel-btn {
    background-color: red;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.custom-export-confirm-btn {
    background-color: green;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.hidden {
    display: none;
}
</style>

<!-- JavaScript for Modal Behavior -->
<script>
document.getElementById("exportBtn").addEventListener("click", function () {
    const deptSelection = document.getElementById("deptselection").value;
    const monthSelector = document.getElementById("monthSelector").value;

    if (!deptSelection || !monthSelector) {
        document.getElementById("validationModal").style.display = "block";
        return;
    }

    document.getElementById("exportModal").style.display = "block";

    // Reset modal content when opened
    document.getElementById("exportMessage").innerHTML = "Are you sure you want to export the data into an Excel file?";
    document.getElementById("confirmExport").style.display = "inline-block";
    document.getElementById("cancelExport").style.display = "inline-block";
    document.getElementById("okExport").style.display = "none";
});

// Confirm Export
document.getElementById("confirmExport").onclick = function () {
    // Change message to success text
    document.getElementById("exportMessage").innerHTML = "✅ Success Exporting! Please wait for your Excel file...";

    // Hide Cancel & Export buttons
    document.getElementById("confirmExport").style.display = "none";
    document.getElementById("cancelExport").style.display = "none";

    // Show OK button
    document.getElementById("okExport").style.display = "inline-block";

    // Prepare export URL
    const deptSelection = document.getElementById("deptselection").value;
    const monthSelector = document.getElementById("monthSelector").value;
    const date = new Date(monthSelector);
    const options = { year: "numeric", month: "long" };
    const formattedMonth = date.toLocaleDateString("en-US", options);

    setTimeout(() => {
        // Redirect after a delay
        window.location.href = `export_bills.php?department=${encodeURIComponent(deptSelection)}&allow_for=${encodeURIComponent(formattedMonth)}`;
    }, 2000);
};

// Close Modal with OK Button
document.getElementById("okExport").addEventListener("click", function () {
    document.getElementById("exportModal").style.display = "none";
});

// Close Validation Modal
document.getElementById("okValidation").addEventListener("click", function () {
    document.getElementById("validationModal").style.display = "none";
});

// Cancel Export
document.getElementById("cancelExport").addEventListener("click", function () {
    document.getElementById("exportModal").style.display = "none";
});

// Close modal when clicking outside
window.onclick = function(event) {
    let exportModal = document.getElementById("exportModal");
    let validationModal = document.getElementById("validationModal");
    
    if (event.target == exportModal) {
        exportModal.style.display = "none";
    }
    if (event.target == validationModal) {
        validationModal.style.display = "none";
    }
};
</script>








            </div>
        </div>

        <div class="table-responsive">
            <!-- Apply styles for placeholder text -->
            <style>
                #searchInput::placeholder {
                    color: white;
                    opacity: 1; /* Ensures visibility */
                    font-weight: normal;
                }
            </style>
       

<!-- Department Information Table -->
<table class="department-table" style="width: 100%;">
    <thead>
        <tr>
            <th colspan="4" style="text-align: left;">DEPARTMENT INFORMATION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="background-color: #FE5A1D; color: white; width: 25%;"><label for="department">DEPARTMENT</label></td>
            <td style="width: 25%;"><input type="text" id="department" name="department" style="width: 100%;" readonly></td>

            <td style="background-color: #FE5A1D; color: white; width: 25%;"><label for="cost-center">COST CENTER</label></td>
            <td style="width: 25%;"><input type="text" id="cost-center" name="cost-center" style="width: 100%;"></td>
        </tr>
        <tr>
            <td style="background-color: #FE5A1D; color: white;"><label for="department-manager">DEPARTMENT MANAGER</label></td>
            <td><input type="text" id="department-manager" name="department-manager" style="width: 100%;"></td>

            <td style="background-color: #FE5A1D; color: white;"><label for="allowance-month-year">ALLOWANCE FOR MONTH-YEAR</label></td>
            <td><input type="text" id="allowance-month-year" name="allowance-month-year" style="width: 100%;" readonly></td>
        </tr>
        <tr>
            <td style="border-right: 1px solid white;"></td>
            <td style="border-left: 1px solid white;"></td> <!-- Empty cell for spacing -->

            <td style="background-color: #FE5A1D; color: white;"><label for="no-of-employees">NO. OF EMPLOYEES</label></td>
            <td><input type="number" id="no-of-employees" name="no-of-employees" min="1" style="width: 100%;"></td>
        </tr>
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deptSelection = document.getElementById('deptselection');
        const monthSelector = document.getElementById('monthSelector');
        const departmentInput = document.getElementById('department');
        const allowanceInput = document.getElementById('allowance-month-year');
        const managerInput = document.getElementById('department-manager');
        const costCenterInput = document.getElementById('cost-center');  // New input for cost center

        // Mapping department to full name, manager, allowance, and cost center
        const departmentInfo = {
            "Operations": { fullName: "OPERATIONS DEPARTMENT", manager: "RICKY GO", allowance: "Operations Allowance", costCenter: "520" },
            "HR": { fullName: "HUMAN RESOURCES DEPARTMENT", manager: "NANCY CHESTNUT", allowance: "HR Allowance", costCenter: "820" },
            "CS": { fullName: "CS DEPARTMENT", manager: "NATHANIEL FLORES", allowance: "CS Allowance", costCenter: "740" }
        };

        // Event listeners for both department and month selection
        deptSelection.addEventListener('change', updateFields);
        monthSelector.addEventListener('change', updateFields);

        function updateFields() {
            const selectedDept = deptSelection.value;
            const selectedMonth = monthSelector.value;

            if (selectedDept) {
                // Set department full name
                departmentInput.value = departmentInfo[selectedDept].fullName;

                // Set department manager
                managerInput.value = departmentInfo[selectedDept].manager;

                // Set department cost center
                costCenterInput.value = departmentInfo[selectedDept].costCenter;
            }

            if (selectedMonth) {
                // Set allowance month-year format (e.g., "June 2025")
                const date = new Date(selectedMonth);
                const options = { year: 'numeric', month: 'long' };
                const monthYear = date.toLocaleDateString('en-US', options);
                allowanceInput.value = monthYear;  // Display the month-year
            }
        }
    });
</script>









<!-- PHONE ALLOWANCE REQUEST TABLE -->
<table class="phone-table">
    <thead>
        <tr>
            <th colspan="9">PHONE ALLOWANCE REQUEST</th>
        </tr>
        <tr>
            <th>ID NO.</th>
            <th>STAFF NAME</th>
            <th>PAY TO</th>
            <th>MERCHANT REFERENCE NUMBER</th>
            <th>PAY FROM</th>
            <th>PAYMENT TRANSACTION REFERENCE NUMBER</th>
            <th>TRANSACTION DATE</th>
            <th>PAID AMOUNT</th>
            <th>REIMBURSEMENT PHONE ALLOWANCE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="9" class="text-center">SELECT DEPARTMENT AND DATE</td>
        </tr>
    </tbody>
</table>



                            </div>
                            <div class="text-right mt-3">
                                <strong id="submitCount"></strong>
                            </div>
                        </div>
                    </div>


                    <script>
document.addEventListener("DOMContentLoaded", function () {
    const deptSelection = document.getElementById("deptselection");
    const monthSelector = document.getElementById("monthSelector");
    const submitCount = document.getElementById("submitCount");
    const noOfEmployees = document.getElementById("no-of-employees");
    const tableBody = document.querySelector(".phone-table tbody");

    function fetchData() {
        let department = deptSelection.value.trim();
        const date = new Date(monthSelector.value);
        const options = { year: "numeric", month: "long" };
        const allowFor = isNaN(date) ? "" : date.toLocaleDateString("en-US", options);

        // Map department abbreviations to full names
        const departmentMapping = {
            "HR": "HUMAN RESOURCES",
            "CS": "CS"
        };

        department = departmentMapping[department.toUpperCase()] || department.toUpperCase();
        department += " DEPARTMENT"; // Ensure it matches DB values

       

        if (!department || !allowFor) {
            tableBody.innerHTML = `<tr><td colspan="9" class="text-center">SELECT DEPARTMENT AND DATE</td></tr>`;
            submitCount.textContent = "0 submissions";
            noOfEmployees.value = ""; // Make it blank
            return;
        }

        fetch("CRUD/get_bills_sub.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `department=${encodeURIComponent(department)}&allow_for=${encodeURIComponent(allowFor)}`
        })
        .then(response => response.json())
        .then(data => {
            
            tableBody.innerHTML = "";

            if (!Array.isArray(data)) {
                console.error("Invalid data format:", data);
                tableBody.innerHTML = `<tr><td colspan="9" class="text-center">Error loading data</td></tr>`;
                submitCount.textContent = "0 submissions";
                noOfEmployees.value = ""; // Make it blank
                return;
            }

            // Filter only approved submissions
            let approvedData = data.filter(row => row.status === "Approved");

            if (approvedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="9" class="text-center">No approved data found</td></tr>`;
                submitCount.textContent = "0 submissions";
                noOfEmployees.value = ""; // Make it blank
                return;
            }

            let uniqueEmployees = new Set(); // Track unique employee numbers

            // Populate table with approved submissions
            approvedData.forEach(row => {
                tableBody.innerHTML += `
                    <tr style="color:black">
                        <td>${row.employee_no}</td>
                        <td>${row.name}</td>
                        <td>${row.pay_to}</td>
                        <td>${row.mer_refnum}</td>
                        <td>${row.pay_from}</td>
                        <td>${row.paytrans_refnum}</td>
                        <td>${row.trans_date}</td>
                        <td>₱${parseFloat(row.paid_amount).toLocaleString()}</td>
                        <td>₱${parseFloat(row.reim_phonealow).toLocaleString()}</td>
                    </tr>
                `;
                uniqueEmployees.add(row.employee_no); // Add employee number to Set
            });

            // ✅ Total rows count (all approved submissions)
            submitCount.textContent = `${approvedData.length} submissions`;

            // ✅ Unique employee count
            noOfEmployees.value = uniqueEmployees.size > 0 ? uniqueEmployees.size : ""; // Show number or blank
        })
        .catch(error => {
            console.error("Error fetching data:", error);
            tableBody.innerHTML = `<tr><td colspan="9" class="text-center">Error loading data</td></tr>`;
            submitCount.textContent = "0 submissions";
            noOfEmployees.value = ""; // Make it blank
        });
    }

    deptSelection.addEventListener("change", fetchData);
    monthSelector.addEventListener("change", fetchData);

    fetchData(); // Initial fetch
});

</script>









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
    #searchBar::placeholder {
        color: white;
        opacity: 1; /* Ensures visibility */
        font-weight: normal;
    }
</style>

                    <!-- Bills Submission Table -->
<div class="card shadow mb-4 bills-submission-card">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold orange-text">Employee Bills Submissions</h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <div class="d-flex justify-content-between align-items-center mt-3">
    <strong id="submissionCount">Loading...</strong>
    
    <div style="position: relative; display: flex; align-items: center; margin: -10px 20px 10px 10px;">
        <i class="fas fa-search" style="position: absolute; left: 12px; color: white; font-size: 14px;"></i>
        <input type="text" id="searchBar" class="styled-select" placeholder="Search Employee..."
            style="width: 180px; height: 38px; padding: 8px 8px 8px 35px; font-size: 14px; border: none; border-radius: 5px;
                   outline: none; font-weight: normal; background-color: #6366F1; color: white; 
                   box-shadow: none; transition: 0.2s;">
    </div>
</div>

            
            <!-- Scrollable Table Wrapper -->
            <div class="table-container">
                <table class="table table-bordered" id="billsTable" width="100%" cellspacing="0" style="color:black">
                    <thead>
                        <tr>
                            <th>Employee No.</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Submission Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="billsTableBody">
                        <!-- Data will be loaded dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- CSS to Limit Table Height -->
<style>
    .table-container {
        max-height: 600px; /* Adjust height as needed for ~10 rows */
        overflow-y: auto;
    }
</style>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById("searchBar");
    const tableBody = document.getElementById("billsTableBody");

    searchBar.addEventListener("input", function () {
        const searchText = searchBar.value.toLowerCase();
        const rows = tableBody.getElementsByTagName("tr");

        for (let row of rows) {
            const cells = row.getElementsByTagName("td");
            let rowMatches = false;

            for (let cell of cells) {
                if (cell.textContent.toLowerCase().includes(searchText)) {
                    rowMatches = true;
                    break;
                }
            }

            row.style.display = rowMatches ? "" : "none";
        }
    });
});
</script>




<style>/* Modal Overlay */
/* Modal Overlay */
.unique-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

/* Modal Content */
.unique-modal-content {
    background: white;
    border-radius: 8px;
    width: 350px;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

/* Orange Modal Header */
.unique-modal-header {
    background: green;
    color: white;
    padding: 12px;
    font-size: 18px;
    font-weight: bold;
    text-align: left;
    position: relative;
}

/* Close Button */
.unique-modal-close {
    position: absolute;
    top: 12px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: white;
}

/* Modal Body */
.unique-modal-body {
    padding: 20px;
}

/* Input Field */
#customMonthSelector {
    width: 100%;
    padding: 8px;
    margin: 10px 0;
}

/* Buttons */
.unique-modal-buttons {
    margin-top: 15px;
}

.unique-modal-buttons button {
    padding: 8px 15px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    margin: 5px;
    border-radius: 4px;
}

#customCancelBtn {
    background: gray;
    color: white;
}

#customApproveBtn {
    background: green;
    color: white;
}

#customApproveBtn:disabled {
    background: lightgray;
    cursor: not-allowed;
}
</style>



<!-- Success Modal (Replaces Alert) -->
<div id="customSuccessModal" class="unique-modal-overlay" style="display: none;">
    <div class="unique-modal-content">
        <div class="unique-modal-header">
            <h2>Success</h2>
        </div>
        <div class="unique-modal-body">
            <p>Submission Approved Successfully!</p>
        </div>
        <div class="unique-modal-buttons">
            <button id="successOkBtn" style="background-color: green; color: white">OK</button>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const approveModal = document.getElementById("customApproveModal");
    const successModal = document.getElementById("customSuccessModal");
    
    const closeModal = document.querySelector(".unique-modal-close");
    const approveBtn = document.getElementById("customApproveBtn");
    const cancelBtn = document.getElementById("customCancelBtn");
    const monthSelector = document.getElementById("customMonthSelector");

    const hiddenEmployeeNo = document.getElementById("hiddenEmployeeNo");
    const hiddenSubDate = document.getElementById("hiddenSubDate");
    const successOkBtn = document.getElementById("successOkBtn");

    function disableScroll() { document.body.style.overflow = "hidden"; }
    function enableScroll() { document.body.style.overflow = ""; }

   


 

    // Show success modal
    function showSuccessModal() {
        
        successModal.style.display = "flex";
        disableScroll();
    }

    // Close success modal and reload page
    successOkBtn.addEventListener("click", function () {
        successModal.style.display = "none";
        enableScroll();
        location.reload();
    });

    

        
        const status = "Approved"; // Fixed status for approval
   

        

})
</script>

 



<!-- View Details Modal -->

<style>
/* Modal Overlay */
.unique-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
}

/* Modal Content - Wider */
.unique-modal-content {
    max-height: 80vh;
    overflow-y: auto;
    width: 65%; /* Increased width */
    max-width: 950px; /* Increased max width */
    
    border-radius: 8px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    animation: fadeIn 0.3s ease-in-out;
    background: white;
}

.unique-modal-header {
    background-color: #FE5A1D; 
    color: white; /* Ensure text is visible */
    padding: 10px 15px; /* Adjust padding */
    font-size: 16px; /* Adjust text size */
    display: flex;
    align-items: center; /* Center vertically */
    justify-content: space-between; /* Push close button to the right */
    min-height: 40px; /* Prevent excessive height */
}


.unique-modal-close {
    font-size: 20px;
    cursor: pointer;
}

/* First Section: 2x2 Grid */
.modal-grid-2x2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}

/* Second Section: 4 Fields in a Row */
.modal-grid-4 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}

/* Full Width Input */
.full-width {
    width: 100%;
    margin-top: 15px;
}

/* Labels */
.unique-modal-body label {
    display: block;
    font-weight: bold;
    font-size: 14px;
}

/* Inputs */
.unique-modal-body input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background: #f8f8f8;
    font-size: 14px;
}

/* Buttons */
.unique-modal-buttons {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

#viewCloseBtn {
    background: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

#viewCloseBtn:hover {
    background: #0056b3;
}

/* Fade-in animation */
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}

</style>

<div id="customViewModal" class="unique-modal-overlay">
    <div class="unique-modal-content">
        <div class="unique-modal-header">
            <h2>Submission Details</h2>
            <span class="unique-modal-close view-close">&times;</span>
        </div>
        <div class="unique-modal-body">

            <!-- First Section: 2x2 Grid -->
            <div class="modal-grid-2x2">
                <div>
                    <label>Department:</label>
                    <input type="text" id="viewDepartment" readonly>
                </div>
                <div>
                    <label>Manager:</label>
                    <input type="text" id="viewManager" readonly>
                </div>
                <div>
                    <label>Cost Center:</label>
                    <input type="text" id="viewCostCenter" readonly>
                </div>
            </div>
            <br>
            <br>
            <br>

            <!-- Second Section: 4 Fields in a Row -->
            <div class="modal-grid-4">
                <div>
                    <label>ID NO:</label>
                    <input type="text" id="viewIdNo" readonly>
                </div>
                <div>
                    <label>STAFF NAME:</label>
                    <input type="text" id="viewName" readonly>
                </div>
                <div>
                    <label style="margin-top: -41px">CONFIRMATION/PAYMENT TRANSACTION REFERENCE NUMBER:</label>
                    <input type="text" id="viewPayRefNum" readonly>
                </div>
                <div>
                    <label>TRANSACTION DATE:</label>
                    <input type="date" id="viewTransDate" readonly>
                </div>
                <div>
                    <label>PAY FROM:</label>
                    <input type="text" id="viewPayFrom" readonly>
                </div>
                <div>
                    <label>PAY TO:</label>
                    <input type="text" id="viewPayTo" readonly>
                </div>
                
                <div>
                    <label style="margin-top: -11px; margin-bottom: -2px">MERCHANT REFERENCE NUMBER:</label>
                    <input type="text" id="viewMerchantNum" readonly>
                </div>
               
                <div>
                    <label>Paid Amount:</label>
                    <input type="text" id="viewPaidAmount" readonly>
                </div>
            </div>
            <br>

            <!-- Final Section: Full Width -->
            <div class="full-width">
                <label>REIMBURSEMENT PHONE ALLOWANCE:</label>
                <input type="text" id="viewReimphoneAllow" placeholder="Reimbursement Allowance">
            </div>

            <!-- Month Selector for Approval -->
            <div class="full-width">
                <label for="viewMonthSelector">
                    <span>📅 Month:</span>
                    <input type="month" id="viewMonthSelector">
                </label>
            </div>

            <!-- Hidden Fields for Employee and Submission Date -->
            <input type="hidden" id="viewHiddenEmployeeNo">
            <input type="hidden" id="viewHiddenSubDate">

        </div>
        <div class="unique-modal-buttons">
            <button id="viewCloseBtn" style="background-color: red">Close</button>
            <button id="viewFileBtn" style="display: none; color: white; background-color: #f6c23e">View File</button>
            <button id="viewApproveBtn" style="display: none;">Approve</button>
        </div>
    </div>
</div>
<style>
#billImage {
    max-width: 100%;
    max-height: 80vh;
    display: block !important; /* Ensure visibility */
}

#viewApproveBtn {
    background-color: #6366F1;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#viewApproveBtn:not(:disabled) {
    background-color:rgb(45, 192, 25);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

#viewApproveBtn:disabled {
    background-color: #b3b3b3;
    cursor: not-allowed;
}
</style>
<!-- Image Modal -->
<div id="imageModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); justify-content: center; align-items: center;">
    <div style="background: white; padding: 20px; border-radius: 5px; text-align: center;">
        <span id="closeModal" style="cursor: pointer; font-size: 20px; font-weight: bold;">&times;</span>
        <img id="billImage" src="" alt="Bill Image" style="max-width: 300px; display: block;">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const viewFileBtn = document.getElementById("viewFileBtn");
        const viewHiddenEmployeeNo = document.getElementById("viewHiddenEmployeeNo");
        const viewHiddenSubDate = document.getElementById("viewHiddenSubDate");

        // Function to fetch and display the image or PDF in a new tab
        function fetchImage(employee_no, sub_date) {
            fetch(`CRUD/view_bill_image.php?employee_no=${encodeURIComponent(employee_no)}&sub_date=${encodeURIComponent(sub_date)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.image) {
                        // Open the image or PDF in a new tab
                        const newTab = window.open();
                        if (data.type === "image") {
                            newTab.document.write(`<img src="${data.image}" alt="Bill Image" style="max-width: 100%;">`);
                        } else if (data.type === "application/pdf") {
                            newTab.document.write(`<embed src="${data.image}" type="application/pdf" width="100%" height="100%">`);
                        }
                    } else {
                        alert("No file found or failed to load.");
                    }
                })
                .catch(error => {
                    console.error("Error fetching file:", error);
                    alert("Failed to load file.");
                });
        }

        // Event listener for the "View File" button
        viewFileBtn.addEventListener("click", function () {
            const employee_no = viewHiddenEmployeeNo.value;
            const sub_date = viewHiddenSubDate.value;
            fetchImage(employee_no, sub_date); // Open file in new tab
        });

        // Function to check file availability
        function checkFileAvailability() {
            const employee_no = viewHiddenEmployeeNo.value.trim();
            const sub_date = viewHiddenSubDate.value.trim();

            if (!employee_no || !sub_date) return;

            fetch("CRUD/check_file.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `employee_no=${encodeURIComponent(employee_no)}&sub_date=${encodeURIComponent(sub_date)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.file_exists) {
                    viewFileBtn.style.display = "inline-block";
                } else {
                    viewFileBtn.style.display = "none";
                }
            })
            .catch(error => console.error("Error checking file:", error));
        }

        // Run check when modal opens
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("view-btn") || event.target.classList.contains("approve-btn")) {
                setTimeout(checkFileAvailability, 500); // Delay ensures values are updated
            }
        });
    });
</script>

<div id="customViewModal" class="unique-modal-overlay">
    <div class="unique-modal-content">
        <div class="unique-modal-header">
            <h2>Submission Details</h2>
            <span class="unique-modal-close view-close">&times;</span>
        </div>
        <div class="unique-modal-body">
            <!-- Your existing modal body content -->
            <!-- ... -->
        </div>
        <div class="unique-modal-buttons">
            <button id="viewCloseBtn" style="background-color: red">Close</button>
            <button id="viewFileBtn" style="display: none; color: white; background-color: #f6c23e">View File</button>
            <button id="viewApproveBtn" style="display: none;">Approve</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const viewModal = document.getElementById("customViewModal");
        const closeViewModal = document.querySelector(".view-close");
        const closeViewBtn = document.getElementById("viewCloseBtn");
        const viewApproveBtn = document.getElementById("viewApproveBtn");
        const viewMonthSelector = document.getElementById("viewMonthSelector");
        const viewHiddenEmployeeNo = document.getElementById("viewHiddenEmployeeNo");
        const viewHiddenSubDate = document.getElementById("viewHiddenSubDate");
        const reimbursementField = document.getElementById("viewReimphoneAllow");
        const viewFileBtn = document.getElementById("viewFileBtn");
        const departmentField = document.getElementById("viewDepartment");
        const managerField = document.getElementById("viewManager");
        const costCenterField = document.getElementById("viewCostCenter");

        function disableScroll() { document.body.style.overflow = "hidden"; }
        function enableScroll() { document.body.style.overflow = ""; }

        function autoFillFields() {
            const department = departmentField.value.trim();
            const departmentMap = {
                "OPERATIONS DEPARTMENT": { manager: "RICKY GO", costCenter: "520" },
                "HUMAN RESOURCES DEPARTMENT": { manager: "NANCY CHESTNUT", costCenter: "820" },
                "CS DEPARTMENT": { manager: "NATHANIEL FLORES", costCenter: "740" }
            };

            if (departmentMap[department]) {
                managerField.value = departmentMap[department].manager;
                costCenterField.value = departmentMap[department].costCenter;
            } else {
                managerField.value = "";
                costCenterField.value = "";
            }
        }

        function formatMonthForInput(monthString) {
            if (!monthString) return "";
            
            if (monthString.includes(" ")) {
                const months = ["January", "February", "March", "April", "May", "June", 
                               "July", "August", "September", "October", "November", "December"];
                const parts = monthString.split(" ");
                const monthName = parts[0];
                const year = parts[1];
                
                const monthIndex = months.findIndex(m => m.toLowerCase() === monthName.toLowerCase());
                if (monthIndex >= 0 && year) {
                    return `${year}-${String(monthIndex + 1).padStart(2, '0')}`;
                }
                return "";
            }
            return monthString;
        }

        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("view-btn") || event.target.classList.contains("approve-btn")) {
                let row = event.target.closest("tr");

                let employee_no = row.cells[0].textContent.trim();
                let name = row.cells[1].textContent.trim();
                let department = row.cells[2].textContent.trim();
                let status = row.cells[3].textContent.trim();
                let submission_date = row.cells[4].textContent.trim();

                viewHiddenEmployeeNo.value = employee_no;
                viewHiddenSubDate.value = submission_date;

                fetch("CRUD/fetch_submission.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `employee_no=${encodeURIComponent(employee_no)}&name=${encodeURIComponent(name)}&department=${encodeURIComponent(department)}&status=${encodeURIComponent(status)}&submission_date=${encodeURIComponent(submission_date)}`
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(text => {
                    
                    try {
                        return JSON.parse(text);
                    } catch (error) {
                        throw new Error("Invalid JSON received: " + text);
                    }
                })
                .then(data => {
                    if (!data.error) {
                        // Fill all basic fields
                        departmentField.value = data.department || "";
                        autoFillFields();
                        document.getElementById("viewIdNo").value = data.employee_no || "";
                        document.getElementById("viewName").value = data.name || "";
                        document.getElementById("viewPayTo").value = data.pay_to || "";
                        document.getElementById("viewMerchantNum").value = data.mer_refnum || "";
                        document.getElementById("viewPayFrom").value = data.pay_from || "";
                        document.getElementById("viewPayRefNum").value = data.paytrans_refnum || "";
                        document.getElementById("viewTransDate").value = (data.trans_date === "0000-00-00") ? "" : data.trans_date;
                        document.getElementById("viewPaidAmount").value = (data.paid_amount === "0.00") ? "" : (data.paid_amount || "");

                        // FIXED: Using correct database field name 'reim_phonealow'
                        if (data.reim_phonealow !== undefined && data.reim_phonealow !== null && data.reim_phonealow !== "") {
                            const reimValue = parseFloat(data.reim_phonealow);
                            reimbursementField.value = isNaN(reimValue) ? "" : reimValue.toFixed(2);
                            
                        } else {
                            reimbursementField.value = "";
                            
                        }

                        // Handle month selector
                        viewMonthSelector.value = formatMonthForInput(data.allow_for);

                        // Set UI state based on status
                        if (data.status === "Approved") {
                            reimbursementField.readOnly = true;
                            reimbursementField.style.backgroundColor = "#f0f0f0";
                            viewMonthSelector.readOnly = true;
                            viewMonthSelector.style.backgroundColor = "#f0f0f0";
                            viewApproveBtn.style.display = "none";
                        } else {
                            reimbursementField.readOnly = false;
                            reimbursementField.style.backgroundColor = "rgba(255, 162, 162, 0.72)";
                            viewMonthSelector.readOnly = false;
                            viewMonthSelector.style.backgroundColor = "rgba(255, 162, 162, 0.72)";
                            viewApproveBtn.style.display = "inline-block";
                        }

                        // Show/hide view file button
                        viewFileBtn.style.display = data.bill_mime ? "inline-block" : "none";

                        viewModal.style.display = "flex";
                        disableScroll();
                        checkApprovalState();
                    } else {
                        alert("No data found for this submission.");
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    alert("Failed to fetch submission data. Please check the console for more details.");
                });
            }
        });

        function checkApprovalState() {
            if (viewMonthSelector.value.trim() !== "" && reimbursementField.value.trim() !== "") {
                viewApproveBtn.disabled = false;
            } else {
                viewApproveBtn.disabled = true;
            }
        }

        viewMonthSelector.addEventListener("input", checkApprovalState);
        reimbursementField.addEventListener("input", checkApprovalState);

        viewApproveBtn.addEventListener("click", function () {
            const employee_no = viewHiddenEmployeeNo.value;
            const sub_date = viewHiddenSubDate.value;
            const allow_for = viewMonthSelector.value.trim();
            const reimbursement = reimbursementField.value.trim();

            if (!allow_for) {
                showValidationModal("Please select a month before approving.");
                return;
            }

            if (!reimbursement || isNaN(reimbursement)) {
                showValidationModal("Please enter a valid reimbursement amount before approving.");
                return;
            }

            fetch("CRUD/update_status.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `employee_no=${encodeURIComponent(employee_no)}&sub_date=${encodeURIComponent(sub_date)}&status=Approved&allow_for=${encodeURIComponent(allow_for)}&reimbursement=${encodeURIComponent(reimbursement)}`
            })
            .then(response => response.text())
            .then(data => {
                console.log("Server Response:", data);
                if (data.trim() === "success") {
                    showSuccessModal();
                    viewModal.style.display = "none";
                    enableScroll();
                } else {
                    showValidationModal("Error approving submission: " + data);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                showValidationModal("Failed to update status. Please check your internet connection.");
            });
        });

        function showSuccessModal() {
            document.querySelector(".custom-success-modal").style.display = "flex";
        }

        document.getElementById("customSuccessOkBtn").addEventListener("click", function () {
            document.querySelector(".custom-success-modal").style.display = "none";
            location.reload();
        });

        function showValidationModal(message) {
            document.getElementById("customValidationMessage").innerText = message;
            document.querySelector(".custom-validation-modal").style.display = "flex";
        }

        document.getElementById("customValidationOkBtn").addEventListener("click", function () {
            document.querySelector(".custom-validation-modal").style.display = "none";
        });

        function closeViewModalFunction() {
            viewModal.style.display = "none";
            enableScroll();
        }

        closeViewModal.addEventListener("click", closeViewModalFunction);
        closeViewBtn.addEventListener("click", closeViewModalFunction);
    });
</script>


<!-- ✅ Custom Success Modal -->
<div class="custom-success-modal">
    <div class="custom-modal-content">
        <p>✅ Submission Approved Successfully!</p>
        <button id="customSuccessOkBtn">OK</button>
    </div>
</div>

<!-- ✅ Custom Validation Modal for Errors -->
<div class="custom-validation-modal">
    <div class="custom-modal-content">
        <p id="customValidationMessage"></p>
        <button id="customValidationOkBtn">OK</button>
    </div>
</div>
<style>
    /* ✅ Custom Modal Styling */
.custom-success-modal, 
.custom-validation-modal {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* ✅ Modal Box */
.custom-modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
}

/* ✅ Button Style */
.custom-modal-content button {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.custom-modal-content button:hover {
    background: #45a049;
}

</style>

<!-- Reject Modal -->
<div class="modal" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Submission</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>This submission will be <span style="color: red">PERMANENTLY DELETED</span>. Are you sure?</p>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmReject">Delete</button>
            </div>
        </div>
    </div>
</div>  

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("CRUD/get_bills.php")
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("billsTableBody");
            tableBody.innerHTML = "";

            if (data.length === 0) {
                document.getElementById("submissionCount").innerText = "No submissions available.";
                return;
            }

            // Sort data: Pending first, then Approved, then Rejected
            data.sort((a, b) => {
                const statusOrder = { "Pending": 1, "Approved": 2, "Rejected": 3 };
                return statusOrder[a.status] - statusOrder[b.status];
            });

            let pendingCount = 0;
            data.forEach(row => {
                let statusColor = row.status === "Approved" ? "green" : row.status === "Pending" ? "orange" : "red";
                if (row.status === "Pending") pendingCount++;

                let actions = `<button class="btn btn-danger btn-sm reject-btn" data-employee="${row.employee_no}" data-date="${row.sub_date}">Delete</button>
                               <button class="btn btn-info btn-sm view-btn">View</button>`;
                if (row.status === "Pending") {
                    actions += ` <button class="btn btn-success btn-sm approve-btn" data-employee="${row.employee_no}" data-date="${row.sub_date}">Approve</button>`;
                }

                let newRow = `<tr data-employee="${row.employee_no}" data-date="${row.sub_date}">
                    <td>${row.employee_no}</td>
                    <td>${row.name}</td>
                    <td>${row.department}</td>
                    <td><span style="color:${statusColor}"><strong>${row.status}</strong></span></td>
                    <td>${row.sub_date}</td>
                    <td class="action-buttons">${actions}</td>
                </tr>`;
                tableBody.innerHTML += newRow;
            });

            document.getElementById("submissionCount").innerText = `${pendingCount} Pending Submissions`;

            


            document.querySelectorAll(".reject-btn").forEach(button => {
                button.addEventListener("click", function () {
                    let employee_no = this.getAttribute("data-employee");
                    let sub_date = this.getAttribute("data-date");
                    document.getElementById("confirmReject").setAttribute("data-employee", employee_no);
                    document.getElementById("confirmReject").setAttribute("data-date", sub_date);
                    $("#rejectModal").modal("show");
                });
            });
        })
        .catch(error => console.error("Error fetching data:", error));

   

    document.getElementById("confirmReject").addEventListener("click", function () {
        let employee_no = this.getAttribute("data-employee");
        let sub_date = this.getAttribute("data-date");

        fetch("CRUD/delete_bills.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `employee_no=${encodeURIComponent(employee_no)}&sub_date=${encodeURIComponent(sub_date)}`
        }).then(response => response.text())
          .then(() => location.reload());
    });
});
</script>




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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

       

    </div>


</body>

</html>