<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(4, 112, 189);
            background: linear-gradient(90deg, rgba(4, 112, 189, 1) 44%, rgba(0, 212, 255, 1) 100%);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1700px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scrolling on smaller screens */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Set table layout to fixed */
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            height: 100px; /* Set a fixed height for all cells */
            vertical-align: top; /* Align cell content to the top */
        }

        table th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }

        .btn-delete,
        .btn-cancel,
        .btn-update {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn-delete {
            background-color: #ff5555;
        }

        .btn-update {
            background-color: #0470bd;
        }

        .btn-cancel {
            background-color: #555;
            margin-left: 5px;
        }

        .btn-delete:hover,
        .btn-update:hover,
        .btn-cancel:hover {
            background-color: #333;
        }

        .no-data {
            text-align: center;
            color: #555;
        }
        
        .action-buttons {
            display: flex;
            align-items: center;
        }

        .action-buttons form,
        .action-buttons button {
            margin-right: 5px;
        }

        /* Styles for the delete message */
        .delete-message {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            display: none; /* Initially hide the message */
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Details</h2>
        
        <!-- Delete message -->
        <div class="delete-message" id="deleteMessage">Record deleted successfully</div>

        <table>
            <thead>
                <tr>
                    <th>Detail Name</th>
                    <th>Detail Description</th>
                    <th>Detail URL</th>
                    <th>Detail Image</th>
                    <th>Category Name</th>
                    <th>Category Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Database configuration
$servername = "localhost:3308";
$username = "root";
$password = "ish@123";
$database = "bookmark";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if delete_detail parameter is set
if(isset($_POST['delete_detail'])) {
    $detail_name = $_POST['delete_detail'];

    // Prepare and bind the delete statement
    $stmt = $conn->prepare("DELETE FROM details WHERE detail_name = ?");
    $stmt->bind_param("s", $detail_name);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Check if any rows were affected by the deletion
        if ($stmt->affected_rows > 0) {
            // Display delete message
            echo "<script>document.getElementById('deleteMessage').style.display = 'block';</script>";
            // Hide delete message after 3 seconds
            echo "<script>setTimeout(function() { document.getElementById('deleteMessage').style.display = 'none'; }, 3000);</script>";
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Fetch data from the database
$sql = "SELECT * FROM details";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Display the data in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["detail_name"] . "</td>";
        echo "<td>" . $row["detail_description"] . "</td>";
        echo "<td><a href='" . $row["detail_url"] . "' target='_blank'>" . $row["detail_url"] . "</a></td>";
        echo "<td><img src='uploads/" . $row["detail_image"] . "' alt='" . $row["detail_name"] . "'></td>";
        echo "<td>" . $row["category_name"] . "</td>";
        echo "<td>" . $row["category_type"] . "</td>";
        echo "<td class='action-buttons'>
        <form action='update.php' method='get'>
        <input type='hidden' name='detail_name' value='" . $row["detail_name"] . "'>
        <button class='btn-update' type='submit' name='update'>Update</button>
        </form>
        <form method='post'>
        <input type='hidden' name='delete_detail' value='" . $row["detail_name"] . "'>
        <button class='btn-delete' type='submit'>Delete</button>
        </form>
        <button class='btn-cancel' onclick=\"window.location.href = 'index.php';\">Cancel</button>
        </td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No data available</td></tr>";
}

// Close the connection
$conn->close();
?>
            </tbody>
        </table>
    </div>

    <script>
        // Function to hide the delete message after 3 seconds
        setTimeout(function() { 
            document.getElementById('deleteMessage').style.display = 'none'; 
        }, 3000);
    </script>
</body>
</html>
