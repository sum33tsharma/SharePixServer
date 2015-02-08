<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function signUp()
	{
		$first_name = $_POST["FirstName"];
		$last_name = $_POST["LastName"];
		$email = $_POST["Email"];
		$password = md5($_POST["Password"]);

		$fields = array('first_name'=>$first_name, 'last_name'=>$last_name, 'email_id'=>$email, 'password'=>$password);
		$this->db->insert('users', $fields);
		echo "done";
	}

	public function login()
	{
		$email = $_POST["Email"];
		$password = md5($_POST["Password"]);
		$query = "SELECT userid FROM users WHERE email_id = '".$email."' AND password = '".$password."'";
		$result = $this->db->query($query);
		if(($result->num_rows())>0){
			echo "done";
		} else {
			echo "invalid";
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */