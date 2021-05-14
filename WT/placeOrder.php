<!DOCTYPE html>
<html lang="en">
  <head>
  	<script src="https://kit.fontawesome.com/def7e83213.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link rel="stylesheet" href="assets/stylesheets/placeOrder.css">
    <meta charset="utf-8">

    <title>Akra Vaccine Administrator - Place order</title>
    <link rel="icon" href="syringe.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
  </head>

  <body>

    <header>
        <nav>
          <a href="index.html"><span class="logo" style="float: left">AKRA</span></a>
          <a class="goi" href="index.html">Akra Institute Of India</a>
          <span class="CS"><a target="_self" href="corona.html"><i class="fas fa-book-medical"></i> Covid-19</a></span>
          <span><a target="_self" href="aefii.php"><i class="fas fa-diagnoses"></i> Report AEFI</a></span>
          <span><a target="_self" href="placeOrder.php"><i class="fas fa-people-carry"></i> Place Order</a></span>
          <span><a target="_self" href="aboutUs.html"><i class="fab fa-weixin"></i> About us</a></span>
          <span><a target="_self" href="index.html"><i class="fas fa-home"></i> Home</a></span>
        </nav>
    </header>

    <div class="heading">
      <h1>Place Order</h1>
    </div>



    <div class="placeOrderForm">
    
    <?php
    if(isset($_POST['submit']))
    {
    $org = $_POST['org'];
    $order_quantity = $_POST['order_quantity'];
    $stock = $_POST['stock'];
    $capacity = $_POST['capacity'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    $conn = new mysqli('localhost','root','root','akra');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $sql = "INSERT INTO vaccination_center(name, order_quantity, stock_available, daily_capacity,email, address) values ('".$org."', ".$order_quantity.", ".$stock.", ".$capacity.", '".$email."', '".$address."')";

        if ($conn->query($sql) == TRUE) {
            echo "<h3>We have recieved your order. Please check your email for order confirmation.</h3>";
        } 
        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        //$stmt->close();
        $conn->close();
    }
	}
?>
      <form class="formClass" method="post">

        <label for="org">Vaccine Center Name<span style="color: red">*</span></label>
        <br>
        <input class="org" type="text" name="org" value="" required>
        <br>
        <br>

        <label for="stock">Vaccine Stock Already Available<span style="color: red">*</span></label>
        <br>
        <input class="stock" pattern="[0-9]{*}" type="text" name="stock" value="" required>
        <br>
        <br>

        <label for="capacity">Daily Vaccine Administration Capacity<span style="color: red">*</span></label>
        <br>
        <input class="capacity" type="text" name="capacity" value="" required>
        <br>
        <br>

        <label for="order_quantity">Order Quantity Required<span style="color: red">*</span></label>
        <br>
        <input class="order_quantity" type="text" name="order_quantity" value="" required>
        <br>
        <br>

        <label for="email">Contact Email Address<span style="color: red">*</span></label>
        <br>
        <input class="email" type="email" name="email" required>
        <br><br>

        <label for="address">Delivery Address<span style="color: red">*</span></label>
        <br>
        <textarea class="address" name="address" rows="8" cols="80"></textarea required>
        <br>
        <br>

        <input class="btn" type="reset" name="reset" value="Reset">
        <input style="margin-left: 5px;"class="btn" type="submit" name="submit" value="Submit">
      </form>
      <br>
    </div>

    <div id="linkage">
      <h1><a href="orders_view.php" style="color: #52734d; font-size: 20px; font-family: Varela, serif;">Click here to view all the queued orders</a> </h1>
    </div>

    <footer>
    	<div class="social-media">
        <a class="instagram" target="_blank" href = "https://www.instagram.com/"><i class="fab fa-instagram fa-2x"></i></a>
    		<a class="twitter" target="_blank" href="https://twitter.com/MoHFW_INDIA"><i class="fab fa-twitter fa-2x"></i></a>
    		<a class="linkedin" target="_blank" href="https://linkedin.com"><i class="fab fa-linkedin-in fa-2x"></i></a>
        <a class="linkedin" target="_blank" href="https://facebook.com"><i class="fab fa-facebook fa-2x"></i></a>
    		<br><br>
    	</div>

    	<div class="emailx">
        	<p><a class="email" href="mailto:raj.thakrar030601@gmail.com?subject=Help%20and%20support" target="_blank">Email us for any help </a></p>
    	</div>

    	<hr>
    	<small>&copy; Copyright 2021. Akra Institute of India Legal Disclaimer</small>
    </footer>

  </body>
</html>
