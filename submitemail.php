<?php session_start(); ?>

<?php

if (isset($_POST['submit']))
{
	$error = "";
	
	if (isset($_POST['name']))
	{
		$name = $_POST['name'];
	}
	else
	{
		$error .= "Please enter your name<br />";
	}

	if (isset($_POST['email']))
	{
		$email = $_POST['email'];
		if (!preg_match("/^[_a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email))
		{ 
			$error .= "The e-mail address you entered is not valid. <br/>";
		}
	}
	else
	{
		$error .= "Please enter your email address<br />";
	}
	
	if(($_POST['code']) == $_SESSION['code'])
	{ 
		$code = $_POST['code'];
	}
	else
	{ 
		$error .= "The captcha code you entered does not match. Please try again. <br />";    
	}
	
	if ( $error == '' )
	{
		$from = 'From: ' . $name . ' <' . $email . '>';
		$to = "your@email.com";
		$subject = "The Subject";
		
		$content = "The following person signed up:" . "\n\n";
		$content .= $name . "\n";
		$content .= $email . "\n";
		
		$success = "Thank you";
		
		mail($to, $subject, $content, $from);
	}
}
?>

<?php
if ($error != '')
{
	echo $error;
}
elseif ( $success != '' )
{
	echo $success;
}
?>
