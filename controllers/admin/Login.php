<?php
/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property CI_Input $input
 */
class Login extends CI_Controller {

    public function index() {
        $this->load->view('adminpanel/loginvew.php');
    }

    public function login_post() {
        // Gelen POST verilerini yazdırın (debug için)
        print_r($_POST);

        if ($this->input->post()) {
            $username = $this->input->post("username", TRUE); // Güvenlik için TRUE
            $password = $this->input->post("password", TRUE);

            // Veritabanı sorgusu
            $query = $this->db->query("SELECT * FROM `backendusers` WHERE `username` = '$username' AND `password` = '$password'");
            
            if ($query->num_rows() > 0) {
                $result = $query->row_array(); // İlk sonucu alın
                
                // Session'a kullanıcı ID'sini kaydet
                $this->session->set_userdata("uid", $result["uid"]);

                // Kullanıcıyı yönlendir
                redirect("admin/dashboard");
            } else {
                echo "No records found."; 
            }
        } else {
            die("Invalid Input!"); 
        }
    }
    function logout(){
      session_destroy();
    }
}