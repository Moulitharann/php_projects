<?php
include('./include/connect.php');
include('./function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce website cart details</title>
    <!-- bootstraplink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- fontawsomelink -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
    width: 50px;
    height: 50px;
    object-fit:contain;
}
D:\apachi\htdocs\ecommerce website\admin_area
    </style>
</head>
<body >
   <!-- navbar -->
   <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
<img src="./image/logo.png" class="logo">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Register</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Contact</a>
</li>
<li class="nav-item">
<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
</li>

</ul>

</div>
</nav>  
<?php cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
<a class="nav-link" href="#">welcome guest</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">login</a>
</li>
    </ul>
</nav>
<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">
        stylish pants
    </h3>
    <p class="text-center">dressing is not a fashion its emotion    </p>
</div>


<!-- fourth child -->
<div class="container">
    <div class="row">
        <form action="" method="post">
    
        <table class="table table-bordered text-center  ">
            <thead>
                <tr>
                    <th>prodcut title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th colspan="2">operation</th>
                </tr>
            </thead>
            <tbody>
                <!-- php code to display -->
                <?php
     
        $ip=getIPAddress();
        $total=0;
    $cart_query="select * from `cart_details` where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result))
    {
        $product_id=$row['product_id'];
        $select_product="select *from `products` where product_id='$product_id'";
        $result_product=mysqli_query($con,$select_product);
        while($row_product_price=mysqli_fetch_array($result_product))
    {
    $product_price=array($row_product_price['Product_price']);
    $price_table=$row_product_price['Product_price'];
    $price_title=$row_product_price['product_title'];
    $price_image1=$row_product_price['product_image1'];
    //echo $price_image1 ;
    $product_values=array_sum($product_price);
    $total=$product_values+$total;
     ?>
                <tr><td>
                <?php echo$price_title ?>
                </td> 
            <td ><img src="./image/<?php echo $price_image1 ?>" class="cart_img"></td> 
        <td><input type="text" name="qty" class="form-input w-50"></td>
        <?php        
        $ip=getIPAddress();
if(isset($_POST['update_cart']))
{
 $quantities=$_POST['qty'];
 $update_cart="UPDATE `cart_details` set `quantity`='$quantities' where `ip_address`='$ip'";
 $result_quantity=mysqli_query($con,$update_cart);
} ?>
        <td><?php echo$price_table ?></td>
        <td><input type="checkbox"></td>
        <td >
            
            <!-- <button class="bg-primary px-3 py-2 mx-3 border-0 m-2">update</button> -->
            <input type="submit" value="update cart" class="bg-primary px-3 py-2 mx-3 border-0 m-2" name="update_cart">
            <button class="bg-primary px-3 py-2 mx-3 border-0 ">Remove</button>
            </td>
        </tr>
        <?php }
    } ?>
            </tbody>
        </table>
        <div class="d-flex mb-5">
            <h4 class="px-3">SubTotal:<strong class="text-info"><?php echo $total ?>/-</strong></h4>
            <a href="index.php"><button class="bg-primary px-3 py-2 mx-3 border-0 ">continue Shopping</button></a>
            <a href="#"><button class="bg-info p-3 py-2 border-0">checkout</button></a>

        </div>
    </div>
</div> 
</form>
<?php  
include("./include/footer.php")  ?>
   


<!-- bootstrapjslink -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>