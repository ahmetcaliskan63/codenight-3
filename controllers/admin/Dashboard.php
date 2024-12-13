<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if (isset($_SESSION["uid"])) {
			// die("Session Set".$_SESSION["uid"]);
		$this->load->view('adminpanel/dashboard');
		}
		else{
			redirect(("admin/lodin"));
		}
	}

}