<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <table class="table table-hover tm-table-small tm-product-table">
            <thead>
                <tr>

                    <th scope="col">&nbsp;</th>
                    <th scope="col">Item Id</th>
                    <th scope="col">Item NAME</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">MRP</th>
                    <th scope="col">Delete Item</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to your database

                include("config.php");
                // Fetch data from the database
                $sql = "SELECT * FROM items"; // Replace with your table name
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>&nbsp;</td>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["mrp"] . "</td>";
                        echo "<td><button type='submit' name='delete' value='" . $row["id"] . "'>Delete</button></td>";
                        echo "<td>&nbsp;</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>0 results</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>





    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>