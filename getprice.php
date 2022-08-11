<?php 




$q = $_REQUEST['q'];
$price = $_REQUEST['prc'];

$total = $price * $q;

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    echo $total;
}else{

    echo $price;

}


// Output "no suggestion" if no hint was found or output correct values

?>