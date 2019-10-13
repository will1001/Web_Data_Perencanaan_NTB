<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		$this->load->model('data_model', 'mData');
    }
    public function index()
	{
		$data['users'] = $this->mData->getUsers();

		$this->load->view('templates/header');
		$this->load->view('user/index', $data);
		// $this->load->view('templates/footer');
    }
    public function create()
	{
        if($this->input->post()){
            $data = [
                'username' => $this->input->post('username'),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'password' => $this->input->post('password'),
                'role_id' => 2, //user sebagai user biasa
                'is_active' => 1,
                'date_created' => time()
            ];
            print_r($data);
            $this->mData->saveUser($data);
            redirect('user');
        }else{
            $this->load->view('templates/header');
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        }
    }
    public function update()
	{
        $id = $this->input->get('id');
        $data['user'] = $this->mData->getUsers($id);
        // print_r($data);
        if($this->input->post()){
            $data = [
                'id' => $this->input->post('id'),
                'username' => $this->input->post('username'),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'password' => $this->input->post('password'),
            ];
            // print_r($data);
            $this->mData->updateUser($data);
            redirect('user');
        }else{
            $this->load->view('templates/header');
            $this->load->view('user/edit',$data);
            $this->load->view('templates/footer');
        }
    }
    public function delete(){
        $id = $this->input->get('id');
        $this->mData->deleteUser($id);
        redirect('user');
    }
}