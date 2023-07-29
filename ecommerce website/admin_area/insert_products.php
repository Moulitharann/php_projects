<?php

include('../include/connect.php');
if(isset($_POST['insert_product'])){
$product_title=$_POST['product_title'];
$description_product=$_POST['description'];
$product_keywords=$_POST['product_keywords'];
$product_categories=$_POST['product_categories'];
$product_brands=$_POST['product_brands'];
$Product_price=$_POST['Product_price'];
$status='true';

//accessing data
$product_image1=$_FILES['Product_image1']['name'];
$product_image2=$_FILES['Product_image2']['name'];
$product_image3=$_FILES['Product_image3']['name'];



//accessing image tmp name
$temp_image1=$_FILES['Product_image1']['tmp_name'];
$temp_image2=$_FILES['Product_image2']['tmp_name'];
$temp_image3=$_FILES['Product_image3']['tmp_name'];

///checking the data
if($product_title=='')
{

    echo"<script>alert('please fill all the variable feilds')</script>";  
    exit();
}
else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");


    //insert query
         $insert_product="INSERT INTO `products`(product_title,product_description	,product_keywords,catagories_id,brand_id,product_image1,product_image2,product_image3,Product_price,date,	status)
          values('$product_title','$description_product','$product_keywords','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$Product_price','NOW()','$status')";
    $result_query=mysqli_query($con,$insert_product);
    if($result_query)
    {
        echo"<script>alert('successfully inserted the products')</script>";  

    }
    else{
        echo"<script>alert('products not inserted the products table')</script>";  

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
    <title>insert products -admin dashboard</title>
    <!-- bootstraplink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- fontawsomelink -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert products</h1>

        <!-- title -->
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title"class="form-label">Product title</label>
            <input type="text" name="product_title"id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        
        <!-- descrition -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description"class="form-label">Product description</label>
            <input type="text" name="description"id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords"class="form-label">Product keywords</label>
            <input type="text" name="product_keywords"id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
        </div>
        <!-- categories -->

        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categories" id="" class="form-select">
            
                    <option value="">select category</option>
                    <?php

                    $select_query="select * from `catagories`";
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result)){
                        $catagory_title=$row['catagory_title'];
                        $catagory_id=$row['catagory_id'];
                        echo "<option value='$catagory_id' > $catagory_title</option>"; 
                    }
                    ?>
            </select>
        </div>


        <!-- brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select">
            
                    <option value="">select brands</option>
                    <?php

               $select_query="select * from `brands`";
                $result=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result)){
                $brand_title=$row['brand_title'];
                $brand_id=$row['brand_id'];
                echo "<option value='$brand_id' > $brand_title</option>"; 
                }
?>      
            </select>
        </div>

         <!-- image1 -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image1"class="form-label">Product_image1</label>
            <input type="file" name="Product_image1"id="Product_image1" class="form-control"  required="required">
  
  
        </div>
        <!-- image2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image2"class="form-label">Product_image2</label>
            <input type="file" name="Product_image2"id="Product_image2" class="form-control"  required="required">
        </div>
        <!-- image3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image3"class="form-label">Product_image1</label>
            <input type="file" name="Product_image3"id="Product_image3" class="form-control"  required="required">
        </div>
        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_price"class="form-label">Product_price</label>
            <input type="text" name="Product_price"id="Product_price    " class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
        </div>
         <!-- price -->
         <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="insert_product" id="" class="btn btn-primary mb-3 px-3" value="insert products">    
    </div>
    </form>
</div>
    
</body>
</html> 