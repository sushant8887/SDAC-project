<?php

include('config.php');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $description = $_POST['description'];
//     $mrp = $_POST['mrp'];

//     $name = mysqli_real_escape_string($conn, $name);
//     $description = mysqli_real_escape_string($conn, $description);
//     $mrp = mysqli_real_escape_string($conn, $mrp);

//     $targetDir = "breakfast/";
//     $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
//     $targetFilePath = $targetDir . $fileName;
//     move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

//     $sql = "UPDATE dinner SET name='$name', description='$description', mrp='$mrp', image='$fileName' WHERE id=$id";

//     if (mysqli_query($conn, $sql)) {
//         header("Location: dinner.php");
//         exit();
//     } else {
//         echo "Error updating record: " . mysqli_error($conn);
//     }
// } else {
//     $id = isset($_GET['id']) ? $_GET['id'] : null;

//     if (!$id) {
//         echo "Error: Missing or invalid 'id' parameter.";
//         exit();
//     }

//     $sql = "SELECT * FROM dinner WHERE id=$id";
//     $result = mysqli_query($conn, $sql);

//     if (!$result) {
//         die("Error: " . $sql . "<br>" . mysqli_error($conn));
//     }

//     $row = mysqli_fetch_assoc($result);
//     



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $item_id = $_POST['product_id']; // Assuming you have an item ID to identify the item
  $name = $_POST['pname']; // New item name
  $description = $_POST['pdescription']; // New item description
  $mrp = $_POST['pmrp'];

  $name = mysqli_real_escape_string($conn, $name);
  $description = mysqli_real_escape_string($conn, $description);
  $mrp = mysqli_real_escape_string($conn, $mrp);


  $targetDir = "ItemImages/";
  $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);



  // Update item details in the database
  $sql = "UPDATE items SET pname = '$name', pdescription = '$description', pmrp='$mrp' , pimage='$fileName' WHERE product_id = $item_id";

  if (mysqli_query($conn, $sql)) {
    header("Location:products.php");
    exit();
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
} else {
  $item_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
  if (!$item_id) {
    echo "Error: Missing or Invalid 'product_id' parameter.";
    exit();
  }
  $sql = "SELECT * FROM items WHERE product_id= $item_id";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
  }
  $row = mysqli_fetch_assoc($result);


?>





  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit Product - Dashboard Admin Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css" />
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
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
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">

        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Edit Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">


              <div class="col-xl-12 col-lg-12 col-md-12">

                <form action="edit-product.php" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"> </input>
                  <div class="form-group mb-3">
                    <label for="name">Product Name </label>
                    <input type="text" required class="form-control" name="pname" id="name" placeholder="Product Name" value="<?php echo $row['pname']; ?>" />
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea required class="form-control validate" name="pdescription" rows="3" required><?php echo $row['pdescription']; ?></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <select name="pcategory" required class="custom-select tm-select-accounts" id="category">
                      <option>Select Category</option>
                      <option value="Starter" <?php if ($row['pcategory'] === 'Starter') echo 'selected'; ?>>Starter</option>

                      <option value="Drinks" <?php if ($row['pcategory'] === 'Drinks') echo 'selected'; ?>>Drinks</option>

                      <option value="Main Course" <?php if ($row['pcategory'] === 'Main Course') echo 'selected'; ?>>Main Course</option>

                      <option value="Offer" <?php if ($row['pcategory'] === 'Offer') echo 'selected'; ?>>Offer</option>

                      <option value="Our Special" <?php if ($row['pcategory'] === 'Our Special') echo 'selected'; ?>>Our Special</option>
                    </select>
                  </div>
                  <div class="row">
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="stock">MRP </label>
                      <input id="mrp" name="pmrp" type="number" required class="form-control validate" value="<?php echo $row['pmrp']; ?>" />
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <label for="image">Product Image </label>
                    <img src="ItemImages/<?php echo $row['pimage']; ?>" class="img-fluid rounded-top  form-group mb-3" width="300px" alt="" />
                  </div>


                  <div class="form-group mb-3">
                    <label for="" class="form-label">Choose New Image</label>
                    <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId" required>
                    <div id="fileHelpId" class="form-text"></div>
                  </div>


                  <div class="col-12">
                    <button type="submit" name="update_item_image" class="btn btn-primary btn-block text-uppercase">
                      Update Now
                    </button>
                  </div>
                  <div style="margin-top: 10px;" class="col-12">
                    <a name="delete_item" id="" class="btn btn-primary btn-block text-uppercase" href="item-delete.php?product_id=<?php echo $row['product_id']; ?>" role="button">Delete Now</a>






                  </div>
                </form>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>




    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. Design:
          <a rel="nofollow noopener" href="" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker({
          defaultDate: "10/22/2020",
        });
      });
    </script>
  </body>

  </html>
<?php
}
$conn->close();
?>