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

    <title>AEHR - H.R. System - Employee Management</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Orange Theme for Table Headers */
        .employee-table thead th {
            background-color: #FE5A1D !important;
            color: white !important;
        }

        /* Orange Theme for "Employee Table" Text */
        .card-header h6 {
            color: #FE5A1D !important;
        }

        /* Orange Theme for View Buttons */
        .viewEmployee {
            background-color: #FE5A1D !important;
            border-color: #FE5A1D !important;
            color: white !important;
        }

        .viewEmployee:hover {
            background-color: #db4104 !important;
            border-color: #db4104 !important;
        }

        /* Sidebar Orange Theme */
        .sidebar {
            background-color: #FE5A1D !important;
            background-image: none !important;
            padding-top: 5px;
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
            <li class="nav-item text-white font-weight-bold">
                <a class="nav-link" href="EmployeeManagement.php"  style="background-color: #db4104; border-radius: 5px;">
                    <i class="fas fa-users-cog text-white font-weight-bold"></i>  
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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

                        



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>



    <div>
    <a href="#" class="btn btn-sm btn-success shadow-sm" id="addEmployeeButton">
        <i class="fas fa-user-plus fa-sm te xt-white-50"></i> Add Employee
    </a>


    <!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="addEmployeeForm">
                <div class="modal-body">
                    <label><strong>Employee No:</strong></label>
                    <input type="text" id="new_emp_no" name="employee_no" class="form-control" required>


                    <label><strong>Name:</strong></label>
                    <input type="text" id="new_emp_name" name="name" class="form-control" required>

                    <label><strong>Email:</strong></label>
                    <input type="email" id="new_emp_email" name="email" class="form-control" required>

                    <label><strong>Phone:</strong></label>
                    <input type="text" id="new_emp_phone" name="phone" class="form-control" >

                    <label><strong>Department:</strong></label>
                    <input type="text" id="new_emp_department" name="department" class="form-control" >

                    <label><strong>Position:</strong></label>
                    <input type="text" id="new_emp_position" name="position" class="form-control" >

                    <label><strong>HRS Account:</strong></label>
                    <input type="text" id="new_emp_hrs_account" name="hrs_account" class="form-control">

                    <label><strong>Date of Birth:</strong></label>
                    <input type="date" id="new_emp_dob" name="date_of_birth" class="form-control" >

                    <label><strong>Date Hired:</strong></label>
                    <input type="date" id="new_emp_hired" name="date_hired" class="form-control" >

                    <label><strong>Address:</strong></label>
                    <textarea id="new_emp_address" name="address" class="form-control" ></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Auto-fill employee number when opening modal
    $("#addEmployeeButton").click(function() {
        $.ajax({
            url: "CRUD/get_next_employee_no.php",
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.next_employee_no) {
                    $("#new_emp_no").val(response.next_employee_no); // Auto-fill employee_no
                }
            }
        });

        $("#addEmployeeModal").modal("show");
    });

    // Handle Form Submission with AJAX
    $("#addEmployeeForm").submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "CRUD/add_employee.php",
            type: "POST",
            data: $("#addEmployeeForm").serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#addEmployeeModal").modal("hide"); // Close modal
                    
                    // Show Success Modal
                    $("#successMessage").text(response.success);
                    $("#successModal").modal("show");
                    
                    // Reload page after clicking OK
                    $("#successOkButton").click(function() {
                        location.reload();
                    });

                } else {
                    $("#errorMessage").text(response.error);
                    $("#errorModal").modal("show");
                }
            },
            error: function() {
                $("#errorMessage").text("Error adding employee. Please try again.");
                $("#errorModal").modal("show");
            }
        });
    });

    // Keep "Add Employee" modal open when closing error modal
    $("#errorModal").on("hidden.bs.modal", function() {
        setTimeout(function() {
            $("body").addClass("modal-open"); 
        }, 100);
    });
});

</script>

<!-- Success Notification Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
            </div>
            <div class="modal-body text-center">
                <p id="successMessage">Employee added successfully!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="successOkButton">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Notification Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>

            </div>
            <div class="modal-body text-center">
                <p id="errorMessage">Something went wrong!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="closeErrorButton" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        


       <!-- Delete Button -->
<a href="#" id="toggleDeleteBtn" class="btn btn-sm btn-danger shadow-sm">
    <i class="fas fa-trash-alt fa-sm text-white-50"></i> Delete Employee
</a>

<script>
$(document).ready(function() {
    let deleteMode = false; // Track delete mode

    // Toggle Delete Mode
    $("#toggleDeleteBtn").click(function(e) {
        e.preventDefault();
        deleteMode = !deleteMode; // Toggle state

        if (deleteMode) {
            // Change button to "Cancel Deletion"
            $(this).html('<i class="fas fa-times fa-sm text-white-50"></i> Cancel Deletion')
                   .removeClass("btn-danger")
                   .addClass("btn-secondary");

            $(".delete-checkbox").removeClass("d-none"); // Show checkboxes
        } else {
            // Change button back to "Delete Employee"
            $(this).html('<i class="fas fa-trash-alt fa-sm text-white-50"></i> Delete Employee')
                   .removeClass("btn-secondary")
                   .addClass("btn-danger");

            $(".delete-checkbox").addClass("d-none"); // Hide checkboxes
        }
    });
});
</script>

    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected employees?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    let deleteMode = false; // Track delete mode

    // Show checkboxes when clicking "Delete Employee"
    $(".btn-danger").click(function(e) {
        e.preventDefault();
        deleteMode = !deleteMode; // Toggle delete mode

        if (deleteMode) {
            $(".delete-checkbox").removeClass("d-none"); // Show checkboxes
        } else {
            $(".delete-checkbox").addClass("d-none"); // Hide checkboxes
        }
    });

    // Show delete confirmation modal when at least one checkbox is selected
    $("#confirmDeleteBtn").click(function() {
        let selectedEmployees = [];
        $(".delete-checkbox:checked").each(function() {
            selectedEmployees.push($(this).val()); // Collect employee numbers
        });

        if (selectedEmployees.length === 0) {
            alert("No employees selected for deletion.");
            return;
        }

        // Send delete request
        $.ajax({
            url: "CRUD/delete_employee.php",
            type: "POST",
            data: { employee_nos: selectedEmployees },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#deleteEmployeeModal").modal("hide");
                    location.reload(); // Refresh after deletion
                } else {
                    alert(response.error);
                }
            },
            error: function() {
                alert("Error deleting employees. Please try again.");
            }
        });
    });

    // Open modal when checkboxes are selected
    $(".delete-checkbox").change(function() {
        if ($(".delete-checkbox:checked").length > 0) {
            $("#deleteEmployeeModal").modal("show");
        }
    });
});

</script>

            <?php
            include 'CRUD/db.php';

            // Fetch employee details including hrs_account
            $sql = "SELECT employee_no, name, email, phone, department, position, hrs_account, date_of_birth, date_hired, address FROM employees";
            $result = $conn->query($sql);
            ?>


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
    #searchEmployee::placeholder {
        color: white;
        opacity: 1; /* Ensures visibility */
        font-weight: normal;
    }
</style>

<!-- Employee Table -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Employee Table</h6>
        
    </div>
    <div class="table-responsive card-body d-flex justify-content-between align-items-center" >
    <p class="m-0">Total number of Employees: <span id="totalEmployees"></span></p>
    
    <div style="position: relative; display: flex; align-items: center;">
        <i class="fas fa-search" style="position: absolute; left: 12px; color: white; font-size: 14px;"></i>
        <input type="text" id="searchEmployee" class="styled-select" placeholder="Search Employee..."
            style="width: 180px; height: 38px; padding: 8px 8px 8px 35px; font-size: 14px; border: none; border-radius: 5px;
                   outline: none; font-weight: normal; background-color: #6366F1; color: white; 
                   box-shadow: none; transition: 0.2s;">
    </div>
</div>


        <table class="table table-bordered employee-table" id="employeeTable" >
            <thead>
                <tr>
                    <th>Employee No.</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>HRS Account</th>
                    <th>Details</th> <!-- View Button -->
                </tr>
            </thead>
            <tbody id="employeeTableBody">
    <?php
    $employeeCount = 0; // Initialize employee count
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employeeCount++; // Increment count for each employee
            echo "<tr>";
            echo "<td><input type='checkbox' class='delete-checkbox d-none' value='" . htmlspecialchars($row['employee_no']) . "'> " . htmlspecialchars($row['employee_no']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['department']) . "</td>";
            echo "<td>" . htmlspecialchars($row['position']) . "</td>";
            echo "<td class='hrsAccountColumn'>" . htmlspecialchars($row['hrs_account']) . "</td>";
            echo "<td>
                    <button class='btn btn-primary btn-sm viewEmployee' data-id='" . $row['employee_no'] . "'>View</button>
                    <button class='reset-password-btn' data-id='" . $row['employee_no'] . "'>Reset</button>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8' class='text-center'>No employees found</td></tr>";
    }
    ?>
</tbody>

        </table>
    </div>
</div>

<!-- Confirmation Modal (Unique CSS) -->
<div id="customResetModal" class="custom-reset-modal">
    <div class="custom-reset-content">
        <h3>Confirm Password Reset</h3>
        <p>Are you sure you want to reset this employee's password?</p>
        <input type="hidden" id="selectedEmployee">
        <button class="custom-reset-btn cancel-btn" onclick="closeResetModal()">Cancel</button>
        <button class="custom-reset-btn confirm-btn" onclick="confirmPasswordReset()">Confirm</button>
    </div>
</div>

<!-- Success Modal -->
<div id="successResetModal" class="custom-reset-modal">
    <div class="custom-reset-content">
        <h3>Success</h3>
        <p>Password has been successfully reset.</p>
        <button class="custom-reset-btn success-btn" onclick="closeSuccessResetModal()">OK</button>
    </div>
</div>

<!-- Unique CSS to prevent conflicts -->
<style>
    .custom-reset-modal {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
    .custom-reset-content {
        background: white;
        width: 320px;
        padding: 20px;
        margin: 15% auto;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .custom-reset-btn {
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        margin: 5px;
        border-radius: 5px;
    }
    .cancel-btn {
        background-color: red;
        color: white;
    }
    .confirm-btn {
        background-color: green;
        color: white;
    }
    .success-btn {
        background-color: blue;
        color: white;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let selectedEmployee = "";

        // Open confirmation modal when Reset button is clicked
        document.querySelectorAll(".reset-password-btn").forEach(button => {
            button.addEventListener("click", function () {
                selectedEmployee = this.getAttribute("data-id");
                document.getElementById("selectedEmployee").value = selectedEmployee;
                document.getElementById("customResetModal").style.display = "block";
            });
        });

        // Close modals
        function closeResetModal() {
            document.getElementById("customResetModal").style.display = "none";
        }

        function closeSuccessResetModal() {
            document.getElementById("successResetModal").style.display = "none";
            location.reload(); // Refresh to update data
        }

        // Confirm password reset
        function confirmPasswordReset() {
            let employeeNo = document.getElementById("selectedEmployee").value;

            // Send AJAX request to reset_pass.php
            fetch("CRUD/reset_pass.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "employee_no=" + encodeURIComponent(employeeNo)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    closeResetModal(); // Close confirmation modal
                    document.getElementById("successResetModal").style.display = "block"; // Show success modal
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        }

        // Attach functions to global scope
        window.closeResetModal = closeResetModal;
        window.closeSuccessResetModal = closeSuccessResetModal;
        window.confirmPasswordReset = confirmPasswordReset;
    });
</script>


<!-- JavaScript for Table Search and Employee Count -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the employee count
        function updateEmployeeCount() {
            var visibleRows = document.querySelectorAll("#employeeTable tbody tr:not([style*='display: none'])");
            document.getElementById("totalEmployees").textContent = visibleRows.length;
        }

        // Initialize count on page load
        updateEmployeeCount();

        // Search functionality
        document.getElementById("searchEmployee").addEventListener("keyup", function() {
            var searchValue = this.value.toLowerCase();
            var tableRows = document.querySelectorAll("#employeeTable tbody tr");

            tableRows.forEach(function(row) {
                var rowText = row.textContent.toLowerCase();
                if (rowText.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });

            // Update count after search filtering
            updateEmployeeCount();
        });
    });
</script>


<!-- CSS for Table -->
<style>
    .employee-table {
        width: 100%;
        table-layout: fixed;
    }

    .employee-table th,
    .employee-table td {
        padding: 8px;
        text-align: center;
        color: black;
    }

    /* Make table scrollable on smaller screens */
    .table-responsive {
        overflow-x: auto;
    }
</style>






<!-- Employee Details Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelEditButton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editEmployeeForm">
                <div class="modal-body">    
                    <!-- Hidden input to store the original employee_no -->
                    <input type="hidden" id="original_emp_no" name="original_employee_no">

                    <label><strong>Employee No:</strong></label>
                    <input type="text" id="emp_no" name="employee_no" class="form-control" disabled>

                    <label><strong>Name:</strong></label>
                    <input type="text" id="emp_name" name="name" class="form-control" disabled>

                    <label><strong>Email:</strong></label>
                    <input type="email" id="emp_email" name="email" class="form-control" disabled>

                    <label><strong>Phone:</strong></label>
                    <input type="text" id="emp_phone" name="phone" class="form-control" disabled>

                    <label><strong>Department:</strong></label>
                    <input type="text" id="emp_department" name="department" class="form-control" disabled>

                    <label><strong>Position:</strong></label>
                    <input type="text" id="emp_position" name="position" class="form-control" disabled>

                    <label><strong>HRS Account:</strong></label>
                    <input type="text" id="emp_hrs_account" name="hrs_account" class="form-control" disabled>

                    <label><strong>Date of Birth:</strong></label>
                    <input type="date" id="emp_dob" name="date_of_birth" class="form-control" disabled>

                    <label><strong>Date Hired:</strong></label>
                    <input type="date" id="emp_hired" name="date_hired" class="form-control" disabled>

                    <label><strong>Address:</strong></label>
                    <textarea id="emp_address" name="address" class="form-control" disabled></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" id="editButton" class="btn btn-warning btn-sm shadow-sm">

                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </button>

                    <button type="submit" id="saveButton" class="btn btn-success btn-sm shadow-sm" style="display: none;">
                        <i class="fas fa-save fa-sm text-white-50"></i> Save
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
<style>
    /* Reduce Modal Width */
    .modal-dialog {
        max-width: 500px; /* Adjust width as needed */
    }

    /* Limit Modal Height and Make it Scrollable Only if Needed */
    .modal-content {
        max-height: 150vh; /* Adjust height to fit within viewport */
        overflow-y: auto;
    }

    /* Reduce Form Input Size */
    .modal-body input, 
    .modal-body textarea {
        font-size: 14px; /* Smaller text */
        padding: 6px; /* Reduce padding */
    }

    /* Reduce Button Size */
    .modal-footer .btn {
        font-size: 14px;
        padding: 5px 10px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".viewEmployee").click(function() {
    var employee_no = $(this).attr("data-id");

    $.ajax({
        url: "CRUD/get_employee_info.php", // Updated filename
        type: "POST",
        data: { employee_no: employee_no },
        dataType: "json",
        success: function(response) {
            if (!response.error) {
                $("#original_emp_no").val(response.employee_no);
                $("#emp_no").val(response.employee_no);
                $("#emp_name").val(response.name);
                $("#emp_email").val(response.email);
                $("#emp_phone").val(response.phone);
                $("#emp_department").val(response.department);
                $("#emp_position").val(response.position);
                $("#emp_hrs_account").val(response.hrs_account);
                $("#emp_dob").val(response.date_of_birth);
                $("#emp_hired").val(response.date_hired);
                $("#emp_address").val(response.address);

                $("#employeeModal").modal("show");
            } else {
                alert("Employee not found!");
            }
        },
        error: function() {
            alert("Error fetching employee data.");
        }
    });
});


    // Enable Editing
    $("#editButton").click(function() {
        $("#emp_no, #emp_name, #emp_email, #emp_phone, #emp_department, #emp_position, #emp_hrs_account, #emp_dob, #emp_hired, #emp_address").prop("disabled", false);
        $("#editButton").hide();
        $("#saveButton").show();
    });

    $("#editEmployeeForm").submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "CRUD/update_employee.php",
            type: "POST",
            data: $("#editEmployeeForm").serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#employeeModal").modal("hide"); // Close edit modal
                    
                    // Show success message in modal
                    $("#successMessage").text(response.success);
                    $("#successModal").modal("show");
                } else {
                    $("#successMessage").text(response.error);
                    $("#successModal").modal("show");
                }
            },
            error: function() {
                $("#successMessage").text("Error updating employee details.");
                $("#successModal").modal("show");
            }
        });
    });

    // Reload page after clicking "OK" in the success modal
    $("#successOkButton").click(function() {
        location.reload();
    });
});

</script>

<!-- Success Notification Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p id="successMessage">Employee details updated successfully!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="successOkButton">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Editing Confirmation Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Cancel Editing</h5>
            </div>
            <div class="modal-body text-center">
                <p>Are you sure you want to cancel editing? Any unsaved changes will be lost.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmCancelButton">Yes, Cancel</button>
                <button type="button" class="btn btn-secondary" id="continueEditingButton">No, Continue Editing</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    var isEditing = false; // Track editing mode
    var originalValues = {}; // Store original values

    // Enable Editing Mode
    $("#editButton").click(function() {
        isEditing = true;
        $("#emp_no, #emp_name, #emp_email, #emp_phone, #emp_department, #emp_position, #emp_hrs_account, #emp_dob, #emp_hired, #emp_address").prop("disabled", false);
        $("#editButton").hide();
        $("#saveButton").show();

        // Store original values before editing
        originalValues = {
            emp_no: $("#emp_no").val(),
            emp_name: $("#emp_name").val(),
            emp_email: $("#emp_email").val(),
            emp_phone: $("#emp_phone").val(),
            emp_department: $("#emp_department").val(),
            emp_position: $("#emp_position").val(),
            emp_hrs_account: $("#emp_hrs_account").val(),
            emp_dob: $("#emp_dob").val(),
            emp_hired: $("#emp_hired").val(),
            emp_address: $("#emp_address").val()
        };
    });

    // Show Cancel Modal ONLY if Editing
    $("#cancelEditButton").click(function(e) {
        e.preventDefault();
        if (isEditing) {
            $("#cancelModal").modal("show"); // Show cancel confirmation modal
        } else {
            $("#employeeModal").modal("hide"); // Close edit modal immediately if not editing
        }
    });

    // Confirm Cancel - Reset Changes and Close All Modals
    $("#confirmCancelButton").click(function() {
        // Restore original values
        $("#emp_no").val(originalValues.emp_no);
        $("#emp_name").val(originalValues.emp_name);
        $("#emp_email").val(originalValues.emp_email);
        $("#emp_phone").val(originalValues.emp_phone);
        $("#emp_department").val(originalValues.emp_department);
        $("#emp_position").val(originalValues.emp_position);
        $("#emp_hrs_account").val(originalValues.emp_hrs_account);
        $("#emp_dob").val(originalValues.emp_dob);
        $("#emp_hired").val(originalValues.emp_hired);
        $("#emp_address").val(originalValues.emp_address);

        // Disable editing mode
        $("#emp_no, #emp_name, #emp_email, #emp_phone, #emp_department, #emp_position, #emp_hrs_account, #emp_dob, #emp_hired, #emp_address").prop("disabled", true);
        $("#editButton").show();
        $("#saveButton").hide();

        isEditing = false; // Reset editing mode
        $("#cancelModal").modal("hide"); // Hide cancel confirmation modal
        $("#employeeModal").modal("hide"); // Close edit modal
    });

    // Fix "No, Continue Editing" Button - Ensure Edit Modal is Fully Interactive Again
    $("#continueEditingButton").click(function() {
        $("#cancelModal").modal("hide"); // Close cancel confirmation modal
        
        setTimeout(function() {
            $("#employeeModal").modal("show"); // Reopen edit modal properly
        }, 500); // Delay to avoid Bootstrap conflicts

        // Ensure all input fields are still enabled
        $("#emp_no, #emp_name, #emp_email, #emp_phone, #emp_department, #emp_position, #emp_hrs_account, #emp_dob, #emp_hired, #emp_address").prop("disabled", false);
        $("#editButton").hide();
        $("#saveButton").show();
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

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>




</body>

</html>