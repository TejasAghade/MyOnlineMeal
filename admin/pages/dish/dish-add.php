<?php

    include '../../../partials/_dbconnect.php';
    






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
            
            $squery = "insert into food (food_name, food_desc, category, food_price, food_img) values ('$foodName', '$foodDesc', '$foodCategory', ' $foodPrice', '$filename' ) ";
            



            $result = mysqli_query($conn, $squery);
            $res_cat_tbl = mysqli_query($conn, "select * from food_category");

            if(mysqli_num_rows($res_cat_tbl) == 0){
                $result2 = mysqli_query($conn, "insert into food_category (category) values ('$foodCategory')");

            }

            echo "sucess";
           
            
        }






  
        



?>
