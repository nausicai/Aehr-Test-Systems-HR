<?php
include 'db.php';

// Delete records older than 3 months in bills_sub
$sql_bills = "DELETE FROM bills_sub WHERE sub_date < NOW() - INTERVAL 3 MONTH";
$conn->query($sql_bills);

// Delete records older than 6 months in dtr
$sql_dtr = "DELETE FROM dtr WHERE sub_date < NOW() - INTERVAL 6 MONTH";
$conn->query($sql_dtr);

echo "Old records deleted successfully.";

// Close the connection
$conn->close();
?>
