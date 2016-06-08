<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Success!</title>

  <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
  <link href="../assets/css/toolkit-minimal.css" rel="stylesheet">
  <link href="../assets/css/application-minimal.css" rel="stylesheet">
</head>

<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "samuelpierce@outlook.com";

    $email_subject = "SENT FROM MY WEBSITE";





    function died($error) {

        // your error code can go here

        echo "<div class=\"block block-fill-height text-center\">
          <div class=\"container\">
            <h1 class=\"block-title\">Oops!</h1>
            <h4 class=\"text-muted\">Some of the information you provided didn't look right. <br> Check them out below.</h4>
            <a class=\"btn btn-info btn-lg p-x-lg m-a-md\" href=\"http://apc.samuelpierce.com/#/amherst-painting-company\">Try Again</a>
          </div>";

        echo $error."<br /><br /><br />";

        echo "</div>";

        die();

    }



    // validation expected data exists

    if( !isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['message'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $name = $_POST['name']; // required

    $email_from = $_POST['email']; // required

    $message = $_POST['message']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(strlen($message) < 5) {

    $error_message .= '<h4 class="icon icon-check text-danger"> Your email address wasn\'t in the correct format</h4>';

  }

  if(strlen($name) < 1) {

    $error_message .= '<h4 class="icon icon-check text-danger"> Your name has to be more than 1 letter long</h4>';

  }

  if(strlen($message) < 2) {

    $error_message .= '<h4 class="icon icon-check text-danger"> Your message has to be more than 2 letters long</h4>';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }

    $email_message .= "Name: ".clean_string($name)."\n\n";

    $email_message .= "Email: ".clean_string($email_from)."\n\n";

    $email_message .= "Message: ".clean_string($message)."\n\n";


// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>


<!-- include your own success html here -->
<div class="block block-fill-height text-center">
  <div class="container">
    <h1 class="block-title">Thank you!</h1>
    <h4 class="text-muted">Your message has safely arrived in our inbox. <br> We will be in touch with you very soon.</h4>
    <a class="btn btn-success btn-lg p-x-lg m-t" href="http://apc.samuelpierce.com/#/amherst-painting-company">Back</a>
  </div>
</div>


<?php

}

?>
