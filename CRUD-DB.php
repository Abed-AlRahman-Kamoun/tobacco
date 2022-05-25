<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Update DataBase</title>
</head>
<body>
    <div class="container">
    <div class="header">
        <h1>Note that updates done from this page are only applied on the "allProducts.php" page!</h1>
    </div>
    <div class="row justify-content-center">
        <?php include_once 'process.php'; ?>
        
        <?php
        if (isset($_SESSION['message']))
        {
        ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
        </div>
        <?php
        }
        ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image Source</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
		        	$query = "SELECT * FROM allproducts";
		        	$result = mysqli_query($con, $query);
		        	if(mysqli_num_rows($result) > 0)
		        	{
                    	while($row = mysqli_fetch_assoc($result))
                    	{
                ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['ImageScr']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><?php echo $row['Price']; ?>,000 LBP</td>
                                <td>
                                    <a href="CRUD-DB.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                                    <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                <?php
                    	}
		        	}
                ?>
            </table>
        </div>

        <form action="process.php" method="post">
            <input type="hidden" name="hidden_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Product ID:</label>
                <input type="number" name="id" class="form-control" value="<?php echo $p_id ?>" placeholder="Enter Product ID">
            </div>
            <div class="form-group">
                <label>Product Image Link:</label>
                <input type="text" name="image" class="form-control" value="<?php echo $p_image ?>" placeholder="Enter Product Image Link">
            </div>
            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $p_name ?>" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label>Product Description:</label>
                <input type="text" name="desc" class="form-control" value="<?php echo $p_description ?>" placeholder="Enter Product Description">
            </div>
            <div class="form-group">
                <label>Product Price:</label>
                <input type="text" name="price" class="form-control" value="<?php echo $p_price ?>" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <?php
                if($update == TRUE)
                {
                ?>
                    <button type="submit" name="update" class="btn btn-info">Update Product</button>
                <?php
                }
                else
                {
                ?>
                    <button type="submit" name="save" class="btn btn-primary">Add Product</button>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
    </div>
</body>
</html>