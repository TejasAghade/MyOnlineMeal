<?php
    include '../../../partials/_dbconnect.php';




    $id =$_POST['id'];

    $order_status = $_POST['order_status'];
    $delivery_boy = $_POST['delivery_boy'];



    $sql = "update orders set `order_status`='$order_status', `delivery_boy_name`='$delivery_boy' where `id`=$id";

    $result = mysqli_query($conn, $sql);
    



    if($order_status == 'delivered'){

         // getting qty and total bill from orders table
         $orderdatasql = "select * from orders where id = $id";
         $orderdataresult = mysqli_query($conn, $orderdatasql);
 
         $orderRow = mysqli_fetch_assoc($orderdataresult);

         $foodid = $orderRow['food_id'];
         $foodName = $orderRow['food_name'];
         $foodimg = $orderRow['food_img'];
         $qty = $orderRow['qty'];
         $totalbill = $orderRow['total_bill'];


        // query to update payment status on delivered order
        $sql0 = "update orders set `payment_status`='Received' where `id`=$id";
        $result0 = mysqli_query($conn, $sql0);


        // getting image, food price, food name from food table 
        $sql1 = "select * from food where food_id = $foodid";
        $result2 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($result2);
        $foodprice = $row['food_price'];


       
        $sql2 = "INSERT INTO `sale`(`order_id`, `food_id`, `food_name`, `food_img`, `qty`, `price`, `total_bill`) VALUES ($id, $foodid, '$foodName', '$foodimg', $qty, $foodprice, $totalbill)";

        $result3 = mysqli_query($conn, $sql2);




        



    }





?>