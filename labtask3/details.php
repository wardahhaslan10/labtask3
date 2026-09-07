<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: YOUR FULL NAME
Registration Number: YOUR REGISTRATION NUMBER
Class: DDT7B
*/

include "db.php";

// Check whether ID is provided using GET
if (!isset($_GET['id']) || empty($_GET['id'])) {

    header("Location: index.php");
    exit();

}

$id = intval($_GET['id']);

// Retrieve employee record using ID
$sql = "SELECT * FROM employees WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {

    die("Employee record not found.");

}

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Employee Details</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="page-header">

        <div>

            <h1>Employee Details</h1>

            <p>Complete employee information</p>

        </div>

        <a
            href="index.php"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

    <div class="details-card">

        <div class="details-header">

            <h2>
                <?php echo htmlspecialchars($row['full_name']); ?>
            </h2>

            <span class="status">
                <?php echo htmlspecialchars($row['status']); ?>
            </span>

        </div>

        <div class="details-grid">

            <div class="detail-item">

                <span class="detail-label">
                    Employee ID
                </span>

                <span class="detail-value">
                    <?php echo $row['id']; ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Full Name
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['full_name']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    IC Number
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['ic_number']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Email
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['email']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Phone
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['phone']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Gender
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['gender']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Date of Birth
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['date_of_birth']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Address
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['address']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Position
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['position']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Department
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['department']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Join Date
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['join_date']); ?>
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Status
                </span>

                <span class="detail-value">
                    <?php echo htmlspecialchars($row['status']); ?>
                </span>

            </div>

        </div>

        <div class="form-actions">

            <a
                href="update.php?id=<?php echo $row['id']; ?>"
                class="btn btn-edit"
            >
                Update Record
            </a>

            <a
                href="delete.php?id=<?php echo $row['id']; ?>"
                class="btn btn-delete"
                onclick="return confirm('Are you sure you want to delete this record?');"
            >
                Delete Record
            </a>

        </div>

    </div>

</div>

</body>
</html>