<?php



include '../partials/_dbconnect.php';

$response = array();

$query = "select * from orders where order_status ='new'";

$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);





$query2 = "select * from users";

$result2 = mysqli_query($conn, $query2);

$num2 = mysqli_num_rows($result2);



$query3 = "select * from orders where order_status ='delivered'";

$result3 = mysqli_query($conn, $query3);

$num3 = mysqli_num_rows($result3);


$allOrderQuery = "select * from orders";
$allorderResult = mysqli_query($conn, $allOrderQuery);
$allOrders = mysqli_num_rows($allorderResult);



$pendingrQuery = "select * from orders where order_status ='pending'";
$pendingrResult = mysqli_query($conn, $pendingrQuery);
$pending = mysqli_num_rows($pendingrResult);

$cookingQuery = "select * from orders where order_status ='cooking'";
$cookingResult = mysqli_query($conn, $cookingQuery);
$cooking = mysqli_num_rows($cookingResult);

$onthewayQuery = "select * from orders where order_status ='on the way'";
$onthewayResult = mysqli_query($conn, $onthewayQuery);
$ontheway = mysqli_num_rows($onthewayResult);

$cancelledQuery = "select * from orders where order_status ='cancelled'";
$cancelledResult = mysqli_query($conn, $cancelledQuery);
$cancelled = mysqli_num_rows($cancelledResult);

$revenue = "SELECT SUM(total_bill) FROM orders where order_status = 'delivered';";
$revenueResult = mysqli_query($conn, $revenue);
$revc = mysqli_fetch_array($revenueResult);








$html = '

<div id="main-content" class="main-content">
	<div class="row head-stat-row">

		<div class="total-card-wrapper ms-2">
			<div class="total-card  card-stats">
				<div class="card-header">
					<div class="icon ">
						<img src="img/slider/checklist.png" alt="" class="size-44">
					</div>
				</div>
				<div class="card-content" style="padding: 15px 20px;">
					<p class="category"><strong>New Orders</strong></p>
					<h3 class="card-title order-count">+'.$num.'</h3>
				</div>
			</div>
		</div>

		<div class="total-card-wrapper">
			<div class="total-card  card-stats">
				<div class="card-header">
					<div class="icon ">
						<img src="img/slider/delivery.png" alt="" class="size-44">
					</div>
				</div>
				<div class="card-content" style="padding: 15px 20px;">
					<p class="category"><strong>Delivered Orders</strong></p>
					<h3 class="card-title delivered-order-count">'.$num3.'</h3>
				</div>
			</div>
		</div>



		<div class="total-card-wrapper">
			<div class="total-card  card-stats">
				<div class="card-header">
				<div class="icon ">
					<img src="img/slider/money.png" alt="" class="size-44" style="margin-left: 8px;">
				</div>
				</div>
				<div class="card-content" style="padding: 15px 20px;">
					<p class="category"><strong>Revenue</strong></p>
					<h3 class="card-title">₹ '.$revc['SUM(total_bill)'].'</h3>
				</div>
			</div>
		</div>

		<div class="total-card-wrapper">
			<div class="total-card  card-stats">
				<div class="card-header">
					<div class="icon ">
						<img src="img/slider/customer.png" alt="" class="size-44">
					</div>
				</div>
				<div class="card-content" style="padding: 15px 20px;">
					<p class="category"><strong>Users</strong></p>
					<h3 class="card-title user-count">'.$num3.'</h3>
				</div>
			</div>
		</div>




	</div>

	
	
	

	<!---row-second----->

<div id="show-manage-dish " class="row flex-row-two">

		<div class="col-lg-7 col-md-12 req-card">
			<div class="card card-main card-box-shadow rounded-corner" style="min-height:445px">

				<div class="card-header card-header-text ps-3 pt-3"  style="border-bottom:1px solid #41414144!important;">

					<h4 class="card-title text-dark">Recently Requested Orders</h4>

				</div>

				<div class="card-content table-responsive">
									
					<div class="recent-requested-orders mt-3">

						<table class="table rec" style="text-align:center;">
							<thead class="border-bottom border-warning">
							  <tr>
								<th scope="col" class="req-food-header">Food Item</th>
								<th scope="col" class="req-food-header">Food Name</th>
								<th scope="col" class="req-food-header">Product Id</th>
							  </tr>
							</thead>
							<tbody>';

							$recent_order_query = "select * from orders order by id desc limit 5";
							$recent_order_result = mysqli_query($conn, $recent_order_query);
							

							while($recent_order_row = mysqli_fetch_assoc($recent_order_result)){

								$html .= '<tr>
								<td> <img class="dash-food-img" src="../foodimg/'.$recent_order_row ['food_img'].'"alt=""></td>
								<td>'.$recent_order_row ['food_name'].'</td>
								<td>'.$recent_order_row ['id'].'</td>
							  </tr>';

							}

							   
							  
							  
							$html .= '</tbody>
						  </table>



					</div>


				</div>

			</div>

		</div>

		<div class="col-lg-5 col-md-12 or-card">
			<div class="card card-main card-box-shadow rounded-corner" style="min-height:446px">
				<div class="card-header card-header-text pt-3"  >
					<h4 class="card-title">Orders</h4>
				</div>

				<div class="card-content">
					
						<div class="order-card  card-box-shadow">
							<div class="items">
								<h6>All Orders</h6>
								<h6 class="count-text">'.$allOrders.'</h6>
							</div>
						</div>
						
						<div class="order-card  card-box-shadow">
							<div class="items">
								<h6>Orders Cooking</h6>
								<h6 class="count-text">'.$cooking.'</h6>
							</div>
						</div>
						
						<div class="order-card  card-box-shadow">
							<div class="items">
								<h6>Orders On The Way</h6>
								<h6 class="count-text">'.$ontheway.'</h6>
							</div>
						</div>
						
						<div class="order-card  card-box-shadow">
							<div class="items">
								<h6>Cancelled Orders</h6>
								<h6 class="count-text">'.$cancelled.'</h6>
							</div>
						</div>


					
				</div>
			</div>
		</div>';


		$food = "select * from food";
		$foodResult = mysqli_query($conn, $food);
		$alldish = mysqli_num_rows($foodResult);
	

		$cat = "select * from food_category";
		$catResult = mysqli_query($conn, $cat);
		$totalcat = mysqli_num_rows($catResult);
	


		$boys = "select * from delivery_boy";
		$boyResult = mysqli_query($conn, $boys);
		$deliveryboys = mysqli_num_rows($boyResult);
	

		$html .='<div class="col-lg-5 col-md-12 pop-card">
			
			<div class="card card-main card-box-shadow popular-dish"  style="min-height:446px">
				<div class="card-header card-header-text pt-3"  >
					<h4 class="card-title">Details</h4>
				</div>

				<div class="card-content">
					
						<div class="popular-card  card-box-shadow">
							<div class="items">
								<h6>Available Dish</h6>
								<h6 class="count-text">'.$alldish.'</h6>
							</div>
						</div>
						
						<div class="popular-card  card-box-shadow">
							<div class="items">
								<h6>Total Categories</h6>
								 <h6 class="count-text">'.$totalcat.'</h6>
							</div>
						</div>
						
						<div class="popular-card  card-box-shadow">
							<div class="items">
								<h6>Delivery Boys</h6>
								<h6 class="count-text">'.$deliveryboys.'</h6>
							</div>
						</div>
						
						<div class="popular-card  card-box-shadow">
							<div class="items">
								<h6>Most Ordered</h6>
								<h6 class="count-text"> asdf </h6>
							</div>
						</div>


					
				</div>
			</div>
	</div>
</div>';

echo $html;

?>

