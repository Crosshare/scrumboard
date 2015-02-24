<?php 
	var_dump($_POST);
	echo $_POST['ss'];
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input name="loginEmail" type="text" placeholder="Email address" />
<input name="loginPassword" type="password" placeholder="Password" />
<input type="submit" name="submit" value="Login">
</form>