<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: WARDAH BINTI HASLAN
Registration Number: 18DDT23F1099
Class: DDT7B
*/

include "db.php";

// Get search keyword from URL
$search = "";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

// Search records by ID or Name
if ($search != "") {

    $sql = "SELECT * FROM employees
            WHERE id LIKE ?
            OR full_name LIKE ?
            ORDER BY id DESC";

    $stmt = $conn->prepare($sql);

    $keyword = "%" . $search . "%";

    $stmt->bind_param("ss", $keyword, $keyword);

    $stmt->execute();

    $result = $stmt->get_result();

} else {

    // Display all records
    $sql = "SELECT * FROM employees ORDER BY id DESC";

    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Elite Global Solutions</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Elite Global Solutions</h1>
            <p>Employee Registration Management System</p>
        </div>

        <a href="register.php" class="btn btn-primary">
            + New Register
        </a>

    </div>

    <div class="search-box">

        <form method="GET" action="index.php">

            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Search by Name or ID..."
                value="<?php echo htmlspecialchars($search); ?>"
            >

            <button type="submit" class="btn btn-search">
                Search
            </button>

            <a href="index.php" class="btn btn-secondary">
                Reset
            </a>

        </form>

    </div>

    <div class="card">

        <div class="card-header">
            <h2>Employee Registration List</h2>
        </div>

        <div class="table-container">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                ?>

                    <tr>

                        <td>
                            <?php echo $row['id']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['full_name']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['email']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['phone']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['position']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['department']); ?>
                        </td>

                        <td>

                            <span class="status">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </span>

                        </td>

                        <td>

                            <div class="action-buttons">

                                <a
                                    href="details.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-view"
                                >
                                    View
                                </a>

                                <a
                                    href="update.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-edit"
                                >
                                    Update
                                </a>

                                <a
                                    href="delete.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this record?');"
                                >
                                    Delete
                                </a>

                            </div>

                        </td>

                    </tr>

                <?php

                    }

                } else {

                ?>

                    <tr>

                        <td colspan="8" class="no-data">
                            No employee records found.
                        </td>

                    </tr>

                <?php

                }

                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>