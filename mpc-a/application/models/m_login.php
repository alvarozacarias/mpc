<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class M_login extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{
                $this->db->select("*");
		$this->db->where('usuario',$username);
		$this->db->where('contrasena',$password);
		$query = $this->db->get('Personal');
                                
		if($query->num_rows() == 1)
		{                     
                    return $query->row();                            			
		}else{                                  
                    $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
                    redirect(base_url().'index.php/c_login','refresh');                                                   
		}
	}        
}
