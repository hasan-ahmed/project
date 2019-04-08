<?php
require "config.php";
require "common.php";

$mysqli = new mysqli($hostname, $username, $password, $dbname);

$queryText = "SELECT * FROM Books b
              INNER JOIN order_books ob
              ON ob.ISBN = b.ISBN
              INNER JOIN Orders o
              ON o.orderId = ob.orderID
              WHERE b.ISBN NOT IN (SELECT ISBN FROM Shipments s WHERE s.date BETWEEN o.date AND NOW());";
$result = $mysqli -> query($queryText);

?>
<?php include "templates/header.php"; ?>

    <h1 align="center">View All Book Details</h1>
    <table align="center">
    <tr>
        <th>ISBN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Edition</th>
        <th>Price</th>
        <th>Quantity On Hand</th>
        <th>Quantity Sold</th>
        <th>Publisher ID</th>
        <th>Quantity Ordered</th>
        <th>Date Ordered</th>
    </tr>
<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['ISBN']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['edition']; ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td><?php echo $row['quantityOnHand']; ?></td>
            <td><?php echo $row['quantitySold']; ?></td>
            <td><?php echo $row['publisherID']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['date']; ?></td>
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

    <a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>