<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. This code creates a form that staff can use to edit
an existing record in the library database.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<html>
 <head>
  <title>John Meyer Edit Book</title>
 </head>
 <body>
 <h1>Edit Book</h1>
 <?php
 if (empty($_GET['BookID']))
	die("Error retrieving data");
 $bookID = $_GET['BookID'];
 require 'dbConnectLibrary.php'; 
 $sql = "SELECT * FROM books WHERE BookID = $bookID";
 $result = mysqli_query($conn, $sql) or die("Error editing - ". mysqli_error($conn)); 
 if (mysqli_affected_rows($conn) == 0)
	die("Error – record not found to edit");
 while ($row = mysqli_fetch_array($result))
 {
	$bookID = $row[0];
    $ISBN = $row['ISBN'];
    $title = $row['Title'];
	$author = $row['Author'];
	$bookType = $row['Booktype'];
    $price = $row['Price'];
 }
 echo "<form action=updateBook.php method=GET>";
 echo "<input type=hidden name=BookID value=$bookID>"; 
 echo "<table border=1>";
 echo "<tr><td>ISBN:</td><td><input type=text id=ISBN name=ISBN value=\"$ISBN\"></td></tr>";
 echo "<tr><td>Title:</label></td><td><input type=text id=Title name=Title value=\"$title\"></td></tr>";
 echo "<tr><td>Author:</label></td><td><input type=text id=Author name=Author value=\"$author\"></td></tr>";
 
 if($bookType == 'H'){
	 $HCover = "checked";
	 $SCover = "";
	 $Digi = "";
 }
 else if($bookType == 'S'){
	 $SCover = "checked";
	 $HCover = "";
	 $Digi = "";
 }
 else{
	 $Digi = "checked";
	 $HCover = "";
	 $SCover = "";
 }
 echo "<tr><td>Type:</label></td><td>
 		<input type=radio id=hardcover name=Booktype value=H $HCover>
		<label for=hardcover>Hardcover</label><br>
		<input type=radio id=softcover name=Booktype value=S $SCover>
		<label for=softcover>Softcover</label><br>
		<input type=radio id=Digital name=Booktype value=H $Digi>
		<label for=digital>Digital</label><br>";
 echo "<tr><td>Price:</label></td><td><input type=text id=price name=Price value=\"$price\"></td></tr>";
 echo "</table>";
 echo "<br><input type=submit value=update>";
 ?>
 <a href="JohnMeyer.html">Cancel</a>
 </body>
</html>
