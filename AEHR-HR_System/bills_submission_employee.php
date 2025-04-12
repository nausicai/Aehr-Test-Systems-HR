<?php
include "session/employee.php"
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Phone Allowance Reimbursement Request</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .view-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    z-index: 1000;
    }

    .view-modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        max-width: 90%;
        max-height: 90%;
        overflow-y: auto;
    }

    .file-preview {
        margin-bottom: 20px;
    }

    .file-preview img, .file-preview embed, .file-preview pre {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
        .edit-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .edit-modal-content {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        width: 500px;
        max-width: 90%;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
        text-align: left;
        max-height: 90vh; /* Set height to 85% of the viewport */
        overflow-y: auto; /* Enables vertical scrolling */
    }


    h2 {
        margin-bottom: 15px;
        color: #000080;
    }
    .edit-modal-content {
    max-width: 90%; /* Adjust width as needed */
    overflow-x: auto; /* Enable horizontal scrolling */
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
        white-space: nowrap; /* Prevent table from breaking */
    }

    .edit-table {
        width: 100%;
        border-collapse: collapse;
    }

    .edit-table {
        width: 100%;
        border-collapse: collapse;
    }

    .edit-table th {
        background:  #f57c00;
        color: white;
        padding: 10px;
        text-align: left;
    }

    .edit-table td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    input, select {
        width: 100%;
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .confirm-btn, .cancel-btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .confirm-btn {
        background: #28a745;
        color: white;
    }

    .cancel-btn {
        background: #dc3545;
        color: white;
    }
            .upload-section {
        margin-bottom: 30px;
    }

    .upload-label {
        display: block;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .upload-input {
        display: none;
    }

    .upload-btn {
        padding: 15px 25px;
        background: #000080;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .upload-btn:hover {
        background:rgb(13, 13, 213);
        transform: translateY(-5px);
    }

    .preview-section {
        margin-top: 20px;
    }

    .preview-label {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .preview-content {
        max-width: 100%;
        height: auto;
        border: 2px dashed #f57c00;
        border-radius: 8px;
        padding: 10px;
        background: #f9f9f9;
    }

    .file-preview {
        position: relative;
        margin-bottom: 10px;
    }

    .file-preview img, .file-preview embed, .file-preview pre {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
    
    body {
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Changed from center to flex-start */
    min-height: 100vh;
    background-image: url('img/AEHR_bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    overflow: auto; /* Changed from hidden to auto */
    color: var(--text-color);
    margin: 0;
    padding: 20px 0; /* Added padding */
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

.bills-container {
    width: 95%;
    max-width: 1200px;
    background: rgba(255, 255, 255, 0.85); /* Semi-transparent white */
    padding: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: 20px auto;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: none; /* Ensures no blur effect */
}

            .logo img {
                width: 100%;
                max-width: 300px;
                margin-bottom: 20px;
            }

            .back-btn {
                position: absolute;
                top: 20px;
                left: 20px;
                background: linear-gradient(135deg, #f57c00, #d32f2f);
                color: white;
                border: none;
                border-radius: 8px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }

            .back-btn:hover {
                background: linear-gradient(135deg, #d32f2f, #f57c00);
                transform: translateY(-5px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            }

            .button-container {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 20px;
            }

            .submit-btn, .history-btn {
                padding: 15px 25px;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .submit-btn {
                background:  #f57c00;
            }

            .submit-btn:hover {
                background:#ff6b6b;
                transform: translateY(-5px);
            }

            .history-btn {
                background:rgb(0, 0, 0);
            }

            .history-btn:hover {
                background: rgb(53, 53, 54);
                transform: translateY(-5px);
            }

            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .modal-content {
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 0.3s ease;
            }

            .modal-content h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }

            .modal-content p {
                margin-bottom: 20px;
                font-size: 18px;
                color: #555;
            }

            .modal-content button {
                padding: 10px 20px;
                margin: 0 10px;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .modal-content button.confirm-btn {
                background: #4CAF50;
                color: white;
            }

            .modal-content button.confirm-btn:hover {
                background: #45a049;
                transform: translateY(-5px);
            }

            .modal-content button.cancel-btn {
                background: #f57c00;
                color: white;
            }

            .modal-content button.cancel-btn:hover {
                background: #d32f2f;
                transform: translateY(-5px);
            }

            .success-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .success-modal-content {
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 0.3s ease;
            }

            .success-modal-content h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }

            .success-modal-content p {
                margin-bottom: 20px;
                font-size: 18px;
                color: #555;
            }

            .success-modal-content button {
                padding: 10px 20px;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .success-modal-content button:hover {
                background: #45a049;
                transform: translateY(-5px);
            }

            .error-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .error-modal-content {
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 0.3s ease;
            }

            .error-modal-content h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #d32f2f;
            }

            .error-modal-content p {
                margin-bottom: 20px;
                font-size: 18px;
                color: #555;
            }

            .error-modal-content button {
                padding: 10px 20px;
                background: #f57c00;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .error-modal-content button:hover {
                background: #d32f2f;
                transform: translateY(-5px);
            }


            .delete-all-btn, .close-history-modal-btn {
                padding: 10px 20px;
                background: #ff6b6b;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .delete-all-btn:hover, .close-history-modal-btn:hover {
                background: #d32f2f;
                transform: translateY(-5px);
            }

            .close-history-modal-btn {
                background: #4CAF50;
            }

            .close-history-modal-btn:hover {
                background: #45a049;
            }

            .clear-confirmation-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .clear-confirmation-modal-content {
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 0.3s ease;
            }

            .clear-confirmation-modal-content h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }

            .clear-confirmation-modal-content p {
                margin-bottom: 20px;
                font-size: 18px;
                color: #555;
            }

            .clear-confirmation-modal-content button {
                padding: 10px 20px;
                margin: 0 10px;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .clear-confirmation-modal-content button.confirm-clear-btn {
                background: #ff6b6b;
                color: white;
            }

            .clear-confirmation-modal-content button.confirm-clear-btn:hover {
                background: #d32f2f;
                transform: translateY(-5px);
            }

            .clear-confirmation-modal-content button.cancel-clear-btn {
                background: #4CAF50;
                color: white;
            }

            .clear-confirmation-modal-content button.cancel-clear-btn:hover {
                background: #45a049;
                transform: translateY(-5px);
            }

            .clear-success-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .clear-success-modal-content {
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 0.3s ease;
            }

            .clear-success-modal-content h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }

            .clear-success-modal-content p {
                margin-bottom: 20px;
                font-size: 18px;
                color: #555;
            }

            .clear-success-modal-content button {
                padding: 10px 20px;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .clear-success-modal-content button:hover {
                background: #45a049;
                transform: translateY(-5px);
            }

            .clear-error-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .clear-error-modal-content {
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 0.3s ease;
            }

            .clear-error-modal-content h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #d32f2f;
            }

            .clear-error-modal-content p {
                margin-bottom: 20px;
                font-size: 18px;
                color: #555;
            }

            .clear-error-modal-content button {
                padding: 10px 20px;
                background: #f57c00;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            .clear-error-modal-content button:hover {
                background: #d32f2f;
                transform: translateY(-5px);
            }

            .department-phone-allowance {
                margin-bottom: 30px;
            }

            .department-phone-allowance h2 {
                font-size: 24px;
                color: #333;
                margin-bottom: 20px;
                text-align: center;
            }

            .department-phone-allowance table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .department-phone-allowance table th,
            .department-phone-allowance table td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: left;
            }

            .department-phone-allowance table th {
                background-color: rgba(0, 0, 128, 0.9); 
                color: white;
                font-weight: bold;
            }

            .department-phone-allowance table th:not([colspan]) {
                background-color: rgba(254, 90, 29, 0.9);
                font-size: 13px;
            }

            .department-phone-allowance table tr:hover {
                background-color: rgba(245, 245, 245, 0.8);
            }

            .department-phone-allowance table input[type="text"],
            .department-phone-allowance table select {
                width: 100%;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 14px;
                transition: border-color 0.3s ease;
            }
            .department-phone-allowance table input[type="text"]:focus,
            .department-phone-allowance table select:focus {
                border-color: #FE5A1D;
                outline: none;
            }
   

   



    /* Individual Button Colors */
    .view-btn {
        background: #3498db;
        color: white;
    }

    .view-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }transform: translateY(-2px);


    .edit-btn {
        background: #f39c12;
        color: white;
    }

    .edit-btn:hover {
        background: #e67e22;
        transform: translateY(-2px);
    }

    .delete-btn {
        background: #c0392b;
        color: white;
    }

    .delete-btn:hover {
        background: #e74c3c;
        transform: translateY(-2px);
    }

   
    .modal, .success-modal, .error-modal, .history-modal, .clear-confirmation-modal, .clear-success-modal, .clear-error-modal, .edit-modal {
        display: none; /* Ensure all modals are hidden by default */
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

        

            @media (max-width: 480px) {
                .bills-container {
                    padding: 25px;
                }
                .upload-label, .preview-label {
                    font-size: 16px;
                }
                .upload-btn, .submit-btn, .history-btn {
                    font-size: 14px;
                    padding: 12px 20px;
                }
            }

            .back-btn-new {
    position: absolute;
    top: 10px;
    left: 10px;
    background: white;
    text-align: center;
    width: 105px;
    border-radius: 8px;
    height: 36px;
    color: black;
    font-size: 14px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.back-btn-new:hover {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
}

.back-btn-new .btn-icon {
    background: #e74c3c;
    border-radius: 6px;
    height: 28px;
    width: 25%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 4px;
    top: 4px;
    z-index: 10;
    transition: all 0.4s ease;
}

.back-btn-new:hover .btn-icon {
    width: calc(100% - 8px);
}

.back-btn-new .btn-text {
    position: relative;
    left: 22px;
    transition: all 0.3s ease;
    font-size: 13px;
}

.back-btn-new:hover .btn-text {
    color: white;
}

/* Mobile Table Adjustments */
@media (max-width: 768px) {
    /* Make tables fit screen width */
    .department-table,
    .department-phone-allowance table {
        width: 100%;
        max-width: 100%;
    }

    /* Adjust table cell padding */
    .department-table th,
    .department-table td,
    .department-phone-allowance table th,
    .department-phone-allowance table td {
        padding: 6px;
        font-size: 13px;
    }

    /* Make inputs fill available space */
    .department-phone-allowance table input[type="text"],
    .department-phone-allowance table input[type="date"],
    .department-phone-allowance table select {
        width: 100%;
        min-width: 80px; /* Ensure minimum width for visibility */
        box-sizing: border-box;
        padding: 5px;
        font-size: 13px;
    }

    /* Department info table - 2 column layout */
    .department-table {
        display: table;
    }

    /* Phone allowance table - horizontal scroll */
    .department-phone-allowance {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .department-phone-allowance table {
        min-width: 650px; /* Minimum width to show all columns */
    }
}

/* Very small screens (under 480px) */
@media (max-width: 480px) {
    /* Make inputs even more compact */
    .department-phone-allowance table input[type="text"],
    .department-phone-allowance table input[type="date"],
    .department-phone-allowance table select {
        padding: 4px;
        font-size: 12px;
    }
    
    /* Reduce table padding */
    .department-table th,
    .department-table td,
    .department-phone-allowance table th,
    .department-phone-allowance table td {
        padding: 4px;
    }
}
</style>
</head>
<body>
    
<button class="back-btn-new" type="button" onclick="history.back();">
    <div class="btn-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" height="16" width="16">
            <path d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z" fill="#ffffff"></path>
            <path d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z" fill="#ffffff"></path>
        </svg>
    </div>
    <span class="btn-text">Back</span>
</button>


    <div class="bills-container">
        <div class="logo"> 
            <img src="img/ATSPH_Logo.png" alt="ATS Logo">
        </div>

        <!-- DEPARTMENT PHONE ALLOWANCE REIMBURSEMENT REQUEST SECTION -->
        <div class="department-phone-allowance">
            <h2>DEPARTMENT PHONE ALLOWANCE REIMBURSEMENT REQUEST</h2>




<!-- Department Information Table -->
<table class="department-table" style="width: 100%;">
    <thead>
        <tr>
            <th colspan="2" style="text-align: left;">DEPARTMENT INFORMATION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="background-color: #FE5A1D; color: white; width: 50%;"><label for="department">DEPARTMENT</label></td>
            <td style="width: 50%;">
                <select id="deptselection" name="department" style="width: 100%;" placeholder="Select Department">
                    <option value="Operations">OPERATIONS DEPARTMENT</option>
                    <option value="HR">HUMAN RESOURCES DEPARTMENT</option>
                    <option value="CS">CS DEPARTMENT</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="background-color: #FE5A1D; color: white; width: 50%;"><label for="department-manager">DEPARTMENT MANAGER</label></td>
            <td><input type="text" id="department-manager" name="department-manager" style="width: 100%;" readonly ></td>
        </tr>
    </tbody>
</table>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const deptSelection = document.getElementById("deptselection");
    const managerInput = document.getElementById("department-manager");

    // Mapping standardized department to manager
    const departmentInfo = {
        "Operations": { manager: "RICKY GO" },
        "HR": { manager: "NANCY CHESTNUT" },
        "CS": { manager: "NATHANIEL FLORES" }
    };

    // Fetch employee department and auto-select it
    fetch("CRUD/match_dept.php")
        .then(response => response.json())
        .then(data => {

            if (data.department) {
                let standardizedDept = data.department; // Already standardized by PHP
                
                // Adjust to match option values
                const deptMap = {
                    "Operations": "Operations",
                    "HR": "HR",
                    "CS": "CS"
                };
                
                standardizedDept = deptMap[standardizedDept] || ""; // Match or leave empty

                if (standardizedDept) {
                    deptSelection.value = standardizedDept;
                    updateFields(); // Auto-set manager
                } else {
                    console.warn("Department not found in dropdown:", standardizedDept);
                }
            }
        })
        .catch(error => console.error("Error fetching department:", error));

    // Event listener for manual department selection
    deptSelection.addEventListener("change", updateFields);

    function updateFields() {
        const selectedDept = deptSelection.value;
        managerInput.value = departmentInfo[selectedDept]?.manager || "";
    }
});
</script>




            <!-- PHONE ALLOWANCE REQUEST TABLE -->
            <table>
                <thead>
                    <tr>
                        <th colspan="10">PHONE ALLOWANCE REQUEST</th>
                    </tr>
                    <tr>
                        <th>ID NO.</th>
                        <th>STAFF NAME</th>
                        <th>CONFIRMATION/PAYMENT TRANSACTION REFERENCE NUMBER</th>
                        <th>TRANSACTION DATE</th>
                        <th>PAY FROM</th>
                        <th>PAY TO</th>
                        <th>MERCHANT REFERENCE NUMBER</th>
                        
                        
                        
                        <th>PAID AMOUNT</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="text" id="id-no" name="id-no" value="<?php echo htmlspecialchars($employee_no); ?>" readonly></td>
                    <td><input type="text" id="staff-name" name="staff-name" value="<?php echo htmlspecialchars($employee_name); ?>" readonly></td>
                    <td><input type="text" id="payment-transaction-ref" name="payment-transaction-ref"></td>
                    <td><input type="date" id="transaction-date" name="transaction-date"></td>
                    <td><input type="text" id="pay-from" name="pay-from"></td>
                        <td><input type="text" id="pay-to" name="pay-to"></td>
                        <td><input type="text" id="merchant-ref" name="merchant-ref"></td>
                        
                        
                        
                        <td><input type="text" id="paid-amount" name="paid-amount"></td>
                        
                    </tr>
                </tbody>
            </table>


        </div>
        <div class="upload-section">
            <label for="file-upload" class="upload-label">Upload your bill receipts</label>
            <input type="file" id="file-upload" name="bill_image" class="upload-input" accept="image/*, .pdf, .txt" multiple>


            <button class="upload-btn" onclick="document.getElementById('file-upload').click()">
                <i class="fas fa-upload"></i> Choose Files
            </button>
        </div>



        <div class="preview-section">
            <div class="preview-label">Preview</div>
            <div class="preview-content" id="preview-content">
                <!-- Preview will be displayed here -->
            </div>
        </div>




<!-- Submit Button with Modal -->
<div class="button-container">
    <button class="submit-btn" id="submit-btn">
        <i class="fas fa-paper-plane"></i> Submit
    </button>
</div>

<!-- Confirmation Modal -->
<div id="confirmModal" class="modal" style="display:none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background: white; padding: 20px; border-radius: 5px; width: 300px; margin: 10% auto; text-align: center;">
        <p>Are you sure you want to submit?</p>
        <button id="confirmSubmit" class="confirm-btn" style="background: green; color: white; padding: 5px 10px; border: none; cursor: pointer;">Yes</button>
        <button id="cancelSubmit" class="cancel-btn" style="background: red; color: white; padding: 5px 10px; border: none; cursor: pointer;">No</button>
    </div>
</div>

<!-- Validation Error Modal -->
<div id="validationModal" class="custom-validation-modal">
    <div class="custom-validation-modal-content">
        <div class="custom-validation-modal-header">
            <span class="custom-validation-modal-title">Missing Fields</span>
        </div>
        <div class="custom-validation-modal-body">
            <p>Please fill in all required fields.</p>
        </div>
        <div class="custom-validation-modal-footer">
            <button id="validationOkBtn" class="custom-validation-ok-btn">OK</button>
        </div>
    </div>
</div>

<!-- CSS for Custom Modal -->
<style>
.custom-validation-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.custom-validation-modal-content {
    background-color: white;
    width: 350px;
    margin: 15% auto;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
}

.custom-validation-modal-header {
    background-color: #d9534f;
    color: white;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
}

.custom-validation-modal-body {
    padding: 20px;
    font-size: 16px;
    color: #555;
}

.custom-validation-modal-footer {
    padding: 15px;
    text-align: center;
}

.custom-validation-ok-btn {
    background-color: #d9534f;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.custom-validation-ok-btn:hover {
    background-color: #c9302c;
}
</style>



<!-- Success Modal -->
<div id="successModal" class="custom-success-modal">
    <div class="custom-success-modal-content">
        <div class="custom-success-modal-header">
            <span class="custom-success-modal-title">Success</span>
        </div>
        <div class="custom-success-modal-body">
            <p>Submission completed successfully!</p>
        </div>
        <div class="custom-success-modal-footer">
            <button id="successOkBtn" class="custom-success-ok-btn">OK</button>
        </div>
    </div>
</div>

<!-- CSS for Modal -->
<style>
.custom-success-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.custom-success-modal-content {
    background-color: white;
    width: 350px;
    margin: 15% auto;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
}

.custom-success-modal-header {
    background-color: #28a745;
    color: white;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
}

.custom-success-modal-body {
    padding: 20px;
    font-size: 16px;
    color: #555;
}

.custom-success-modal-footer {
    padding: 15px;
    text-align: center;
}

.custom-success-ok-btn {
    background-color: #28a745;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.custom-success-ok-btn:hover {
    background-color: #218838;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const submitBtn = document.getElementById('submit-btn');
    const confirmModal = document.getElementById('confirmModal');
    const confirmSubmit = document.getElementById('confirmSubmit');
    const cancelSubmit = document.getElementById('cancelSubmit');
    const validationModal = document.getElementById('validationModal');
    const validationOkBtn = document.getElementById('validationOkBtn');
    const successModal = document.getElementById('successModal');
    const successOkBtn = document.getElementById('successOkBtn');

    submitBtn.addEventListener('click', function () {
        confirmModal.style.display = 'block';
    });

    cancelSubmit.addEventListener('click', function () {
        confirmModal.style.display = 'none';
    });

    confirmSubmit.addEventListener('click', function () {
        confirmModal.style.display = 'none';

        const department = document.getElementById('deptselection').value.trim();
        const employeeNo = document.getElementById('id-no').value.trim();
        const staffName = document.getElementById('staff-name').value.trim();
        const payTo = document.getElementById('pay-to').value.trim();
        const merchantRef = document.getElementById('merchant-ref').value.trim();
        const payFrom = document.getElementById('pay-from').value.trim();
        const paymentTransactionRef = document.getElementById('payment-transaction-ref').value.trim();
        let transactionDate = document.getElementById('transaction-date').value.trim();
        const paidAmount = document.getElementById('paid-amount').value.trim();
        const fileInput = document.getElementById('file-upload');

        if (!transactionDate) {
            transactionDate = "";
        }

        if (!department || !employeeNo || !staffName || !paidAmount) {
            validationModal.style.display = 'block';
            return;
        } 

        const formData = new FormData();
        formData.append('department', department);
        formData.append('employee_no', employeeNo);
        formData.append('name', staffName);
        formData.append('pay_to', payTo);
        formData.append('mer_refnum', merchantRef);
        formData.append('pay_from', payFrom);
        formData.append('paytrans_refnum', paymentTransactionRef);
        formData.append('trans_date', transactionDate);
        formData.append('paid_amount', paidAmount);

        if (fileInput.files.length > 0) {
            formData.append('bill_image', fileInput.files[0]);
        } else {
            formData.append('bill_image', "");
        }

        fetch('CRUD/submit_bills.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            successModal.style.display = 'block';
        })
        .catch(error => console.error('Error:', error));
    });

    // Close Validation Modal on OK Button Click
    validationOkBtn.addEventListener('click', function () {
        validationModal.style.display = 'none';
    });

    // Close Success Modal on OK Button Click (No Refresh)
    successOkBtn.addEventListener('click', function () {
        successModal.style.display = 'none';
    });
});
</script>


















        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal" id="confirmation-modal">
        <div class="modal-content">
            <h2>Confirm Submission</h2>
            <p>Are you sure you want to submit the request?</p>
            <button class="confirm-btn" id="confirm-submit">Yes, Submit</button>
            <button class="cancel-btn" id="cancel-submit">Cancel</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="success-modal" id="success-modal">
        <div class="success-modal-content">
            <h2>Success!</h2>
            <p>Your request has been successfully submitted.</p>
            <button id="close-success-modal">Close</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="error-modal" id="error-modal">
        <div class="error-modal-content">
            <h2>Error!</h2>
            <p>Please fill in all required fields before submitting.</p>
            <button id="close-error-modal">OK</button>
        </div>
    </div>

    <!-- Submission History Modal -->
    <div class="history-modal" id="history-modal">
        <div class="history-modal-content">
            <h2>Submission History</h2>
            <div id="history-list">
                <!-- Submission history items will be displayed here -->
            </div>
            <div class="history-modal-buttons">
                <button class="delete-all-btn" id="delete-all-btn">Clear All</button>
                <button class="close-history-modal-btn" id="close-history-modal-btn">Close</button>
            </div>
        </div>
    </div>

    <!-- Clear Confirmation Modal -->
    <div class="clear-confirmation-modal" id="clear-confirmation-modal">
        <div class="clear-confirmation-modal-content">
            <h2>Clear All History</h2>
            <p>Are you sure you want to clear all history? This action cannot be undone.</p>
            <button class="confirm-clear-btn" id="confirm-clear-btn">OK</button>
            <button class="cancel-clear-btn" id="cancel-clear-btn">Cancel</button>
        </div>
    </div>

    <!-- Clear Success Modal -->
    <div class="clear-success-modal" id="clear-success-modal">
        <div class="clear-success-modal-content">
            <h2>Success!</h2>
            <p>All history has been successfully cleared.</p>
            <button id="close-clear-success-modal">Close</button>
        </div>
    </div>

    <!-- Clear Error Modal -->
    <div class="clear-error-modal" id="clear-error-modal">
        <div class="clear-error-modal-content">
            <h2>Error!</h2>
            <p>You have no submission history to delete.</p>
            <button id="close-clear-error-modal">OK</button>
        </div>
    </div>

 <!-- Improved Edit Submission Modal with Table Format -->
<div class="edit-modal" id="edit-modal">
    <div class="edit-modal-content">
        <h2>Edit Submission</h2>
        <form id="edit-form">
            <table class="edit-table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Department</td>
                        <td><input type="text" id="edit-department" name="edit-department"></td>
                    </tr>
                    <tr>
                        <td>Cost Center</td>
                        <td><input type="text" id="edit-cost-center" name="edit-cost-center"></td>
                    </tr>
                    <tr>
                        <td>Department Manager</td>
                        <td><input type="text" id="edit-department-manager" name="edit-department-manager"></td>
                    </tr>
                    <tr>
                        <td>Allowance Month-Year</td>
                        <td>
                            <select id="edit-allowance-month-year" name="edit-allowance-month-year">
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
                        </td>
                    </tr>
                    <tr>
                        <td>ID No</td>
                        <td><input type="text" id="edit-id-no" name="edit-id-no"></td>
                    </tr>
                    <tr>
                        <td>Staff Name</td>
                        <td><input type="text" id="edit-staff-name" name="edit-staff-name"></td>
                    </tr>
                    <tr>
                        <td>Pay To</td>
                        <td><input type="text" id="edit-pay-to" name="edit-pay-to"></td>
                    </tr>
                    <tr>
                        <td>Merchant Ref</td>
                        <td><input type="text" id="edit-merchant-ref" name="edit-merchant-ref"></td>
                    </tr>
                    <tr>
                        <td>Pay From</td>
                        <td><input type="text" id="edit-pay-from" name="edit-pay-from"></td>
                    </tr>
                    <tr>
                        <td>Payment Transaction Ref</td>
                        <td><input type="text" id="edit-payment-transaction-ref" name="edit-payment-transaction-ref"></td>
                    </tr>
                    <tr>
                        <td>Transaction Date</td>
                        <td><input type="date" id="edit-transaction-date" name="edit-transaction-date"></td>
                    </tr>
                    <tr>
                        <td>Paid Amount</td>
                        <td><input type="text" id="edit-paid-amount" name="edit-paid-amount"></td>
                    </tr>
                    <tr>
                        <td>Reimbursement Phone Allowance</td>
                        <td><input type="text" id="edit-reimbursement-phone-allowance" name="edit-reimbursement-phone-allowance"></td>
                    </tr>
                </tbody>
            </table>

            <div class="button-group">
                <button type="submit" class="confirm-btn">Save Changes</button>
                <button type="button" class="cancel-btn" id="cancel-edit">Cancel</button>
            </div>
        </form>
    </div>
</div>


<script>
    const fileUpload = document.getElementById('file-upload');
    const previewContent = document.getElementById('preview-content');
    const submitBtn = document.getElementById('submit-btn');
    const confirmationModal = document.getElementById('confirmation-modal');
    const successModal = document.getElementById('success-modal');
    const errorModal = document.getElementById('error-modal');
    const confirmSubmitBtn = document.getElementById('confirm-submit');
    const cancelSubmitBtn = document.getElementById('cancel-submit');
    const closeSuccessModalBtn = document.getElementById('close-success-modal');
    const closeErrorModalBtn = document.getElementById('close-error-modal');
    const historyBtn = document.getElementById('history-btn');
    const historyModal = document.getElementById('history-modal');
    const historyList = document.getElementById('history-list');
    const deleteAllBtn = document.getElementById('delete-all-btn');
    const closeHistoryModalBtn = document.getElementById('close-history-modal-btn');
    const clearConfirmationModal = document.getElementById('clear-confirmation-modal');
    const clearSuccessModal = document.getElementById('clear-success-modal');
    const confirmClearBtn = document.getElementById('confirm-clear-btn');
    const cancelClearBtn = document.getElementById('cancel-clear-btn');
    const closeClearSuccessModalBtn = document.getElementById('close-clear-success-modal');
    const clearErrorModal = document.getElementById('clear-error-modal');
    const closeClearErrorModalBtn = document.getElementById('close-clear-error-modal');
    const editModal = document.getElementById('edit-modal');
    const editForm = document.getElementById('edit-form');
    const cancelEditBtn = document.getElementById('cancel-edit');
    let uploadedFiles = [];
    let submissionHistory = [];
    let currentEditIndex = null;

    // File Upload and Preview Functionality
    fileUpload.addEventListener('change', function (event) {
        const files = event.target.files;
        uploadedFiles = uploadedFiles.concat(Array.from(files)); // Add new files to the existing list
        previewContent.innerHTML = ''; // Clear previous previews

        if (uploadedFiles.length > 0) {
            uploadedFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const filePreview = document.createElement('div');
                    filePreview.className = 'file-preview';

                    if (file.type.startsWith('image/')) {
                        filePreview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" style="max-width: 100%; height: auto;">
                            <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                        `;
                    } else if (file.type === 'application/pdf') {
                        filePreview.innerHTML = `
                            <embed src="${e.target.result}" width="100%" height="300px" type="application/pdf">
                            <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                        `;
                    } else if (file.type === 'text/plain') {
                        filePreview.innerHTML = `
                            <pre>${e.target.result}</pre>
                            <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                        `;
                    } else {
                        filePreview.innerHTML = `
                            <p>File type not supported for preview: ${file.name}</p>
                            <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                        `;
                    }

                    previewContent.appendChild(filePreview);
                };
                reader.readAsDataURL(file);
            });
        } else {
            previewContent.innerHTML = `<p>No files selected.</p>`;
        }
    });

    function viewSubmission(index) {
    const submission = submissionHistory[index]; 
    const files = submission.files;

    if (files.length > 0) {
        // Create Modal
        const viewModal = document.createElement('div');
        viewModal.className = 'view-modal';
        Object.assign(viewModal.style, {
            display: 'flex',
            position: 'fixed',
            top: '0',
            left: '0',
            width: '100%',
            height: '100%',
            backgroundColor: 'rgba(0, 0, 0, 0.8)',
            justifyContent: 'center',
            alignItems: 'center',
            zIndex: '1000'
        });

        const viewModalContent = document.createElement('div');
        viewModalContent.className = 'view-modal-content';
        Object.assign(viewModalContent.style, {
            backgroundColor: '#fff',
            padding: '20px',
            borderRadius: '10px',
            maxWidth: '95%',
            maxHeight: '90%',
            overflowY: 'auto',
            textAlign: 'center'
        });

        let currentFileIndex = 0;

        function renderFile(index) {
            viewModalContent.innerHTML = ''; // Clear previous content
            const file = files[index];
            const filePreview = document.createElement('div');
            filePreview.className = 'file-preview';

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
                img.style.cursor = 'pointer';
                img.onclick = () => window.open(img.src, '_blank');
                filePreview.appendChild(img);
            } else if (file.type === 'application/pdf') {
                const iframe = document.createElement('iframe');
                iframe.src = URL.createObjectURL(file);
                iframe.width = '100%';
                iframe.height = '600px';
                filePreview.appendChild(iframe);

                const fileURL = URL.createObjectURL(file);
                
                // Full Screen Button
                const fullScreenButton = document.createElement('a');
                fullScreenButton.href = fileURL;
                fullScreenButton.textContent = 'Full Screen';
                fullScreenButton.target = '_blank';
                Object.assign(fullScreenButton.style, {
                    display: 'inline-block',
                    marginRight: '10px',
                    color: '#007BFF',
                    cursor: 'pointer'
                });

                // Close Button (next to Full Screen)
                const closeFileButton = document.createElement('button');
                closeFileButton.textContent = 'Close';
                Object.assign(closeFileButton.style, {
                    padding: '5px 10px',
                    backgroundColor: '#ff6b6b',
                    color: 'white',
                    border: 'none',
                    borderRadius: '5px',
                    cursor: 'pointer'
                });
                closeFileButton.onclick = function () {
                    document.body.removeChild(viewModal);
                };

                // Button Container
                const buttonContainer = document.createElement('div');
                buttonContainer.style.marginTop = '10px';
                buttonContainer.appendChild(fullScreenButton);
                buttonContainer.appendChild(closeFileButton);
                filePreview.appendChild(buttonContainer);
            } else if (file.type === 'text/plain') {
                const pre = document.createElement('pre');
                const reader = new FileReader();
                reader.onload = function (e) {
                    pre.textContent = e.target.result;
                };
                reader.readAsText(file);
                filePreview.appendChild(pre);
            } else {
                const p = document.createElement('p');
                p.textContent = `File type not supported for preview: ${file.name}`;
                filePreview.appendChild(p);
            }

            viewModalContent.appendChild(filePreview);

            // Navigation Controls
            if (files.length > 1) {
                const navContainer = document.createElement('div');
                navContainer.style.display = 'flex';
                navContainer.style.justifyContent = 'space-between';
                navContainer.style.marginTop = '10px';

                const prevButton = document.createElement('button');
                prevButton.textContent = 'Previous';
                prevButton.style.padding = '10px';
                prevButton.style.marginRight = '10px';
                prevButton.disabled = index === 0;
                prevButton.onclick = () => {
                    if (currentFileIndex > 0) {
                        currentFileIndex--;
                        renderFile(currentFileIndex);
                    }
                };

                const nextButton = document.createElement('button');
                nextButton.textContent = 'Next';
                nextButton.style.padding = '10px';
                nextButton.disabled = index === files.length - 1;
                nextButton.onclick = () => {
                    if (currentFileIndex < files.length - 1) {
                        currentFileIndex++;
                        renderFile(currentFileIndex);
                    }
                };

                navContainer.appendChild(prevButton);
                navContainer.appendChild(nextButton);
                viewModalContent.appendChild(navContainer);
            }
        }

        // Close Button for Modal
        const closeButton = document.createElement('button');
        closeButton.textContent = 'Close';
        Object.assign(closeButton.style, {
            marginTop: '10px',
            padding: '10px 20px',
            backgroundColor: '#ff6b6b',
            color: 'white',
            border: 'none',
            borderRadius: '5px',
            cursor: 'pointer'
        });
        closeButton.onclick = function () {
            document.body.removeChild(viewModal);
        };

        renderFile(0);
        viewModalContent.appendChild(closeButton);
        viewModal.appendChild(viewModalContent);
        document.body.appendChild(viewModal);
    } else {
        alert('No files to view.');
    }
    }

    // Delete File Functionality
    function deleteFile(index) {
        uploadedFiles.splice(index, 1); // Remove the file from the array
        previewContent.innerHTML = ''; // Clear the preview content

        // Re-render the remaining files
        uploadedFiles.forEach((file, newIndex) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const filePreview = document.createElement('div');
                filePreview.className = 'file-preview';

                if (file.type.startsWith('image/')) {
                    filePreview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" style="max-width: 100%; height: auto;">
                        <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                    `;
                } else if (file.type === 'application/pdf') {
                    filePreview.innerHTML = `
                        <embed src="${e.target.result}" width="100%" height="300px" type="application/pdf">
                        <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                    `;
                } else if (file.type === 'text/plain') {
                    filePreview.innerHTML = `
                        <pre>${e.target.result}</pre>
                        <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                    `;
                } else {
                    filePreview.innerHTML = `
                        <p>File type not supported for preview: ${file.name}</p>
                        <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                    `;
                }

                previewContent.appendChild(filePreview);
            };
            reader.readAsDataURL(file);
        });
    }

   

    // Confirm Submission
    confirmSubmitBtn.addEventListener('click', function () {
    confirmationModal.style.display = 'none';
    setTimeout(() => {
        successModal.style.display = 'flex';
        const submission = {
            department: document.getElementById('department').value,
            costCenter: document.getElementById('cost-center').value,
            departmentManager: document.getElementById('department-manager').value,
            allowanceMonthYear: document.getElementById('allowance-month-year').value,
            idNo: document.getElementById('id-no').value,
            staffName: document.getElementById('staff-name').value,
            payTo: document.getElementById('pay-to').value,
            merchantRef: document.getElementById('merchant-ref').value,
            payFrom: document.getElementById('pay-from').value,
            paymentTransactionRef: document.getElementById('payment-transaction-ref').value,
            transactionDate: document.getElementById('transaction-date').value,
            paidAmount: document.getElementById('paid-amount').value,
            reimbursementPhoneAllowance: document.getElementById('reimbursement-phone-allowance').value,
            files: uploadedFiles, // This can be empty if no files are uploaded
            date: new Date().toLocaleString()
        };
        submissionHistory.push(submission);
        clearForm();
        uploadedFiles = []; // Clear uploaded files
        previewContent.innerHTML = ''; // Clear preview content
    }, 500);
    });
    // Cancel Submission
    cancelSubmitBtn.addEventListener('click', function () {
        confirmationModal.style.display = 'none';
    });

    // Close Success Modal
    closeSuccessModalBtn.addEventListener('click', function () {
        successModal.style.display = 'none';
    });

    // Close Error Modal
    closeErrorModalBtn.addEventListener('click', function () {
        errorModal.style.display = 'none';
    });

    

   


    // Cancel Clear All
    cancelClearBtn.addEventListener('click', function () {
        clearConfirmationModal.style.display = 'none';
    });

    // Close Clear Success Modal
    closeClearSuccessModalBtn.addEventListener('click', function () {
        clearSuccessModal.style.display = 'none';
    });

    // Close Clear Error Modal
    closeClearErrorModalBtn.addEventListener('click', function () {
        clearErrorModal.style.display = 'none';
    });

    
</script>


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