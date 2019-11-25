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
            height: 600px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: #ff3f00;
            opacity: 0.8;
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
        }

        .button:hover {
          background: #4CAF50;
          color: white;
        }


        .columntext {
            float: left;
            width: 33.3333%;
            padding: 12px;
            height: 120px;
            width: 455px;
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


     
        
    </style>

</head>

<body>



    <div class="maintext">
        <p id="date"></p>
        <h1><img src="images/logo.png" alt="logo" height="200" width="850"></h1>

    </div>


    <div class="row">
        <div class="column" style="background-color:white;">
            <h2>Control Panel</h2>
            <p><font color="black">Select the data you want to view or edit</font></p>



            <div class="columnsmall" style="background-color:lightslategray;">
                <img src="images/servers.png" alt="logo" height="150" width="250">
                </br>

                

                <div class="columntext" style="background-color:darkgrey;">

                    <p>
                        View server list information, edit server
                        </br>
                        configuration and modify specifications.





                    </p>

                    </br>
                    </br>


                    <a href="http://localhost/Bazinga/index.php?tbl=servers" class="button">View servers</a>
                    <a href="" class="button">Edit server list</a>

                </div>




            </div>

            <div class="columnsmall" style="background-color:darkgrey;">
                <img src="images/customers.png" alt="logo" height="150" width="250">

                </br>

                

                <div class="columntext" style="background-color:lightslategray;">

                    <p>
                        View customer information, modify and manage 
                        </br>
                        customer data with ease. Full control at your fingertips
                        
                       
                    </p>

                    </br>

                    <a href="http://localhost/Bazinga/index.php?tbl=customers" class="button">View customers</a>
                    <a href="#" class="button">Edit customers</a>

                </div>


            </div>

            <div class="columnsmall" style="background-color:lightslategray;">
                <img src="images/orders.png" alt="logo" height="150" width="250">

                </br>

                

                <div class="columntext" style="background-color:darkgrey;">

                    <p>
                        View all orders, modify, add or delete orders
                        </br>
                        and sort orders by attributes.


                    </p>

                    </br>
                    </br>

                    <a href="http://localhost/Bazinga/index.php?tbl=orders" class="button">View orders</a>
                    <a href="#" class="button">Edit orders</a>

                </div>


            </div>

            <div class="columnsmall" style="background-color:darkgrey;">
                <img src="images/packages.png" alt="logo" height="150" width="250">

                </br>

                

                <div class="columntext" style="background-color:lightslategray;;">

                    <p>
                        View all packages currently on offer,
                        </br>
                        modify package names, details and offers.
                        </br>

                    </p>

                    </br>
                    </br>

                    <a href="http://localhost/Bazinga/index.php?tbl=packages" class="button">View Packages</a>
                    <a href="#" class="button">Edit Packages</a>


                </div>


            </div>



        </div>
    <!--

        Moved to underneath the php code
        Added some line breaks to see the entire php output
    
    <div class="navbar">
        <a href="index.html" class="active">Home</a>
        <a href="#project">About our project</a>
        <a href="aboutus.html">About us</a>
    </div>

    -->

    <?php


    if (isset($_GET["tbl"])) {
        
        $dbName = "bazingahosting";
        $host = "localhost";
        $username = "root";
        $password = "";
        $table = $_GET["tbl"];
        
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
    
        echo "<form method=\"GET\" id=\"edit\" action=\"edit.php\"><table>";
            
        // switch to print different databases to the screen
        switch ($table) {
            case 'orders':
                echo "<tr><th>Order ID</th><th>Customer</th><th>Package</th><th>Description</th><th>Server</th><tr>";
    
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
                            <input type=\"radio\" name=\"editID\" value=\"$orderID\">
                        </td>
                        </tr>";
                }
                break;
            
            case 'customers':
                echo "<tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Telephone No</th><th>Customer Type</th><tr>";
    
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
                            <input type=\"radio\" name=\"editID\" value=\"$customerID\">
                        </td>
                    </tr>";
                }
                break;
    
            case 'packages':
                echo "<tr><th>Package ID</th><th>CPU</th><th>RAM</th><th>Storage</th><th>Network</th><th>Description</th><th>Price</th><tr>";
    
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
                            <input type=\"radio\" name=\"editID\" value=\"$packageID\">
                        </td>
                    </tr>";
                }
                break;
            
            case 'servers':
                echo "<tr><th>Server ID</th><th>Name</th><th>Last Serviced</th><tr>";
    
                while($row = $result->fetch_assoc()) {
                    $serverID = $row["serverID"];
                    $name = $row["name"];
                    $lastServiced = $row["lastServiced"];
                    
                    echo "<tr>
                        <td>$serverID</td>
                        <td>$name</td>
                        <td>$lastServiced</td>
                        <td>
                            <input type=\"radio\" name=\"editID\" value=\"$serverID\">
                        </td>
                    </tr>";
                }
                break;
        }
    
            echo "</table><br />
            <input type=\"hidden\" name=\"tbl\" value=\"$table\">
            <input type=\"submit\" name=\"update\" id=\"update\" value=\"Edit Selection\" />
            <button type=\"submit\" name=\"enterNewRow\" value=\"$table\">Add New Row</button>
        </form>";
    
    
        // free variables and close database connections
        $result->free();
        $conn->close();
        


    }

    ?>

    <br /><br /><br />
    <div class="navbar">
        <a href="index.html" class="active">Home</a>
        <a href="#project">About our project</a>
        <a href="aboutus.html">About us</a>
    </div>
    

</body>
</html>
