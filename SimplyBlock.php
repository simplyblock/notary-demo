<?php

Class SimplyBlock{

	private $public_key;
	private $private_key;
	private $url;
	private $data;

	public function __construct($option)
	{
		$this->public_key = $option['public_key'];
		$this->private_key = $option['private_key'];
		$this->url = $option['url'];
		$this->data = $option['data'];
	}

	public function createHash()
	{
		
		$post_data_new = array();
		$error = array();
		if(trim($this->public_key) == '') { $error[] = 'Public key required for creating hash.'; }
		if(trim($this->url) == '') { $error[] = 'End point url required for creating hash.'; }

	    $post_data_new['public_key'] = $this->public_key;
	    $post_data_new['data']= $this->data;
	    if(count($error))
	    {
	    	$response['success'] = false;
	    	$response['errors'] = $error;
	    	echo json_encode($response);
	    }
	    else
	    {	
	    	$data_json = json_encode($post_data_new);
	    	$response = $this->curlRequest($data_json);
	    }

	    return $response; 
	}

	public function broadcastHash()
	{
		$post_data_new = array();
		$error = array();

		if(trim($this->public_key) == '') { $error[] = 'Public key required for broadcast hash.'; }
		if(trim($this->private_key) == '') { $error[] = 'Private key required for broadcast hash.'; }
		if(trim($this->url) == '') { $error[] = 'End point url required for creating hash.'; }


	    $post_data_new['public_key'] = $this->public_key;
	    $hash_string = "{'hash': '".$this->data['hash']."'}";
	    $post_data_new['data']= $this->data;
	    $signed_data =  hash_hmac ( 'sha384' , $hash_string, 'hmac_priv_1');
	    $post_data_new['signed_data']= $signed_data;
	    $data_json = json_encode($post_data_new);

		$response = $this->curlRequest($data_json);
		return $response; 
	}

	public function verifyHash()
	{
		$post_data_new = array();
		$error = array();

		if(trim($this->public_key) == '') { $error[] = 'Public key required for verify hash.'; }
		if(trim($this->private_key) == '') { $error[] = 'Private key required for verify hash.'; }
		if(trim($this->url) == '') { $error[] = 'End point url required for creating hash.'; }

	    $post_data_new['public_key'] = $this->public_key;
	    $hash_string = "{'hash': '".$this->data['hash']."'}";
	    $post_data_new['data']= $this->data;
	    $signed_data =  hash_hmac ( 'sha384' , $hash_string, 'hmac_priv_1');
	    $post_data_new['signed_data']= $signed_data;
	    $data_json = json_encode($post_data_new);

		$response = $this->curlRequest($data_json);
		return $response; 
	}


	public function curlRequest($data_json)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json",
				"cache-control: no-cache"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$response['success'] = false;
			$response['errors'][] = $err;
			return json_encode($response);
		} else {
			$response_decode = json_decode($response);
			if(!trim($response_decode->success))
			{
				$error[] = $response_decode->message;
				$response_decode->errors = $error;
			}
			return json_encode($response_decode);
		}
	} 
}