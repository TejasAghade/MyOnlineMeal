<?php
    include '../../../partials/_dbconnect.php';
    
	


    if (isset($_POST['submit'])){

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
            
        }




    }




?>



<!-- row manage dish -->

<!-- <div class="row"> -->

<?php
	$concat1 = '';
	$concat2 ='';
	$concat0 = ' 
			<div id="manage-dish-data">
				<div class="card card-main p-top" style="min-height:485px">
					<div class="card-header mx-2 card-header-text">
						<h4 class="card-title">Manage Dish</h4>
					</div>
					<div class="card-content table-responsive">

						<table class="table table-hover table-light">

							<thead class="">

								<tr class="table-dark">
									<th>No</th>
									<th>Food Name</th>
									
									<th>Category</th>
									<th>Food Type</th>
									<th>Descripton</th>
									<th>Food-Price</th>
									<th>Image</th>
									
									<th>Actions</th>

								</tr>
							</thead>
						<tbody>';
						

				
                
                
					$sql2 = "select * from food";

					$result = mysqli_query($conn, $sql2);

					$num = mysqli_num_rows($result);
					$id;
					$count = 0;
						while($row = mysqli_fetch_assoc($result)){

								$id = $row['food_id'];
								$fName = $row['food_name'];
								$fPrice = $row['food_price'];
								$fCategory = $row['category'];
								$fDesc = $row['food_desc'];

							$count+=1;
							$concat0 = $concat0.$concat1;	
							$concat1 =' <tr id="tr_'.$id.'"">
									<td id="count" >'. $count .'</td>
									<td id="foodName" >'.$row['food_name'].'</td>
									
									<td id="foodCate" >'.$row['category'].'</td>
									<td id="foodtype" >'.$row['food_type'].'</td>
									<td id="foodDesc" >'.$row['food_desc'].'</td>   
									<td id="foodPrice" >₹'.$row['food_price'].'</td>                         
									<td id="foodImg"  class="food-img" ><img src="http://localhost/foodOrderingSystem/foodimg/'.$row['food_img'].'" class="img-size-sml">
									</td>
									
									<td>
									<button id="del-food" class="btn btn-danger my-2 del-food" onclick="delete_food_data('.$id.')" >Delete</button>

									<button id="modify-food" class="btn btn-primary my-2 mdf-food" data-toggle="modal" data-target="#editmodal"  onclick="get_food_data('.$id.')" >Edit</button>
										
										
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


			include('update-dish-form.php');
			
?>