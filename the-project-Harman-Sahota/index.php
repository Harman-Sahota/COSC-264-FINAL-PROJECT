 <!--
Resources Used:
https://www.youtube.com/watch?v=umb3XZpVMiU
http://html-tuts.com/make-sidebar-same-height-as-content-div/
lab11 of this course
https://uigradients.com/
https://www.digi77.com/ways-to-sanitize-data-and-prevent-sql-injections-in-php/
lab 6 
 -->
 <!DOCTYPE html>
 <html>
 <head>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="index.js"></script>
  <link rel="stylesheet" type="text/css" href="index.css"> <!-- linked css file -->
  <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
  $(document).ready(function(){
    setInterval(function() {
            $("#time").load("http://cosc499.ok.ubc.ca/currentTime.php").css({"margin-top":"15%","margin-left":"7%","font-weight":"bold","font-size":"2em"});
        }, 1000);
  });
  </script>
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
<div class="img-fluid title_image"></div>
<h2 class="subtitle">Biggest Book Collection in Kelowna</h2> 
<div class="bodyContainer">
<div class="sidebar">
<br>
<form method="POST" name="search_form" onsubmit="return validateForm()">
<h5>Search:</h4>
<input type="text" name="Search" class="search" id="search"  placeholder="Search..">
<br><br>
Filter by:<br><br>
<select  name="Category" id="dropdown">
    <option value="None">None</option>
    <option value="Title">Title</option>
    <option value="Author">Author</option>
    <option value="Category">Category</option>
</select>
  <br><br>
<button type="submit" name="submit" onclick ="return validateForm()" class="btn btn-dark">Submit</button>
</form><br>
<h7>Current Time:</h7>
<div id="time">

</div>
<br>
<div class="box">
<?php
$host = "cosc499.ok.ubc.ca";
$database = "db_project";
$user = "WebUser";
$password = "9UcM0QQcK1BwAXLk";
$firstname1 = "";
$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
$sql = "SELECT bookcategories.CategoryName, count(bookcategoriesbooks.CategoryID) AS counter FROM bookcategories,bookcategoriesbooks
 WHERE bookcategoriesbooks.CategoryID = bookcategories.CategoryID GROUP BY bookcategories.CategoryName ORDER BY counter DESC";;
 $results = mysqli_query($connection, $sql);
 echo "<h7 style='font-weight:bold'>Category wise books:</h7><br>";
      while ($row = mysqli_fetch_assoc($results))
    {
      $name = $row['CategoryName'];
      $count = $row['counter'];
      echo "$name &nbsp; ($count)<br/>";
    }
  }
 ?>
 </div>
</div>

<div class="container">
<?php
$host = "cosc499.ok.ubc.ca";
$database = "db_project";
$user = "WebUser";
$password = "9UcM0QQcK1BwAXLk";
$firstname1 = "";
$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['submit'])){
    $getfilter = $_POST['Category'];
    $getsearch = $_POST['Search'];
}
$getsearch = filter_var($getsearch,FILTER_SANITIZE_STRING);
//no filter
if(isset($getsearch) && $getsearch!=NULL && isset($getfilter) && $getfilter =='None'){
    
    $sql = "SELECT * FROM bookdescriptions INNER JOIN bookcategoriesbooks ON bookdescriptions.ISBN = bookcategoriesbooks.ISBN INNER JOIN bookauthorsbooks ON 
    bookcategoriesbooks.ISBN = bookauthorsbooks.ISBN INNER JOIN bookauthors ON bookauthorsbooks.AuthorID = bookauthors.AuthorID INNER JOIN bookcategories 
    ON bookcategoriesbooks.CategoryID = bookcategories.CategoryID WHERE (title LIKE '%$getsearch%') OR (CategoryName LIKE '%$getsearch%') OR 
    (nameF LIKE '%$getsearch%') OR (nameL LIKE '%$getsearch%');";
    
     $results = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($results))
    {
        $ISBN = $row['ISBN'];
        $title = $row['title'];
        $fname = $row['nameF'];
        $lname = $row['nameL'];
        $description = $row['description'];;
       echo '<div class="search" style="margin-top:1%;margin-left:3%;">';
       echo "<a href='product.php?title=$title' style=' text-decoration: none;color: #222222;'><b>$title</b></a>";
        echo "<br/>";
     echo "by <a href='authorlink.php?firstname1=$fname&lastname1=$lname'  style=' text-decoration: none;color: blue;font-size:12px'><b><i>$fname $lname</b></i> </a>";
      echo "<br/>";
       echo "<img src = 'img/$ISBN.THUMB.jpg' style='float:left;'><br/><br/><br/><br/>";
        echo "<p><i>Description of $title : <br></i></p>$description<br/><br/>";
         echo "<a href='product.php?title=$title' style=' text-decoration: none;color: blue;'><b>More Info on this book</b></a>";
      echo '</div>';
    }
}

//filter by title
if(isset($getsearch) && $getsearch!=NULL && isset($getfilter) && $getfilter =='Title'){
    
    $sql = "SELECT * FROM bookdescriptions INNER JOIN bookcategoriesbooks ON bookdescriptions.ISBN = bookcategoriesbooks.ISBN INNER JOIN bookauthorsbooks ON 
    bookcategoriesbooks.ISBN = bookauthorsbooks.ISBN INNER JOIN bookauthors ON bookauthorsbooks.AuthorID = bookauthors.AuthorID INNER JOIN bookcategories 
    ON bookcategoriesbooks.CategoryID = bookcategories.CategoryID WHERE (title LIKE '%$getsearch%');";
    
     $results = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($results))
    {
        $ISBN = $row['ISBN'];
        $title = $row['title'];
        $fname = $row['nameF'];
        $lname = $row['nameL'];
        $description = $row['description'];
       echo '<div class="search" style="margin-top:2%;margin-left:3%;">';
       echo "<a href='product.php?title=$title' style=' text-decoration: none;color: #222222;'><b>$title</b></a>";
        echo "<br/>";
     echo "by <a href='authorlink.php?firstname1=$fname&lastname1=$lname' style=' text-decoration: none;color: blue;font-size:12px'><b><i>$fname $lname</b></i> </a>";
      echo "<br/>";
       echo "<img src = 'img/$ISBN.THUMB.jpg' style='float:left;'><br/><br/><br/><br/>";
        echo "<p><i>Description of $title : <br></i></p>$description<br/><br/>";
         echo "<a href='product.php?title=$title' style=' text-decoration: none;color: blue;'><b>More Info on this book</b></a>";
      echo '</div>';
    }
}

//filter by author
if(isset($getsearch) && $getsearch!=NULL && isset($getfilter) && $getfilter =='Author'){
    
    $sql = "SELECT * FROM bookdescriptions INNER JOIN bookcategoriesbooks ON bookdescriptions.ISBN = bookcategoriesbooks.ISBN INNER JOIN bookauthorsbooks ON 
    bookcategoriesbooks.ISBN = bookauthorsbooks.ISBN INNER JOIN bookauthors ON bookauthorsbooks.AuthorID = bookauthors.AuthorID INNER JOIN bookcategories 
    ON bookcategoriesbooks.CategoryID = bookcategories.CategoryID WHERE (nameF LIKE '%$getsearch%') OR (nameL LIKE '%$getsearch%');";
    
     $results = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($results))
    {
        $ISBN = $row['ISBN'];
        $title = $row['title'];
        $fname = $row['nameF'];
        $lname = $row['nameL'];
        $description = $row['description'];;
       echo '<div class="search" style="margin-top:2%;margin-left:3%;">';
       echo "<a href='product.php?title=$title' style=' text-decoration: none;color: #222222;'><b>$title</b></a>";
        echo "<br/>";
     echo "by <a href='authorlink.php?firstname1=$fname&lastname1=$lname' style=' text-decoration: none;color: blue;font-size:12px'><b><i>$fname $lname</b></i> </a>";
      echo "<br/>";
       echo "<img src = 'img/$ISBN.THUMB.jpg' style='float:left;'><br/><br/><br/><br/>";
        echo "<p><i>Description of $title : <br></i></p>$description<br/><br/>";
        echo "<a href='product.php?title=$title' style=' text-decoration: none;color: blue;'><b>More Info on this book</b></a>";
      echo '</div>';
    }
}

//filter by category
if(isset($getsearch) && $getsearch!=NULL && isset($getfilter) && $getfilter =='Category'){

  
    $sql = "SELECT * FROM bookdescriptions INNER JOIN bookcategoriesbooks ON bookdescriptions.ISBN = bookcategoriesbooks.ISBN INNER JOIN bookauthorsbooks ON 
    bookcategoriesbooks.ISBN = bookauthorsbooks.ISBN INNER JOIN bookauthors ON bookauthorsbooks.AuthorID = bookauthors.AuthorID INNER JOIN bookcategories 
    ON bookcategoriesbooks.CategoryID = bookcategories.CategoryID WHERE (CategoryName LIKE '%$getsearch%');";
    
     $results = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($results))
    {
        $ISBN = $row['ISBN'];
        $title = $row['title'];
        $fname = $row['nameF'];
        $lname = $row['nameL'];
        $description = $row['description'];;
       echo '<div class="search" style="margin-top:2%;margin-left:3%;">';
       echo "<a href='product.php?title=$title' style=' text-decoration: none;color: #222222;'><b>$title</b></a>";
        echo "<br/>";
     echo "by <a href='authorlink.php?firstname1=$fname&lastname1=$lname'  style=' text-decoration: none;color: blue;font-size:12px'><b><i>$fname $lname</b></i> </a>";
      echo "<br/>";
       echo "<img src = 'img/$ISBN.THUMB.jpg' style='float:left;'><br/><br/><br/><br/>";
        echo "<p><i>Description of $title : <br></i></p>$description<br/><br/>";
         echo "<a href='product.php?title=$title' style=' text-decoration: none;color: blue;'><b>More Info on this book</b></a>";
      echo '</div>';
    }
}
}
}

?>
</div></div>
<footer class="foot">
<span>Harmans Book Store <br>
1323 International Mews V1V 1V8 Kelowna BC <br>
phone number - 778-288-3446<br>
email : 10harmansahota@gmail.com<br>
Copyright &copy; 2020 by Harman's Book Store<br> </span>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
         <script>
function validateForm() {
    var x = document.forms["search_form"]["Search"].value;
    if (x == "" || x == NULL) {
        alert("Search Field must be filled out");
        return false;
    }

}
  </script>

</body>
</html>