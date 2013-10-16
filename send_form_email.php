
<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "gary@garyoung.com";
    $email_subject = "Contact Confirmation";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
<!-- include your own success html here -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
		<title>Web Portfolio by Gary Young | Confirmation</title>
		
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/portfolio.css" type="text/css" media="screen" />
			<link rel="stylesheet" type="text/css" href="css/contact.css" />
		
		<link rel="shortcut icon" href="http://www.garyoung.com/favicon.ico" />

<!--[if lt IE 8]>
	<style>
		legend {
			display: block;
			padding: 0;
			padding-top: 30px;
			font-weight: bold;
			font-size: 1.25em;
			color: #FFD98D;
			margin: 0 auto;
		}
	</style>
<![endif]-->

	</head>

	
	<body>
	
<div id="masthead">
	<div class="wrapper">
	
	  				<p id="logo"><a href="http://www.garyoung.com">Gary Young - Web Portfolio</a></p>

				
		
		<ul>
			<li><a href="http://www.garyoung.com/index.html" >Home</a></li>
			<li><a href="http://www.garyoung.com/portfolio.html" >Portfolio</a></li>
			<li><a href="http://www.garyoung.com/services.html" >Services</a></li>
			<li><a href="http://www.garyoung.com/artist.html" >Artist</a></li>
			<li><a href="http://www.garyoung.com/contact.html" class="current">Contact</a></li>
		</ul>
	
	</div><!--end wrapper-->
</div><!--end masthead-->

	<div id="primary" class="sec_page">	
	<div class="wrapper">
	
	<div id="main">
	
		<div id="content">

				
		<h1>Contact</h1>
	
	
	<h2>YOUR REQUEST HAS BEEN SENT!</h2>
	
	<p> Thank you, <?php echo $_POST['first_name']; ?> <?php echo $_POST['last_name']; ?>...
	<br/>Your business is greatly appreciated. Please allow up to 24 hours for a response.
	If you are in need of immediate assistance, please call me at (980) 213-1921.</p>
		
	<p><img src="images/process.png" alt="Diagram of Design Process" /></p>
				
	
	</div><!--end content-->
		

	
	</div><!--end main-->
	
	<div class="clear"> </div>
	</div><!--end wrapper-->
</div><!--end primary-->


<div class="wrapper">
<div id="footer">
	
	<p>Graphic Design &amp; Web Development &copy; copyright 2012 Gary Young.</p>
	
	<ul id="colophon">
		
		<li><a href="http://www.facebook.com/garyoungfolio"><img src="images/facebook_icon.gif" alt="Facebook logo" title="Facebook Profile"/></a></li>
		<li><a href="http://www.linkedin.com/in/thegaryyoung"><img src="images/linkedIn_icon.gif" alt="LinkedIn logo" title="LinkedIn Profile"/></a></li>
		<li><a href="https://twitter.com/TheGaryoung"><img src="images/twitter_icon.gif" alt="Twitter logo" title="Twitter Profile"/></a></li>
		<li><a href="http://www.w3schools.com/"><img src="images/xhtml_icon.gif" alt="Valid HTML 1.0 Strict" title="XHTML Validator"/></a></li>
	</ul>
	
</div><!--end footer-->
</div>


</body>
</html>

<?php
}
?>