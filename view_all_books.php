<?php
        require "config.php";
        require "common.php";

        $mysqli = new mysqli($hostname, $username, $password, $dbname);

        $queryText = "SELECT * FROM Books;";
        $result = $mysqli -> query($queryText);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "ISBN: ".$row["ISBN"]."<br>";
            }
        }
?>
<?php include "templates/header.php"; ?>

    <h1 align="center">View All Books</h1>
    <table border="1" align="center" style="line-height:25px;">
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
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantityOnHand']; ?></td>
                <td><?php echo $row['quantitySold']; ?></td>
                <td><?php echo $row['publisherID']; ?></td>
            </tr>
            <?php
        }
    }
    else
    {
        ?>
        <tr>
            <th colspan="2">No Books Found</th>
        </tr>
        <?php
    }
    ?>
<a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>