

<?php include 'admin_partials/_header.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice MyOnlineMeal</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/dropdown.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="../css/admin.css? <?=filemtime("../css/admin.css")?>" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <?php include 'admin_partials/_nav.php' ?>
    

<section class="invoice" id="invoice">

<div class="invoice-box">
			<table>
				<tr class="top">
					
                        <td class="title">
                            <h2>MyOnlineMeal<span>.</span></h2>                                        
                        </td>
					
				</tr>

							
				<tr class="heading">
					<td>Order Details</td>
					<td></td>
				</tr>
                <?php   
     
     
        include '../partials/_dbconnect.php';
        
            $id = $_GET['id'];
            $sql ="SELECT * from orders WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
    
            $row = mysqli_fetch_assoc($result);
        
    
    
        ?>
 
				<tr class="inf-row">
					<td class="left-h txt-bold">User Name</td>

					<td><?php echo $row['user_name']; ?></td>
				</tr>

				<tr class="inf-row">
					<td class="left-h txt-bold">Food Name</td>

					<td><?php echo $row['food_name']; ?></td>
				</tr>
                        
                <tr class="inf-row  ">
					<td class="left-h txt-bold">Address</td>

					<td><?php echo $row['user_address']; ?></td>
				</tr>

                <tr class="inf-row  ">
					<td class="left-h txt-bold">City</td>

					<td><?php echo $row['city']; ?></td>
				</tr>

                <tr class="inf-row  ">
					<td class="left-h txt-bold">PIN Code</td>

					<td><?php echo $row['pin_code']; ?></td>
				</tr>
                
                <tr class="inf-row  ">
					<td class="left-h txt-bold">User Phone</td>

					<td><?php echo $row['user_phone']; ?></td>
				</tr>
                
                <tr class="inf-row  ">
					<td class="left-h txt-bold">Order Time</td>

					<td><?php echo $row['order_time']; ?></td>
				</tr>

                <tr class="inf-row">
					<td class="left-h txt-bold">Payment Type</td>
					<td><?php echo $row['payment_type']; ?></td>
				</tr>
                <tr class="inf-row">
					<td class="left-h txt-bold">Payment Status</td>
					<td><?php echo $row['payment_status']; ?></td>
				</tr>
                
                <tr class="last">
					<td></td>                    
					<td></td>
				</tr>                

				
			</table>
            <br>
            
            <table>
			

							
				<tr class="heading heading2">
					<td>Food Image</td>
					<td>Food Name</td>
					<td>Quantity</td>
					<td>Total Cost</td>
				</tr>

				<tr class="inf-row row-imgbx">
					<td class="left-h txt-bold"> <img src="../foodimg/<?php echo $row['food_img']; ?>" alt=""></td>
                    <td><?php echo $row['food_name']; ?></td>
                    <td class="tx-cent"><?php echo $row['qty']; ?></td>
                    <td class="tx-cent">₹ <?php echo $row['total_bill']; ?></td>
				</tr>
                
                <tr class="inf-row">
					<td class="left-h"></td>
                    <td></td>
                    <td class="tx-cent">Delivery Charges</td>
                    <td class="tx-cent">₹ 20</td>
				</tr>
                
                <tr class="inf-row">
					<td class="left-h"></td>
                    <td></td>
                    <td class="tx-cent">Total Cost</td>
                    <td class="tx-cent">₹ <?php echo $row['total_bill']; ?></td>
				</tr>

               
				
			</table>
		</div>
</section>



    <?php include '../partials/_footer.php'?>

<!-- <script src="../js/admin.js"></script> -->
<script src="../js/main.js"></script>
</body>
</html>