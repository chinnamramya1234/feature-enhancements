<?php
session_start();

include 'bootstrap.php';
$conn = new mysqli("localhost", "root", "", "task3");

?>

<!DOCTYPE html>
<html>
    <h1 class="text-center my-4">Product Management</h1>
    <!-- <p style="margin-left: 950px;margin-top: -20px;"><b>Username : <?php echo $username;?></b></p> -->
    <p style="margin-left: 950px;margin-top: -20px;"><b>Role : Customer</b></p>
    <p><a style="margin-left: 970px;" href="logout.php">Logout</a></p>
    <body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <div>
    <a class="btn btn-primary" type="submit" style="margin-left: -1000px;" href="view_cart.php">View Cart</a>
    </div>
    <div>
        <a class="btn btn-primary" type="submit" style="margin-left: 950px;margin-top: -60px;" href="add_product.php">Add Product</a>
    </div>
        <div class="container mt-1 d-flex justify-content-center">
            <table class="table table-bordered w-5" style="margin-top: 10px;">
                <thead class="table-dark">
                    <tr>
                        <!-- <th scope="col">Sl No</th> -->
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT p.*, v.vendor_name AS vendor_name FROM product p
                JOIN vendor v ON p.vendor_id = v.vendor_id
                WHERE v.is_active = 1";
                $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
    
                ?>
                <tr>
                    <!-- <td><?php echo $row['id']; ?> </td> -->
                    <td><?php echo $row['vendor_id']; ?> </td>
                    <td><?php echo $row['product_name']; ?> </td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['sku']; ?> </td>
                    <td><?php echo $row['price']; ?> </td>
                    <td><?php echo $row['stock_quantity']; ?> </td>
                    <td>
                    <a class="btn btn-primary" type="submit" name="submit" value="submit" href="add_cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
                    </td>
                </tr>
                <?php 
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>