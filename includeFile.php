<?php 

   $error = ""; $successMasseage = "";

  if ($_POST) {

    if (!$_POST["email"]) {

      $error .= "An email address is required.<br>";
    
    }

    if (!$_POST["content"]) {

      $error .= "An content is required.<br>";
    }

    if (!$_POST["subject"]) {

      $error .= "An subject is required.<br>";

    }

    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
      
      $error .= "The email address is invalid.<br>";
    }

     if($error != "")  {

       $error = '<div class="alert alert-danger" role="alert"><p>There are error(s) in your form:</p>' . $error . '</div>';
      
      } else {

        $emailTo = "ayush.bay20@gmail.com";

        $subject = $_POST['subject'];

        $content = $_POST['content'];

        $headers = "Form: ".$_POST['email'];

        if (mail($emailTo, $subject, $content, $headers)) {
        
            $successMasseage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';

        } else {

            $error = '<div class="alert alert-danger" role="alert">Your message could\'t be sent - please try again later</div>';       

        }

      }
  }



 ?>