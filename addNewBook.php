<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. This code creates a form for library staff to add a
new record to the library database.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<html>
 <head>
  <title>Add New Book</title>
 </head>
 <body>
 <h1>Add New Book</h1>
 <form action=insertBook.php method=GET>
 <?php
 echo "<form action=insertBook.php method=GET>";
 echo "<input type=hidden name=BookID>"; 
 echo "<table border=1>";
 echo "<tr><td>ISBN:</td><td><input type=text id=ISBN name=ISBN></td></tr>";
 echo "<tr><td>Title:</label></td><td><input type=text id=Title name=Title></td></tr>";
 echo "<tr><td>Author:</label></td><td><input type=text id=Author name=Author></td></tr>";
 echo "<tr><td>Type:</label></td><td>
 		<input type=radio id=hardcover name=Booktype value=H>
		<label for=hardcover>Hardcover</label><br>
		<input type=radio id=softcover name=Booktype value=S>
		<label for=softcover>Softcover</label><br>
		<input type=radio id=Digital name=Booktype value=D>
		<label for=digital>Digital</label><br>";
 echo "<tr><td>Price:</label></td><td><input type=text id=price name=Price></td></tr>";
 echo "</table>";
 echo "<br><input type=submit value=update>";
 ?>
 <a href="JohnMeyer.html">Cancel</a>
 </body>
</html>
