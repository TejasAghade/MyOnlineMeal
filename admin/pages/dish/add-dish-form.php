<?php
   include '../../../partials/_dbconnect.php';
$csql = "select * from food_category";
$result = mysqli_query($conn, $csql);
?>



<div id="add-dish-data">
    <div class="card card-main p-top" style="min-height:485px">
        <div class="card-header mx-3 card-header-text">
            <h4 class="card-title">Add Dish</h4>
        </div>
      

    <form  class="m-top-15" method="post" id="food-form" enctype="multipart/form-data">

            <div class="mb-3">

                <label for="foodName" class="form-label">Food Name</label>

                <span id="name-error" class="error-field"></span>

                <input type="text" name="food-name" class="form-control " id="foodName" aria-describedby="emailHelp" >

            </div>

            <div class="mb-3">
                <label for="foodPrice" class="form-label">Food Price</label>
                <span id="price-error" class="error-field"></span>
                <input type="text" name="food-price" class="form-control" id="foodPrice" >

            </div>

            <div class="mb-3 ">

                <label for="foodCategory" class="form-label">Food Category</label>
                <span id="category-error" class="error-field"></span>
                <input type="text" name="food-category" class="form-control" id="foodCategory">


            </div>

            <div class="mb-3 ">

                <label for="foodDescription" class="form-label">Food Description</label>
                <span id="desc-error" class="error-field"></span>
                <input type="text" name="food-desc" class="form-control" id="foodDesc">


            </div>

            <div class="mb-3 ">

                <label for="foodimg" class="form-label">Food Image</label>
                <span id="file-error" class="error-field"></span>
                <input type="file" name="file" class="form-control" id="foodimg" >


            </div>

            <div class="mb-3 ">

                <input type="button" id="submit" name="submit" class="btn btn-primary " onclick="submit_food_data()" value="Add Dish">
                
                <button type="button" id="set-category" class="btn btn-danger my-2 mdf-food" data-toggle="modal" data-target="#editmodal" >Set Categroy</button>

            </div>

        </form>
        <div>
        
           
                    


        </div>

    </div>

    <div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Set Category</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">


                <form  class="m-top-15" method="post" id="cat-form" enctype="multipart/form-data">

                    

                    <div class="mb-3 ">

                        <label for="cat-select" class="form-label">Select Category</label>
                        <span id="desc-error" class="error-field"></span>

                        <select  class="form-select" id="cat-select" aria-label="Default select example" name="category[]">

                            <option selected>Select Category</option>';
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                                }
                            ?>

                       </select>


                    </div>

                    <div class="mb-3 ">

                        <label for="cat-img" class="form-label">Category Image</label>
                        <span id="file-error" class="error-field"></span>
                        <input type="file" name="cat-img" class="form-control cat-img" id="cat-img">


                    </div>

                    <div class="mb-3 ">


                        
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              
                <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="set_category()">Set Category</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


</div>