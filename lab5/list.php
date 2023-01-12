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
    <?php
        $connection = new mysqli("localhost", "root", "", "web5data");
        $query = "SELECT * FROM portfolio";
        $portfolio = mysqli_query($connection, $query);
        foreach($portfolio as $work) { ?>
        <tr>
            <td><?php echo $work['ID']; ?></td>
            <td><?php echo $work['NAME']; ?></td>
            <td><?php echo $work['CLIENT']; ?></td>
            <td><?php echo $work['DATEOFCREATION']; ?></td>
            <td><?php echo $work['LINK']; ?></td>
            <td><a href="index.php?id=<?php echo $work['ID']; ?>">Get</a></td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="create.php">Create</a><br>

