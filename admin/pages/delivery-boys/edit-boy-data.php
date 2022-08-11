
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update boy Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">


                <form  class="m-top-15" method="post" id="boy-form">

                    <div class="mb-3">

                        <label for="boyname" class="form-label">Boy Name</label>

                        <span id="name-error" class="error-field"></span>

                        <input type="text" name="boy-name" class="form-control boyname" id="boyname" >
                        
                        <input type="hidden" name="id" class="form-control" id="hidden_id" aria-describedby="hidden">

                    </div>

                    <div class="mb-3">
                        <label for="boyphone" class="form-label">Boy Phone</label>
                        <span id="phone-error" class="error-field"></span>
                        <input type="text" name="boy-phone" class="form-control boyphone" id="boyphone">

                    </div>

                    <div class="mb-3 ">

                        <label for="boyemail" class="form-label">Boy Email</label>
                        <span id="email-error" class="error-field"></span>
                        <input type="text" name="boy-email" class="form-control boyemail" id="boyemail">


                    </div>

                  

                    <div class="mb-3 ">


                        
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

           
                <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="update_boy_data()">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>