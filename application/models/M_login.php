<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Fauzan Caren.
 * User: OBI-WEB
 * Ver: v5.0.0
 * Date: 05/19/2021
 * To change this template use File | Settings | File Templates.
 */

class M_login extends CI_Model
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_app');
	}

    function login_email($email)
	{
		$user = str_replace("'", "''", $email);
		$query = $this->db->where("email",$user)->get("user");
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
    function login($email, $password)
	{
		$user = str_replace("'", "''", $email);
		//$pass = $this->M_app->EncryptedPassword(str_replace("'", "''", $password));
		$pass = str_replace("'", "''", $password);
        $query = $this->db->where("email",$user)->where("password",$password)->get("user");
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
}