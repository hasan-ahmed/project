<?php
        require "config.php";
        require "common.php";

        $mysqli = new mysqli($hostname, $username, $password, $dbname);

        $queryText = "SELECT * FROM Books;";
        $result = $mysqli -> query($queryText);

?>
<?php include "templates/header.php"; ?>

<?php
    if ($result && $result->num_rows > 0) {
?>
    <h2>Results</h2>

    <table>
        <thead>
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
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) ?>
            <tr>
                <td><?php echo $row["ISBN"]; ?></td>
                <td><?php echo escape($row["title"]); ?></td>
                <td><?php echo escape($row["author"]); ?></td>
                <td><?php echo escape($row["edition"]); ?></td>
                <td><?php echo escape($row["price"]); ?></td>
                <td><?php echo escape($row["quantityOnHand"]); ?></td>
                <td><?php echo escape($row["quantitySold"]); ?></td>
                <td><?php echo escape($row["publisherID"]); ?></td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
<a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>