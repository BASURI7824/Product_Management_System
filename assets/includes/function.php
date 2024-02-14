<?php

$db=mysqli_connect("localhost", "root", "", "product_management_system");

function getpro() {
    global $db;

    $get_product = "select * from products order by 1 DESC LIMIT 0, 20";
    $run_product = mysqli_query($db, $get_product);

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
            <div class='col-md-3' style= 'width: 100%; height: 100%; padding: 1rem;'>
                <div class='content' style= 'background-color: #fff; border-radius: 10px; padding: 0.5rem; position: relative; box-shadow: 2px 4px 8px;'>
                    <div class='image' style= 'width: 265px; height: 265px; position: relative;'>
                        <img src='assets/images/$product_image' alt='' style='width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;'>
                    </div>
                    <div class='cat' style= ' position: absolute; top: 14.6rem; background-color: yellowgreen; padding: 0.5rem 1rem; border-top-right-radius: 20px; width: auto;'>
                        <h6 style= 'font-size: 0.8rem; font-weight: bold;'>$category_name</h6>
                    </div>
                    <div class='button' style= 'width: 100%; position: relative; display: flex; align-items: center; justify-content: center; margin-top: 0.5rem;'>
                            <button id='view' class='btn btn-primary' style='width: 200px; border-radius: 10px;'><a
                            href='assets/pages/product_view.php?id=$row_product[product_id]'
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
                </div>
            </div>
            
            ";
    }
}

function getProCat() {
    global $db;
    
    $get_pro_cat = "select * from categories";
    $run_pro_cat = mysqli_query($db, $get_pro_cat);

    while($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {
        $category_id = $row_pro_cat['category_id'];
        $category_name = $row_pro_cat['category_name'];
        $category_desc = $row_pro_cat['category_desc'];

        echo "<li style= 'margin-top: 0.5rem;'><a href='category.php?category=$category_id' style='font-weight: bold; font-size: 1.2rem; color: royalblue;'>$category_name</a></li>";

    }
}

function getProCategory() {
    global $db;
    
    $get_pro_cat = "select * from categories";
    $run_pro_cat = mysqli_query($db, $get_pro_cat);

    while($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {
        $category_id = $row_pro_cat['category_id'];
        $category_name = $row_pro_cat['category_name'];
        $category_desc = $row_pro_cat['category_desc'];

        echo "<li style= 'margin-top: 0.5rem; background: #eee; padding: 0.5rem 1rem; border-radius: 10px;'><a href='product.php?category=$category_id' style='font-weight: bold; font-size: 1.2rem; color: royalblue; text-decoration: none;'>$category_name</a></li>";

    }
}

function getProCategoryFetch() {
    global $db;

    if(isset($_GET['category'])) {
        $pro_cat = $_GET['category'];

        $get_pro_cat = "select * from categories where category_id='$pro_cat'";
        $run_pro_cat = mysqli_query($db, $get_pro_cat);
        $row_pro_cat = mysqli_fetch_array($run_pro_cat);

        $category_id = $row_pro_cat['category_id'];
        $category_name = $row_pro_cat['category_name'];
        $category_desc = $row_pro_cat['category_desc'];


        $get_product = "select * from products where category_id='$pro_cat'";
        $run_product = mysqli_query($db, $get_product);
        $count_product = mysqli_num_rows($run_product);

        if($count_product == 0) {
            echo "
                <div class='col-md-12' style= 'width: 100%; height: auto; padding: 1rem; background: #fff; box-shadow: 2px 4px 8px; border-radius: 10px;'>
                    <h1>No Product Found in this Category</h1>
                </div>
            ";
        } else {
            echo "
                <div class='col-md-12' style= 'width: 100%; height: auto; padding: 1rem; background: #fff; box-shadow: 2px 4px 8px; border-radius: 10px;'>
                    <h1>$category_name</h1>
                    <p>$category_desc</p>
                </div>
            ";
        }

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

    }
}

