<?php

if(isset($_SESSION['u_id'])) {
    
    // Create database connection
    $db = mysqli_connect("localhost", "root", "", "loginsystem");

    // Initialize message variable
    $msg = "";
    $id = "";

    $sql = "SELECT * FROM properties";
    $result = mysqli_query($db, $sql);

    ?> 
    
    </br>
    
    <?php

    while($row = mysqli_fetch_array($result)) {
        echo "<div>";
        echo $row['property_type']." ";        
        echo $row['title'];
        echo "<a href='includes/delete.inc.php?id=".$row['id']."'> Delete</a>";
        echo "</div>";        
    }
    
}
?>

