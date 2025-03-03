<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>H.R. System - Bills Submission</title>

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

        .pending-notification {
            background-color: #FE5A1D;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 14px;
            margin-left: 10px;
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
        }

        .unselect-all-button {
            margin-left: 10px;
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        .unselect-all-button:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Human Resource System</div>
            </a>

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

                        <!-- Pending Bills Notification -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Pending Notification Badge -->
                                <span class="badge badge-danger pending-notification" id="pendingNotification">3</span>
                            </a>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Manager</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                        <h1 class="h3 mb-0 text-gray-800">Bills Submissions</h1>
                        <div>
                            <button id="trashcanIcon" class="btn btn-orange"><i class="fas fa-trash"></i></button>
                            <button id="deleteButton" class="btn btn-danger delete-button">0 Delete</button>
                            <button id="deleteAllButton" class="btn btn-danger delete-all-button">Delete All</button>
                            <button id="unselectAllButton" class="btn btn-success unselect-all-button" style="display: none;">Unselect All</button>
                        </div>
                    </div>

                    <!-- Bills Submission Table -->
                    <div class="card shadow mb-4 bills-submission-card">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold orange-text">Bills Submission</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-column"></th>
                                            <th>Employee No.</th>
                                            <th>Employee Name</th>
                                            <th>Status</th>
                                            <th>Submission Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billsTableBody">
                                        <!-- Example Data -->
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox"></td>
                                            <td>A001</td>
                                            <td>Daominsy Yabut</td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024/02/15 08:30 AM</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-orange btn-sm view-btn">View</button>
                                                <button class="btn btn-success btn-sm approve-btn">Approve</button>
                                                <button class="btn btn-danger btn-sm reject-btn">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox"></td>
                                            <td>A002</td>
                                            <td>Rovic Balatbat</td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024/02/16 01:45 PM</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-orange btn-sm view-btn">View</button>
                                                <button class="btn btn-success btn-sm approve-btn">Approve</button>
                                                <button class="btn btn-danger btn-sm reject-btn">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox"></td>
                                            <td>A003</td>
                                            <td>Ziggy</td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024/02/17 10:15 AM</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-orange btn-sm view-btn">View</button>
                                                <button class="btn btn-success btn-sm approve-btn">Approve</button>
                                                <button class="btn btn-danger btn-sm reject-btn">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox"></td>
                                            <td>A004</td>
                                            <td>Drexler</td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024/02/17 10:15 AM</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-orange btn-sm view-btn">View</button>
                                                <button class="btn btn-success btn-sm approve-btn">Approve</button>
                                                <button class="btn btn-danger btn-sm reject-btn">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox"></td>
                                            <td>A005</td>
                                            <td>Lorraine</td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024/02/17 10:15 AM</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-orange btn-sm view-btn">View</button>
                                                <button class="btn btn-success btn-sm approve-btn">Approve</button>
                                                <button class="btn btn-danger btn-sm reject-btn">Reject</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right mt-3">
                                <strong id="submissionCount">0/0 employees have submitted</strong>
                            </div>
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup for Viewing Receipts -->
        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <img src="img/receipt.jpg" alt="Receipt">
            <button id="closePopup">Close</button>
        </div>

        <!-- Delete Confirmation Popup -->
        <div class="popup" id="deleteConfirmationPopup">
            <p>Are you sure you want to delete the selected rows?</p>
            <button id="confirmDelete">Yes, Delete</button>
            <button id="cancelDelete">Cancel</button>
        </div>

        <!-- Success Popup -->
        <div class="popup" id="successPopup">
            <p>Successfully deleted!</p>
            <button id="closeSuccessPopup">Close</button>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let totalEmployees = 14; // Set total number of employees
                let submittedCount = document.querySelectorAll("#billsTableBody tr").length;

                // Update submission count
                document.getElementById("submissionCount").textContent = `${submittedCount}/${totalEmployees} employees have submitted`;

                // Update pending notification
                let pendingCount = document.querySelectorAll(".status-badge.pending").length;
                document.getElementById("pendingNotification").textContent = pendingCount;

                // Approve button functionality
                document.querySelectorAll(".approve-btn").forEach(button => {
                    button.addEventListener("click", function () {
                        let statusBadge = this.closest("tr").querySelector(".status-badge");
                        statusBadge.textContent = "Approved";
                        statusBadge.className = "status-badge submitted";
                        updatePendingCount();
                    });
                });

                document.querySelectorAll(".reject-btn").forEach(button => {
    button.addEventListener("click", function () {
        let statusBadge = this.closest("tr").querySelector(".status-badge");
        statusBadge.textContent = "Rejected";
        statusBadge.className = "status-badge rejected";
        updatePendingCount();
    });
});

// View button functionality
document.querySelectorAll(".view-btn").forEach(button => {
    button.addEventListener("click", function () {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    });
});

// Close popup functionality
document.getElementById("closePopup").addEventListener("click", function () {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
});

// Function to update pending count
function updatePendingCount() {
    let pendingCount = document.querySelectorAll(".status-badge.pending").length;
    document.getElementById("pendingNotification").textContent = pendingCount;
}

// Trashcan icon functionality
const trashcanIcon = document.getElementById("trashcanIcon");
const deleteButton = document.getElementById("deleteButton");
const deleteAllButton = document.getElementById("deleteAllButton");
const unselectAllButton = document.getElementById("unselectAllButton");
const rowCheckboxes = document.querySelectorAll(".row-checkbox");

trashcanIcon.addEventListener("click", function () {
    // Show checkboxes in each row
    rowCheckboxes.forEach(checkbox => {
        checkbox.style.display = "block";
    });

    // Show delete buttons
    deleteButton.classList.add("active");
    deleteAllButton.style.display = "inline-block";
});

// Update delete button text based on checked rows
rowCheckboxes.forEach(checkbox => {
    checkbox.addEventListener("change", function () {
        const checkedCount = document.querySelectorAll(".row-checkbox:checked").length;
        deleteButton.textContent = `${checkedCount} Delete`;
    });
});

// Delete all button functionality
deleteAllButton.addEventListener("click", function () {
    rowCheckboxes.forEach(checkbox => {
        checkbox.checked = true;
    });
    deleteButton.textContent = `${rowCheckboxes.length} Delete`;

    // Toggle to Unselect All button
    deleteAllButton.style.display = "none";
    unselectAllButton.style.display = "inline-block";
});

// Unselect all button functionality
unselectAllButton.addEventListener("click", function () {
    rowCheckboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
    deleteButton.textContent = "0 Delete";

    // Toggle back to Delete All button
    unselectAllButton.style.display = "none";
    deleteAllButton.style.display = "inline-block";
});

// Delete button functionality
deleteButton.addEventListener("click", function () {
    const checkedRows = document.querySelectorAll(".row-checkbox:checked");
    if (checkedRows.length > 0) {
        // Show delete confirmation popup
        document.getElementById("overlay").style.display = "block";
        document.getElementById("deleteConfirmationPopup").style.display = "block";
    }
});

// Delete confirmation popup functionality
const confirmDelete = document.getElementById("confirmDelete");
const cancelDelete = document.getElementById("cancelDelete");

confirmDelete.addEventListener("click", function () {
    // Delete checked rows
    const checkedRows = document.querySelectorAll(".row-checkbox:checked");
    checkedRows.forEach(checkbox => {
        checkbox.closest("tr").remove();
    });

    // Update submission count
    submittedCount = document.querySelectorAll("#billsTableBody tr").length;
    document.getElementById("submissionCount").textContent = `${submittedCount}/${totalEmployees} employees have submitted`;

    // Hide popups
    document.getElementById("overlay").style.display = "none";
    document.getElementById("deleteConfirmationPopup").style.display = "none";

    // Show success popup
    document.getElementById("successPopup").style.display = "block";
});

cancelDelete.addEventListener("click", function () {
    // Hide delete confirmation popup
    document.getElementById("overlay").style.display = "none";
    document.getElementById("deleteConfirmationPopup").style.display = "none";
});

// Close success popup functionality
const closeSuccessPopup = document.getElementById("closeSuccessPopup");
closeSuccessPopup.addEventListener("click", function () {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("successPopup").style.display = "none";
});
});
</script>
</div>
</body>

</html>