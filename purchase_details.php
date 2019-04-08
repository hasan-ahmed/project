<?php
require "config.php";
require "common.php";

$mysqli = new mysqli($hostname, $username, $password, $dbname);

$queryText = "SELECT Customers.name, sum(Sales.quantity * Books.price) as 'total' 
              FROM Customers
              INNER JOIN Sales
              ON Customers.customerID = Sales.customerID
              INNER JOIN book_sale
              ON book_sale.saleID = Sales.saleID
              INNER JOIN Books
              ON Books.ISBN = book_sale.ISBN
              WHERE (Sales.date between MAKEDATE(year(now()),1) AND NOW()) 
              GROUP BY Customers.name;";
$result = $mysqli -> query($queryText);

?>
<?php include "templates/header.php"; ?>

    <h1 align="center">View All Book Details</h1>
    <table align="center">
    <tr>
        <th>Customer Name</th>
        <th>Total Spent This Year</th>
    </tr>
<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['total']; ?></td>
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
        <th colspan="2">No customers have made purchases in the current year</th>
    </tr>
    </table>
    <?php
}
?>

    <a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>