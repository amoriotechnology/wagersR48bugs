<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_setup extends CI_Controller {
	
	public $company_id;
	function __construct() {
      parent::__construct(); 
      $this->db->query('SET SESSION sql_mode = ""');
		$this->load->library('auth');
		$this->load->library('lcompany');
		$this->load->library('session');
		$this->load->model('Companies');
		$this->auth->check_admin_auth();

    }
    #==============Company page load===========#
	public function index()
	{
		$content = $this->lcompany->company_add_form();
		$this->template->full_admin_html_view($content);
	}
	#===============Company Search Item===========#
	public function company_search_item()
	{	
		$company_id = $this->input->post('company_id');
        $content = $this->lcompany->company_search_item($company_id);
		$this->template->full_admin_html_view($content);
	}




	
	#===============Companybranch===========#
	public function company_branch()
	{	
		// $company_id = $this->input->post('company_id');
        $content = $this->lcompany->company_branch_total();
		$this->template->full_admin_html_view($content);
	}




















	#================Manage Company==============#
	public function manage_company()
	{
		$config = array();
		$config["base_url"] = base_url()."Company_setup/manage_company";
		$config["total_rows"] = $this->Companies->count_company();	  
		$config["per_page"] = 15;
		$config["uri_segment"] = 3;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
        $content = $this->lcompany->company_list($limit,$page,$links);
		$this->template->full_admin_html_view($content);
	}

	#===============Company update form================#
	public function company_update_form($company_id)
	{	
		$content = $this->lcompany->company_edit_data($company_id);
		$this->template->full_admin_html_view($content);
	}
	#===============Company update===================#
public function company_update()
{
	$CI = & get_instance();
	$CI->load->model('Web_settings');
	$setting_detail = $CI->Web_settings->retrieve_setting_editdata();
	$company_id  = $this->input->post('company_id',true);
	$url = $CI->Companies->editurldata($company_id);
	$url_st = $CI->Companies->editurlstdata($company_id);
	$url_lctx = $CI->Companies->editurllctxdata($company_id);
	$url_sstx = $CI->Companies->editurlsstxdata($company_id);
	$data=array(
		'company_id' 	=> $company_id,
		'company_name'  => $this->input->post('company_name',true),
		
		'email' 		=> $this->input->post('email',true),
		'address' 		=> $this->input->post('address',true),
		'mobile' 		=> $this->input->post('mobile',true),
		'website' 		=> $this->input->post('website',true),
		'Bank_Name'      => $this->input->post('Bank_Name',true),
		'Account_Number'      => $this->input->post('Account_Number',true),
		'Bank_Routing_Number'      => $this->input->post('Bank_Routing_Number',true),
		'Bank_Address'      => $this->input->post('Bank_Address',true),
		'Federal_Pin_Number'      => $this->input->post('Federal_Pin_Number',true),
		'url'      => $this->input->post('url',true),
		'url_st'      => $this->input->post('url_st',true),
		'url_lctx'      => $this->input->post('url_lctx',true),
		'url_sstx'      => $this->input->post('url_sstx',true),
		'st_tax_id'      => $this->input->post('statetx',true),
		'lc_tax_id'      => $this->input->post('localtx',true),
		'State_Sales_Tax_Number'      => $this->input->post('State_Sales_Tax_Number',true),
		'status' 	    => 1
		);
		// echo $this->db->last_query();die();
		// print_r($data); die();
	$this->Companies->update_company($data,$company_id);
	$this->session->set_userdata(array('message'=>display('successfully_updated')));
	redirect(base_url('Company_setup/manage_company'));
}		
}