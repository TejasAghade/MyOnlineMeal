<?php
    include '../../../partials/_dbconnect.php';
    
	




?>



<!-- row manage delivery-boy -->

<!-- <div class="row"> -->

<?php
	$concat1 = '';
	$concat2 ='';
	$concat0 = ' 
			<div id="manage-delivery-boy-data">

				<div class="card card-main p-top" style="min-height:485px">

					<div class="card-header mx-2 card-header-text">

						<h4 class="card-title">Manage delivery boys</h4>

					</div>
					<div class="card-content table-responsive">

						<table class="table table-hover table-light">

							<thead class="">

								<tr class="table-dark">

									<th>No</th>
									<th>Boy Name</th>
									
									<th>Boy Phone</th>
									<th>Boy Email</th>
									<th>Date of Join</th>
									
									
									<th>Actions</th>

								</tr>
							</thead>
						<tbody>';
						

				
                
                
					$sql2 = "select * from delivery_boy";

					$result = mysqli_query($conn, $sql2);

					$num = mysqli_num_rows($result);
					$id;
					$count = 0;
						while($row = mysqli_fetch_assoc($result)){

								$id = $row['id'];

							$count+=1;
							$concat0 = $concat0.$concat1;	
							$concat1 =' <tr id="tr_'.$id.'"">
									<td id="count" >'. $count .'</td>
									<td id="name" >'.$row['name'].'</td>
									
									<td id="phone" >'.$row['phone'].'</td>
									<td id="email" >'.$row['email'].'</td>
									<td id="doj" >'.$row['doj'].'</td>
									
									
									<td>
									<button id="del-boy" class="btn btn-danger my-2 del-boy" onclick="delete_boy_data('.$id.')" >Delete</button>

									<button id="modify-boy" class="btn btn-primary my-2 mdf-boy" data-toggle="modal" data-target="#editmodal"  onclick="get_boy_data('.$id.')" >Edit</button>
										
										
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


			include('edit-boy-data.php');
			
?>