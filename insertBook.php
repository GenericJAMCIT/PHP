<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. This code connects to the library database, send an
SQL query to insert the new record into the database, then
displays whether or not the insert was successful.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<html>
 <head>
  <title>Insert Book</title>
 </head>
 <body>
 <h1>Insert Book</h1>
 <?php 
 if (!empty($_GET['ISBN'])
	&& !empty($_GET['Title'])
	&& !empty($_GET['Author'])
	&& !empty($_GET['Booktype'])
	&& !empty($_GET['Price']))

 { 

	 $bookID = ('BookID');
	 $ISBN = trim($_GET['ISBN']);
	 $title = trim($_GET['Title']);
	 $author = trim($_GET['Author']);
	 $bookType = trim($_GET['Booktype']);
	 $price = trim($_GET['Price']);

	 if (empty($bookID) || empty($ISBN) || empty($title) || empty($author) || empty($bookType) || empty($price))
		die("One or more of the required fields was not supplied.");
	 else
	 {
		 require 'dbConnectLibrary.php'; 
		 $sql = "INSERT INTO books (BookID, ISBN, Title, Author, Booktype, Price) VALUES ('$bookID', '$ISBN', '$title', '$author', '$bookType', $price)";
                 //echo "$sql";
		 $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));
		 $numrows = mysqli_affected_rows($conn);
		 if ($numrows == 1)
		 echo "<h2>$title was successfully added to the database. Inserted $numrows new book into the database.</h2>";
		 else
		 echo "Unable to add $title to the database. $numrows were affected"; 
	 }
 }
 else
 {
	die("You must supply the product name and product description");
 }
 ?>
 <br><br>
 <a href="addNewBook.php">Add New Book</a>
 <a href="JohnMeyer.html">Return</a>
 </body>
</html>
