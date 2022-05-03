<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['cotent'] = $this->db->get('main')->result();
		$data['list_head'] = $this->db->get('main_list')->result()[0];
		$data['col1'] = $this->db->get_where('main_list_item',array('list_id'=>1))->result();
		$data['col2'] = $this->db->get_where('main_list_item',array('list_id'=>2))->result();

		$this->load->view('main',$data);
	}

	public function markets(){
		$data['title'] = 'Markets';
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');
		$this->load->view('bread',$data);
		$this->load->view('markets');
		$this->load->view('footer');
	}

	public function clearing(){
		$data['title'] = 'Clearing';
		$data['content'] = $this->db->get_where('special', array(
			'id'=>1
		))->result()[0];
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');
		$this->load->view('bread',$data);
		$this->load->view('special');
		$this->load->view('footer');
	}


	public function contracting(){
		$data['title'] = 'Contacting';
		$data['content'] = $this->db->get_where('special', array(
			'id'=>3
		))->result()[0];
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');
		$this->load->view('bread',$data);
		$this->load->view('special');
		$this->load->view('footer');
	}

	public function trade_finance(){
		$data['title'] = 'Trade Finance';
		$data['content'] = $this->db->get_where('special', array(
			'id'=>2
		))->result()[0];
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');
		$this->load->view('bread',$data);
		$this->load->view('special');
		$this->load->view('footer');
	}



	public function products(){
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');

		$data['title'] = 'Products';
		$this->db->join('content_data','content_data.id = content.id');
		$this->db->join('product_to_category','product_to_category.content_id = content.id');
		$data['products'] = $this->db->get_where('content', array(
			'content.category_id'=>5,
			'lang_id'=>1
		))->result();

		$data['category'] = $this->db->get_where('products_category',array('parent_id'=>'0'))->result();

		$this->load->view('bread',$data);

		$this->load->view('products');
		$this->load->view('footer');
	}


	public function reporting(){
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');

		$data['title'] = 'Reporting';
		$this->db->join('content_data','content_data.id = content.id');
		$data['contents'] = $this->db->get_where('content', array(
			'content.category_id'=>6,
			'lang_id'=>1
		))->result();



		$this->load->view('bread',$data);

		$this->load->view('reporting');
		$this->load->view('footer');
	}

	public function products_category($id){
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');
		$data['category'] = $this->db->get_where('products_category',array('id'=>$id))->result()[0];
		$data['title'] = $data['category']->category_name ;
		$this->db->join('content_data','content_data.id = content.id');
		$this->db->join('product_to_category','product_to_category.content_id = content.id');
		$data['products'] = $this->db->get_where('content', array(
			'content.category_id'=>5,
			'product_to_category.category_id'=>$id,
			'lang_id'=>1
		))->result();



		$this->load->view('bread',$data);

		$this->load->view('products_category');
		$this->load->view('footer');
	}

	public function product($id){
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');
		$data['bread_category'] = 'Products';
		$this->db->join('content_data','content_data.id = content.id');
		$this->db->join('product_to_category','product_to_category.content_id = content.id');
		$data['product'] = $this->db->get_where('content', array(
			'content.id'=>$id,
			'lang_id'=>1
		))->result()[0];
		$data['title'] = $data['product']->title ;




		$this->load->view('bread',$data);

		$this->load->view('product');
		$this->load->view('footer');
	}



	public function contact(){
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');


		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function management(){
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');

		$data['mc'] = $this->db->get('manag_content')->result();
		$data['users1'] = $this->db->order_by('sort','asc')->get_where('manag_users',array('category_id'=>'1'))->result();
		$data['users2'] = $this->db->order_by('sort','asc')->get_where('manag_users',array('category_id'=>'2'))->result();
		$data['comm'] = $this->db->get('manag_comm')->result();

		$data['file_groups'] = $this->db->get('manag_files_group')->result();
		$data['files'] = $this->db->order_by('order','asc')->get('manag_files')->result();

		$this->load->view('managment',$data);
		$this->load->view('footer');
	}
	function news(){
		$this->db->join('cover','cover.content_id = content.id','left');
		$this->db->join('content_data','content_data.id = content.id','right');
		$this->db->order_by('content.id', 'desc');

		$data['news'] = $this->db->get_where('content', array('category_id'=>'1'))->result();
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');

		$data['bread_category'] = 'News';
		$this->load->view('news',$data);
		$this->load->view('footer');
	}

	function single_news($id){
		$this->db->join('cover','cover.content_id = content.id','left');
		$this->db->join('content_data','content_data.id = content.id','right');
		$this->db->order_by('content.id', 'desc');
		$data['news'] = $this->db->get_where('content', array('category_id'=>'1','content.id'=>$id))->result()[0];

		$this->db->join('cover','cover.content_id = content.id','left');
		$this->db->join('content_data','content_data.id = content.id','right');
		$this->db->order_by('content.id', 'desc');
		$data['news_l'] = $this->db->get_where('content', array('category_id'=>'1'))->result();
		$this->load->view('header');
		$this->load->view('mobile_menu_w');
		$this->load->view('menu');

		$data['title'] = $data['news']->title;
		$data['bread_category'] = 'News';
		$this->load->view('bread',$data);

		$this->load->view('single_news',$data);
		$this->load->view('footer');
	}



	public function send_mail() {

		$this->load->library('email');
		$from_email = "info@octolng.com";
		$to_email = 'info@octolng.com';
		//Load email library

		$this->email->from($from_email, 'Contact us');
		$this->email->to($to_email);
		$this->email->subject('Octo Mail');
		$this->email->message( $this->input->post('name').'('.$this->input->post('email').'): .'. $this->input->post('text'));
		var_dump($this->email->send());
		echo $this->email->print_debugger(array('headers'));
		redirect(base_url());



	}


}
