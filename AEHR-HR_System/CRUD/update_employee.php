<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_employee_no = $conn->real_escape_string($_POST['original_employee_no']);
    $new_employee_no = $conn->real_escape_string($_POST['employee_no']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $department = $conn->real_escape_string($_POST['department']);
    $position = $conn->real_escape_string($_POST['position']);
    $hrs_account = $conn->real_escape_string($_POST['hrs_account']);
    $date_of_birth = $conn->real_escape_string($_POST['date_of_birth']);
    $date_hired = $conn->real_escape_string($_POST['date_hired']);
    $address = $conn->real_escape_string($_POST['address']);

    // Update employee details including hrs_account
    $sql = "UPDATE employees SET 
                employee_no='$new_employee_no',
                name='$name', 
                email='$email', 
                phone='$phone', 
                department='$department', 
                position='$position', 
                hrs_account='$hrs_account',
                date_of_birth='$date_of_birth', 
                date_hired='$date_hired', 
                address='$address' 
            WHERE employee_no='$original_employee_no'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => "Employee details updated successfully", "updated_hrs" => $hrs_account]);
    } else {
        echo json_encode(["error" => "Error updating record: " . $conn->error]);
    }
}
?>
