

function buy_food(id){
    $.ajax({
        url : 'billing.php',
        data : 'id='+id,
        success : function(result){
            $('#mid-content').html(result);
        }
    })


}

$(document).ready(function(){

    $('#category-box').change(function(){

    var category = $(this).val();

    // console.log(category);

    if(category !=""){

        $.ajax({

            url : 'get-food-by-category.php',
            type: 'POST',
            data : {category : category},
            success: function(data){

                $(".content").html(data);           
                


            }

        })



        // $.post('get-food-by-category.php', { category: category }, function (data, status) {

            // var food = JSON.parse(data);
          
            // let image = `./foodimg/${food.food_img}`;
            // let link = `./billing.php?id=${food.food_id}`;

            // $(".food-img").attr("src",image);

            // $(".box-link").attr("href", link)
            // $(".box-link2").attr("href", link)
            // $(".box-food-name").html(food.food_name);
            // $(".box-food-category").html(food.food_category);
            // $(".box-food-price").html(food.food_price);
            // $(".box-food-price").html(food.food_price);



        // }




    }else{

    }

});




  





})





