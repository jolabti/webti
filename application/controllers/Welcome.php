<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->model('Webmodel');

    // // Get preliminary data that will be often-used in Agent functions
    // $user   = $this->my_auth_library->get_user();
    // $agent  = $this->agent_model->get_agent($user->id);
}

	public function index()
	{

				if ($this->session->userdata('email')){
							$this->generalpage();
				}
				else{

					$this->load->view('login');

				}
		}

	function login(){

				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$test = $this->Webmodel->loginmodel($email,$password);

				if ($test!=NULL){
					foreach ($test as $row) {
						 $data= array(
							 'email' => $row->email_staff ,
							 'LOGGED_IN' => TRUE
						 );
					}

					$this->generalpage();
					$this->session->set_userdata($data);

			}
			else{

				$this->session->set_flashdata('message_name', 'This is my message');
				// After that you need to used redirect function instead of load view such as
				$this->index();

				// Get Flash data on view
				$this->session->flashdata('message_name');
			}


	}

	function generalpage(){
		$this->load->view('general');
	}
	function logout(){

		$this->session->sess_destroy();

		$this->index();
	}

}

?>
