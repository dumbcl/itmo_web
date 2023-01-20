<?php
    $connection = new mysqli("localhost", "root", "", "web5data");
    $query = "SELECT * FROM portfolio";
    $portfolio = mysqli_query($connection, $query);
    $id = intval($_GET['id']);
    foreach($portfolio as $work){
        if ($id == $work['ID']){
            ?>
            <form method="POST">
                <button><input type="submit" value="Delete" name="delete"></button>
            </form>
            <br>
            <a href="index.php?id=<?php echo $id; ?>">Back</a>
            <?php break;}
    }

if(isset($_POST['delete'])) {
    $query_delete = "DELETE from `portfolio` where ID=$id";
    mysqli_query($connection, $query_delete);
    $addres = 'location: list.php';
    header($addres);
}
?>
