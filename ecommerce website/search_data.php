<?php
include('include/connect.php');
include('function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce website website</title>
    <!-- bootstraplink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- fontawsomelink -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
<a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">total price:<?php total_cart();?>/-</a>
</li>
</ul>
<form class="d-flex"  method="get">
<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
<input type="submit" value="search" class="btn btn-outline-light " name="search_data_product">
</form>
</div>
</nav>  

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

<!-- fouth child -->
<div class="row p-3">
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
            <?php

// fetching products
        //   getproducts();
          //search_data
          search();
          //category 
          get_unique_cate();
          //brands
          get_unique_brand();
?>

            
            <!-- row end -->
        </div>
        <!-- column end -->
    </div>
    <div class="col-md-2 bg-secondary p-0">
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Brand</h4></a>
            </li>
            <?php
        $select_brand="select * from `brands`";
        $result_brand=mysqli_query($con,$select_brand);

        while($row_data=mysqli_fetch_assoc($result_brand)){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            echo" <li class='nav-item '>
            <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title </a>
        </li>";

        }
            ?>
           
           
        </ul>
        <!-- brands to display -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>catogrize</h4></a>
            </li>
            <?php
$category="select * from `catagories`";
$connet=mysqli_query($con,$category);
while($row_data=mysqli_fetch_assoc($connet))
{
    $category_id=$row_data['catagories_id'];
    $category_title=$row_data['catagory_title'];
    echo" <li class='nav-item '>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title </a>
</li>";
}


?>
            
        </ul>
    </div>
</div>

<?php include("./include/footer.php") ?>
   </div>


<!-- bootstrapjslink -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html> 