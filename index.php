<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bazinga Web Hosting</title>

    <style>

        body {
            background-image: url("images/background.jpg");
        }

        h1 {
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
            color: black;
        }

        table {
            border-collapse: collapse;
        }

        .maintext {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }

        .logotext {
            color: white;
            font-family: Arial, Helvetica, sans-serif;

        }

        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 100%;
            padding: 10px;
            height: 75%;;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: #ff3f00;
            opacity: 0.8;
            margin-bottom: 5%;
        }
        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        #date {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        body {
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
          position: fixed;
          bottom: 0;
          width: 100%;
        }

        .navbar a {
          float: right;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        .navbar a:hover {
          background: #ff3f00;
          color: white;
        }

        .navbar a.active {
          background-color: #ff3f00;
          color: white;
        }

        .main {
          padding: 16px;
          margin-bottom: 30px;
        }


        .columnsmall {
            float: left;
            width: 25%;
            padding: 10px;
            height: 400px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
        
        .rowsmall:after {
            content: "";
            display: table;
            clear: both;
        }

        .button {
          background-color: #ff3f00;
          border: none;
          color: white;
          padding: 7px 16px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
          width: 50%;
        }

        .button:hover {
          background: #4CAF50;
          color: white;
        }

        .columntext {
            float: left;
            width: 100%;
            padding: 12px;
            height: 120px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            font-size: 20px;  
        }
        
        .rowstext:after {
            content: "";
            display: table;
            clear: both;
        }

        .showTable {
            color: black;
            margin-left:auto; 
            margin-right:auto;
            margin-top: 25%;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .noBorder {
            border: 0;
        }
        
    </style>

</head>

<body>
    <div class="maintext">
        <p id="date"></p>
        <h1>
            <a href="index.php">
                <img src="images/logo.png" alt="logo" height="200" width="850">
            </a>
        </h1>
    </div>

    <div class="row">
        <div class="column" style="background-color:white;">
            <h2>Control Panel</h2>
            <p><font color="black">Select the data you want to view or edit</font></p>

            <div class="columnsmall" style="background-color:lightslategray;">
                <img src="images/servers.png" alt="logo" height="150" width="250">
                </br>

                <div class="columntext"">
                    <p>
                        View server list information, edit server
                        </br>
                        configuration and modify specifications.
                    </p>

                    </br>
                    </br>

                    <form action="index.php" method="POST">
                        <button class="button" type="submit" name="tbl" value="servers">View Servers</button>
                    </form>

                    <!--
                    <a href="http://localhost/Bazinga/index.php?tbl=servers" class="button">View servers</a>
                    <a href="" class="button">Edit server list</a>
                    -->

                </div>
            </div>

            <div class="columnsmall" style="background-color:darkgrey;">
                <img src="images/customers.png" alt="logo" height="150" width="250">
                </br>

                <div class="columntext">

                    <p>
                        View customer information, modify and manage 
                        </br>
                        customer data with ease. Full control at your fingertips                      
                    </p>
                    </br>

                    <form action="index.php" method="POST">
                        <button class="button" type="submit" name="tbl" value="customers">View Customers</button>
                    </form>

                    <!--
                    <a href="http://localhost/Bazinga/index.php?tbl=customers" class="button">View customers</a>
                    <a href="#" class="button">Edit customers</a>
                    -->
                </div>
            </div>

            <div class="columnsmall" style="background-color:lightslategray;">
                <img src="images/orders.png" alt="logo" height="150" width="250">
                </br>

                <div class="columntext"">
                    <p>
                        View all orders, modify, add or delete orders
                        </br>
                        and sort orders by attributes.
                    </p>

                    </br>
                    </br>

                    <form action="index.php" method="POST">
                        <button class="button" type="submit" name="tbl" value="orders">View Orders</button>
                    </form>

                    <!--

                    <a href="http://localhost/Bazinga/index.php?tbl=orders" class="button">View orders</a>
                    <a href="#" class="button">Edit orders</a>
                    -->
                </div>
            </div>

            <div class="columnsmall" style="background-color:darkgrey;">
                <img src="images/packages.png" alt="logo" height="150" width="250">

                </br>
                <div class="columntext">

                    <p>
                        View all packages currently on offer,
                        </br>
                        modify package names, details and offers.
                        </br>
                    </p>

                    </br>
                    </br>

                    <form action="index.php" method="POST">
                        <button class="button" type="submit" name="tbl" value="packages">View Packages</button>
                    </form>

                    <!--

                    <a href="http://localhost/Bazinga/index.php?tbl=packages" class="button">View Packages</a>
                    <a href="#" class="button">Edit Packages</a>
                    -->
                </div>
            </div>

            <?php
                // test if 'tbl' variable is set in post
                if (isset($_POST["tbl"])) {
                    // set DB connection variables
                    $dbName = "bazingahosting";
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $table = $_POST["tbl"];
                    
                    // try to connect to the database with the above details, prints an error message if connection fails
                    $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");
                    
                    // if the 'orders' table is selected, set a sepcific sql query
                    if ($table == "orders") {
                        $sql = "SELECT
                                    orders.orderID,
                                    customers.name AS Name,
                                    packages.description AS Package,
                                    orders.description AS Description,
                                    servers.name AS Server
                                FROM
                                    orders
                                INNER JOIN customers
                                    ON orders.customerID = customers.customerID
                                INNER JOIN packages
                                    ON orders.packageID = packages.packageID
                                INNER JOIN servers
                                    ON orders.serverID = servers.serverID
                                ORDER BY orders.orderID;";
                    } else {
                        $sql = "SELECT * FROM $table;";
                    }
                
                    // execute sql query, print error message if the query fails
                    $result = $conn->query($sql) or die("There was an error running your SQL command.");
                
                    echo "<form method=\"POST\" action=\"edit.php\" style=\"font-size: 24px;\"><table class=\"showTable\">";
                        
                    // switch to print different databases to the screen
                    switch ($table) {
                        case 'orders':
                            echo "<tr><th>Order ID</th><th>Customer</th><th>Package</th><th>Description</th><th>Server</th><tr>";
                
                            // create a dynamic table of the SQL query results
                            while($row = $result->fetch_assoc()) {
                                $orderID = $row["orderID"];
                                $customer = $row["Name"];
                                $package = $row["Package"];
                                $description = $row["Description"];
                                $server = $row["Server"];
                                
                                echo "<tr>
                                    <td>$orderID</td>
                                    <td>$customer</td>
                                    <td>$package</td>
                                    <td>$description</td>
                                    <td>$server</td>
                                    <td>
                                        <button type=\"submit\" name=\"editID\" value=\"$orderID\">Edit</button>
                                    </td>
                                    </tr>";
                            }
                            break;
                        
                        case 'customers':
                            echo "<tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Telephone No</th><th>Customer Type</th><tr>";
                
                            // create a dynamic table of the SQL query results
                            while($row = $result->fetch_assoc()) {
                                $customerID = $row["customerID"];
                                $name = $row["name"];
                                $address = $row["address"];
                                $telephoneNo = $row["telephoneNo"];
                                $customerType = $row["customerType"];
                                
                                echo "<tr>
                                <td>$customerID</td>
                                    <td>$name</td>
                                    <td>$address</td>
                                    <td>$telephoneNo</td>
                                    <td>$customerType</td>
                                    <td>
                                    <button type=\"submit\" name=\"editID\" value=\"$customerID\">Edit</button>
                                    </td>
                                </tr>";
                            }
                            break;
                
                        case 'packages':
                            echo "<tr><th>Package ID</th><th>CPU</th><th>RAM</th><th>Storage</th><th>Network</th><th>Description</th><th>Price</th><tr>";
                
                            // create a dynamic table of the SQL query results
                            while($row = $result->fetch_assoc()) {
                                $packageID = $row["packageID"];
                                $cpu = $row["cpu"];
                                $ram = $row["ram"];
                                $storage = $row["storage"];
                                $network = $row["network"];
                                $description = $row["description"];
                                $price = $row["price"];
                                
                                echo "<tr>
                                    <td>$packageID</td>
                                    <td>$cpu</td><td>$ram</td>
                                    <td>$storage</td>
                                    <td>$network</td>
                                    <td>$description</td>
                                    <td>$price</td>
                                    <td>
                                    <button type=\"submit\" name=\"editID\" value=\"$packageID\">Edit</button>
                                    </td>
                                </tr>";
                            }
                            break;
                        
                        case 'servers':
                            echo "<tr><th>Server ID</th><th>Name</th><th>Last Serviced</th><tr>";
                
                            // create a dynamic table of the SQL query results
                            while($row = $result->fetch_assoc()) {
                                $serverID = $row["serverID"];
                                $name = $row["name"];
                                $lastServiced = $row["lastServiced"];
                                
                                echo "<tr>
                                    <td>$serverID</td>
                                    <td>$name</td>
                                    <td>$lastServiced</td>
                                    <td>
                                        <button type=\"submit\" name=\"editID\" value=\"$serverID\">Edit</button>
                                    </td>
                                </tr>";
                            }
                            break;
                    }
                
                        echo "</table>
                        <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                        <button type=\"submit\" name=\"enterNewRow\" value=\"$table\">Add New Row</button>
                    </form></br></br>";
                
                
                    // close database connections
                    $conn->close();
                }
            ?>
        </div>

    </div>

    <div class="navbar">
        <a href="index.php" class="active">Home</a>
        <a href="#project">About our project</a>
        <a href="aboutus.html">About us</a>
    </div>
    

</body>
</html>
