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
?>

<?php
echo "<div class='container'>";
echo "<div class='row'>"; // Start a new row

// Fetch details for the "sports" category from the database
$category_name = "sports"; // Set the category name to "sports"
$categorySql = "SELECT * FROM details";
$categoryResult = $conn->query($categorySql);

if ($categoryResult->num_rows > 0) {
    while ($categoryRow = $categoryResult->fetch_assoc()) {
        echo "<div class='col-md-4'>"; // Start a new column
        echo "<div class='card' data-category-type='{$categoryRow["category_type"]}'>"; // Add data-category-type attribute
        if (!empty($categoryRow["detail_image"])) {
            echo "<img src='uploads/{$categoryRow["detail_image"]}' class='card-img-top' alt='Image'>";
        }
        echo "<div class='card-img-overlay'>";
        echo "<h5 class='card-title'>" . $categoryRow["detail_name"] . "</h5>";
        echo "<p class='card-text'>" . $categoryRow["detail_description"] . "</p>";
        echo "<a href='" . $categoryRow["detail_url"] . "' class='card-link'>Read Blog</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>"; // End column
    }
} else {
    echo "No results found for the category 'sports'";
}

echo "</div>"; // End row
echo "</div>"; // End container

// Close the connection
$conn->close();
?>
