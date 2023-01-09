<?php
    $portfolio = simplexml_load_file('data.xml');
?>
<table border="2">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Client</th>
        <th>Year of creation</th>
        <th>Link</th>
    </tr>
    <?php
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            foreach($portfolio->work as $work){
                if ($id == $work->id){
                    ?>
                    <tr>
                        <td><?php echo $work->id; ?></td>
                        <td><?php echo $work->name; ?></td>
                        <td><?php echo $work->client; ?></td>
                        <td><?php echo $work->yearofcreation; ?></td>
                        <td><?php echo $work->link; ?></td>
                    </tr>
                    </table>
                    <br>
                    <a href="list.php">List</a>
                    <br>
                    <a href="update.php?id=<?php echo $work->id; ?>">Update</a>
                    <br>
                    <a href="delete.php?id=<?php echo $work->id; ?>">Delete</a>
                <?php break;}
            }
        } ?>