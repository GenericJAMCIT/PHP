<?php 
	if (empty($_POST['username']) || empty($_POST['password']))
		die("You need to enter a username and a password.");
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($password =='pass' and $username == 'John')
		{
		session_name('Library_login');
		session_start(); 
		$_SESSION['DisplayName'] = $username;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + 30*2;
 
		echo "<h2>Welcome back $username.</h2>";
		echo '<a href="JohnMeyer.html">Library Search</a>';
		echo '<br>';
		echo '<a href="addNewBook.php">New Book</a>';
		echo '<br>';
		echo '<a href="Library_logoff.php">Log Out</a>';
	}
	else
	{
		echo 'Password was incorrect <br>';
		echo '<a href="Library_logon.html">logon again</a>';
		session_name('Library_login');
		session_start();
		session_unset();
	}
?>
