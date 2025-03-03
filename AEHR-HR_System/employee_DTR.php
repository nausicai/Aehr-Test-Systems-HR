<?php
session_start();
include "CRUD/db.php"; // Database connection

if (!isset($_SESSION["employee_no"])) { // Use the correct session variable
    header("Location: index.php");
    exit();
}

$employee_no = $_SESSION["employee_no"]; // Ensure it matches the update query

$sql = "SELECT name FROM employees WHERE employee_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$stmt->bind_result($employee_name);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Time Record</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
<style>
        :root {
            --primary-color: #f57c00;
            --secondary-color: #ff6b6b;
            --background-color: #f4f4f4;
            --text-color: #333;
            --table-header-color: #FE5A1D;
            --button-hover: #d32f2f;
            --modal-background: rgba(0, 0, 0, 0.5);
            --modal-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            overflow-y: auto;
            color: var(--text-color);
        }

        .dashboard {
            width: 95%;
            max-width: 1200px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            text-align: center;
            margin: 20px 0;
            position: relative;
            background: linear-gradient(135deg, #ffffff, #f9f9f9);
            border: 1px solid #ddd;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .logo {
            width: 265px;
        }

        .form-container {
            text-align: left;
            margin-top: 20px;
            max-height: 500px;
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

        .btn {
            padding: 12px 24px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            margin-top: 10px;
            width: 100%;
            max-width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background: var(--button-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn i {
            font-size: 18px;
        }

        #exportButton {
            background: #4CAF50;
        }

        #exportButton:hover {
            background: #45a049;
        }

        .logout-btn {
            background: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #555;
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
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
            transition: background-color var(--transition-speed);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--modal-background);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: var(--modal-shadow);
            max-width: 90%;
            overflow-y: auto;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .cancel-btn {
            background: #555;
        }

        .cancel-btn:hover {
            background: #333;
        }

        .back-btn {
    position: absolute;
    z-index: 1000;
    top: 15px;
    left: 15px;
    background: linear-gradient(135deg, #ff7043, #d84315);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
}

.back-btn i {
    font-size: 18px;
}

.back-btn:hover {
    background: linear-gradient(135deg, #d84315, #ff7043);
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
}


        .form-container table {
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

        #viewSubmissionModal .modal-content {
            max-width: 800px;
            width: 100%;
        }

        #viewSubmissionModal table {
            margin-bottom: 20px;
        }

        #viewSubmissionModal .modal-buttons {
            justify-content: space-between;
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
    #viewSubmissionModal .modal-content {
                max-width: 1200px; /* Adjust as needed */
                width: 90%;
            }
            #viewSubmissionModal .modal-content {
                max-width: 1200px; /* Adjust as needed */
                width: 90%;
            }

            /* Enhanced modal design */
            .modal-content {
                background: white;
                padding: 25px;
                border-radius: 12px;
                text-align: center;
                box-shadow: var(--modal-shadow);
                max-width: 90%;
                overflow-y: auto;
                background: linear-gradient(135deg, #ffffff, #f9f9f9);
                border: 1px solid #ddd;
            }

            .modal-buttons {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 20px;
            }

            .modal-buttons .btn {
                background: var(--primary-color);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: all var(--transition-speed) ease;
                padding: 12px 24px;
            }

            .modal-buttons .btn:hover {
                background: var(--button-hover);
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            }

            .modal-buttons .btn:active {
                transform: translateY(0);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .modal-buttons .cancel-btn {
                background: #555;
            }

            .modal-buttons .cancel-btn:hover {
                background: #333;
            }

            /* Enhanced modal button styles */
            .modal-buttons .btn {
                background: var(--primary-color);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: all var(--transition-speed) ease;
                padding: 12px 24px;
                margin: 5px;
            }

            .modal-buttons .btn:hover {
                background: var(--button-hover);
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            }

            .modal-buttons .btn:active {
                transform: translateY(0);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .modal-buttons .btn.cancel-btn {
                background: #555;
            }

            .modal-buttons .btn.cancel-btn:hover {
                background: #333;
            }

            /* Specific styles for Edit and Resubmit buttons */
            #editButton {
                background: #4CAF50; /* Green */
            }

            #editButton:hover {
                background: #45a049;
            }

            #resubmitButton {
                background: #2196F3; /* Blue */
            }

            #resubmitButton:hover {
                background: #1e88e5;
            }



</style>
</head>


<body>

    <!-- Back Button -->
    <button class="back-btn" onclick="window.location.href='employee_dashboard.php'">
        <i class="fas fa-arrow-left"></i> Back
    </button>



    <div class="dashboard">
        <div class="header">
            <h1>Employee Time Record</h1>
            <img src="img/ATS_Logo.png" alt="Company Logo" class="logo">
        </div>
        <div class="employee-info" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="color:rgb(231, 84, 16); margin-top: -15px;">
        <?php echo htmlspecialchars($employee_name); ?>
    </h1>
    <h4 style="margin-top: -15px; opacity: 0.6;">
        This record will automatically reset every
        <span style="color: rgb(231, 84, 16);">16th and first day</span> of the month
    </h4> 
</div>
        
        <div class="spinner-container">

    <!-- Month Selection -->
    <div class="input-group">
        <label for="month" class="spinner-label"><i class="fas fa-calendar-alt"></i> Months:</label>
        <select id="month" class="styled-select">
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
    </div>

    <!-- Day Selection -->
    <div class="input-group">
        <label for="dayFrom" class="spinner-label"><i class="fas fa-calendar-day"></i> Days:</label>
        <select id="dayFrom" class="styled-select"></select>
        <span>to</span>
        <select id="dayTo" class="styled-select"></select>
    </div>

    <!-- Year Selection -->
    <div class="input-group">
        <label for="year" class="spinner-label"><i class="fas fa-calendar"></i> Years:</label>
        <select id="year" class="styled-select"></select>
    </div>

    <!-- Shift Selection -->
    <div class="input-group">
        <label for="shift" class="spinner-label"><i class="fas fa-clock"></i> Shifts:</label>
        <select id="shift" class="styled-select">
            <option value="Shift 1">SHIFT 1 WORKING HOURS (Monday-Friday)</option>
            <option value="Shift 2">SHIFT 2 WORKING HOURS (Monday-Thursday)</option>
            <option value="Shift 3">SHIFT 3 WORKING HOURS (Wednesday-Saturday)</option>
        </select>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Get current date details
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth(); // 0 = Jan, 1 = Feb, etc.
    const currentDay = currentDate.getDate();

    // Auto-select current month
    const monthSelect = document.getElementById("month");
    if (monthSelect) {
        monthSelect.selectedIndex = currentMonth;
    }

    // Populate years dynamically (from last year up to 2050)
    const yearSelect = document.getElementById("year");
    if (yearSelect) {
        for (let year = currentYear - 1; year <= 2050; year++) {
            let option = new Option(year, year);
            if (year === currentYear) option.selected = true;
            yearSelect.appendChild(option);
        }
    }

    // Function to set day range while allowing full selection (1 to last day of the month)
    function setDayRange() {
        const dayFromSelect = document.getElementById("dayFrom");
        const dayToSelect = document.getElementById("dayTo");

        if (!dayFromSelect || !dayToSelect) return;

        // Get last day of the current month
        const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Determine default start and end days
        let defaultStartDay = currentDay <= 15 ? 1 : 16;
        let defaultEndDay = currentDay <= 15 ? 15 : lastDayOfMonth;

        // Clear existing options
        dayFromSelect.innerHTML = "";
        dayToSelect.innerHTML = "";

        // Populate "from" and "to" day dropdowns
        for (let day = 1; day <= lastDayOfMonth; day++) {
            let fromOption = new Option(day, day);
            let toOption = new Option(day, day);
            if (day === defaultStartDay) fromOption.selected = true;
            if (day === defaultEndDay) toOption.selected = true;
            dayFromSelect.appendChild(fromOption);
            dayToSelect.appendChild(toOption);
        }
    }

    // Set initial day range
    setDayRange();
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById("submitButton");
    const confirmSubmitButton = document.getElementById("confirmSubmit");
    const cancelSubmitButton = document.getElementById("cancelSubmit");
    const confirmationModal = document.getElementById("confirmationModal");
    const successModal = document.getElementById("successModal");
    const modalMessage = document.getElementById("modalMessage");
    const dtrForm = document.getElementById("dtrForm");

    // Prevent multiple event listeners being added
    if (!submitButton.dataset.listenerAdded) {
        submitButton.dataset.listenerAdded = "true";

        // Show confirmation modal when submit button is clicked
        submitButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default submission
            confirmationModal.style.display = "block";
        });

        // Close confirmation modal when cancel button is clicked
        cancelSubmitButton.addEventListener("click", function () {
            confirmationModal.style.display = "none";
        });

        // Confirm submission and send data via AJAX
        confirmSubmitButton.addEventListener("click", function () {
            confirmationModal.style.display = "none"; // Hide confirmation modal

            // Populate hidden inputs before sending data
            document.getElementById("yearHidden").value = document.getElementById("year").value;
            document.getElementById("monthHidden").value = document.getElementById("month").value;
            document.getElementById("dayFromHidden").value = document.getElementById("dayFrom").value;
            document.getElementById("dayToHidden").value = document.getElementById("dayTo").value;
            document.getElementById("shiftHidden").value = document.getElementById("shift").value;

            // Prepare form data
            const formData = new FormData(dtrForm);

            // Send data via fetch API
            fetch("CRUD/submit_dtr.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    modalMessage.textContent = data.message;
                    successModal.style.display = "block"; // Show success modal
                } else {
                    alert(data.message); // Show error message if needed
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }
});

// Close success modal
function closeModal() {
    document.getElementById("successModal").style.display = "none";
}


</script>


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
                    <th rowspan="2" style="color: yellow">Total Hours</th>
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
                    <td><input type="text" name="employeeNo" value="<?php echo htmlspecialchars($employee_no); ?>" readonly></td>
                    <td><input type="text" name="employeeName" value="<?php echo htmlspecialchars($employee_name); ?>" readonly></td>
                    
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

                    <td><input type="number" id="totalHours" name="totalHours" readonly></td>
                </tr>
            </tbody>
        </table>

        <script>
document.addEventListener("DOMContentLoaded", function () {
    function calculateTotalHours() {
        let total = 0;
        document.querySelectorAll("#mainTable .hourInput").forEach(input => {
            const value = parseFloat(input.value) || 0;
            total += value;
        });
        document.getElementById("totalHours").value = total;
    }

    document.querySelectorAll("#mainTable .hourInput").forEach(input => {
        input.addEventListener("input", calculateTotalHours);
    });
    
    calculateTotalHours();
});
</script>

        <table>
            <thead>
                <tr>
                    <th>Weekend Support <span style="color: yellow">(Days)</span></th>
                    <th>Regular Holiday Overtime <span style="color: yellow">(Hours)</span></th>
                    <th>Special Holiday Overtime <span style="color: yellow">(Hours)</span></th>
                    <th>Night Differential <span style="color: yellow">(Hours)</span></th>
                    <th>Salary Deduction <span style="color: yellow">(Hours)</span></th>
                    <th>VL <span style="color: yellow">(Hours)</span></th>
                    <th>SL <span style="color: yellow">(Hours)</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" name="weekendSupport"></td>
                    <td><input type="number" name="regularHolidayOvertime"></td>
                    <td><input type="number" name="specialHolidayOvertime"></td>
                    <td><input type="number" name="nightDifferential"></td>
                    <td><input type="number" name="salaryDeduction"></td>
                    <td><input type="number" name="vlHours"></td>
                    <td><input type="number" name="slHours"></td>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="year" id="yearHidden">
        <input type="hidden" name="month" id="monthHidden">
        <input type="hidden" name="dayFrom" id="dayFromHidden">
        <input type="hidden" name="dayTo" id="dayToHidden">
        <input type="hidden" name="shift" id="shiftHidden">
    </div>


    <div class="customized-button-container">
        <button type="button" class="customized-btn" id="submitButton">
            <i class="fas fa-check"></i> Submit
        </button>
        <button class="customized-btn" id="exportButton">
        <i class="fas fa-file-excel"></i> Export to Excel
    </button>
</div>  
    </div>
</form>

<!-- Modals -->
<div id="confirmationModal" class="customized-modal">
    <div class="customized-modal-content">
        <h2>Confirm Submission</h2>
        <p>Are you sure you want to submit this information?</p>
        <div class="customized-modal-buttons">
            <button id="confirmSubmit" class="customized-btn">Yes, Submit</button>
            <button id="cancelSubmit" class="customized-btn customized-cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <p id="modalMessage">Record submitted successfully!</p>
    </div>
</div>


<div id="noDataModal" class="customized-modal">
    <div class="customized-modal-content">
        <h2>No Data to Export</h2>
        <p>You have nothing to export because you haven't submitted anything yet.</p>
        <div class="customized-modal-buttons">
            <button id="closeNoDataModal" class="customized-btn">OK</button>
        </div>
    </div>
</div>

<!-- Confirmation Modal for Export -->
<div id="exportConfirmationModal" class="customized-modal">
    <div class="customized-modal-content">
        <h2>Confirm Export</h2>
        <p>Are you sure you want to export the data to Excel?</p>
        <div class="customized-modal-buttons">
            <button id="confirmExport" class="customized-btn">
                <i class="fas fa-spinner fa-spin" id="exportSpinner"></i> Yes, Export
            </button>
            <button id="cancelExport" class="customized-btn customized-cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<!-- Success Modal After Export -->
<div id="exportSuccessModal" class="customized-modal">
    <div class="customized-modal-content">
        <h2>Export Successful</h2>
        <p>Your data has been successfully exported to Excel!</p>
        <div class="customized-modal-buttons">
            <button id="closeExportSuccessModal" class="customized-btn">OK</button>
        </div>
    </div>
</div>

<!-- JavaScript -->
 <script>
    function showModal(modalId) {
    document.getElementById(modalId).style.display = "flex";
}

function hideModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

document.getElementById("exportButton").addEventListener("click", function () {
    let hasData = false;
    document.querySelectorAll(".hours-input").forEach(input => {
        if (input.value.trim() !== "") {
            hasData = true;
        }
    });
    if (hasData) {
        showModal("exportConfirmationModal");
    } else {
        showModal("noDataModal");
    }
});

document.getElementById("confirmExport").addEventListener("click", function () {
    alert("Exporting to Excel...");
    hideModal("exportConfirmationModal");
    showModal("exportSuccessModal");
});

document.getElementById("cancelExport").addEventListener("click", function () {
    hideModal("exportConfirmationModal");
});

document.getElementById("closeNoDataModal").addEventListener("click", function () {
    hideModal("noDataModal");
});

document.getElementById("closeExportSuccessModal").addEventListener("click", function () {
    hideModal("exportSuccessModal");
});

    </script>


<style>
    /* Modal Styling */
    .customized-modal {
        display: none; /* Ensures modal is hidden on load */
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease-in-out;
    }

    .customized-modal-content {
        background: #fff;
        padding: 20px;
        width: 90%;
        max-width: 400px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        animation: customized-slideIn 0.3s ease-in-out;
    }

    @keyframes customized-slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .customized-modal-buttons {
        margin-top: 15px;
        display: flex;
        justify-content: space-around;
    }

    .customized-btn {
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 20px; /* Increased padding */
        font-size: 16px; /* Increased font size */
        cursor: pointer;
        border-radius: 6px; /* Slightly rounded corners */
        transition: background 0.2s;
    }

    .customized-btn:hover {
        background-color: #0056b3;
    }

    .customized-cancel-btn {
        background-color: #dc3545;
    }

    .customized-cancel-btn:hover {
        background-color: #c82333;
    }


    </style>

        </div>
    </body>
</html>