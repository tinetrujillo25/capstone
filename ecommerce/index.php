<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
      Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>DTRMotoworks</title>
</head>
<body>
<div>
<form action="/action_page.php">
  <label for="motorparts">Categories:</label>
  <select name="motorparts" id="motorparts">
  <option value="Clutch Spring"></option>
    <option value="Engine Oil">Engine Oil</option>
    <option value="Seat Cover">Seat Cover</option>
    <option value="Lightings">Lightings</option>
  </select>
    </div>
</div>
<div class="header">
    <div class="logo">
      <h2>DTR Motoworks</h2>
    </div>
    <div class="navbar">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="cart.php"><img src="cart-icon.png"><?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
 Cart</a><span>
<?php echo $cart_count; ?></span>
<?php
}
?></li>

      </ul>
    

  </div>
<div class="message_box" style="margin:15px 0px;">
<?php echo $status; ?>
</div>
<br>


<?php
$result = mysqli_query($con,"SELECT * FROM `products` LIMIT 0,100");
while($row = mysqli_fetch_assoc($result)){
    
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><img src='".$row['image']."'></div>
    <div class='name'>".$row['name']."</div>
    <div class='price'>Php ".$row['price']."</div>
    <button type='submit' class='buy'>Add to Cart</button>
    </form>
    </div>";
        }
  
  
        
mysqli_close($con);
?>

 
<div style="clear:both;"></div>

</div>

   
</body>
</html>