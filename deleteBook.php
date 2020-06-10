<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. This code connects to the library database, runs an
SQL query that deletes an existing record, then displays
whether or not the query was successful.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<html>
 <head>
  <title>Delete Books</title>
 </head>
 <body>
 <h1>Delete Book</h1>
 <?php

 if (empty($_GET['BookID']))
 die("Error retrieving information: Book not deleted");

 $bookID = $_GET['BookID'];
 
 require 'dbConnectLibrary.php';
 $sql = "SELECT * FROM books WHERE BookID = $bookID";
 $arrResult = mysqli_query($conn, $sql) or die("Unable to retrieve information! ".mysqli_error($conn));
 while ($row = mysqli_fetch_array($arrResult))
 {
	$bookID = $row[0];
    $ISBN = $row['ISBN'];
    $title = $row['Title'];
	$author = $row['Author'];
	$bookType = $row['Booktype'];
    $price = $row['Price'];
 }
 
 require 'dbConnectLibrary.php'; 
 $sql = "DELETE FROM books WHERE BookID = $bookID";
//echo $sql
 $result = mysqli_query($conn, $sql) or die("Book was not deleted. ".mysqli_error($conn));
 $numrows = mysqli_affected_rows($conn);

 if ($numrows == 1){
 echo "<h2>$title was successfully deleted! Deleted $numrows book from the database. </h2>";
 }
 else{
 echo "<h2>delete failed. $numrows were deleted</h2>";
 }

 mysqli_close($conn);
 ?>
 <a href="addNewBook.php">Add New Book</a>
 <a href="JohnMeyer.html">Return</a>
 </body>
</html>
