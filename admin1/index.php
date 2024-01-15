<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Product Admin - Dashboard HTML Template</title>
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
  <div class="" id="home">
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
              <a class="nav-link active" href="">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
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
              <a class="nav-link" href="products.php">
                <i class="fas fa-shopping-cart"></i>
                Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.html">
                <i class="far fa-user"></i>
                Accounts
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
                <a class="dropdown-item" href="http://localhost/CaterServ/index.html">Home</a>
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
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
        </div>
      </div>
      <!-- row -->
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block">
            <h2 class="tm-block-title">Latest Hits</h2>
            <canvas id="lineChart"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block">
            <h2 class="tm-block-title">Performance</h2>
            <canvas id="barChart"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-taller">
            <h2 class="tm-block-title">Storage Information</h2>
            <div id="pieChartContainer">
              <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
            <h2 class="tm-block-title">Notification List</h2>
            <div class="tm-notification-items">
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Jessica</b> and <b>6 others</b> sent you new
                    <a href="#" class="tm-notification-link">product updates</a>. Check new orders.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Oliver Too</b> and <b>6 others</b> sent you existing
                    <a href="#" class="tm-notification-link">product updates</a>. Read more reports.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Victoria</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">order updates</a>. Read order information.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Laura Cute</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">product records</a>.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Samantha</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">order stuffs</a>.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Sophie</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">product updates</a>.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Lily A</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">product updates</a>.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Amara</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">product updates</a>.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
              <div class="media tm-notification-item">
                <div class="tm-gray-circle">
                  <img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle" />
                </div>
                <div class="media-body">
                  <p class="mb-2">
                    <b>Cinthela</b> and <b>6 others</b> sent you
                    <a href="#" class="tm-notification-link">product updates</a>.
                  </p>
                  <span class="tm-small tm-text-color-secondary">6h ago.</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "CaterServ";

        $conn = mysqli_connect($host, $username, $password, $db);

        if (!$conn) {
          echo "not connected" . mysqli_connect_error();
        }

        // Fetch data from the database
        $sql = "SELECT * FROM booking_info"; // Replace with your table name
        $result = $conn->query($sql);
        ?>
        <div class="col-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
            <h2 class="tm-block-title">Booking List</h2>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ORDER NO.</th>
                  <th scope="col">User Name</th>
                  <th scope="col">City</th>
                  <th scope="col">Place</th>
                  <th scope="col">Event type</th>
                  <th scope="col">No of people</th>
                  <th scope="col">Type</th>
                  <th scope="col">Contact No:</th>
                  <th scope="col">Event Date</th>
                  <th scope="col">Email</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Connect to your database



                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uname']}</td>
                  <td>{$row['city']}</td>
                  <td>{$row['place']}</td>
                  <td>{$row['event_type']}</td>
                  <td>{$row['no_of_people']}</td>
                  <td>{$row['vegetarian_type']}</td>
                  <td>{$row['contact_no']}</td>
                  <td>{$row['event_date']}</td>
                  <td>{$row['email']}</td>
                  <td><a href='bookingreply.php?id={$row['id']}' class='btn btn-lg btn-primary'>Reply</a></td>
                  <td><a class='btn btn-lg btn-danger' href='item-delete.php?id={$row['id']}'>Delete</a></td>
                </tr>";
                }


                ?>






              </tbody>
            </table>
          </div>
        </div>
        <?php
        mysqli_close($conn);
        ?>
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
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="js/moment.min.js"></script>
  <!-- https://momentjs.com/ -->
  <script src="js/Chart.min.js"></script>
  <!-- http://www.chartjs.org/docs/latest/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script src="js/tooplate-scripts.js"></script>
  <script>
    Chart.defaults.global.defaultFontColor = "white";
    let ctxLine,
      ctxBar,
      ctxPie,
      optionsLine,
      optionsBar,
      optionsPie,
      configLine,
      configBar,
      configPie,
      lineChart;
    barChart, pieChart;
    // DOM is ready
    $(function() {
      drawLineChart(); // Line Chart
      drawBarChart(); // Bar Chart
      drawPieChart(); // Pie Chart

      $(window).resize(function() {
        updateLineChart();
        updateBarChart();
      });
    });
  </script>
</body>

</html>