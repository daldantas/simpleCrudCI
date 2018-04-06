<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Users extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    } 

    /*
     * Listing of users
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('user/index?');
        $config['total_rows'] = $this->User->get_all_users_count();
        $this->pagination->initialize($config);

        $data['users'] = $this->User->get_all_users($params);
        
        $data['_view'] = 'users/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required|max_length[255]');
		$this->form_validation->set_rules('email','Email','required|max_length[255]|valid_email');
		$this->form_validation->set_rules('cpf','Cpf','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'cpf' => $this->input->post('cpf'),
            );
            
            $user_id = $this->User->add_user($params);
            redirect('users/index');
        }
        else
        {            
            $data['_view'] = 'users/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a user
     */
    function edit($id)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User->get_user($id);
        
        if(isset($data['user']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','required|max_length[255]');
			$this->form_validation->set_rules('email','Email','required|max_length[255]|valid_email');
			$this->form_validation->set_rules('cpf','Cpf','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nome' => $this->input->post('nome'),
					'email' => $this->input->post('email'),
					'cpf' => $this->input->post('cpf'),
                );

                $this->User->update_user($id,$params);            
                redirect('users/index');
            }
            else
            {
                $data['_view'] = 'users/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function remove($id)
    {
        $user = $this->User->get_user($id);

        // check if the user exists before trying to delete it
        if(isset($user['id']))
        {
            $this->User->delete_user($id);
            redirect('users/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
    
}