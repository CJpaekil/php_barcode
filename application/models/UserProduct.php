<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class UserProduct extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		
	}
	
	public function get(){
		$this->db->from('product');
		$result=$this->db->get()->result();
		return $result;
	}
	public function getData($OrderID){
		$AlldataByorderID=array();
		
		for ($i=0;$i<count($OrderID);$i++)
		{
			$this->db->from('product');
			$this->db->where('order_id', $OrderID[$i]);
			$dataByorderID = $this->db->get()->result();
			array_push($AlldataByorderID,$dataByorderID);
		}
		return $AlldataByorderID;
	}
	/*
	public function create_user($username, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('users', $data);
		
	}

	public function resolve_user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}

	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
*/

	
}