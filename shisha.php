<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ahmadbakkar db');
 
if(isset($_POST["add_to_cart"]))
{
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
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shisha_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shisha_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="shisha.php"</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>AhmadBakkar | TobaccoPage</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"  crossorigin="anonymous">
	    <link href="css/all.min.css" rel="stylesheet" />
	    <link href="css/templatemo-style.css" rel="stylesheet" />
    </head>
    <body>
    <div class="container">
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/tobacco3.webp">
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
			<h1 class="col-12 text-center tm-section-title">Our <strong>Products</strong></h1>
			<p class="col-12 text-center"></p>
		</header>
        <div class="row tm-gallery">
			<div id="tm-gallery-page-pizza" class="tm-gallery-page">
                <?php
					$query = "SELECT * FROM shishaproducts ORDER BY id ASC";
					$result = mysqli_query($con, $query);
					if(mysqli_num_rows($result) > 0)
					{
                    	while($row = mysqli_fetch_assoc($result))
                    	{
                ?>
				<form method="post" action="shisha.php?action=add&id=<?php echo $row["id"]; ?>">
			    	<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
			    		<img src="<?php echo $row['ImageSrc']; ?>" class="img-fluid tm-gallery-img" style="width: 200px; height: 200px;"/>
			    		<figcaption>
			    			<h4 class="tm-gallery-title"><?php echo $row['Name']; ?></h4>
			    			<p class="tm-gallery-description"><?php echo $row['Description']; ?></p>
			    			<p class="tm-gallery-price" style="color: #6ab04c;"><?php echo $row['Price']; ?>,000 LBP</p>
							Qnt: <input type="number" value="1" style="width: 45px;" name="quantity" /> 
							<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />
 							<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
							<input type="submit" name="add_to_cart" class="btn btn-success" value="Add To Cart"></input>
						</figcaption>
                    </article>
				</form>
                <?php
                    	}
					}
                ?>
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
    </div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>