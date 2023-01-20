<form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" id="name" name="name" minlength="1"></td>
        </tr>
        <tr>
            <td>Client:</td>
            <td><input type="text" id="client" name="client" minlength="1"></td>
        </tr>
        <tr>
            <td>Date of creation:</td>
            <td><input type="date" id="dateofcreation" name="dateofcreation"></td>
        </tr>
        <tr>
            <td>Link:</td>
            <td><input type="text" id="link" name="link" minlength="1"></td>
        </tr>
        <tr>
            <td> </td>
            <td><button type="submit" id="create" name="create">Create</button></td>
        </tr>
    </table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="ajax_create.js"></script>
<br>
<form method="GET">
    <table>
        <tr>
            <td>Id:</td>
            <td><input type="number" name="id"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="To Update" name="toupdate"></td>
        </tr>
    </table>
</form>
<br>
<form method="GET">
    <table>
        <tr>
            <td>Id:</td>
            <td><input type="number" name="id"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="To Delete" name="todelete"></td>
        </tr>
    </table>
</form>

<?php
if(isset($_POST['create'])) {
    $connection = new mysqli("localhost", "root", "", "web5data");
    $query_select = "SELECT * FROM portfolio;";
    $portfolio = mysqli_query($connection, $query_select);
    $max_id = 0;
    foreach($portfolio as $work){
        if (intval($work['ID']) > $max_id) {$max_id = intval($work['ID']);}
    }
    $max_id = $max_id + 1;
    $name = $_POST['name'];
    $client = $_POST['client'];
    $dateofcreation = $_POST['dateofcreation'];
    $link = $_POST['link'];
    $smh = $query_insert = "INSERT INTO `portfolio` (`ID`, `NAME`, `CLIENT`, `DATEOFCREATION`, `LINK`) VALUES ('$max_id', '$name', '$client', '$dateofcreation', '$link');";
    mysqli_query($connection, $query_insert);
    $addres = 'location: index.php?id=' . strval($max_id);
    header($addres);
}

if(isset($_GET['toupdate'])) {
    $id = intval($_GET['id']);
    $addres = 'location: update.php?id=' . strval($id);
    header($addres);
}

if(isset($_GET['todelete'])) {
    $id = intval($_GET['id']);
    $addres = 'location: delete.php?id=' . strval($id);
    header($addres);
}
?>
