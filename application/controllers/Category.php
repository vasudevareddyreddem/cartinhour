<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Category extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url','html','form'));
			$this->load->library('session');
			$this->load->model('category_model'); 
			
 }
 
 public function subview(){
	 $this->template->write_view('content', 'customer/added_page');
	$this->template->render();
 }
 public function subcategorywiseearch(){
	 
	
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	
				if(isset($post['searchvalue']) && $post['searchvalue']=='status' && $post['unchecked']!='uncheck'){
					$status=$post['productsvalues'];
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						$this->category_model->update_status_privous_subcategorysearchdata($list['id'],$post['productsvalues']);
					} 
				}else{
					
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					if(count($removesearch)>0){
					if(isset($removesearch[0]['status']) && $removesearch[0]['status']==''){
						$status=1;
					}else{
						$status=$removesearch[0]['status'];
					}
					
					}else{
						$status=1;
					}
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='cusine' && $post['unchecked']!='uncheck'){
					$cus=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='cusine'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['cusine']==$post['productsvalues']){
						$this->category_model->update_cusine_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$cus='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='res' && $post['unchecked']!='uncheck'){
					$res=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='res'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['restraent']==$post['productsvalues']){
						$this->category_model->update_res_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$res='';
				}
				
				if($post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['offers']==$post['productsvalues']){
						$this->category_model->update_offer_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$offer='';
				}
				if($post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$this->category_model->update_brand_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$brand='';
				}
				if($post['searchvalue']=='discount' && $post['unchecked']!='uncheck'){
					$discount=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='discount'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['discount']==$post['productsvalues']){
						$this->category_model->update_discount_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$discount='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='color' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='color'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['color']==$post['productsvalues']){
						$this->category_model->update_color_privoussubcategory_searchdata($list['id'],'');
						}
					} 
				}else{
					$color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$this->category_model->update_size_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
					$ram=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['ram']==$post['productsvalues']){
						$this->category_model->update_ram_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$ram='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
					$colour=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['colour']==$post['productsvalues']){
						$this->category_model->update_colour_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$colour='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
					$os=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['os']==$post['productsvalues']){
						$this->category_model->update_os_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$os='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
					$sim_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['sim_type']==$post['productsvalues']){
						$this->category_model->update_sim_type_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$sim_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='camera' && $post['unchecked']!='uncheck'){
					$camera=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='camera'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['camera']==$post['productsvalues']){
						$this->category_model->update_camera_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$camera='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='internal_memeory' && $post['unchecked']!='uncheck'){
					$internal_memeory=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_memeory'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['internal_memeory']==$post['productsvalues']){
						$this->category_model->update_internal_memeory_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$internal_memeory='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='screen_size' && $post['unchecked']!='uncheck'){
					$screen_size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='screen_size'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['screen_size']==$post['productsvalues']){
						$this->category_model->update_screen_size_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$screen_size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='Processor' && $post['unchecked']!='uncheck'){
					$Processor=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='Processor'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['Processor']==$post['productsvalues']){
						$this->category_model->update_Processor_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$Processor='';
				}
				
				
				
				
		
	
	$ip=$this->input->ip_address();
	
	$data1=array(
	'Ip_address'=>$ip,
	'category_id'=>$post['categoryid'],
	'subcategory_id'=>$post['subcategoryid'],
	'mini_amount'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'max_amount'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'cusine'=>isset($cus) ? $cus:'',
	'restraent'=>isset($res) ? $res:'',
	'offers'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'discount'=>isset($discount) ? $discount:'',
	'color'=>isset($color) ? $color:'',
	'ram'=>isset($ram) ? $ram:'',
	'colour'=>isset($colour) ? $colour:'',
	'os'=>isset($os) ? $os:'',
	'sim_type'=>isset($sim_type) ? $sim_type:'',
	'camera'=>isset($camera) ? $camera:'',
	'internal_memeory'=>isset($internal_memeory) ? $internal_memeory:'',
	'screen_size'=>isset($screen_size) ? $screen_size:'',
	'Processor'=>isset($Processor) ? $Processor:'',
	'status'=>isset($status) ? $status:'',
	'create'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$brand1= $this->category_model->save_sub_searchdata($data1);
	if(count($brand1)>0){
		$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
		foreach ($removesearch as $list){
			$this->category_model->update_amount_privous_subcategory_wise_searchdata($post['mini_mum'],$post['maxi_mum'],$list['id']);
			//echo $this->db->last_query();exit;
		
		}
		redirect('category/subcategoryfiltersearch');
		
	}
		
	
	

} 
 public function subcategoryfiltersearch(){
	 
	$post=$this->input->post();
	$subcategory_porduct_list= $this->category_model->get_search_all_subcategorywise_products();
	
	//echo '<pre>';print_r($subcategory_porduct_list);exit;
	//echo count($subcategory_porduct_list['mini_amount']);exit;
	$data['cat_subcat_ids']= $this->category_model->get_search_all_subcategory_id();

	$caterory_id=$data['cat_subcat_ids'][0]['category_id'];
	$subcaterory_id=$data['cat_subcat_ids'][0]['subcategory_id'];
		
		foreach($subcategory_porduct_list as $list){
						
						foreach($list as $li){
							foreach($li as $l){
							$idslist[]=$l['item_id'];
							}
						}
					}
					//echo '<pre>';print_r($idslist);exit;
					if(isset($idslist) && count($idslist)>0){
							$result = array_unique($idslist);
							//echo '<pre>';print_r($result);exit;
							foreach ($result as $pids){
								$products_list[]=$this->category_model->get_product_details($pids);
							}
								$data['subcategory_porduct_list']=$products_list;
							foreach($data['subcategory_porduct_list'] as $list){
								//echo '<pre>';print_r($list);
								$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
								$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
							}

							$data['avg_count']=$reviewrating;
							$data['rating_count']=$reviewcount;

					}else{
						$data['subcategory_porduct_list']=array();
					}
	
	$data['previousdata']= $this->category_model->get_all_previous_search_subcategory_fields();
	$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);

	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list_sub($caterory_id,$subcaterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list_sub($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);

		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
					$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
					$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		if($subcaterory_id==40){
				$data['ram_list']= $this->category_model->get_ram_type_list($caterory_id,$subcaterory_id);
				$data['colors_list']= $this->category_model->get_color_type_list($caterory_id,$subcaterory_id);
				$data['os_list']= $this->category_model->get_os_type_list($caterory_id,$subcaterory_id);
				$data['sim_list']= $this->category_model->get_sim_type_type_list($caterory_id,$subcaterory_id);
				$data['camera_list']= $this->category_model->get_camera_type_list($caterory_id,$subcaterory_id);
				$data['internal_memeory_list']= $this->category_model->get_internal_memeory_list($caterory_id,$subcaterory_id);
				$data['screen_size_list']= $this->category_model->get_screen_size_list($caterory_id,$subcaterory_id);
				$data['Processor_list']= $this->category_model->get_Processor_list($caterory_id,$subcaterory_id);
		}
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list_sub($caterory_id,$subcaterory_id);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		
				
		
	}
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/subcategorywisefiltersearch',$data);
	//echo '<pre>';print_r($data);exit;
}

public function categorywiseearch(){
	
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	if(isset($post['searchvalue']) && $post['searchvalue']=='status' && $post['unchecked']!='uncheck'){
					$status=$post['productsvalues'];
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						$this->category_model->update_status_privous_searchdata($list['id'],$post['productsvalues']);
					} 
				}else{
					
					$removesearch= $this->category_model->get_all_previous_search_fields();
					if(count($removesearch)>0){
					if(isset($removesearch[0]['status']) && $removesearch[0]['status']==''){
						$status=1;
					}else{
						$status=$removesearch[0]['status'];
					}
					
					}else{
						$status=1;
					}
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='cusine' && $post['unchecked']!='uncheck'){
					$cus=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='cusine'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['cusine']==$post['productsvalues']){
						$this->category_model->update_cusine_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$cus='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='res' && $post['unchecked']!='uncheck'){
					$res=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='res'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['restraent']==$post['productsvalues']){
						$this->category_model->update_res_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$res='';
				}
				
				if($post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['offers']==$post['productsvalues']){
						$this->category_model->update_offer_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$offer='';
				}
				if($post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$this->category_model->update_brand_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$brand='';
				}
				if($post['searchvalue']=='discount' && $post['unchecked']!='uncheck'){
					$discount=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='discount'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['discount']==$post['productsvalues']){
						$this->category_model->update_discount_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$discount='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='color' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='color'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['color']==$post['productsvalues']){
						$this->category_model->update_color_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$this->category_model->update_size_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$size='';
				}
				
		
	
	$ip=$this->input->ip_address();
	
	$data1=array(
	'Ip_address'=>$ip,
	'category_id'=>base64_decode($post['categoryid']),
	'mini_amount'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'max_amount'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'cusine'=>isset($cus) ? $cus:'',
	'restraent'=>isset($res) ? $res:'',
	'offers'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'discount'=>isset($discount) ? $discount:'',
	'color'=>isset($color) ? $color:'',
	'size'=>isset($size) ? $size:'',
	'status'=>isset($status) ? $status:'',
	'create'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$brand1= $this->category_model->save_searchdata($data1);
	if(count($brand1)>0){
		$removesearch= $this->category_model->get_all_previous_search_fields();
		foreach ($removesearch as $list){
			$this->category_model->update_amount_privous_searchdata($post['mini_mum'],$post['maxi_mum'],$list['id']);
			//echo $this->db->last_query();exit;
		
		}
		redirect('category/filtersearch');
		
	}
		
	
	

}

function filtersearch(){

	$data=array();
	$data['subcategory_list']= $this->category_model->get_all_subcategory_list($this->input->ip_address());
	$subcategory_porduct_list= $this->category_model->get_search_all_subcategory_products();
	$catid= $this->category_model->get_search_all_category_id();
	//echo '<pre>';print_r($subcategory_porduct_list);exit;
		foreach ($catid as $lists){
		$categoryid=$lists['category_id'];
		}
		foreach ($catid as $lists){
		$categoryids=$lists['category_id'];
		}
		foreach ($subcategory_porduct_list as $lists){
				foreach ($lists as $li){
						$idslist[]=$li['item_id'];
						$products[]=$li;
					}
		}
		if(isset($idslist) && count($idslist)>0){
		$result = array_unique($idslist);
		
	//echo '<pre>';print_r($result);exit;
	
				foreach ($result as $pids){
					$products_list[]=$this->category_model->get_product_details($pids);

				}
				$data['subcategory_porduct_list']=$products_list;
				foreach($data['subcategory_porduct_list'] as $list){
						//echo '<pre>';print_r($list);
						$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
						$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
						
					}
				
				$data['avg_count']=$reviewrating;
				$data['rating_count']=$reviewcount;
				
	}else{
		$data['subcategory_porduct_list']=array();
	}
	
	
	$data['previousdata']= $this->category_model->get_all_previous_search_fields();
	$caterory_id=$categoryid;
	$data['category_id']=$categoryids;
		
	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list($caterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);

		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list($caterory_id);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
	}
	$data['category_name']= $this->category_model->get_category_name($caterory_id);
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/filters_search',$data);
	

}	
 public function categorywiseproductslist(){
	 
	
	$removesearch= $this->category_model->get_all_previous_subcategory_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_subcategort_searchdata($list['id']);
	}
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_subcategort_searchdata($list['id']);
	}
	$post=$this->input->post();
	$catidss_id= $this->category_model->get_category_ids($post['subcategoryid']);
	
	if(isset($catidss_id['category_id']) && $catidss_id['category_id']==21){
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_products_list_grocery($post['subcategoryid']);
	//echo '<pre>';print_r($data['subcategory_porduct_list']);exit;
	if(count($data['subcategory_porduct_list'])>0){
			foreach($data['subcategory_porduct_list'] as $list){
					//echo '<pre>';print_r($list);
					$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
				}
			foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$desc=$this->category_model->get_products_desc_list($list['item_id']);
			$sameunitproduct=$this->category_model->get_sameunit_products_list($list['item_name']);
			$plist[$list['item_id']]['list']=$list;
			$plist[$list['item_id']]['list']['descriptions_list']=$desc;
			$plist[$list['item_id']]['list']['unitproducts_list']=$sameunitproduct;
			}
			foreach($plist as $list){
			foreach($list as $li){
			$plist_list[]=$li;
			
			}
			}
			$data['subcategory_porduct_list']=$plist_list;
			}else{
				$data['subcategory_porduct_list']=array();
			}
	}else{
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_products_list($post['subcategoryid']);
		foreach($data['subcategory_porduct_list'] as $list){
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
		}
	}
	if(isset($reviewrating) && count($reviewrating)>0){
		$data['avg_count']=$reviewrating;
	}else{
		$data['avg_count']=array();
	}
	if(isset($reviewcount) && count($reviewcount)>0){
		$data['rating_count']=$reviewcount;
	}else{
		$data['rating_count']=array();
	}
	$data['cat_subcat_ids']= $this->category_model->get_category_id($post['subcategoryid']);
	$caterory_id=$data['cat_subcat_ids']['category_id'];
	$subcaterory_id=$data['cat_subcat_ids']['subcategory_id'];
	//echo '<pre>';print_r($caterory_id);
	//echo '<pre>';print_r($subcaterory_id);
	
	//exit;
	//$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);

	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list_sub($caterory_id,$subcaterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list_sub($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		
	}else if($caterory_id==21){
		$data['subitem_list']= $this->category_model->get_all_subitem_list($caterory_id,$subcaterory_id);
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		//echo '<pre>';print_r($data);exit;
		if($subcaterory_id==40){
				$data['ram_list']= $this->category_model->get_ram_type_list($caterory_id,$subcaterory_id);
				$data['colors_list']= $this->category_model->get_color_type_list($caterory_id,$subcaterory_id);
				$data['os_list']= $this->category_model->get_os_type_list($caterory_id,$subcaterory_id);
				$data['sim_list']= $this->category_model->get_sim_type_type_list($caterory_id,$subcaterory_id);
				$data['camera_list']= $this->category_model->get_camera_type_list($caterory_id,$subcaterory_id);
				$data['internal_memeory_list']= $this->category_model->get_internal_memeory_list($caterory_id,$subcaterory_id);
				$data['screen_size_list']= $this->category_model->get_screen_size_list($caterory_id,$subcaterory_id);
				$data['Processor_list']= $this->category_model->get_Processor_list($caterory_id,$subcaterory_id);
						
			
			}
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list_sub($caterory_id,$subcaterory_id);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		
		
		
		
	}
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	//echo '<pre>';print_r($data);exit;
	if($data['cat_subcat_ids']['category_id']==21){
	$this->load->view('customer/grocerysubcategorywiseproducts',$data);
	}else{
		$this->load->view('customer/subcategorywiseproducts',$data);
	}
	//echo '<pre>';print_r($data);exit;
} 
 public function subcategoryview(){
	 
	
	$data['quick']=base64_decode($this->uri->segment(4));
	$data['subcatid']=base64_decode($this->uri->segment(5));
	//echo '<pre>';print_r($wishlist_ids);exit;
	$removesearch= $this->category_model->get_all_previous_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
	}
	$caterory_id=base64_decode($this->uri->segment(3));
	$subcategory_list= $this->category_model->get_all_subcategory($caterory_id);
	$data['subcategory_list']=array_chunk($subcategory_list, 6);
	$data['category_name']= $this->category_model->get_category_name($caterory_id);
	$sid=$this->uri->segment(4);
	if($sid!='' && is_int($sid)){
		//echo base64_decode($this->uri->segment(4));
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id,base64_decode($sid));
		foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	}else if(isset($data['subcatid']) && $data['subcatid']!=''){
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id,'');
		foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	}else{
		//echo 'fgfd';exit;
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id,base64_decode($sid));
		foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	}
	
	//echo '<pre>';print_r($data);exit;
	if(isset($reviewrating) && count($reviewrating)>0){
		$data['avg_count']=$reviewrating;
	}
	if(isset($reviewcount) && count($reviewcount)>0){
		$data['rating_count']=$reviewcount;
	}
	$data['category_id']=$this->uri->segment(3);
	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list($caterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		
	}else if($caterory_id==21){
		$data['subitem_list']= $this->category_model->get_all_subitem_lists($caterory_id);

		
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list($caterory_id);
		//echo $this->db->last_query();exit;
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		foreach ($data['price_list'] as $list) {
			
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
			
		}
		foreach (array_unique($ids) as $Li){
			
			$uniids[]=array('offers'=>$Li);
			
			
		}
		//echo '<pre>';print_r($uniids);exit;
		$data['offer_list']=$uniids;
		
		//echo '<pre>';print_r($offer_list);exit;
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list($caterory_id);
		$minamt = min( array_map("max", $data['price_list']) );
		$maxamt= max( array_map("max", $data['price_list']) );
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);

		
		
	}
	
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$this->template->write_view('content', 'customer/subcategoryview',$data);
	$this->template->render();
	
 }
 public function view(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_all_products($caterory_id);
	//echo $this->db->last_query();exit;
	$data['category_name']= $this->category_model->get_category($caterory_id);
	$data['stock']= $this->category_model->get_product_stock($caterory_id);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	
 }
 public function views(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_list_products($caterory_id);
	$data['listcategory']= $this->category_model->get_list_categories($caterory_id);
	//echo $this->db->last_query();exit;
//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryview', $data);
	$this->template->render();
	
 }
 public function categorysearch(){
	 

	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit;
	$stack = $post['sub_cat_id'];
	$uniqueid=array(0,1);
	  array_push($stack, $uniqueid);
	//$this->session->set_userdata('sessiontag',$stack);
	$this->session->set_userdata('billingaddress',$stack); 
	$dd=$this->session->userdata('billingaddress')	;
	echo '<pre>';print_r($dd);exit;
	
	array_push($stack, "0");
	print_r($stack);
	exit;

	
 }
  
 public function productview(){

	 
	$pid=base64_decode($this->uri->segment(3));

	//
	$data['products_list']= $this->category_model->get_products($pid);
	$data['similarproducts_list']= $this->category_model->get_simular_products($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_color_list']= $this->category_model->get_same_products_color($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	//echo $this->db->last_query();exit;
	$data['sameproducts_size_list']= $this->category_model->get_same_products_size($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_ram_list']= $this->category_model->get_same_products_ram($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_unit_list']= $this->category_model->get_same_products_unit($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	
	//echo $this->db->last_query();exit;
	//echo '<pre>';print_r($data);exit;
	$data['products_reviews']= $this->category_model->get_products_reviews($pid);
	$data['products_specufucation']= $this->category_model->get_products_specifications_list($pid);
	$data['products_desc_list']= $this->category_model->get_products_desc_list($pid);
	$data['sizes_list']= $this->category_model->get_products_sizes_list($pid);
	$data['uksizes_list']= $this->category_model->get_products_uksizes_list($pid);
	$data['colors_list']= $this->category_model->get_products_colos_list($pid);
	$data['colorcnt']= count($data['colors_list']);
	$data['sizecnt']= count($data['sizes_list']);
	$data['uksizecnt']= count($data['uksizes_list']);
	$data['bothsizecnt']= count($data['sizes_list'])+ count($data['uksizes_list']);

	//echo '<pre>';print_r($data);exit;
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	
 }

 public function productreview(){
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$details=array(
	'customer_id'=>$post['customer_id'],
	'item_id'=>$post['product_id'],
	'name'=>$post['name'],
	'email'=>$post['email'],
	'review_content'=>$post['review'],
	'seller_id'=>$post['seller_id'],
	'create_at'=>date('Y-m-d H:i:s A'),
	);
	$savereview= $this->category_model->save_review($details);
	
	if(count($savereview)>0){
		
		if($post['count']!=''){
			$addrataing=array(
			'customer_id'=>$post['customer_id'],
			'review_id'=>$savereview,
			'item_id'=>$post['product_id'],
			'name'=>$post['name'],
			'email'=>$post['email'],
			'rating'=>$post['count'],
			'seller_id'=>$post['seller_id'],
			'create_at'=>date('Y-m-d H:i:s A'),
		);
		$saverating= $this->category_model->save_rating($addrataing);
		//echo $this->db->last_query();exit;
		}
		$this->session->set_flashdata('success',"review Successfully Submitted");
		redirect('customer/orederdetails/'.base64_encode($post['order_item_id']));	
	}else{
		$this->session->set_flashdata('error',"Error will occured!");
		redirect('customer/orederdetails/'.base64_encode($post['order_item_id']));	
	}

	//echo '<pre>';print_r($data);exit;
 }

 
 public function productscompare()
 {

 	$pid=base64_decode($this->uri->segment(3));
 	$category_ld =base64_decode($this->uri->segment(4));
 	//print_r($category_ld);exit;
	$data['compore_products']= $this->category_model->get_products($pid);
	$data['item']=$this->category_model->getsubitemdata($category_ld);
	$data['first_item']=$pid;
	$this->template->write_view('content', 'customer/compare',$data);
	$this->template->render();
	
 }


	public function compare_items_list()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		//print_r($category_ld);exit;
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		//print_r($data);exit;
		$this->load->view('customer/compareone',$data);

	}
	public function compare_items_list_two()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		$this->load->view('customer/comparetwo',$data);
  		

	}
	public function checkpincodes()
	{
		$pinid=$this->input->post('pincode');
		$pinode_list= $this->category_model->get_area_pincodes($pinid);
		
		//echo '<pre>';print_r($pinid);exit;
		if (count($pinode_list)>0) {
				$this->session->set_userdata('pincode',trim($pinid));	
				$this->session->set_userdata('time',$pinode_list['hours']);	
				$data['msg']=1;
				$data['time']=$pinode_list['hours'];
				echo json_encode($data);
			}else{
				$this->session->set_userdata('pincode',trim($pinid));
				$this->session->set_userdata('time',"We don't have service in your pincode");
				$data['msg']=0;
				$data['time']='';
				echo json_encode($data);
			}
  		

	}
	public function billingcheckpincodes()
	{
		$pinid=$this->input->post('pincode');
		$pinode_list= $this->category_model->get_area_pincodes($pinid);
		
		//echo '<pre>';print_r($pinid);exit;
		if (count($pinode_list)>0) {
				$data['msg']=1;
				$data['time']=$pinode_list['hours'];
				echo json_encode($data);
			}else{
				$data['msg']=0;
				$data['time']='';
				echo json_encode($data);
			}
  		

	}

public function suitemwiseproductslist(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$subitem_list= $this->category_model->get_subitem_list($post['subitem_id'],$post['item_id']);
		//echo $this->db->last_query();
		//echo '<pre>';print_r($subitem_list);exit;
		if(count($subitem_list)>0){
		foreach($subitem_list as $list){
		//echo '<pre>';print_r($list);exit;
		$sameunitproduct=$this->category_model->get_subitemwise_unit_products_list($list['subitemid'],$list['unit']);

		$desc=$this->category_model->get_products_desc_list($list['item_id']);
		$plist[$list['item_id']]['list']=$list;
		$plist[$list['item_id']]['list']['descriptions_list']=$desc;
		$plist[$list['item_id']]['list']['unitproducts_list']=$sameunitproduct;
		}
		foreach($plist as $list){
		foreach($list as $li){
		$plist_list[]=$li;
		
		}
		}
		$data['subcategory_porduct_list']=$plist_list;

		}else{
		$data['subcategory_porduct_list']=array();
		}
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$this->load->view('customer/grocerysubitemwisefiltersproduct',$data);
	}
	public function unitwiseproduct_details(){
		$post=$this->input->post();
		//secho '<pre>';print_r($post);exit;
		$products_list= $this->category_model->get_untiwise_product_details($post['item_id']);
		//echo '<pre>';print_r($products_list);exit;
		if(count($products_list)>0){
		foreach($products_list as $list){
		//echo '<pre>';print_r($list);
		$desc=$this->category_model->get_products_desc_list($list['item_id']);
		$sameunitproduct=$this->category_model->get_sameunit_products_list($list['item_name']);
		$plist[$list['item_id']]['list']=$list;
		$plist[$list['item_id']]['list']['descriptions_list']=$desc;
		$plist[$list['item_id']]['list']['unitproducts_list']=$sameunitproduct;
		}
		foreach($plist as $list){
		foreach($list as $li){
		$plist_list[]=$li;
		
		}
		}
		$data['subcategory_porduct_list']=$plist_list;

		}else{
		$data['subcategory_porduct_list']=array();
		}
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$this->load->view('customer/unitwiseproductdetails',$data);
	}

	public function offers(){
		$ids= $this->category_model->get_ll_products();
		foreach ($ids as $productslist){
			$item_price= $productslist['special_price'];
			echo $prices= ($productslist['item_cost']-$productslist['special_price']);
			echo '--';
			echo $percentage= (($prices) /$productslist['item_cost'])*100;
			echo '<br>';
			$orginal_price=$productslist['item_cost'];
			$this->category_model->get_ll_products_update($productslist['item_id'],$prices,number_format($percentage, 2));
		}
		//echo '<pre>';print_r($ids);exit;
	}
	public function mobileviewsubcategorywiseproducts(){
		$post=$this->input->post();
		$plist=$this->category_model->mobileviewsubcategorywiseproducts_list($post['subcatid']);
		$getcatidlis=$this->category_model->get_category_details($post['subcatid']);
		$subcaterory_id=$post['subcatid'];
		$caterory_id=$getcatidlis['category_id'];
		$data['subcategory_id']=$subcaterory_id;
		$data['categoryid']=$caterory_id;
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$price_list= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		
		//echo $this->db->last_query();exit;
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data['color_list']);exit;
		foreach ($price_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		if(count($plist)>0){
			foreach($plist as $list){
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			}
	
				if(isset($reviewrating) && count($reviewrating)>0){
					$data['avg_count']=$reviewrating;
				}else{
					$data['avg_count']=array();
				}
				if(isset($reviewcount) && count($reviewcount)>0){
					$data['rating_count']=$reviewcount;
				}else{
					$data['rating_count']=array();
				}
				$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
				if(count($wishlist_ids)>0){
				foreach ($wishlist_ids as  $list){
					$customer_ids_list[]=$list['cust_id'];
					$whishlist_item_ids_list[]=$list['item_id'];
					$whishlist_ids_list[]=$list['id'];
				}
				$data['customer_ids_list']=$customer_ids_list;
				$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
				$data['whishlist_ids_list']=$whishlist_ids_list;
				}else{
				$data['customer_ids_list']=array();
				$data['whishlist_item_ids_list']=array();
				$data['whishlist_ids_list']=array();
				}
			$data['product_list']=$plist;
		}else{
			$data['product_list']=array();
		}
		$this->load->view('customer/mobileviewproducts',$data);
	
	}
	public function mobileviewfilers(){
		$post=$this->input->post();
		$ip=$this->input->ip_address();
		$removesearch= $this->category_model->get_all_previous_search_fields();
		foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
		}
		if(isset($post['brand'])&& $post['brand']!=''){
			foreach ($post['brand'] as $li){
				$lists[]=$li;
			}
			foreach($lists as $list){
				$data1=array(
						'Ip_address'=>$ip,
						'category_id'=>$post['categoryid'],
						'subcategory_id'=>$post['subcategory_id'],
						'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
						'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
						'brand'=>isset($list) ? $list:'',
						'create'=>date('Y-m-d H:i:s'),
						);
						$this->category_model->save_mobileviewfilter_data($data1);
					} 
			}
			if(isset($post['offers'])&& $post['offers']!=''){
			foreach ($post['offers'] as $li){
				$offerlists[]=$li;
			}
			foreach($offerlists as $list){
				$data1=array(
						'Ip_address'=>$ip,
						'category_id'=>$post['categoryid'],
						'subcategory_id'=>$post['subcategory_id'],
						'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
						'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
						'offers'=>isset($list) ? $list:'',
						'create'=>date('Y-m-d H:i:s'),
						);
						$this->category_model->save_mobileviewfilter_data($data1);
					} 
			}
			if(isset($post['colors'])&& $post['colors']!=''){
			foreach ($post['colors'] as $li){
				$colorslists[]=$li;
			}
			foreach($colorslists as $list){
				$data1=array(
						'Ip_address'=>$ip,
						'category_id'=>$post['categoryid'],
						'subcategory_id'=>$post['subcategory_id'],
						'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
						'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
						'color'=>isset($list) ? $list:'',
						'create'=>date('Y-m-d H:i:s'),
						);
						$this->category_model->save_mobileviewfilter_data($data1);
					} 
			}
		redirect('category/mobileviewfilers_result');
	}
	public function mobileviewfilers_result(){
		$post=$this->input->post();
		$product_detals=$this->category_model->get_Mobile_search_all_subcategory_products();
		$data['previousdata']= $this->category_model->get_all_previous_search_fields();
		if(count($data['previousdata'])==0){
			redirect();
		}
		//echo '<pre>';print_r($product_detals);exit;
		$subcaterory_id=$data['previousdata'][0]['subcategory_id'];
		$caterory_id=$data['previousdata'][0]['category_id'];
		$data['subcategory_id']=$subcaterory_id;
		$data['categoryid']=$caterory_id;
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$price_list= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		
		//echo $this->db->last_query();exit;
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data['color_list']);exit;
		foreach ($price_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		if(count($product_detals[0])>0){
			foreach($product_detals[0] as $list){
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			}
	
				if(isset($reviewrating) && count($reviewrating)>0){
					$data['avg_count']=$reviewrating;
				}else{
					$data['avg_count']=array();
				}
				if(isset($reviewcount) && count($reviewcount)>0){
					$data['rating_count']=$reviewcount;
				}else{
					$data['rating_count']=array();
				}
				$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
				if(count($wishlist_ids)>0){
				foreach ($wishlist_ids as  $list){
					$customer_ids_list[]=$list['cust_id'];
					$whishlist_item_ids_list[]=$list['item_id'];
					$whishlist_ids_list[]=$list['id'];
				}
				$data['customer_ids_list']=$customer_ids_list;
				$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
				$data['whishlist_ids_list']=$whishlist_ids_list;
				}else{
				$data['customer_ids_list']=array();
				$data['whishlist_item_ids_list']=array();
				$data['whishlist_ids_list']=array();
				}
			$data['product_list']=$product_detals[0];
		}else{
			$data['product_list']=array();
		}
		//echo '<pre>';print_r($data['previousdata']);exit;
		//$this->load->view('customer/mobileviewproductsresult',$data);
		$this->template->write_view('content', 'customer/mobileviewproductsresult',$data);
		$this->template->render();
	}
	/* subcategory wise*/
	public function subitemwise(){
	  $subitemid=base64_decode($this->uri->segment(3));
	  $subcatid=base64_decode($this->uri->segment(4));
	  $catid=base64_decode($this->uri->segment(5));
		if($subitemid=='' ||  $subcatid ==''){
			redirect();
		}
		$removesearch= $this->category_model->get_all_previous_subitem_search_fields($this->input->ip_address());
		foreach ($removesearch as $list){
		$this->category_model->delete_privous_subitemwise_searchdata($list['id']);
		}
		$data['subitemid']=$subitemid;
		$data['subcatid']=$subcatid;
		if(isset($catid) && $catid==21){
			$subitemwise= $this->category_model->get_all_itemproducts_list($subcatid,$subitemid);
			//echo '<pre>';print_r($data['subcategory_porduct_list']);exit;
				if(count($subitemwise)>0){
					foreach($subitemwise as $list){
					//echo '<pre>';print_r($list);
					$desc=$this->category_model->get_products_desc_list($list['item_id']);
					$sameunitproduct=$this->category_model->get_subitemwise_unit_products_list($list['subitemid'],$list['unit']);
					$plist[$list['item_id']]=$list;
					$plist[$list['item_id']]['descriptions_list']=$desc;
					$plist[$list['item_id']]['unitproducts_list']=$sameunitproduct;
					}
					
					//echo '<pre>';print_r($plist);exit;
					if(isset($subitemwise) && count($subitemwise)>0){
					foreach($subitemwise as $list){
					$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
					}
					}
				$data['subitemwise']=$plist;
				}else{
					$data['subitemwise']=array();
				}
		}else{
			$data['subitemwise']= $this->category_model->get_all_itemproducts_list($subcatid,$subitemid);
				if(isset($data['subitemwise']) && count($data['subitemwise'])>0){
				foreach($data['subitemwise'] as $list){
					$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
					}
				}

		}
		//echo '<pre>';print_r($data);exit;
		$data['brand_list']= $this->category_model->get_subitem_all_brand_list($subcatid,$subitemid);
		$data['price_list']= $this->category_model->get_subitem_all_price_list($subcatid,$subitemid);
		//$data['discount_list']= $this->category_model->get_subitem_all_discount_list($subitemid);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_subitem_all_offer_list($subcatid,$subitemid);
		$data['color_list']= $this->category_model->get_subitem_all_color_list($subcatid,$subitemid);
		$data['ram_list']= $this->category_model->get_ram_type_list_itemwise($subcatid,$subitemid);
		$data['os_list']= $this->category_model->get_os_type_list_itemwise($subcatid,$subitemid);
		$data['sim_list']= $this->category_model->get_sim_type_type_list_itemwise($subcatid,$subitemid);
		$data['camera_list']= $this->category_model->get_camera_type_list_itemwise($subcatid,$subitemid);
		$data['internal_memeory_list']= $this->category_model->get_internal_memeory_list_itemwise($subcatid,$subitemid);
		$data['screen_size_list']= $this->category_model->get_screen_size_list_itemwise($subcatid,$subitemid);
		$data['Processor_list']= $this->category_model->get_Processor_list_itemwise($subcatid,$subitemid);
		$data['printer_type']= $this->category_model->get_printer_type_list_itemwise($subcatid,$subitemid);
		$data['type_list']= $this->category_model->get_type_list_itemwise($subcatid,$subitemid);
		$data['max_copies']= $this->category_model->get_maxcopies_list_itemwise($subcatid,$subitemid);
		$data['paper_size']= $this->category_model->get_paper_size_list_itemwise($subcatid,$subitemid);
		$data['headphone_jack']= $this->category_model->get_headphone_jack_list_itemwise($subcatid,$subitemid);
		$data['noise_reduction']= $this->category_model->get_noise_reduction_list_itemwise($subcatid,$subitemid);
		$data['usb_port']= $this->category_model->get_usbr_port_list_itemwise($subcatid,$subitemid);
		$data['compatible_for']= $this->category_model->get_compatible_for_list_itemwise($subcatid,$subitemid);
		$data['scanner_type']= $this->category_model->get_scanner_type_list_itemwise($subcatid,$subitemid);
		$data['resolution']= $this->category_model->get_resolution_list_itemwise($subcatid,$subitemid);
		$data['f_stop']= $this->category_model->get_f_stop_list_itemwise($subcatid,$subitemid);
		$data['minimum_focusing_distance']= $this->category_model->get_minimum_focusing_distance_list_itemwise($subcatid,$subitemid);
		$data['aperture_withmaxfocal_length']= $this->category_model->get_aperture_withmaxfocal_length_list_itemwise($subcatid,$subitemid);
		$data['picture_angle']= $this->category_model->get_picture_angle_list_itemwise($subcatid,$subitemid);
		$data['size_list']= $this->category_model->get_size_list_itemwise($subcatid,$subitemid);
		$data['weight_list']= $this->category_model->get_weight_list_itemwise($subcatid,$subitemid);
		$data['occasion_list']= $this->category_model->get_occasion_list_itemwise($subcatid,$subitemid);
		$data['material_list']= $this->category_model->get_material_list_itemwise($subcatid,$subitemid);
		$data['collar_type']= $this->category_model->get_collar_type_itemwise($subcatid,$subitemid);
		$data['gender_list']= $this->category_model->get_gender_list_itemwise($subcatid,$subitemid);
		$data['sleeve_list']= $this->category_model->get_sleeve_list_itemwise($subcatid,$subitemid);
		$data['look_list']= $this->category_model->get_look_list_itemwise($subcatid,$subitemid);
		$data['style_code']= $this->category_model->get_style_code_itemwise($subcatid,$subitemid);
		$data['inner_material']= $this->category_model->get_inner_material_itemwise($subcatid,$subitemid);
		$data['waterproof']= $this->category_model->get_waterproof_itemwise($subcatid,$subitemid);
		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
			$data['offer_list']=$uniids;
	
	
				if(isset($reviewrating) && count($reviewrating)>0){
					$data['avg_count']=$reviewrating;
				}else{
					$data['avg_count']=array();
				}
				if(isset($reviewcount) && count($reviewcount)>0){
					$data['rating_count']=$reviewcount;
				}else{
					$data['rating_count']=array();
				}
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	if($catid==21){
		$data['subitemwise_item_list']= $this->category_model->get_all_subwise_item_list($subcatid,$subitemid);
		//echo '<pre>';print_r($data['subitemwise_item_list']);exit;
		$this->template->write_view('content', 'customer/grocerysubcategorywiseproducts',$data);
		$this->template->render();
	}else{
		$this->template->write_view('content', 'customer/subitemwise',$data);
		$this->template->render();
	}
		
	  
	  //echo 'dfd';exit;
	}
public function subitemwise_search(){
	
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	
				if(isset($post['searchvalue']) && $post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['offer']==$post['productsvalues']){
						$data=array('offer'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$offer='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$data=array('brand'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$brand='';
				}
				
				if($post['searchvalue']=='discount' && $post['unchecked']!='uncheck'){
					$discount=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='discount'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['discount']==$post['productsvalues']){
						$data=array('discount'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$discount='';
				}
				if($post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['colour']==$post['productsvalues']){
						$data=array('colour'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$color='';
				}
				if($post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$data=array('size'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
					$ram=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['ram']==$post['productsvalues']){
							$data=array('ram'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$ram='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
					$os=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['os']==$post['productsvalues']){
							$data=array('os'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$os='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
					$sim_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['sim_type']==$post['productsvalues']){
							$data=array('sim_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$sim_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='camera' && $post['unchecked']!='uncheck'){
					$camera=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='camera'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['camera']==$post['productsvalues']){
							$data=array('camera'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$camera='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='internal_memeory' && $post['unchecked']!='uncheck'){
					$internal_memeory=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_memeory'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['internal_memeory']==$post['productsvalues']){
							$data=array('internal_memeory'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$internal_memeory='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='screen_size' && $post['unchecked']!='uncheck'){
					$screen_size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='screen_size'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['screen_size']==$post['productsvalues']){
							$data=array('screen_size'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$screen_size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='Processor' && $post['unchecked']!='uncheck'){
					$Processor=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='Processor'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['Processor']==$post['productsvalues']){
							$data=array('Processor'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$Processor='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='type' && $post['unchecked']!='uncheck'){
					$type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['type']==$post['productsvalues']){
							$data=array('type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='printer_type' && $post['unchecked']!='uncheck'){
					$printer_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='printer_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['printer_type']==$post['productsvalues']){
							$data=array('printer_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$printer_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='max_copies' && $post['unchecked']!='uncheck'){
					$max_copies=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='max_copies'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['max_copies']==$post['productsvalues']){
							$data=array('max_copies'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$max_copies='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='paper_size' && $post['unchecked']!='uncheck'){
					$paper_size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='paper_size'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['paper_size']==$post['productsvalues']){
							$data=array('paper_size'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$paper_size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='headphone_jack' && $post['unchecked']!='uncheck'){
					$headphone_jack=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='headphone_jack'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['headphone_jack']==$post['productsvalues']){
							$data=array('headphone_jack'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$headphone_jack='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='noise_reduction' && $post['unchecked']!='uncheck'){
					$noise_reduction=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='noise_reduction'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['noise_reduction']==$post['productsvalues']){
							$data=array('noise_reduction'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$noise_reduction='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='usb_port' && $post['unchecked']!='uncheck'){
					$usb_port=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usb_port'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['usb_port']==$post['productsvalues']){
							$data=array('usb_port'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$usb_port='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='compatible_for' && $post['unchecked']!='uncheck'){
					$compatible_for=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='compatible_for'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['compatible_for']==$post['productsvalues']){
							$data=array('compatible_for'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$compatible_for='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='scanner_type' && $post['unchecked']!='uncheck'){
					$scanner_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='scanner_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['scanner_type']==$post['productsvalues']){
							$data=array('scanner_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$scanner_type='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='resolution' && $post['unchecked']!='uncheck'){
					$resolution=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='resolution'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['resolution']==$post['productsvalues']){
							$data=array('resolution'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$resolution='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='f_stop' && $post['unchecked']!='uncheck'){
					$f_stop=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='f_stop'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['f_stop']==$post['productsvalues']){
							$data=array('f_stop'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$f_stop='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='minimum_focusing_distance' && $post['unchecked']!='uncheck'){
					$minimum_focusing_distance=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='minimum_focusing_distance'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['minimum_focusing_distance']==$post['productsvalues']){
							$data=array('minimum_focusing_distance'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$minimum_focusing_distance='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='aperture_withmaxfocal_length' && $post['unchecked']!='uncheck'){
					$aperture_withmaxfocal_length=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='aperture_withmaxfocal_length'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['aperture_withmaxfocal_length']==$post['productsvalues']){
							$data=array('aperture_withmaxfocal_length'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$aperture_withmaxfocal_length='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='picture_angle' && $post['unchecked']!='uncheck'){
					$picture_angle=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='picture_angle'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['picture_angle']==$post['productsvalues']){
							$data=array('picture_angle'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$picture_angle='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='weight' && $post['unchecked']!='uncheck'){
					$weight=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='weight'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['weight']==$post['productsvalues']){
							$data=array('weight'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$weight='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='occasion' && $post['unchecked']!='uncheck'){
					$occasion=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='occasion'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['occasion']==$post['productsvalues']){
							$data=array('occasion'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$occasion='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='material' && $post['unchecked']!='uncheck'){
					$material=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='material'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['material']==$post['productsvalues']){
							$data=array('material'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$material='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='collar_type' && $post['unchecked']!='uncheck'){
					$collar_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='collar_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['collar_type']==$post['productsvalues']){
							$data=array('collar_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$collar_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='gender' && $post['unchecked']!='uncheck'){
					$gender=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='gender'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['gender']==$post['productsvalues']){
							$data=array('gender'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$gender='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='sleeve' && $post['unchecked']!='uncheck'){
					$sleeve=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sleeve'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['sleeve']==$post['productsvalues']){
							$data=array('sleeve'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$sleeve='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='look' && $post['unchecked']!='uncheck'){
					$look=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='look'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['look']==$post['productsvalues']){
							$data=array('look'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$look='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='style_code' && $post['unchecked']!='uncheck'){
					$style_code=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='style_code'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['style_code']==$post['productsvalues']){
							$data=array('style_code'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$style_code='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='inner_material' && $post['unchecked']!='uncheck'){
					$inner_material=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='inner_material'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['inner_material']==$post['productsvalues']){
							$data=array('inner_material'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$inner_material='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='waterproof' && $post['unchecked']!='uncheck'){
					$waterproof=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='waterproof'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['waterproof']==$post['productsvalues']){
							$data=array('waterproof'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$waterproof='';
				}
				
		
	
	$ip=$this->input->ip_address();
	
	$data1=array(
	'ip_address'=>$ip,
	'subcategory_id'=>$post['subcatid'],
	'subitemid'=>$post['subitemid'],
	'minimum_price'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'maximum_price'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'offer'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'colour'=>isset($color) ? $color:'',
	'discount'=>isset($discount) ? $discount:'',
	'size'=>isset($size) ? $size:'',
	'ram'=>isset($ram) ? $ram:'',
	'os'=>isset($os) ? $os:'',
	'sim_type'=>isset($sim_type)?$sim_type:'',
	'camera'=>isset($camera)?$camera:'',
	'internal_memeory'=>isset($internal_memeory)?$internal_memeory:'',
	'screen_size'=>isset($screen_size)?$screen_size:'',
	'Processor'=>isset($Processor)?$Processor:'',
	'printer_type'=>isset($printer_type)?$printer_type:'',
	'type'=>isset($type)?$type:'',
	'max_copies'=>isset($max_copies)?$max_copies:'',
	'paper_size'=>isset($paper_size)?$paper_size:'',
	'headphone_jack'=>isset($headphone_jack)?$headphone_jack:'',
	'noise_reduction'=>isset($noise_reduction)?$noise_reduction:'',
	'usb_port'=>isset($usb_port)?$usb_port:'',
	'compatible_for'=>isset($compatible_for)?$compatible_for:'',
	'scanner_type'=>isset($scanner_type)?$scanner_type:'',
	'resolution'=>isset($resolution)?$resolution:'',
	'f_stop'=>isset($f_stop)?$f_stop:'',
	'minimum_focusing_distance'=>isset($minimum_focusing_distance)?$minimum_focusing_distance:'',
	'aperture_withmaxfocal_length'=>isset($aperture_withmaxfocal_length)?$aperture_withmaxfocal_length:'',
	'picture_angle'=>isset($picture_angle)?$picture_angle:'',
	'weight'=>isset($weight)?$weight:'',
	'occasion'=>isset($occasion)?$occasion:'',
	'material'=>isset($material)?$material:'',
	'collar_type'=>isset($collar_type)?$collar_type:'',
	'gender'=>isset($gender)?$gender:'',
	'sleeve'=>isset($sleeve)?$sleeve:'',
	'look'=>isset($look)?$look:'',
	'style_code'=>isset($style_code)?$style_code:'',
	'inner_material'=>isset($inner_material)?$inner_material:'',
	'waterproof'=>isset($waterproof)?$waterproof:'',
	'create_at'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$s_s_i_data= $this->category_model->save_subitemsearchdata($data1);
	if(count($s_s_i_data)>0){
		$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
		foreach ($removesearch as $list){
			$data=array('minimum_price'=>$post['mini_mum'],'maximum_price'=>$post['maxi_mum']);
			$this->category_model->subitem_wise_update_deails($list['id'],$data);	
		}
		redirect('category/subitemwise_searchresult');
		
	}
 }
 
	 public function subitemwise_searchresult(){
				$data['subitemwise']= $this->category_model->get_subitemwise_search_result_data($this->input->ip_address());
				$data['previousdata']= $this->category_model->get_all_previous_subitemwise_search_fields($this->input->ip_address());
				$filterscatid= $this->category_model->get_subitemwise_data_category_id($this->input->ip_address());
				$data['subitemid']=$filterscatid['subitemid'];
				$data['subcatid']=$filterscatid['subcategory_id'];
				$subcatid=$filterscatid['subcategory_id'];
				$subitemid=$filterscatid['subitemid'];
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_subitem_all_brand_list($subcatid,$subitemid);
				$data['price_list']= $this->category_model->get_subitem_all_price_list($subcatid,$subitemid);
				//$data['discount_list']= $this->category_model->get_subitem_all_discount_list($subitemid);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_subitem_all_offer_list($subcatid,$subitemid);
				$data['color_list']= $this->category_model->get_subitem_all_color_list($subcatid,$subitemid);
				$data['ram_list']= $this->category_model->get_ram_type_list_itemwise($subcatid,$subitemid);
				$data['os_list']= $this->category_model->get_os_type_list_itemwise($subcatid,$subitemid);
				$data['sim_list']= $this->category_model->get_sim_type_type_list_itemwise($subcatid,$subitemid);
				$data['camera_list']= $this->category_model->get_camera_type_list_itemwise($subcatid,$subitemid);
				$data['internal_memeory_list']= $this->category_model->get_internal_memeory_list_itemwise($subcatid,$subitemid);
				$data['screen_size_list']= $this->category_model->get_screen_size_list_itemwise($subcatid,$subitemid);
				$data['Processor_list']= $this->category_model->get_Processor_list_itemwise($subcatid,$subitemid);
				$data['printer_type']= $this->category_model->get_printer_type_list_itemwise($subcatid,$subitemid);
				$data['type_list']= $this->category_model->get_type_list_itemwise($subcatid,$subitemid);
				$data['max_copies']= $this->category_model->get_maxcopies_list_itemwise($subcatid,$subitemid);
				$data['paper_size']= $this->category_model->get_paper_size_list_itemwise($subcatid,$subitemid);
				$data['headphone_jack']= $this->category_model->get_headphone_jack_list_itemwise($subcatid,$subitemid);
				$data['noise_reduction']= $this->category_model->get_noise_reduction_list_itemwise($subcatid,$subitemid);
				$data['usb_port']= $this->category_model->get_usbr_port_list_itemwise($subcatid,$subitemid);
				$data['compatible_for']= $this->category_model->get_compatible_for_list_itemwise($subcatid,$subitemid);
				$data['scanner_type']= $this->category_model->get_scanner_type_list_itemwise($subcatid,$subitemid);
				$data['resolution']= $this->category_model->get_resolution_list_itemwise($subcatid,$subitemid);
				$data['f_stop']= $this->category_model->get_f_stop_list_itemwise($subcatid,$subitemid);
				$data['minimum_focusing_distance']= $this->category_model->get_minimum_focusing_distance_list_itemwise($subcatid,$subitemid);
				$data['aperture_withmaxfocal_length']= $this->category_model->get_aperture_withmaxfocal_length_list_itemwise($subcatid,$subitemid);
				$data['picture_angle']= $this->category_model->get_picture_angle_list_itemwise($subcatid,$subitemid);
				$data['size_list']= $this->category_model->get_size_list_itemwise($subcatid,$subitemid);
				$data['weight_list']= $this->category_model->get_weight_list_itemwise($subcatid,$subitemid);
				$data['occasion_list']= $this->category_model->get_occasion_list_itemwise($subcatid,$subitemid);
				$data['material_list']= $this->category_model->get_material_list_itemwise($subcatid,$subitemid);
				$data['collar_type']= $this->category_model->get_collar_type_itemwise($subcatid,$subitemid);
				$data['gender_list']= $this->category_model->get_gender_list_itemwise($subcatid,$subitemid);
				$data['sleeve_list']= $this->category_model->get_sleeve_list_itemwise($subcatid,$subitemid);
				$data['look_list']= $this->category_model->get_look_list_itemwise($subcatid,$subitemid);
				$data['style_code']= $this->category_model->get_style_code_itemwise($subcatid,$subitemid);
				$data['inner_material']= $this->category_model->get_inner_material_itemwise($subcatid,$subitemid);
				$data['waterproof']= $this->category_model->get_waterproof_itemwise($subcatid,$subitemid);
				foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
					$amounts[]=$list['item_cost'];
					}else{
					$amounts[]=$list['special_price'];
					}

				}
				$minamt = min($amounts);
				$maxamt= max($amounts);
				//echo '<pre>';print_r( $amounts);exit;
				$data['minimum_price'] = array('item_cost'=>$minamt);
				$data['maximum_price'] = array('item_cost'=>$maxamt);
				//echo '<pre>';print_r($data);exit;
				//echo max($data['price_list']);
				foreach ($offer_list as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						if($list['offer_percentage']!=''){
						$ids[]=$list['offer_percentage'];
						}
					}else{
						if($list['offers']!=''){
						$ids[]=$list['offers'];
						}
					}
					
				}
				foreach (array_unique($ids) as $Li){
					$uniids[]=array('offers'=>$Li);
					
				}
					$data['offer_list']=$uniids;
				if(isset($data['subitemwise']) && count($data['subitemwise'])>0){
					foreach($data['subitemwise'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
						$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			$this->load->view('customer/subitemwiseliterresult',$data);
	 }
	
}
?>