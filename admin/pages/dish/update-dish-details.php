<?php

include '../../../partials/_dbconnect.php';

        $id = $_POST['id'];
        $foodName = $_POST['food-name'];
        $foodPrice = $_POST['food-price'];
        $foodCategory = $_POST['food-category'];
        $foodDesc = $_POST['food-desc'];


        $files = $_FILES['file'];
        $filename = $files['name'];
        $fileerror = $files['error'];
        $filetmp = $files['tmp_name'];

        // dividing file into two part 1 is name of file and 2nd is extension of file
        $fileext = explode('.', $filename);
        
        // checking file
        $filecheck = strtolower(end($fileext)); 
        
        // creating array for checking file extension
        $fileextstored = array('png', 'jpg', 'jpeg');
        if(in_array($filecheck, $fileextstored)){

            $destinationfile = "../../../foodimg/".$filename;
            move_uploaded_file($filetmp, $destinationfile);

            if($filename != ""){            
            
                $squery = "UPDATE food SET
                food_name ='$foodName', 
                food_desc='$foodDesc',
                category ='$foodCategory',
                food_price='$foodPrice',
                food_img ='$filename' WHERE food_id='$id'";

                $result = mysqli_query($conn, $squery);
                
            }
            
            echo "success";

        
        }






?>

