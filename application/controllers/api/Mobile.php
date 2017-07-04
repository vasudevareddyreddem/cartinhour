<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Mobile extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->helper(array('url', 'html'));
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('mobile_model');
	}
    
	
	/* start seller register Apis */

	public function  seller_register_post()
	{
			$this->input->post();
			$mobile_number=$this->input->get('seller_mobile');
			$email=$this->input->get('seller_email');
			$mobile_check=$this->mobile_model->seller_mobile_check($mobile_number);
			//print_r($mobile_check);exit;
			$email_check =$this->mobile_model->seller_email_check($email);
			 //print_r($email_check);exit;
			if($mobile_check==0){
					$mobile = 0;//fail
				}else{
					$mobile = 1;//success
				}
				if($email_check==0){
					$email = 0;
				}else{
					$email = 1;
				}

			 if($mobile_check==1 || $email_check==1)
			 {
				
				echo "hello";exit;
			}else{
				
				
				echo $mobile;
				echo $email; exit;
			}

			if($mobile==0)
			{
				print_r($mobile);exit;
			
			}
			else
			{

				
			}
		}
			$mobile=$this->input->get('mobile');
			$email=$this->input->get('email');
			
			$mobile_check =$this->mobile_model->seller_mobile_check($mobile);
			$email_check =$this->mobile_model->seller_email_check($email);
			//echo '<pre>';print_r($email_check);
			//echo '<pre>';print_r($mobile_check);
			
			if((count($mobile_check)>0 ) && (count($email_check)>0 )) {
				$message = array('status'=>0,'message'=>'Mobile number and  email already exits. Please use another Mobile number and  email id.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if(count($mobile_check)>0){
				
				$message = array('status'=>0,'message'=>'Mobile number already exits. Please use another Mobile number.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if(count($email_check)>0){
				
				$message = array('status'=>0,'message'=>'Email Id already exits. Please use another Email Id.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else{
				
				/* for otp purpose */
				$six_digit_random_number = mt_rand(100000, 999999);
				$seller = 'SEL';
				$seller_rand_id = mt_rand(100000, 999999);
				$user_id="cartin"; 
				$pwd="9494422779";    
				$sender_id = "CARTIN";          
				$mobile_num = $mobile;  
				$message = "Your Temporary Password is : " .$six_digit_random_number;               
				// Sending with PHP CURL
				$url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
				$ret = file($url);
				/*-- */
					$details = array(
						'seller_rand_id' => $seller.''.$seller_rand_id,
						'seller_mobile' => $this->input->get('mobile'),
						'seller_name' => $this->input->get('name'),
						'seller_email' => $this->input->get('email'),
						'seller_password' => md5($this->input->get('password')),
						'mobile_verification' => $six_digit_random_number,
						'created_at'  => date('Y-m-d H:i:s'),
						'updated_at'  => date('Y-m-d H:i:s')
						);

				$savedetails=$this->mobile_model->seller_register($details);
				
				if(count($savedetails)>0){
					$data=array('seller_id'=>$savedetails);
					$this->mobile_model->seller_id_nsert($data);
					$message = array('status'=>1,'seller_id'=>$savedetails,'message'=>'verification Code send to your Mobile number');
						$this->response($message, REST_Controller::HTTP_OK);
				}
						

			}
		
	}
	
	/*mobile otp verification*/
	public function  otp_verification_post()
	{	
			$otp_verifing=$this->mobile_model->get_seller_details($this->input->get('seller_id'));
			//echo '<pre>';print_r($otp_verifing);exit;
			
			if($otp_verifing['mobile_verification']== $this->input->get('otp'))
			{
					$verify=$this->mobile_model->verifing_mobile($this->input->get('seller_id'),1);
					if(count($verify)>0){
						
						$message = array('status'=>1,'seller_id'=>$otp_verifing['seller_id'],'message'=>'Your mobile number is verified!');
						$this->response($message, REST_Controller::HTTP_OK);
					}
			}else{
				$message = array('status'=>0,'message'=>'Invalid mobile verification code. Please try again.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

	}
	/* login purpose*/
	public function  seller_login_post()
	{
		
		$username=$this->input->get('username');
		$password=$this->input->get('password');
		$login=$this->mobile_model->seller_login_check($username,md5($password));
		if(count($login)>0){
			$message = array('status'=>1,'seller_id'=>$login['seller_id'],'message'=>'Successfully login to your Account');
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Invalid Mobile number / Email Id or Password.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
		
	}
	/*get category list*/
	public function  get_category_list_get()
	{
		
		$category=$this->mobile_model->get_category_list();
		//echo '<pre>';print_r($category);exit;
		if(count($category)>0){
			$message = array('status'=>1,'category_list'=>$category,'message'=>'category list are found.');
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'category list are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
		
	}
	/* save category List*/
	public function  get_categorylist_save_post()
	{
		
		
		$categories=array_unique($this->input->get('seller_category_id[]'));
		$seller_id=$this->input->get('seller_id');
		$catresult=$this->mobile_model->get_old_seller_categories($this->input->get('seller_id'));
			foreach($catresult as $delcats){
				
				$this->mobile_model->delet_get_old_seller_categories($delcats['seller_cat_id']);
			}
		foreach($categories as $lists){
			$catname=$this->mobile_model->get_categories_name($lists);
			
		$data = array(
			'seller_id' => $this->input->get('seller_id'),
			'seller_category_id'=> $lists,
			'category_name'=> $catname['category_name'],
			'created_at'=> date('Y-m-d h:i:s'),
			'updated_at'=>  date('Y-m-d h:i:s'),
			);	
		
		if($lists!=''){
			$save_category=$this->mobile_model->insert_seller_cat($data);
		}
		//echo '<pre>';print_r($data);
		}
		if(count($save_category)>0){
			
			$message = array('status'=>1,'seller_id'=>$seller_id,'message'=>'category list are successfully saved.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
		
	}
	/* store details saving puepose*/
	public function save_store_details_post()
	{
		
		$seller_upload_file=$this->mobile_model->get_upload_file($this->input->get('seller_id'));
		if($this->input->get('gstinimage')!=''){
			$gstimg=base64_decode($this->input->get('gstinimage'));
			move_uploaded_file($gstimg['tmp_name'], "assets/sellerfile/" . $gstimg);

			}else{
			$gstimg=$seller_upload_file['gstinimage'];
			}
			$data = array(
			'store_name' => $this->input->get('businessname'),
			'addrees1'=> $this->input->get('address1'),
			'addrees2'=>$this->input->get('address2'),
			'area'=>$this->input->get('area'),
			'pin_code'=>$this->input->get('pincode'),
			'gstin'=>$this->input->get('gstin'),
			'gstinimage'=>$gstimg,
			'other_shops'=>$this->input->get('othershops'),
			'created_at'=> date('Y-m-d h:i:s'),
			);
			//echo '<pre>';print_r($data);exit;
			$cate_store_details=$this->mobile_model->save_store_details($this->input->get('seller_id'),$data);
			if(count($cate_store_details)>0){
				$message = array('status'=>1,'seller_id'=>$this->input->get('seller_id'),'message'=>'Store details are successfully saved.');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'some problem are in query');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
			}
			
	}
	
	/* get location list */
	public function  get_location_list_get()
	{
		
		$locations=$this->mobile_model->get_location_list();
		//echo '<pre>';print_r($category);exit;
		if(count($locations)>0){
			$message = array('status'=>1,'category_list'=>$locations,'message'=>'location list are found.');
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'location list are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}

		//inprogress_orders
		public function inprogress_orders_get()
		{
			$id = $this->input->get('seller_id');
			$inprogress_orders = $this->mobile_model->inprogress_orders($id);
			//print_r($inprogress_orders);
			if(count($inprogress_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Inprogress_orders'=>$inprogress_orders,		 			
					
		 	// 	);
  				$inprogress_orders['status']=1;
	 			$this->response($message, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Inprogress_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//delivery_orders
		public function delivery_orders_get()
		{
			$id = $this->input->get('seller_id');
			$delivery_orders = $this->mobile_model->delivery_orders($id);
			//print_r($delivery_orders);
			if(count($delivery_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Delivery_orders'=>$delivery_orders,		 			
					
		 	// 	);
  				$delivery_orders['status']=1;
	 				$this->response($delivery_orders, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Delivery_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//cancel_orders
		public function cancel_orders_get()
		{
			$id = $this->input->get('seller_id');
			$cancel_orders = $this->mobile_model->cancel_orders($id);
			if(count($cancel_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Cancel_orders'=>$cancel_orders,		 			
					
		 	// 	);
  				$cancel_orders['cancel_orders']=1;
	 			$this->response($cancel_orders, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Cancel_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//Seller Payments
		public function seller_payments_get()
		{
			$id = $this->input->get('seller_id');
			$payments = $this->mobile_model->payment_details($id);
			if(count($payments)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Seller_Payments'=>$payments,		 			
					
		 	// 	);
  				$payments['status']=1;
	 			$this->response($payments, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Payments'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//seller_request_service
		public function seller_request_service_post()
		{
			$id = $this->input->get('seller_id');
			$seller_name_get = $this->mobile_model->seller_name($id);
			foreach ($seller_name_get as $seller_name) {
				$name =$seller_name['seller_name'];
			}
			//print_r($name);exit;
			//print_r($seller_name);exit;
			$service = array(
  			'seller_id' => $id,
  			'seller_name'=>$name,
  	  		'phone_number' => $this->input->get('phone_number'),
  	  		'select_plan' => $this->input->get('plan'),
  	    	'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s'),
  	  	);
			//print_r($service);exit;
			$service_save = $this->mobile_model->services_save($service);
			//print_r($service_save);exit;
			if(count($service_save)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		//'Request Service'=>$service_save,
		 	// 		'message'=> 'Wait For Replay!!'		 			
					
		 	// 	);
  				$service['status']=1;
	 			$this->response($service, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'Empty'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}

		}

		//seller_offers
		public function seller_offers_get()
		{
			$id = $this->input->get('seller_id');
			$offers = $this->mobile_model->listing_category($id);
			 if(count($offers)>0){
			// 	$message = array
			// 	(
			// 		'status'=>1,
			// 		'Offers'=>$offers,							
			// 	);
				$offers['status']=1;
				$this->response($offers, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
					'message'=>'No Listings'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

		
	}
	public function save_personal_details_post()
	{
	
		$details = array(
			'seller_bank_account'=> $this->input->get('accountnumber'),
			'seller_account_name'=> $this->input->get('accountname'),
			'seller_aaccount_ifsc_code'=> $this->input->get('ifsccode'),
			);	
		$save_personal_details=$this->mobile_model->save_personal_details($this->input->get('seller_id'),$details);
		
		if(count($save_personal_details)>0){
			
			$message = array('status'=>1,'seller_id'=>$this->input->get('seller_id'),'message'=>'personal Details are saved.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'some problem are in query.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
		


}







	


