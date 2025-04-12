<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = $_POST['department'];
    $employee_no = $_POST['employee_no'];
    $name = $_POST['name'];
    $pay_to = $_POST['pay_to'];
    $mer_refnum = $_POST['mer_refnum'];
    $pay_from = $_POST['pay_from'];
    $paytrans_refnum = $_POST['paytrans_refnum'];
    $trans_date = !empty($_POST['trans_date']) ? $_POST['trans_date'] : "";
    $paid_amount = $_POST['paid_amount'];

    // Validate department
    $valid_departments = [
        "Operations" => "OPERATIONS DEPARTMENT",
        "HR" => "HUMAN RESOURCES DEPARTMENT",
        "CS" => "CS DEPARTMENT"
    ];

    if (!array_key_exists($department, $valid_departments)) {
        echo json_encode(["error" => "Invalid department selected!"]);
        exit;
    }

    $department = $valid_departments[$department];
    $sub_date = date("Y-m-d H:i:s");

    // Prepare file data
    $bill_image = null;
    $bill_mime = null;

    if (isset($_FILES['bill_image']) && $_FILES['bill_image']['error'] == 0) {
        $file_tmp = $_FILES['bill_image']['tmp_name'];
        $bill_image = file_get_contents($file_tmp);  // Store raw binary

        $bill_mime = mime_content_type($file_tmp);  // Get MIME type
    }

    // SQL Query (Store Base64 as LONGBLOB)
    $sql = "INSERT INTO bills_sub 
        (department, employee_no, name, status, sub_date, pay_to, mer_refnum, pay_from, paytrans_refnum, trans_date, paid_amount, bill_image, bill_mime) 
        VALUES (?, ?, ?, 'Pending', ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die(json_encode(["error" => "SQL Error: " . $conn->error]));
    }

    // 🔹 FIX: Ensure bind_param() has the correct number of variables
    $stmt->bind_param("ssssssssssss", 
        $department, $employee_no, $name, $sub_date, $pay_to, 
        $mer_refnum, $pay_from, $paytrans_refnum, $trans_date, 
        $paid_amount, $bill_image, $bill_mime
    );

    if ($stmt->execute()) {
        echo json_encode(["success" => "Submission successful!"]);
    } else {
        echo json_encode(["error" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
