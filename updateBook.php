<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. This code connects to the library database and runs
and SQL query to update an existing record. It prints to the
page whether or not the query was successful.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<html>
 <head>
  <title>Update Book</title>
 </head>
 <body>
 <h1>Update Book</h1>
	<?php

 if (empty($_GET['BookID'])||
     empty($_GET['ISBN'])||
	 empty($_GET['Title'])||
	 empty($_GET['Author'])||
	 empty($_GET['Booktype'])||
	 empty($_GET['Price']))
		die("The form was incomplete: Unable to edit selected book");

 $bookID = $_GET['BookID'];
 $ISBN = trim($_GET['ISBN']);
 $title = trim($_GET['Title']);
 $author = $_GET['Author'];
 $bookType = trim($_GET['Booktype']);
 $price = trim($_GET['Price']);

 require 'dbConnectLibrary.php'; 
 $sql = "UPDATE books SET BookID = '$bookID', ISBN = '$ISBN', Title = '$title', Author = '$author', Booktype = '$bookType', Price = $price WHERE BookID = $bookID";
 //echo $sql;
 $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));
 $numrows = mysqli_affected_rows($conn);

 if ($numrows == 1)
	echo "<h2>$title was successfully updated! Updated $numrows book in the database.</h2>";
 else
	echo "update failed. $numrows were updated"; 
 ?>
 <br><br>
 <a href="addNewBook.php">Add New Book</a>
 <a href="JohnMeyer.html">Return</a>
 </body>
</html>
