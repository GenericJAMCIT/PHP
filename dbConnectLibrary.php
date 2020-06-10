<!----------------------------------------------------------
------------------------------------------------------------
---Author: John Meyer
---Purpose: This PHP page is for Turnbull high library
system. Seperate PHP function that connects to the library
database.
---Date:15/05/2020
------------------------------------------------------------
----------------------------------------------------------->
<?php
  $USER     = "root";
  $PASSWORD = "pass";
  $DBNAME   = "Library";
  $conn     = mysqli_connect("localhost", $USER, $PASSWORD, $DBNAME) 
     or die("mySQL server connection failed");
?>
