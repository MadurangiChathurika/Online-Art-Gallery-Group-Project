<?php
class Register extends CI_Controller {
    public function Registeruser(){
        $this->form_validation->set_rules('fname','First name','required');
        $this->form_validation->set_rules('lname','Last name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('passwordagain','Re-enter Password','required|matches[password]');

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('register');
        }
        else
        {
            $this->load->model('Model_user');
            $response=$this->Model_user->insertuserdata();
            if($response)
            {
                $this->session->set_flashdata('msg','Registered Successfully!.please login');
                redirect('Customer_home/Register');
            }
            else
            {
                $this->session->set_flashdata('msg','something went wrong');
                redirect('Customer_home/Register');
            }
        }
    }
}

?>