<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Food Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">


                <form  class="m-top-15" method="post" id="food-form" enctype="multipart/form-data">

                    <div class="mb-3">

                        <label for="foodName" class="form-label">Food Name</label>

                        <span id="name-error" class="error-field"></span>

                        <input type="text" name="food-name" class="form-control foodName2" id="foodName2" >
                        <input type="hidden" name="id" class="form-control" id="hidden_id" aria-describedby="hidden">

                    </div>

                    <div class="mb-3">
                        <label for="foodPrice" class="form-label">Food Price</label>
                        <span id="price-error" class="error-field"></span>
                        <input type="text" name="food-price" class="form-control foodPrice2" id="foodPrice2">

                    </div>

                    <div class="mb-3 ">

                        <label for="foodCategory" class="form-label">Food Category</label>
                        <span id="category-error" class="error-field"></span>
                        <input type="text" name="food-category" class="form-control foodCategory2" id="foodCategory2">


                    </div>

                    <div class="mb-3 ">

                        <label for="foodDescription" class="form-label">Food Description</label>
                        <span id="desc-error" class="error-field"></span>
                        <input type="text" name="food-desc" class="form-control foodDesc2" id="foodDesc2">


                    </div>

                    <div class="mb-3 ">

                        <label for="foodimg" class="form-label">Food Image</label>
                        <span id="file-error" class="error-field"></span>
                        <input type="file" name="file" class="form-control foodimg2" id="foodimg2">


                    </div>

                    <div class="mb-3 ">


                        
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <!-- <input type="button" id="submit" name="submit" class="btn btn-primary" onclick="update_food_data()" value="Add Dish"> -->
                <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="update_food_data()">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>