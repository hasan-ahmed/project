<?php
if (isset($_POST['submit'])) {
    require "config.php";
    require "common.php";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);

    $emloyeename = "'".$_POST['employeessn']."'";
    $date = "'".$_POST['date']."'";
    $queryText = "SELECT * FROM Sales WHERE date = ".$date." AND SSN = ".$emloyeename.");";

    $result = $mysqli -> query($queryText);
}

?>

<?php require "templates/header.php"; ?>



    <h2> View sales made my given employee on given date </h2>

    <form method="post">
        <label for="employeename">Employee SSN</label>
        <input type="text" name="employeessn" id="employeessn">
        <label for="date">Sale Date</label>
        <input type="date" name="date" id="date" min="2019-01-01" value="2019-04-01">
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
        <th colspan="5">No sales made by this employee on given date!</th>
    </tr>
    </table>
    <?php
}
?>

    <a href="index.php"> Back to home </a>

<?php require "templates/footer.php"; ?>