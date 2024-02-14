<?php
include('../includes/connection.php');
include('../includes/function.php');
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
                <button class="btn btn-primary"><a href="product_create.php">Create Product</a></button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu" >         
                    <div class="panel-heading">
                        <h3 class="panel-title">All Categories <i class="fa fa-filter" style="margin-left: 2.5rem;" aria-hidden="true"></i></h3>
                    </div>

                    <div class="panel-body">
                        <ul style=" list-style: none;">
                            <?php getProCategory() ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row" style= "width: 105%; height: 100%; position: relative; display: flex; align-items: center;  justify-content: center;">

                    <?php 
                        if(!isset($_GET['category'])) {
                            echo "
                                <div class='col-md-12' style= 'width: 100%; height: auto; padding: 1rem; background: #fff; box-shadow: 2px 4px 8px; border-radius: 10px;'>
                                    <h1>Product</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident dolorem repudiandae possimus officiis ipsa repellat laborum culpa architecto commodi reiciendis.</p>
                                </div>
                            ";
                        }
                    ?>
                </div>

                <div class="row" style= "width: 105%; height: 100%; position: relative; display: flex; align-items: center;  justify-content: start; margin-top: 1rem;">

                    <?php 
                        // getpro()
                        if(!isset($_GET['category'])) { 
                            
                            $per_page = 6;
                            if(isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $start_from = ($page - 1) * $per_page;
                            $get_procuct = "select * from products order by 1 DESC LIMIT $start_from, $per_page";
                            $run_product = mysqli_query($conn, $get_procuct);
                            while($row_product = mysqli_fetch_array($run_product)) {
                                $product_id = $row_product['product_id'];
                                $category_id = $row_product['category_id'];
                                $product_name = $row_product['product_name'];
                                $product_price = $row_product['product_price'];
                                $product_image = $row_product['product_image'];
                                $product_description = $row_product['product_description'];

                                $get_pro_cat = "select * from categories where category_id='$category_id'";
                                $run_pro_cat = mysqli_query($db, $get_pro_cat);
                                $row_pro_cat = mysqli_fetch_array($run_pro_cat);

                                $category_id = $row_pro_cat['category_id'];
                                $category_name = $row_pro_cat['category_name'];
                                $category_desc = $row_pro_cat['category_desc'];

                                echo "
                                    <div class='col-md-4' style= 'width: 100%; height: 100%; padding: 1rem;'>
                                        <div class='content' style= 'background-color: #fff; border-radius: 10px; padding: 0.5rem; position: relative; box-shadow: 2px 4px 8px;'>
                                            <div class='image' style= 'width: 255px; height: 255px; position: relative;'>
                                                <img src='$product_image' alt='' style='width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;'>
                                            </div>
                                            <div class='cat' style= ' position: absolute; top: 14rem; background-color: yellowgreen; padding: 0.5rem 1rem; border-top-right-radius: 20px; width: auto;'>
                                                <h6 style= 'font-size: 0.8rem; font-weight: bold;'>$category_name</h6>
                                            </div>
                                            <div class='button' style= 'width: 100%; position: relative; display: flex; align-items: center; justify-content: center; margin-top: 0.5rem;'>
                                                    <button id='view' class='btn btn-primary' style='width: 200px; border-radius: 10px;'><a
                                                    href='product_view.php?id=$row_product[product_id]'
                                                    style='color: black; text-decoration: none; font-size: 1.2rem; font-weight: bold;'>View Product</a></button>
                                                </div>
                                            <div class='description' style= 'width: 100%; height: 50%; position: relative; display: flex; align-items: center; justify-content: space-around;'>
                                                
                                                <div class='name'>
                                                    <h4 style= 'font-size: 0.9rem; font-weight: bold; margin-top: 0.5rem;'>$product_name</h4>
                                                </div>
                                            </div>
                                            <div class='price' style= 'padding: 0 1rem; position: relative; display: flex; align-items: center; justify-content: space-between;'>
                                                <div class='star'>
                                                    <i class='fa fa-star' style= 'color: orange;'></i>
                                                    <i class='fa fa-star' style= 'color: orange;'></i>
                                                    <i class='fa fa-star' style= 'color: orange;'></i>
                                                    <i class='fa fa-star' style= 'color: orange;'></i>
                                                    <i class='fa fa-star-half' style= 'color: orange;'></i>
                                                </div>
                                                <h6 style= 'font-size: 1.5rem; font-weight: bold;'>&#8377; $product_price</h6>
                                                <i class='fa fa-shopping-cart' style= 'height: 35px; width: 35px; border-radius: 50%; position: absolute; top: -21rem; right: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; color: #fff; background-color: royalblue; box-shadow: 2px 4px 8px #000; cursor: pointer;'></i>
                                            </div>

                                            

                                            <div class='button' style= 'width: 100%; position: relative; display: flex; align-items: center; justify-content: space-between;'>
                                                
                                                <button id='update' class='btn btn-success' style='width: 125px; border-radius: 10px;'><a
                                                        href='product_edit.php?id=$row_product[product_id]'
                                                        style='color: black; text-decoration: none; font-size: 1.2rem; font-weight: bold;'>Update</a></button>
                                                
                                                <button id='delete' class='btn btn-danger' style='width: 125px; border-radius: 10px;'><a
                                                        href='product_delete.php?id=$row_product[product_id]'
                                                        style='color: black; text-decoration: none; font-size: 1.2rem; font-weight: bold;'>Delete</a></button>
                                            </div>
                                        </div>
                                    </div>
                                ";

                            }
                        
                    ?>
                </div>

                <center>
                    <ul class="pagination" style= "margin-top: 1rem;">
                        <?php
                            $query = "select * from products";
                            $result = mysqli_query($conn, $query);
                            $total_record = mysqli_num_rows($result);
                            $total_pages = ceil($total_record / $per_page);

                            echo "
                                <li style='padding: 0.5rem 1rem; background: #ccc; border-top-left-radius: 10px; border: 2px solid ; border-bottom-left-radius: 10px;'><a style='color: royalblue; font-weight: bold; ' href= 'product.php?page=1'>".'First Page'."</a></li>
                            ";
                            for($i = 1; $i<=$total_pages; $i++) {
                                echo "
                                <li style='padding: 0.5rem 1rem; background: #ccc; border: 2px solid ;'><a style='color: royalblue; font-weight: bold;' href= 'product.php?page=".$i."'> ".$i." </a></li>
                            ";
                            };
                            
                            echo "
                                <li style='padding: 0.5rem 1rem; background: #ccc; border: 2px solid ; border-top-right-radius: 10px; border-bottom-right-radius: 10px;'><a style='color: royalblue; font-weight: bold;' href= 'product.php?page=$total_pages'>".'Last Page'."</a></li>
                            ";
                        }
                        ?>
                    </ul>
                </center>

                <div class="row" style= "width: 100%; height: 100%; position: relative; display: flex; align-items: center;  justify-content: start; margin-left: 0.3rem; margin-top: -1.3rem;">
                        <?php getProCategoryFetch() ?>

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