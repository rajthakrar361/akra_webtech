<!DOCTYPE html>
<html lang="en">
  <head>
  	<script src="https://kit.fontawesome.com/def7e83213.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link rel="stylesheet" href="assets/stylesheets/aefi.css">
    <meta charset="utf-8">
    <script src="assets/script.js">

    </script>
    <script src="assets/aefi.js">

    </script>

    <title>Akra Vaccine Administrator - Report AEFI</title>
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
      <h1>AEFI - Adverse Events Following Immunization</h1>
    </div>

    <div class="content">
      <h2>What is AEFI?</h2>
        <p>
          An Adverse event following immunization (AEFI) is any untoward medical occurrence
          which follows immunization and which does not necessarily have a causal relationship
           with the usage of the vaccine. The adverse event may be any unfavourable or unintended sign,
          abnormal laboratory finding, symptom or disease. Reported adverse events can either be true adverse events,
          i.e. actually a result of the vaccine or immunization process, or coincidental events that are not due to
          the vaccine or immunization process, but are temporally associated with immunization.
        </p>
    </div>

    <div class="placeOrderForm">
      <h2>Report AEFI</h2>
      <hr>
<?php

if(isset($_POST['submit'])){
$fname = $_POST['fname'];
  $gender = $_POST['gender'];
  $birth_date = $_POST['birth_date'];
  $age = $_POST['age'];
  $age_group = $_POST['age_group'];
  $vac_date = $_POST['vac_date'];
  $aadhar = $_POST['aadhar'];
  $phone1 = $_POST['phone1'];
  $phone2 = $_POST['phone2'];
  $address = $_POST['address'];
  $effects = $_POST['effects'];
  if($phone2 == ""){
    $phone2 = 'null';
  }
  if($age == ""){
    $age = 0;
  }
  $connection = new mysqli('localhost','root','root','akra');
  if($connection->connect_error){
    die('Connection Failed : '.$connection->connect_error);
  }
  else{

    $sql = "INSERT INTO aefi(name, gender, birth_date, age, age_group, vaccination_date, aadhar_number, contact_1, contact_2, address, symptoms) values('".$fname."', '".$gender."', '".$birth_date." 00:00:00', ".$age.", '".$age_group."', '".$vac_date." 00:00:00', ".$aadhar.", ".$phone1.", ".$phone2.", '".$address."', '".$effects."')";
    if ($connection->query($sql) == TRUE) {
      echo "<h3>AEFI reported sucessfully!</h3>";
    } else {
          //echo "Error: " . $sql . "<br>" . $connection->error;
    }
    //$stmt->close();
    $connection->close();
  }
}
?>
      <form class="formClass" method="post">

        <span class="fname_l" >
        	<label for="fname">Your Name<span style="color: red">*</span></label>
        </span><br>

        <input class="fname" type="text" name="fname" id="fname" required>
        

        <br><br>

        <span class="gender">
        	<label for="gender">Gender<span style="color: red">*</span></label>
        	<br>
        	
        	<input type="radio" required="required" name="gender" value="m">
        	<label for="male">Male</label>

        	
        	<input type="radio" required="required" name="gender" value="f">
        	<label for="female">Female</label>

        	
        	<input type="radio" required="required" name="gender" value="o">
        	<label for="others">Others</label>
        </span>

        <br><br>

        <div >
            <label for="birth_date">Birth Date: <span style="color: red">*</span></label>
            <input type="date" id="birth_date" name="birth_date" oninput="ageCalculator()" required>
        </div>
        <br>

        <table>
          <td>
            <label for="age">Age</label>
            <br>
            <input id="age" required class="age"  min="1" max="200" name="age" readonly>
            <br><br>
          </td>

          <td class="td2">
            <label for="age_group">Age Group</label>
            <br>
            <input id="age18" type="radio" name="age_group" value="18-45">
            <label for="ag1">18-45</label>
            <br>
            <input id="age45" type="radio" name="age_group" value="45+">
            <label for="ag2">45+</label>
            <br><br>
          </td>

        </table>

        <label for="vac_date">Vaccination Date<span style="color: red">*</span></label>
        <br>
        <input class="vac_date" type="date" name="vac_date" id="vac_date">
        <br>
        <br>

        <label for="aadhar">Aadhar Number<span style="color: red">*</span></label>
        <br>
        <input class="aadhar" pattern="[0-9]{12}" type="number" name="aadhar" id="aadhar" value="" placeholder="12 digit aadhar number" required>
        <br>
        <br>

        <span class="phone1_l" ><label for="phone1">Contact Number 1<span style="color: red">*</span></label></span>
        <span class="phone2_l" ><label for="phone2">Contact Number 2</label></span>
        <br>
        <input class="phone1" pattern="[0-9]{10}" type="tel" name="phone1" value="" placeholder="10 digit phone number" required>
        <input class="phone2" pattern="[0-9]{10}" type="tel" name="phone2" value="">
        <br>
        <br>

        <label for="address">Address <span style="color: red">*</span></label>
        <br>
        <textarea class="address" name="address" rows="8" cols="80"></textarea required>
        <br>
        <br>

        <label for="effects">Symptoms <span style="color: red">*</span></label>
        <br>
        <textarea class="effects" name="effects" rows="8" cols="80"></textarea required>
        <br><br>
        
        <input class="btn" type="reset" name="reset" value="Reset">
        <input style="margin-left: 5px;"class="btn" type="submit" name="submit" value="Submit">

      </form>
    </div>

    <div id="linkage">
      <h1><a href="aefi_view.php" style="color: #52734d; font-size: 20px; font-family: Varela, serif; ">Click here to view all reported AEFI's </a></h1>
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