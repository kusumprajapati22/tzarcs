<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    $to = "info@tzarcs.com";
    $subject = "Your Mall Contact Us Form ";
    
    $email_body = "You have received a new message:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message: $message\n";


    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    
    if (mail($to, $subject, $email_body, $headers)) {
        header("Location: thank_you1.php");
        exit();
    } else {
        echo "There was an error sending your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
