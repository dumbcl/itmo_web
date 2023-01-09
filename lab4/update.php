<?php
    $portfolio = simplexml_load_file('data.xml');
    $id = intval($_GET['id']);
    foreach($portfolio->work as $work){
        if ($id == $work->id){
            ?>
            <form method="POST">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" minlength="1" placeholder="<?php echo $work->name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Client:</td>
                        <td><input type="text" name="client" minlength="1" placeholder="<?php echo $work->client; ?>"></td>
                    </tr>
                    <tr>
                        <td>Year of creation:</td>
                        <td><input type="month" name="yearofcreation" placeholder="<?php echo $work->yearofcreation; ?>"></td>
                    </tr>
                    <tr>
                        <td>Link:</td>
                        <td><input type="text" name="link" minlength="1" placeholder="<?php echo $work->link; ?>"></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td><input type="submit" value="Update" name="update"></td>
                    </tr>
                </table>
            </form>
            <br>
            <a href="index.php?id=<?php echo $id; ?>">Back</a>
            <?php break;}
    }?>



<?php
if(isset($_POST['update'])) {
    $number_of_works = $portfolio->count();
    $real_id = 0;
    for ($i = 0; $i < $number_of_works; $i++) {
        if ($portfolio->work[$i]->id == $id) {$real_id = $i; break;}
    }
    $portfolio->work[$real_id]->name = $_POST['name'];
    $portfolio->work[$real_id]->client = $_POST['client'];
    $portfolio->work[$real_id]->yearofcreation = $_POST['yearofcreation'];
    $portfolio->work[$real_id]->link = $_POST['link'];
    file_put_contents('data.xml', $portfolio->asXML());
    $addres = 'location: index.php?id=' . strval($id);
    header($addres);
}
?>
