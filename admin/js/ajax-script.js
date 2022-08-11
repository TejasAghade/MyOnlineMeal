$(document).ready(function(){




        $("#load-manage-dish").click(function(){

            $('.navbar-brand-title').html("Manage Dish")

            $.ajax({
                
                url : 'pages/dish/manage-dish.php',
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });
    



 





        $("#load-dashboard").click(function(){
            $('.navbar-brand-title').text("Dashboard")

            $.ajax({
                
                url : 'dashboard.php',
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });


           


        });





        $("#add-dish-form").click(function(){
            $('.navbar-brand-title').text("Add Dish")

            $.ajax({
                
                url : 'pages/dish/add-dish-form.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });
 



        $("#add-delivery-boy").click(function(){
            $('.navbar-brand-title').text("Add Delivery Boy")


            $.ajax({
                
                url : 'pages/delivery-boys/add-delivery-boys-form.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


         $("#manage-delivery-boys").click(function(){
            $('.navbar-brand-title').text("Manage Delivery Boy")


            $.ajax({
                
                url : 'pages/delivery-boys/manage-delivery-boys.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


// ############ orders


        $('#all-orders').click(function(){
            $('.navbar-brand-title').text("All Orders")


            $.ajax({
                
                url : 'pages/orders/all-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });
        
        $("#new-orders").click(function(){
            $('.navbar-brand-title').text("New Orders")
            

            $.ajax({
                
                url : 'pages/orders/new-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });

         $("#pending-orders").click(function(){
            $('.navbar-brand-title').text("Pending Orders")

            $.ajax({
                
                url : 'pages/orders/pending-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


        $("#cooking-orders").click(function(){
            $('.navbar-brand-title').text("Cooking Orders")

            $.ajax({
                
                url : 'pages/orders/cooking-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


        $("#on-the-way-orders").click(function(){
            $('.navbar-brand-title').text("OnTheWay Orders")

            $.ajax({
                
                url : 'pages/orders/on-the-way-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


        $("#delivered-orders").click(function(){

            $('.navbar-brand-title').text("Delivered Orders")

            $.ajax({
                
                url : 'pages/orders/delivered-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });

        $("#cancelled-orders").click(function(){
            $('.navbar-brand-title').text("Cancelled Orders")


            $.ajax({
                
                url : 'pages/orders/cancelled-orders.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


        // ################### users


        $("#load-users").click(function(){
            $('.navbar-brand-title').text("Users")


            $.ajax({
                
                url : 'pages/users/manage-users.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });


       
        
        $('#load-sale').click(function(){

            $('.navbar-brand-title').text("Sale & Revenue")


            $.ajax({
                
                url : 'pages/saleandrevenue/sale.php',
                type : "get",
                success :  function(result){
                    $("#mid-content").html(result);
                }

            });

        });






});







// deleting dish
function delete_food_data(id){

    jQuery.ajax({
        url : 'pages/dish/delete-dish.php',
        type : 'post',
        data : 'id='+id,
        success : function(result){
            alert(result)
        }
    })

    jQuery("#tr_"+id).hide();

}


// submit food data

function submit_food_data(){

    var fname = jQuery("#foodName").val();
    var fprice = jQuery("#foodPrice").val();
    var fcategory= jQuery("#foodCategory").val();
    var fdesc = jQuery("#foodDesc").val();
    var files = document.getElementById('foodimg').files;


    var form = $("#food-form")[0];
    var formdata = new FormData(form)


    jQuery('.error-field').html('');
    
    let isError = false;

    if(fname == ''){
        jQuery("#name-error").html("* Please Enter Food Name")
        isError = true;
    }
    
    if(fprice == ''){
        jQuery("#price-error").html("* Please Enter Food Price")
        isError = true;
    }
    
    if(fcategory == ''){
        jQuery("#category-error").html("* Please Enter Food Category")
        isError = true;
    }
    
    if(fdesc == ''){
        jQuery("#desc-error").html("* Please Enter Food Description")
        isError = true;
    }
    
    if(files == ''){
        jQuery("#file-error").html("* Please Select Image for food")
        isError = true;
    }
        
     

    


    if(!isError){


        jQuery.ajax({
            url: "pages/dish/dish-add.php",
            type : "POST",
            data : formdata,
            contentType : false,
            processData : false,
            success : function(result){
                alert('Dish Added');

                $("#foodName").val("");
                $("#foodPrice").val("");
                $("#foodCategory").val("");
                $("#foodDesc").val("");
                $("#foodimg").val("")

            }
        })




    }




}







// load manage dish component
function load_manage_dish(){

    $.ajax({
        
        url : 'pages/dish/manage-dish.php',
        type : "post",
        success :  function(result){
            $(".mid-content").html(result);
        }

    });

}


function load_delivery_boy(){

    $.ajax({
                
        url : 'pages/delivery-boys/manage-delivery-boys.php',
        type : "get",
        success :  function(result){
            $("#mid-content").html(result);
        }

    });

}


// get food data on modal
function get_food_data(id){

    $("#hidden_id").val(id);
    

    $.post("pages/dish/get-food-details.php", {id:id}, function(data, status){
        
        var user = JSON.parse(data);

        $('.foodName2').val(user.food_name);
        $('.foodPrice2').val(user.food_price);
        $('.foodCategory2').val(user.category);
        $('.foodDesc2').val(user.food_desc);

    });


   
}

function load_add_dish(){
    $.ajax({
                
        url : 'pages/dish/add-dish-form.php',
        type : "get",
        success :  function(result){
            $("#mid-content").html(result);
        }
    
    });
}


function set_category(){

    var form = $("#cat-form")[0];
    var formdata = new FormData(form)

    $.ajax({
        url : 'pages/dish/add-category.php',
        type : "POST",
        data : formdata,
        contentType : false,
        processData : false,
        success : function(result){
            $('.modal-backdrop').hide();
                load_add_dish();
                alert("Category updated")
        }
    })

}



// update dish details
function update_food_data(){

    var id = jQuery(".id2").val();
    var fname = jQuery(".foodName2").val();
    var fprice = jQuery(".foodPrice2").val();
    var fcategory= jQuery(".foodCategory2").val();
    var fdesc = jQuery(".foodDesc2").val();
        var form = $("#food-form")[0];
        var formdata = new FormData(form)


     $.ajax({
            url: "pages/dish/update-dish-details.php",
            type : "POST",
            data : formdata,
            contentType : false,
            processData : false,
            success : function(result){
                $('.modal-backdrop').hide();
                 load_manage_dish();
                 alert("Food Details Updated")
            }
        })


}






// add delivery boy

function submit_boy_data(){


        bname = jQuery('#boy-Name').val()
        bphone = jQuery('#boy-phone').val()
        bemail = jQuery('#boy-email').val()
        
        var err = false

        if(bname == ""){
            jQuery("#name-error").html("* Please Enter Name")
            err = true

        } if(bphone == ""){
            jQuery("#phone-error").html("* Please Enter Phone Number")

            err = true
            
        } if(bemail == ""){
            jQuery("#email-error").html("* Please Enter Email")
            err = true
        }

        if(!err){

        jQuery.ajax({
            url: "pages/delivery-boys/add-delivery-boy.php",
            type : "POST",
            data : jQuery('#delivery-boy-form').serialize(),
            success : function(result){
                alert("Delivery Boy Added");
                jQuery('#boy-Name').val("")
                jQuery('#boy-phone').val("")
                jQuery('#boy-email').val("")
            }
        })


    }


}







function delete_boy_data(id){

    jQuery.ajax({
        url : 'pages/delivery-boys/delete-boy-data.php',
        type : 'post',
        data : 'id='+id,
        success : function(result){
            if(result){
                alert("Delivery Boy Removed")
            }else{
                alert("something goes wrong")
            }
        }
    })

    jQuery("#tr_"+id).hide();

}



function get_boy_data(id){

    $("#hidden_id").val(id);
    

    $.post("pages/delivery-boys/get-boy-details.php", {id:id}, function(data, status){
        
        var user = JSON.parse(data);

        $('.boyname').val(user.name);
        $('.boyphone').val(user.phone);
        $('.boyemail').val(user.email);

    });


   
}


function update_boy_data(){



    jQuery.ajax({

        url: "pages/delivery-boys/update-boy-data.php",
        type : "POST",
        data : jQuery('#boy-form').serialize(),
        success : function(result){
            $('.modal-backdrop').hide();
            load_delivery_boy();
            alert("Changes saved");

        }
    })


}












// orders section ####################


function load_orders(page){
    $.ajax({
                
        url : `pages/orders/${page}.php`,
        type : "get",
        success :  function(result){
            $("#mid-content").html(result);
        }

    });

}



var order_id;

function show_order_data(id){


    $("#hidden_id").val(id);
    
    order_id=id;



    $.post("pages/orders/get-order-data.php", {id:id}, function(data, status){
        
        
        var order = JSON.parse(data);
        
        var image = `../foodimg/${order.food_img}`;

        // alert(image)

        $('#username').html(order.user_name);
        $('#foodname').html(order.food_name);
        $("#foodimage").attr("src",image);
        $('#qty').html(order.qty);
        $('#bill').html(order.total_bill);
        $('#paymenttype').html(order.payment_type);
        $('#paymentstatus').html(order.payment_status);
        $('#useraddress').html(order.user_address);
        $('#city').html(order.city);
        $('#userphone').html(order.user_phone);
        $('#ordertime').html(order.order_time);

        if(order.delivery_boy_name !="")
            $('#delivery_selected').html(order.delivery_boy_name);

        $('#delivery_boy_name').html(order.delivery_boy_name);
        
        
        if(order.order_status !="")
            $('#order_status_selected').html(order.order_status);
        




    });


   
}



function change_payment_delivery_status(page){

    var order_status = $('#orderstatus').find(":selected").text()
    var delivery_boy = $('#deliveryBoy').find(":selected").text()
    


    jQuery.ajax({

        url: "pages/orders/update-order.php",
        type : "POST",

        data : {
                    id:order_id,
                    order_status:order_status,
                    delivery_boy:delivery_boy,
                },

    success : function(result){

        $('.modal-backdrop').hide();
        $('.modal').hide();
        load_orders(page);
        
        alert("Order Updated", result);

    }
})



}



// ### user

function delete_user(id){

    jQuery.ajax({
        url : 'pages/users/delete-user.php',
        type : 'post',
        data : 'id='+id,
        success : function(result){
            if(result){
                alert("User Removed")
            }else{
                alert("something goes wrong!")
            }
        }
    })

    jQuery("#tr_"+id).hide();

}