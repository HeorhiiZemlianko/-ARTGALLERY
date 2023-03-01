<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name == "" OR $email == "" OR $message == "") {
        http_response_code(400);
        echo "Please fill in all fields";
        exit;
    }

    $recipient = "kibranec2@gmail.com";
    $subject = "New message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Message sent successfully";
    } else {
        http_response_code(500);
        echo "Error sending message";
    }
} else {
    http_response_code(403);
    echo "Access forbidden";
}
?>
