<?php
	require_once("class_auth.php");
	session_start();
	$log = new auth_emp();

	//$errflag = false;
	
	$user = @trim($_POST['username']);
	$pass = @trim($_POST['password']);
	$level = $_POST['level'];

	//Input Validations
	/*
	if($user == '') {
		$errmsg = 'User Name is missing.';
		$errflag = true;
	}
	else if($pass == '') {
		$errmsg = 'Password is missing.';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG'] = $errmsg;
		session_write_close();
		header("location: login.php");
		exit();
	}
	*/
	
	if($log->login($user, $pass)){
		session_write_close();
		header("location: index.php");
		exit;
	} else {
		if(isset($_SESSION['LOG_ERR']) {
			$_SESSION['ERRMSG'] = 'This Account has yet to be Verified.';
		} else {
			$_SESSION['ERRMSG'] = 'That User Name/Password Combination is Invalid.';
		}
		session_write_close();
		header("location: login.php");
		exit;
	}
	
?>