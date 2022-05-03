<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();

		$this->load->library(['ion_auth', 'form_validation','upload']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */

	function add_content(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->data['title'] = 'Add content';

		$this->data['category'] = $this->db->get('category')->result();
		$this->data['prod_cat'] = $this->db->get('products_category')->result();
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'add_content', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');

	}
	function edit_content($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->data['title'] = 'Edit content';
		$this->db->join('cover', 'content.id = cover.content_id','left');
		$this->db->join('content_data', 'content.id = content_data.id','left');
		$this->db->where('content.id',$id);
		$this->db->where('lang_id','1');
		$this->data['content'] = $this->db->get_where('content')->result()[0];

		$this->data['category'] = $this->db->get('category')->result();
		$this->data['lang'] = $this->db->get('lang')->result();
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_content', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');

	}
	function add_product_cat(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if($this->input->post('c')!=null){
			$this->db->insert('products_category',array(
				'category_name'=> $this->input->post('c'),
				'parent_id'=> $this->input->post('p')
			));
		}


		}
	function del_product_cat(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if($this->input->post('i')!=null){
			$this->db->where('id',$this->input->post('i'));
			$this->db->delete('products_category');
		}

	}
	function special($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->data['content'] = $this->db->get_where('special', array('id'=>$id))->result()[0];

		$this->data['title'] = 'Edit '.$this->data['content']->name;

		if($this->input->post('c') !=null){
			$this->db->where('id',$id);
			$this->db->update('special',array('content'=>$this->input->post('c')));

		}




		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'special', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');


	}

	function update_content(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if($this->input->post('title')!=null){



			$data['category_id'] = $this->input->post('category');
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('content', $data);

			$data2['content'] = $this->input->post('content');
			$data2['title'] = $this->input->post('title');
			$this->db->where('id',$this->input->post('id'));
			$this->db->where('lang_id',$this->input->post('lang'));
			$this->db->update('content_data', $data2);

			$upload_config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/cover/';
			$upload_config['allowed_types'] = '*';
			$upload_config['file_name'] = 'cover'.time();
			$this->upload->initialize($upload_config);
			if ( ! $this->upload->do_upload('cover')){
				$error = array('error' => $this->upload->display_errors());
			}else{
				$insert_cover['cover_file'] =  $this->upload->data('file_name');
				if($this->db->get_where('cover', array('content_id'=> $this->input->post('id')))
					->num_rows()) {
					$this->db->where('content_id', $this->input->post('id'));
					$this->db->update('cover', $insert_cover);
				}else{
					$insert_cover['content_id'] = $this->input->post('id');
					$this->db->insert('cover', $insert_cover);
				}
			}

		}
	}

	function main_content(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = 'Edit main content';
		$this->data['content']=$this->db->get('main')->result();
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'main_content', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');
	}

	function main_list(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = 'Edit main lists';
		$this->data['list_head'] = $this->db->get('main_list')->result()[0];

		$this->data['col1'] = $this->db->get_where('main_list_item',array('list_id'=>1))->result();
		$this->data['col2'] = $this->db->get_where('main_list_item',array('list_id'=>2))->result();

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'main_list', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');

		if($this->input->post('h') !=null){
			$this->db->where('id',1);
			$this->db->update('main_list',array('list_name'=>$this->input->post('h')));

		}

		if($this->input->post('list_item') !=null){
			$this->db->where('id',$this->input->post('i'));
			$this->db->update('main_list_item',array('item_name'=>$this->input->post('list_item')));

		}

		if($this->input->post('del_id') !=null){
			$this->db->where('id',$this->input->post('del_id'));
			$this->db->delete('main_list_item');

		}


		if($this->input->post('n') !=null){
			$this->db->insert('main_list_item',array(
				'list_id'=>$this->input->post('i'),
				'item_name'=>$this->input->post('n')
			));
		}




	}

	function update_main(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$data['content'] = $this->input->post('c');
		$this->db->where('id',$this->input->post('i'));
		$this->db->update('main',$data);


	}

	function managment (){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->data['title'] = 'Managment';
		$this->data['mc'] = $this->db->get('manag_content')->result();
		$this->data['users'] = $this->db->get('manag_users')->result();
		$this->data['comm'] = $this->db->get('manag_comm')->result();
		$this->data['file_groups'] = $this->db->get('manag_files_group')->result();
		$this->data['files'] = $this->db->order_by('order','asc')->get('manag_files')->result();


		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'managment', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');

	}

	function sort_order(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if($this->input->post('s')){
			$this->db->where('id',$this->input->post('i'));
			$this->db->update('oc_manag_users',array('sort'=>$this->input->post('s')));
		}

	}
	function file_group(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post('group_name')){
			$this->db->insert('oc_manag_files_group',array('name'=>$this->input->post('group_name')));
		}
	}

	function file_url(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post('o')){
			$this->db->where('id',$this->input->post('i'));
			$this->db->update('oc_manag_files',array('url'=>$this->input->post('o')));
		}
	}
	function del_url(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post()){
			$this->db->where('id',$this->input->post('i'));
			$this->db->delete('oc_manag_files');
		}
	}

	function up_order(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post()){
			$this->db->where('id',$this->input->post('i'));
			$this->db->update('manag_files',array('order'=>$this->input->post('o')));

		}

	}

	function edit_gr(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post()){
			$this->db->where('id',$this->input->post('i'));
			$this->db->update('oc_manag_files_group',array('name'=>$this->input->post('o')));

		}

	}

	function add_file(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post()){
			$this->db->insert('oc_manag_files',$this->input->post());
		}
	}

	function del_file(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post()){
			$this->db->delete('oc_files',array('id'=>$this->input->post('i')));
		}
	}

	function del_comm($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->db->delete('manag_comm',array('id'=>$id));


	}

	function del_user($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->db->delete('manag_users',array('id'=>$id));


	}

	function manag_comm(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

			$data = $this->input->post();
			$this->db->insert('manag_comm', $data);

	}




	function manag_users(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}


		$upload_config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/photo/';
		$upload_config['allowed_types'] = '*';
		$this->upload->initialize($upload_config);
		if ( ! $this->upload->do_upload('photo')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = $this->input->post();
			$data['photo'] =  $this->upload->data('file_name');
			$this->db->insert('manag_users', $data);

		}

	}

	function markets(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->data['title'] = 'Markets';
		$this->data['markets'] = $this->db->get('markets')->result();

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'markets', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');

		if($this->input->post('t')!=''){
			$this->db->insert('markets',array('title'=>$this->input->post('t')));

		}
		if($this->input->post('i')!=''){
			$this->db->where('id',$this->input->post('i'));
			$this->db->update('markets',array('title'=>$this->input->post('u')));

		}

	}

	function manage_content($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post('c')){
			$this->db->where('id',$id);
			$this->db->update('manag_content',array('content'=>$this->input->post('c')));
		}


	}
	function udpate_user($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post('name')){
			$this->db->where('id',$id);
			$this->db->update('manag_users',array(
				'name'=>$this->input->post('name'),
				'description'=>$this->input->post('text'),
				'pos'=>$this->input->post('pos'),
				));
		}


	}


	function products(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = 'Products';

		$this->data['category'] = $this->db->get('products_category')->result();

		$this->db->join('content_data', 'content.id = content_data.id','left');
		$this->data['products'] = $this->db->get_where('content',array(
			'content.category_id'=>'5',
			'lang_id'=>'1',
		))->result();

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'products', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');




	}
	function files(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = 'Files';

		$this->data['files'] = $this->db->get('files')->result();

		$upload_config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/files/';
		$upload_config['allowed_types'] = '*';
		$upload_config['file_name'] = 'fl'.time();
		$this->upload->initialize($upload_config);
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$insert_cover['file_url'] =  $this->upload->data('file_name');
			$insert_cover['alias'] = time();
			$insert_cover['file_name'] = $this->input->post('name');
			$this->db->insert('files', $insert_cover);

		}


		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'files', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');




	}
	function reporting(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = 'Reporting';



		$this->db->join('content_data', 'content.id = content_data.id','left');
		$this->data['reports'] = $this->db->get_where('content',array(
			'content.category_id'=>'6',
			'lang_id'=>'1',
		))->result();

		$this->data['links'] = $this->db->get('reporting')->result();


		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reporting', $this->data);
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');




	}


	function del_rep(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->db->delete('reporting',array('id'=>$this->input->post('id')));
	}
	function add_rep(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$data['rep_id'] = $this->input->post('i');
		$data['link'] = $this->input->post('link');
		$data['link_name'] = $this->input->post('name');
		$this->db->insert('reporting',$data);
	}

	function update_prod(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if($this->input->post('p')!=null){
			$this->db->delete('product_to_category',array('content_id'=>$this->input->post('p')));
			$this->db->insert('product_to_category',array(
				'content_id'=>$this->input->post('p'),
				'category_id'=>$this->input->post('c')
			));

		}
	}
	function update_cat(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if($this->input->post('p')!=null){
			$this->db->where('id',$this->input->post('p'));
			$this->db->update('products_category',array(
				'category_name'=>$this->input->post('v')
			));

		}
	}

	function delete_content($id){
		$this->db->where('id', $id);
		$this->db->delete('content');
		$this->db->where('id', $id);
		$this->db->delete('content_data');
		redirect(base_url().'panel');
	}


	function save_content(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		if($this->input->post('title')!=null){


			$data['date'] = time();
			$data['category_id'] = $this->input->post('category');
			$this->db->insert('content', $data);
			$data2['id'] = $this->db->insert_id();
			$data2['lang_id'] = 1;
			$data2['content'] = $this->input->post('content');
			$data2['title'] = $this->input->post('title');
			$this->db->insert('content_data', $data2);

			if($this->input->post('category_product')!= null){

				$this->db->insert('product_to_category', array(
					'category_id'=>$this->input->post('category_product'),
					'content_id'=>$data2['id']
				));

			}

			if($this->input->post('ln')!= null){

				$this->db->insert('reporting', array(
					'link_name'=>$this->input->post('ln'),
					'link'=>$this->input->post('ll'),
					'rep_id'=>$data2['id']
				));

			}

			$upload_config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/cover/';
			$upload_config['allowed_types'] = '*';
			$upload_config['file_name'] = 'cover'.time();
			$this->upload->initialize($upload_config);
			if ( ! $this->upload->do_upload('cover')){
				$error = array('error' => $this->upload->display_errors());
			}else{
				$insert_cover['cover_file'] =  $this->upload->data('file_name');
				$insert_cover['content_id'] =  $data2['id'];
				$this->db->insert('cover',$insert_cover);
			}

		}

	}

	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			
			//USAGE NOTE - you can do more complicated queries like this
			//$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
			
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->db->join('content_data','content.id = content_data.id');
			$this->db->join('category','category.category_id = content.category_id');
			$this->db->where('lang_id','1');

			if( $this->uri->segment(2)){
				$sort['news'] = '1';
				$sort['prod'] = '5';
				$sort['rep'] = '6';
				$this->db->where('category.category_id',$sort[$this->uri->segment(2)]);
			}

			$this->data['content'] = $this->db->get('content')->result();

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'header');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'top_menu');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'left_menu');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'bread');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $this->data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'footer');
		}
	}

	/**
	 * Log the user in
	 */
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect(base_url().'/panel', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];

			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
			];

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'head', $this->data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'login', $this->data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$this->ion_auth->logout();

		// redirect them to the login page
		redirect('auth/login', 'refresh');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = [
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			];
			$this->data['new_password'] = [
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['new_password_confirm'] = [
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['user_id'] = [
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			];

			// render
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
			];

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$this->data['title'] = $this->lang->line('reset_password_heading');
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = [
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['new_password_confirm'] = [
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['user_id'] = [
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				];
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
			}
			else
			{
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($identity);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		$activation = FALSE;

		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$this->data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			];
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			];
			$this->data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			];
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];
			$this->data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			];
			$this->data['company'] = [
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			];
			$this->data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			];
			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			];
			$this->data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			];

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user', $this->data);
		}
	}
	/**
	* Redirect a user checking if is admin
	*/
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		redirect('/', 'refresh');
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();
			
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = [
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				];

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$this->ion_auth->remove_from_group('', $id);
					
					$groupData = $this->input->post('groups');
					if (isset($groupData) && !empty($groupData))
					{
						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->redirectUser();

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->redirectUser();

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		];

		$this->_render_page('auth/edit_user', $this->data);
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
			else
            		{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
            		}			
		}
			
		// display the create group form
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['group_name'] = [
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name'),
		];
		$this->data['description'] = [
			'name'  => 'description',
			'id'    => 'description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('description'),
		];

		$this->_render_page('auth/create_group', $this->data);
		
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'trim|required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], array(
					'description' => $_POST['group_description']
				));

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
					redirect("auth", 'refresh');
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}				
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = [
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
		];
		if ($this->config->item('admin_group', 'ion_auth') === $group->name) {
			$this->data['group_name']['readonly'] = 'readonly';
		}
		
		$this->data['group_description'] = [
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		];

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return [$key => $value];
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

}
