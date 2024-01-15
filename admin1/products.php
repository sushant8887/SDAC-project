<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Product Page - Admin HTML Template</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css" />
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
  <nav class="navbar navbar-expand-xl">
    <div class="container h-100">
      <a class="navbar-brand" href="index.php">
        <h1 class="tm-site-title mb-0">Product Admin</h1>
      </a>
      <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-tachometer-alt"></i> Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-file-alt"></i>
              <span> Reports <i class="fas fa-angle-down"></i> </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Daily Report</a>
              <a class="dropdown-item" href="#">Weekly Report</a>
              <a class="dropdown-item" href="#">Yearly Report</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="products.php">
              <i class="fas fa-shopping-cart"></i> Products
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="accounts.html">
              <i class="far fa-user"></i> Accounts
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
              <span> Settings <i class="fas fa-angle-down"></i> </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Billing</a>
              <a class="dropdown-item" href="#">Customize</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link d-block" href="login.html">
              Admin, <b>Logout</b>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
          <div class="tm-product-table-container">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "CaterServ");
            $query = "SELECT * FROM items";
            $query_run = mysqli_query($conn, $query);


            ?>
            <table class="table table-hover tm-table-small tm-product-name =<?php echo $row["product_id"]; ?>">
              <thead>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <!-- <th scope="col">Item Id</th> -->
                  <th scope="col">Item NAME</th>
                  <th scope="col">Category</th>
                  <th scope="col">Description</th>
                  <th scope="col">MRP</th>
                  <th scope="col">Image</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $row) {

                ?>
                    <tr class='tm-product-name'>
                      <td><?php echo $row['product_id']; ?></td>
                      <td><?php echo $row['pname']; ?></td>
                      <td><?php echo $row['pcategory']; ?></td>
                      <td><?php echo $row['pdescription']; ?></td>
                      <td><?php echo $row['pmrp']; ?></td>
                      <td>
                        <img src="<?php echo "ItemImages/" . $row["pimage"]; ?>" width="200px" class="img-fluid rounded-top" alt="Image not found" />

                      </td>
                      <td><a href="edit-product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-block text-uppercase">Edit</a></td>


                    </tr>
                  <?php
                  }
                } else {



                  ?>



                  <tr>
                    <td>No Record Available</td>


                  </tr>
                <?php
                }
                ?>


            </table>
          </div>
          <!-- table container -->
          <a href="add-product.html" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
          <h2 class="tm-block-title">Product Categories</h2>
          <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">Category</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Connect to your database

                include("config.php");
                // Fetch data from the database
                $sql = "SELECT * FROM categories"; // Replace with your table name
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) {

                    echo "<td>" . $row["category_id"] . "</td>";
                    echo "<td>" . $row["category_name"] . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='7'>0 results</td></tr>";
                }
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
          <!-- table container -->
          <a name="" id="" class="btn btn-primary btn-block text-uppercase mb-3" href="add-category.html" role="button">Add new category</a>

        </div>
      </div>
    </div>
  </div>
  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        Copyright &copy; <b>2018</b> All rights reserved. Design:
        <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
      </p>
    </div>
  </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <!-- <script>
    $(function() {
      $(".tm-product-name").on("click", function() {
        window.location.href = "edit-product.php";
      });
    });
  </script> -->
</body>

</html>