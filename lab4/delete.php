<?php
    $portfolio = simplexml_load_file('data.xml');
    $id = intval($_GET['id']);
    foreach($portfolio->work as $work){
        if ($id == $work->id){
            ?>
            <form method="POST">
                <button><input type="submit" value="Delete" name="delete"></button>
            </form>
            <br>
            <a href="index.php?id=<?php echo $id; ?>">Back</a>
            <?php break;}
    }

if(isset($_POST['delete'])) {
    $number_of_works = $portfolio->count();
    $real_id = 0;
    for ($i = 0; $i < $number_of_works; $i++) {
        if ($portfolio->work[$i]->id == $id) {$real_id = $i; break;}
    }
    unset($portfolio->work[$real_id]);
    file_put_contents('data.xml', $portfolio->asXML());
    $addres = 'location: list.php';
    header($addres);
}
?>
