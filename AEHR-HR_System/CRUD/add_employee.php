<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_no = $conn->real_escape_string($_POST['employee_no']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $department = $conn->real_escape_string($_POST['department']);
    $position = $conn->real_escape_string($_POST['position']);
    $hrs_account = isset($_POST['hrs_account']) && $_POST['hrs_account'] !== '' ? $conn->real_escape_string($_POST['hrs_account']) : NULL;
    $date_of_birth = $conn->real_escape_string($_POST['date_of_birth']);
    $date_hired = $conn->real_escape_string($_POST['date_hired']);
    $address = $conn->real_escape_string($_POST['address']);

    // Insert the new employee into the database
    $sql = "INSERT INTO employees (employee_no, name, email, phone, department, position, hrs_account, date_of_birth, date_hired, address)
        VALUES ('$employee_no', '$name', '$email', '$phone', '$department', '$position', " . ($hrs_account ? "'$hrs_account'" : "NULL") . ", '$date_of_birth', '$date_hired', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => "Employee added successfully"]);
    } else {
        echo json_encode(["error" => "Error adding employee: " . $conn->error]);
    }
}
?>
