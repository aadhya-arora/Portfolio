<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'aadhya270805@gmail.com';

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required form fields are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        // Set email parameters
        $to = $receiving_email_address;
        $from_name = $_POST['name'];
        $from_email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Build email headers
        $headers = "From: $from_name <$from_email>" . "\r\n";
        $headers .= "Reply-To: $from_email" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Send the email using PHP's mail() function
        if (mail($to, $subject, $message, $headers)) {
            echo 'Email sent successfully!';
        } else {
            echo 'Error: Unable to send email. Please try again later.';
        }
    } else {
        // If any required form field is missing, return an error message
        echo 'Error: All fields are required!';
    }
} else {
    // If the form is not submitted via POST method, return an error message
    echo 'Error: Invalid request!';
}
?>
