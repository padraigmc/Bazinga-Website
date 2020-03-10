<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Bazinga Web Hosting</title>

</head>

<body>
    <a href="index.php" class="banner">
        <img src="images/logo-banner.png" alt="logo" height="150" width="650">
    </a>

    <div class="main">

        <div class="title">
            <h2>Control Panel</h2>
            <p>Select the data you want to view or edit</p>
        </div>
        
        <div class="column" style="background-color:lightslategray;">
            
            <div class="columnImage">
                <img src="images/servers.png" alt="logo" height="150" width="250">
            </div>

            <div class="columnText">
                <p>
                    View server list information, edit server configuration and modify specifications.
                </p>            
            </div>

            <div class="columnButton">
                <form action="index.php" method="POST">
                    <button class="button" type="submit" name="tbl" value="servers">View Servers</button>
                </form>
            </div>

        </div>

        <div class="column" style="background-color:darkgrey;">

            <div class="columnImage">
                <img src="images/customers.png" alt="logo" height="150" width="250">
            </div>

            <div class="columnText">    
                <p>
                    View customer information, modify and manage customer data with ease. Full control at your fingertips.
                </p>
            </div>

            <div class="columnButton">
                <form action="index.php" method="POST">
                    <button class="button" type="submit" name="tbl" value="customers">View Customers</button>
                </form>
            </div>
        </div>


        <div class="column" style="background-color:lightslategray;">

            <div class="columnImage">
                <img src="images/orders.png" alt="logo" height="150" width="250">
            </div>

            <div class="columnText"">
                <p>
                    View all orders, modify, add or delete orders and sort orders by attributes.
                </p>
            </div>

            <div class="columnButton">
                <form action="index.php" method="POST">
                    <button class="button" type="submit" name="tbl" value="orders">View Orders</button>
                </form>
            </div>

        </div>

        <div class="column" style="background-color:darkgrey;">

            <div class="columnImage">
                <img src="images/packages.png" alt="logo" height="150" width="250">
            </div>
            
            <div class="columnText">
                <p>
                    View all packages currently on offer, modify package names, details and offers.
                </p>
            </div>

            <div class="columnButton">
                <form action="index.php" method="POST">
                    <button class="button" type="submit" name="tbl" value="packages">View Packages</button>
                </form>
            </div>

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
                    echo "<thead><tr><th>Order ID</th><th>Customer</th><th>Package</th><th>Description</th><th>Server</th><th></th><tr></thead><tbody>";
        
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
                                <button type=\"submit\" id=\"editButton\" name=\"editID\" value=\"$orderID\">Edit</button>
                            </td>
                            </tr>";
                    }
                    break;
                
                case 'customers':
                    echo "<thead><tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Telephone No</th><th>Customer Type</th><th></th><tr></thead><tbody>";
        
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
                            <button type=\"submit\" id=\"editButton\" name=\"editID\" value=\"$customerID\">Edit</button>
                            </td>
                        </tr>";
                    }
                    break;
        
                case 'packages':
                    echo "<thead><tr><th>Package ID</th><th>CPU</th><th>RAM</th><th>Storage</th><th>Network</th><th>Description</th><th>Price</th><th></th><tr></thead><tbody>";
        
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
                            <button type=\"submit\" id=\"editButton\" name=\"editID\" value=\"$packageID\">Edit</button>
                            </td>
                        </tr>";
                    }
                    break;
                
                case 'servers':
                    echo "<thead><tr><th>Server ID</th><th>Name</th><th>Last Serviced</th><th></th><tr></thead><tbody>";
        
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
                                <button type=\"submit\" id=\"editButton\" name=\"editID\" value=\"$serverID\">Edit</button>
                            </td>
                        </tr>";
                    }
                    break;
            }
        
                echo "</tbody></table>
                <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                <button type=\"submit\" id=\"addButton\" name=\"enterNewRow\" value=\"$table\">Add New Row</button>
            </form></br></br>";
        
        
            // close database connections
            $conn->close();
        }
    ?>
    
    <div class="navbar">
        <a href="index.php" class="active">Home</a>
        <a href="#project">About our project</a>
        <a href="aboutus.html">About us</a>
    </div>
    

</body>
</html>
