<?php
    include '../../../partials/_dbconnect.php';
    
	




?>



<!-- row manage user -->

<!-- <div class="row"> -->

<?php
	$concat1 = '';
	$concat2 ='';
	$concat0 = ' 
			<div id="manage-user-data">

				<div class="card card-main p-top" style="min-height:485px">

					<div class="card-header mx-2 card-header-text">

						<h4 class="card-title text-danger">Manage Users</h4>

					</div>
					<div class="card-content table-responsive">

						<table class="table table-hover table-light">

							<thead class="">

								<tr class="table-dark">

									<th>No</th>
									<th>User Name</th>
									
									<th>User Email</th>
									<th>User Address</th>
									<th>Date of Join</th>
									
									
									<th>Actions</th>

								</tr>
							</thead>
						<tbody>';
						

				
                
                
					$sql2 = "select * from users";

					$result = mysqli_query($conn, $sql2);

					$num = mysqli_num_rows($result);
					$id;
					$count = 0;
						while($row = mysqli_fetch_assoc($result)){

								$id = $row['user_id'];

							$count+=1;
							$concat0 = $concat0.$concat1;	
							$concat1 =' <tr id="tr_'.$id.'"">
									<td id="count" >'. $count .'</td>
									<td id="name" >'.$row['name'].'</td>									
									<td id="email" >'.$row['email'].'</td>
									<td id="address" >'.$row['address'].'</td>
									<td id="doj" >'.$row['doj'].'</td>
									
									
									<td>
									
									<button id="modify-boy" class="btn btn-danger my-2 mdf-boy" data-toggle="modal" data-target="#editmodal"  onclick="delete_user('.$id.')" >Remove</button>
										
										
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