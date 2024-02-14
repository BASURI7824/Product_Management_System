<?php
include('../includes/connection.php');
include('../includes/function.php');

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $get_product = "select * from products where product_id='$product_id'";
    $run_product = mysqli_query($conn, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    $product_id = $row_product['product_id'];
    $category_id = $row_product['category_id'];
    $product_price = $row_product['product_price'];
    $product_name = $row_product['product_name'];
    $product_image = $row_product['product_image'];
    $product_description = $row_product['product_description'];

    $get_pro_cat = "select * from categories where category_id='$category_id'";
    $run_pro_cat = mysqli_query($db, $get_pro_cat);
    $row_pro_cat = mysqli_fetch_array($run_pro_cat);

    $category_id = $row_pro_cat['category_id'];
    $category_name = $row_pro_cat['category_name'];
    $category_desc = $row_pro_cat['category_desc'];
}



?>
<!doctype html>
<html lang="en">
  <head>
    <title>|| Ptoduct Management :: Product ||</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- JQuert cdn Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Font-Awesome Icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">

    <style>
        .container .row {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            background: #eeeded;
            margin: 0;
            padding-bottom: 1rem;
        } 

        .category span {
            /* margin-top: 1rem; */
            color: #000000;
            background: rosybrown;
            width: fit-content;
            font-size: 12px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .category span:nth-child(2) {
            color: #000000;
            background: yellowgreen;
            width: fit-content;
            font-size: 12px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .heading {
            margin-top: 5rem;
        }

        .heading h1 {
            font-size: 25px;
        }

        h1 {
            font-size: 30px;
            color: #000000;
        }

        .star {
            width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;

            width: 300px;
            border-radius: 10px;
        }

        .star h6 {
            /* margin-top: 5px; */
            color: #fff;
            font-weight: bold;
            padding: 5px 10px;
            width: 60px;
            background: green;
            border-radius: 10px;
        }

        .star p {
            margin-left: 10px;
            margin-top: 5px;
        }

        .price {
            /* margin-top: 1rem; */
            display: flex;
            align-items: center;
            justify-content: space-around;
            /* background: palegoldenrod; */
            padding: 0;
            width: 150px;
            height: 50px;
            border-radius: 10px;
        }

        .price i {
            height: 25px;
            width: 25px;
            border-radius: 50%;
            border: 1px solid;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .price h3 {
            font-size: 30px;
            color: orange;
            font-weight: bold;
            margin-top: 5px;
        }

        .price h5 {
            font-size: 18px;
            color: #000000;
            font-weight: bold;
            margin-top: 5px;
        }

        .price h6 {
            font-size: 20px;
            color: orangered;
            /* font-weight: bold; */
            margin-top: 5px;
        }

        .offer,
        .details {
            width: 100%;
            /* background: lightyellow; */
        }

        .offer h4,
        .details h2 {
            font-size: 20px;
            font-weight: bold;
        }

        .offer p {
            font-size: 10px;
            margin-top: 0.5rem;
        }

        .details p {
            font-size: 12px;
            margin: 0;
        }

        .offer p i {
            color: green;
            margin-right: 8px;
        }

        .offer p span {
            font-weight: bold;
            color: royalblue;
            background: transparent;
            font-size: 12px;
        }

        .button {
            margin-top: 2.5rem;
        }

        .interest {
            background: #e6e6e6;
        }
    </style>
  </head>
  <body>

    <!-- Topbar Start -->
    <?php include('../includes/topbar.php'); ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php include('../includes/navbars.php'); ?>
    <!-- Navbar End -->

    <!-- Category Start -->

    <div class="category section-p1">
        <div class="cat">
            <div class="name">
                <h1> <i class="fa fa-product-hunt"></i> All Products</h1>   
            </div>

            <div class="button">
                <button class="btn btn-primary"><a href="product.php"> Back</a></button>
            </div>
        </div>

        <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo $product_image ?>" alt=""
                            height="400px" width="400px"
                            style="object-fit: cover; border-radius: 20px; box-shadow: 2px 4px 8px;">

                        <div class="button" style= "margin: 1rem 3rem 0 0; ">
                            <center>
                                <button class="btn btn-info">Add to Cart</button>
                                <button class="btn btn-warning">Add to Wishlist</button>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="category" style= "margin-top: -2.5rem;">
                            <span><?php echo $category_name ?></span>
                        </div>

                        <div class="heading">
                            <h1><?php echo $product_name ?></h1>
                        </div>

                        <div class="star">
                            <h6>4.5 <i class="fa fa-star"></i></h6>
                            <p>12,924 Ratings & 1,039 Reviews</p>
                        </div>

                        <div class="price">
                            <h3>&#8377; <?php echo $product_price ?></h3>
                            <i class="fa fa-info"></i>
                        </div>

                        <div class="offer">
                            <h4>Available Offer</h4>
                            <p> <i class="fa fa-tags"></i> Bank Offer 5% Cashback on EshoppS Axis Bank Card
                                <span>T&C</span>
                            </p>
                            <p> <i class="fa fa-tags"></i> Bank Offer 10% Upto &#8377;2500 off Axis Bank
                                Signature Credit Card <span>T&C</span></p>

                            <p> <i class="fa fa-tags"></i> Bank Offer 10% Upto &#8377;5000 on Axis Bank
                                Infinite Credit Card <span>T&C</span></p>

                            <p> <i class="fa fa-tags"></i> Buy this product and Get Extra &#8377;75 off on Select Room
                                Heaters <span>T&C</span></p>
                        </div>

                        <div class="details" style="margin-top: 1rem">
                            <h2>Description</h2>
                            <p><?php echo $product_description ?></p>
                        </div>
                    </div>
                </div>

        
    </div>


    <!-- Category End -->



    <?php include('../includes/footers.php'); ?>


    
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>