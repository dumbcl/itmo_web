<?php
    $connection = new mysqli("localhost", "root", "", "web5data");
    $query = "SELECT * FROM portfolio";
    $portfolio = mysqli_query($connection, $query);
    $id = intval($_GET['id']);
    foreach($portfolio as $work){
        if ($id == $work['ID']){
            ?>
            <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" minlength="1" placeholder="<?php echo $work['NAME']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Client:</td>
                        <td><input type="text" name="client" minlength="1" placeholder="<?php echo $work['CLIENT']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Date of creation:</td>
                        <td><input type="date" name="dateofcreation" placeholder="<?php echo $work['DATEOFCREATION']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Link:</td>
                        <td><input type="text" name="link" minlength="1" placeholder="<?php echo $work['LINK']; ?>"></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td><button type="submit" id="update" name="update">Update</button></td>
                    </tr>
                </table>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="ajax_update.js"></script>
            <br>
            <a href="index.php?id=<?php echo $id; ?>">Back</a>
            <?php break;}
    }?>



<?php
if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $client = $_POST['client'];
    $dateofcreation = $_POST['dateofcreation'];
    $link = $_POST['link'];
    $query_update = "UPDATE `portfolio` SET name='$name', client='$client', dateofcreation='$dateofcreation', link='$link' where ID=$id";
    mysqli_query($connection, $query_update);
    $addres = 'location: index.php?id=' . strval($id);
    header($addres);
}
?>
