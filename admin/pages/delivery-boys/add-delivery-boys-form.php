<?php








$html = '

<div id="add-delivery-boy">
    <div class="card card-main p-top" style="min-height:485px">
        <div class="card-header mx-3 card-header-text">
            <!--<h4 class="card-title">Add Delivery Boys</h4>-->
        </div>
      

    <form  class="m-top-15"  method="post" id="delivery-boy-form">

            <div class="mb-3">

                <label for="boy-Name" class="form-label">Delivery boy Name</label>

                <span id="name-error" class="error-field"></span>

                <input type="text" name="boy-name" class="form-control boy-Name" id="boy-Name" aria-describedby="emailHelp"  required>

            </div>

           

            <div class="mb-3 ">

                <label for="boy-phone" class="form-label">Delivery boy phone number</label>
                <span id="phone-error" class="error-field"></span>
                <input type="text" name="boy-phone" class="form-control boy-phone" id="boy-phone" required>


            </div>

           <div class="mb-3 ">

                <label for="boy-email" class="form-label">Delivery boy e-mail</label>
                <span id="email-error" class="error-field"></span>
                <input type="email" name="boy-email" class="form-control boy-email" id="boy-email" required>


            </div>



            <div class="mb-3 ">

                
                <input type="button" id="submit" name="submit" class="btn btn-primary btn-lg" onclick="submit_boy_data()" value="Add Delivery Boy">
            </div>

    </form>


    </div>
</div>';

echo $html;






?>