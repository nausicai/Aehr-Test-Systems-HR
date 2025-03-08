<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>H.R. System - Dashboard</title>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Manager</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                                    <button type="button" class="btn btn-primary" onclick="updateAdminAccount()">Save Changes</button>
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

                                            <!-- DTR Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!-- Wrap the card inside an <a> tag to make it clickable -->
                        <a href="DTR.php" style="text-decoration: none;">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                DTR Submission
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">00</div>
                                                </div>
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


                        <!-- Bills Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="Bills.php" style="text-decoration: none;">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Bills Submission</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">00</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Leave (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="Leave.php" style="text-decoration: none;">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Leave Monitoring
                                            </div>
                                            
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">00</div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">00</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Content Row -->
                    <div class="row ">

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5 mx-auto">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Employees with DTR</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="text-center mt-3">
                                    <strong id="submissionCount">0/0 employees have submitted their DTR</strong>
                                </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Submitted
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Did not submit
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                
                        <!-- DTR Table -->
                        <div class="card shadow mb-4 mx-auto">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DTR Submission</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Employee No.</th>
                                                <th>Employee Name</th>
                                                <th>Status</th>
                                                <th>Submission Date</th>
                                                <th>Action</th> <!-- New Column for Button -->
                                            </tr>
                                        </thead>
                                        <tbody id="dtrTableBody">
                                            <tr>
                                                <td>EMP001</td>
                                                <td>Tiger Nixon</td>
                                                <td class="text-success font-weight-bold">Submitted</td>
                                                <td>2024/02/15 08:30 AM</td>
                                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>EMP002</td>
                                                <td>Garrett Winters</td>
                                                <td class="text-success font-weight-bold">Submitted</td>
                                                <td>2024/02/16 01:45 PM</td>
                                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>EMP003</td>
                                                <td>Ashton Cox</td>
                                                <td class="text-success font-weight-bold">Submitted</td>
                                                <td>2024/02/17 10:15 AM</td>
                                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>EMP004</td>
                                                <td>Cedric Kelly</td>
                                                <td class="text-success font-weight-bold">Submitted</td>
                                                <td>2024/02/18 04:20 PM</td>
                                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>EMP005</td>
                                                <td>Airi Satou</td>
                                                <td class="text-success font-weight-bold">Submitted</td>
                                                <td>2024/02/19 09:05 AM</td>
                                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="mx-2" href="DTR.php">Show more details &rarr;</a>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                let totalEmployees = 14; // Set total number of employees
                                let submittedCount = document.querySelectorAll("#dtrTableBody tr").length;

                                document.getElementById("submissionCount").textContent = `${submittedCount}/${totalEmployees} employees have submitted`;
                            });
                        </script>
                                                
                    </div>



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Employee Management -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Employee Management</h6>
                                </div>
                                <div class="card-body mx-auto">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                src="img/employee-management.jpg" alt="...">
                                </div>
                                  <div class="table-responsive card-body">
                                <table class="table table-bordered" id="leaveTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee No.</th>
                                            <th>Employee Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A001</td>
                                            <td>Rovic Balatbat</td>
                                            <td>rovic@aehr.com</td>
                                            <td>123-456-7890</td>
                                        </tr>
                                        <tr>
                                            <td>A002</td>
                                            <td>Michael Johnson</td>
                                            <td>michael.johnson@example.com</td>
                                            <td>555-123-4567</td>
                                    </tbody>
                                </table>
                            </div>
                                 <div class="mb-4 mx-4">
                                 <a  href="EmployeeManagement.php">Track Employees &rarr;</a>
                                 </div>
                                  </div>
                                    </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Vacation Leave / Sick Leave -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Vacation Leave / Sick Leave</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/vacation-illustration.jpg" alt="...">
                                    </div>
                                    <div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="leaveTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee No.</th>
                                            <th>Employee Name</th>
                                            <th>Vacation Leave (VL)</th>
                                            <th>Sick Leave (SL)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EMP001</td>
                                            <td>Tiger Nixon</td>
                                            <td>10</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>EMP002</td>
                                            <td>Garrett Winters</td>
                                            <td>8</td>
                                            <td>3</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-2">
                                    <a  href="Leave.php">Show more entries &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Bill Submission -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bill Submission</h6>
                                </div>
                                <div class="card-body">
                                <div class="text-center card-body">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/bill-submission.png" alt="...">
                                    </div>
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="leaveTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee No.</th>
                                            <th>Employee Name</th>
                                            <th>Status</th>
                                            <th>Submission Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A001</td>
                                            <td>Daominsy Yabut</td>
                                            <td>Pending</td>
                                            <td>2024/02/15 08:30 AM</td>
                                        </tr>
                                        <tr>
                                            <td>A002</td>
                                            <td>Rovic Balatbat</td>
                                            <td>Pending</td>
                                            <td>2024/02/16 01:45 PM</td>
                                        <tr>
                                            <td>A003</td>
                                            <td>Ziggy Co</td>
                                            <td>Pending</td>
                                            <td>2024/02/17 10:15 AM</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-4 mx-4">
                                 <a  href="Bills.php">Show more details &rarr;</a>
                                 </div>
                                </div>
                            </div>
                        </div>
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
                    <a class="btn btn-primary" href="index.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>