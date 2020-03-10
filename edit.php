<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Bazinga Web Hosting</title>
    
</head>
<body>

    <div class="maintext">
        <p id="date"></p>
        <a href="index.php">
            <h1>
                <img src="images/logo-banner.png" alt="logo" height="200" width="850">
            </h1>
        </a>

    </div>


    <div class="alterForm">
        <?php
            if (isset($_POST["enterNewRow"])) {
                $dbName = "bazingahosting";
                $host = "localhost";
                $username = "root";
                $password = "";
                $table = $_POST["enterNewRow"];

                //echo "<h1>Add new row in $table!</h1>";

                ?>
                <div class="title">
                    <h2>Adding new row to <?php echo $table ?>!</h2>
                    <p>Please enter data below.</p>
                </div>
                <?php

                
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

                        ?>
                        <form method="POST" action="edit.php"><table class="showTable">
                        <thead><tr><th>Customer</th><th>Package</th><th>Description</th><th>Server</th></tr></thead><tbody>
                            <tr>  
                                <td><select name="newCustomerID" id="newCustomerID">";
                                    <?php
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
                                    } ?>
                                </select></td>

                                <td><input type="text" name="newDescription" id="newDescription" placeholder="Enter value" /></td>
                                
                                <td><select name="newServerID" id="newServerID">";
                                    <?php
                                    // while loop to show customer names in a drop down menu, uses the customer table query
                                    while($row = $servers->fetch_assoc()) {              
                                        $number = $row["serverID"];
                                        $text = $row["name"];

                                        echo "<option value=\"$number\">$text</option>";
                                    }
                                echo "</select></td>
                                </tr></tbody></table>
                                <br />
                                <button type=\"submit\" name=\"processNewRow\" id=\"processNewRow\" value=\"$table\">Submit</button>
                                </form>";
                        break;
                    
                    case 'customers':
                        ?>
                            <form method="POST" action="edit.php">
                                <table class="showTable">
                                    <thead><tr>
                                        <th>Name</th><th>Address</th><th>Telephone</th><th>Customer Type</th></thead></tbody>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="newName" id="newName" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newAddress" id="newAddress" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newTelephone" id="newTelephone" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newCustomerType" id="newCustomerType" placeholder="Enter value" /></td>
                                    </tr></tbody>
                                </table>
                                <button type="submit" name="processNewRow" id="processNewRow" value="<?php echo "$table"?>">Submit</button>
                            </form>
                        <?php
                        break;
                    
                    case 'packages':
                        ?>
                            <form method="POST" action="edit.php">
                                <table class="showTable">
                                    <thead><tr>
                                        <th>CPU</th><th>RAM</th><th>Storage</th><th>Network</th><th>Decription</th><th>Price</th></thead></tbody>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="newCPU" id="nenewCPUName" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newRam" id="newRam" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newStorage" id="newStorage" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newNetwork" id="newNetwork" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newDescription" id="newDescription" placeholder="Enter value" /></td>
                                        <td><input type="text" name="newPrice" id="newPrice" placeholder="Enter value" /></td>
                                    </tr></tbody>
                                </table>
                                <button type="submit" name="processNewRow" id="processNewRow" value="<?php echo "$table"?>">Submit</button>
                            </form>
                        <?php
                        break;
                    
                    case 'servers':
                        ?>
                            <form method="POST" action="edit.php">
                                <table class="showTable">
                                    <thead><tr>
                                        <th>Name</th><th>Last Serviced</th>
                                    </tr></thead><tbody>
                                    <tr>
                                        <td><input type="text" name="newName" id="newName" placeholder="Enter value"/></td>
                                        <td><input type="text" name="newLastServiced" id="newLastServiced" placeholder="Enter value"/></td>
                                    </tr></tbody>
                                </table>
                                <button type="submit" name="processNewRow" id="processNewRow" value="<?php echo "$table"?>">Submit</button>
                            </form>
                        <?php
                        break;
                }
            } elseif (isset($_POST["processNewRow"])) {
                $dbName = "bazingahosting";
                $host = "localhost";
                $username = "root";
                $password = "";
                $table = $_POST["processNewRow"];

                $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");

                switch ($table) {
                    case 'orders':
                        $newCustomerID = $_POST["newCustomerID"];
                        $newPackageID = $_POST["newPackageID"];
                        $newDescription = $_POST["newDescription"];
                        $newServerID = $_POST["newServerID"];

                        if (empty($newCustomerID) or empty($newPackageID) or empty($newDescription) or empty($newServerID)) {
                            echo "<p>No empty rows allowed!</p><br />";
                            break;
                        }

                        $sql = "INSERT INTO `orders` (`customerID`, `packageID`, `description`, `serverID`)
                                VALUES ($newCustomerID, $newPackageID, '$newDescription', $newServerID)";

                        if(!$conn->query($sql)) {
                            die("There was an error running your SQL command.");
                        } else {
                            echo "<p>Row added successfully!</p><br />";
                        }
                        break;
                    
                    case 'customers':
                        $newName = $_POST["newName"];
                        $newAddress = $_POST["newAddress"];
                        $newTelephone = $_POST["newTelephone"];
                        $newCustomerType = $_POST["newCustomerType"];

                        if (empty($newName) or empty($newAddress) or empty($newTelephone) or empty($newCustomerType)) {
                            echo "<p>No empty rows allowed!</p><br />";
                            break;
                        }

                        $sql = "INSERT INTO `customers` (`name`, `address`, `telephoneNo`, `customerType`)
                                VALUES ('$newName', '$newAddress', '$newTelephone', '$newCustomerType');";

                        if(!$conn->query($sql)) {
                            die("There was an error running your SQL command.");
                        } else {
                            echo "<p>Row added successfully!</p><br />";
                        }
                        break;
                        
                    case 'packages':
                        $newCPU = $_POST["newCPU"];
                        $newRam = $_POST["newRam"];
                        $newStorage = $_POST["newStorage"];
                        $newNetwork = $_POST["newNetwork"];
                        $newDescription = $_POST["newDescription"];
                        $newPrice = $_POST["newPrice"];

                        if (empty($newCPU) or empty($newRam) or empty($newStorage) or empty($newNetwork) or empty($newDescription) or empty($newPrice)) {
                            echo "<p>No empty rows allowed!</p><br />";
                            break;
                        }

                        $sql = "INSERT INTO `packages` (`cpu`, `ram`, `storage`, `network`, `description`, `price`)
                                VALUES ('$newCPU', '$newRam', '$newStorage', '$newNetwork', '$newDescription', '$newPrice');";

                        if(!$conn->query($sql)) {
                            die("There was an error running your SQL command.");
                        } else {
                            echo "<p>Row added successfully!</p><br />";
                        }
                        break;

                    case 'servers':
                        $newName = $_POST["newName"];
                        $newLastServiced = $_POST["newLastServiced"];

                        if (empty($newName) or empty($newLastServiced)) {
                            echo "<p>No empty rows allowed!</p><br />";
                            break;
                        }

                        $sql = "INSERT INTO `servers` (`name`, `lastServiced`)
                                VALUES ('$newName', '$newLastServiced');";

                        if(!$conn->query($sql)) {
                            die("There was an error running your SQL command.");
                        } else {
                            echo "<p>Row added successfully!</p><br />";
                        }
                        break;
                }

                ?>
                    <form action="index.php" method="POST">
                        <button class="button" type="submit" name="tbl" value="<?php echo "$table"?>">Return to home</button>
                    </form>

                    <form action="edit.php" method="POST">
                        <button class="button" type="submit" name="enterNewRow" value="<?php echo "$table"?>">Add new row</button>
                    </form>
                <?php
                    
                $conn->close();

            } elseif (isset($_POST["updateRow"])) {
                $dbName = "bazingahosting";
                $host = "localhost";
                $username = "root";
                $password = "";
                $table = $_POST["tbl"];
                $id = $_POST["editID"];

                $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");
                
                switch ($table) {
                    case 'orders':
                        
                        $newCustomerID = $_POST["newCustomerID"];
                        $newPackageID = $_POST["newPackageID"];
                        $newDescription = $_POST["newDescription"];
                        $newServerID = $_POST["newServerID"];
                        
                        $sql = "UPDATE `orders` 
                                SET
                                    `customerID` = '$newCustomerID',
                                    `packageID` = '$newPackageID',
                                    `description` = '$newDescription',
                                    `serverID` = '$newServerID'
                                WHERE
                                    `orderID` = $id;";

                        break;
                    
                    case 'customers':

                        $newName = $_POST["newName"];
                        $newAddress = $_POST["newAddress"];
                        $newTelephone = $_POST["newTelephone"];
                        $newCustomerType = $_POST["newCustomerType"];

                        $sql = "UPDATE `customers` 
                                SET
                                    `name` = '$newName',
                                    `address` = '$newAddress',
                                    `telephoneNo` = '$newTelephone',
                                    `customerType` = '$newCustomerType'
                                WHERE
                                    `customerID` = $id;";
                        break;

                    case 'packages':

                        $newCPU = $_POST["newCPU"];
                        $newRam = $_POST["newRam"];
                        $newStorage = $_POST["newStorage"];
                        $newNetwork = $_POST["newNetwork"];
                        $newDescription = $_POST["newDescription"];
                        $newPrice = $_POST["newPrice"];

                        $sql = "UPDATE `packages` 
                                SET
                                    `cpu` = '$newCPU',
                                    `ram` = '$newRam',
                                    `storage` = '$newStorage',
                                    `network` = '$newNetwork',
                                    `description` = '$newDescription',
                                    `price` = '$newPrice'
                                WHERE
                                    `packageID` = $id;";
                        break;

                    case 'servers':

                        $newName = $_POST["newName"];
                        $newLastServiced = $_POST["newLastServiced"];

                        $sql = "UPDATE `servers` 
                                SET
                                    `name` = '$newName',
                                    `lastServiced` = '$newLastServiced'
                                WHERE
                                    `serverID` = $id;";
                        break;
                }
                $result = $conn->query($sql) or die("There was an error running your SQL command.");

                ?>
                    <form action="index.php" method="POST">
                        <button class="button" type="submit" name="tbl" value="<?php echo "$table"?>">Return to home</button>
                    </form>
                <?php

                $conn->close();

            } else { // edit existing row

                $dbName = "bazingahosting";
                $host = "localhost";
                $username = "root";
                $password = "";
                $table = $_POST["tbl"];
                $id = $_POST["editID"];

                ?>
                <div class="title">
                    <h2>Editing the <?php echo $table ?> table!</h2>
                    <p>Enter data below.</p>
                </div>
                <?php

                $conn = new mysqli($host, $username, $password, $dbName) or die("Unable to locate DBMS and/or DB.");

                echo "<form method=\"POST\" action=\"edit.php\"><table class=\"showTable\">";
                    
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

                        echo "<thead><tr><th>Order ID</th><th>Customer</th><th>Package</th><th>Description</th><th>Server</th><th></th><tr></thead><tbody>";

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
                                <button class=\"button\" type=\"submit\" name=\"updateRow\" value=\"Submit\">Submit</button>
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

                            echo "<thead><tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Telephone</th><th>Customer Type</th><th></th></tr></thead><tbody>
                            <tr>
                                <td>$id</td>
                                <td><input type=\"text\" name=\"newName\" id=\"newName\" value=\"$name\" /></td>
                                <td><input type=\"text\" name=\"newAddress\" id=\"newAddress\" value=\"$address\" /></td>
                                <td><input type=\"text\" name=\"newTelephone\" id=\"newTelephone\" value=\"$telephoneNo\" /></td>
                                <td><input type=\"text\" name=\"newCustomerType\" id=\"newCustomerType\" value=\"$customerType\" /></td>
                                <td>
                                    <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                                    <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                                    <button class=\"button\" type=\"submit\" name=\"updateRow\" value=\"Submit\">Submit</button>
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

                            echo "<thead><tr><th>Package ID</th><th>CPU</th><th>RAM</th><th>Storage</th><th>Network</th><th>Description</th><th>Price</th><th></th></tr></thead><tbody>             
                            <tr>
                                <td>$id</td>
                                <td><input type=\"text\" name=\"newCPU\" id=\"newCPU\" value=\"$cpu\" /></td>
                                <td><input type=\"text\" name=\"newRam\" id=\"newRam\" value=\"$ram\" /></td>
                                <td><input type=\"text\" name=\"newStorage\" id=\"newStorage\" value=\"$storage\" /></td>
                                <td><input type=\"text\" name=\"newNetwork\" id=\"newNetwork\" value=\"$network\" /></td>
                                <td><input type=\"text\" name=\"newDescription\" id=\"newDescription\" value=\"$description\" /></td>
                                <td><input type=\"text\" name=\"newPrice\" id=\"newPrice\" value=\"$price\" /></td>
                                <td>
                                    <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                                    <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                                    <button class=\"button\" type=\"submit\" name=\"updateRow\" value=\"Submit\">Submit</button>
                                </td>
                            </tr>";

                            break;
                        
                        case 'servers':
                            $sql = "SELECT * FROM servers WHERE serverID = $id;";
                            $result = $conn->query($sql) or die("There was an error running your SQL command ($sql)");

                            $row = $result->fetch_assoc();
                            $name = $row["name"];
                            $lastServiced = $row["lastServiced"];


                            echo "<thead><tr><th>Server ID</th><th>Name</th><th>Last Serviced</th><th></th></tr></thead><tbody>
                            <tr>
                                <td>$id</td>
                                <td><input type=\"text\" name=\"newName\" id=\"newName\" value=\"$name\" /></td>
                                <td><input type=\"text\" name=\"newLastServiced\" id=\"newLastServiced\" value=\"$lastServiced\" /></td>
                                <td>
                                    <input type=\"hidden\" name=\"editID\" id=\"editID\" value=\"$id\">
                                    <input type=\"hidden\" name=\"tbl\" value=\"$table\">
                                    <button class=\"button\" type=\"submit\" name=\"updateRow\" value=\"Submit\">Submit</button>
                                </td>
                            </tr>";

                            break;
                }

                echo "</tbody></table></form>";

            }
        ?>
    </div>

</body>
</html>