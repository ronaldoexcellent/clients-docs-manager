<?php
  session_start();
  include "../base.php";
  include("../.config/conn.php");
  base("auth/checkpoint.php");
  base("includes/page.php");
  include('../includes/alert.php');
?>

<body>

  <title> Home - {{ app.name }} </title>

  <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      $_SESSION['message'] = '';
    }
  ?>

  <main>
    <!-- Header -->
    <?php base('includes/navbar.php'); ?>

    <!-- Search bar with filter options & customers table -->
    <div class="container-md navbar my-2 d-flex shadow justify-content-center gap-1 gap-md-3">
      <form class="col-md w-100 input-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="search" class="input-group-text" id="basic-addon1">
          <i class="fa fa-magnifying-glass"></i>
        </label>
        <input type="search" name="search_box" id="search" class="form-control" placeholder="Search" aria-label="Search" value="Staff 9" aria-describedby="basic-addon1">
        
        <button name="search_clients" class="btn btn-primary">
          <i class="fa fa-magnifying-glass d-none d-md-inline"></i>
          Search
        </button>
      </form>

      <!-- Add New Record -->
      <button class="btn btn-success" name="update" onclick="window.location.href = 'update'">
        <i class="fa fa-plus d-none d-md-inline"></i>
        Add New
      </button>

      <!-- Sort & Delete All -->
      <form class="btn-group gap-1" action="" method="post">
        <div class="btn-group">
          <button class="btn btn-light text-dark border-2 btn-outline-warning">
            Sort
          </button>
          <button class="btn btn-warning dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <span class="visually-hidden">Toggle Dropdown</span> -->
            <i class="fa fa-sort d-none d-md-inline"></i>
          </button>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#">Customer Name</a>
            </li>

            <li>
              <a class="dropdown-item" href="#">Title</a>
            </li>

            <li>
              <a class="dropdown-item" href="#">Posted By</a>
            </li>
                
            <li>
              <a class="dropdown-item" href="#">Date</a>
            </li>
          </ul>
        </div>
        <button class="btn btn-danger" name="del_all">
          <i class="fa fa-trash d-none d-md-inline"></i>
          Del All
        </button>
      </form>
    </div>

    <!-- Table -->
    <div class="table-responsive mt-2 mt-md-5 mx-2 mx-sm-3 mx-md-5" style="font-size: 16px">
      <table class="table table-bordered shadow-sm table-striped table-hover table-sm align-middle">
        <thead>
          <tr>
            <th scope="col">Customer Name:</th>
            <th scope="col">Title:</th>
            <th scope="col">File:</th>
            <th scope="col">Action:</th>
            <th scope="col">Posted By:</th>
            <th scope="col">Date:</th>
          </tr>
        </thead>
        <tbody style="font-size: 14px" class="table-hover">
          <?php
            $result = '';
            // Show results
            function renderResults($result) {
              while($row = $result -> fetch_assoc()) {
                echo "
                  <tr>
                    <td data-bs-toggle='tooltip' data-bs-placement='top' title='Customer Name: ".$row["FullName"]."'>".$row["FullName"]."</td>
                    <td data-bs-toggle='tooltip' data-bs-placement='top' title='File Name: ".$row["Title"]."'>".$row["Title"]."</td>
                    <td data-bs-toggle='tooltip' data-bs-placement='top' title='Download File'>
                      <a class='btn btn-{{ app.theme }} p-1 px-2' style='font-size: 14px' download href='".baseUrl('assets/docs/'.$row["File"])."'> Download </a>
                    </td>
          
                    <td data-bs-toggle='tooltip' data-bs-placement='top' title='Delete this file'>
                      <form action='' method='post'>
                        <button class='border-0' name='del' value='".$row["ID"]."'>
                          <i class='fa fa-trash-can btn-outline-danger text-danger'></i>
                        </button>
                      </form>
                    </td>

                    <td data-bs-toggle='tooltip' data-bs-placement='top' title='Posted By: ".$row["PostedBy"]."'>".$row["PostedBy"]."</td>
                    <td data-bs-toggle='tooltip' data-bs-placement='top' title='Created On: ".$row["Created_On"]."'>".$row["Created_On"]."</td>
                  </tr>
                ";
              }
            }

            // Validate search form
            if (isset($_GET["search_clients"])) {
              $target = filter_var($_GET["search_box"], FILTER_SANITIZE_STRING);
              $sql = "SELECT * FROM Customers WHERE FullName='$target' OR Title='$target' OR PostedBy='$target' OR Created_On='$target'";
              $result = $conn -> query($sql);
              
              if ($result -> num_rows > 0) {
                renderResults($result);
                $_SESSION['message'] = alert('info', $result -> num_rows." Results");
                echo '<div class="p-2 fw-bold"> Results </div>';
              } else {
                $_SESSION['message'] = alert('info', "0 Results");
                echo '<div class="p-2 fw-bold"> No Results </div>';
              }
            }

            // Validate search buttons
            else if (isset($_POST['del_all'])) {
              $target = $_POST['del_all'];
              $_GET['search_box'] = "";

              if (isset($target)) {
                $sql = "DELETE FROM Customers";
                $result = $conn -> query($sql);
                
                $sql = "SELECT * FROM Customers WHERE ID > -1";
                $result = $conn -> query($sql);
                
                if ($result -> num_rows > 1) {
                if ($result) { // $conn -> query($sql) === TRUE
                  $_SESSION["message"] = alert("success", "All records are deleted successfully");
                } else {
                  $_SESSION["message"] = alert("error", "No records to delete");
                }
              }
              }
            }

            // Validate search buttons
            else if (isset($_POST['del'])) {
              $target = $_POST['del'];

              if (isset($target)) {
                // Delete
                $sql = "DELETE FROM Customers WHERE ID=$target";
                $result = $conn -> query($sql);

                // Reload
                $sql = "SELECT * FROM Customers";
                $result = $conn -> query($sql);

                if ($result -> num_rows > 0) {
                  renderResults($result);

                  if ($result) { // $conn -> query($sql) === TRUE
                    $_SESSION["message"] = alert("success", "Record deleted successfully");
                  } else {
                    $_SESSION["message"] = alert("error", "Error deleting record: " . $conn -> error);
                  }
                } else {
                  echo "<tr> No Data </tr>";
                }
              }
            }

            // Show all data
            else {
              $sql = "SELECT * FROM Customers";
              $result = $conn -> query($sql);
              
              if ($result -> num_rows > 0) {
                renderResults($result);
              } else {
                echo '<tr> <td colspan="6" class="text-center p-2 fw-bold fst-italic" style="user-select: none"> No Data </td> </tr>';
              }
            }
            $conn -> close();
          ?>
        </tbody>
      </table>
    </div>
  </main>

</body>