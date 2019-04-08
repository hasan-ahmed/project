<?php
    if (isset($_POST['submit'])) {
        require "config.php";
        require "common.php";

        $mysqli = new mysqli($hostname, $username, $password, $dbname);

        $customername = "'".$_POST['customername']."'";
        $queryText = "SELECT * FROM Sales WHERE customerID in (SELECT customerID from Customers WHERE name = ".$customername."\' );";
        echo $queryText;

        $result = $mysqli -> query($queryText);
    }

?>

<?php require "templates/header.php"; ?>



<h2> View purchases for a given customer </h2>

<form method="post">
    <label for="customername">Customer Name</label>
    <input type="text" name="customername" id="customername">
    <input type="submit" name="submit" value="submit">
</form>

    <table align="center">
    <tr>
        <th>saleID</th>
        <th>quantity</th>
        <th>date</th>
        <th>customerID</th>
        <th>SSN</th>
    </tr>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['saleID']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['customerID']; ?></td>
                <td><?php echo $row['SSN']; ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
    else
    {
        ?>
        <tr>
            <th colspan="2">No Books have been found in your bookstore!</th>
        </tr>
        </table>
        <?php
    }
    ?>

<a href="index.php"> Back to home </a>

<?php require "templates/footer.php"; ?>