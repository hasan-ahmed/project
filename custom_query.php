<?php
if (isset($_POST['submit'])) {
    require "config.php";
    require "common.php";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);
    $queryText = "SELECT * FROM bqc353_4.Books WHERE author = 'Amita Trasi';";
    echo $queryText;
    $result = $mysqli -> query($queryText);
    $row = $result -> fetch_assoc();
    $column_names = array_keys($row);
}

?>

<?php require "templates/header.php"; ?>



    <h2> Custom Query </h2>

    <form method="post">
        <label for="customquery">Custom Query</label>
        <?php
        echo "<input type=text name=customquery id=customquery value='".htmlspecialchars($chaine, ENT_QUOTES)."'>";
        ?>
        <input type="submit" name="submit" value="submit">
    </form>

<?php
if($result->num_rows > 0){
?>
    <table align="center">
    <tr>
        <?php
        for ($i =0; $i < sizeof($column_names); $i++) {
            ?>
            <th><?php echo $column_names[$i];?></th>
            <?php
        }
            ?>
    </tr>
<?php
    while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <?php
            for ($i = 0; $i < sizeof($row); $i++) {
                ?>
                <td> <?php echo $row[$i]?></td>
                <?php
            }
                ?>
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