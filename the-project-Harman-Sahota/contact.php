
<!DOCTYPE html>
 <html>
 <head>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="index.js"></script>
  <link rel="stylesheet" href="contact.css" /> <!-- linked css file -->
  <link rel="stylesheet" href="validate.css" /> <!-- linked css file -->
  <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   <!--<script type="text/javascript" src="contact.js"></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
      <header id = "masthead">
<nav>
  <ul>
            <li class="left"><img src="img/mylogo.svg" class="img-fluid" alt="logo"><span>Harman's Book Store</span></li>
            <li class="right "><a href="contact.php">Contact Us</a></li>
            <li class="right active"><a href="index.php">Home</a></li>
         </ul>
</nav>
</header>
</head>
<body>
<form method="POST" action="processcontact.php" id="contactForm" style= 'padding:1em' >
<div class="form-group row start">
    <label for="fname" class="col-sm-2 col-form-label ">First&nbsp;Name*: </label>
    <div class="col-7">
      <input type="text" class="form-control highlightable required" name="fname" placeholder="Eg. John"><br>
      <?php
           if(isset($signup)&&$signup == 'fname'){
             echo "this field cannot be empty";
           }
      ?>
    </div>
  </div><br>
  <div class="form-group row ">
    <label for="lname" class="col-sm-2 col-form-label ">Last&nbsp;Name*: </label>
    <div class="col-7">
      <input type="text" class="form-control highlightable required" name="lname" placeholder="Eg. Smith">
    </div>
  </div><br>
  <div class="form-group row ">
    <label for="address" class="col-sm-2 col-form-label ">Address*: </label>
   <div class="col">
      <input type="text" class="form-control highlightable required" name="address1" placeholder="Eg. 1323 International Mews">
    </div>
  </div><br>
   <div class="form-group row ">
    <label for="address2" class="col-sm-2 col-form-label ">Address2: </label>
   <div class="col">
      <input type="text" class="form-control highlightable" name="address2" placeholder="Street Number,Apartment Number,Unit">
    </div>
  </div><br>
  <div class="form-group row ">
    <label for="city" class="col-sm-2 col-form-label ">City*: </label>
   <div class="col-7">
      <input type="text" name="city"class="form-control highlightable required" placeholder="Eg. Kelowna">
    </div></div><br>
    <div class="form-group row ">
    <label for="state" class="col-sm-2 col-form-label ">State*: </label>
    <div class="col-7">
      <input type="text" name = "state" class="form-control highlightable required" placeholder="Eg. BC">
    </div></div><br>  
    <div class="form-group row ">
    <label for="zip" class="col-sm-2 col-form-label ">Pin*: </label>
    <div class="col-7">
      <input type="text" name = "zip" class="form-control highlightable required" placeholder="Eg. V1V 1V8">
    </div>
  </div><br>
  <div class="form-group row ">
    <label for="country" class="col-sm-2 col-form-label ">Country*: </label>
    <div class="col-7">
      <input type="text" name= "country" class="form-control highlightable required" placeholder="Eg. Canada">
    </div>
  </div><br>
  <div class="form-group row ">
    <label for="phone" class="col-sm-2 col-form-label  ">Phone&nbsp;No.: </label>
    <div class="col-7">
      <input type="text" name = "phone" class="form-control highlightable" placeholder="Eg. +17785941636">
    </div>
  </div><br>
  <div class="form-group row ">
    <label for="email" class="col-sm-2 col-form-label">Email&nbsp;ID*: </label>
    <div class="col-7">
      <input type="email" name = "email" class="form-control highlightable required" placeholder="abc@xyz.com">
    </div>
  </div><br>
  <div class="form-group">
  <label for="comment">Message*:</label>
  <textarea class="form-control required" rows="5" name="comment" id="comment"></textarea>
</div><br>

<button type="submit" id="submit" class="btn btn-dark"  name="submit_form">Submit</button><br><br><br>
<hr>
</form>

<footer class="foot">
<span>Harmans Book Store <br>
1323 International Mews V1V 1V8 Kelowna BC <br>
phone number - 778-288-3446<br>
email : 10harmansahota@gmail.com<br>
Copyright &copy; 2020 by Harman's Book Store<br> </span>
</footer>

</body>
</html>
