<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Fauzan Caren.
 * User: OBI-WEB
 * Ver: v5.0.0
 * Date: 05/19/2021
 * To change this template use File | Settings | File Templates.
 */

class M_app extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    function EncryptedPassword($pass)
	{
		$str1 = " ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890?!@#$%^&*()_+|;:,'.-`~";
		$str2 = "?!@#$%^&*()_+|;:,'.-`~1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		$DecryptedText = "";
		for ($x = 1; $x <= strlen($pass); $x++) {

			$ori = substr($pass, $x - 1, 1);
			$lngPos  = strpos($str1, $ori);
			$DecryptedChr = substr($str2, $lngPos, 1);

			//echo substr($pass, $x, 1)."<br>";
			if ($lngPos > 0) {
				$DecryptedText = $DecryptedText . $DecryptedChr;
			} else {
				$DecryptedText = substr($pass, $x, 1);
			}
		}
		return $DecryptedText;
	}
	function DecryptedPassword($pass)
	{
		$str2 = " ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890?!@#$%^&*()_+|;:,'.-`~";
		$str1 = "?!@#$%^&*()_+|;:,'.-`~1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		$DecryptedText = "";
		for ($x = 1; $x <= strlen($pass); $x++) {

			$ori = substr($pass, $x - 1, 1);
			$lngPos  = strpos($str1, $ori);
			$DecryptedChr = substr($str2, $lngPos, 1);

			//echo substr($pass, $x, 1)."<br>";
			if ($lngPos > 0) {
				$DecryptedText = $DecryptedText . $DecryptedChr;
			} else {
				$DecryptedText = substr($pass, $x, 1);
			}
		}
		return $DecryptedText;
	}
}