<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: YOUR FULL NAME
Registration Number: YOUR REGISTRATION NUMBER
Class: DDT7B
*/

session_start();

include "db.php";

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: register.php");
    exit();

}

// Get all submitted values
$full_name = trim($_POST['full_name'] ?? '');
$ic_number = trim($_POST['ic_number'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$gender = trim($_POST['gender'] ?? '');
$date_of_birth = trim($_POST['date_of_birth'] ?? '');
$address = trim($_POST['address'] ?? '');
$position = trim($_POST['position'] ?? '');
$department = trim($_POST['department'] ?? '');
$join_date = trim($_POST['join_date'] ?? '');
$status = trim($_POST['status'] ?? '');

// Server-side validation
// Critical fields must not be empty
if (
    empty($full_name) ||
    empty($ic_number) ||
    empty($email) ||
    empty($phone) ||
    empty($gender) ||
    empty($date_of_birth) ||
    empty($address) ||
    empty($position) ||
    empty($department) ||
    empty($join_date) ||
    empty($status)
) {

    $_SESSION['error'] = "Please fill in all required fields.";

    header("Location: register.php");
    exit();

}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $_SESSION['error'] = "Please enter a valid email address.";

    header("Location: register.php");
    exit();

}

// Insert data using prepared statement
$sql = "INSERT INTO employees
        (
            full_name,
            ic_number,
            email,
            phone,
            gender,
            date_of_birth,
            address,
            position,
            department,
            join_date,
            status
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssssssssss",
    $full_name,
    $ic_number,
    $email,
    $phone,
    $gender,
    $date_of_birth,
    $address,
    $position,
    $department,
    $join_date,
    $status
);

// Execute INSERT query
if ($stmt->execute()) {

    $_SESSION['success'] = "Employee registered successfully.";

    header("Location: index.php");
    exit();

} else {

    $_SESSION['error'] = "Failed to save employee record.";

    header("Location: register.php");
    exit();

}
?>