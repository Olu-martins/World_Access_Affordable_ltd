<?php
 
 $cv_email="Caresskakka@gmail.com";

 function spamcheck($field)
  {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
 
 $mailcheck = spamcheck($_POST['email']);
 $email = strip_tags($_POST['email']);
 $subject = strip_tags($_POST['subject']);
 $message = strip_tags($_POST['message']);
 $name = strip_tags($_POST['name']);

 if(empty($name) || empty($message) || empty($subject)){
  echo "One or more required inputs missing... Try again!";
 }
elseif($mailcheck==FALSE){
echo "Invalid email address format. try again!";
 }	
else{
$details="Sender: ".$name."\n"."Email Address: ".$email."\n\n ".$message;
 if(mail($cv_email, $subject, $details, "From: $email")){
   echo "Thanks!...Your mail was sent successfully";
 }else{
   echo "Message sending failed!";
 }
}