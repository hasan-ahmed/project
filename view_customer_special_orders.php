<?php
if (isset($_POST['submit'])) {
    require "config.php";
    require "common.php";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);

    $customerid = "'".$_POST['customerid']."'";
    $queryText = "SELECT o.orderID, o.date, o.quantity, o.SSN, bs.ISBN, b.title, b.author, b.edition,  o.quantity * b.price as Total
                  FROM bqc353_4.Orders o
                  INNER JOIN bqc353_4.order_books ob
                  ON ob.orderId =o.orderId
                  INNER JOIN bqc353_4.book_sale bs
                  ON bs.ISBN = ob.ISBN
                  INNER JOIN bqc353_4.Sales s
                  ON s.saleID = bs.saleID
                  INNER JOIN bqc353_4.Books b
                  on b.ISBN = bs.ISBN
                  WHERE s.customerID =".$customerid.";";

    $result = $mysqli -> query($queryText);
}

?>

<?php require "templates/header.php"; ?>



    <h2> View special orders for a given customer </h2>

    <form method="post">
        <label for="customername">Customer ID</label>
        <input type="text" name="customerid" id="customerid">
        <input type="submit" name="submit" value="submit">
    </form>

    <table align="center">
    <tr>
        <th>Order ID</th>
        <th>Quantity Ordered</th>
        <th>Date</th>
        <th>SSN</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Edition</th>
        <th>Total</th>
    </tr>
<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['orderID']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['SSN']; ?></td>
            <td><?php echo $row['ISBN']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['Total']; ?></td>
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
        <th colspan="5">No special orderes matching the specified customer name have been found!</th>
    </tr>
    </table>
    <?php
}
?>

    <a href="index.php"> Back to home </a>

<?php require "templates/footer.php"; ?>