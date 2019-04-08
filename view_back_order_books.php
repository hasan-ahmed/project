<?php
require "config.php";
require "common.php";

$mysqli = new mysqli($hostname, $username, $password, $dbname);

$queryText = "SELECT * FROM Books WHERE quantityOnHand = 0;";
$result = $mysqli -> query($queryText);

?>
<?php include "templates/header.php"; ?>

    <h1 align="center">View Back Ordered Books</h1>
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
        <th colspan="2">No back ordered books have been found in your bookstore!</th>
    </tr>
    </table>
    <?php
}
?>

    <a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>