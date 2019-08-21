<?php
    $post_data = http_build_query(
        array(
            'secret' => '6LeOHrQUAAAAAOcm7eBYHlN3mq1DeDlfpF8MVct_',
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $result = json_decode($response);
    if (!$result->success) {
        echo "Invalido!";
    } else {
        echo "Valido!";
    }
?>