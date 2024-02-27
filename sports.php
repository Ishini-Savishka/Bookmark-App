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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bookmark</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/style.css">
  <link rel="manifest" href="/dist/manifest.json">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  </ul>
  <h2>Sports</h2>
  <div class="navbar-brand mx-auto">
      <form class="form-inline">
          <div class="input-group input-group-sm" style="width: 300px;">
              <input class="form-control form-control-navbar" type="search" aria-label="Search" style="background-color: #b0afaf; color: #333;">
              <div class="input-group-append ">
                  <button class="btn btn-navbar" style="background-color: #b0afaf;" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form>
  </div>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="details.html"><i class="fas fa-plus-circle" style="font-size: 30px; background-color: rgb(255, 255, 255); border-radius: 50%; color: #3A8DDA"></i></a>
    </li>
  </ul>
</nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <div class="sidebar">
        <div class="image mt-4 pb-3 mb-3 d-flex">
            <img src="dist/img/user.jpg" class="user-image" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block justify-content-center text-dark text-bold">Ishini Gamage</a>
        </div>
        <br>
        <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'menu-open' : ''; ?>">
            <a href="index.html" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>All Bookmarks</p>
            </a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'recipe.php' ? 'menu-open' : ''; ?>">
            <a href="recipe.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'recipe.php' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-utensils"></i>
                <p>Recipes</p>
            </a>
        </li>
        <li class="nav-item has-treeview <?php echo basename($_SERVER['PHP_SELF']) == 'sports.php' ? 'menu-open' : ''; ?>">
    <a href="sports.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'sports.php' ? 'active' : ''; ?>">
        <i class="nav-icon fas fa-basketball-ball"></i>
        <p>Sports</p>
    </a>
</li>
<li class="nav-item has-treeview <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'menu-open' : ''; ?>">
    <a href="news.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>News</p>
    </a>
</li>
<li class="nav-item has-treeview <?php echo basename($_SERVER['PHP_SELF']) == 'meditation.php' ? 'menu-open' : ''; ?>">
    <a href="meditation.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'meditation.php' ? 'active' : ''; ?>">
        <i class="nav-icon fab fa-galactic-republic"></i>
        <p>Meditation</p>
    </a>
</li>
<li class="nav-item has-treeview <?php echo basename($_SERVER['PHP_SELF']) == 'travel.php' ? 'menu-open' : ''; ?>">
    <a href="travel.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'travel.php' ? 'active' : ''; ?>">
        <i class="nav-icon fas fa-plane-departure"></i>
        <p>Travel</p>
    </a>
</li>

            <br>
            <br>
            <div class="text-center">
              <a href="category.html">
              <button class="btn btn-primary" style="width: 200px; border-radius: 20px;">New Category</button></a>
            </div>
            <br>
            <div class="toggle-container ml-4">
              <label class="switch">
                <input type="checkbox" id="modeToggle">
                <span class="slider round"></span>
              </label>
            </div>
            <script>
              document.getElementById('modeToggle').addEventListener('change', function() {
                const body = document.body;
                if (this.checked) {
                  body.classList.add('dark-mode');
                } else {
                  body.classList.remove('dark-mode');
                }
              });
            </script>
          </ul>
        </nav>
      </div>
  </aside>

  <div class="content-wrapper">
    <br>

    <div class="container">
      <ul class="nav nav-pills justify-content font-weight-bold">
        <li class="nav-item">
          <a class="tab-link active" id="all" onclick="filterContent('all')">All</a>
        </li>
        <?php
          // Fetch distinct category types from the database
          $sql = "SELECT DISTINCT category_type FROM details";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $categoryType = $row['category_type'];
                  echo "<li class='nav-item'>";
                  echo "<a class='tab-link' id='$categoryType' onclick=\"filterContent('$categoryType')\">" . ucfirst($categoryType) . "</a>";
                  echo "</li>";
              }
          }
        ?>
      </ul>
      <br>

      <br>

      <div class="row" id="content">
      <?php
          echo "<div class='container'>";
          echo "<div class='row'>"; // Start a new row

          // Fetch details for the "sports" category from the database
          $category_name = "sports"; // Set the category name to "sports"
          $categorySql = "SELECT * FROM details WHERE category_name = '$category_name'";
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
      </div>
    </div>

  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="plugins/sparklines/sparkline.js"></script>
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/demo.js"></script>

  <script>
  // Filter and display content based on type
  function filterContent(categoryType) {
    console.log('Filtering content for type:', categoryType);

    // Remove active class from all nav links
    document.querySelectorAll('.tab-link').forEach(link => {
      link.classList.remove('active');
    });

    // Add active class to the clicked nav link
    document.getElementById(categoryType).classList.add('active');

    // Show all cards initially
    document.querySelectorAll('.card').forEach(card => {
      card.style.display = 'block';
    });

    // Filter cards based on category type
    if (categoryType !== 'all') {
      document.querySelectorAll('.card').forEach(card => {
        if (card.getAttribute('data-category-type') !== categoryType) {
          card.style.display = 'none';
        }
      });
    }
  }

  // Initially display all content
  filterContent('all');
</script>


</body>
</html>
