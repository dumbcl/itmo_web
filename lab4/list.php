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
        <th>GET to index</th>
    </tr>
    <?php foreach($portfolio->work as $work) { ?>
        <tr>
            <td><?php echo $work->id; ?></td>
            <td><?php echo $work->name; ?></td>
            <td><?php echo $work->client; ?></td>
            <td><?php echo $work->yearofcreation; ?></td>
            <td><?php echo $work->link; ?></td>
            <td><a href="index.php?id=<?php echo $work->id; ?>">Get</a></td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="create.php">Create</a><br>

