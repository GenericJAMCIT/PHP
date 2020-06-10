<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. This page connects to the library's database,
sends the database an SQL query, then displays the retrieved
information.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<?php require 'dbConnectLibrary.php'; ?>
<html>
 <head>
  <title>John Meyer Library Search Results</title>
 <head>
 <body>
  <h1>Library Database Results</h1>
  <?php
   session_name('Library_login');         
   session_start();        
   if (empty($_SESSION['DisplayName']))
   {
      echo "Not $username? log in again."	;
	  echo "<a href=\"Library_LogOn.html\">log on</a>";
   }
   else
   {
      $username = $_SESSION['DisplayName'];
	  $exp = time();
      if ($exp > $_SESSION['expire']) 
	  {
       session_unset();
       echo "Your session has expired! <a href='Library_LogOn.html'>Login here</a>";
	  }
      else 
	  {
       echo "<h2>Welcome back $username.</h2>";
      }
   }
    if (empty($_GET['Booktype']))
    {
       die("Error retrieving data");
    }
    $booktype = $_GET['Booktype']; 

	switch ($booktype){
		case "A";
			$sql = "SELECT * FROM books";
			break;
		case "H";
			$sql = "SELECT * FROM `books` WHERE Booktype = 'H'";
			break;
		case "S";
			$sql = "SELECT * FROM `books` WHERE Booktype = 'S'";
			break;
		case "D";
			$sql = "SELECT * FROM `books` WHERE Booktype = 'D'";
			break;
	}
    $result = mysqli_query($conn,$sql) or die("Error searching - ".mysqli_error($conn));
    echo "<table border=1>";
    echo "<tr><td>ID</td><td>ISBN</td><td>Title</td><td>Author</td><td>Book Type</td><td>Price</td><td>Options</td></tr>";
    while ($row = mysqli_fetch_array($result))
    {
       echo "<tr>";
       echo "<td>$row[BookID]</td>";
       echo "<td>$row[ISBN]</td>";
       echo "<td>$row[Title]</td>";
       echo "<td>$row[Author]</td>";
       echo "<td>$row[Booktype]</td>";
       echo "<td>$$row[Price]</td>";
       echo "<td ><a href=editBook.php?BookID=$row[BookID]>Edit</a> " .
            "<a href=deleteBook.php?BookID=$row[BookID]>Delete</a></td>";
       echo "</tr>";
    }
    echo"</table>";
  ?>
  <br>
   <a href="addNewBook.php">Add New Book</a>
   <a href="JohnMeyer.html">Cancel</a>
 </body>
</html>
