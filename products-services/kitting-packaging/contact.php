<?php

if(!empty($_POST['antispam'])) die();

if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$visitor_email = $_POST['email'];
$description = $_POST['description'];

$goals = $_POST['goals'];
$timeline = $_POST['timeline'];
$art = $_POST['art'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
$to = "info@echoimg.com";
$email_from = 'noreply@echoimg.com';
$email_subject = "New Form submission";

$email_body = "You have received a new message from:\n $name, $company $phone \n\n".

"Here is their Project Description:\n $description \n\n". 
"More Info (if filled out): $goals \n".
"Project Timeline: $timeline \n". 
"Branded/Art Available: $art  \n \n".

$headers .= "Reply-To: $visitor_email \r\n";
$headers = "From: $email_from \r\n \n";

//Send the email!
mail($to,$email_subject,$email_body,$headers);

echo "<script>alert('Success! Your message has been sent.'); window.location.href='index.html';</script>";

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 