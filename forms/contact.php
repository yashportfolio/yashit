<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['_replyto']);
    $message = htmlspecialchars($_POST['message']);

    $data = [
        'name' => $name,
        '_replyto' => $email,
        'message' => $message
    ];

    $url = 'https://formspree.io/f/xrgnnoyy';

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) { 
        echo "Error in submission.";
    } else {
        echo "Message sent successfully!";
    }
}
?>
