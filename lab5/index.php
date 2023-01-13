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
            $connection = new mysqli("localhost", "root", "", "web5data");
            $query = "SELECT * FROM portfolio";
            $portfolio = mysqli_query($connection, $query);
            foreach($portfolio as $work){
                if ($id == $work['ID']){
                    ?>
                    <tr>
                        <td><?php echo $work['ID']; ?></td>
                        <td><?php echo $work['NAME']; ?></td>
                        <td><?php echo $work['CLIENT']; ?></td>
                        <td><?php echo $work['DATEOFCREATION']; ?></td>
                        <td><?php echo $work['LINK']; ?></td>
                    </tr>
                    </table>
                    <br>
                    <a href="list.php">List</a>
                    <br>
                    <a href="update.php?id=<?php echo $work['ID']; ?>">Update</a>
                    <br>
                    <a href="delete.php?id=<?php echo $work['ID']; ?>">Delete</a>
                <?php break;}
            }
        } ?>
