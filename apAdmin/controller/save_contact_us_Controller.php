<?php
extract($_POST);

if(isset($_POST['message']))
{
  $url = 'https://master.my-company.app/commonApi/faq_controller.php';
  
  $subject = "Contact Us Form Data";

  $target_url = "https://master.my-company.app/commonApi/faq_controller.php";
  $post = array(
    'addFeedback' => 'addFeedback',
    'name' => $name,
    'email' => $email,
    'subject' => $_POST['subject'],
    'message' => $message
  );
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$target_url);
  curl_setopt($ch, CURLOPT_POST,1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result=curl_exec ($ch);
  curl_close ($ch);
  $contact_data = json_decode($result, true);
  $_SESSION['msg']='Message sent';
  header('location:../');
} 
else 
{
  $_SESSION['msg1']= "Something wrong. Try again after sometime";
  header("location:../");
}
?>
