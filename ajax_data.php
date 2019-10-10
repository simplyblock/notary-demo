<?php

// // Import PHPMailer classes into the global namespace
// // These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'SimplyBlock.php';

$post = $_POST;

if ($post['cmd'] == 'create_hash') {
    $data_array = array('text_sample' => $post['text_sample']);
    $option['url'] = 'https://testnet.simplyblock.io/v1/common/create_hash/';
    $option['public_key'] = 'hmac_pub_1';
    $option['private_key'] = '';
    $option['data'] = $data_array;

    $simplyblock = new SimplyBlock($option);
    $response = $simplyblock->createHash();
    echo $response;

} else if ($post['cmd'] == 'verify_hash') {
    $data_array = array('hash' => $post['data_hash2']);
    $option['url'] = 'https://testnet.simplyblock.io/v1/eth/verify_hash/';
    $option['public_key'] = 'hmac_pub_1';
    $option['private_key'] = 'hmac_priv_1';
    $option['data'] = $data_array;

    $simplyblock = new SimplyBlock($option);
    $response =  $simplyblock->verifyHash();

    $response_obj = json_decode($response);
    $verification_status = $response_obj->data->status;
    $stellar_explorer_link = 'https://ropsten.etherscan.io/tx/'.$response_obj->data->transaction_id;
    
    $color = ($verification_status) ? 'color:#0fcb97;' : 'color:red;';
    $verification_status = ($verification_status) ? 'VERIFIED' : 'NOT VERIFIED';
    
    $html = '<div class="row col-md-12">
            <div class="col-md-3 form-group">
                <label>Verification Status:</label>
            </div>
            <div class="col-md-1 form-group">:</div>
            <div class="col-md-8 form-group">
                <label style="'.$color.' font-weight: 600;">'.$verification_status.'</label>
            </div>
        </div>';
    if(strtoupper($verification_status) == 'VERIFIED'){
        $html .= '<div class="row col-md-12">
            <div class="col-md-3 form-group">
                <label>Ethereum Transaction Link:</label>
            </div>
            <div class="col-md-1 form-group">:</div>
            <div class="col-md-6 form-group">
                <label style="word-break: break-word;"><a href="'.$stellar_explorer_link.'" target="_new">'.$stellar_explorer_link.'</a></label>
            </div>
        </div>';
    }
    
    echo $html;

} else if ($post['cmd'] == 'broadcast_hash') {

    $data_array = array('hash' => $post['data_hash']);
    $option['url'] = 'https://testnet.simplyblock.io/v1/eth/broadcast_hash/';
    $option['public_key'] = 'hmac_pub_1';
    $option['private_key'] = 'hmac_priv_1';
    $option['data'] = $data_array;

    $simplyblock = new SimplyBlock($option);
    $response =  $simplyblock->broadcastHash();

    echo $response;
}

die;
?>
