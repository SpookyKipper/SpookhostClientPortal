<?php 

class Recaptcha extends CI_Model
{
	function get_site_key()
	{
		$res = $this->fetch();
		if($res !== false)
		{
			return $res['recaptcha_site'];
		}
		return false;
	}

	function set_site_key($key)
	{
		$res = $this->update('site', $key);
		if($res)
		{
			return true;
		}
		return false;
	}
	
	function get_secret_key()
	{
		$res = $this->fetch();
		if($res !== false)
		{
			return $res['recaptcha_key'];
		}
		return false;
	}

	function set_secret_key($secret_key)
	{
		$res = $this->update('key', $secret_key);
		if($res)
		{
			return true;
		}
		return false;
	}
	
	function get_type()
	{
		$res = $this->fetch();
		if($res !== false)
		{
			return $res['recaptcha_type'];
		}
		return false;
	}
	
	function set_type($key)
	{
		$res = $this->update('type', $key);
		if($res)
		{
			return true;
		}
		return false;
	}
	
	function is_active()
	{
		$res = $this->fetch();
		if($res !== false)
		{
			if($res['recaptcha_status'] === 'active')
			{
				return true;
			}
			return false;
		}
		return false;
	}

	function get_status()
	{
		$res = $this->fetch();
		if($res !== false)
		{
			return $res['recaptcha_status'];
		}
		return false;
	}

	function set_status(bool $status)
	{
		if($status === true)
		{ 
			$status = 'active';
		}
		else
		{
			$status = 'inactive';
		}
		$res = $this->update('status', $status);
		if($res)
		{
			return true;
		}
		return false;
	}

	function is_valid($token, $type = "human", $lot_number, $captcha_output, $pass_token, $gen_time) 
	{
		if($type == "google")
		{
			$secret_key = $this->get_secret_key();
          //  $res = file_get_contents("https://challenges.cloudflare.com/turnstile/v0/siteverify?secret=$secret_key&response=$token");
	        /*$res = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$token");*/


            //The url you wish to send the POST request to
            $url = "https://challenges.cloudflare.com/turnstile/v0/siteverify";

            //The data you want to send via POST
            $fields = [
                'secret' => $secret_key,
                'response' => $token
            ];
            $fields_string = http_build_query($fields);
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

            $res = curl_exec($ch);
            
	        $res = json_decode($res);
	        if($res->success){
	        	return true;
	        }
         
	        return false;
		}
		elseif($type == "human")
		{
			//$secret_key = $this->get_secret_key();
            $captcha_key = "d1604dc399d8e274c8015e0a1b4c696f";
            $sign_token = hash_hmac('sha256', $lot_number, $captcha_key);
			$param = http_build_query(["lot_number" => $lot_number, "captcha_output" => $captcha_output, "pass_token" => $pass_token, "gen_time" => $gen_time, "sign_token" => $sign_token]);
			/*$param = array(
			"lot_number" => $lot_number,
			"captcha_output" => $captcha_output,
			"pass_token" => $pass_token,
			"gen_time" => $gen_time,
			"sign_token" => $sign_token
			);*/
            
            

/*
            $url = sprintf("http://gcaptcha4.geetest.com/validate?captcha_id=4ac3d4827cd02131a99f76c00368e8c6");
            $result = post_request($url,$param);
            $obj = json_decode($result,true);*/

			$ch = curl_init("https://gcaptcha4.geetest.com/validate?captcha_id=4ac3d4827cd02131a99f76c00368e8c6"); //?captcha_id=4ac3d4827cd02131a99f76c00368e8c6
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
            $obj = json_decode($result, true);
        
            
           // $obj = json_decode($result, true);
	        if($obj['result'] == 'success'){
	        	return true;
	        } else {
                return $obj;
            }
	       // return $result_array['result'];
          // echo $result;
      //     return $result;
            //return false;
		}
		elseif($type == "crypto")
		{
			$secret_key = $this->get_secret_key();
			$param = http_build_query(["CRLT-captcha-token" => $token, 'hashes' => 256, "secret" => $secret_key]);

			$ch = curl_init("https://api.crypto-loot.org/token/verify");
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);

	        $res = json_decode($result);
	        if($res->success){
	        	return true;
	        }
	        return false;
		}
        return false;
	}

	private function update($field, $value)
	{
		$res = $this->base->update(
			[$field => $value],
			['id' => 'xera_recaptcha'],
			'is_recaptcha',
			'recaptcha_'
		);
		if($res)
		{
			return true;
		}
		return false ;
	}

	private function fetch()
	{
		$res = $this->base->fetch(
			'is_recaptcha',
			['id' => 'xera_recaptcha'],
			'recaptcha_'
		);
		if(count($res) > 0)
		{
			return $res[0];
		}
		return false;
	}
}

?>
