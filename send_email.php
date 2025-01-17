<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from the POST request
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Client's email address where the form data will be sent
    $to = "ajithkannan.ga@gmail.com";  // Change this to the client's email address

    // Email subject
    $subject = "New Enquiry Form Submission from $name";

    // HTML email content
    $emailContent = "
        <html>
        <head>
            <title>New Enquiry Form Submission</title>
        </head>
        <body>
            <h2>Enquiry Details</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
    ";

    // Set the email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";  // Use the sender's email (from the form)
    $headers .= "Reply-To: $email" . "\r\n";  // Reply back to the sender's email

    // Send the email using PHP mail() function
    if (mail($to, $subject, $emailContent, $headers)) {
        echo "Thank you for your enquiry. We will get back to you soon.";
    } else {
        echo "Sorry, there was an issue submitting your enquiry. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
