<?php

    include '../../../partials/_dbconnect.php';
    


        $categoryid =filter_input(
            INPUT_POST,
            'category',
            FILTER_SANITIZE_STRING,
            FILTER_REQUIRE_ARRAY
        );
        
        // $category = $_POST['category'];

        $files = $_FILES['cat-img'];
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

            $destinationfile = "../../../foodimg/category/".$filename;
            move_uploaded_file($filetmp, $destinationfile);
            
            $squery = "UPDATE `food_category` SET `cat_img`='$filename' WHERE `id`='$categoryid[0]'";
            
            $result = mysqli_query($conn, $squery);
            

            
           
            
        }






  
        



?>
