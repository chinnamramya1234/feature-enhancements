<?php
session_start();

include 'bootstrap.php';

$conn = new mysqli("localhost", "root", "", "task3");
?>

<!DOCTYPE html>
<html>
<body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <h1 class="text-center my-4">Viewing Cart Details</h1>
    <div>
        <a type="submit" style="margin-left: 1050px;" href="customer.php">Back to Dashboard</a>
    </div>
        <div class="container mt-1 d-flex justify-content-center">
            <table class="table table-bordered w-5" style="margin-top: 10px;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Venodr ID</th>
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
                $sql = "SELECT * FROM cart";
                $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){

                ?>
                <tr style="width: fit-content;">
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['vendor_id']; ?> </td>
                    <td><?php echo $row['product_name']; ?> </td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['sku']; ?> </td>
                    <td><?php echo $row['price']; ?> </td>
                    <td><?php echo $row['stock_quantity']; ?> </td>
                    <td>
                    <a class="btn btn-danger" type="submit" name="submit" value="submit" href="delete_cart.php?id=<?php echo $row['id']; ?>">Delete from Cart</a>
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