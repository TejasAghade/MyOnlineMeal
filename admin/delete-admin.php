<?php
        include '../partials/_dbconnect.php';



        if($id = $_GET['delid']){


            // if($confirm){
                $query = "delete from admin where admin_id='$id'";
                $result = mysqli_query($conn, $query);

                if($result){
                    mysqli_close($conn);
                    header('location: manage-admin.php');
                    
                }else{
                    echo "unable to delete ". mysqli_error($conn);
                
                }

                mysqli_close($conn);
            }
    
    // }

?>