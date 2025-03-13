<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendEmail ($title, $body, $data, $env){

        $_SESSION["title"] = $title;
        $_SESSION["body"] = $body;

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "mail.propertiesforsaleza.co.za";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->Username = $env['EMAIL_USERNAME'];
            $mail->Password = $env['EMAIL_PASSWORD'];

            $mail->setFrom($data['clientEmail'], $data['clientName']);
            $mail->addAddress("webadmin@propertiesforsaleza.co.za", "Website");

            $mail->Subject = $data['subject'];
            $mail->Body = $data['message'];

            $mail->send();
            
            // Send JSON response for redirect
            header('Content-Type: application/json');
            echo json_encode(array('success' => true, 'redirect' => 'https://www.propertiesforsaleza.co.za/sent'));
            exit;

        } 
        catch (Exception $e) {
            echo "Email could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //Get .env
    $envFilePath = __DIR__ . '/config/.env';
    $env = parse_ini_file($envFilePath);
    
    // Verify reCAPTCHA token
    $recaptcha_secret_key = $env['RECAPTCHA_SECRET_KEY']; // 
    $client_response_token = trim($_POST["token"]);
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret_key . '&response=' . $client_response_token;
    $recaptcha_response = json_decode(file_get_contents($recaptcha_url));

    if ($recaptcha_response->success) {
        unset($_POST["token"]);
        $form_id = isset($_POST["form_id"]) ? $_POST["form_id"] : null;
        
        switch($form_id){
            case 'contact-form':
                // Proceed with form processing
                $name = trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $tel = trim($_POST["tel"]);
                $subject = "New message from ".$name." via the website.";
                $message = trim($_POST["message"])."\n\n"."Contact Number: ".$tel."\n"."Email: ".$email;
                $first_name = explode(" ", $name)[0];
                $title = "Message Sent Successfully!";
                $body = "Thank you ".$first_name.", your message has been received. We will respond to your message shortly via email or call you back.";
                $data = [
                    'clientName' => $name,
                    'clientEmail' => $email,
                    'subject' => $subject,
                    'message' => $message
                ];
                break;
                
            case 'contact-us-form':
                // Proceed with form processing
                $name = trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $tel = trim($_POST["tel"]);
                $subject = "New message from ".$name." via the website.";
                $subscribed = isset($_POST["subscribed"]) ? "Yes" : "No";
                $message = trim($_POST["message"])."\n\n"."Contact Number: ".$tel."\n"."Email: ".$email."\n"."Subscribed to updates: ".$subscribed;
                $first_name = explode(" ", $name)[0];
                $title = "Message Sent Successfully!";
                $body = "Thank you ".$first_name.", your message has been received. We will respond to your message shortly via email or call you back.";
                $data = [
                    'clientName' => $name,
                    'clientEmail' => $email,
                    'subject' => $subject,
                    'message' => $message
                ];
                break;
                
            case 'pop-form':
                // Proceed with form processing
                $name = trim($_POST['name']);
                $first_name = explode(" ", $name)[0];
                $email = trim($_POST['email']);
                $tel = trim($_POST['tel']);
                $service = trim($_POST['service']);

                $title = "Your Request Was Submitted Successfully!";
                $body = "Thank you " .$first_name. " for putting your trust in our services. One of our friendly and professional advisors will be in touch with you soon.";
                $subject = "From Website => Callback Request from" .$name;
                $message = $name. " has requested assistance in ".$service."." . "\n\n". "Contact Number: ". $tel. "\n". "Email: ". $email."\n\n". "Assistance Needed: ". $service;

                $data = [
                    'clientName' => $name,
                    'clientEmail' => $email,
                    'subject' => $subject,
                    'message' => $message
                ];
                break;
                
            case 'newsleter-email':
                // Proceed with form processing
                $email = trim($_POST['email']);
                $name = "EAD Mailings List";

                $title = "Thank you for joining to our mailings list";
                $body = "You have successfully subscribed to receive our offers and publications. To unsubscribe please email info@lwaziholdings.co.za";
                $subject = "New Email Subscriber!";
                $message = "The following email has subscribed to receive email communication: ".$email;

                $data = [
                    'clientName' => $name,
                    'clientEmail' => $email,
                    'subject' => $subject,
                    'message' => $message
                ];
                break;
            
            default: 
                $title = "Message Failed To Send";
                $body = "There was a problem sending the message, please try again. If this problem persists, please email admin@explosiveartworks.co.za for further assistance. Thank you!";
        }
        
        sendEmail($title, $body, $data, $env);

    } else {
        // Handle reCAPTCHA verification failure
        echo "reCAPTCHA verification failed.";
    }
}

else {
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'Invalid request method'));
    exit();
}

?>

<!-- hosting@afrihost.co.za -->