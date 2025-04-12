<?php
include "session/employee.php"
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
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('img/AEHR_bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    overflow: hidden;
    color: var(--text-color);
    margin: 0; /* Add this to remove default margin */
    overflow-y: auto; /* Enables vertical scrolling */
}

/* Dark overlay that will cover ENTIRE page */
body::before {
    content: "";
    position: fixed; /* Changed from absolute to fixed */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -1;
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
    background: rgba(255, 255, 255, 0.85); /* Semi-transparent white */
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: none; /* Ensures no blur effect */
    
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

        /* Back Button Hover Effect */
button:hover .back-button-icon {
  width: calc(100% - 8px) !important;
}

/* Back Button Text Alignment */
button p {
  position: relative;
  z-index: 5;
  margin: 0;
  line-height: 56px;
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

        input[type="number"] {
    -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}


        #submitButton.resubmit {
    background-color: #ff9800;
}

#submitButton.resubmit:hover {
    background-color: #f57c00;
}

.resubmit-btn {
    background-color: #ff9800 !important;
}

.resubmit-btn:hover {
    background-color: #f57c00 !important;
}
        /* Modal Container */
        .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--modal-background);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

/* Visible Modal */
.modal.show {
    display: flex;
}


/* Animated Modal Content */
.modal.show .modal-content {
    transform: scale(1);
    opacity: 1;
}

/* Modal Content Box */
.modal-content {
    background: white;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    position: relative;
    margin: 20px;
    box-shadow: var(--modal-shadow);
}

/* Close Button */
.modal-close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
}
.modal-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 20px;
}

        .cancel-btn {
            background: #555;
        }

        .cancel-btn:hover {
            background: #333;
        }

     /* Remove close button from confirmation modal */
#confirmationModal .modal-close {
    display: none;
}

/* Center success modal button */
#successModal .modal-content {
    text-align: center;
}

#successModal .btn {
    margin: 0 auto;
}

/* Ensure modal backdrop disappears */
.modal.show {
    background: var(--modal-background);
}

/* Modal Animation */
@keyframes fadeIn {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/* Button Styles */
.customized-modal-buttons {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.customized-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 6px;
    transition: background 0.2s;
}

.customized-btn:hover {
    background-color: #0056b3;
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
    


/* Mobile Responsive Styles */
@media (max-width: 768px) {
    body {
        padding: 10px;
        min-height: auto;
        overflow-x: hidden;
    }

    .dashboard {
        width: 100%;
        padding: 15px;
        margin: 10px 0;
        box-shadow: none;
        border-radius: 0;
    }

    .header {
        flex-direction: column;
        text-align: center;
    }

    .logo {
        margin-top: 15px;
        width: 200px;
    }

    .employee-info {
        flex-direction: column;
        align-items: flex-start;
    }

    .employee-info h4 {
        margin-top: 10px;
        font-size: 14px;
    }

    .spinner-container {
        flex-direction: column;
        gap: 10px;
    }

    .input-group {
        width: 100%;
    }

    .styled-select {
        width: 100%;
    }

    /* Table adjustments */
    .form-container {
        overflow-x: auto;
        padding: 0;
        max-height: none;
    }

    table {
        font-size: 12px;
    }

    table th, table td {
        padding: 6px;
    }

    /* Form inputs */
    .form-container input[type="number"],
    .form-container input[type="text"] {
        width: 80%;
        padding: 4px;
        font-size: 12px;
    }

    /* Button adjustments */
    .customized-button-container {
        flex-direction: column;
        gap: 10px;
    }

    .customized-btn {
        width: 100%;
        padding: 10px;
        font-size: 14px;
    }

    /* Modal adjustments */
    .modal-content {
        width: 95%;
        padding: 15px;
    }

    /* Hide some less important elements on mobile */
    .employee-info h4 span {
        display: none;
    }
}

@media (max-width: 480px) {
    /* Further adjustments for very small screens */
    .dashboard {
        padding: 10px;
    }

    table {
        font-size: 11px;
    }

    table th, table td {
        padding: 4px;
    }

    .form-container input[type="number"],
    .form-container input[type="text"] {
        width: 70%;
        font-size: 11px;
    }

    /* Stack date range selectors */
    .input-group span {
        display: none;
    }

    #dayFrom, #dayTo {
        width: 45%;
        margin: 0 2%;
    }
}

@media (max-width: 768px) {
    .dashboard {
        width: 90%;
        padding: 15px;
        margin: 15px auto;
        border-radius: 8px;
    }
}

@media (max-width: 480px) {
    .dashboard {
        width: 95%;
        padding: 12px;
        margin: 10px auto;
        border-radius: 6px;
    }
}
</style>
</head>


<body>

 <!-- Back Button -->
<div style="position: absolute; top: 15px; left: 15px; z-index: 1000;">
  <button
    style="background-color: white; text-align: center; width: 120px; border-radius: 10px; height: 36px; position: relative; color: black; font-size: 14px; font-weight: 600; border: none; cursor: pointer; overflow: hidden;"
    type="button"
    onclick="history.back();"
  >
    <div
      style="background-color:  #FE5A1D; border-radius: 8px; height: 30px; width: 25%; display: flex; align-items: center; justify-content: center; position: absolute; left: 3px; top: 3px; z-index: 10; transition: width 0.5s;"
      class="back-button-icon"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1024 1024"
        height="16px"
        width="16px"
      >
        <path
          d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"
          fill="#ffffff"
        ></path>
        <path
          d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"
          fill="#ffffff"
        ></path>
      </svg>
    </div>
    <p style="transform: translateX(5px); line-height: 36px; margin: 0;">Back</p>
  </button>
</div>


    <div class="dashboard">
        <div class="header">
            <h1>Employee Time Record</h1>
            <img src="img/ATSPH_Logo.png" alt="Company Logo" class="logo">
        </div>
        <div class="employee-info" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="color:rgb(231, 84, 16); margin-top: -15px;">
        <?php echo htmlspecialchars($employee_name); ?>
    </h1>
    <h4 style="margin-top: -15px; opacity: 0.8;">
    This record will automatically reset every<br>
    <span style="color: rgb(231, 84, 16); display: inline-block; margin-top: 5px;">
    1st and 16th day of the month
    </span>
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
    const dtrForm = document.getElementById("dtrForm");

    function showModal(modal) {
        modal.style.display = "block";
    }

    function hideModal(modal) {
        modal.style.display = "none";
    }

    submitButton.addEventListener("click", function (event) {
        event.preventDefault();
        showModal(confirmationModal);
    });

    cancelSubmitButton.addEventListener("click", function () {
        hideModal(confirmationModal);
    });

    confirmSubmitButton.addEventListener("click", function () {
        hideModal(confirmationModal);

        // Populate hidden inputs before sending data
        document.getElementById("yearHidden").value = document.getElementById("year").value;
        document.getElementById("monthHidden").value = document.getElementById("month").value;
        document.getElementById("dayFromHidden").value = document.getElementById("dayFrom").value;
        document.getElementById("dayToHidden").value = document.getElementById("dayTo").value;
        document.getElementById("shiftHidden").value = document.getElementById("shift").value;

        const formData = new FormData(dtrForm);

        fetch("CRUD/submit_dtr.php", {
            method: "POST",
            body: formData,
            headers: {
                "Accept": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                showModal(successModal); // Show success modal on success
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });

});

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
                    <td style="background-color:rgba(82, 82, 82, 0.3)"><input type="text" name="employeeNo"  value="<?php echo htmlspecialchars($employee_no); ?>" readonly></td>
                    <td style="background-color:rgba(82, 82, 82, 0.3)"><input type="text" name="employeeName" value="<?php echo htmlspecialchars($employee_name); ?>" readonly></td>
                    
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

                    <td style="background-color:rgba(82, 82, 82, 0.3)"><input type="number" id="totalHours" name="totalHours" readonly></td>
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


document.addEventListener("DOMContentLoaded", function () {
    let inputs = document.querySelectorAll(".hourInput"); // Select all input fields

    inputs.forEach((input, index) => {
        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") { 
                event.preventDefault(); // Prevent form submission

                let nextInput = inputs[index + 1]; // Get the next input field
                if (nextInput) {
                    nextInput.focus(); // Move focus to the next input
                }
            }
        });
    });
});

</script>

        <table>
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

        <script>
document.addEventListener("DOMContentLoaded", function () {
    // Select all inputs with class "hourInput2"
    const inputs = document.querySelectorAll(".hourInput2");

    inputs.forEach((input, index) => {
        input.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Prevent form submission

                const nextInput = inputs[index + 1]; // Get the next input
                if (nextInput) {
                    nextInput.focus(); // Move focus to the next field
                }
            }
        });
    });
});
</script>


        <input type="hidden" name="year" id="yearHidden">
        <input type="hidden" name="month" id="monthHidden">
        <input type="hidden" name="dayFrom" id="dayFromHidden">
        <input type="hidden" name="dayTo" id="dayToHidden">
        <input type="hidden" name="shift" id="shiftHidden">
    </div>



    <div class="customized-button-container">

    <!-- Submit Button -->
    <button type="button" class="customized-btn" id="submitButton">
    <i class="fas fa-check"></i> Submit
</button>

   
</div>  
    </div>
</form>




<!-- Updated Modal HTML -->
<!-- Confirmation Modal -->
<div id="confirmationModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div class="modal-content" style="background: white; padding: 20px; border-radius: 8px; width: 90%; max-width: 400px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); text-align: center; position: relative;">
        <button class="modal-close" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 20px; cursor: pointer;">&times;</button>
        <h2 style="margin: 0 0 20px 0;">Confirm Submission</h2>
        <p>Are you sure you want to submit this information?</p>
        <div style="display: flex; gap: 10px; justify-content: center; margin-top: 25px;">
            <button id="confirmSubmit" class="btn">Submit</button>
            <button id="cancelSubmit" class="btn cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1000;">
    <div class="modal-content" style="background: white; padding: 20px; border-radius: 8px; width: 90%; max-width: 400px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); text-align: center; position: relative; margin: auto;">
        <div style="text-align: center;">
            <div style="font-size: 50px; color: #4CAF50; margin-bottom: 15px;">✓</div>
            <h3 style="margin: 0 0 15px 0;">Success!</h3>
            <p style="margin-bottom: 25px;">Record submitted successfully!</p>
            <div style="display: flex; justify-content: center;">
                <button id="closeSuccessModal" class="btn">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const modals = {
        confirm: document.getElementById('confirmationModal'),
        success: document.getElementById('successModal')
    };

    function hideModals() {
        Object.values(modals).forEach(modal => {
            modal.style.display = "none";
            document.body.style.overflow = 'auto';
        });
    }

    function showModal(modal) {
        hideModals();
        if (modals[modal]) {
            modals[modal].style.display = "flex";
            modals[modal].style.justifyContent = "center"; // Ensure centering
            modals[modal].style.alignItems = "center"; // Ensure centering
            document.body.style.overflow = 'hidden';
        }
    }

    document.getElementById('submitButton')?.addEventListener('click', (e) => {
        e.preventDefault();
        showModal('confirm');
    });

    document.getElementById('confirmSubmit')?.addEventListener('click', () => {
        hideModals();
        showModal('success');
    });

    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) hideModals();
    });

    document.getElementById('cancelSubmit')?.addEventListener('click', hideModals);
    
    document.getElementById('closeSuccessModal')?.addEventListener('click', function () {
    hideModals();
    location.reload(); // Refresh the page
});

});
</script>



<script>
document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById("submitButton");
    let isEditMode = false;

    function calculateTotalHours() {
        let total = 0;
        document.querySelectorAll(".hourInput").forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        document.getElementById("totalHours").value = total;
    }

    function checkExistingData() {
        const formData = new FormData();
        formData.append('month', document.getElementById('month').value);
        formData.append('dayFrom', document.getElementById('dayFrom').value);
        formData.append('dayTo', document.getElementById('dayTo').value);
        formData.append('year', document.getElementById('year').value);
        formData.append('shift', document.getElementById('shift').value);
        formData.append('employee_no', '<?php echo $employee_no; ?>');

        fetch('CRUD/fetch_dtr.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                submitButton.innerHTML = '<i class="fas fa-sync"></i> Resubmit';
                submitButton.classList.add('resubmit-btn');
                isEditMode = true;

                const fieldMap = {
                    general_field: 'general',
                    admin_field: 'admin',
                    finance_field: 'finance',
                    design_field: 'design',
                    board_repair: 'boardRepair',
                    pm: 'pm',
                    tech_support: 'technicalSupport',
                    maint_suport: 'maintenance',
                    log_comm: 'logistics',
                    report_meeting: 'reports',
                    warranty: 'warranty',
                    bill_service: 'billableService',
                    upgrades: 'upgrade',
                    presales_supp: 'preSales',
                    special_proj: 'specialProject',
                    weekends_supp: 'weekendSupport',
                    regholiday_ot: 'regularHolidayOvertime',
                    specholiday_ot: 'specialHolidayOvertime',
                    reg_ot: 'regularOvertime',
                    night_diff: 'nightDifferential',
                    salary_deduc: 'salaryDeduction',
                    vl: 'vlHours',
                    sl: 'slHours'
                };

                Object.entries(fieldMap).forEach(([dbField, formField]) => {
                    const input = document.querySelector(`[name="${formField}"]`);
                    if (input && data.data[dbField]) {
                        input.value = data.data[dbField];
                    }
                });

                calculateTotalHours();
            } else {
                submitButton.innerHTML = '<i class="fas fa-check"></i> Submit';
                submitButton.classList.remove('resubmit-btn');
                isEditMode = false;
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Event listeners
    ['month', 'dayFrom', 'dayTo', 'year', 'shift'].forEach(id => {
        document.getElementById(id).addEventListener('change', checkExistingData);
    });

    document.querySelectorAll('.hourInput').forEach(input => {
        input.addEventListener('input', calculateTotalHours);
    });

    // Initial check
    checkExistingData();
});
</script>





        </div>

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