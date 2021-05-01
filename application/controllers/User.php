<?php
    class User extends CI_controller{

        function index(){
            $this->load->model('User_model');
            $users = $this->User_model->all();
            $data = array();
            $data['users'] = $users;
            $this->load->view('list',$data);
        }

        function create() {
            $this->load->model('User_model');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required');
       
            if($this->form_validation->run()==false){
                $this->load->view('create');
            }else{
                //save record to database
                $formArray = array();
                $formArray['username'] = $this->input->post('name');
                $formArray['email'] = $this->input->post('email');
                $formArray['password'] = $this->input->post('password');
                $formArray['createdAt'] = date('Y-m-d');
                $this->User_model->create($formArray);
                $this->session->set_flashdata('success','Record added successfully!');
                redirect(base_url().'index.php/user/index');
            }
        }

        function edit($userId){
            $this->load->model('User_model');
            $user = $this->User_model->getUser($userId);
            $data = array();
            $data['user'] = $user;

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required');
            
            if($this->form_validation->run()==false){
                $this->load->view('edit', $data);

            }else{
                //UPDATE record to database
                $formArray = array();
                $formArray['username'] = $this->input->post('name');
                $formArray['email'] = $this->input->post('email');
                $formArray['password'] = $this->input->post('password');
                $formArray['createdAt'] = date('Y-m-d');
                $this->User_model->updateUser($userId, $formArray);

                $this->session->set_flashdata('success','Record updated successfully!');
                redirect(base_url().'index.php/user/index');
            }            
        }

        function delete($userId){
            $this->load->model('User_model');
            $this->User_model->getUser($userId);
            if(empty($user)){
                $this->session->set_flashdata('failure','Record not found in database!');
                redirect(base_url().'index.php/user/index');
            }
            $this->User_model->deleteUser($userId);
            $this->session->set_flashdata('success','Record deleted successfully!');
            redirect(base_url().'index.php/user/index'); 
        }

    }
?>
