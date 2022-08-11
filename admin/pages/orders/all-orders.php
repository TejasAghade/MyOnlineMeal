<?php
    include '../../../partials/_dbconnect.php';
    
	




?>



<!-- row manage order -->

<!-- <div class="row"> -->

<?php
	$concat1 = '';
	$concat2 ='';
	$concat0 = ' 
			<div id="manage-order-data">

				<div class="card card-main p-top" style="min-height:485px">

					<div class="card-header mx-2 card-header-text">

						<h4 class="card-title text-danger">Manage All Orders</h4>

					</div>
					<div class="card-content table-responsive">

						<table class="table table-hover table-light">

							<thead class="">

								<tr class="table-warning">

									<th>No</th>
									<th>Users Name</th>									
									<th>Food Name</th>
									<th>Quantity</th>
									<th>Pyment Type</th>
									<th>Total Bill</th>
									<th>Payment Status</th>
									<th>Order Status</th>
									<th>Order Time</th>
									<th>Action</th>
									

								</tr>
							</thead>
						<tbody>';
						

				
                
                
					$sql2 = "select * from orders ORDER BY id desc";

					$order_result = mysqli_query($conn, $sql2);

					$num = mysqli_num_rows($order_result);

					$id;

					$count = 0;
						while($order_row = mysqli_fetch_assoc($order_result)){

								$id = $order_row['id'];

							$count+=1;
							$concat0 = $concat0.$concat1;	
							$concat1 =' 
                            
                                    <tr id="tr_'.$id.'"">
                                        <td id="count" >'. $count .'</td>
                                        <td id="name" >'.$order_row['user_name'].'</td>
                                        
                                        <td id="phone" >'.$order_row['food_name'].'</td>
                                        <td id="email" >'.$order_row['qty'].'</td>
                                        <td id="payment-type" >'.$order_row['payment_type'].'</td>
                                        <td id="total_bill" >'.$order_row['total_bill'].'</td>
                                        <td id="payment_status" >'.$order_row['payment_status'].'</td>
                                        <td id="order_status" >'.$order_row['order_status'].'</td>
                                        <td id="payment_status" >'.$order_row['order_time'].'</td>
                                        
									
                                        <td>
                                            <button id="del-order" class="btn btn-dark my-2 del-order" data-toggle="modal" data-target="#editmodal"  onclick="show_order_data('.$id .')" >View</button>
                                        </td>
								</tr> ';
								
							
						}
                
    			
						$concat2 = '
						</tbody>
					</table>
				</div>
			</div>
			<div>
			</div>
			
			';

			$html = $concat0.$concat1.$concat2;
			echo $html;


			
?>





<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">

					<table class="table table-hover table-light">
						<thead>
							<tr class="table-warning table table-hover">
								<td>#</td>
								<td>values</td>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<th>User's Name</th>
								<td id="username"></td>
							</tr>
							<tr>
								<th>Food Name</th>
								<td id="foodname"></td>
							</tr>
							
							<tr>
								<th>Food Image</th>
								<td><img class="img-size-sml foodimg" src=""  id="foodimage" alt=""></td>
							</tr>

							<tr>
								<th>Quantity</th>
								<td id="qty"></td>
							</tr>

							<tr>
								<th>Total Bill</th>
								<td id="bill"></td>
							</tr>

							<tr>
								<th>Payment Type</th>
								<td id="paymenttype"></td>
							</tr>

							<tr>
								<th>Payment Status</th>
								<td id="paymentstatus"></td>
							</tr>

							<tr>
								<th>User's Address</th>
								<td id="useraddress"></td>
							</tr>

							<tr>
								<th>City</th>
								<td id="city"></td>
							</tr>

							<tr>
								<th>User Phone</th>
								<td id="userphone"></td>
							</tr>
							
							<tr>
								<th>Delivery Boy Name</th>

								<td id="">
									<form id="select-delivery_boy-order_status">
									<select name="delivery-boy" id="deliveryBoy">

										<option id="delivery_selected" value="" selected="selected">select</option>

										<?php

											$sql2 = "SELECT * FROM delivery_boy";

											$result = mysqli_query($conn, $sql2);
											
											
											$num = mysqli_num_rows($result);
							
											$count = 0;
											while($row = mysqli_fetch_assoc($result)){

												echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';

											}
										?>

									</select>
								</td>

							</tr>

							
							
							
							
							<tr>
								<th>Order Status</th>
									<td id="">
										<select name="order-status" id="orderstatus">
											<option value="" id="order_status_selected" selected="selected">new</option>
											<option value="pending">pending</option>
											<option value="cooking">cooking</option>
											<option value="on-the-way">on the way</option>
											<option value="Delivered">delivered</option>
											<option value="cancel">cancelled</option>
										</select>

										<input type="hidden" id="food-id" name="food_id" value="<?php echo $foodId; ?>">
										<input type="hidden" id="qty" name="qty" value="<?php echo $qty; ?>">
										<input type="hidden" id="total-bill" name="total" value="<?php echo $totalBill; ?>">
									</td>
							</tr>
							<tr>
								<th>Order Time</th>
								<td id="ordertime"></td>
							</tr>

						</tbody>


					</table>
                

                        
            </div>
            <div class="modal-footer">
				
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-primary " onclick="change_payment_delivery_status('all-orders')">Save</button>
			</form>
            </div>
        </div>
    </div>
</div>