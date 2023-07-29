<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- fontawasome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link -->
   <link rel="stylesheet" href="../style.css">
   <style>
    .admin-image{
    width: 100%;
    object-fit: contain;
}
.footer{
    position:absolute;
    bottom:0;
}
   </style>
</head>
<body>

  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../image/1.jpg" alt="" class="logo">
            <nav class="navbar navbar-expand-lg ">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="" class="nav-link">Welcome guest</a>
                  </li>
                </ul>
           </nav>
        </div>
    </nav>
    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage details</h3>
    </div>

    <!-- third child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex algin-items-center    ">
        <div class="px-3 ">
            <a href="#"><img src="../image/3.jpg" alt="" class="3"></a>
            <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center w-auto">
            <button class="my-3"><a href="insert_prodcuts.php" class="nav-link text-light bg-info my-1">Insert products</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">view products</a></button>
            <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert cateories</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">view categories</a></button>
            <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">view Brands</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">LIst users</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>   
            </div>
    </div>
</div>

<!-- fourth child -->
<div class="conatiner my-5">
    <?php 
    if(isset($_GET['insert_categories'])){
        include('insert_categories.php');   
    }
    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
    }
    ?>
</div>
  
<div class="bg-info p-3 text-center footer">
    <p>All rights reserved 0-Designed by Mt Mouli-2023 </p>
</div>
  </div>



    <!-- bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>