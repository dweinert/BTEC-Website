<?php
if (isset($_POST['email])
{
	//Here is the email to information
	$email_to = "supa182970@adams12.org";
	$email_subject = "TSA Website";
	$email_from = "TSA Website";
	
	//error code
	
	function died($error){
		echo "We are sorry, but there was/were error/errors found with the form you submitted.";
		echo "These errors appear below.<br/><br/>";
		echo $error. "<br/><br/>";
		echo "Please go back and fix these errors.<br/>";
		die();
	}
	
	//validation
	
	if(!isset($_POST['name']) || 
	!isset($_POST['email']) ||
	!isset($_POST['comments'])){
	
		died('We are sorry but there appears to be a problem with the form you submitted.');
	}
	
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-za-z][2,4]$/';
	if(!preg_match($email_exp, $email)){
		$error_message .= 'The Email address you entered does not appear to be valid. <br/>';
	}
	
	$string_exp = "//^[A-Za-z.'-]+$/";
	if(!preg_match($string_exp, $name)){
		$error_message .= 'The Name you entered does not appear to be valid,<br/>';
	}
	
	if(strlen($comments < 2){
		$error_message . = 'The Comments you entered does not appear to be valid.<br/>';
	}
	
	if(strlen($error_message) > 0 ){
			died($error_message);
		}
		$email_message = "Form Details below.\n\n";
	
	
	function clean_string($string){
		$bad = array("content-type", "bcc:", "to:", "cc:", "href");
		return str_replace($bad, "", $string);
	}
	
	$email_message .= "Name:" . clean_string($name) . "\n";
	$email_message .= "Name:" . clean_string($email) . "\n";
	$email_message .= "Name:" . clean_string($comments) . "\n";
	
	
	//create email headers
	$headers = 'From:' .$email_From . "\r\n". 'Reply-To' . $email. "\r\n" . 'X-Mailer: PHP/' . phpversion();
	
	@mail($email_to, $email_subject, $email_message, $headers);
	
?>
<!-- success message goes here-->
	Thank you for contacting us. We will be in touch with you shortly.<br/>
	
	Please click <a href = "FContacts.html"> here </a> to back to the form.
	<?php
}
?>





