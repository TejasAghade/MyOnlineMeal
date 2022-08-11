<?php
        include '../../../partials/_dbconnect.php';


        $id=$_POST['id'];
        $query = "delete from food where food_id='$id'";

        $result = mysqli_query($conn, $query);

        echo "Dish Deleted.";
            
    

?>