<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>H.R. System - DTR Submission</title>

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
            border: 2px solid rgb(0, 0, 0);
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
            border-top: 1px solid #FE5A1D;
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
                <h1 class="h3 mb-0 text-gray-800">DTR Submissions</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

        <!-- Main Content -->
        <div id="content">
            <!-- DTR Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-orange">DTR Submission</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dtrTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Employee No.</th>
            <th>Employee Name</th>
            <th>Category</th>
            <th>General</th>
            <th>Admin</th>
            <th>Finance</th>
            <th>Design</th>
            <th>Board Repair</th>
            <th>PM</th>
            <th>Technical Support</th>
            <th>Maintenance Support</th>
            <th>Logistics & Comm.</th>
            <th>CDT/Reports/Meetings</th>
            <th>Warranty</th>
            <th>Billable Service</th>
            <th>Upgrade</th>
            <th>Pre-Sales Support</th>
            <th>Special Project</th>
            <th>Total Hours</th>
            
            <th>Regular Holiday OT</th>
            <th>Special Holiday OT</th>
            <th>Regular OT</th>
            <th>Night Diff OT</th>
            <th>Salary Deduction</th>
            <th>Leave Conversion</th>
            <th>Leave Balances</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="dtrTableBody">
        <!-- Example row with edit button -->
        <tr>
            <td>1</td>
            <td contenteditable="false">A001</td>
            <td contenteditable="false">Daominsy Yabut</td>
            <td contenteditable="false">Hours</td>
            <td contenteditable="false">8</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">4</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">8</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td>
                <button class="btn btn-success btn-sm edit-btn">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td contenteditable="false">A003</td>
            <td contenteditable="false">Rovic Balatbat</td>
            <td contenteditable="false">Hours</td>
            <td contenteditable="false">44</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">4</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">22</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">8</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td contenteditable="false">0</td>
            <td>
                <button class="btn btn-success btn-sm edit-btn">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </td>
        </tr>
    </tbody>
</table>
                    </div>
                    <div class="text-right mt-3">
                        <strong id="submissionCount">2 employees have submitted</strong>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-orange">DTR Submission</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                    <tbody>
                                        <tr>
                                            <td>EMP001</td>
                                            <td>Tiger Nixon</td>
                                            <td class="text-success font-weight-bold">Submitted</td>
                                            <td>2024/02/15 08:30 AM</td>
                                            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
                                        </tr>
                                        <tr>
                                            <td>EMP002</td>
                                            <td>Garrett Winters</td>
                                            <td class="text-success font-weight-bold">Submitted</td>
                                            <td>2024/02/16 01:45 PM</td>
                                            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
                                        </tr>
                                        <tr>
                                            <td>EMP003</td>
                                            <td>Ashton Cox</td>
                                            <td class="text-success font-weight-bold">Submitted</td>
                                            <td>2024/02/17 10:15 AM</td>
                                            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
                                        </tr>
                                        <tr>
                                            <td>EMP004</td>
                                            <td>Cedric Kelly</td>
                                            <td class="text-success font-weight-bold">Submitted</td>
                                            <td>2024/02/18 04:20 PM</td>
                                            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
                                        </tr>
                                        <tr>
                                            <td>EMP005</td>
                                            <td>Airi Satou</td>
                                            <td class="text-success font-weight-bold">Submitted</td>
                                            <td>2024/02/19 09:05 AM</td>
                                            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right mt-3">
                                <strong id="submissionCount2">5/14 employees have submitted</strong>
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
                        <button type="button" class="btn btn-primary" onclick="updateAdminAccount()">Save Changes</button>
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

        <!-- View Data Modal -->
        <div class="modal fade" id="viewDataModal" tabindex="-1" role="dialog" aria-labelledby="viewDataModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document"> <!-- Changed to modal-xl for extra large size -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDataModalLabel">Employee Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive"> <!-- Added for horizontal scrolling -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Employee No.</th>
                                        <th>Employee Name</th>
                                        <th>Category</th>
                                        <th>General</th>
                                        <th>Admin</th>
                                        <th>Finance</th>
                                        <th>Design</th>
                                        <th>Board Repair</th>
                                        <th>PM</th>
                                        <th>Technical Support</th>
                                        <th>Maintenance Support</th>
                                        <th>Logistics & Comm.</th>
                                        <th>CDT/Reports/Meetings</th>
                                        <th>Warranty</th>
                                        <th>Billable Service</th>
                                        <th>Upgrade</th>
                                        <th>Pre-Sales Support</th>
                                        <th>Special Project</th>
                                        <th>Total Hours</th>
                                        <th>Regular Holiday OT</th>
                                        <th>Special Holiday OT</th>
                                        <th>Regular OT</th>
                                        <th>Night Diff OT</th>
                                        <th>Salary Deduction</th>
                                        <th>Leave Conversion</th>
                                        <th>Leave Balances</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="viewEmpNo"></td>
                                        <td id="viewEmpName"></td>
                                        <td id="viewCategory"></td>
                                        <td id="viewGeneral"></td>
                                        <td id="viewAdmin"></td>
                                        <td id="viewFinance"></td>
                                        <td id="viewDesign"></td>
                                        <td id="viewBoardRepair"></td>
                                        <td id="viewPM"></td>
                                        <td id="viewTechnicalSupport"></td>
                                        <td id="viewMaintenanceSupport"></td>
                                        <td id="viewLogisticsComm"></td>
                                        <td id="viewCDTReportsMeetings"></td>
                                        <td id="viewWarranty"></td>
                                        <td id="viewBillableService"></td>
                                        <td id="viewUpgrade"></td>
                                        <td id="viewPreSalesSupport"></td>
                                        <td id="viewSpecialProject"></td>
                                        <td id="viewTotalHours"></td>
                                        <td id="viewRegularHolidayOT"></td>
                                        <td id="viewSpecialHolidayOT"></td>
                                        <td id="viewRegularOT"></td>
                                        <td id="viewNightDiffOT"></td>
                                        <td id="viewSalaryDeduction"></td>
                                        <td id="viewLeaveConversion"></td>
                                        <td id="viewLeaveBalances"></td>
                                        <td id="viewStatus"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Successfully edited field.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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
        