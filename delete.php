<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: WARDAH BINTI HASLAN
Registration Number: 18DDT23F1099
Class: DDT7B
*/

include "db.php";

// Check whether employee ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {

    header("Location: index.php");
    exit();

}

$id = intval($_GET['id']);

// Delete employee record
$sql = "DELETE FROM employees WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

// Execute delete query
if ($stmt->execute()) {

    header("Location: index.php");
    exit();

} else {

    die("Failed to delete employee record.");

}
?>