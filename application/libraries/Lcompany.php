<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lcompany {

	#==============Company list================#
	public function company_list($limit,$page,$links)
	{
$CI =& get_instance();
		$CI->load->model('Companies');
		$CI->load->model('Web_settings');


		$company_list = $CI->Companies->company_list($limit,$page);


		$company_info = $CI->Companies->company_info();
		$company_admin_info = $CI->Companies->company_admin_info();
		$setting_detail = $CI->Web_settings->retrieve_setting_editdata();


		$i=$page;
		if(!empty($company_list)){	
			foreach($company_list as $k=>$v){$i++;
			   $company_list[$k]['sl']=$i;
			}
		}
		$data = array(
				'title'        => display('manage_company'),
				'company_list' => $company_list,


				'company_info' => $company_info,
				'company_id' =>$company_info[0]['company_id'],
				'company_admin_info' => $company_admin_info,

				'links'        => $links,
				'setting_detail' => $setting_detail

			);
		$companyList = $CI->parser->parse('company/company',$data,true);
		return $companyList;
	}






	#=============Company Search item===============#
	public function company_branch_total()
	{ 
		   $CI = & get_instance();
           $CI->load->model('Web_settings');
           $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
		   $state_list = $CI->Companies->retrieve_statetax();
		   $local_list = $CI->Companies->retrieve_localtax();


        $data = array(
            'title' => display('manage_users'),
			'setting_detail' => $setting_detail,
			'state' => $state_list,
			'local' => $local_list,
        );
        $userForm = $CI->parser->parse('company/companybranch', $data, true);
        return $userForm;

		
	}






	#=============Company Search item===============#
	public function company_search_item($company_id)
	{
		$CI =& get_instance();
		$CI->load->model('Suppliers');
		$company_list = $CI->Companies->company_search_item($company_id);
		$i=0;
		foreach($company_list as $k=>$v){$i++;
           $company_list[$k]['sl']=$i;
		}
		$data = array(
				'title' 		=> display('manage_company'),
				'company_list' 	=> $company_list
			);
		$companyList = $CI->parser->parse('company/company',$data,true);
		return $companyList;
	}
#===============Company edit form==============#
public function company_edit_data($company_id)
	{
		$CI =& get_instance();
		$CI->load->model('Companies');
		$CI->load->model('Web_settings');
		$company_detail = $CI->Companies->retrieve_company_editdata($company_id);
	
		$editstate = $CI->Companies->editstatedata();
		$editlocal = $CI->Companies->editlocaldata();
		
	
		$url = $CI->Companies->editurldata($company_id);
	//print_r($url);echo "<br/>";
		$url_st = $CI->Companies->editurlstdata($company_id);
		//print_r($url_st);echo "<br/>";
		$url_lctx = $CI->Companies->editurllctxdata($company_id);
	//	print_r($url_lctx);echo "<br/>";
		$url_sstx = $CI->Companies->editurlsstxdata($company_id);
		//	print_r($url_sstx);echo "<br/>";
//die();
		$setting_detail = $CI->Web_settings->retrieve_setting_editdata();
		$data=array(
			'c_id' =>$company_id,
			'title' 		=> display('company_edit'),
			'company_id' 	=> $company_detail[0]['company_id'],
			'company_name' 	=> $company_detail[0]['company_name'],
			'email' 		=> $company_detail[0]['email'],
			'c_city' 		=> $company_detail[0]['c_city'],
			'c_state' 		=> $company_detail[0]['c_state'],
			'address' 		=> $company_detail[0]['address'],
			'mobile' 		=> $company_detail[0]['mobile'],
			'website' 		=> $company_detail[0]['website'],
			'Bank_Name' 		=> $company_detail[0]['Bank_Name'],
			'Account_Number' 		=> $company_detail[0]['Account_Number'],
			'Bank_Routing_Number' 		=> $company_detail[0]['Bank_Routing_Number'],
			'Bank_Address' 		=> $company_detail[0]['Bank_Address'],
			'Federal_Pin_Number'         => $company_detail[0]['Federal_Pin_Number'],
            'State_Tax_ID_Number'       => $company_detail[0]['State_Tax_ID_Number'],
			
			'url' 		=> $url,
			'url_st' 		=> $url_st,
			'url_lctx' 		=> $url_lctx,
			'url_sstx' 		=> $url_sstx,
			// 'url1' 		=> $company_detail[0]['url1'],
			'st_tax_id' => $company_detail[0]['st_tax_id'],
			'lc_tax_id' => $company_detail[0]['lc_tax_id'],
			'State_Sales_Tax_Number' => $company_detail[0]['State_Sales_Tax_Number'],
			'status' 		=> $company_detail[0]['status'],
			'setting_detail' => $setting_detail,
			'editState' => $editstate,
			'editLocal' => $editlocal,
			
			
			);
	//	print_r($data);
		$companyList = $CI->parser->parse('company/edit_company_form',$data,true);
		return $companyList;
	}
}
?>