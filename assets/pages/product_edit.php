<?php
include('../includes/connection.php');
include('../includes/function.php');

$id = $_GET['id'];

    $update = "SELECT * FROM PRODUCTS where product_id  = '$id'";
    $run_update = mysqli_query ($conn, $update);
    $result = mysqli_fetch_assoc($run_update);

    $category_id = $result['category_id'];
    $get_pro_cat = "select * from categories where category_id='$category_id'";
            $run_pro_cat = mysqli_query($db, $get_pro_cat);
            $row_pro_cat = mysqli_fetch_array($run_pro_cat);

            // $category_id = $row_pro_cat['category_id'];
            // $category_name = $row_pro_cat['category_name'];
            // $category_desc = $row_pro_cat['category_desc'];
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
                <button class="btn btn-primary"><a href="product.php">Back</a></button>
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
                <div class="container">
                    <h3>Create Product</h3>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Product Name:</strong>
                                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" required  value= "<?php echo $result['product_name']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Product Category Name:</strong>
                                    <select name="pro_cat" id="" class="form-control" values= "">
                                        <option value="<?php echo $row_pro_cat['category_id'] ?>"><?php echo $row_pro_cat['category_name'] ?></option>
                                        <?php
                                            $get_pro_cat = "select * from categories";
                                            $run_pro_cat = mysqli_query($conn, $get_pro_cat);

                                            while($row_pro_cat = mysqli_fetch_array($run_pro_cat)){
                                                $category_id = $row_pro_cat['category_id'];
                                                $category_name = $row_pro_cat['category_name'];
                                                echo "<option value='$category_id'>$category_name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Product Price:</strong>
                                    <input type="number" name="product_price" class="form-control" placeholder="Product Price" required value= "<?php echo $result['product_price']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Product Image:</strong>
                                    <input type="file" name="product_image" class="form-control" placeholder="Image"
                                        accept="image/jpeg, image/jpg, image/gif, image/png" required>
                                    <img src="<?php echo $result['product_image']; ?>" alt="" height="100" width="100">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Product Description:</strong>
                                    <textarea name="product_description" id="" cols="30" rows="10" placeholder="Product Description"
                                        Style="width: 100%;" required><?php echo $result['product_description']; ?></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success" name="update" style="width: 300px;">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Category End -->



    <?php include('../includes/footers.php'); ?>


    
<?php
    if (isset($_POST['update'])) {
        $product_name = $_POST['product_name'];
        $pro_cat = $_POST['pro_cat'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        
        $filename = $_FILES["product_image"]["name"];
        $tmpname = $_FILES["product_image"]["tmp_name"];
        $folder = "../images/product/".$filename;
        move_uploaded_file($tmpname, $folder);
        
        $update_query = "UPDATE PRODUCTS SET category_id = '$pro_cat', product_name = '$product_name', product_price = '$product_price', product_image = '$folder', product_description = '$product_description'  WHERE product_id = '$id' ";
        $run_query = mysqli_query($conn, $update_query);
        
        
        if($run_query){
            echo "<script>alert('Product Updated successfully')</script>";
            echo "<script>window.open('product.php', '_self')</script> ";
        } 

        else{
            echo " <script> alert('Product has not been Updated')</script> "; 
            echo " <script>window.open(product.php', '_self')</script> ";
        }
    }

?>
      


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>