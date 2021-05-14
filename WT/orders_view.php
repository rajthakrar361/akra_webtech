<!DOCTYPE html>
<html lang="en">
  <head>
  	<script src="https://kit.fontawesome.com/def7e83213.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link rel="stylesheet" href="assets/stylesheets/aefi.css">
    <meta charset="utf-8">
   <title>Akra Vaccine Administrator - Report AEFI</title>
    <link rel="icon" href="syringe.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
      footer{
        
        bottom: 0;
      }
    </style>
  </head>

  <body>
   <?php

    $connection = new mysqli('localhost','root','root','akra');
    if($connection->connect_error){
      die('Connection Failed : '.$connection->connect_error);
    }
  ?>
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

    <div style="text-align: center;" class="heading">
      <h1>Vaccine Orders</h1>
    </div>

    <div style="text-align: center;" class="">
      <table class="col-12 table table-bordered table-striped table-hover">
        <thead class="thead-dark">
          <tr class="">
            <th>Serial</th>
            <th>Name</th>
            <th>Quantity Required</th>
            <th>Stock Available</th>
            <th>Email</th>
            <th>Daily immunisation capacity</th>
            <th>Address</th>
            <th>Order Date/Time</th>
          </tr>
        </thead>
        <tbody class="">
          <?php  
            $sql = "SELECT * FROM vaccination_center";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              $serial = 1;
              while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$serial."</td><td>".$row['name']."</td><td>".$row['order_quantity']."</td><td>".$row['stock_available']."</td><td>".$row['email']."</td><td>".$row['daily_capacity']."</td><td>".$row['address']."</td><td>".$row['created']."</td>
          </tr>";
          $serial++;
              }
            } else {
              echo "<tr><td colspan='6'>No Orders reported yet</td></tr>";
            }
          ?>
          
        </tbody>
      </table>
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
