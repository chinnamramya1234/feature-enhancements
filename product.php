<?php

include 'bootstrap.php';
$conn = new mysqli("localhost", "root", "", "task3"); 


?>

<!DOCTYPE html>
<html>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this record ?");
}
</script>
<body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <h1 class="text-center my-4">Product Management</h1>
    <div>
        <a type="submit" style="margin-left: 970px;" href="addproduct.php">Add Product</a>
    </div>
        <div class="container mt-1 d-flex justify-content-center">
            <table class="table table-bordered w-5" style="margin-top: 10px;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sl No</th>
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
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['vendor_id']; ?> </td>
                    <td><?php echo $row['product_name']; ?> </td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['sku']; ?> </td>
                    <td><?php echo $row['price']; ?> </td>
                    <td><?php echo $row['stock_quantity']; ?> </td>
                    <td>
                    <p type="submit" name="submit" value="submit"><a  href="productedit.php?id=<?php echo $row['id']; ?>">Edit</a></p>
                    <p><a  style="color: red;" href="productdelete.php?id=<?php echo $row['id']; ?>"  onclick='return confirmDelete()'>Delete</a></p>
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