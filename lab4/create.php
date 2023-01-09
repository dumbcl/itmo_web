<form method="POST">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" minlength="1"></td>
        </tr>
        <tr>
            <td>Client:</td>
            <td><input type="text" name="client" minlength="1"></td>
        </tr>
        <tr>
            <td>Year of creation:</td>
            <td><input type="month" name="yearofcreation"></td>
        </tr>
        <tr>
            <td>Link:</td>
            <td><input type="text" name="link" minlength="1"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="Create" name="create"></td>
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
    $portfolio = simplexml_load_file('data.xml');
    $work = $portfolio->addChild('work');
    $max_id = 0;
    foreach($portfolio->work as $work){
        if (intval($work->id) > $max_id) {$max_id = intval($work->id);}
    }
    $max_id = $max_id + 1;
    $work->addChild('id', $max_id);
    $work->addChild('name', $_POST['name']);
    $work->addChild('client', $_POST['client']);
    $work->addChild('yearofcreation', $_POST['yearofcreation']);
    $work->addChild('link', $_POST['link']);
    file_put_contents('data.xml', $portfolio->asXML());
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
