<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: YOUR FULL NAME
Registration Number: YOUR REGISTRATION NUMBER
Class: DDT7B
*/

include "db.php";

// Get employee ID from GET
if (!isset($_GET['id']) || empty($_GET['id'])) {

    header("Location: index.php");
    exit();

}

$id = intval($_GET['id']);

// Retrieve employee data
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

    <title>Update Employee</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="page-header">

        <div>

            <h1>Update Employee</h1>

            <p>Update employee registration information.</p>

        </div>

        <a
            href="index.php"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

    <div class="card">

        <div class="card-header">

            <h2>Edit Employee Information</h2>

        </div>

        <form
            action="update_process.php"
            method="POST"
            class="form"
        >

            <input
                type="hidden"
                name="id"
                value="<?php echo $row['id']; ?>"
            >

            <div class="form-grid">

                <div class="form-group">

                    <label>Full Name *</label>

                    <input
                        type="text"
                        name="full_name"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['full_name']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>IC Number *</label>

                    <input
                        type="text"
                        name="ic_number"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['ic_number']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Email *</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['email']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Phone *</label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['phone']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Gender *</label>

                    <select
                        name="gender"
                        class="form-control"
                    >

                        <option value="Male"
                            <?php
                            if ($row['gender'] == "Male") {
                                echo "selected";
                            }
                            ?>
                        >
                            Male
                        </option>

                        <option value="Female"
                            <?php
                            if ($row['gender'] == "Female") {
                                echo "selected";
                            }
                            ?>
                        >
                            Female
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Date of Birth *</label>

                    <input
                        type="date"
                        name="date_of_birth"
                        class="form-control"
                        value="<?php echo $row['date_of_birth']; ?>"
                    >

                </div>

                <div class="form-group full-width">

                    <label>Address *</label>

                    <input
                        type="text"
                        name="address"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['address']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Position *</label>

                    <input
                        type="text"
                        name="position"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['position']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Department *</label>

                    <input
                        type="text"
                        name="department"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['department']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Join Date *</label>

                    <input
                        type="date"
                        name="join_date"
                        class="form-control"
                        value="<?php echo $row['join_date']; ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Status *</label>

                    <select
                        name="status"
                        class="form-control"
                    >

                        <option value="Active"
                            <?php
                            if ($row['status'] == "Active") {
                                echo "selected";
                            }
                            ?>
                        >
                            Active
                        </option>

                        <option value="Inactive"
                            <?php
                            if ($row['status'] == "Inactive") {
                                echo "selected";
                            }
                            ?>
                        >
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update Record
                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>