<!DOCTYPE html>
 <html>
 <head>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="index.js"></script>
  <link rel="stylesheet" type="text/css" href="product.css"> <!-- linked css file -->
  <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
      <header id = "masthead">
<nav>
  <ul>
            <li class="left"><img src="img/mylogo.svg" class="img-fluid" alt="logo"><span>My Book Store</span></li>
            <li class="right "><a href="contact.php">Contact Us</a></li>
            <li class="right active"><a href="index.php">Home</a></li>
         </ul>
</nav>
</header>



<?php

    $host = "cosc499.ok.ubc.ca";
    $database = "db_project";
    $user = "WebUser";
    $password = "9UcM0QQcK1BwAXLk";
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();

    if($error != null)
    {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
    }
    else
    {
        if(isset($_GET['title'])){
        $title = $_GET['title'];
        }
         $sql = "SELECT  DISTINCT * FROM bookdescriptions INNER JOIN bookcategoriesbooks ON bookdescriptions.ISBN = bookcategoriesbooks.ISBN INNER JOIN bookauthorsbooks ON 
        bookcategoriesbooks.ISBN = bookauthorsbooks.ISBN INNER JOIN bookauthors ON bookauthorsbooks.AuthorID = bookauthors.AuthorID INNER JOIN bookcategories 
        ON bookcategoriesbooks.CategoryID = bookcategories.CategoryID WHERE (title LIKE '%$title%') GROUP BY bookdescriptions.ISBN,bookauthors.nameL,
        bookauthors.nameF,bookdescriptions.title,bookdescriptions.description,bookdescriptions.price,bookdescriptions.publisher,bookdescriptions.pubdate
        ,bookdescriptions.edition,bookdescriptions.pages,bookcategories.CategoryName;";


     $results = mysqli_query($connection, $sql);
      $rows = mysqli_fetch_assoc($results);
      $description = $rows['description'];
      $ISBN = $rows['ISBN'];
       while ($row= mysqli_fetch_assoc($results)){
    
        
        $lname = $row['nameL'];
        $fname = $row['nameF'];
        $price = $row['price'];
        $publisher = $row['publisher'];
        $pubdate = $row['pubdate'];
        $edition = $row['edition'];
        $pages = $row['pages'];
        $categoryName = $row['CategoryName'];
       
        echo"<table class='table table-borderless'>";
        echo "<tr>";
          echo "<td><br><br><img src='img/$ISBN.MED.jpg' style='margin-top:40%;margin-left:10%;float:left'></td>";
           echo "<td><p style='margin-left:10%;margin-top:10%;font-weight:bold;font-size:2em'>$title</p><br>
           <p style = 'margin-left:10%;margin-top:-2%'>by<a href=# style ='text-decoration:none'> $fname $lname</a>,
           $publisher(publisher),$pubdate(publish date),$edition(edition),<br>$ISBN(ISBN),$pages(pages),$categoryName(category)
           <hr>
           </p>
           <p style='margin-left:10%;font-weight:bold;font-size:1.3em'>Price : $ $price<br></p>
           <p style = 'margin-top:4%;margin-left:10%'>$description</p>
          </td>";

        echo"</tr>";
        echo"</table>";
    
}
}
    
?>
<footer class="foot">
<span>Harmans Book Store <br>
1323 International Mews V1V 1V8 Kelowna BC <br>
phone number - 778-288-3446<br>
email : 10harmansahota@gmail.com<br>
Copyright &copy; 2020 by Harman's Book Store<br> </span>
</footer>
</body>
</html> 