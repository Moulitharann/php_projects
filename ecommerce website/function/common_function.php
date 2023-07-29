<?php
include('./include/connect.php');
//getting the products

function getproducts()
{
    global $con;

    //contion for check isset

        if(!isset($_GET['category']))
        {
       if(!isset($_GET['brand'])){
    $select_query="select * from `products` order by rand() LIMIT 0,9";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $Product_price=$row['Product_price'];
    $catagories_id=$row['catagories_id'];
    $brand_id=$row['brand_id'];
    $product_title=$row['product_title'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
            </div>
     </div>
</div>";
}
}        
}
}

//getting category
function get_unique_cate()
{
    global $con;

    //contion for check isset

        if(isset($_GET['category']))
        {
            $category_id=$_GET['category'];
    $select_query="select * from `products` where catagories_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $countnoofrows=mysqli_num_rows($result_query);
    if($countnoofrows==0)
    {
        echo"<h2 class= 'text-center p-2 text-danger'><hr>NO Stock in this Category<hr></h2>";
    }
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];

while($row=mysqli_fetch_assoc($result_query))

   {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $Product_price=$row['Product_price'];
    $catagories_id=$row['catagories_id'];
    $brand_id=$row['brand_id'];
    $product_title=$row['product_title'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
            </div>
     </div>
</div>";
}
}        
}
 
//Brand show/

function get_unique_brand()
{
    global $con;

    //contion for check isset

        if(isset($_GET['brand']))
        {
            $brand_id=$_GET['brand'];
    $select_query="select * from `products` where brand_id=$brand_id";
    $result_query=mysqli_query($con,$select_query);
    $countnoofrows=mysqli_num_rows($result_query);
    if($countnoofrows==0)
    {   
        echo"<h2 class= 'text-center p-2 text-danger'><hr>NO Stock in this Brands<hr></h2>";
    }
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];

while($row=mysqli_fetch_assoc($result_query))

   {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $Product_price=$row['Product_price'];
    $catagories_id=$row['catagories_id'];
    $brand_id=$row['brand_id'];
    $product_title=$row['product_title'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
            </div>
     </div>
</div>";
}
}        
}


//search product

function search()
{
    global $con;

    //contion for check isset
 if(isset($_GET['search_data_product'])){
    $user_search=$_GET['search_data'];
   $search_query="select * from `products` where product_keywords like '%$user_search%' ";        
$result=mysqli_query($con,$search_query);
$countnoofrows=mysqli_num_rows($result);
if($countnoofrows==0)
{
    echo"<h2 class= 'text-center p-2 text-danger'><hr>NO item found in this Category<hr></h2>";
}
// $row=mysqli_fetch_assoc($result);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result))
{
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $Product_price=$row['Product_price'];
    $catagories_id=$row['catagories_id'];
    $brand_id=$row['brand_id'];
    $product_title=$row['product_title'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
            </div>
     </div>
</div>";
}
}        
}





//view details
function view_details()
{
    global $con;

    //contion for check isset
    if(isset($_GET['product_id'])){
        if(!isset($_GET['category']))
        {
       if(!isset($_GET['brand'])){
$product_id=$_GET['product_id'];

    $select_query="select * from `products` where product_id =$product_id";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $Product_price=$row['Product_price'];
    $catagories_id=$row['catagories_id'];
    $brand_id=$row['brand_id'];
    $product_title=$row['product_title'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$Product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
     </div>
</div>   

<div class='col-md-8'>
                    <!-- related images -->
                    <div class='row'>
                      <div class='col-md-12'>
                        <h4 c   lass='text-center text-info mb-5'>Related products</h4>
                        </div>
                          <div class='col-md-6'>
                          <img src='./admin_area/product_images/$product_image2'class='card-img-top' alt='$product_title'>
 
                           </div>
                       <div class='col-md-6'>
                       <img src='./admin_area/product_images/$product_image3'class='card-img-top' alt='$product_title'>
                       </div>
                  </div>

                 </div>";
}
}        
}
}
}

//getting ip

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



//cart funtion
function cart()
{
if(isset($_GET['add_to_cart'])){
   global $con;
   $ip=getIPAddress();
      $get_product_id=$_GET['add_to_cart'];
      $select_query="select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
      $result_query=mysqli_query($con,$select_query);
      $countnoofrows=mysqli_num_rows($result_query);
    if($countnoofrows>0)
    {
        echo"<script>alert('This item is already inside cart')</script>";

    }
    else{
        $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$ip',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo"<script>alert('The item is successfully inserted')</script>";
        echo"<script>window.open('index.php','_self')</script>";

    }

}
}


//function to get cart items
function cart_item()
{
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip=getIPAddress();
           $select_query="select * from `cart_details` where ip_address='$ip'";
           $result_query=mysqli_query($con,$select_query);
           $cartitem=mysqli_num_rows($result_query);
         
    }else{
            global $con;
        $ip=getIPAddress();
           $select_query="select * from `cart_details` where ip_address='$ip'";
           $result_query=mysqli_query($con,$select_query);
           $cartitem=mysqli_num_rows($result_query);
         
         }
     
         echo $cartitem;
     } 


     //total cart price

    function total_cart()
    {
        global $con;
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
    $product_values=array_sum($product_price);
    $total=$product_values+$total;
    }
    }
  echo $total;
}
?>







