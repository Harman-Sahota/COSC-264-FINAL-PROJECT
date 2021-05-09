<!DOCTYPE html>
<html>
    <head>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="index.js"></script>
 <link rel="stylesheet" href="processcontact.css" /> <!-- linked css file -->
  <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     <h2 style='margin-top:10%;text-align:center;'>Thanks We will get in touch soon!</h2>
     <h3 style='text-align:center;'>Heres the info filled by you: </h3>
     <div class = "display info">
<?php
 function StringInputCleaner($data)
{
	//remove space bfore and after
	$data = trim($data); 
	//remove slashes
	$data = stripslashes($data); 
	$data=(filter_var($data, FILTER_SANITIZE_STRING));
	return $data;
}	
if(isset($_POST['fname'])){
   $fname =  $_POST['fname'];
   $fname = StringInputCleaner($fname);

    echo "<p><b>first name:</b> $fname</p>";
}else if(strcmp($_POST['fname'],$empty)==0){
  header("contact.php?signup=fname");
  exit();
}
if(isset($_POST['lname'])){
   $lname =  $_POST['lname'];
      $lname = StringInputCleaner($lname);
    echo "<p><b>last name:</b> $lname</p>  ";
}
if(isset($_POST['address1'])){
   $a1 =  $_POST['address1'];
      $a1 = StringInputCleaner($a1);
    echo "<p><b>address1:</b> $a1</p>  ";
}
if(isset($_POST['address2'])){
   $a2 =  $_POST['address2'];
     $a2 = StringInputCleaner($a2);
    echo "<p><b>address1:</b> $a2</p>  ";
}
if(isset($_POST['city'])){
   $city =  $_POST['city'];
     $city = StringInputCleaner($city);
    echo "<p><b>city:</b> $city</p>  ";
}
if(isset($_POST['state'])){
   $state =  $_POST['state'];
     $state = StringInputCleaner($state);
    echo "<p><b>state:</b> $state</p>  ";
}
if(isset($_POST['zip'])){
   $zip =  $_POST['zip'];
     $zip = StringInputCleaner($zip);
    echo "<p><b>zip:</b> $zip</p>  ";
}
if(isset($_POST['country'])){
   $country =  $_POST['country'];
     $country = StringInputCleaner($country);
    echo "<p><b>country:</b> $country</p>  ";
}
if(isset($_POST['phone'])){
   $phone =  $_POST['phone'];
     $phone=(filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
    echo "<p><b>phone:</b> $phone</p>  ";
}
if(isset($_POST['email'])){
   $email =  $_POST['email'];
   $email=(filter_var($email,  FILTER_SANITIZE_EMAIL));
    echo "<p><b>email:</b> $email</p>  ";
}
if(isset($_POST['comment'])){
    
   $comment =  $_POST['comment'];
   $comment = StringInputCleaner($comment);
    echo "<p><b>message:</b> $comment</p><br>  ";
}
 $host = "localhost";
    $database = "school_project";
    $user = "root";
    $password = "";
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();

    if($error != null)
    {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
    }
    else
    {
        // ran this in my phpmyadmin
        //CREATE TABLE contact(first_name CHAR(15),last_name CHAR(15),address_1 CHAR(100),address_2 CHAR(100),city CHAR(16),
        //state_ CHAR(16),zip VARCHAR(7),country CHAR(15),phone INTEGER(11),email CHAR(100),comment TEXT(800));
        $sql = "INSERT into contact(first_name,last_name,address_1,address_2,city,state_,zip,country,phone,email,comment) 
        VALUES('$fname','$lname','$a1','$a2','$city','$state','$zip','$country','$phone','$email','$comment');";
        if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
        //sanitize data
}
?>
</div>
<a href="index.php">Go Back to Home</a>
<br><br>
<footer class="foot">
<span>Harmans Book Store <br>
1323 International Mews V1V 1V8 Kelowna BC <br>
phone number - 778-288-3446<br>
email : 10harmansahota@gmail.com<br>
Copyright &copy; 2020 by Harman's Book Store<br> </span>
</footer>
</body>
</html>
