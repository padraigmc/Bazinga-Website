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
	
	<title>Bazinga Web Hosting</title>
</head>
<body style="color: black;">

    <?php

    if (isset($_GET["enterNewRow"])) {
        echo "<h1>Add new row!</h1>";

        $dbName = "bazingahosting";
        $host = "localhost";
        $username = "root";
        $password = "";
        $table = $_GET["enterNewRow"];
        
        $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");

        switch ($table) {
            case 'orders':
                // MySQL statements for querying DB
                $sqlCustomers = "SELECT `customerID`, `name` FROM `customers` ORDER BY `customerID`;";
                $sqlPackages = "SELECT `packageID`, `description` FROM `packages` ORDER BY `packageID`;";
                $sqlServers = "SELECT `serverID`, `name` FROM `servers` ORDER BY `serverID`;";

                // executing all of the MySQL statements defined above
                $customers = $conn->query($sqlCustomers) or die("There was an error running your SQL command ($customer)");
                $packages = $conn->query($sqlPackages) or die("There was an error running your SQL command ($package)");
                $servers = $conn->query($sqlServers) or die("There was an error running your SQL command ($server)");

                echo "<form method=\"GET\" id=\"addRow\" action=\"index.php\"><table>";
                echo "<tr><th>Customer</th><th>Package</th><th>Description</th><th>Server</th></tr>                
                    <tr>  
                        <td><select name=\"newCustomerID\" id=\"newCustomerID\">";
                                // while loop to show customer names in a drop down menu, uses the customer table query
                                while($row = $customers->fetch_assoc()) {              
                                    $number = $row["customerID"];
                                    $text = $row["name"];

                                    echo "<option value=\"$number\">$text</option>";
                                }
                        echo "</select></td>
                        <td><select name=\"newPackageID\" id=\"newPackageID\">";
                                // while loop to show customer names in a drop down menu, uses the customer table query
                                while($row = $packages->fetch_assoc()) {              
                                    $number = $row["packageID"];
                                    $text = $row["description"];

                                    echo "<option value=\"$number\">$text</option>";
                                }
                        echo "</select></td>
                        <td><input type=\"text\" name=\"newDescription\" id=\"newDescription\" value=\"\" /></td>
                        
                        <td><select name=\"newServerID\" id=\"newServerID\">";
                                // while loop to show customer names in a drop down menu, uses the customer table query
                                while($row = $servers->fetch_assoc()) {              
                                    $number = $row["serverID"];
                                    $text = $row["name"];

                                    echo "<option value=\"$number\">$text</option>";
                                }
                        echo "</select></td>
                        </tr></table>
                        <br />
                        <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                        <input type=\"submit\" name=\"processNewRow\" id=\"processNewRow\" value=\"Submit\" />
                        </form>";
                break;
        }
    } elseif (isset($_GET["processNewRow"])) {
        echo "<h1>Add new row!</h1>";

        $dbName = "bazingahosting";
        $host = "localhost";
        $username = "root";
        $password = "";
        $table = $_GET["tbl"];

        $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");

        $newCustomerID = $_GET["newCustomerID"];
        $newPackageID = $_GET["newPackageID"];
        $newDescription = $_GET["newDescription"];
        $newServerID = $_GET["newServerID"];

        $sql = "INSERT INTO `orders` (`customerID`, `packageID`, `description`, `serverID`)
                VALUES ($newCustomerID, $newPackageID, '$newDescription', $newServerID)";

        if(!$result = $conn->query($sql)) {
            die("There was an error running your SQL command.");
        } else {
            echo "Successful";
            echo "<br />";
            echo "<a href='test1.php?tbl=$table'>View result</a>";
        }
            
        $conn->close();



    } elseif (isset($_GET["updateRow"])) {
        $dbName = "bazingahosting";
        $host = "localhost";
        $username = "root";
        $password = "";
        $table = $_GET["tbl"];
        $id = $_GET["editID"];

        $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");
        
        switch ($table) {
            case 'orders':
                
                $newCustomerID = $_GET["newCustomerID"];
                $newPackageID = $_GET["newPackageID"];
                $newDescription = $_GET["newDescription"];
                $newServerID = $_GET["newServerID"];
                
                $sql = "UPDATE `orders` 
                        SET
                            `customerID` = $newCustomerID,
                            `packageID` = $newPackageID,
                            `description` = '$newDescription',
                            `serverID` = $newServerID
                        WHERE
                            `orderID` = $id;";

                break;
            
            case 'customers':

                $newName = $_GET["newName"];
                $newAddress = $_GET["newAddress"];
                $newTelephone = $_GET["newTelephone"];
                $newCustomerType = $_GET["newCustomerType"];

                $sql = "UPDATE `customers` 
                        SET
                            `name` = $newName,
                            `address` = $newAddress,
                            `telephoneNo` = '$newTelephone',
                            `customerType` = $newCustomerType
                        WHERE
                            `customerID` = $id;";
                break;

            case 'packages':

                $newCPU = $_GET["newCPU"];
                $newRam = $_GET["newRam"];
                $newStorage = $_GET["newTelephone"];
                $newNetwork = $_GET["newCustomerType"];
                $newDescription = $_GET["newTelephone"];
                $newPrice = $_GET["newCustomerType"];

                $sql = "UPDATE `packages` 
                        SET
                            `cpu` = $newCPU,
                            `ram` = $newRam,
                            `storage` = '$newStorage',
                            `network` = $newNetwork,
                            `description` = $newDescription,
                            `price` = $newPrice
                        WHERE
                            `packageID` = $id;";
                break;

            case 'servers':

                $newName = $_GET["newName"];
                $newLastServiced = $_GET["newLastServiced"];

                $sql = "UPDATE `servers` 
                        SET
                            `name` = $newName,
                            `lastServiced` = $newLastServiced
                        WHERE
                            `serverID` = $id;";
                break;
        }

        $result = $conn->query($sql) or die("There was an error running your SQL command.");

        if($result){
            echo "Successful";
            echo "<BR>";
            echo "<a href='test1.php?tbl=$table'>View result</a>";
            }

        $conn->close();

    } else { // edit existing row
        $dbName = "bazingahosting";
        $host = "localhost";
        $username = "root";
        $password = "";
        $table = $_GET["tbl"];
        $id = $_GET["editID"];

        echo "<h1>Editing $table!</h1>";
        
        $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");

        echo "<form method=\"GET\" id=\"editOrders\" action=\"test2.php\"><table>";
            
        switch ($table) {
            case 'orders':
                // MySQL statements for querying DB
                $sqlOrders = "SELECT * FROM orders WHERE orderID = $id;";
                $sqlCustomers = "SELECT `customerID`, `name` FROM `customers` ORDER BY `customerID`;";
                $sqlPackages = "SELECT `packageID`, `description` FROM `packages` ORDER BY `packageID`;";
                $sqlServers = "SELECT `serverID`, `name` FROM `servers` ORDER BY `serverID`;";

                // executing all of the MySQL statements defined above
                $fullOrder = $conn->query($sqlOrders) or die("There was an error running your SQL command ($fullOrder)");
                $customer = $conn->query($sqlCustomers) or die("There was an error running your SQL command ($customer)");
                $package = $conn->query($sqlPackages) or die("There was an error running your SQL command ($package)");
                $server = $conn->query($sqlServers) or die("There was an error running your SQL command ($server)");

                echo "<tr><th>Order ID</th><th>Customer</th><th>Package</th><th>Description</th><th>Server</th><tr>";

                $row = $fullOrder->fetch_assoc();
                $customerID = $row["customerID"];
                $packageID = $row["packageID"];
                $description = $row["description"];
                $serverID = $row["serverID"];
                
                echo "<tr>                    
                    <td>$id</td>
                    <td><select name=\"newCustomerID\" id=\"newCustomerID\">
                            <option value=\"$customerID\">(unchanged)</option>";
                            // while loop to show customer names in a drop down menu, uses the customer table query
                            while($row = $customer->fetch_assoc()) {              
                                $number = $row["customerID"];
                                $text = $row["name"];
                                
                                // do not include the current customer name in the drop down
                                if ($customerID == $number) { continue; }

                                echo "<option value=\"$number\">$text</option>";
                            }
                    echo "</select></td>
                    <td><select name=\"newPackageID\" id=\"newPackageID\">
                            <option value=\"$packageID\">(unchanged)</option>";
                            // while loop to show customer names in a drop down menu, uses the customer table query
                            while($row = $package->fetch_assoc()) {              
                                $number = $row["packageID"];
                                $text = $row["description"];
                                
                                // do not include the current customer name in the drop down
                                if ($packageID == $number) { continue; }

                                echo "<option value=\"$number\">$text</option>";
                            }
                    echo "</select></td>
                    <td><input type=\"text\" name=\"newDescription\" id=\"newDescription\" value=\"$description\" /></td>
                    <td><select name=\"newServerID\" id=\"newServerID\">
                            <option value=\"$serverID\">(unchanged)</option>";
                            // while loop to show customer names in a drop down menu, uses the customer table query
                            while($row = $server->fetch_assoc()) {              
                                $number = $row["serverID"];
                                $text = $row["name"];
                                
                                // do not include the current customer name in the drop down
                                if ($serverID == $number) { continue; }

                                echo "<option value=\"$number\">$text</option>";
                            }
                    echo "</select></td>
                    <td>
                        <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                        <input type=\"hidden\" name=\"tbl\" id=\"tbl\" value=\"$table\">
                        <input type=\"submit\" name=\"updateRow\" id=\"updateRow\" value=\"Update\" />
                    </td>
                </tr>";

                break;

                case 'customers':
                    $sql = "SELECT * FROM customers WHERE customerID = $id;";
                    $result = $conn->query($sql) or die("There was an error running your SQL command ($sql)");

                    $row = $result->fetch_assoc();
                    $name = $row["name"];
                    $address = $row["address"];
                    $telephoneNo = $row["telephoneNo"];
                    $customerType = $row["customerType"];

                    echo "<tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Telephone</th><th>Customer Type</th></tr>                
                    <tr>
                        <td>$id</td>
                        <td><input type=\"text\" name=\"newName\" id=\"newName\" value=\"$name\" /></td>
                        <td><input type=\"text\" name=\"newAddress\" id=\"newAddress\" value=\"$address\" /></td>
                        <td><input type=\"text\" name=\"newTelephone\" id=\"newTelephone\" value=\"$telephoneNo\" /></td>
                        <td><input type=\"text\" name=\"newCustomerType\" id=\"newCustomerType\" value=\"$customerType\" /></td>
                        <td>
                            <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                            <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                            <input type=\"submit\" name=\"updateRow\" id=\"updateRow\" value=\"Submit\" />
                        </td>
                    </tr>";

                    break;

                case 'packages':
                    $sql = "SELECT * FROM packages WHERE packageID = $id;";
                    $result = $conn->query($sql) or die("There was an error running your SQL command ($sql)");

                    $row = $result->fetch_assoc();
                    $cpu = $row["cpu"];
                    $ram = $row["ram"];
                    $storage = $row["storage"];
                    $network = $row["network"];
                    $description = $row["description"];
                    $price = $row["price"];

                    echo "<tr><th>Package ID</th><th>CPU</th><th>RAM</th><th>Storage</th><th>Network</th><th>Description</th><th>Price</th></tr>                
                    <tr>
                        <td>$id</td>
                        <td><input type=\"text\" name=\"newCPU\" id=\"newCPU\" value=\"$cpu\" /></td>
                        <td><input type=\"text\" name=\"newRAM\" id=\"newRAM\" value=\"$ram\" /></td>
                        <td><input type=\"text\" name=\"newStorage\" id=\"newStorage\" value=\"$storage\" /></td>
                        <td><input type=\"text\" name=\"newNetwork\" id=\"newNetwork\" value=\"$network\" /></td>
                        <td><input type=\"text\" name=\"newDescription\" id=\"newDescription\" value=\"$description\" /></td>
                        <td><input type=\"text\" name=\"newPrice\" id=\"newPrice\" value=\"$price\" /></td>
                        <td>
                            <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                            <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                            <input type=\"submit\" name=\"updateRow\" id=\"updateRow\" value=\"Submit\" />
                        </td>
                    </tr>";

                    break;
                
                case 'servers':
                    $sql = "SELECT * FROM servers WHERE serverID = $id;";
                    $result = $conn->query($sql) or die("There was an error running your SQL command ($sql)");

                    $row = $result->fetch_assoc();
                    $name = $row["name"];
                    $lastServiced = $row["lastServiced"];


                    echo "<tr><th>Server ID</th><th>Name</th><th>Last Serviced</th></tr>                
                    <tr>
                        <td>$id</td>
                        <td><input type=\"text\" name=\"newName\" id=\"newName\" value=\"$name\" /></td>
                        <td><input type=\"text\" name=\"newLastServiced\" id=\"newLastServiced\" value=\"$lastServiced\" /></td>
                        <td>
                            <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                            <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                            <input type=\"submit\" name=\"updateRow\" id=\"updateRow\" value=\"Submit\" />
                        </td>
                    </tr>";

                    break;
        }

        echo "</table></form>";

    }

    ?>

    <div class="maintext">
        <p id="date"></p>
        <h1><img src="images/logo.png" alt="logo" height="200" width="850"></h1>

    </div>


    <div class="row">
        <div class="column" style="background-color:white;">
            <h2>Edit table</h2>
            <p><font color="black">Select the data you want to view or edit</font></p>
        </div>
    
        <div class="navbar">
            <a href="index.html" class="active">Home</a>
            <a href="#project">About our project</a>
            <a href="aboutus.html">About us</a>
        </div>

        <br /><br /><br />
        <div class="navbar">
            <a href="index.html" class="active">Home</a>
            <a href="#project">About our project</a>
            <a href="aboutus.html">About us</a>
        </div>
    </div>

</body>
</html>