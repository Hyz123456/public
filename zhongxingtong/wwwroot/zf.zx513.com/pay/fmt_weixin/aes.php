 <?php

	class Aes {
		public static function encrypt($input, $key) {
		//$key=md5($key.md5($key));
		$size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
		$input = Aes::pkcs5_pad($input, $size);
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
		$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, $key, $iv);
		$data = mcrypt_generic($td, $input);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		$data = base64_encode($data);
		return $data;
		}
	 
		private static function pkcs5_pad ($text, $blocksize) {
			$pad = $blocksize - (strlen($text) % $blocksize);
			return $text . str_repeat(chr($pad), $pad);
		}
	 
		public static function decrypt($dStr, $dKey) {
			//$dKey=md5($dKey.md5($dKey));
			$decrypted= mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$dKey,base64_decode($dStr),MCRYPT_MODE_ECB);
			 $dec_s = strlen($decrypted);
			$padding = ord($decrypted[$dec_s-1]);
			$decrypted = substr($decrypted, 0, -$padding);
			return $decrypted;
		}
	}
	$data ='Fzfg/jBJwbAsabfT8eQ5l0hru6l+WJm7/lLx6bU8J2JnQKCggSE5QxRWgMGcAuHN+Bmk1XhCO+jIQl2gBshP3vyqyjBFBJmzad+aeNLvezui1hDYSg9rxwAs6Xqbz6vNPtiUWJEJyGKMjTzCOMK3sPo6dX85xchaGk+A2LTGkVTPV6MWmjB5YEXU4uy0AZkaq0QMWU0ByeEJ7p/KcSEYXep1/nZ4clYbNO4AavRqdiwRlMAGtaCDIKH2rSJvRWzRRA92Mb3JEYixESrrm5P0ooLN+7hNRDBESmyCam5oZwI=';
	$aes = new Aes();
	
	//echo $aes->decrypt($data , '77884311af854e2ea4d0d4e8921394e7');
?>