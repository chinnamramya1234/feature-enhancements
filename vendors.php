<?php

$conn = new mysqli("localhost", "root", "", "task3"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $id = $_POST["vendor_id"];
    $status = $_POST["status"];

    $updateQuery = "UPDATE vendor SET is_active = '$status' WHERE id = '$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header("Location: admin.php");
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete the vendor ?");
}
</script>
<body class="text-center my-4" content="width=device-width, initial-scale = 1.0" style="background-color: aliceblue;">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <h1 class="text-center my-4">Vendor Management</h1>
    <div>
        <a type="submit" style="margin-left: 1050px;" href="addvendor.php">Add Vendor</a>
    </div>
        <div class="container mt-1 d-flex justify-content-center">
            <table class="table table-bordered w-5" style="margin-top: 10px;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Venodr ID</th>
                        <th scope="col">Vendor Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Address</th>
                        <th scope="col">TAX ID</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT * FROM vendor";
                $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){

                ?>
                <tr style="width: fit-content;">
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['vendor_id']; ?> </td>
                    <td><?php echo $row['vendor_name']; ?> </td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['phone']; ?> </td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><?php echo $row['website']; ?> </td>
                    <td><?php echo $row['address']; ?> </td>
                    <td><?php echo $row['taxid']; ?> </td>
                    <td>
                        <form action="vendors.php" method="post">
                        <input type="hidden" name="vendor_id" value="<?php echo $row['id']; ?>">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="1" <?php if ($row['is_active'] == 1) echo 'checked'; ?>>
                                <label class="form-check-label">Active</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="0" <?php if ($row['is_active'] == 0) echo 'checked'; ?>>
                                <label class="form-check-label">Inactive</label>
                            </div>

                        <button type="submit" name="update_status" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                    <td>
                        <p type="submit" name="submit" value="submit"><a  href="vendoredit.php?id=<?php echo $row['id']; ?>">Edit</a></p>
                        <p><a style="color: red;" href="vendordelete.php?id=<?php echo $row['id']; ?>"  onclick='return confirmDelete()'>Delete</a></p>
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