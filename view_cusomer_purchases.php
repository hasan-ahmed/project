<?php
    if (isset($_POST['submit'])) {
        require "config.php";
        require "common.php";

        $mysqli = new mysqli($hostname, $username, $password, $dbname);

        $customerid = "'".$_POST['customerid']."'";
        $queryText = "SELECT * FROM Sales WHERE customerID = ".$customerid.";";

        $result = $mysqli -> query($queryText);
    }

?>

<?php require "templates/header.php"; ?>



<h2> View purchases for a given customer </h2>

<form method="post">
    <label for="customername">Customer ID</label>
    <input type="text" name="customerid" id="customerid">
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
            <th colspan="5">No sales matching the specified customer name have been found!</th>
        </tr>
        </table>
        <?php
    }
    ?>

<a href="index.php"> Back to home </a>

<?php require "templates/footer.php"; ?>