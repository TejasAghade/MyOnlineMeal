<?php
    include '../../../partials/_dbconnect.php';
    



?>



<!-- row manage dish -->

<!-- <div class="row"> -->

<?php
	$concat1 = '';
	$concat2 ='';
	$concat0 = ' 
			<div id="manage-dish-data">
				<div class="card card-main p-top" style="min-height:485px">
					
					<div class="card-content table-responsive">

						<table class="table table-hover table-light">

							<thead class="">

								<tr class="table-dark">

									<th>No</th>								
									<th>Order ID</th>
									<th>Food Name</th>
									<th>Food Img</th>
									<th>Quantity</th>									
									<th>Price (single dish)</th>
									<th>Total Bill</th>

								</tr>
							</thead>
						<tbody>';
						

				
                
                
					$sql2 = "select * from sale";

					$result = mysqli_query($conn, $sql2);

					$num = mysqli_num_rows($result);
					$id;
					$count = 0;
						while($row = mysqli_fetch_assoc($result)){

								$id = $row['food_id'];
								

							$count+=1;
							$concat0 = $concat0.$concat1;	
							$concat1 =' <tr id="tr_'.$id.'"">
											<td id="count" >'. $count .'</td>
											<td id="foodName" >'.$row['order_id'].'</td>
											
											<td id="foodCate" >'.$row['food_name'].'</td>
											<td id="foodImg"  class="food-img" ><img src="http://localhost/foodOrderingSystem/foodimg/'.$row['food_img'].'" class="img-size-sml">
											</td>
											<td id="foodtype" >'.$row['qty'].'</td>
											<td id="foodDesc" >'.$row['price'].'</td>   
											<td id="foodPrice" >₹'.$row['total_bill'].'</td>                         
									
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