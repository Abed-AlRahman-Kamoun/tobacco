<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ahmadbakkar db');

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["smoke_cart"]))
    {
        $item_array_id = array_column($_SESSION["smoke_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["smoke_cart"]);
            $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["smoke_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["smoke_cart"][0] = $item_array;
    }

	if(isset($_SESSION["shisha_cart"]))
    {
        $item_array_id = array_column($_SESSION["shisha_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shisha_cart"]);
            $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shisha_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shisha_cart"][0] = $item_array;
    }

	if(isset($_SESSION["product_cart"]))
    {
        $item_array_id = array_column($_SESSION["product_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["product_cart"]);
            $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["product_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["product_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["smoke_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["smoke_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="checkout.php"</script>';
            }
        }
    }
	if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shisha_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shisha_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="checkout.php"</script>';
            }
        }
    }
	if($_GET["action"] == "delete")
    {
        foreach($_SESSION["product_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["product_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="checkout.php"</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"  crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link href="css/checkout.css" rel="stylesheet" />
    <title>AhmadBakkar | CheckOutPage</title>
</head>
<body>
    <div class="container">
        <div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/cartpic.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/logo.png" alt="Logo" class="tm-site-logo" width="90px" />  
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Bakkar For Tobacco</h1>
								<h6 class="tm-site-description">Smoke away your worries</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="nav justify-content-end">
								<li class="nav-item">
								  <a class="nav-link" href="index.html">Home</a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="about.html">About</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>
									<div class="dropdown-menu">
									  <a class="dropdown-item" href="allProducts.php">All Products</a>
									  <a class="dropdown-item" href="smoke.php">Cigarettes</a>
									  <a class="dropdown-item" href="shisha.php">Tobacco</a>
									</div>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="contact.html">Contact Us</a>
								</li>
								<a href="checkout.php" style="color: white;"><i class="fas fa-shopping-cart" style="font-size: 20px; margin-top: 13px;"></i></a>
								<br><button class="btn-success"><a href="adminlogin.php" style="color: black; text-decoration: none;">Admin Login</a></button>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<header class="row tm-welcome-section">
        	<h1 class="col-12 text-center tm-section-title"><strong style="color: #6ab04c">Order</strong> Details</h1>
		</header>
     	<div class="table-responsive">
     		<table class="table table-bordered">
     			<tr>
     				<th width="40%">Item Name</th>
     				<th width="10%">Quantity</th>
     				<th width="20%">Price</th>
     				<th width="15%">Total</th>
     				<th width="5%">Action</th>
     			</tr>
     			<?php
     			if(!empty($_SESSION["smoke_cart"]) || !empty($_SESSION["shisha_cart"]) || !empty($_SESSION["product_cart"]))
     			{
     				$total1 = 0;
     				foreach($_SESSION["smoke_cart"] as $keys => $values)
     				{
     			?>
     			<tr>
     				<td><?php echo $values["item_name"]; ?></td>
     				<td><?php echo $values["item_quantity"]; ?></td>
     				<td><?php echo $values["item_price"]; ?>,000 LBP</td>
     				<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 0); ?>,000 LBP</td>
     				<td><a href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
     			</tr>
     			<?php
     					$total1 = $total1 + ($values["item_quantity"] * $values["item_price"]);
     				}

                	$total2 = 0;
     				foreach($_SESSION["shisha_cart"] as $keys => $values)
     				{
     			?>
     			<tr>
     				<td><?php echo $values["item_name"]; ?></td>
     				<td><?php echo $values["item_quantity"]; ?></td>
     				<td><?php echo $values["item_price"]; ?>,000 LBP</td>
     				<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 0); ?>,000 LBP</td>
     				<td><a href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
     			</tr>
     			<?php
     					$total2 = $total2 + ($values["item_quantity"] * $values["item_price"]);
     				}

					$total3 = 0;
					foreach($_SESSION["product_cart"] as $keys => $values)
					{
				?>
				<tr>
     				<td><?php echo $values["item_name"]; ?></td>
     				<td><?php echo $values["item_quantity"]; ?></td>
     				<td><?php echo $values["item_price"]; ?>,000 LBP</td>
     				<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 0); ?>,000 LBP</td>
     				<td><a href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
     			</tr>
     			<?php
     					$total3 = $total3 + ($values["item_quantity"] * $values["item_price"]);
     				}
				?>
     			<tr>
     				<td colspan="3" align="right">Total</td>
     				<td align="right"><?php echo number_format($total1 + $total2 + $total3, 0); ?>,000 LBP</td>
     				<td></td>
     			</tr>
				<?php
				}
				?>
     		</table>
     	</div>
		</br>
		<div class="checkoutrow">
    		<div class="col-75">
    		    <div class="container">
    		        <form id="validate">
    		            <div class="checkoutrow">
    		                <div class="col-50">
								<h3 style="color: #6ab04c">Shipping Adress</h3>
    		                    <label for="fname"><i class="fas fa-user" style="color: #6ab04c"></i> Full Name</label>
    		                    <input type="text" id="fname" name="fullname" placeholder="Enter Your Name" required>
    		                    <label for="email"><i class="fas fa-envelope" style="color: #6ab04c"></i> Email</label>
    		                    <input type="text" id="email" name="email" placeholder="Enter Your Email" required>
    		                    <label for="adr"><i class="fas fa-address-card" style="color: #6ab04c"></i> Address</label>
    		                    <input type="text" id="adr" name="address" placeholder="Enter Your Address" required>
    		                    <label for="city"><i class="far fa-building" style="color: #6ab04c"></i> City</label>
    		                    <input type="text" id="city" name="city" placeholder="Enter Your City" required>
    		                    <div class="checkoutrow">
    		                        <div class="col-50">
    		                            <label for="state">State</label>
    		                            <input type="text" id="state" name="state" placeholder="Enter Your State" required>
    		                        </div>
    		                        <div class="col-50">
    		                            <label for="zip">Zip</label>
    		                            <input type="text" id="zip" name="zip" placeholder="Enter Zip/Postal Code" required>
    		                        </div>
    		                    </div>
    		                </div>
    		                <div class="col-50">
    		                    <h3 style="color: #6ab04c">Payment</h3>
    		                    <label for="fname">Accepted Cards</label>
    		                    <div class="icon-container">
    		                        <i class="fab fa-cc-visa" style="color:navy; font-size: 50px;"></i>
    		                        <i class="fab fa-cc-amex" style="color:blue; font-size: 50px;"></i>
    		                        <i class="fab fa-cc-mastercard" style="color:red; font-size: 50px;"></i>
    		                        <i class="fab fa-cc-discover" style="color:orange; font-size: 50px;"></i><br>
									<input type="checkbox"> <i class="fas fa-money-bill-wave" style="color: #6ab04c; font-size: 20px"></i>Cash On Delivery!
    		                    </div>
    		                    <label for="cname">Name on Card</label>
    		                    <input type="text" id="cname" name="cardname" placeholder="User Name" required>
    		                    <label for="ccnum">Credit card number</label>
    		                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
    		                    <label for="expmonth">Exp Month</label>
    		                    <input type="text" id="expmonth" name="expmonth" placeholder="Month" required>
    		                    <div class="checkoutrow">
    		                        <div class="col-50">
    		                            <label for="expyear">Exp Year</label>
    		                            <input type="text" id="expyear" name="expyear" placeholder="Year" required>
    		                        </div>
    		                        <div class="col-50">
    		                            <label for="cvv">CVV</label>
    		                            <input type="text" id="cvv" name="cvv" placeholder="CVV Code" required>
    		                        </div>
    		                    </div>
    		                </div>
    		            </div>
    		            <input type="submit" value="Ship Order Now!" class="btn">
    		        </form>
    		    </div>
    		</div>
		</div>
    </div>
    <footer class="tm-footer text-center">
	    <p>Copyright &copy; Ahmad Bakkar | 2021</p>
        <p>Follow Us On Social Media!</p>
        <div class="tm-contact-social">
	    	<a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook    tm-social-icon"></i></a>
	    	<a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
	    	<a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram   tm-social-icon"></i></a>
	    </div>
	</footer>
    <script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
</body>
</html>