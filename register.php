<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: WARDAH BINTI HASLAN
Registration Number: 18DDT23F1099
Class: DDT7B
*/

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

        <title>New Employee Registration</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="page-header">
        <div>
            <h1>New Employee Registration</h1>
            <p>Enter employee information below.</p>
        </div>

        <a href="index.php" class="btn btn-secondary">
            Back to Dashboard
        </a>

    </div>

    <?php

    // Display validation error message
    if (isset($_SESSION['error'])) {

        echo '<div class="alert alert-error">';
        echo htmlspecialchars($_SESSION['error']);
        echo '</div>';

        unset($_SESSION['error']);
    }

    ?>

    <div class="card">

        <div class="card-header">
            <h2>Employee Information</h2>
        </div>

        <form action="process.php" method="POST" class="form">

            <div class="form-grid">

                <div class="form-group">

                    <label>Full Name *</label>

                    <input
                        type="text"
                        name="full_name"
                        class="form-control"
                        placeholder="Enter full name"
                    >

                </div>

                <div class="form-group">

                    <label>IC Number *</label>

                    <input
                        type="text"
                        name="ic_number"
                        class="form-control"
                        placeholder="Enter IC number"
                    >

                </div>

                <div class="form-group">

                    <label>Email *</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter email"
                    >

                </div>

                <div class="form-group">

                    <label>Phone *</label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        placeholder="Enter phone number"
                    >

                </div>

                <div class="form-group">

                    <label>Gender *</label>

                    <select name="gender" class="form-control">

                        <option value="">-- Select Gender --</option>

                        <option value="Male">
                            Male
                        </option>

                        <option value="Female">
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
                    >

                </div>

                <div class="form-group full-width">

                    <label>Address *</label>

                    <input
                        type="text"
                        name="address"
                        class="form-control"
                        placeholder="Enter address"
                    >

                </div>

                <div class="form-group">

                    <label>Position *</label>

                    <input
                        type="text"
                        name="position"
                        class="form-control"
                        placeholder="Enter position"
                    >

                </div>

                <div class="form-group">

                    <label>Department *</label>

                    <input
                        type="text"
                        name="department"
                        class="form-control"
                        placeholder="Enter department"
                    >

                </div>

                <div class="form-group">

                    <label>Join Date *</label>

                    <input
                        type="date"
                        name="join_date"
                        class="form-control"
                    >

                </div>

                <div class="form-group">

                    <label>Status *</label>

                    <select name="status" class="form-control">

                        <option value="">
                            -- Select Status --
                        </option>

                        <option value="Active">
                            Active
                        </option>

                        <option value="Inactive">
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
                    Save Registration
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