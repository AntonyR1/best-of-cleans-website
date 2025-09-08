<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Set recipient email address
    $recipient = "Antony.Rajan@bestofcleans.co.nz";

    // Set email subject
    $subject = "New Enquiry from Best of Cleans Website";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: webmaster@yourdomain.co.nz\r\nReply-To: $email\r\n";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirect to a "thank you" page on successful send
        header("Location: thank_you.html");
        exit;
    } else {
        // Redirect to a "failure" page if something went wrong
        header("Location: error.html");
        exit;
    }
} else {
    // Not a POST request, so redirect to the home page
    header("Location: index.html");
    exit;
}
?>
