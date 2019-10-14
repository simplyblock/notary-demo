<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'config.php';
use SimplySign\SimplySign;

$post = $_POST;

if ($post['cmd'] == 'create_hash') {

    // Required Data
    $data = array('text_sample' => $post['text_sample']);
    $simplySign = new SimplySign(PUBLIC_KEY, PRIVATE_KEY);
    $url ='https://testnet.simplyblock.io/v1/common/create_hash/';
    echo $response = $simplySign->GatewayRequest($url, $data);

} else if ($post['cmd'] == 'verify_hash') {

    // Required Data
    $data = array('hash' => $post['data_hash2']);
    $simplySign = new SimplySign(PUBLIC_KEY, PRIVATE_KEY);
    $url = 'https://testnet.simplyblock.io/v1/eth/verify_hash/';
    $response = $simplySign->GatewayRequest($url, $data);


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

    // Required Data
    $data = array('hash' => $post['data_hash']);
    $simplySign = new SimplySign(PUBLIC_KEY, PRIVATE_KEY);
    $url = 'https://testnet.simplyblock.io/v1/eth/broadcast_hash/';
    echo $response = $simplySign->GatewayRequest($url, $data);
}

die;
?>
