<?php

# Verify captcha
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
    throw new Exception('Gah! CAPTCHA verification failed. Please email me directly at: jstark at jonathanstark dot com', 1);
}

    // $url = "https://www.google.com/recaptcha/api/siteverify?secret=6LeOHrQUAAAAAOcm7eBYHlN3mq1DeDlfpF8MVct_&response=03AOLTBLT0Bo7xi4-AmdodMSH9-IXRCav1eDHnSr-EdnH1ycIZnVbZ5YztKHc2PDPn4swKfz383TK0EaOvIxQqc0-NqPf1wr6x9TkHeXpgdc0d082d7qu8u9sw5eXu2btvmoQs7DEaelprNCmEhTnIudT_dL1QjnRyOCLKu5d9nLGxxJIm7FRIF43y-hEvYIHv2NAePvwCCppzMvMKxulYQniFOFEvFILBT6umUuImdtcO7eB9KjVkGAYFEsDlrr8Q6BUJdqL6Uy-820XkeCSeOYotQCrpkub97OxerVt-dd2Kni__g0C3Esau_mS6k-mPbb8pxdeQYQgK-S35Iov2t9lrXD4zMACGzAJzvyPlHog8NW7Mg3cNDlc";

    // $data = file_get_contents($url); 
    // // var_dump(json_decode($data, true));
    // // var_dump(json_encode($data->success));   // Apenas para printar o objeto todo na tela
    // $itens = json_decode($data); 
    
    // foreach ($itens as $key => $value) {
    //     echo $value['success'];
    // }
    
    // // $d = json_encode($data);

    // // echo $itens->{'"success"'};

?>