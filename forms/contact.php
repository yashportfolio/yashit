<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set recipient email address
    $to = "sofiit085@gmail.com";

    // Set email subject
    $subject = "New Contact Form Submission";

    // Build the email content
    $email_content = "Name: " . htmlspecialchars($name) . "\n";
    $email_content .= "Email: " . htmlspecialchars($email) . "\n\n";
    $email_content .= "Message:\n" . htmlspecialchars($message) . "\n";

    // Build the email headers
    $email_headers = "From: " . htmlspecialchars($name) . " <" . htmlspecialchars($email) . ">";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Redirect to a thank you page (optional)
        header("Location: thank_you.html");
        exit;
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
