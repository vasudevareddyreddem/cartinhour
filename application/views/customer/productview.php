<style>
#sticky {
    height:80%;
}
#sticky.stick {
    position: fixed;
    top: 0;
    z-index: 10;
    border-radius: 0 0 0.5em 0.5em;
}
.product-ratings{
	color:#ddd
	}
.product-rateing{
	color:#fc0
	}
.img_c-l_siz{
		background:#f5f5f5;
		width:20px;
		height:30px;
		border:1px solid #ddd;
		margin:0px 10px;
}
.pr-V_siz{
		background:#f5f5f5;
		border:1px solid #ddd;
		width:8%;
		font-size:16px;
		text-algin:center !important;
		margin:0px 10px;
		
}

.site_active{
	background:#d32134;
	color:#fff;
	padding:4px;
	border-radius:5px;
}
.pr-V_siz:hover{
	background:#d32134;
	color:#fff;
}
.col_active{
	border:2px solid #d32134;
	
	
}
.jain_container {
    margin: 0px;
    padding: 0px;
    background: #fff;
}
.img_col{
	border: 1px solid #ddd;
	padding:2px;
	
}
.img_col:hover{
	border: 1px solid #d32134;
	padding:2px;
}
.active_color{
	border:1px solid #d32134;
	
}
.gc-display-container {
	width:500px !important;
}
.cust_plug {
	text-algin:center !important;
}
.p_cos > p{
	margin:4px 10px;
}
</style>

<div class="pad_bod"  >
<div id="sucessmsg" style="display:none;"></div>
		<div class="" >
		
		<div class="col-md-3 z_ind sing_pro" id="social-float">
			<ul id="glasscase" class="gc-start">
                    <li>
						<img class="img-responsive" src="<?php echo base_url('uploads/products/'.$products_list['item_image']); ?>"/>
						</li>
                    <li>
					<img src="<?php echo base_url('uploads/products/'.$products_list['item_image1']); ?>" alt="Text" />
					</li>  
					<li>
						<img src="<?php echo base_url('uploads/products/'.$products_list['item_image2']); ?>" alt="Text" />
					</li> 
					<li>
						<img src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>" alt="Text" />
					</li>
					<li>
						<img src="<?php echo base_url('uploads/products/'.$products_list['item_image4']); ?>" alt="Text" />
					</li>
					<li>
						<img src="<?php echo base_url('uploads/products/'.$products_list['item_image5']); ?>" alt="Text" />
					</li>
					<li>
						<img src="<?php echo base_url('uploads/products/'.$products_list['item_image6']); ?>" alt="Text" />
					</li>
					<li>
						<img src="<?php echo base_url('uploads/products/'.$products_list['item_image7']); ?>" alt="Text" />
					</li>  
			</ul>
		</div>
        <!-- End Image List -->

        <div class="col-md-5 col-md-offset-3 sm_mar_t20" id="con_scrol">
          <?php if($this->session->flashdata('success')): ?>
			<div class="alt_cus"> <div class="alert_msg1 animated slideInUp btn_suc "> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
			<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>
              
			<?php endif; ?>
			<input type="hidden" name="orginalproductqty" id="orginalproductqty" value="<?php echo $products_list['item_quantity']; ?>" >
          <div class="title-detail" style="text-transform: uppercase;"><?php echo $products_list['item_name']; ?></div>
		  <?php if(count($colors_list)>0){ ?>
		  <form action="<?php echo base_url('customer/addcart'); ?>" onsubmit="return validation();" method="Post" name="addtocart" id="addtocart" >
		  <?php }else{ ?>
		  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
		  <?php } ?>
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $products_list['item_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
         
		 <table class="table table-detail">
		 
		 <?php 
		 //echo '<pre>';print_r($products_list);exit ;
		 $currentdate=date('Y-m-d h:i:s A');
				if($products_list['offer_expairdate']>=$currentdate){
				$item_price= ($products_list['item_cost']-$products_list['offer_amount']);
				if($products_list['offer_percentage']==''){
					$percentage= 0;
				}else{
					$percentage= $products_list['offer_percentage'];
				}
				
				$orginal_price=$products_list['item_cost'];
				}else{
					//echo "expired";
					$item_price= $products_list['special_price'];
					$prices= ($products_list['item_cost']-$products_list['special_price']);
					$percentage= (($prices) /$products_list['item_cost'])*100;
					$orginal_price=$products_list['item_cost'];
				}
				?>
            <tbody>
              <tr>
                <td>Price</td>
                <td><div class="price">
                    <div class="site_col"><span style="font-weight:400;font-size:23px;"> ₹<?php echo number_format($item_price, 2 ); ?></span> &nbsp;
					<span class="price-old"><?php echo number_format($orginal_price, 2); ?></span>
					<span class="text-success"><?php echo number_format($percentage, 2,'.',''); ?>% Off</span></div>
                  </div>
				</td>
              </tr>
              <tr>
			 <td>Seller</td>
			 <td><span ><?php echo $products_list['store_name'];?></span></td>
			
			 </tr> 
			 <?php if($products_list['item_quantity']<=10 && $products_list['item_quantity']>0){ ?>
			 <tr>
			 <td>Available quantity:</td>
			 <td><span ><?php echo $products_list['item_quantity'];?></span></td>
			
			 </tr>
			 <?php } ?>
			 
			<?php 
				  if(isset($sameproducts_unit_list) && count($sameproducts_unit_list)>0){
				  if($products_list['category_id']==21){ ?>
						
						
						<tr>
							<td>unit </td>
							
							<td>
								<div class="row">
								<?php //echo '<pre>';print_r($sameproducts_color_list);exit;
								foreach ($sameproducts_unit_list as $lists){ ?>
								<?php if($lists['item_id']==$products_list['item_id']){ ?>
								<a class="col-md-6 col-xs-12 p_cos  active_color"  href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>" data-toggle="myToolTip" data-placement="top" data-html="true"  title="<?php echo isset($lists['unit'])?$lists['unit']:'';?>">
									<p><?php echo isset($lists['unit'])?$lists['unit']:'';?></p>
								</a>
								<?php }else if($lists['unit']==$products_list['unit']) { ?>
								<a class="col-md-6 col-xs-12 p_cos  active_color"  href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>" data-toggle="myToolTip" data-placement="top" data-html="true"  title="<?php echo isset($lists['unit'])?$lists['unit']:'';?>">
									<p><?php echo isset($lists['unit'])?$lists['unit']:'';?></p>
								</a>
								<?php }else{  ?>
								<a class="col-md-6  col-xs-12 p_cos img_col "  href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>" data-toggle="myToolTip" data-placement="top" data-html="true"  title="<?php echo isset($lists['unit'])?$lists['unit']:'';?>">
									<p><?php echo isset($lists['unit'])?$lists['unit']:'';?></p>
								</a>
								<?php   } ?>
								
								<?php   } ?>
								</div>
						
							</td>
						</tr>
						
				  <?php }  }?>
			
			
			  <td>Status</td>
                <td>
				<span class="label label-success arrowed">
				 <?php if($products_list['item_status']==1 && $products_list['item_quantity']>0){ 
					echo "Ready Stock";
					}
					else{
					echo "Out of Stock";
					}
					?>
				
				</span>
				</td>
				</tr>
				
				  <?php 
				  if(isset($sameproducts_color_list) && count($sameproducts_color_list)>0){
				  if($products_list['category_id']==20){ ?>
						
						
						<tr>
							<td>Color </td>
							
							<td>
								<div class="row ">
								<?php //echo '<pre>';print_r($sameproducts_color_list);exit;
								foreach ($sameproducts_color_list as $lists){ ?>
								<?php if($lists['item_id']==$products_list['item_id']){ ?>
								<a class="col-md-2 col-xs-3 col-sm-2  active_color" style="margin: 5px" href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>" data-toggle="myToolTip" data-placement="top" data-html="true"  title="<?php echo isset($lists['colour'])?$lists['colour']:'';?>">
									<img style="height:40px;width:auto;margin:0 auto;" class="img-responsive" src="<?php echo base_url('uploads/products/'.$lists['item_image']); ?>" />
								</a>
								<?php }else if(strtolower($lists['colour'])==strtolower($products_list['colour'])) { ?>
								<a class="col-md-2 col-xs-3 col-sm-2  active_color" style="margin: 5px" href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>" data-toggle="myToolTip" data-placement="top" data-html="true"  title="<?php echo isset($lists['colour'])?$lists['colour']:'';?>">
									<img style="height:40px;width:auto;margin:0 auto;" class="img-responsive" src="<?php echo base_url('uploads/products/'.$lists['item_image']); ?>" />
								</a>
								<?php }else{ ?>
								<a class="col-md-2 col-xs-3 col-sm-2 img_col" style="margin:5px" href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>" data-toggle="myToolTip" data-placement="top" data-html="true"  title="<?php echo isset($lists['colour'])?$lists['colour']:'';?>">
									<img style="height:40px;width:auto;margin:0 auto;" class="img-responsive" src="<?php echo base_url('uploads/products/'.$lists['item_image']); ?>" />
								</a>
								<?php   } ?>
								
								<?php   } ?>
								</div>
						
							</td>
						</tr>
						
				  <?php }  }?>
				  <?php 
				  if(isset($sameproducts_size_list) && count($sameproducts_size_list)>0){
				  if($products_list['category_id']==20){ ?>
						
						<tr>
							<td>Internal Memory </td>
							<td>
								<div class="row cus_anch">
								<?php foreach ($sameproducts_size_list as $lists){ ?>
								
								
								<?php if($lists['item_id']==$products_list['item_id']){ ?>
								<a href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>">
									<div style="font-size:16px;margin:5px"  class=" col-md-2_1024 col-md-2 img_col text-center active_color" >
									<span  ><?php echo $lists['internal_memeory'];?></span>
									</div>
								</a>
								<?php }else{ ?>
								 <?php if($lists['internal_memeory']==$products_list['internal_memeory']) { ?>
										 <a href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>">
											<div style="font-size:16px;margin:5px"  class="col-md-2 col-md-2_1024 img_col text-center active_color" >
											<span  ><?php echo $lists['internal_memeory'];?></span>
											</div>
										</a>
								 <?php }else{  ?>
								<a href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>">
									<div style="font-size:16px;margin:5px"  class="col-md-2 img_col  col-md-2_1024 text-center" >
									<span  ><?php echo $lists['internal_memeory'];?></span>
									</div>
								</a>
								<?php } ?>
								<?php } ?>
								
								
								<?php   } ?>
								
								</div>
								
						
							</td>
						</tr>
						
				  <?php }  }?>
				  <?php 
				  if(isset($sameproducts_ram_list) && count($sameproducts_ram_list)>0){
				  if($products_list['category_id']==20){ ?>
						
						<tr>
							<td>RAM </td>
							<td>
							
								<div class="row">
								<?php foreach ($sameproducts_ram_list as $lists){ ?>
								
								
								<?php if($lists['item_id']==$products_list['item_id']){ ?>
								<a href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>"><div style="font-size:16px;margin:5px"  class="col-md-2 img_col text-center col-md-2_1024  active_color" >
								<span ><?php echo $lists['ram'];?></span>
								</div></a>
								<?php }else{ ?>
								<?php if($lists['ram']==$products_list['ram']) { ?>
								<a href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>"><div style="font-size:16px;margin:5px"  class="col-md-2 col-md-2_1024 img_col text-center active_color" >
								<span ><?php echo $lists['ram'];?></span>
								</div></a>
								
								<?php } else{ ?>
								<a href="<?php echo base_url('category/productview/'.base64_encode($lists['item_id'])); ?>"><div style="font-size:16px;margin:5px"  class="col-md-2 col-md-2_1024 img_col text-center" >
								<span ><?php echo $lists['ram'];?></span>
								</div></a>
								<?php } ?>
								<?php } ?>
								
								
								<?php   } ?>
								</div>
							
							</td>
						</tr>
						
				  <?php }  }?>
				
				
				
			  <?php if(count($colors_list)>0){ ?>
			   <tr>
                <td>Color</td>
                <td>
						
						
						<div class="row">
						<input type="hidden" name="colorvalue" id="colorvalue" value="">
						<?php $i=1;foreach($colors_list as $list) { ?>
						<div href="javascript:void(0);" id="colorlist<?php echo $i;?>" onclick="colorselect(<?php echo $i; ?>);colorselectvalue('<?php echo $list['color_name'];?>');"  class="col-md-2 img_c-l_siz" style="background-color:<?php echo $list['color_name']; ?>"></div>
						<?php $i++;} ?>
							
						</div><span id="colorerrormsg"></span>
						
				</td>
				
			   
              </tr>
			   <?php } ?>
			   <?php if($products_list['subcategory_id']!=53){ ?>
			  <?php if(count($sizes_list)>0){ ?>
			   <tr>
                <td>Size</td>
                <td>
						<div class="row">
						<input type="hidden" name="sizevalue" id="sizevalue" value="">
						<?php $i=1;foreach($sizes_list as $list) { ?>
						<div style="font-size:17px"  class="col-md-1 " >
						<span id="sizeslist<?php echo $i;?>" onclick="sizeselect('<?php echo $i;?>');sizeselectvalue('<?php echo $list['p_size_name'];?>');"><?php echo $list['p_size_name'];?></span>
						</div>
						<span id="sizeerrormsg"></span>
						<?php $i++;} ?>
							
						</div>
				</td>
				
			   
              </tr>
			  
			  <?php } ?>
			  <?php } ?>
			  <?php if(count($uksizes_list)>0){ ?>
			   <tr>
                <td>Uk Size</td>
                <td>
						<div class="row">
						<input type="hidden" name="sizevalue" id="sizevalue" value="">
						<?php $ui=1;foreach($uksizes_list as $list) { ?>
						<div style="font-size:17px" id="" class="col-md-1 " >
						<span  id="sizeslist<?php echo $ui;?>" onclick="sizeselect('<?php echo $ui;?>');sizeselectvalue('<?php echo $list['p_size_name'];?>');"><?php echo $list['p_size_name'];?></span>
						</div>
						<span id="sizeerrormsg"></span>
						<?php $ui++;} ?>
							
						</div>
				</td>
				
			   
              </tr>
			  
			  <?php } ?>
             
			
         
            </tbody>
			<div class="clearfix"></div>
          </table>
		    <tr>
                <td></td>
                <td>
				<?php 
				$customerdetails=$this->session->userdata('userdetails');  ?>
				
				  <a href="" id="compare" class="btn btn-theme m-b-1" type="button" ><i class="fa fa-align-left"></i> Add to Compare</a>
                  <input type="hidden" name="compare_id" id="compare_id"  value="<?php echo $products_list['item_id']; ?>"> 
				<?php 	if (in_array($products_list['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)  ) { ?>
					<a href="javascript:void(0);" style="color:#45b1b9;" onclick="addwhishlidt(<?php echo $products_list['item_id']; ?>);" id="addwhish" class="btn btn-theme m-b-1" type="button"><i class="fa fa-heart"></i>Add to Wishlist</a>  
					<?php }else{ ?>	
					<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $products_list['item_id']; ?>);" id="addwhish" class="btn btn-theme m-b-1" type="button"><i class="fa fa-heart"></i>Add to Wishlist</a>  
					<?php } ?>			  
				 
                </td>
              </tr>
			 		  
        </div>
				<?php if($products_list['item_quantity']>0 && $products_list['item_status']!=0 ){ ?>

        <div class="col-md-3" style="border:1px solid #ddd;padding:20px;">
			<span><img id="" src="<?php echo base_url(); ?>assets/home/images/track_lig.png" /></span> &nbsp;
			<span style="font-weight:500;font-size:18px" id="">Check your delivery Status</span>
			<div class="clearfix">&nbsp;</div>
			<span id="deliverymsg" style="hight:50px;">&nbsp;</span>
			<div style="border:1px solid #ddd;padding:10px;position:relative">
		
			<div class="pull-left ">
				<b>Pincode:</b> &nbsp; &nbsp;<input class="pin_in" style="border-top:none;border-right:none;border-left:none;border-bottom:1px solid #ddd" maxlength="6" onkeyup="removecouponmsg();" id="checkpincode" name="checkpincode" type="text" value="">
				</div>
				<div class="pull-right " style="position:relative"><a class="site_col pin_code_text" style="cursor:pointer" onclick="getareapincode();">check</a></div>
				<div class="clearfix">&nbsp;</div>
			</div>
			<div class="clearfix">&nbsp;</div>
				<div>
					<div class="radio">
										<label class="col-md-12" >
											<input type="radio" id="radio1"  name="payment"  value="2"><span >Normal</span>
										</label>
								
										<label class="col-md-12" >
											<input type="radio" id="radio2" name="payment"  value="3"><span >Fast</span>
										</label>
										<!--<label class="col-md-4">
											<input type="radio" id="radio3" name="payment"  value="4"><span>Paytm</span>
										</label>-->
									 </div>
				</div>
			<div class="clearfix">&nbsp;</div>
			<div>
				<ul>
					<li>Usually delivered within 1-6 Hours*</li>
					<li>Cash on delivery(COD) and swipe on delivery(SOD) available</li>
					<li>Return and replacement policies are as per seller*</li>
					<li>Online cancellations</li>
				</ul>
			</div>
			
			<div class="clearfix">&nbsp;</div>
			<div class="sm_hide" >
				<a class="btn btn-warning col-md-6 btn-sm pro_ad_btn cus_pull-ri_800" onclick="singleitemaddtocart('<?php echo $products_list['item_id']; ?>','<?php echo $products_list['category_id']; ?>','single')" type="submit" ><i class="fa fa-shopping-cart"></i>  ADD TO CART</a> 
				<button class="btn btn-sm  btn-primary col-md-6 pull-right pro_ad_btn"  type="submit"><i class="fa fa-bolt" aria-hidden="true"></i>  BUY NOW</button>
				<div class="clearfix">&nbsp;</div>
			</div>
			<div class=" ">
			<div class="md_hide " >
				<a style="position:fixed;bottom:0;left:0;z-index:1024"class="btn  btn-warning col-sm-6 col-xs-6 col-md-6 " onclick="singleitemaddtocart('<?php echo $products_list['item_id']; ?>','<?php echo $products_list['category_id']; ?>','single')" type="submit" ><i class="fa fa-shopping-cart"></i>  ADD TO CART</a> 
				<button style="position:fixed;bottom:0;right:0;z-index:1024" class="btn   btn-danger col-sm-6 col-xs-6 col-md-6 "  type="submit"><i class="fa fa-bolt" aria-hidden="true"></i>  BUY NOW</button>
			</div>
			</div>
			
			
        </div>
		<?php } ?>
		 </form>
        </div>
		
	

        <div class="col-md-8 col-md-offset-3" style="margin-top:10px;padding:0">
	<?php if(isset($products_list['highlights']) && $products_list['highlights']!=''){ ?> 
		<div class="">		 
			<table class="table table-bordered">
			  
				<tbody>
				  <tr style="border-bottom:1px solid #ddd">
					<th>Summary</th>
				  </tr>
				  <tr>
					<td>
						<div class="row">
							<h5 style="padding:0px 15px"><?php echo isset($products_list['highlights'])?$products_list['highlights']:''; ?></h5>
						</div>
					</td>
					
				  </tr>
				
				
				</tbody>
			  </table>
		</div>	
	<?php } ?>
<?php //echo '<pre>';print_r($products_list);exit;?>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
		  <?php if(isset($products_desc_list) && count($products_desc_list)>0){ ?>
            <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Description</a></li>
		  <?php } ?>
		  
			<li role="presentation" class=""><a href="#specification" aria-controls="desc" role="tab" data-toggle="tab">Specifications</a></li>
			
			<?php if(isset($products_list['warranty_summary']) && $products_list['warranty_summary']!=''){ ?>
			<li role="presentation"><a href="#warnty" aria-controls="detail" role="tab" data-toggle="tab">Warranty Details</a></li>
			<?php } ?>
			<?php if(isset($products_list['return_policy']) && $products_list['return_policy']!=''){ ?>
			<li role="presentation"><a href="#returnpolices" aria-controls="detail" role="tab" data-toggle="tab">Return Policy</a></li>
			<?php } ?>
			<?php if(isset($products_reviews) && count($products_reviews)>0){ ?>
				<li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews (<?php echo count($products_reviews); ?>)</a></li>
			<?php } ?>
		  </ul>
          <!-- End Nav tabs -->

          <!-- Tab panes -->
          <div class="tab-content tab-content-detail">

              <!-- Description Tab Content -->
              <div role="tabpanel" class="tab-pane active" id="desc">
			  
			 <?php $c=0;foreach($products_desc_list as $list){ ?>
                 <div class="well">
				 <?php if (($c % 2) == 0) { ?>
					<div class="row">
					<div class="col-md-9">
							<p><?php echo $list['description']; ?></p>
						</div>
						<div class="col-md-3">
						<?php if(isset($list['image']) && $list['image']!=''){ ?>
							<img  style="height:120px; width:auto;" class="img-responsive pull-right" src="<?php echo base_url('uploads/products/'.$list['image']);?>">
						<?php } ?>
						</div>
						
					</div>
					
				 <?php }else{ ?>
				 <div class="row">
					
						<div class="col-md-3">
							<?php if(isset($list['image']) && $list['image']!=''){ ?>
								<img style="height:120px; width:auto;" class="img-responsive pull-left" src="<?php echo base_url('uploads/products/'.$list['image']);?>">
							<?php } ?>
						</div>
						<div class="col-md-9">
							<p><?php echo $list['description']; ?></p>	</div>
						
					</div>
				 <?php } ?>
					
                  <!--<p>
                  <?php //echo $products_list['description']; ?> </p>-->
                </div>
				
			 <?php $c++;} ?>
              </div> 
			  <div role="tabpanel" class="tab-pane" id="specification">
                 <div class="well">
				<div >
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="panel-heading" role="tab" id="headingOne" style="cursor:pointer;">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							General
							</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
                <tbody>
                      <tr>
                        <td>product Name</td>
                        <td><?php echo $products_list['item_name']; ?></td>
                      </tr>
                      <?php if(isset($products_list['brand']) && $products_list['brand']!=''){ ?>
					  <tr>
                        <td>Brand</td>
                        <td><?php echo $products_list['brand']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['product_code']) && $products_list['product_code']!=''){ ?>
					  <tr>
                        <td>Product Code</td>
                        <td><?php echo $products_list['product_code']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['Processor']) && $products_list['Processor']!=''){ ?>
					  <tr>
                        <td>Processor</td>
                        <td><?php echo $products_list['Processor']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['screen_size']) && $products_list['screen_size']!=''){ ?>
					  <tr>
                        <td>Screen Size</td>
                        <td><?php echo $products_list['screen_size']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['internal_memeory']) && $products_list['internal_memeory']!=''){ ?>
					  <tr>
                        <td>Internal Memory</td>
                        <td><?php echo $products_list['internal_memeory']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['camera']) && $products_list['camera']!=''){ ?>
					  <tr>
                        <td>Camera</td>
                        <td><?php echo $products_list['camera']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['sim_type']) && $products_list['sim_type']!=''){ ?>
					  <tr>
                        <td>Sim Type</td>
                        <td><?php echo $products_list['sim_type']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['os']) && $products_list['os']!=''){ ?>
					  <tr>
                        <td>OS</td>
                        <td><?php echo $products_list['os']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['colour']) && $products_list['colour']!=''){ ?>
					  <tr>
                        <td>Colour</td>
                        <td><?php echo $products_list['colour']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['ram']) && $products_list['ram']!=''){ ?>
					  <tr>
                        <td>RAM</td>
                        <td><?php echo $products_list['ram']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['resolution']) && $products_list['resolution']!=''){ ?>
					  <tr>
                        <td>Resolution</td>
                        <td><?php echo $products_list['resolution']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['sensor_type']) && $products_list['sensor_type']!=''){ ?>
					  <tr>
                        <td>Sensor Type</td>
                        <td><?php echo $products_list['sensor_type']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['lcd_screen_size']) && $products_list['lcd_screen_size']!=''){ ?>
					  <tr>
                        <td>LCD Screen Size</td>
                        <td><?php echo $products_list['lcd_screen_size']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['wifi']) && $products_list['wifi']!=''){ ?>
					  <tr>
                        <td>Wi-fi</td>
                        <td><?php echo $products_list['wifi']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['factor']) && $products_list['factor']!=''){ ?>
					  <tr>
                        <td>Form Factor</td>
                        <td><?php echo $products_list['factor']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['interface']) && $products_list['interface']!=''){ ?>
					  <tr>
                        <td>Interface</td>
                        <td><?php echo $products_list['interface']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['model_series']) && $products_list['model_series']!=''){ ?>
					  <tr>
                        <td>Model Series</td>
                        <td><?php echo $products_list['model_series']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['installation']) && $products_list['installation']!=''){ ?>
					  <tr>
                        <td>Installation</td>
                        <td><?php echo $products_list['installation']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['warranty_card']) && $products_list['warranty_card']!=''){ ?>
					  <tr>
                        <td>Warranty card</td>
                        <td><?php echo $products_list['warranty_card']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['functions']) && $products_list['functions']!=''){ ?>
					  <tr>
                        <td>Functions</td>
                        <td><?php echo $products_list['functions']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['printer_type']) && $products_list['printer_type']!=''){ ?>
					  <tr>
                        <td>Printer Type</td>
                        <td><?php echo $products_list['printer_type']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['printer_output']) && $products_list['printer_output']!=''){ ?>
					  <tr>
                        <td>Printer Output</td>
                        <td><?php echo $products_list['printer_output']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['model_name']) && $products_list['model_name']!=''){ ?>
					  <tr>
                        <td>Model Name</td>
                        <td><?php echo $products_list['model_name']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['model_id']) && $products_list['model_id']!=''){ ?>
					  <tr>
                        <td>Model ID</td>
                        <td><?php echo $products_list['model_id']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['ingredients']) && $products_list['ingredients']!=''){ ?>
					  <tr>
                        <td>Ingredients</td>
                        <td><?php echo $products_list['ingredients']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['key_feature']) && $products_list['key_feature']!=''){ ?>
					  <tr>
                        <td>Key Feature</td>
                        <td><?php echo $products_list['key_feature']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['unit']) && $products_list['unit']!=''){ ?>
					  <tr>
                        <td>Unit</td>
                        <td><?php echo $products_list['unit']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['packingtype']) && $products_list['packingtype']!=''){ ?>
					  <tr>
                        <td>Packing Type</td>
                        <td><?php echo $products_list['packingtype']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['size']) && $products_list['size']!=''){ ?>
					  <tr>
                        <td>Size</td>
                        <td><?php echo $products_list['size']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['occasion']) && $products_list['occasion']!=''){ ?>
					  <tr>
                        <td>Occasion</td>
                        <td><?php echo $products_list['occasion']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['material']) && $products_list['material']!=''){ ?>
					  <tr>
                        <td>Material</td>
                        <td><?php echo $products_list['material']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['wash_care']) && $products_list['wash_care']!=''){ ?>
					  <tr>
                        <td>Wash care</td>
                        <td><?php echo $products_list['wash_care']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['style_code']) && $products_list['style_code']!=''){ ?>
					  <tr>
                        <td>Style Code</td>
                        <td><?php echo $products_list['style_code']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['look']) && $products_list['look']!=''){ ?>
					  <tr>
                        <td>Look</td>
                        <td><?php echo $products_list['look']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['collar_type']) && $products_list['collar_type']!=''){ ?>
					  <tr>
                        <td>Collar Type</td>
                        <td><?php echo $products_list['collar_type']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['sleeve']) && $products_list['sleeve']!=''){ ?>
					  <tr>
                        <td>Sleeve</td>
                        <td><?php echo $products_list['sleeve']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['fit']) && $products_list['fit']!=''){ ?>
					  <tr>
                        <td>Fit</td>
                        <td><?php echo $products_list['fit']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['type']) && $products_list['type']!=''){ ?>
					  <tr>
							<?php if($products_list['subcategory_id']==113){?>
								<td>Device Type</td>
									<?php }else{ ?>
								<td>Type</td>
							<?php } ?>
							<td><?php echo $products_list['type']; ?></td>
                      </tr>
					  <?php } ?>
					  
					  <?php if(isset($products_list['capacity']) && $products_list['capacity']!=''){ ?>
					  <tr>
                        <td>Capacity</td>
                        <td><?php echo $products_list['capacity']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['datarate']) && $products_list['datarate']!=''){ ?>
					  <tr>
                        <td>DATA Rate</td>
                        <td><?php echo $products_list['datarate']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['technology']) && $products_list['technology']!=''){ ?>
					  <tr>
                        <td>Technology</td>
                        <td><?php echo $products_list['technology']; ?></td>
                      </tr>
					  <?php } ?> 
					   
					  <?php if(isset($products_list['inputvoltage']) && $products_list['inputvoltage']!=''){ ?>
					  <tr>
                        <td>Input Voltage</td>
                        <td><?php echo $products_list['inputvoltage']; ?></td>
                      </tr>
					  <?php } ?>  
					  <?php if(isset($products_list['outputvoltage']) && $products_list['outputvoltage']!=''){ ?>
					  <tr>
                        <td>Output Voltage</td>
                        <td><?php echo $products_list['outputvoltage']; ?></td>
                      </tr>
					  <?php } ?>   
					  <?php if(isset($products_list['inputfrequency']) && $products_list['inputfrequency']!=''){ ?>
					  <tr>
                        <td>Input Frequency</td>
                        <td><?php echo $products_list['inputfrequency']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if($products_list['subcategory_id']==246){ ?>	
						   <?php if(isset($products_list['operating_frequency']) && $products_list['operating_frequency']!=''){ ?>
						  <tr>
							<td>Output Frequency</td>
							<td><?php echo $products_list['operating_frequency']; ?></td>
						  </tr>
						  <?php } ?> 
						  <?php if(isset($products_list['power']) && $products_list['power']!=''){ ?>
							<tr>
							<td>Output Power Wattage</td>
							<td><?php echo $products_list['power']; ?></td>
						  </tr>
						 <?php } ?>
						 <?php if(isset($products_list['battery_capacity']) && $products_list['battery_capacity']!=''){ ?>
							<tr>
							<td>Capacity</td>
							<td><?php echo $products_list['battery_capacity']; ?></td>
						  </tr>
						 <?php } ?>
					  <?php } ?>
					  <?php if(isset($products_list['part_number']) && $products_list['part_number']!=''){ ?>
					  <tr>
                        <td>Part Number</td>
                        <td><?php echo $products_list['part_number']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['os']) && $products_list['os']!=''){ ?>
					  <tr>
                        <td>Operating System</td>
                        <td><?php echo $products_list['os']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['hdd_capacity']) && $products_list['hdd_capacity']!=''){ ?>
					  <tr>
                        <td>HDD Capacity</td>
                        <td><?php echo $products_list['hdd_capacity']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['neck_type']) && $products_list['neck_type']!=''){ ?>
					  <tr>
                        <td>Neck Type</td>
                        <td><?php echo $products_list['neck_type']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['length']) && $products_list['length']!=''){ ?>
					  <tr>
                        <td>Length</td>
                        <td><?php echo $products_list['length']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['pockets']) && $products_list['pockets']!=''){ ?>
					  <tr>
                        <td>Pockets</td>
                        <td><?php echo $products_list['pockets']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['blouse_length']) && $products_list['blouse_length']!=''){ ?>
					  <tr>
                        <td>Blouse Length</td>
                        <td><?php echo $products_list['blouse_length']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['saree_length']) && $products_list['saree_length']!=''){ ?>
					  <tr>
                        <td>Saree Length</td>
                        <td><?php echo $products_list['saree_length']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['pattern']) && $products_list['pattern']!=''){ ?>
					  <tr>
                        <td>Pattern</td>
                        <td><?php echo $products_list['pattern']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['set_contents']) && $products_list['set_contents']!=''){ ?>
					  <tr>
                        <td>Set Contents</td>
                        <td><?php echo $products_list['set_contents']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['gender']) && $products_list['gender']!=''){ ?>
					  <tr>
                        <td>Gender</td>
                        <td><?php echo $products_list['gender']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['package_contents']) && $products_list['package_contents']!=''){ ?>
					  <tr>
                        <td>Package Contents</td>
                        <td><?php echo $products_list['package_contents']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['style']) && $products_list['style']!=''){ ?>
					  <tr>
                        <td>Style</td>
                        <td><?php echo $products_list['style']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['age']) && $products_list['age']!=''){ ?>
					  <tr>
                        <td>Age</td>
                        <td><?php echo $products_list['age']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['weight']) && $products_list['weight']!=''){ ?>
					  <tr>
                        <td>Weight</td>
                        <td><?php echo $products_list['weight']; ?></td>
                      </tr>
					  <?php } ?>  
					  <?php if(isset($products_list['connector1']) && $products_list['connector1']!=''){ ?>
					  <tr>
                        <td>Connector 1</td>
                        <td><?php echo $products_list['connector1']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['connector2']) && $products_list['connector2']!=''){ ?>
					  <tr>
                        <td>Connector 2</td>
                        <td><?php echo $products_list['connector2']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['model_name']) && $products_list['model_name']!=''){ ?>
					  <tr>
                        <td>Model Name</td>
                        <td><?php echo $products_list['model_name']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['model_id']) && $products_list['model_id']!=''){ ?>
					  <tr>
                        <td>Model Id</td>
                        <td><?php echo $products_list['model_id']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['useage']) && $products_list['useage']!=''){ ?>
					  <tr>
                        <td>Useage</td>
                        <td><?php echo $products_list['useage']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['waterproof']) && $products_list['waterproof']!=''){ ?>
					  <tr>
                        <td>Waterproof</td>
                        <td><?php echo $products_list['waterproof']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['laptop_compartment']) && $products_list['laptop_compartment']!=''){ ?>
					  <tr>
                        <td>Laptop Compartment</td>
                        <td><?php echo $products_list['laptop_compartment']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['focus_lock']) && $products_list['focus_lock']!=''){ ?>
					  <tr>
                        <td>Number Lock Mechanism</td>
                        <td><?php echo $products_list['focus_lock']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['closure']) && $products_list['closure']!=''){ ?>
					  <tr>
                        <td>Closure</td>
                        <td><?php echo $products_list['closure']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['wheels']) && $products_list['wheels']!=''){ ?>
					  <tr>
                        <td>Wheels</td>
                        <td><?php echo $products_list['wheels']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['no_of_copartments']) && $products_list['no_of_copartments']!=''){ ?>
					  <tr>
                        <td>No of Copartments</td>
                        <td><?php echo $products_list['no_of_copartments']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['no_of_pockets']) && $products_list['no_of_pockets']!=''){ ?>
					  <tr>
                        <td>No of Pockets</td>
                        <td><?php echo $products_list['no_of_pockets']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['inner_material']) && $products_list['inner_material']!=''){ ?>
					  <tr>
                        <td>Inner Material</td>
                        <td><?php echo $products_list['inner_material']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['sole_material']) && $products_list['sole_material']!=''){ ?>
					  <tr>
					  <?php if($products_list['subcategory_id']==128 || $products_list['subcategory_id']==129 || $products_list['subcategory_id']==130 ||  $products_list['subcategory_id']==132 ||   $products_list['subcategory_id']==133 ||   $products_list['subcategory_id']==140){ ?>
                        <td>Sole Material</td>
					  <?php }else{ ?>
						<td>Outer Material</td>
					  <?php } ?>
                        <td><?php echo $products_list['sole_material']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['fastening']) && $products_list['fastening']!=''){ ?>
					  <tr>
                        <td>Fastening</td>
                        <td><?php echo $products_list['fastening']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['toe_shape']) && $products_list['toe_shape']!=''){ ?>
					  <tr>
                        <td>Toe Shape</td>
                        <td><?php echo $products_list['toe_shape']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['ean_upc']) && $products_list['ean_upc']!=''){ ?>
					  <tr>
                        <td>EAN/UPC</td>
                        <td><?php echo $products_list['ean_upc']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['product_dimension']) && $products_list['product_dimension']!=''){ ?>
					  <tr>
                        <td>Product Dimension (In CM)</td>
                        <td><?php echo $products_list['product_dimension']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['series']) && $products_list['series']!=''){ ?>
					  <tr>
					  <?php if($products_list['subcategory_id']==243){ ?>
                        <td>Series</td>
					  <?php }else{ ?>
						<td>Motherboard Series</td>
					  <?php } ?>
                        <td><?php echo $products_list['series']; ?></td>
                      </tr>
					  <?php } ?> 
					   <?php if(isset($products_list['voltagerange']) && $products_list['voltagerange']!=''){ ?>
					  <tr>
                        <td>Voltage Range</td>
                        <td><?php echo $products_list['voltagerange']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['turbospeed']) && $products_list['turbospeed']!=''){ ?>
					  <tr>
                        <td>Maximum Turbo Speed</td>
                        <td><?php echo $products_list['turbospeed']; ?></td>
                      </tr>
					  <?php } ?>
					    <?php if(isset($products_list['turbospeed']) && $products_list['turbospeed']!=''){ ?>
					  <tr>
                        <td>Maximum Turbo Speed</td>
                        <td><?php echo $products_list['turbospeed']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['graphics']) && $products_list['graphics']!=''){ ?>
					  <tr>
                        <td>Integrated Graphics</td>
                        <td><?php echo $products_list['graphics']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['portable']) && $products_list['portable']!=''){ ?>
					  <tr>
                        <td>Portable</td>
                        <td><?php echo $products_list['portable']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['maximumbrightness']) && $products_list['maximumbrightness']!=''){ ?>
					  <tr>
                        <td>Maximum Brightness</td>
                        <td><?php echo $products_list['maximumbrightness']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['projectionratio']) && $products_list['projectionratio']!=''){ ?>
					  <tr>
                        <td>Projection Ratio 1</td>
                        <td><?php echo $products_list['projectionratio']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['contrastratio']) && $products_list['contrastratio']!=''){ ?>
					  <tr>
                        <td>Contrast Ratio</td>
                        <td><?php echo $products_list['contrastratio']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['outputperspeaker']) && $products_list['outputperspeaker']!=''){ ?>
					  <tr>
                        <td>Output Per Speaker</td>
                        <td><?php echo $products_list['outputperspeaker']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['powersupply']) && $products_list['powersupply']!=''){ ?>
					  <tr>
                        <td>Power Supply</td>
                        <td><?php echo $products_list['powersupply']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['powerconsumption']) && $products_list['powerconsumption']!=''){ ?>
					  <tr>
                        <td>Power Consumption</td>
                        <td><?php echo $products_list['powerconsumption']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['minopertingtemperature']) && $products_list['minopertingtemperature']!=''){ ?>
					  <tr>
                        <td>Minimum Operating Temperature</td>
                        <td><?php echo $products_list['minopertingtemperature']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['maxopertingtemperature']) && $products_list['maxopertingtemperature']!=''){ ?>
					  <tr>
                        <td>Maximum Operting Temperature</td>
                        <td><?php echo $products_list['maxopertingtemperature']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['remotecontrol']) && $products_list['remotecontrol']!=''){ ?>
					  <tr>
                        <td>Remote Control</td>
                        <td><?php echo $products_list['remotecontrol']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['externaldrivebays']) && $products_list['externaldrivebays']!=''){ ?>
					  <tr>
                        <td>External Drive Bays</td>
                        <td><?php echo $products_list['externaldrivebays']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['internaldrivebays']) && $products_list['internaldrivebays']!=''){ ?>
					  <tr>
                        <td>Internal Drive Bays</td>
                        <td><?php echo $products_list['internaldrivebays']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['usb_port']) && $products_list['usb_port']!=''){ ?>
					  <tr>
                        <td>Front USB Port</td>
                        <td><?php echo $products_list['usb_port']; ?></td>
                      </tr>
					  <?php } ?> 
					  <?php if(isset($products_list['micport']) && $products_list['micport']!=''){ ?>
					  <tr>
                        <td>Front USB / Mic Port</td>
                        <td><?php echo $products_list['micport']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['f_stop']) && $products_list['f_stop']!=''){ ?>
					  <tr>
                        <td>Minimum f/stop</td>
                        <td><?php echo $products_list['f_stop']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['picture_angle']) && $products_list['picture_angle']!=''){ ?>
					  <tr>
                        <td>Picture Angle with Nikon DX Format</td>
                        <td><?php echo $products_list['picture_angle']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['ideal_for']) && $products_list['ideal_for']!=''){ ?>
					  <tr>
                        <td>Ideal for</td>
                        <td><?php echo $products_list['ideal_for']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['dimension']) && $products_list['dimension']!=''){ ?>
					  <tr>
                        <td>Dimension</td>
                        <td><?php echo $products_list['dimension']; ?></td>
                      </tr>
					  <?php } ?>
					  <?php if(isset($products_list['disclaimer']) && $products_list['disclaimer']!=''){ ?>
					  <tr>
                        <td>Disclaimer</td>
                        <td><?php echo $products_list['disclaimer']; ?></td>
                      </tr>
					  <?php } ?>
						</tbody>
                  </table>
							
							</div>
						</div>
					</div>
					<?php if($products_list['subcategory_id']==107){ ?>
					
						<?php if($products_list['Processor']!='' || $products_list['processorbrand']!='' || $products_list['variant']!='' || $products_list['chipset']!='' || $products_list['clock_speed']!='' || $products_list['cache']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseProcessor" aria-expanded="false" aria-controls="collapseProcessor" class="panel-heading" role="tab" id="headingProcessor" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Processor
							  </a>
						  </h4>

							</div>
							<div id="collapseProcessor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingProcessor">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['Processor']) && $products_list['Processor']!=''){ ?>
										  <tr>
											<td>Processor</td>
											<td><?php echo $products_list['Processor']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['processorbrand']) && $products_list['processorbrand']!=''){ ?>
										  <tr>
											<td>ProcessorBrand</td>
											<td><?php echo $products_list['processorbrand']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['variant']) && $products_list['variant']!=''){ ?>
										  <tr>
											<td>Variant</td>
											<td><?php echo $products_list['variant']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['chipset']) && $products_list['chipset']!=''){ ?>
										  <tr>
											<td>Chipset</td>
											<td><?php echo $products_list['chipset']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['clock_speed']) && $products_list['clock_speed']!=''){ ?>
										  <tr>
											<td>Clock Speed</td>
											<td><?php echo $products_list['clock_speed']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['cache']) && $products_list['cache']!=''){ ?>
										  <tr>
											<td>Cache</td>
											<td><?php echo $products_list['cache']; ?></td>
										  </tr>
									<?php } ?>
													
									
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
						<?php if($products_list['screen_type']!='' || $products_list['resolution']!='' || $products_list['graphic_processor']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapsescreen_type" aria-expanded="false" aria-controls="collapsescreen_type" class="panel-heading" role="tab" id="headingscreen_type" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Display
							  </a>
						  </h4>

							</div>
							<div id="collapsescreen_type" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingscreen_type">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['screen_type']) && $products_list['screen_type']!=''){ ?>
										  <tr>
											<td>Screen Type</td>
											<td><?php echo $products_list['screen_type']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['resolution']) && $products_list['resolution']!=''){ ?>
										  <tr>
											<td>Resolution</td>
											<td><?php echo $products_list['resolution']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['graphic_processor']) && $products_list['graphic_processor']!=''){ ?>
										  <tr>
											<td>Graphic Processor</td>
											<td><?php echo $products_list['graphic_processor']; ?></td>
										  </tr>
									<?php } ?>	
									
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['memory_slots']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapsememory_slots" aria-expanded="false" aria-controls="collapsememory_slots" class="panel-heading" role="tab" id="headingmemory_slots" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Memory
							  </a>
						  </h4>

							</div>
							<div id="collapsememory_slots" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingmemory_slots">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['memory_slots']) && $products_list['memory_slots']!=''){ ?>
										  <tr>
											<td>Memory Slots</td>
											<td><?php echo $products_list['memory_slots']; ?></td>
										  </tr>
									<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['OS']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseOS" aria-expanded="false" aria-controls="collapseOS" class="panel-heading" role="tab" id="headingOS" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  OS
							  </a>
						  </h4>

							</div>
							<div id="collapseOS" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOS">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['OS']) && $products_list['OS']!=''){ ?>
										  <tr>
											<td>Operating System</td>
											<td><?php echo $products_list['OS']; ?></td>
										  </tr>
									<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['hdd_capacity']!='' || $products_list['rpm']!='' || $products_list['optical_drive']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseStorage" aria-expanded="false" aria-controls="collapseStorage" class="panel-heading" role="tab" id="headingStorage" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Storage
							  </a>
						  </h4>

							</div>
							<div id="collapseStorage" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingStorage">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['hdd_capacity']) && $products_list['hdd_capacity']!=''){ ?>
										  <tr>
											<td>HDD Capacity</td>
											<td><?php echo $products_list['hdd_capacity']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['rpm']) && $products_list['rpm']!=''){ ?>
										  <tr>
											<td>RPM</td>
											<td><?php echo $products_list['rpm']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['optical_drive']) && $products_list['optical_drive']!=''){ ?>
										  <tr>
											<td>Optical Drive</td>
											<td><?php echo $products_list['optical_drive']; ?></td>
										  </tr>
									<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
						<?php if($products_list['wan']!='' || $products_list['ethernet']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseCommunication" aria-expanded="false" aria-controls="collapseCommunication" class="panel-heading" role="tab" id="headingCommunication" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Network & Communication
							  </a>
						  </h4>

							</div>
							<div id="collapseCommunication" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCommunication">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['wan']) && $products_list['wan']!=''){ ?>
										  <tr>
											<td>Wireless WAN</td>
											<td><?php echo $products_list['wan']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['ethernet']) && $products_list['ethernet']!=''){ ?>
										  <tr>
											<td>Ethernet</td>
											<td><?php echo $products_list['ethernet']; ?></td>
										  </tr>
									<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['vgaport']!='' || $products_list['usb_port']!='' || $products_list['hdmi_port']!='' || $products_list['multi_card_slot']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapsePort" aria-expanded="false" aria-controls="collapsePort" class="panel-heading" role="tab" id="headingPort" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Port
							  </a>
						  </h4>

							</div>
							<div id="collapsePort" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPort">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['vgaport']) && $products_list['vgaport']!=''){ ?>
										  <tr>
											<td>VGA Port</td>
											<td><?php echo $products_list['vgaport']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['usb_port']) && $products_list['usb_port']!=''){ ?>
										  <tr>
											<td>USB Port</td>
											<td><?php echo $products_list['usb_port']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['hdmi_port']) && $products_list['hdmi_port']!=''){ ?>
										  <tr>
											<td>HDMI Port</td>
											<td><?php echo $products_list['hdmi_port']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['multi_card_slot']) && $products_list['multi_card_slot']!=''){ ?>
										  <tr>
											<td>Multi Card Slot</td>
											<td><?php echo $products_list['multi_card_slot']; ?></td>
										  </tr>
									<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['web_camera']!='' || $products_list['keyboard']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseInputs" aria-expanded="false" aria-controls="collapseInputs" class="panel-heading" role="tab" id="headingInputs" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Inputs
							  </a>
						  </h4>

							</div>
							<div id="collapseInputs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingInputs">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['web_camera']) && $products_list['web_camera']!=''){ ?>
										  <tr>
											<td>Web Camera</td>
											<td><?php echo $products_list['web_camera']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['keyboard']) && $products_list['keyboard']!=''){ ?>
										  <tr>
											<td>Keyboard</td>
											<td><?php echo $products_list['keyboard']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['speakers']!='' || $products_list['mic_in']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseAudio" aria-expanded="false" aria-controls="collapseAudio" class="panel-heading" role="tab" id="headingAudio" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Audio
							  </a>
						  </h4>

							</div>
							<div id="collapseAudio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAudio">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['speakers']) && $products_list['speakers']!=''){ ?>
										  <tr>
											<td>Speakers</td>
											<td><?php echo $products_list['speakers']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['mic_in']) && $products_list['mic_in']!=''){ ?>
										  <tr>
											<td>Mic In</td>
											<td><?php echo $products_list['mic_in']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
						<?php if($products_list['power_supply']!='' || $products_list['battery_backup']!='' || $products_list['battery_cell']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseBackup" aria-expanded="false" aria-controls="collapseBackup" class="panel-heading" role="tab" id="headingBackup" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Battery Backup
							  </a>
						  </h4>

							</div>
							<div id="collapseBackup" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBackup">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['power_supply']) && $products_list['power_supply']!=''){ ?>
										  <tr>
											<td>Power Supply</td>
											<td><?php echo $products_list['power_supply']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['battery_backup']) && $products_list['battery_backup']!=''){ ?>
										  <tr>
											<td>Battery Backup</td>
											<td><?php echo $products_list['battery_backup']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['battery_cell']) && $products_list['battery_cell']!=''){ ?>
										  <tr>
											<td>Battery Cell</td>
											<td><?php echo $products_list['battery_cell']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['dimension']!='' || $products_list['weight']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseDimensions" aria-expanded="false" aria-controls="collapseDimensions" class="panel-heading" role="tab" id="headingDimensions" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Dimensions
							  </a>
						  </h4>

							</div>
							<div id="collapseDimensions" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDimensions">
								<div class="panel-body">
									<table class="table table-bordered mar_t10">
										<tbody>
											<?php if(isset($products_list['dimension']) && $products_list['dimension']!=''){ ?>
												  <tr>
													<td>Dimension</td>
													<td><?php echo $products_list['dimension']; ?></td>
												  </tr>
											<?php } ?>
											<?php if(isset($products_list['weight']) && $products_list['weight']!=''){ ?>
												  <tr>
													<td>Weight</td>
													<td><?php echo $products_list['weight']; ?></td>
												  </tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
						<?php if($products_list['adapter']!='' || $products_list['office']!='' || $products_list['fingerprint_point']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseFeatures" aria-expanded="false" aria-controls="collapseFeatures" class="panel-heading" role="tab" id="headingFeatures" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Additional Features
							  </a>
						  </h4>

							</div>
							<div id="collapseFeatures" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFeatures">
								<div class="panel-body">
									<table class="table table-bordered mar_t10">
										<tbody>
											<?php if(isset($products_list['adapter']) && $products_list['adapter']!=''){ ?>
												  <tr>
													<td>Adapter</td>
													<td><?php echo $products_list['adapter']; ?></td>
												  </tr>
											<?php } ?>
											<?php if(isset($products_list['office']) && $products_list['office']!=''){ ?>
												  <tr>
													<td>Office</td>
													<td><?php echo $products_list['office']; ?></td>
												  </tr>
											<?php } ?>
											<?php if(isset($products_list['fingerprint_point']) && $products_list['fingerprint_point']!=''){ ?>
												  <tr>
													<td>Fingerprint Point</td>
													<td><?php echo $products_list['fingerprint_point']; ?></td>
												  </tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
					
					<?php }else if($products_list['subcategory_id']==111){ ?>
					
							<?php if($products_list['max_print_resolution']!='' || $products_list['print_speed']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapsePrint" aria-expanded="false" aria-controls="collapsePrint" class="panel-heading" role="tab" id="headingPrint" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Print
							  </a>
						  </h4>

							</div>
							<div id="collapsePrint" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPrint">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['max_print_resolution']) && $products_list['max_print_resolution']!=''){ ?>
										  <tr>
											<td>Max Print Resolution</td>
											<td><?php echo $products_list['max_print_resolution']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['print_speed']) && $products_list['print_speed']!=''){ ?>
										  <tr>
											<td>Max Print Speed</td>
											<td><?php echo $products_list['print_speed']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['scanner_type']!='' || $products_list['document_size']!='' || $products_list['scanning_resolution']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseScan" aria-expanded="false" aria-controls="collapseScan" class="panel-heading" role="tab" id="headingScan" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Scan
							  </a>
						  </h4>

							</div>
							<div id="collapseScan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingScan">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['scanner_type']) && $products_list['scanner_type']!=''){ ?>
										  <tr>
											<td>Scanner Type</td>
											<td><?php echo $products_list['scanner_type']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['document_size']) && $products_list['document_size']!=''){ ?>
										  <tr>
											<td>Max Print Speed</td>
											<td><?php echo $products_list['document_size']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['scanning_resolution']) && $products_list['scanning_resolution']!=''){ ?>
										  <tr>
											<td>Optical Scanning Resolution</td>
											<td><?php echo $products_list['scanning_resolution']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
						<?php if($products_list['copies_from']!='' || $products_list['copy_size']!='' || $products_list['iso_29183']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseCopy" aria-expanded="false" aria-controls="collapseCopy" class="panel-heading" role="tab" id="headingCopy" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Copy
							  </a>
						  </h4>

							</div>
							<div id="collapseCopy" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCopy">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['copies_from']) && $products_list['copies_from']!=''){ ?>
										  <tr>
											<td>Maximum Copies From Standalone</td>
											<td><?php echo $products_list['copies_from']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['copy_size']) && $products_list['copy_size']!=''){ ?>
										  <tr>
											<td>Maximum Copy Size</td>
											<td><?php echo $products_list['copy_size']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['iso_29183']) && $products_list['iso_29183']!=''){ ?>
										  <tr>
											<td>ISO 29183, A4, Simplex</td>
											<td><?php echo $products_list['iso_29183']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['noise_level']!='' || $products_list['paper_hold_input']!='' || $products_list['paper_hold_output']!='' || $products_list['paper_size']!='' || $products_list['print_margin']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseAdditional" aria-expanded="false" aria-controls="collapseAdditional" class="panel-heading" role="tab" id="headingAdditional" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Additional Features
							  </a>
						  </h4>

							</div>
							<div id="collapseAdditional" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAdditional">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['noise_level']) && $products_list['noise_level']!=''){ ?>
										  <tr>
											<td>Noise Level</td>
											<td><?php echo $products_list['noise_level']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['paper_hold_input']) && $products_list['paper_hold_input']!=''){ ?>
										  <tr>
											<td>Paper Hold Input Capacity</td>
											<td><?php echo $products_list['paper_hold_input']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['paper_hold_output']) && $products_list['paper_hold_output']!=''){ ?>
										  <tr>
											<td>Paper Hold OutPut Capacity</td>
											<td><?php echo $products_list['paper_hold_output']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['paper_size']) && $products_list['paper_size']!=''){ ?>
										  <tr>
											<td>Paper Size</td>
											<td><?php echo $products_list['paper_size']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['print_margin']) && $products_list['print_margin']!=''){ ?>
										  <tr>
											<td>Print Margin</td>
											<td><?php echo $products_list['print_margin']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['standby']!='' || $products_list['operating_temperature_range']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseMargin" aria-expanded="false" aria-controls="collapseMargin" class="panel-heading" role="tab" id="headingMargin" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Print Margin
							  </a>
						  </h4>

							</div>
							<div id="collapseMargin" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMargin">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['standby']) && $products_list['standby']!=''){ ?>
										  <tr>
											<td>Standby</td>
											<td><?php echo $products_list['standby']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['operating_temperature_range']) && $products_list['operating_temperature_range']!=''){ ?>
										  <tr>
											<td>Operating Temperature Range</td>
											<td><?php echo $products_list['operating_temperature_range']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						<?php if($products_list['power']!='' || $products_list['frequency']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapsePower" aria-expanded="false" aria-controls="collapsePower" class="panel-heading" role="tab" id="headingPower" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Power
							  </a>
						  </h4>

							</div>
							<div id="collapsePower" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPower">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['power']) && $products_list['power']!=''){ ?>
										  <tr>
											<td>Power Requirement</td>
											<td><?php echo $products_list['power']; ?></td>
										  </tr>
									<?php } ?>
									<?php if(isset($products_list['frequency']) && $products_list['frequency']!=''){ ?>
										  <tr>
											<td>Frequency</td>
											<td><?php echo $products_list['frequency']; ?></td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
					<?php } ?>
					<?php if($products_list['minimum_focusing_distance']!='' || $products_list['aperture_withmaxfocal_length']!='' || $products_list['aperture_with_minfocal_length']!='' || $products_list['maximum_focal_length']!='' || $products_list['maximum_reproduction_ratio']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapsePerformance" aria-expanded="false" aria-controls="collapsePerformance" class="panel-heading" role="tab" id="headingPerformance" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Performance Features
						  </a>
					  </h4>

						</div>
						<div id="collapsePerformance" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPerformance">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
								<?php if(isset($products_list['minimum_focusing_distance']) && $products_list['minimum_focusing_distance']!=''){ ?>
												  <tr>
													<td>Minimum Focusing Distance</td>
													<td><?php echo $products_list['minimum_focusing_distance']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['aperture_withmaxfocal_length']) && $products_list['aperture_withmaxfocal_length']!=''){ ?>
												  <tr>
													<td>Aperture With Max Focal Length</td>
													<td><?php echo $products_list['aperture_withmaxfocal_length']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['aperture_with_minfocal_length']) && $products_list['aperture_with_minfocal_length']!=''){ ?>
												  <tr>
													<td>Aperture With Min Focal Length</td>
													<td><?php echo $products_list['aperture_with_minfocal_length']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['maximum_focal_length']) && $products_list['maximum_focal_length']!=''){ ?>
												  <tr>
													<td>Maximum Focal Length</td>
													<td><?php echo $products_list['maximum_focal_length']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['maximum_reproduction_ratio']) && $products_list['maximum_reproduction_ratio']!=''){ ?>
												  <tr>
													<td>Maximum Reproduction Ratio</td>
													<td><?php echo $products_list['maximum_reproduction_ratio']; ?></td>
												  </tr>
												  <?php } ?>
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					<?php if($products_list['lens_construction']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseLens" aria-expanded="false" aria-controls="collapseLens" class="panel-heading" role="tab" id="headingLens" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Lens Features
						  </a>
					  </h4>

						</div>
						<div id="collapseLens" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingLens">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
								<?php if(isset($products_list['lens_construction']) && $products_list['lens_construction']!=''){ ?>
												  <tr>
													<td>Lens Construction (Elements/Groups</td>
													<td><?php echo $products_list['lens_construction']; ?></td>
												  </tr>
												  <?php } ?>
												
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<?php if($products_list['noise_reduction']!='' || $products_list['connectivity']!='' ||  $products_list['headphone_jack']!='' ||   $products_list['microphone']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseSound" aria-expanded="false" aria-controls="collapseSound" class="panel-heading" role="tab" id="headingSound" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Sound Features
						  </a>
					  </h4>

						</div>
						<div id="collapseSound" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSound">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
									<?php if(isset($products_list['noise_reduction']) && $products_list['noise_reduction']!=''){ ?>
									<tr>
									<td>Noise Reduction</td>
									<td><?php echo $products_list['noise_reduction']; ?></td>
									</tr>
									<?php } ?>
									<?php if(isset($products_list['connectivity']) && $products_list['connectivity']!=''){ ?>
									<tr>
									<td>Connectivity</td>
									<td><?php echo $products_list['connectivity']; ?></td>
									</tr>
									<?php } ?>
									<?php if(isset($products_list['headphone_jack']) && $products_list['headphone_jack']!=''){ ?>
									<tr>
									<td>Headphone Jack</td>
									<td><?php echo $products_list['headphone_jack']; ?></td>
									</tr>
									<?php } ?>
									<?php if(isset($products_list['microphone']) && $products_list['microphone']!=''){ ?>
									<tr>
									<td>Microphone</td>
									<td><?php echo $products_list['microphone']; ?></td>
									</tr>
									<?php } ?>
												
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<?php if($products_list['lens_mount']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseLens" aria-expanded="false" aria-controls="collapseLens" class="panel-heading" role="tab" id="headingLens" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Lens
							  </a>
						  </h4>

							</div>
							<div id="collapseLens" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingLens">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['lens_mount']) && $products_list['lens_mount']!=''){ ?>
											<tr>
												<td>Lens Mount</td>
												<td><?php echo $products_list['lens_mount']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($products_list['exposure_mode']!='' || $products_list['meter_coupling']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseExposure" aria-expanded="false" aria-controls="collapseExposure" class="panel-heading" role="tab" id="headingExposure" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Exposure
							  </a>
						  </h4>

							</div>
							<div id="collapseExposure" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingExposure">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['exposure_mode']) && $products_list['exposure_mode']!=''){ ?>
											<tr>
												<td>Exposure Mode</td>
												<td><?php echo $products_list['exposure_mode']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['meter_coupling']) && $products_list['meter_coupling']!=''){ ?>
											<tr>
												<td>Exposure Meter Coupling</td>
												<td><?php echo $products_list['meter_coupling']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($products_list['lens_auto_focus']!='' || $products_list['focus_length']!='' || $products_list['focus_point']!='' || $products_list['focus_lock']!='' || $products_list['manual_focus']!='' || $products_list['af_area_mode']!='' || $products_list['detection_range']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseFocus" aria-expanded="false" aria-controls="collapseFocus" class="panel-heading" role="tab" id="headingFocus" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Focus
							  </a>
						  </h4>

							</div>
							<div id="collapseFocus" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFocus">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['lens_auto_focus']) && $products_list['lens_auto_focus']!=''){ ?>
											<tr>
												<td>Lens Auto Focus</td>
												<td><?php echo $products_list['lens_auto_focus']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['focus_length']) && $products_list['focus_length']!=''){ ?>
											<tr>
												<td>Focal Length</td>
												<td><?php echo $products_list['focus_length']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['focus_point']) && $products_list['focus_point']!=''){ ?>
											<tr>
												<td>Focal Point</td>
												<td><?php echo $products_list['focus_point']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['focus_lock']) && $products_list['focus_lock']!=''){ ?>
											<tr>
												<td>Focus Lock</td>
												<td><?php echo $products_list['focus_lock']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['manual_focus']) && $products_list['manual_focus']!=''){ ?>
											<tr>
												<td>Manual Focus</td>
												<td><?php echo $products_list['manual_focus']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['af_area_mode']) && $products_list['af_area_mode']!=''){ ?>
											<tr>
												<td>AF Area Mode</td>
												<td><?php echo $products_list['af_area_mode']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['detection_range']) && $products_list['detection_range']!=''){ ?>
											<tr>
												<td>Detection Range</td>
												<td><?php echo $products_list['detection_range']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($products_list['number_of_dots_effective_pixels']!='' || $products_list['display_type']!='' || $products_list['brightness_setting']!='' || $products_list['viewfinder']!='' || $products_list['viewfindermagnifiaction']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseLCD" aria-expanded="false" aria-controls="collapseLCD" class="panel-heading" role="tab" id="headingLCD" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  LCD
							  </a>
						  </h4>

							</div>
							<div id="collapseLCD" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingLCD">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['number_of_dots_effective_pixels']) && $products_list['number_of_dots_effective_pixels']!=''){ ?>
											<tr>
												<td>Number Of Dots/Effective Pixels</td>
												<td><?php echo $products_list['number_of_dots_effective_pixels']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['display_type']) && $products_list['display_type']!=''){ ?>
											<tr>
												<td>Display Type</td>
												<td><?php echo $products_list['display_type']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['brightness_setting']) && $products_list['brightness_setting']!=''){ ?>
											<tr>
												<td>Brightness Setting</td>
												<td><?php echo $products_list['brightness_setting']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['viewfinder']) && $products_list['viewfinder']!=''){ ?>
											<tr>
												<td>ViewFinder</td>
												<td><?php echo $products_list['viewfinder']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['viewfindermagnifiaction']) && $products_list['viewfindermagnifiaction']!=''){ ?>
											<tr>
												<td>ViewFinderMagnifiaction</td>
												<td><?php echo $products_list['viewfindermagnifiaction']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($products_list['aspect_ratio']!='' || $products_list['image_size']!='' || $products_list['image_resolution']!='' || $products_list['video_resolution']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseResolution" aria-expanded="false" aria-controls="collapseResolution" class="panel-heading" role="tab" id="headingResolution" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Resolution
							  </a>
						  </h4>

							</div>
							<div id="collapseResolution" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingResolution">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['aspect_ratio']) && $products_list['aspect_ratio']!=''){ ?>
											<tr>
												<td>Aspect Ratio</td>
												<td><?php echo $products_list['aspect_ratio']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['image_size']) && $products_list['image_size']!=''){ ?>
											<tr>
												<td>Image Size at Megapixels</td>
												<td><?php echo $products_list['image_size']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['image_resolution']) && $products_list['image_resolution']!=''){ ?>
											<tr>
												<td>Image Resolution</td>
												<td><?php echo $products_list['image_resolution']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['image_resolution']) && $products_list['image_resolution']!=''){ ?>
											<tr>
												<td>Video Resolution</td>
												<td><?php echo $products_list['image_resolution']; ?></td>
											</tr>
										<?php } ?>
									
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($products_list['flash_mode']!='' || $products_list['flash_range']!='' || $products_list['built_in_flash']!='' || $products_list['external_flash']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseFlash" aria-expanded="false" aria-controls="collapseFlash" class="panel-heading" role="tab" id="headingFlash" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Flash
							  </a>
						  </h4>

							</div>
							<div id="collapseFlash" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFlash">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['flash_mode']) && $products_list['flash_mode']!=''){ ?>
											<tr>
												<td>Flash Mode</td>
												<td><?php echo $products_list['flash_mode']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['flash_range']) && $products_list['flash_range']!=''){ ?>
											<tr>
												<td>Flash Range</td>
												<td><?php echo $products_list['flash_range']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['built_in_flash']) && $products_list['built_in_flash']!=''){ ?>
											<tr>
												<td>Built-in Flash</td>
												<td><?php echo $products_list['built_in_flash']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['external_flash']) && $products_list['external_flash']!=''){ ?>
											<tr>
												<td>External Flash</td>
												<td><?php echo $products_list['external_flash']; ?></td>
											</tr>
										<?php } ?>
									
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($products_list['audio_recording_device']!='' || $products_list['audio_recording_format']!='' || $products_list['video_compression']!='' || $products_list['face_detection']!='' || $products_list['video_format']!='' || $products_list['image_format']!='' || $products_list['microphone']!='' || $products_list['pictbridge']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseInterface" aria-expanded="false" aria-controls="collapseInterface" class="panel-heading" role="tab" id="headingInterface" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Interface
							  </a>
						  </h4>

							</div>
							<div id="collapseInterface" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingInterface">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['audio_recording_device']) && $products_list['audio_recording_device']!=''){ ?>
											<tr>
												<td>Audio Recording Device</td>
												<td><?php echo $products_list['audio_recording_device']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['audio_recording_format']) && $products_list['audio_recording_format']!=''){ ?>
											<tr>
												<td>Audio Recording Format</td>
												<td><?php echo $products_list['audio_recording_format']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['video_compression']) && $products_list['video_compression']!=''){ ?>
											<tr>
												<td>Video Compression</td>
												<td><?php echo $products_list['video_compression']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['face_detection']) && $products_list['face_detection']!=''){ ?>
											<tr>
												<td>Face Detection</td>
												<td><?php echo $products_list['face_detection']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['video_format']) && $products_list['video_format']!=''){ ?>
											<tr>
												<td>Video Format</td>
												<td><?php echo $products_list['video_format']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['image_format']) && $products_list['image_format']!=''){ ?>
											<tr>
												<td>Image Format</td>
												<td><?php echo $products_list['image_format']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['microphone']) && $products_list['microphone']!=''){ ?>
											<tr>
												<td>Microphone</td>
												<td><?php echo $products_list['microphone']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['pictbridge']) && $products_list['pictbridge']!=''){ ?>
											<tr>
												<td>PictBridge</td>
												<td><?php echo $products_list['pictbridge']; ?></td>
											</tr>
										<?php } ?>
									
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($products_list['card_type']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseMemorys" aria-expanded="false" aria-controls="collapseMemorys" class="panel-heading" role="tab" id="headingMemorys" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Memory
							  </a>
						  </h4>

							</div>
							<div id="collapseMemorys" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMemorys">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['card_type']) && $products_list['card_type']!=''){ ?>
											<tr>
												<td>Memory Card Type</td>
												<td><?php echo $products_list['card_type']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($products_list['supplied_battery']!=''|| $products_list['ac_adapter']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapsePowerSource" aria-expanded="false" aria-controls="collapsePowerSource" class="panel-heading" role="tab" id="headingPowerSource" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							  Power Source
							  </a>
						  </h4>

							</div>
							<div id="collapsePowerSource" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPowerSource">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['supplied_battery']) && $products_list['supplied_battery']!=''){ ?>
											<tr>
												<td>Supplied Battery</td>
												<td><?php echo $products_list['supplied_battery']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['ac_adapter']) && $products_list['ac_adapter']!=''){ ?>
											<tr>
												<td>AC Adapter</td>
												<td><?php echo $products_list['ac_adapter']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($products_list['iso_rating']!=''|| $products_list['iso_sensitivity']!=''|| $products_list['dust_reduction']!=''|| $products_list['metering_method']!=''|| $products_list['metering_system']!='' || $products_list['supported_languages']!='' || $products_list['sync_terminal']!='' || $products_list['view_finder']!='' || $products_list['white_balancing']!='' || $products_list['hdmi']!='' || $products_list['self_timer']!='' || $products_list['scene_modes']!='' || $products_list['environment']!=''){ ?>
						<div class="panel panel-default">
							<div  data-toggle="collapse" data-parent="" href="#collapseAdditionalFeatures" aria-expanded="false" aria-controls="collapseAdditionalFeatures" class="panel-heading" role="tab" id="headingAdditionalFeatures" style="cursor:pointer;">
								 <h4 class="panel-title">
							<a class="collapsed" >
							 Additional Features
							  </a>
						  </h4>

							</div>
							<div id="collapseAdditionalFeatures" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAdditionalFeatures">
								<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
										<?php if(isset($products_list['iso_rating']) && $products_list['iso_rating']!=''){ ?>
											<tr>
												<td>ISO Rating</td>
												<td><?php echo $products_list['iso_rating']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['iso_sensitivity']) && $products_list['iso_sensitivity']!=''){ ?>
											<tr>
												<td>ISO Sensitivity</td>
												<td><?php echo $products_list['iso_sensitivity']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['dust_reduction']) && $products_list['dust_reduction']!=''){ ?>
											<tr>
												<td>Dust Reduction</td>
												<td><?php echo $products_list['dust_reduction']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['metering_method']) && $products_list['metering_method']!=''){ ?>
											<tr>
												<td>Metering Method</td>
												<td><?php echo $products_list['metering_method']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['metering_system']) && $products_list['metering_system']!=''){ ?>
											<tr>
												<td>Metering System</td>
												<td><?php echo $products_list['metering_system']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['supported_languages']) && $products_list['supported_languages']!=''){ ?>
											<tr>
												<td>Supported Languages</td>
												<td><?php echo $products_list['supported_languages']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['sync_terminal']) && $products_list['sync_terminal']!=''){ ?>
											<tr>
												<td>Sync Terminal</td>
												<td><?php echo $products_list['sync_terminal']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['view_finder']) && $products_list['view_finder']!=''){ ?>
											<tr>
												<td>View finder</td>
												<td><?php echo $products_list['view_finder']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['white_balancing']) && $products_list['white_balancing']!=''){ ?>
											<tr>
												<td>White Balancing</td>
												<td><?php echo $products_list['white_balancing']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['hdmi']) && $products_list['hdmi']!=''){ ?>
											<tr>
												<td>HDMI</td>
												<td><?php echo $products_list['hdmi']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['self_timer']) && $products_list['self_timer']!=''){ ?>
											<tr>
												<td>Self Timer</td>
												<td><?php echo $products_list['self_timer']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['scene_modes']) && $products_list['scene_modes']!=''){ ?>
											<tr>
												<td>Scene Modes</td>
												<td><?php echo $products_list['scene_modes']; ?></td>
											</tr>
										<?php } ?>
										<?php if(isset($products_list['environment']) && $products_list['environment']!=''){ ?>
											<tr>
												<td>Operating Environment</td>
												<td><?php echo $products_list['environment']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($products_list['total_power_output']!='' || $products_list['sound_system']!='' || $products_list['speaker_driver']!='' || $products_list['power']!='' || $products_list['battery_type']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseAudioFeature" aria-expanded="false" aria-controls="collapseAudioFeature" class="panel-heading" role="tab" id="headingAudioFeature" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Audio Feature
						  </a>
					  </h4>

						</div>
						<div id="collapseAudioFeature" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAudioFeature">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
									<?php if(isset($products_list['total_power_output']) && $products_list['total_power_output']!=''){ ?>
									  <tr>
										<td>Total Power Output RMS (W)</td>
										<td><?php echo $products_list['total_power_output']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['sound_system']) && $products_list['sound_system']!=''){ ?>
									  <tr>
										<td>Sound System</td>
										<td><?php echo $products_list['sound_system']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['speaker_driver']) && $products_list['speaker_driver']!=''){ ?>
									  <tr>
										<td>Speaker driver</td>
										<td><?php echo $products_list['speaker_driver']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['power']) && $products_list['power']!=''){ ?>
									  <tr>
										<td>Power</td>
										<td><?php echo $products_list['power']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['battery_type']) && $products_list['battery_type']!=''){ ?>
									  <tr>
										<td>Battery type</td>
										<td><?php echo $products_list['battery_type']; ?></td>
									  </tr>
									  <?php } ?>
												
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<?php if($products_list['weight']!='' || $products_list['dimension']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseDimensionsWeight" aria-expanded="false" aria-controls="collapseDimensionsWeight" class="panel-heading" role="tab" id="headingDimensionsWeight" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Dimensions & Weight
						  </a>
					  </h4>

						</div>
						<div id="collapseDimensionsWeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDimensionsWeight">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
									<?php if(isset($products_list['weight']) && $products_list['weight']!=''){ ?>
									  <tr>
										<td>Weight (With Battery & Memory Stick)</td>
										<td><?php echo $products_list['weight']; ?></td>
									  </tr>
									  <?php } ?>
									<?php if(isset($products_list['dimension']) && $products_list['dimension']!=''){ ?>
									  <tr>
										<td>Dimension</td>
										<td><?php echo $products_list['dimension']; ?></td>
									  </tr>
									  <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<?php if($products_list['usb_port']!='' || $products_list['headphone_jack']!='' || $products_list['bluetooth']!='' || $products_list['wired_wireless']!='' || $products_list['bluetooth_range']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseConnectivity" aria-expanded="false" aria-controls="collapseConnectivity" class="panel-heading" role="tab" id="headingConnectivity" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Connectivity
						  </a>
					  </h4>

						</div>
						<div id="collapseConnectivity" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingConnectivity">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
									<?php if(isset($products_list['usb_port']) && $products_list['usb_port']!=''){ ?>
									  <tr>
										<td>USB Ports</td>
										<td><?php echo $products_list['usb_port']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['headphone_jack']) && $products_list['headphone_jack']!=''){ ?>
									  <tr>
										<td>Headphone Jack</td>
										<td><?php echo $products_list['headphone_jack']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['bluetooth']) && $products_list['bluetooth']!=''){ ?>
									  <tr>
										<td>Bluetooth</td>
										<td><?php echo $products_list['bluetooth']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['wired_wireless']) && $products_list['wired_wireless']!=''){ ?>
									  <tr>
										<td>Wired/Wireless</td>
										<td><?php echo $products_list['wired_wireless']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['bluetooth_range']) && $products_list['bluetooth_range']!=''){ ?>
									  <tr>
										<td>Bluetooth range</td>
										<td><?php echo $products_list['bluetooth_range']; ?></td>
									  </tr>
									  <?php } ?>
												
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<?php if($products_list['compatible_for']!='' || $products_list['weight']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseaFeatures" aria-expanded="false" aria-controls="collapseaFeatures" class="panel-heading" role="tab" id="headingaFeatures" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Additional Features
						  </a>
					  </h4>

						</div>
						<div id="collapseaFeatures" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingaFeatures">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
									<?php if(isset($products_list['compatible_for']) && $products_list['compatible_for']!=''){ ?>
									  <tr>
										<td>Compatible Devices</td>
										<td><?php echo $products_list['compatible_for']; ?></td>
									  </tr>
									  <?php } ?>
									  <?php if(isset($products_list['weight']) && $products_list['weight']!=''){ ?>
									  <tr>
										<td>Product weight</td>
										<td><?php echo $products_list['weight']; ?></td>
									  </tr>
									  <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<?php if($products_list['internal_memeory']!='' || $products_list['expand_memory']!=''){ ?>
					<div class="panel panel-default">
						<div  data-toggle="collapse" data-parent="" href="#collapseMemory" aria-expanded="false" aria-controls="collapseMemory" class="panel-heading" role="tab" id="headingMemory" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Memory
						</a>
					  </h4>

						</div>
						<div id="collapseMemory" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMemory">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
								<?php if(isset($products_list['internal_memeory']) && $products_list['internal_memeory']!=''){ ?>
												  <tr>
													<td>Internal Memory</td>
													<td><?php echo $products_list['internal_memeory']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['expand_memory']) && $products_list['expand_memory']!=''){ ?>
												  <tr>
													<td>Expandable Memory</td>
													<td><?php echo $products_list['expand_memory']; ?></td>
												  </tr>
												  <?php } ?>
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					
					<?php if($products_list['primary_camera']!='' || $products_list['primary_camera_feature']!='' || $products_list['secondary_camera']!='' || $products_list['secondary_camera_feature']!='' || $products_list['video_recording']!='' || $products_list['hd_recording']!='' || $products_list['flash']!='' || $products_list['other_camera_features']!=''){ ?>

					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" role="tab" id="headingThree" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Camera & Video Features
						</a>
					  </h4>

						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
							
							<table class="table table-bordered mar_t10">
									<tbody>
													<?php if(isset($products_list['primary_camera']) && $products_list['primary_camera']!=''){ ?>
													  <tr>
														<td>Primary Camera</td>
														<td><?php echo $products_list['primary_camera']; ?></td>
													  </tr>
													  <?php } ?>
													  <?php if(isset($products_list['primary_camera_feature']) && $products_list['primary_camera_feature']!=''){ ?>
													  <tr>
														<td>Primary Camera Features</td>
														<td><?php echo $products_list['primary_camera_feature']; ?></td>
													  </tr>
													  <?php } ?>
													  <?php if(isset($products_list['secondary_camera']) && $products_list['secondary_camera']!=''){ ?>
													  <tr>
														<td>Secondary Camera</td>
														<td><?php echo $products_list['secondary_camera']; ?></td>
													  </tr>
													  <?php } ?> 
													  <?php if(isset($products_list['secondary_camera_feature']) && $products_list['secondary_camera_feature']!=''){ ?>
													  <tr>
														<td>Secondary Camera Features</td>
														<td><?php echo $products_list['secondary_camera_feature']; ?></td>
													  </tr>
													  <?php } ?>
													  <?php if(isset($products_list['video_recording']) && $products_list['video_recording']!=''){ ?>
													  <tr>
														<td>Video Recording</td>
														<td><?php echo $products_list['video_recording']; ?></td>
													  </tr>
													  <?php } ?>
													  <?php if(isset($products_list['hd_recording']) && $products_list['hd_recording']!=''){ ?>
													  <tr>
														<td>HD Recording</td>
														<td><?php echo $products_list['hd_recording']; ?></td>
													  </tr>
													  <?php } ?>
													  <?php if(isset($products_list['flash']) && $products_list['flash']!=''){ ?>
													  <tr>
														<td>Flash</td>
														<td><?php echo $products_list['flash']; ?></td>
													  </tr>
													  <?php } ?>
													  <?php if(isset($products_list['other_camera_features']) && $products_list['other_camera_features']!=''){ ?>
													  <tr>
														<td>Other Camera Features</td>
														<td><?php echo $products_list['other_camera_features']; ?></td>
													  </tr>
													  <?php } ?>
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($products_list['battery_capacity']!='' || $products_list['talk_time']!='' || $products_list['standby_time']!=''){ ?>
					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour" role="tab" id="headingFour" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						  Battery & Power Features
						</a>
					  </h4>

						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
								<?php if(isset($products_list['battery_capacity']) && $products_list['battery_capacity']!=''){ ?>
												  <tr>
													<td>Battery Capacity</td>
													<td><?php echo $products_list['battery_capacity']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['talk_time']) && $products_list['talk_time']!=''){ ?>
												  <tr>
													<td>Talk Time</td>
													<td><?php echo $products_list['talk_time']; ?></td>
												  </tr>
												  <?php } ?> 
												  <?php if(isset($products_list['standby_time']) && $products_list['standby_time']!=''){ ?>
												  <tr>
													<td>Standby Time</td>
													<td><?php echo $products_list['standby_time']; ?></td>
												  </tr>
												  <?php } ?> 
								
								</tbody>
							</table>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($products_list['operating_frequency']!='' || $products_list['preinstalled_browser']!='' || $products_list['2g']!='' || $products_list['3g']!='' || $products_list['4g']!='' || $products_list['wifi']!='' ||$products_list['gps']!='' || $products_list['edge']!='' || $products_list['edge_features']!='' || $products_list['bluetooth']!='' || $products_list['nfc']!='' || $products_list['usb_connectivity']!=''){ ?>

					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" role="tab" id="headingFive" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						 Internet & Connectivity
						</a>
					  </h4>

						</div>
						<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
							<tbody>
							<?php if(isset($products_list['operating_frequency']) && $products_list['operating_frequency']!=''){ ?>
											  <tr>
												<td>Operating Frequency</td>
												<td><?php echo $products_list['operating_frequency']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['preinstalled_browser']) && $products_list['preinstalled_browser']!=''){ ?>
											  <tr>
												<td>Preinstalled Browser</td>
												<td><?php echo $products_list['preinstalled_browser']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['2g']) && $products_list['2g']!=''){ ?>
											  <tr>
												<td>2G</td>
												<td><?php echo $products_list['2g']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['3g']) && $products_list['3g']!=''){ ?>
											  <tr>
												<td>3G</td>
												<td><?php echo $products_list['3g']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['4g']) && $products_list['4g']!=''){ ?>
											  <tr>
												<td>4G</td>
												<td><?php echo $products_list['4g']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['wifi']) && $products_list['wifi']!=''){ ?>
											  <tr>
												<td>Wifi</td>
												<td><?php echo $products_list['wifi']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['gps']) && $products_list['gps']!=''){ ?>
											  <tr>
												<td>Gps</td>
												<td><?php echo $products_list['gps']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['edge']) && $products_list['edge']!=''){ ?>
											  <tr>
												<td>Edge</td>
												<td><?php echo $products_list['edge']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['edge_features']) && $products_list['edge_features']!=''){ ?>
											  <tr>
												<td>Edge Features</td>
												<td><?php echo $products_list['edge_features']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['bluetooth']) && $products_list['bluetooth']!=''){ ?>
											  <tr>
												<td>Bluetooth</td>
												<td><?php echo $products_list['bluetooth']; ?></td>
											  </tr>
											  <?php } ?> 
											  <?php if(isset($products_list['nfc']) && $products_list['nfc']!=''){ ?>
											  <tr>
												<td>NFC</td>
												<td><?php echo $products_list['nfc']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['usb_connectivity']) && $products_list['usb_connectivity']!=''){ ?>
											  <tr>
												<td>USB Connectivity</td>
												<td><?php echo $products_list['usb_connectivity']; ?></td>
											  </tr>
											  <?php } ?> 
							
							</tbody>
						</table>
							</div>
						</div>
					</div>
					
					<?php } ?>
					<?php if($products_list['music_player']!='' || $products_list['video_player']!='' || $products_list['audio_jack']!=''){ ?>
					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix" role="tab" id="headingSix" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						 Multimedia Features
						</a>
					  </h4>

						</div>
						<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
								<tbody>
								<?php if(isset($products_list['music_player']) && $products_list['music_player']!=''){ ?>
												  <tr>
													<td>Music Player</td>
													<td><?php echo $products_list['music_player']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['video_player']) && $products_list['video_player']!=''){ ?>
												  <tr>
													<td>Video Player</td>
													<td><?php echo $products_list['video_player']; ?></td>
												  </tr>
												  <?php } ?>
												  <?php if(isset($products_list['audio_jack']) && $products_list['audio_jack']!=''){ ?>
												  <tr>
													<td>Audio Jack</td>
													<td><?php echo $products_list['audio_jack']; ?></td>
												  </tr>
												  <?php } ?>
								
								</tbody>
							</table>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($products_list['gpu']!='' || $products_list['sim_size']!='' || $products_list['sim_supported']!='' || $products_list['call_memory']!='' || $products_list['sms_memory']!='' || $products_list['phone_book_memory']!='' || $products_list['sensors']!='' || $products_list['java']!='' || $products_list['lens_hood']!='' || $products_list['lens_case']!='' || $products_list['lens_cap']!='' || $products_list['filter_attachment_size']!='' || $products_list['other_camera_features']!=''){ ?>
					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" role="tab" id="headingSeven" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						Additional Features
						</a>
					  </h4>

						</div>
						<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
							<tbody>
							<?php if(isset($products_list['gpu']) && $products_list['gpu']!=''){ ?>
											  <tr>
												<td>GPU</td>
												<td><?php echo $products_list['gpu']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['sim_size']) && $products_list['sim_size']!=''){ ?>
											  <tr>
												<td>Sim Size</td>
												<td><?php echo $products_list['sim_size']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['sim_supported']) && $products_list['sim_supported']!=''){ ?>
											  <tr>
												<td>Sim Supported</td>
												<td><?php echo $products_list['sim_supported']; ?></td>
											  </tr>
											  <?php } ?> 
											  <?php if(isset($products_list['call_memory']) && $products_list['call_memory']!=''){ ?>
											  <tr>
												<td>Call Memory</td>
												<td><?php echo $products_list['call_memory']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['sms_memory']) && $products_list['sms_memory']!=''){ ?>
											  <tr>
												<td>SMS Memory</td>
												<td><?php echo $products_list['sms_memory']; ?></td>
											  </tr>
											  <?php } ?> 
											  <?php if(isset($products_list['phone_book_memory']) && $products_list['phone_book_memory']!=''){ ?>
											  <tr>
												<td>Phone Book Memory</td>
												<td><?php echo $products_list['phone_book_memory']; ?></td>
											  </tr>
											  <?php } ?> 
											  <?php if(isset($products_list['sensors']) && $products_list['sensors']!=''){ ?>
											  <tr>
												<td>Sensors</td>
												<td><?php echo $products_list['sensors']; ?></td>
											  </tr>
											  <?php } ?> 
											  <?php if(isset($products_list['java']) && $products_list['java']!=''){ ?>
											  <tr>
												<td>Java</td>
												<td><?php echo $products_list['java']; ?></td>
											  </tr>
											  <?php } ?> 
											  <?php if(isset($products_list['other_camera_features']) && $products_list['other_camera_features']!=''){ ?>
											  <tr>
												<td>Other Features</td>
												<td><?php echo $products_list['other_camera_features']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['filter_attachment_size']) && $products_list['filter_attachment_size']!=''){ ?>
											  <tr>
												<td>Filter Attachment Size</td>
												<td><?php echo $products_list['filter_attachment_size']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['lens_cap']) && $products_list['lens_cap']!=''){ ?>
											  <tr>
												<td>Lens Cap</td>
												<td><?php echo $products_list['lens_cap']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['lens_case']) && $products_list['lens_case']!=''){ ?>
											  <tr>
												<td>Lens Case</td>
												<td><?php echo $products_list['lens_case']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['lens_hood']) && $products_list['lens_hood']!=''){ ?>
											  <tr>
												<td>Lens Hood</td>
												<td><?php echo $products_list['lens_hood']; ?></td>
											  </tr>
											  <?php } ?>
							
							</tbody>
						</table>
							
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($products_list['insales_package']!=''){  ?>
					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight" role="tab" id="headingEight" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						In the Box
						</a>
					  </h4>

						</div>
						<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
							<div class="panel-body">
								<table class="table table-bordered mar_t10">
									<tbody>
									<?php if(isset($products_list['insales_package']) && $products_list['insales_package']!=''){ ?>
													  <tr>
														<td>In Sales Package</td>
														<td><?php echo $products_list['insales_package']; ?></td>
													  </tr>
													  <?php } ?>
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($products_list['dislay_resolution']!='' || $products_list['display_type']!='' || $products_list['colour']!=''){  ?>
					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine" role="tab" id="headingNine" style="cursor:pointer;">
							 <h4 class="panel-title">
						<a class="collapsed" >
						 Display & Resolution
						</a>
					  </h4>

						</div>
						<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
							<div class="panel-body">
							<table class="table table-bordered mar_t10">
							<tbody>
							<?php if(isset($products_list['dislay_resolution']) && $products_list['dislay_resolution']!=''){ ?>
											  <tr>
												<td>Display & resolution</td>
												<td><?php echo $products_list['dislay_resolution']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['display_type']) && $products_list['display_type']!=''){ ?>
											  <tr>
												<td>Display Type</td>
												<td><?php echo $products_list['display_type']; ?></td>
											  </tr>
											  <?php } ?>
											  <?php if(isset($products_list['colour']) && $products_list['colour']!=''){ ?>
											  <tr>
												<td>Colors</td>
												<td><?php echo $products_list['colour']; ?></td>
											  </tr>
											  <?php } ?>
							
							</tbody>
						</table>
							
							</div>
						</div>
					</div>
					<?php } ?>
					
					
				</div>
				</div>
				 
                </div>
              </div>
              <!-- End Description Tab Content -->

              <!-- Detail Tab Content -->
              <div role="tabpanel" class="tab-pane" id="warnty">
                <div class="well">
                 <table class="table table-bordered">
                <tbody>
					 <?php if(isset($products_list['warranty_summary']) && $products_list['warranty_summary']!=''){ ?>
                      <tr>
                        <td>Warranty Summary</td>
                        <td><?php echo isset($products_list['warranty_summary'])?$products_list['warranty_summary']:''; ?></td>
                      </tr>
					 <?php } ?>
					<?php if(isset($products_list['warranty_type']) && $products_list['warranty_type']!=''){ ?>
						<tr>
                        <td>Warranty Type</td>
                        <td><?php echo isset($products_list['warranty_type'])?$products_list['warranty_type']:''; ?></td>
                      </tr>
					<?php } ?>
					<?php if(isset($products_list['service_type']) && $products_list['service_type']!=''){ ?>
						<tr>
                        <td>Service Type</td>
                        <td><?php echo isset($products_list['service_type'])?$products_list['service_type']:''; ?></td>
                      </tr>
					<?php } ?>
                     
					  
                    </tbody>
                  </table>
                </div>
              </div>
			  <div role="tabpanel" class="tab-pane" id="returnpolices">
                <div class="well">
                      <p><?php echo isset($products_list['return_policy'])?$products_list['return_policy']:''; ?></p>

                </div>
              </div>
              <!-- End Detail Tab Content -->

              <!-- Review Tab Content -->
              <div role="tabpanel" class="tab-pane" id="review">
                <div class="well">
                  <?php
				  //echo '<pre>';print_r($products_reviews);exit; 
					if(count($products_reviews)>0){ 
					foreach($products_reviews as $reviewslist){ ?>
				   <div class="media">
                    <div class="media-left">
						<div style="background:#ddd;font-size:46px;padding:6px 25px;"><span >
						<?php echo  ucfirst(substr($reviewslist['cust_firstname'], 0, 1)); ?>
						</span></div>
                   
					  <?php if($reviewslist['rating']==1){  ?>
					    <i class="fa fa-star product-rateing"> </i>
					    <i class="fa fa-star product-ratings"> </i>
					    <i class="fa fa-star product-ratings"> </i>
					    <i class="fa fa-star product-ratings"> </i>
					    <i class="fa fa-star product-ratings"> </i>
					 	<?php }else if($reviewslist['rating']==2){ ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if($reviewslist['rating']==3){ ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if($reviewslist['rating']==4){ ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
					  <?php }else if($reviewslist['rating']==5){ ?>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <?php } else{ ?>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
					 <?php } ?>
					
                      
					
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading"><strong><?php echo $reviewslist['name']; ?></strong></h5>
						<?php echo $reviewslist['review_content']; ?><br>
						Cartinhour Customer  : <?php echo isset($reviewslist['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($reviewslist['create_at']))):'';  ?>

                    </div>
					
                  </div>
					<?php } }else{ ?>
					<div class="media"> NO Reviews</div>
					<?php } ?>
				
              
              </div>
              <!-- End Review Tab Content -->

          </div>
          <!-- End Tab panes -->

        </div>
          </div>
         
          </div>
		  <div class="clearfix"></div>
		  <!--alert text -->
			
		  <!--alert text ednd -->
		  <div class="clearfix"></div>
		  <div class="compar_btn" id="compar_btn" >
	 		<div class="btn-group show-on-hover" style="margin:0">
	 		<!-- <a href="javascript:void(0);" onclick="getcategoryid(<?php echo $products_list['category_id']; ?>);"  class="btn btn-primary" ><?php echo $products_list['item_name'];?>&nbsp;<span><?php echo count($products_list['item_id']) ?></span> 
          </a> -->
          <a href="<?php echo base_url('category/productscompare/'.base64_encode($products_list['item_id']).'/'.base64_encode($products_list['subcategory_id']).'/'.base64_encode($products_list['subitemid'])); ?>"  class="btn btn-primary" >Click Here To Compare<!-- <?php echo $products_list['item_name'];?>&nbsp;<span><?php echo count($products_list['item_id']) ?> --></span> 
          </a>
          <input type="hidden" name="category_id" id="category_id"  value="<?php echo $products_list['category_id']; ?>"> 
          <!--  <ul class="dropdown-menu" role="menu" style="position: absolute;top:-100px;height:150px;width:10px;left:-50px;opacity: 0.8;">
				<li>
					<img src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>" style="width: 80%;height: 80%">
				</li>
          </ul> --> 
        </div>
			
	  </div>
	  </div>
	  
    <div class="container-fluid" style="margin-top:10px;" id="footer-start"> 
	 <?php if(isset($similarproducts_list) && count($similarproducts_list)>0){ ?>
	 <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Similar Products</h2>
        </div>
		     <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		  <?Php $cnt=1;foreach ($similarproducts_list as $productslist) { 
		  
		  $currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
		  
		  
		  
		  ?>
		
			<div class="item ">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover item">
			  <div class="img_size">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
               <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>"> 
				 
           
                </a>
				</div>
              
								
				<div class="option ">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6>
			  <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
				<div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2); ?>
			 &nbsp;
			<span class="price-old">₹  <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
							</div>
				<div class="clearfix"></div>
            
              </div>
            
            </div>
          </div>
            </div>
			
			<?php $cnt++;} ?>
         
            </div>
            </div>
            </div>
 
	</section>
	 <?php } ?>
   	</div>


<script type="text/javascript">
var pincodeformat =/^[0-9]+$/;
function removecouponmsg(){
	$('#imgdisplaying').show();
}
function getareapincode(val){
	var pin=$('#checkpincode').val();
	$('#imgdisplaying').hide();
	$('#deliverymsg').html('');
	if(pin==''){
		$('#deliverymsg').html('Pincode is required.').css("color", "red");
		return false;
	}
	if(pin.length ==6){
			if(!pin.match(pincodeformat)) 
			{
			$('#deliverymsg').html('Please enter correct pincode.').css("color", "red");
			return false;
			}

		jQuery.ajax({
        url: "<?php echo site_url('category/checkpincodes');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          pincode: pin,
          },
        dataType: 'json',
        success: function (data) {
			$('#imgdisplaying').show();
			if(data.msg==1){
				
				$('#deliverymsg').html('Delivery within ' +data.time).css("color", "green");
				
			}else{
				$('#deliverymsg').html("We don't have service in your pincode").css("color", "red");
			}
         

        }
      });
	}else{
		$('#deliverymsg').html('Pincode length must be 6 digits only.').css("color", "red");
		
	}
}
function singleitemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/productviewonclickaddcart');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          producr_id: itemid,
		  category_id: catid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
           if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#supcounts').show();
						jQuery('#sucessmsg').show();
						$("#supcounts").empty();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						$("#supcounts").append(data.count);
						if(data.msg==2){
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> Product already exits <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product added successfully <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }
function itemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/onclickaddcart');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          producr_id: itemid,
		  category_id: catid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
           if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#sucessmsg').show();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						if(data.msg==2){
						$("#addticartitem"+itemid+val).removeClass("text-primary");
						$('#cartitemtitle'+itemid+val).prop('title', 'Add to cart');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addticartitem"+itemid+val).addClass("text-primary");
						$('#cartitemtitle'+itemid+val).prop('title', 'Added to cart');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }
 function addwhishlidts(id,val){
jQuery.ajax({
			url: "<?php echo site_url('customer/addwhishlist');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				item_id: id,
				},
			dataType: 'JSON',
			success: function (data) {
				if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
				jQuery('#sucessmsg').show();
				//alert(data.msg);
				if(data.msg==2){
				$('#sucessmsg').show('');
				$("#addwishlistids"+id+val).removeClass("text-primary");
				$('#addwhish'+id+val).prop('title', 'Add to Wishlist');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();
				
				}
				if(data.msg==1){
				$('#sucessmsg').show('');
				 $("#addwishlistids"+id+val).addClass("text-primary");
				 $('#addwhish'+id+val).prop('title', 'Added to Wishlist');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();				
				}
				
				}
			

			}
		});
	
	
}


			

function validation(){
var color=$('#colorvalue').val();
var size=$('#sizevalue').val();
if(color==''){
	$("#colorerrormsg").html("Please select your Color").css("color", "red");
	return false;
}if(size==''){
	$("#colorerrormsg").html("");
	$("#sizeerrormsg").html("Please select your Size").css("color", "red");
	return false;
	
}
$("#sizeerrormsg").html("");
return true;


}
function qtyincreasepurpose(){
	var qty=document.getElementById("qty").value;
	var orginalqty=document.getElementById("orginalproductqty").value;
	if(qty==orginalqty){
		$("#maxqtyerror").html("available qty is "+orginalqty).fadeIn().fadeOut(5000);
	}
	
}

function colorselectvalue(vals){
		document.getElementById("colorvalue").value=vals;
}
function sizeselectvalue(val){
		document.getElementById("sizevalue").value=val;
}
</script>
 <?php if($products_list['subcategory_id']!=53){ ?>
	 <script>
	function sizeselect(val){
		$("#sizeslist"+val).addClass("site_active");
		var cnt;
		var nt =<?php echo $sizecnt;?>;
		//var cnt='';
		for(cnt = 1; cnt <= nt; cnt++){
			if(cnt!=val){
				$("#sizeslist"+cnt).removeClass("site_active");
			}             
		}
	}
	</script>
 <?php }else{ ?>
 	 <script>
	function sizeselect(val){
		$("#sizeslist"+val).addClass("site_active");
		var cnt;
		var nt =<?php echo $uksizecnt;?>;
		//var cnt='';
		for(cnt = 1; cnt <= nt; cnt++){
			if(cnt!=val){
				$("#sizeslist"+cnt).removeClass("site_active");
			}             
		}
	}
	</script>
 <?php } ?>
<script>

function colorselect(val){
	$("#colorlist"+val).addClass("col_active");
	var cnt;
    var nt =<?php echo $colorcnt;?>;
	//var cnt='';
	for(cnt = 1; cnt <= nt; cnt++){
		if(cnt!=val){
			$("#colorlist"+cnt).removeClass("col_active");
		}             
	}
}
function addwhishlidt(id){
jQuery.ajax({
			url: "<?php echo site_url('customer/addwhishlist');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				item_id: id,
				},
			dataType: 'JSON',
			success: function (data) {
				if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
					$('#sucessmsg').show();
					//alert(data.msg);
					if(data.msg==2){
					$('#addwhish').css("color", "");
					$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
					}
					if(data.msg==1){
					$('#addwhish').css("color", "#45b1b9");
					$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
	
					}
				}
			

			}
		});
	
	
}


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});




$(document).ready(function() {
    $('#addreview').bootstrapValidator({
       
        fields: {
            
			
            name: {
              validators: {
					notEmpty: {
						message: 'Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			email: {
             validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			review: {
               validators: {
					notEmpty: {
						message: 'Please enter a review'
					}
				}
            }
        }
    });
});

    $(document).ready(function(){
    $('#compare').click(function(e){
    e.preventDefault();
    $("#compar_btn").css("display", "block");
    //alert('hello');
    var item_id =  $("#compare_id").val();
    var category_id =  $("#category_id").val();
    
    //alert(category_id);
    // $.ajax
    // ({
    // type: "POST",
    // url: "<?php echo base_url();?>category/productscompare",
    //  data: {category_id:category_id},
    //  //   success: function (data) {
    // 	// alert(data);
    //  // } 
    // });
    
  
    
    });
});


</script>
<script>
		$(document).ready(function(){
		$(".read_mor").click(function(){
        $(".read_div").toggle(1000);
    });
});
</script>
<script>


; window.Modernizr = function (a, b, c) { function C(a) { j.cssText = a } function D(a, b) { return C(n.join(a + ";") + (b || "")) } function E(a, b) { return typeof a === b } function F(a, b) { return !! ~("" + a).indexOf(b) } function G(a, b) { for (var d in a) { var e = a[d]; if (!F(e, "-") && j[e] !== c) return b == "pfx" ? e : !0 } return !1 } function H(a, b, d) { for (var e in a) { var f = b[a[e]]; if (f !== c) return d === !1 ? a[e] : E(f, "function") ? f.bind(d || b) : f } return !1 } function I(a, b, c) { var d = a.charAt(0).toUpperCase() + a.slice(1), e = (a + " " + p.join(d + " ") + d).split(" "); return E(b, "string") || E(b, "undefined") ? G(e, b) : (e = (a + " " + q.join(d + " ") + d).split(" "), H(e, b, c)) } function J() { e.input = function (c) { for (var d = 0, e = c.length; d < e; d++) u[c[d]] = c[d] in k; return u.list && (u.list = !!b.createElement("datalist") && !!a.HTMLDataListElement), u } ("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")), e.inputtypes = function (a) { for (var d = 0, e, f, h, i = a.length; d < i; d++) k.setAttribute("type", f = a[d]), e = k.type !== "text", e && (k.value = l, k.style.cssText = "position:absolute;visibility:hidden;", /^range$/.test(f) && k.style.WebkitAppearance !== c ? (g.appendChild(k), h = b.defaultView, e = h.getComputedStyle && h.getComputedStyle(k, null).WebkitAppearance !== "textfield" && k.offsetHeight !== 0, g.removeChild(k)) : /^(search|tel)$/.test(f) || (/^(url|email)$/.test(f) ? e = k.checkValidity && k.checkValidity() === !1 : e = k.value != l)), t[a[d]] = !!e; return t } ("search tel url email datetime date month week time datetime-local number range color".split(" ")) } var d = "2.8.3", e = {}, f = !0, g = b.documentElement, h = "modernizr", i = b.createElement(h), j = i.style, k = b.createElement("input"), l = ":)", m = {}.toString, n = " -webkit- -moz- -o- -ms- ".split(" "), o = "Webkit Moz O ms", p = o.split(" "), q = o.toLowerCase().split(" "), r = { svg: "http://www.w3.org/2000/svg" }, s = {}, t = {}, u = {}, v = [], w = v.slice, x, y = function (a, c, d, e) { var f, i, j, k, l = b.createElement("div"), m = b.body, n = m || b.createElement("body"); if (parseInt(d, 10)) while (d--) j = b.createElement("div"), j.id = e ? e[d] : h + (d + 1), l.appendChild(j); return f = ["­", '<style id="s', h, '">', a, "</style>"].join(""), l.id = h, (m ? l : n).innerHTML += f, n.appendChild(l), m || (n.style.background = "", n.style.overflow = "hidden", k = g.style.overflow, g.style.overflow = "hidden", g.appendChild(n)), i = c(l, a), m ? l.parentNode.removeChild(l) : (n.parentNode.removeChild(n), g.style.overflow = k), !!i }, z = function () { function d(d, e) { e = e || b.createElement(a[d] || "div"), d = "on" + d; var f = d in e; return f || (e.setAttribute || (e = b.createElement("div")), e.setAttribute && e.removeAttribute && (e.setAttribute(d, ""), f = E(e[d], "function"), E(e[d], "undefined") || (e[d] = c), e.removeAttribute(d))), e = null, f } var a = { select: "input", change: "input", submit: "form", reset: "form", error: "img", load: "img", abort: "img" }; return d } (), A = {}.hasOwnProperty, B; !E(A, "undefined") && !E(A.call, "undefined") ? B = function (a, b) { return A.call(a, b) } : B = function (a, b) { return b in a && E(a.constructor.prototype[b], "undefined") }, Function.prototype.bind || (Function.prototype.bind = function (b) { var c = this; if (typeof c != "function") throw new TypeError; var d = w.call(arguments, 1), e = function () { if (this instanceof e) { var a = function () { }; a.prototype = c.prototype; var f = new a, g = c.apply(f, d.concat(w.call(arguments))); return Object(g) === g ? g : f } return c.apply(b, d.concat(w.call(arguments))) }; return e }), s.flexbox = function () { return I("flexWrap") }, s.flexboxlegacy = function () { return I("boxDirection") }, s.canvas = function () { var a = b.createElement("canvas"); return !!a.getContext && !!a.getContext("2d") }, s.canvastext = function () { return !!e.canvas && !!E(b.createElement("canvas").getContext("2d").fillText, "function") }, s.webgl = function () { return !!a.WebGLRenderingContext }, s.touch = function () { var c; return "ontouchstart" in a || a.DocumentTouch && b instanceof DocumentTouch ? c = !0 : y(["@media (", n.join("touch-enabled),("), h, ")", "{#modernizr{top:9px;position:absolute}}"].join(""), function (a) { c = a.offsetTop === 9 }), c }, s.geolocation = function () { return "geolocation" in navigator }, s.postmessage = function () { return !!a.postMessage }, s.websqldatabase = function () { return !!a.openDatabase }, s.indexedDB = function () { return !!I("indexedDB", a) }, s.hashchange = function () { return z("hashchange", a) && (b.documentMode === c || b.documentMode > 7) }, s.history = function () { return !!a.history && !!history.pushState }, s.draganddrop = function () { var a = b.createElement("div"); return "draggable" in a || "ondragstart" in a && "ondrop" in a }, s.websockets = function () { return "WebSocket" in a || "MozWebSocket" in a }, s.rgba = function () { return C("background-color:rgba(150,255,150,.5)"), F(j.backgroundColor, "rgba") }, s.hsla = function () { return C("background-color:hsla(120,40%,100%,.5)"), F(j.backgroundColor, "rgba") || F(j.backgroundColor, "hsla") }, s.multiplebgs = function () { return C("background:url(https://),url(https://),red url(https://)"), /(url\s*\(.*?){3}/.test(j.background) }, s.backgroundsize = function () { return I("backgroundSize") }, s.borderimage = function () { return I("borderImage") }, s.borderradius = function () { return I("borderRadius") }, s.boxshadow = function () { return I("boxShadow") }, s.textshadow = function () { return b.createElement("div").style.textShadow === "" }, s.opacity = function () { return D("opacity:.55"), /^0.55$/.test(j.opacity) }, s.cssanimations = function () { return I("animationName") }, s.csscolumns = function () { return I("columnCount") }, s.cssgradients = function () { var a = "background-image:", b = "gradient(linear,left top,right bottom,from(#9f9),to(white));", c = "linear-gradient(left top,#9f9, white);"; return C((a + "-webkit- ".split(" ").join(b + a) + n.join(c + a)).slice(0, -a.length)), F(j.backgroundImage, "gradient") }, s.cssreflections = function () { return I("boxReflect") }, s.csstransforms = function () { return !!I("transform") }, s.csstransforms3d = function () { var a = !!I("perspective"); return a && "webkitPerspective" in g.style && y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}", function (b, c) { a = b.offsetLeft === 9 && b.offsetHeight === 3 }), a }, s.csstransitions = function () { return I("transition") }, s.fontface = function () { var a; return y('@font-face {font-family:"font";src:url("https://")}', function (c, d) { var e = b.getElementById("smodernizr"), f = e.sheet || e.styleSheet, g = f ? f.cssRules && f.cssRules[0] ? f.cssRules[0].cssText : f.cssText || "" : ""; a = /src/i.test(g) && g.indexOf(d.split(" ")[0]) === 0 }), a }, s.generatedcontent = function () { var a; return y(["#", h, "{font:0/0 a}#", h, ':after{content:"', l, '";visibility:hidden;font:3px/1 a}'].join(""), function (b) { a = b.offsetHeight >= 3 }), a }, s.video = function () { var a = b.createElement("video"), c = !1; try { if (c = !!a.canPlayType) c = new Boolean(c), c.ogg = a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), c.h264 = a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), c.webm = a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, "") } catch (d) { } return c }, s.audio = function () { var a = b.createElement("audio"), c = !1; try { if (c = !!a.canPlayType) c = new Boolean(c), c.ogg = a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/, ""), c.mp3 = a.canPlayType("audio/mpeg;").replace(/^no$/, ""), c.wav = a.canPlayType('audio/wav; codecs="1"').replace(/^no$/, ""), c.m4a = (a.canPlayType("audio/x-m4a;") || a.canPlayType("audio/aac;")).replace(/^no$/, "") } catch (d) { } return c }, s.localstorage = function () { try { return localStorage.setItem(h, h), localStorage.removeItem(h), !0 } catch (a) { return !1 } }, s.sessionstorage = function () { try { return sessionStorage.setItem(h, h), sessionStorage.removeItem(h), !0 } catch (a) { return !1 } }, s.webworkers = function () { return !!a.Worker }, s.applicationcache = function () { return !!a.applicationCache }, s.svg = function () { return !!b.createElementNS && !!b.createElementNS(r.svg, "svg").createSVGRect }, s.inlinesvg = function () { var a = b.createElement("div"); return a.innerHTML = "<svg/>", (a.firstChild && a.firstChild.namespaceURI) == r.svg }, s.smil = function () { return !!b.createElementNS && /SVGAnimate/.test(m.call(b.createElementNS(r.svg, "animate"))) }, s.svgclippaths = function () { return !!b.createElementNS && /SVGClipPath/.test(m.call(b.createElementNS(r.svg, "clipPath"))) }; for (var K in s) B(s, K) && (x = K.toLowerCase(), e[x] = s[K](), v.push((e[x] ? "" : "no-") + x)); return e.input || J(), e.addTest = function (a, b) { if (typeof a == "object") for (var d in a) B(a, d) && e.addTest(d, a[d]); else { a = a.toLowerCase(); if (e[a] !== c) return e; b = typeof b == "function" ? b() : b, typeof f != "undefined" && f && (g.className += " " + (b ? "" : "no-") + a), e[a] = b } return e }, C(""), i = k = null, function (a, b) { function l(a, b) { var c = a.createElement("p"), d = a.getElementsByTagName("head")[0] || a.documentElement; return c.innerHTML = "x<style>" + b + "</style>", d.insertBefore(c.lastChild, d.firstChild) } function m() { var a = s.elements; return typeof a == "string" ? a.split(" ") : a } function n(a) { var b = j[a[h]]; return b || (b = {}, i++, a[h] = i, j[i] = b), b } function o(a, c, d) { c || (c = b); if (k) return c.createElement(a); d || (d = n(c)); var g; return d.cache[a] ? g = d.cache[a].cloneNode() : f.test(a) ? g = (d.cache[a] = d.createElem(a)).cloneNode() : g = d.createElem(a), g.canHaveChildren && !e.test(a) && !g.tagUrn ? d.frag.appendChild(g) : g } function p(a, c) { a || (a = b); if (k) return a.createDocumentFragment(); c = c || n(a); var d = c.frag.cloneNode(), e = 0, f = m(), g = f.length; for (; e < g; e++) d.createElement(f[e]); return d } function q(a, b) { b.cache || (b.cache = {}, b.createElem = a.createElement, b.createFrag = a.createDocumentFragment, b.frag = b.createFrag()), a.createElement = function (c) { return s.shivMethods ? o(c, a, b) : b.createElem(c) }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + m().join().replace(/[\w\-]+/g, function (a) { return b.createElem(a), b.frag.createElement(a), 'c("' + a + '")' }) + ");return n}")(s, b.frag) } function r(a) { a || (a = b); var c = n(a); return s.shivCSS && !g && !c.hasCSS && (c.hasCSS = !!l(a, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), k || q(a, c), a } var c = "3.7.0", d = a.html5 || {}, e = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i, f = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i, g, h = "_html5shiv", i = 0, j = {}, k; (function () { try { var a = b.createElement("a"); a.innerHTML = "<xyz></xyz>", g = "hidden" in a, k = a.childNodes.length == 1 || function () { b.createElement("a"); var a = b.createDocumentFragment(); return typeof a.cloneNode == "undefined" || typeof a.createDocumentFragment == "undefined" || typeof a.createElement == "undefined" } () } catch (c) { g = !0, k = !0 } })(); var s = { elements: d.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video", version: c, shivCSS: d.shivCSS !== !1, supportsUnknownElements: k, shivMethods: d.shivMethods !== !1, type: "default", shivDocument: r, createElement: o, createDocumentFragment: p }; a.html5 = s, r(b) } (this, b), e._version = d, e._prefixes = n, e._domPrefixes = q, e._cssomPrefixes = p, e.hasEvent = z, e.testProp = function (a) { return G([a]) }, e.testAllProps = I, e.testStyles = y, g.className = g.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (f ? " js " + v.join(" ") : ""), e } (this, this.document), function (a, b, c) { function d(a) { return "[object Function]" == o.call(a) } function e(a) { return "string" == typeof a } function f() { } function g(a) { return !a || "loaded" == a || "complete" == a || "uninitialized" == a } function h() { var a = p.shift(); q = 1, a ? a.t ? m(function () { ("c" == a.t ? B.injectCss : B.injectJs)(a.s, 0, a.a, a.x, a.e, 1) }, 0) : (a(), h()) : q = 0 } function i(a, c, d, e, f, i, j) { function k(b) { if (!o && g(l.readyState) && (u.r = o = 1, !q && h(), l.onload = l.onreadystatechange = null, b)) { "img" != a && m(function () { t.removeChild(l) }, 50); for (var d in y[c]) y[c].hasOwnProperty(d) && y[c][d].onload() } } var j = j || B.errorTimeout, l = b.createElement(a), o = 0, r = 0, u = { t: d, s: c, e: f, a: i, x: j }; 1 === y[c] && (r = 1, y[c] = []), "object" == a ? l.data = c : (l.src = c, l.type = a), l.width = l.height = "0", l.onerror = l.onload = l.onreadystatechange = function () { k.call(this, r) }, p.splice(e, 0, u), "img" != a && (r || 2 === y[c] ? (t.insertBefore(l, s ? null : n), m(k, j)) : y[c].push(l)) } function j(a, b, c, d, f) { return q = 0, b = b || "j", e(a) ? i("c" == b ? v : u, a, b, this.i++, c, d, f) : (p.splice(this.i++, 0, a), 1 == p.length && h()), this } function k() { var a = B; return a.loader = { load: j, i: 0 }, a } var l = b.documentElement, m = a.setTimeout, n = b.getElementsByTagName("script")[0], o = {}.toString, p = [], q = 0, r = "MozAppearance" in l.style, s = r && !!b.createRange().compareNode, t = s ? l : n.parentNode, l = a.opera && "[object Opera]" == o.call(a.opera), l = !!b.attachEvent && !l, u = r ? "object" : l ? "script" : "img", v = l ? "script" : u, w = Array.isArray || function (a) { return "[object Array]" == o.call(a) }, x = [], y = {}, z = { timeout: function (a, b) { return b.length && (a.timeout = b[0]), a } }, A, B; B = function (a) { function b(a) { var a = a.split("!"), b = x.length, c = a.pop(), d = a.length, c = { url: c, origUrl: c, prefixes: a }, e, f, g; for (f = 0; f < d; f++) g = a[f].split("="), (e = z[g.shift()]) && (c = e(c, g)); for (f = 0; f < b; f++) c = x[f](c); return c } function g(a, e, f, g, h) { var i = b(a), j = i.autoCallback; i.url.split(".").pop().split("?").shift(), i.bypass || (e && (e = d(e) ? e : e[a] || e[g] || e[a.split("/").pop().split("?")[0]]), i.instead ? i.instead(a, e, f, g, h) : (y[i.url] ? i.noexec = !0 : y[i.url] = 1, f.load(i.url, i.forceCSS || !i.forceJS && "css" == i.url.split(".").pop().split("?").shift() ? "c" : c, i.noexec, i.attrs, i.timeout), (d(e) || d(j)) && f.load(function () { k(), e && e(i.origUrl, h, g), j && j(i.origUrl, h, g), y[i.url] = 2 }))) } function h(a, b) { function c(a, c) { if (a) { if (e(a)) c || (j = function () { var a = [].slice.call(arguments); k.apply(this, a), l() }), g(a, j, b, 0, h); else if (Object(a) === a) for (n in m = function () { var b = 0, c; for (c in a) a.hasOwnProperty(c) && b++; return b } (), a) a.hasOwnProperty(n) && (!c && ! --m && (d(j) ? j = function () { var a = [].slice.call(arguments); k.apply(this, a), l() } : j[n] = function (a) { return function () { var b = [].slice.call(arguments); a && a.apply(this, b), l() } } (k[n])), g(a[n], j, b, n, h)) } else !c && l() } var h = !!a.test, i = a.load || a.both, j = a.callback || f, k = j, l = a.complete || f, m, n; c(h ? a.yep : a.nope, !!i), i && c(i) } var i, j, l = this.yepnope.loader; if (e(a)) g(a, 0, l, 0); else if (w(a)) for (i = 0; i < a.length; i++) j = a[i], e(j) ? g(j, 0, l, 0) : w(j) ? B(j) : Object(j) === j && h(j, l); else Object(a) === a && h(a, l) }, B.addPrefix = function (a, b) { z[a] = b }, B.addFilter = function (a) { x.push(a) }, B.errorTimeout = 1e4, null == b.readyState && b.addEventListener && (b.readyState = "loading", b.addEventListener("DOMContentLoaded", A = function () { b.removeEventListener("DOMContentLoaded", A, 0), b.readyState = "complete" }, 0)), a.yepnope = k(), a.yepnope.executeStack = h, a.yepnope.injectJs = function (a, c, d, e, i, j) { var k = b.createElement("script"), l, o, e = e || B.errorTimeout; k.src = a; for (o in d) k.setAttribute(o, d[o]); c = j ? h : c || f, k.onreadystatechange = k.onload = function () { !l && g(k.readyState) && (l = 1, c(), k.onload = k.onreadystatechange = null) }, m(function () { l || (l = 1, c(1)) }, e), i ? k.onload() : n.parentNode.insertBefore(k, n) }, a.yepnope.injectCss = function (a, c, d, e, g, i) { var e = b.createElement("link"), j, c = i ? h : c || f; e.href = a, e.rel = "stylesheet", e.type = "text/css"; for (j in d) e.setAttribute(j, d[j]); g || (n.parentNode.insertBefore(e, n), m(c, 0)) } } (this, document), Modernizr.load = function () { yepnope.apply(window, [].slice.call(arguments, 0)) };

 (function ($, window, document, undefined) {

    'use strict';

    var Modernizr = window.Modernizr;

    //1. Plugin constructor
    function GlassCase(element, options) {
        var gcBase = this;

        gcBase.element = element.wrap('<div class="glass-case"></div>').parent();
        gcBase.init(options);
    }

    //2. Object with the default options of the plugin
    GlassCase.defaults = {
        //DISPLAY AREA
        widthDisplay: 250,        // Default width of the display image
        heightDisplay: 300,        // Default height of the display image
        isAutoScaleDisplay: true,
        isAutoScaleHeight: true,
        isDownloadEnabled: true,
        downloadPosition: 3,
        isShowAlwaysIcons: false,
        speedHideIcons: 3000,
        mouseEnterDisplayCB: function () { },
        mouseLeaveDisplayCB: function () { },
        //THUMBS AREA        
        thumbsPosition: 'bottom',   // Default position of thumbs. Position is relative to the image display. Can take the values: top; bottom      
        nrThumbsPerRow: 5,          // Number of images per row        
        isThumbsOneRow: true,     // Show one row or all images: true -> will be shown only one row; false -> will be shown all images
        isOneThumbShown: false,
        firstThumbSelected: 0,          // Current element's index
        colorActiveThumb: -1,
        thumbsMargin: 4,          // in px
        isHoverShowThumbs: false,
        //ZOOM AREA
        zoomPosition: 'right',    // Default position for the zoom. It can take values: right; left; inner
        autoInnerZoom: true,       // true; false
        isZoomEnabled: true,
        isSlowZoom: false,
        speedSlowZoom: 1200,
        isZoomDiffWH: false,
        zoomWidth: 0,
        zoomHeight: 0,
        zoomAlignment: 'displayImage', //displayImage, displayArea
        zoomMargin: 4,          // in px    
        //LENS AREA
        isSlowLens: false,
        speedSlowLens: 600,
        //OVERLAY AREA
        isOverlayEnabled: true,
        isOverlayFullImage: false,
        //GENERAL
        speed: 400,        // Default speed
        easing: 'linear',   // Default easing
        isKeypressEnabled: true,
        colorIcons: -1,          // The color of the icons
        colorLoading: -1,
        textImageNotLoaded: 'NO IMAGE',
        //CAPTION
        isZCapEnabled: true,
        capZType: 'in', // in, out
        capZPos: 'bottom', // top, bottom
        capZAlign: 'center' // left, center, right
    };

    //3. Adding methods to the plugin object
    GlassCase.prototype = {
        init: function (options) {
            var gcBase = this;

            // Merging user's options with the default options
            gcBase.config = $.extend(true, {}, GlassCase.defaults, options);

            // Saving user's options to a private object
            gcBase._options = options;

            // GlassCase defaults
            gcBase._defaults = GlassCase.defaults;

            gcBase.iOS = false;
            var p = window.navigator.platform;

            if (p === 'iPad' || p === 'iPhone' || p === 'iPod') {
                gcBase.iOS = true;
            }

            gcBase.supportCanvas = Modernizr.canvas;

            var ctntDisplayArea = "<div class='gc-display-area'>" +
                                        "<div class=''></div>" +
                                        "<div class='gc-icon next_icon'></div>" +
                                        "<div class='gc-icon pre_icon'></div>" +
                                        "<div class='gc-display-container'>" +
										"<div class='cust_plug text-center'>" +
                                            "<div class='gc-lens'></div>" +
                                            "<img class='gc-display-display' alt=' ' />" +
                                        "</div>" + "</div>" +
                                     "</div>";
            var ctntZoomArea = "<div class='gc-zoom'>" +
                                        "<div class='gc-zoom-container'><img alt=' ' /></div>" +
                                     "</div>";
            var ctntOverlayArea = "<div class='gc-overlay-area'>" +
                                    "<div class='gc-overlay-top-icons'>" +
                                     "<div class='gc-icon clos_icon'> </div>" +
                                        "<div class='gc-icon enlarge_icon'> </div>" +
                                        "<div class='gc-icon gc-icon-compress'> </div>" +
                                    "</div>" +
                                    "<div class='gc-overlay-left-icons'>" +
                                        "<div class='gc-icon pre_icon'> </div>" +
                                    "</div>" +
                                    "<div class='gc-overlay-right-icons'>" +
                                        "<div class='gc-icon next_icon'> </div>" +
                                    "</div>" +
                                    "<div class='gc-overlay-gcontainer'>" +
                                        "<div class='gc-overlay-container'>" +
                                            "<div class='gc-overlay-container-display'>" +
                                                "<img class='gc-overlay-display' alt=' ' />" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>" +
                                 "</div>";

            var sVT = (gcBase.config.thumbsPosition == 'right' || gcBase.config.thumbsPosition == 'left') ? '-vt' : '';

            var ctntThumbsPrevNext = "<div class='gc-thumbs-area-prev'><div class='gc-icon pre_icon" + sVT + "'></div></div>" +
                                     "<div class='gc-thumbs-area-next'><div class='gc-icon next_icon" + sVT + "'></div></div>";
            // Setting the position of the thumb images
            gcBase.widthDisplayPerc = 100;
            if (gcBase.config.thumbsPosition == 'top' || gcBase.config.thumbsPosition == 'left') {
                gcBase.element.append(ctntDisplayArea);
            }
            else {
                gcBase.element.prepend(ctntDisplayArea);
            }
            gcBase.element.prepend(ctntZoomArea).prepend(ctntOverlayArea);

            // Plugin variables
            // Loading
            gcBase.gcLoadingClass = (Modernizr.csstransforms == true) ? 'gc-loading3' : 'gc-loading';

            gcBase.gcLoader = $("<div class='" + gcBase.gcLoadingClass + "'></div>");
            gcBase.gcLoading = gcBase.element.find('.' + gcBase.gcLoadingClass);
            if (gcBase.config.colorLoading != -1 && Modernizr.csstransforms == true) {
                var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(gcBase.config.colorLoading);
                if (result) {
                    var sC = 'rgba(' + parseInt(result[1], 16) + ', ' + parseInt(result[2], 16) + ', ' + parseInt(result[3], 16) + ', ';
                    gcBase.gcLoader.css({ 'border-top-color': sC + '0.2)', 'border-right-color': sC + '0.2)', 'border-bottom-color': sC + '0.2)', 'border-left-color': sC + '1)' });
                }
            }
            // gcImageData: Array that will hold the sizes of all the images
            gcBase.gcImageData = [];
            // Display: Area, Container, Display, Lens, Download Icon
            gcBase.gcDisplayArea = gcBase.element.find('.gc-display-area');
            gcBase.gcDisplayContainer = gcBase.gcDisplayArea.find('.gc-display-container');
            gcBase.gcDisplayDisplay = gcBase.gcDisplayContainer.find('.gc-display-display');
            gcBase.gcLens = gcBase.gcDisplayContainer.find('.gc-lens').hide();
            gcBase.gcDisplayDownload = gcBase.gcDisplayArea.find('');
            gcBase.gcDisplayPrevious = gcBase.gcDisplayArea.find('.pre_icon');
            gcBase.gcDisplayNext = gcBase.gcDisplayArea.find('.next_icon');
            // Zoom: Area, Display
            gcBase.gcZoom = gcBase.element.find('.gc-zoom').hide();
            gcBase.gcZoomContainer = gcBase.gcZoom.find('.gc-zoom-container');
            gcBase.gcZoomDisplay = gcBase.gcZoomContainer.find('img');
            // Overlay: Area, Display, Close Icon, Previous Icon, Next Icon
            gcBase.gcOverlayArea = gcBase.element.find('.gc-overlay-area').hide();
            gcBase.gcOverlayGContainer = gcBase.gcOverlayArea.find('.gc-overlay-gcontainer');
            gcBase.gcOverlayContainer = gcBase.gcOverlayArea.find('.gc-overlay-container');
            gcBase.gcOverlayContainerDisplay = gcBase.gcOverlayContainer.find('.gc-overlay-container-display');
            gcBase.gcOverlayDisplay = gcBase.gcOverlayContainer.find('.gc-overlay-display');
            gcBase.gcOverlayPrevious = gcBase.gcOverlayArea.find('.pre_icon');
            gcBase.gcOverlayNext = gcBase.gcOverlayArea.find('.next_icon');
            gcBase.gcOverlayClose = gcBase.gcOverlayArea.find('.clos_icon');
            gcBase.gcOverlayEnlarge = gcBase.gcOverlayArea.find('.enlarge_icon').hide();
            gcBase.gcOverlayCompress = gcBase.gcOverlayArea.find('.gc-icon-compress').hide();
            // Thumbs: Area, Ul, Li, AreaPrevious, AreaNext, Previous, Next, Img, LiDiv
            gcBase.gcThumbsUl = gcBase.element.find('ul');
            gcBase.gcThumbsUl.wrap("<div class='gc-thumbs-area'></div>");
            gcBase.gcThumbsArea = gcBase.element.find('.gc-thumbs-area');
            gcBase.gcThumbsArea.append(ctntThumbsPrevNext);
            gcBase.gcThumbsAreaPrevious = gcBase.gcThumbsArea.find('.gc-thumbs-area-prev');
            gcBase.gcThumbsPrevious = gcBase.gcThumbsAreaPrevious.find('.pre_icon' + sVT);
            gcBase.gcThumbsAreaNext = gcBase.gcThumbsArea.find('.gc-thumbs-area-next');
            gcBase.gcThumbsNext = gcBase.gcThumbsAreaNext.find('.next_icon' + sVT);
            gcBase.gcThumbsLi = gcBase.gcThumbsUl.find('li');

            gcBase.gcThumbsLi.each(function (index) {
                var iSrc = $.trim($(this).find('img').attr('src'));
                var els = gcBase.gcThumbsLi.find('img[src="' + iSrc + '"]');

                while (els.length > 1) {
                    els.last().parent().remove();
                    gcBase.gcThumbsLi = gcBase.gcThumbsUl.find('li');
                    els = gcBase.gcThumbsLi.find('img[src="' + iSrc + '"]');
                }
            });
            gcBase.gcThumbsLi = gcBase.gcThumbsUl.find('li');
            gcBase.gcThumbsImg = gcBase.gcThumbsLi.find('img');
            gcBase.gcThumbsImg.wrap('<div class="gc-li-display-container"></div>');
            gcBase.gcThumbsLiDiv = gcBase.gcThumbsLi.find('.gc-li-display-container');
            gcBase.gcThumbsUl.removeClass('gc-start');

            gcBase.gcTotalThumbsImg = gcBase.gcThumbsImg.length;
            // Caption
            var cssClass;

            if (gcBase.config.isZCapEnabled === true) {
                gcBase.gcCaption = $('<div class="gc-caption-container"><div></div></div>');
                gcBase.gcCaptionDisplay = gcBase.gcCaption.find('div');

                if (gcBase.config.zoomPosition === 'inner') gcBase.config.capZType = 'in';

                cssClass = 'gc-caption-' + gcBase.config.capZType + gcBase.config.capZPos;
                if ($.inArray(cssClass, ['gc-caption-outtop', 'gc-caption-outbottom', 'gc-caption-intop', 'gc-caption-inbottom']) === -1) {
                    cssClass = 'gc-caption-' + gcBase._defaults.capZType + gcBase._defaults.capZPos;
                }

                $.inArray(gcBase.config.capZAlign, ['left', 'right', 'center']) === -1 ?
                    cssClass += ' gc-alignment-' + gcBase._defaults.capZAlign :
                    cssClass += ' gc-alignment-' + gcBase.config.capZAlign;

                gcBase.gcCaption.addClass(cssClass).appendTo(gcBase.gcZoom);
            }
            gcBase.isMouseEventsOn = false;
            gcBase.isTouchMove = false;
            gcBase.mouseTimer = 0;

            if (gcBase.config.isShowAlwaysIcons != true) {
                gcBase.gcDisplayDownload.hide();
                gcBase.gcDisplayPrevious.hide();
                gcBase.gcDisplayNext.hide();
            }
            gcBase.isAutoInnerZooming = false;

            if (gcBase.config.zoomPosition == 'inner') {
                gcBase.config.isZoomDiffWH = true; gcBase.config.zoomWidth = 0; gcBase.config.zoomHeight = 0;
            }
            if (gcBase.config.thumbsPosition == 'left' || gcBase.config.thumbsPosition == 'right') {
                gcBase.gcThumbsArea.addClass('gc-vt');
            } else {
                gcBase.gcThumbsArea.addClass('gc-hz');
            }

            if (gcBase.config.colorIcons != -1) {
                gcBase.element.find('.gc-icon').css('color', gcBase.config.colorIcons);
            }

            if (gcBase.config.isDownloadEnabled == false || gcBase.supportCanvas == false) {
                gcBase.gcDisplayDownload.addClass('gc-hide');
            }
            else {
                var cssDownloadPosition = { top: '', bottom: '', right: '', left: '' };
                var bW = '-' + gcBase.gcDisplayArea.css('border-left-width');
                switch (gcBase.config.downloadPosition) {
                    case 1:
                        cssDownloadPosition.top = bW;
                        cssDownloadPosition.left = bW;
                        break;
                    case 2:
                        cssDownloadPosition.top = bW;
                        cssDownloadPosition.right = bW;
                        break;
                    case 4:
                        cssDownloadPosition.bottom = bW;
                        cssDownloadPosition.right = bW;
                        break;
                    default:
                        cssDownloadPosition.bottom = bW;
                        cssDownloadPosition.left = bW;
                        break;
                }
                gcBase.gcDisplayDownload.css(cssDownloadPosition);
            }

            if (isNaN(gcBase.config.firstThumbSelected) == false &&
                parseFloat(gcBase.config.firstThumbSelected) > -1 &&
                parseFloat(gcBase.config.firstThumbSelected) <= (gcBase.gcThumbsLi.length - 1)) {
                gcBase.current = gcBase.config.firstThumbSelected;
            }
            else {
                gcBase.current = gcBase._defaults.firstThumbSelected;
            }

            gcBase.currentSlide = Math.floor(gcBase.current / gcBase.config.nrThumbsPerRow);
            gcBase.old = 0;
            gcBase.currentMousePos = { x: -1, y: -1 };
            gcBase.resizeTimer = 0;
            gcBase.zooming = false;
            gcBase.newZoom = { left: 0, top: 0 };
            gcBase.currentZoom = { left: 0, top: 0 };
            gcBase.slowZoomTimer = 0;
            gcBase.newLens = { left: 0, top: 0 };
            gcBase.currentLens = { left: 0, top: 0 };
            gcBase.slowLensTimer = 0;

            var altTxt = gcBase.gcThumbsLi.eq(gcBase.current).find('img').attr('alt');
            if (altTxt === undefined) altTxt = 'image';

            gcBase.gcDisplayDisplay.attr('src', gcBase.gcThumbsImg.eq(gcBase.current).attr('src'))
                                   .attr('alt', altTxt);
            gcBase.setup();

            $.when(gcBase.preloadImages()).done(function () {
                gcBase.update();
                gcBase.initEvents();
            });
        },
        preloadImages: function () {
            var gcBase = this;

            var countLoadedImages = 0,
                countTotalImages = gcBase.gcTotalThumbsImg;

            // Object that will hold the natural sizes of the image
            function GCImageData(width, height, isLoaded, src) {
                this.width = width;
                this.height = height;
                this.isLoaded = isLoaded;
            };

            return $.Deferred(
				function (dfd) {
				    gcBase.gcThumbsImg.each(function (index) {
				        $('<img/>')
                        .on('load', function () {
                            var lWidth = this.width,
                                lHeight = this.height,
                                lGCImageData = new GCImageData(lWidth, lHeight, true),
                                index = gcBase.gcThumbsLi.find("img[src*='" + $(this).attr('src') + "']").parents('li').index();
                            gcBase.gcImageData[index] = lGCImageData;
                            gcBase.processThumbImage(index);
                            if (++countLoadedImages === countTotalImages) { dfd.resolve(); }
                        })
                        .on('error', function () {
                            var index = gcBase.gcThumbsLi.find("img[src*='" + $(this).attr('src') + "']").parents('li').index(),
                                lWidth = gcBase.gcThumbsLi.width(),
                                lHeight = gcBase.gcThumbsLi.height(),
                                lGCImageData = new GCImageData(lWidth, lHeight, false);
                            gcBase.gcImageData[index] = lGCImageData;

                            this.onerror = "";

                            if (Modernizr.svg) {
                                var iEDB64 = window.btoa("<svg xmlns='http://www.w3.org/2000/svg' width='" + lWidth + "' height='" + lHeight + "'><rect width='" + lWidth + "' height='" + lHeight + "' fill='#eee'/><text text-anchor='middle' x='" + lWidth / 2 + "' y='" + lHeight / 2 + "' style='fill:#aaa;font-weight:bold;font-size:8px;font-family:Arial,Helvetica,sans-serif;dominant-baseline:central'>" + gcBase.config.textImageNotLoaded + "</text></svg>");
                                gcBase.gcThumbsImg.eq(index).attr('src', "data:image/svg+xml;base64," + iEDB64);
                            }
                            gcBase.processThumbImage(index);
                            if (++countLoadedImages === countTotalImages) { dfd.resolve(); }
                        }).attr('src', $(this).attr('src'));
				    });
				}
			).promise();
        },
        processThumbImage: function (index) {
            var gcBase = this;

            gcBase.setupThumbImg(gcBase.gcThumbsLi.eq(index), index);
            gcBase.removeLoader(gcBase.gcThumbsLi.eq(index));
            gcBase.gcThumbsLi.eq(index).find('.gc-li-display-container').removeClass('gc-hide');

            if (gcBase.current == index) {
                gcBase.removeLoader(gcBase.gcDisplayArea);
                gcBase.gcDisplayContainer.removeClass('gc-hide');
                gcBase.setupDisplayDisplay();
                gcBase.setupLens();
            }
        },
        setup: function () {
            var gcBase = this;

            var gcWidth;
            if ((gcBase.config.thumbsPosition == 'right' || gcBase.config.thumbsPosition == 'left') &&
                (gcBase.config.isOneThumbShown == false && (gcBase.gcThumbsLi.length > 1))) {
                var liMargin = parseFloat(gcBase.gcThumbsLi.css('margin-bottom')),
                    heightLi = (parseFloat(gcBase.config.heightDisplay) / gcBase.config.nrThumbsPerRow - (gcBase.config.nrThumbsPerRow - 1) * liMargin / gcBase.config.nrThumbsPerRow),
                    ratio = gcBase.config.widthDisplay / gcBase.config.heightDisplay,
                    widthLi = heightLi * ratio;
                var wE = widthLi + gcBase.config.thumbsMargin + parseFloat(gcBase.config.widthDisplay);

                gcBase.widthDisplayPerc = Math.round(gcBase.config.widthDisplay * 100 / wE);

                gcWidth = gcBase.element.parent().width() > wE ? wE : gcBase.element.parent().width();

            } else {
                gcWidth = gcBase.element.parent().width() > gcBase.config.widthDisplay ? (gcBase.config.widthDisplay) : gcBase.element.parent().width();
            }

            gcBase.element.css({ 'width': gcWidth });

            // DISPLAY
            gcBase.setupDisplayArea();
            // THUMBS
            if (gcBase.config.isOneThumbShown == false && gcBase.gcTotalThumbsImg == 1) {
                gcBase.gcThumbsArea.outerHeight(0);
                gcBase.gcThumbsArea.addClass('gc-hide');
                gcBase.config.isKeypressEnabled = false;
            }
            else {
                gcBase.config.isOneThumbShown = true;
                gcBase.setupThumbs();
            }
            // OVERLAY: Setting centered position for NAVIGATION BUTTONS: previous/next
            if (gcBase.gcTotalThumbsImg == 1) {
                gcBase.gcOverlayPrevious.addClass('gc-hide');
                gcBase.gcOverlayNext.addClass('gc-hide');
            }
            else {
                gcBase.gcOverlayPrevious.css('margin-top', -(gcBase.gcOverlayPrevious.outerHeight() / 2));
                gcBase.gcOverlayNext.css('margin-top', -(gcBase.gcOverlayNext.outerHeight() / 2));
            }
            // COMPONENT
            if (gcBase.config.thumbsPosition == 'top' || gcBase.config.thumbsPosition == 'bottom') {
                var hThumbs = gcBase.config.isOneThumbShown == false ? 0 : gcBase.gcThumbsArea.outerHeight();
                gcBase.element.css({ 'height': hThumbs + gcBase.gcDisplayArea.outerHeight() + parseFloat(gcBase.config.thumbsMargin) });
            }
            else {
                var wThumbs = gcBase.config.isOneThumbShown == false ? 0 : gcBase.gcThumbsArea.outerWidth();
                gcBase.element.css({ 'width': wThumbs + gcBase.gcDisplayArea.outerWidth() + parseFloat(gcBase.config.thumbsMargin) });
                gcBase.element.css({ 'height': gcBase.gcDisplayArea.outerHeight() });
            }
        },
        setupDisplayArea: function () {
            var gcBase = this;

            var currentDisplayAreaWidth, currentDisplayAreaHeight,
                nextDisplayAreaWidth, nextDisplayAreaHeight,
                asWidth = gcBase.config.widthDisplay, asHeight = gcBase.config.heightDisplay;

            gcBase.gcDisplayArea.css({ 'height': '0', 'width': '0' });

            nextDisplayAreaWidth = gcBase.widthDisplayPerc * gcBase.element.outerWidth() / 100;

            nextDisplayAreaHeight = nextDisplayAreaWidth * (asHeight / asWidth);

            gcBase.gcDisplayArea.css({ 'height': Math.ceil(nextDisplayAreaHeight), 'width': Math.ceil(nextDisplayAreaWidth) });

            // Display: Setting centered position for NAVIGATION BUTTONS: previous/next
            gcBase.gcDisplayPrevious.css('margin-top', -(gcBase.gcDisplayPrevious.outerHeight() / 2));
            gcBase.gcDisplayNext.css('margin-top', -(gcBase.gcDisplayNext.outerHeight() / 2));

            if (gcBase.gcTotalThumbsImg == 1) {
                gcBase.gcDisplayPrevious.addClass('gc-hide');
                gcBase.gcDisplayNext.addClass('gc-hide');
            }
            gcBase.gcDisplayContainer.addClass('gc-hide');
            gcBase.addLoader(gcBase.gcDisplayArea);
        },
        setupDisplayDisplay: function () {
            var gcBase = this;

            gcBase.gcDisplayContainer.css({ 'width': '0', 'height': '0' });

            gcBase.gcDisplayContainer.css({ 'width': gcBase.gcDisplayArea.outerWidth(), 'height': gcBase.gcDisplayArea.outerHeight() });

            var widthRatio = gcBase.gcDisplayContainer.outerWidth() / gcBase.gcImageData[gcBase.current].width,
                heightRatio = gcBase.gcDisplayContainer.outerHeight() / gcBase.gcImageData[gcBase.current].height,
                ratio, ddWidth, ddHeight;

            if ((widthRatio < 1 || heightRatio < 1)) {
                gcBase.config.isZoomEnabled === true ? gcBase.isMouseEventsOn = true : gcBase.isMouseEventsOn = false;

                widthRatio < heightRatio ? ratio = widthRatio : ratio = heightRatio;

                ddWidth = ratio * gcBase.gcImageData[gcBase.current].width;
                ddHeight = ratio * gcBase.gcImageData[gcBase.current].height;
            }
            else { // In case that the image's width and height are smaller than the container's windth and height
                gcBase.gcDisplayContainer.trigger('mouseleave.glasscase');
                gcBase.isMouseEventsOn = false;

                ddWidth = gcBase.gcImageData[gcBase.current].width;
                ddHeight = gcBase.gcImageData[gcBase.current].height;
            }
            gcBase.gcDisplayDisplay.css({ 'width': ddWidth, 'height': ddHeight });
            gcBase.gcDisplayContainer.css({ 'width': ddWidth, 'height': ddHeight });

            // Positioning the container in the center of DisplayArea
            var borderVal = parseFloat(gcBase.gcDisplayArea.css('border-left-width')) * 2,
                paddingVal = parseFloat(gcBase.gcDisplayArea.css('padding-top')) * 2;

            var percMarginLeft = ((gcBase.gcDisplayContainer.outerWidth() / 2) * 100) / (gcBase.gcDisplayArea.outerWidth() - borderVal - paddingVal),
                percMarginTop = ((gcBase.gcDisplayContainer.outerHeight() / 2) * 100) / (gcBase.gcDisplayArea.outerWidth() - borderVal - paddingVal);

            gcBase.gcDisplayContainer.css({
                'margin-left': "-" + percMarginLeft + "%",
                'margin-top': "-" + percMarginTop + "%"
            });
        },
        setupZoom: function () {
            var gcBase = this;

            gcBase.gcZoomDisplay.attr('src', gcBase.gcDisplayDisplay.attr('src'))
                                .attr('alt', gcBase.gcDisplayDisplay.attr('alt'));
            if (gcBase.config.zoomPosition != 'inner') {
                gcBase.isAutoInnerZooming = false;
                gcBase.config = $.extend(true, {}, gcBase._defaults, gcBase._options);
                gcBase.gcZoom.appendTo(gcBase.element).removeClass('gc-zoom-inner');
            }

            var borderVal = parseFloat(gcBase.gcZoom.css('border-left-width')) * 2,
                paddingVal = parseFloat(gcBase.gcDisplayArea.css('padding-top')) * 2,
                zoomWidth = (gcBase.config.zoomPosition == 'inner') ? paddingVal : (borderVal + paddingVal),
                zoomHeight = (gcBase.config.zoomPosition == 'inner') ? paddingVal : (borderVal + paddingVal);

            for (var i = 0; i < 2; i++) {
                if (gcBase.config.isZoomDiffWH && gcBase.config.zoomWidth > 0) {
                    zoomWidth += parseFloat(gcBase.config.zoomWidth) < gcBase.gcImageData[gcBase.current].width ?
                                 parseFloat(gcBase.config.zoomWidth) : gcBase.gcImageData[gcBase.current].width;
                } else { zoomWidth += gcBase.gcDisplayContainer.outerWidth(); }

                if (gcBase.config.isZoomDiffWH && gcBase.config.zoomHeight > 0) {
                    zoomHeight += parseFloat(gcBase.config.zoomHeight) < gcBase.gcImageData[gcBase.current].height ?
                                  parseFloat(gcBase.config.zoomHeight) : gcBase.gcImageData[gcBase.current].height;
                } else { zoomHeight += gcBase.gcDisplayContainer.outerHeight(); }

                if (gcBase.config.isZoomDiffWH == false) {
                    zoomWidth = zoomHeight;
                }

                if (gcBase.config.autoInnerZoom == true && gcBase.config.zoomPosition != 'inner') {
                    if (gcBase.element.outerWidth() + zoomWidth > $(window).width()) {
                        gcBase.isAutoInnerZooming = true;
                        gcBase.config.isZoomDiffWH = true; gcBase.config.zoomWidth = 0; gcBase.config.zoomHeight = 0;
                        if (i == 0) { zoomWidth = zoomHeight = paddingVal; }
                    } else { break; }
                } else { break; }
                if (gcBase.config.zoomPosition == 'inner') { break; }
            }

            gcBase.gcZoomContainer.css({ 'width': 0, 'height': 0 });
            gcBase.gcZoom.css({ 'width': zoomWidth, 'height': zoomHeight });
            gcBase.gcZoomContainer.css({ 'width': gcBase.gcZoom.outerWidth(), 'height': gcBase.gcZoom.outerHeight() });

            if (gcBase.config.isZCapEnabled === true) {
                var capTxt = $(gcBase.gcThumbsImg[gcBase.current]).data('gc-caption');
                capTxt === undefined ? gcBase.gcCaption.hide() : (gcBase.gcCaption.show(), gcBase.gcCaptionDisplay.empty().append(capTxt));
                var cssClass;

                if (gcBase.isAutoInnerZooming === true) {
                    if (gcBase.config.capZType === 'out') {
                        gcBase.gcCaption.removeClass('gc-caption-outtop gc-caption-outbottom');

                        cssClass = gcBase.config.capZPos === 'top' ? 'gc-caption-intop' : 'gc-caption-inbottom';
                        gcBase.gcCaption.addClass(cssClass);
                    }
                } else {
                    if ((gcBase.config.capZType === 'out') &&
                        (gcBase.gcCaption.hasClass('gc-caption-intop') || gcBase.gcCaption.hasClass('gc-caption-inbottom'))) {
                        gcBase.gcCaption.removeClass('gc-caption-intop gc-caption-inbottom');

                        cssClass = gcBase.config.capZPos === 'top' ? 'gc-caption-outtop' : 'gc-caption-outbottom';
                        gcBase.gcCaption.addClass(cssClass);
                    }
                }
            }
        },
        setupZoomPos: function () {
            var gcBase = this;

            if (gcBase.config.zoomPosition == 'inner' || gcBase.isAutoInnerZooming == true) {
                gcBase.gcZoom.appendTo(gcBase.gcDisplayContainer).addClass('gc-zoom-inner');
            }
            else {
                gcBase.gcZoom.appendTo(gcBase.element).removeClass('gc-zoom-inner');

                if (gcBase.config.zoomPosition == 'left') {
                    gcBase.gcZoom.css({ 'right': (gcBase.element.outerWidth(true)), 'margin-right': gcBase.config.zoomMargin + 'px' });
                }
                else {
                    gcBase.gcZoom.css({ 'left': (gcBase.element.outerWidth(true)), 'margin-left': gcBase.config.zoomMargin + 'px' });
                }

                var topZ = gcBase.config.zoomAlignment == 'displayArea' ? 0 : gcBase.gcDisplayContainer.position().top
                                                                             + parseFloat(gcBase.gcDisplayContainer.css('margin-top'))
                                                                             - parseFloat(gcBase.gcDisplayArea.css('padding-top'));

                if (gcBase.config.thumbsPosition == 'top') {
                    var topT = gcBase.gcThumbsArea.outerHeight() + parseFloat(gcBase.config.thumbsMargin);
                    gcBase.gcZoom.css({ 'top': topZ + topT });
                }
                else {
                    gcBase.gcZoom.css({ 'top': topZ });
                }
            }
        },
        setupLens: function () {
            var gcBase = this;

            var percZoomWidth = Math.round(gcBase.gcZoomContainer.outerWidth() / gcBase.gcImageData[gcBase.current].width * 100);
            var valueLensW = Math.round(gcBase.gcDisplayDisplay.outerWidth() * percZoomWidth / 100);

            var percZoomHeight = Math.round(gcBase.gcZoomContainer.outerHeight() / gcBase.gcImageData[gcBase.current].height * 100);
            var valueLensH = Math.round(gcBase.gcDisplayDisplay.outerHeight() * percZoomHeight / 100);

            gcBase.gcLens.css({ 'width': (valueLensW), 'height': (valueLensH) });
            gcBase.mousemoveHandler();
        },
        addLoader: function (obj) { //obj - the object that will contain the loader
            var gcBase = this;

            $(obj).prepend(gcBase.gcLoader.clone());
        },
        removeLoader: function (obj) {
            var gcBase = this;

            var loader = $(obj).find('.' + gcBase.gcLoadingClass);

            if (loader.length) {
                loader.remove();
            }
        },
        setupThumbImg: function (obj, index) { // obj - li element
            var gcBase = this;

            var widthImg = gcBase.gcThumbsLi.outerWidth(),
                heightImg = gcBase.gcThumbsLi.outerHeight(),
                ratioImg, listItem = $(obj),
                wRatio = widthImg / gcBase.gcImageData[index].width,
    		    hRatio = heightImg / gcBase.gcImageData[index].height;

            ratioImg = wRatio > hRatio ? wRatio : hRatio;

            gcBase.gcThumbsImg[index].width = Math.ceil(gcBase.gcImageData[index].width * ratioImg, 10);
            gcBase.gcThumbsImg[index].height = Math.ceil(gcBase.gcImageData[index].height * ratioImg, 10);

            var percMarginLeft = ((gcBase.gcThumbsImg.eq(index).outerWidth() / 2) * 100) / (gcBase.gcThumbsLiDiv.outerWidth()),
                percMarginTop = ((gcBase.gcThumbsImg.eq(index).outerHeight() / 2) * 100) / (gcBase.gcThumbsLiDiv.outerWidth());

            gcBase.gcThumbsImg.eq(index).css({
                'margin-top': "-" + percMarginTop + "%",
                'margin-left': "-" + percMarginLeft + "%"
            });
            gcBase.gcThumbsLiDiv.eq(index).removeClass('gc-hide');
            gcBase.removeLoader(gcBase.gcThumbsLi.eq(index));
            gcBase.gcThumbsLiDiv.eq(index).removeClass('gc-hide');
            gcBase.removeLoader(gcBase.gcThumbsLi.eq(index));
        },
        setupThumbs: function () {
            var gcBase = this;

            if (gcBase.config.thumbsPosition == 'right') {
                gcBase.setupThumbsLR();
                gcBase.gcDisplayArea.css({ 'top': '0', 'left': '0' });
                gcBase.gcThumbsArea.css({ 'top': '0', 'left': gcBase.gcDisplayArea.outerWidth() + parseFloat(gcBase.config.thumbsMargin) });
            }
            if (gcBase.config.thumbsPosition == 'left') {
                gcBase.setupThumbsLR();
                gcBase.gcThumbsArea.css({ 'top': '0', 'left': '0' });
                gcBase.gcDisplayArea.css({ 'top': '0', 'left': gcBase.gcThumbsArea.outerWidth() + parseFloat(gcBase.config.thumbsMargin) });
            }
            if (gcBase.config.thumbsPosition == 'bottom') {
                gcBase.setupThumbsTB();
                gcBase.gcDisplayArea.css({ 'top': '0', 'left': '0' });
                gcBase.gcThumbsArea.css({ 'top': gcBase.gcDisplayArea.outerHeight() + parseFloat(gcBase.config.thumbsMargin), 'left': '0' });
            }
            if (gcBase.config.thumbsPosition == 'top') {
                gcBase.setupThumbsTB();
                gcBase.gcThumbsArea.css({ 'top': '0', 'left': '0' });
                gcBase.gcDisplayArea.css({ 'top': gcBase.gcThumbsArea.outerHeight() + parseFloat(gcBase.config.thumbsMargin), 'left': '0' });
            }
        },
        setupThumbsTB: function () {
            var gcBase = this;
            gcBase.gcThumbsArea.css('width', gcBase.gcDisplayArea.outerWidth());

            var liMarginRight = parseFloat(gcBase.gcThumbsLi.css('margin-right')),
                ratio = gcBase.config.widthDisplay / gcBase.config.heightDisplay,
                widthLi = (gcBase.gcThumbsArea.outerWidth() / gcBase.config.nrThumbsPerRow - (gcBase.config.nrThumbsPerRow - 1) * liMarginRight / gcBase.config.nrThumbsPerRow),
                heightLi = widthLi / ratio, widthLiPerc;
            if (gcBase.config.isThumbsOneRow == true) {
                widthLiPerc = (widthLi * 100) / (((widthLi + liMarginRight) * gcBase.gcThumbsLi.length) - liMarginRight);
            }
            else {
                widthLiPerc = (widthLi * 100) / gcBase.gcThumbsArea.outerWidth();
            }
            gcBase.gcThumbsLi.css({ 'width': widthLiPerc + "%", 'height': heightLi });
            gcBase.gcThumbsLiDiv.addClass('gc-hide');
            for (var i = 0; i < gcBase.gcThumbsLi.length; i++) {
                gcBase.addLoader(gcBase.gcThumbsLi[i]);
            }
            if (gcBase.config.isThumbsOneRow == true) {
                gcBase.gcThumbsLi.last().css('display:none');
            }
            else {
                gcBase.gcThumbsUl.find(':nth-child(' + gcBase.config.nrThumbsPerRow + 'n)').css('margin-right', 0);
                gcBase.gcThumbsUl.find(':nth-child(n +' + (parseFloat(gcBase.config.nrThumbsPerRow) + 1) + ')').css('margin-top', liMarginRight + 'px');
            }
            if (gcBase.config.isThumbsOneRow == true) {
                gcBase.gcThumbsUl.css({
                    'width': Math.ceil((widthLi * gcBase.gcThumbsLi.length + (gcBase.gcThumbsLi.length - 1) * liMarginRight)),
                    'height': Math.ceil(heightLi)
                });
                gcBase.gcThumbsArea.css('height', Math.ceil(heightLi));
            }
            else {
                var totalRows = Math.ceil((gcBase.gcThumbsLi.length) / gcBase.config.nrThumbsPerRow);
                var lHeight = Math.ceil(heightLi * totalRows + liMarginRight * (totalRows - 1));

                gcBase.gcThumbsUl.css({ 'width': gcBase.gcThumbsArea.outerWidth(), 'height': lHeight });
                gcBase.gcThumbsArea.css('height', lHeight);
            }
            if (gcBase.config.isThumbsOneRow == true) {
                gcBase.gcThumbsAreaPrevious.removeClass('gc-hide');
                gcBase.gcThumbsPrevious.css('margin-top', (-gcBase.gcThumbsPrevious.outerHeight() / 2));
                gcBase.gcThumbsAreaNext.removeClass('gc-hide');
                gcBase.gcThumbsNext.css('margin-top', (-gcBase.gcThumbsNext.outerHeight() / 2));

                gcBase.setupSlider();
            }
            else {
                gcBase.gcThumbsAreaPrevious.addClass('gc-hide');
                gcBase.gcThumbsAreaNext.addClass('gc-hide');
            }
            if (gcBase.iOS) {
                var brwLiWidth = gcBase.gcThumbsLi.outerWidth(), brwDiff = gcBase.gcThumbsArea.outerWidth() - (brwLiWidth * gcBase.config.nrThumbsPerRow + (gcBase.config.nrThumbsPerRow - 1) * liMarginRight);
                gcBase.gcThumbsUl.find(':nth-child(' + gcBase.config.nrThumbsPerRow + 'n)').css('width', brwLiWidth + brwDiff);
            }
        },
        setupThumbsLR: function () {
            var gcBase = this;
            gcBase.gcThumbsArea.css('height', gcBase.gcDisplayArea.outerHeight());

            var liMargin = parseFloat(gcBase.gcThumbsLi.css('margin-bottom')),
                ratio = gcBase.config.widthDisplay / gcBase.config.heightDisplay,
                heightLi = (gcBase.gcThumbsArea.outerHeight() / gcBase.config.nrThumbsPerRow - (gcBase.config.nrThumbsPerRow - 1) * liMargin / gcBase.config.nrThumbsPerRow),
                widthLi = heightLi * ratio, heightLiPerc;
            heightLiPerc = (heightLi * 100) / (((heightLi + liMargin) * gcBase.gcThumbsLi.length) - liMargin);
            gcBase.gcThumbsLi.css({ 'width': widthLi, 'height': heightLiPerc + "%" });
            gcBase.gcThumbsLiDiv.addClass('gc-hide');
            for (var i = 0; i < gcBase.gcThumbsLi.length; i++) {
                gcBase.addLoader(gcBase.gcThumbsLi[i]);
            }
            gcBase.gcThumbsLi.last().css('margin-bottom', 0);
            gcBase.gcThumbsUl.css({
                'width': Math.ceil(widthLi),
                'height': Math.ceil((((heightLi + liMargin) * gcBase.gcThumbsLi.length) - liMargin))
            });
            gcBase.gcThumbsArea.css('width', Math.ceil(widthLi));
            gcBase.gcThumbsAreaPrevious.removeClass('gc-hide');
            gcBase.gcThumbsPrevious.css('margin-left', (-gcBase.gcThumbsPrevious.outerWidth() / 2));
            gcBase.gcThumbsAreaNext.removeClass('gc-hide');
            gcBase.gcThumbsNext.css('margin-left', (-gcBase.gcThumbsNext.outerWidth() / 2));

            gcBase.setupSlider();
            if (gcBase.iOS) {
                var brwLiHeight = gcBase.gcThumbsLi.outerHeight();
                var brwDiff = gcBase.gcThumbsArea.outerHeight() - (brwLiHeight * gcBase.config.nrThumbsPerRow + (gcBase.config.nrThumbsPerRow - 1) * liMargin);
                gcBase.gcThumbsUl.find(':nth-child(' + gcBase.config.nrThumbsPerRow + 'n)').css('height', brwLiHeight + brwDiff);
            }
        },
        setupSlider: function () {
            var gcBase = this;

            if (gcBase.gcTotalThumbsImg <= gcBase.config.nrThumbsPerRow) {
                gcBase.gcThumbsAreaPrevious.addClass('gc-hide');
                gcBase.gcThumbsAreaNext.addClass('gc-hide');
                return;
            }
            gcBase.gcThumbsAreaPrevious.removeClass('gc-disabled');
            gcBase.gcThumbsAreaNext.removeClass('gc-disabled');

            if (gcBase.currentSlide == 0) {
                gcBase.gcThumbsAreaPrevious.addClass('gc-disabled');
            }
            if (gcBase.currentSlide == Math.floor((gcBase.gcThumbsLi.length - 1) / gcBase.config.nrThumbsPerRow)) {
                gcBase.gcThumbsAreaNext.addClass('gc-disabled');
            }
        },
        update: function () {
            var gcBase = this;
            var altTxt;
            //1.
            if (gcBase.config.colorActiveThumb != -1) {
                gcBase.element.find('.gc-active').css('border-color', "");
            }

            gcBase.gcThumbsLi.removeClass('gc-active').eq(gcBase.current).addClass('gc-active');

            if (gcBase.config.colorActiveThumb != -1) {
                gcBase.element.find('.gc-active').css('border-color', gcBase.config.colorActiveThumb);
            }

            //2.
            altTxt = gcBase.gcThumbsLi.eq(gcBase.current).find('img').attr('alt');
            if (altTxt === undefined) altTxt = 'image';

            gcBase.gcDisplayDisplay.attr('src', gcBase.gcThumbsLi.eq(gcBase.current).find('img').attr('src'))
                                   .attr('alt', altTxt);

            //3.
            gcBase.setupDisplayDisplay();
            gcBase.setupZoom();
            gcBase.setupLens();
            gcBase.setupZoomPos();
        },
        animateImage: function () {
            var gcBase = this;

            gcBase.gcDisplayDisplay.stop(true).animate({ opacity: 0.5 }, 200, function () {
                if ($('body').hasClass('gc-noscroll')) { // If OverlayArea is shown
                    gcBase.gcOverlayDisplay.animate({ opacity: 0 }, 200, function () {
                        gcBase.update();
                        gcBase.setupOverlay();
                        gcBase.gcOverlayDisplay.animate({ opacity: 1 }, 500);
                    });
                }

                if (!$('body').hasClass('gc-noscroll')) {
                    gcBase.update();
                }
                gcBase.gcDisplayDisplay.animate({ opacity: 1 }, 500, function () {
                    gcBase.gcZoomDisplay.attr('src', gcBase.gcDisplayDisplay.attr('src'))
                                        .attr('alt', gcBase.gcDisplayDisplay.attr('alt'));
                });
            });
        },
        nextImage: function () {
            var gcBase = this;

            gcBase.old = gcBase.current;
            gcBase.current = (gcBase.current == (gcBase.gcThumbsLi.length - 1)) ? 0 : gcBase.current + 1;
            gcBase.slide('true', '');
            gcBase.animateImage();
        },
        previousImage: function () {
            var gcBase = this;

            gcBase.old = gcBase.current;
            gcBase.current = (gcBase.current == 0) ? (gcBase.gcThumbsLi.length - 1) : gcBase.current - 1;
            gcBase.slide('true', '');
            gcBase.animateImage();
        },
        slide: function (isImageChange, slideChange) {//isImageChange: true || false; slideChange:   previous || next
            var gcBase = this;

            if (gcBase.config.isThumbsOneRow == false && (gcBase.config.thumbsPosition == 'bottom' || gcBase.config.thumbsPosition == 'top')) {
                return;
            }

            var nextSlide = 0;

            if (isImageChange == 'true') {
                nextSlide = Math.floor(gcBase.current / gcBase.config.nrThumbsPerRow);
            }
            else {
                if (slideChange == 'previous') {
                    nextSlide = 0;

                    if (gcBase.currentSlide > 0) {
                        nextSlide = gcBase.currentSlide - 1;
                    }
                }
                else {
                    nextSlide = Math.floor((gcBase.gcThumbsLi.length - 1) / gcBase.config.nrThumbsPerRow);

                    if (gcBase.currentSlide < nextSlide) {
                        nextSlide = gcBase.currentSlide + 1;
                    }
                }
            }

            if (nextSlide == gcBase.currentSlide)
                return;

            gcBase.currentSlide = nextSlide;

            var vMargin;
            //Making the slide
            if (gcBase.config.thumbsPosition == 'bottom' || gcBase.config.thumbsPosition == 'top') {
                vMargin = gcBase.gcThumbsArea.outerWidth() + parseFloat(gcBase.gcThumbsLi.css('margin-right'));
                gcBase.gcThumbsUl.animate({ left: (-(nextSlide * vMargin)) + 'px' }, gcBase.config.speed);
            } else {
                vMargin = gcBase.gcThumbsArea.outerHeight() + parseFloat(gcBase.gcThumbsLi.css('margin-bottom'));
                gcBase.gcThumbsUl.animate({ top: (-(nextSlide * vMargin)) + 'px' }, gcBase.config.speed);
            }
            var transitionendfn = $.proxy(function () {
                this.isAnimating = false;

                this.setupSlider();
            }, gcBase);

            transitionendfn.call();
        },
        mousemoveHandler: function (event) {
            var gcBase = this;

            if (event !== undefined) {
                if (gcBase.isTouchMove == true) {
                    if (event.originalEvent.touches.length == 1) {
                        var touch = event.originalEvent.touches[0];
                        gcBase.currentMousePos.x = touch.pageX;
                        gcBase.currentMousePos.y = touch.pageY;
                    }
                }
                else {
                    gcBase.currentMousePos.x = event.pageX;
                    gcBase.currentMousePos.y = event.pageY;
                }
            }

            if (gcBase.currentMousePos.x == -1 && gcBase.currentMousePos.y == -1) {
                return;
            }

            gcBase.calcMousePos(gcBase.currentMousePos);

            if ((gcBase.config.isSlowZoom == false) || (gcBase.config.isSlowZoom == true && event == undefined)) {
                gcBase.gcZoomDisplay.css({ 'top': gcBase.newZoom.top, 'left': gcBase.newZoom.left });
            }

            if ((gcBase.config.isSlowLens == false) || (gcBase.config.isSlowLens == true && event == undefined)) {
                gcBase.gcLens.css({ 'top': gcBase.newLens.top, 'left': gcBase.newLens.left });
            }
        },
        mouseenterHandler: function (event, oEventTrigger) {
            var gcBase = this;

            if (gcBase.isMouseEventsOn === false) return;

            if (oEventTrigger !== undefined) event = oEventTrigger;

            if (event !== undefined) {
                if (gcBase.isTouchMove === true) {
                    if (event.originalEvent.touches.length == 1) {
                        var touch = event.originalEvent.touches[0];
                        gcBase.currentMousePos.x = touch.pageX;
                        gcBase.currentMousePos.y = touch.pageY;
                    }
                }
                else {
                    gcBase.currentMousePos.x = event.pageX;
                    gcBase.currentMousePos.y = event.pageY;
                }
            }

            gcBase.calcMousePos(gcBase.currentMousePos);

            gcBase.currentZoom.top = gcBase.newZoom.top; gcBase.currentZoom.left = gcBase.newZoom.left;
            gcBase.currentLens.top = gcBase.newLens.top; gcBase.currentLens.left = gcBase.newLens.left;

            gcBase.gcZoomDisplay.css({ 'top': gcBase.newZoom.top, 'left': gcBase.newZoom.left });
            gcBase.gcLens.css({ 'top': gcBase.newLens.top, 'left': gcBase.newLens.left });

            if (gcBase.zooming == false) {
                if (gcBase.config.zoomPosition == 'inner' || gcBase.isAutoInnerZooming == true) {
                    gcBase.gcZoom.fadeIn(gcBase.config.speed);
                } else {
                    gcBase.gcLens.fadeIn(gcBase.config.speed);
                    gcBase.gcZoom.fadeIn(gcBase.config.speed);
                }
            }

            if (gcBase.config.isSlowZoom == true) {
                clearTimeout(gcBase.slowZoomTimer);
                gcBase.zoomSlowDown();
            }

            if (gcBase.config.isSlowLens == true) {
                clearTimeout(gcBase.slowLensTimer);
                gcBase.lensSlowDown();
            }

            gcBase.zooming = true;
        },
        mouseleaveHandler: function (event) {
            var gcBase = this;

            gcBase.gcLens.stop()
                         .hide();
            gcBase.gcZoom.stop()
                         .fadeOut(gcBase.config.speed);

            if (event !== undefined) {
                if (gcBase.isTouchMove == true) {
                    if (event.originalEvent.touches.length == 1) {
                        var touch = event.originalEvent.touches[0];
                        gcBase.currentMousePos.x = touch.pageX;
                        gcBase.currentMousePos.y = touch.pageY;
                    }
                }
                else {
                    gcBase.currentMousePos.x = event.pageX;
                    gcBase.currentMousePos.y = event.pageY;
                }
            }

            if (gcBase.config.isSlowZoom == true) {
                clearTimeout(gcBase.slowZoomTimer);
            }

            if (gcBase.config.isSlowLens == true) {
                clearTimeout(gcBase.slowLensTimer);
            }
            gcBase.zooming = false;
        },
        touchstartDC: function (event) {
            event.preventDefault();
        },
        touchmoveDC: function (event) {
            var gcBase = this;

            if (gcBase.isTouchMove == false) {
                gcBase.isTouchMove = true;
                gcBase.gcDisplayContainer.trigger('mouseenter.glasscase', event);
            }
            gcBase.mousemoveHandler(event);
            event.preventDefault();
        },
        touchendDC: function (event) {
            var gcBase = this;

            if (gcBase.isTouchMove == true) {
                gcBase.mouseleaveHandler(event);
                gcBase.isTouchMove = false;
            }
            else { gcBase.toggleOverlay(); }
            event.preventDefault();
        },
        calcMousePos: function (currentMousePos) {
            var gcBase = this;

            var imageContainerOffset = gcBase.gcDisplayContainer.offset();
            var mouseXRelative = gcBase.currentMousePos.x - imageContainerOffset.left,
                mouseYRelative = gcBase.currentMousePos.y - imageContainerOffset.top;

            var imageDisplayWidth = gcBase.gcDisplayDisplay.outerWidth(),
                imageDisplayHeight = gcBase.gcDisplayDisplay.outerHeight();

            var lensWidth = gcBase.gcLens.outerWidth(),
                lensHeight = gcBase.gcLens.outerHeight(),
                lensTop = mouseYRelative - Math.round(lensHeight / 2),
                lensLeft = mouseXRelative - Math.round(lensWidth / 2); // 2 -> the middle

            var ratio = gcBase.gcImageData[gcBase.current].width / imageDisplayWidth,
                zoomTop = -lensTop * ratio, zoomLeft = -lensLeft * ratio;

            if (mouseYRelative - lensHeight / 2 < 0) {
                lensTop = 0; zoomTop = 0;
            }

            if (mouseYRelative + lensHeight / 2 > 0 + imageDisplayHeight) {
                lensTop = imageDisplayHeight - lensHeight;

                zoomTop = -(gcBase.gcImageData[gcBase.current].height - gcBase.gcZoom.outerHeight());
            }

            if (mouseXRelative - lensWidth / 2 < 0) {
                lensLeft = 0;
                zoomLeft = 0;
            }

            if (mouseXRelative + lensWidth / 2 > 0 + imageDisplayWidth) {
                lensLeft = imageDisplayWidth - lensWidth;

                zoomLeft = -(gcBase.gcImageData[gcBase.current].width - gcBase.gcZoom.outerWidth());
            }

            gcBase.newZoom.left = zoomLeft;
            gcBase.newZoom.top = zoomTop;

            gcBase.newLens.left = lensLeft;
            gcBase.newLens.top = lensTop;
        },
        zoomSlowDown: function () {
            var gcBase = this;

            var diffZoomPos = { left: 0, top: 0 },
                moveZoomPos = { left: 0, top: 0 };

            //1. 
            diffZoomPos.left = gcBase.newZoom.left - gcBase.currentZoom.left;
            diffZoomPos.top = gcBase.newZoom.top - gcBase.currentZoom.top;

            //2.
            moveZoomPos.left = -diffZoomPos.left / (gcBase.config.speedSlowZoom / 100);
            moveZoomPos.top = -diffZoomPos.top / (gcBase.config.speedSlowZoom / 100);

            //3.
            gcBase.currentZoom.left = gcBase.currentZoom.left - moveZoomPos.left;
            gcBase.currentZoom.top = gcBase.currentZoom.top - moveZoomPos.top;

            //4.
            if (diffZoomPos.left < 1 && diffZoomPos.left > -1) {
                gcBase.currentZoom.left = gcBase.newZoom.left;
            }
            if (diffZoomPos.top < 1 && diffZoomPos.top > -1) {
                gcBase.currentZoom.top = gcBase.newZoom.top;
            }

            //5.
            gcBase.gcZoomDisplay.css({ 'top': gcBase.currentZoom.top, 'left': gcBase.currentZoom.left });

            gcBase.slowZoomTimer = setTimeout(function () { gcBase.zoomSlowDown(); }, 25);
        },
        lensSlowDown: function () {
            var gcBase = this;

            var diffLensPos = { left: 0, top: 0 },
                moveLensPos = { left: 0, top: 0 };

            //1.
            diffLensPos.left = gcBase.newLens.left - gcBase.currentLens.left;
            diffLensPos.top = gcBase.newLens.top - gcBase.currentLens.top;

            //2.
            moveLensPos.left = -diffLensPos.left / (gcBase.config.speedSlowLens / 100);
            moveLensPos.top = -diffLensPos.top / (gcBase.config.speedSlowLens / 100);

            //3.
            gcBase.currentLens.left = gcBase.currentLens.left - moveLensPos.left;
            gcBase.currentLens.top = gcBase.currentLens.top - moveLensPos.top;

            //4.
            if (diffLensPos.left < 1 && diffLensPos.left > -1) {
                gcBase.currentLens.left = gcBase.newLens.left;
            }
            if (diffLensPos.top < 1 && diffLensPos.top > -1) {
                gcBase.currentLens.top = gcBase.newLens.top;
            }

            //5.
            gcBase.gcLens.css('top', gcBase.currentLens.top);
            gcBase.gcLens.css('left', gcBase.currentLens.left);

            gcBase.slowLensTimer = setTimeout(function () { gcBase.lensSlowDown(); }, 25);
        },
        setupOverlay: function () {
            var gcBase = this;

            var isNatSizeSMScr = ((gcBase.gcImageData[gcBase.current].width <= gcBase.gcOverlayArea.outerWidth()) &&
                                  (gcBase.gcImageData[gcBase.current].height <= gcBase.gcOverlayArea.outerHeight()));

            gcBase.gcOverlayDisplay.attr('src', gcBase.gcDisplayDisplay.attr('src'))
                                   .attr('alt', gcBase.gcDisplayDisplay.attr('alt'));

            if (isNatSizeSMScr || (gcBase.config.isOverlayFullImage == true)) {

                gcBase.gcOverlayCompress.hide();
                gcBase.gcOverlayEnlarge.hide();
                gcBase.overlayNatSizes();
            }
            else {
                gcBase.gcOverlayCompress.hide();
                gcBase.gcOverlayEnlarge.show();
                gcBase.gcOverlayArea.removeClass('gc-natsize');
                gcBase.overlayFitSizes();
            }
        },
        overlayNatSizes: function () {
            var gcBase = this;
            var hOC = gcBase.gcOverlayContainer.outerHeight();
            var wOC = gcBase.gcOverlayContainer.outerWidth();

            gcBase.gcOverlayGContainer.removeClass('gc-overlay-fit');
            gcBase.gcOverlayDisplay.removeClass('gc-overlay-display-center gc-overlay-display-hcenter gc-overlay-display-vcenter');

            if (gcBase.gcImageData[gcBase.current].height <= hOC &&
                gcBase.gcImageData[gcBase.current].width <= wOC) {
                gcBase.gcOverlayDisplay.addClass('gc-overlay-display-center');
            } else {
                if (gcBase.gcImageData[gcBase.current].height <= hOC) {
                    gcBase.gcOverlayDisplay.addClass('gc-overlay-display-vcenter');
                }
                if (gcBase.gcImageData[gcBase.current].width <= wOC) {
                    gcBase.gcOverlayDisplay.addClass('gc-overlay-display-hcenter');
                }
            }
        },
        overlayFitSizes: function () {
            var gcBase = this;

            gcBase.gcOverlayGContainer.addClass('gc-overlay-fit');
            gcBase.gcOverlayDisplay.removeClass('gc-overlay-display-hcenter gc-overlay-display-vcenter')
                                   .addClass('gc-overlay-display-center');
        },
        toggleOverlayImgSize: function () {
            var gcBase = this;

            if (!gcBase.gcOverlayArea.hasClass('gc-natsize')) {
                gcBase.gcOverlayArea.addClass('gc-natsize');
                gcBase.gcOverlayEnlarge.hide();
                gcBase.gcOverlayCompress.show();
                gcBase.overlayNatSizes();
            }
            else {
                gcBase.gcOverlayEnlarge.show();
                gcBase.gcOverlayCompress.hide();
                gcBase.gcOverlayArea.removeClass('gc-natsize');
                gcBase.overlayFitSizes();
            }
        },
        toggleOverlay: function () {
            var gcBase = this;

            if ($('body').hasClass('gc-noscroll')) { //overlay on
                gcBase.fadeOutOverlay();
            }
            else {
                if (gcBase.config.isOverlayEnabled == false)
                    return;
                gcBase.gcOverlayArea.fadeIn(gcBase.config.speed);
                $('body').addClass('gc-noscroll');
                gcBase.setupOverlay();
            }
        },
        fadeOutOverlay: function () {
            var gcBase = this;

            $('body').removeClass('gc-noscroll');
            gcBase.gcOverlayArea.fadeOut(gcBase.config.speed);
        },
        resizeGC: function () {
            var gcBase = this;

            gcBase.element.css({ 'height': '0', 'width': '0' });
            gcBase.setup();
            gcBase.gcThumbsImg.each(function (index) {
                //2.
                gcBase.setupThumbImg(gcBase.gcThumbsLi.eq(index), index);

                //3.                            
                gcBase.removeLoader(gcBase.gcThumbsLi.eq(index));
                gcBase.gcThumbsLi.eq(index).find('.gc-li-display-container').removeClass('gc-hide');

                //4.
                if (gcBase.current == index) {
                    gcBase.removeLoader(gcBase.gcDisplayArea);
                    gcBase.gcDisplayContainer.removeClass('gc-hide');
                    gcBase.setupDisplayDisplay();
                    gcBase.setupLens();
                }
            });
            gcBase.update();

            if (!gcBase.config.isOverlayFullImage) {
                gcBase.setupOverlay();
            }
        },
        showDAIcons: function () {
            var gcBase = this;

            if (gcBase.gcTotalThumbsImg > 1) {
                gcBase.gcDisplayPrevious.show();
                gcBase.gcDisplayNext.show();
            }
            if (gcBase.config.isDownloadEnabled == true) { gcBase.gcDisplayDownload.show(); }
        },
        hideDAIcons: function () {
            var gcBase = this;

            if (gcBase.gcTotalThumbsImg > 1) {
                gcBase.gcDisplayPrevious.hide();
                gcBase.gcDisplayNext.hide();
            }
            if (gcBase.config.isDownloadEnabled == true) { gcBase.gcDisplayDownload.hide(); }
        },
        changeThumbs: function (index) {
            var gcBase = this;

            if (gcBase.current != index) {
                gcBase.old = gcBase.current;
                gcBase.current = index;
                gcBase.animateImage();
            }
        },
        initEvents: function () {
            var gcBase = this;
            //Display   
            if (gcBase.config.isZoomEnabled === true) {
                gcBase.isMouseEventsOn = true;
                gcBase.gcDisplayContainer.on('touchstart.glasscase', $.proxy(gcBase.touchstartDC, gcBase))
                                         .on('touchmove.glasscase', $.proxy(gcBase.touchmoveDC, gcBase))
                                         .on('touchend.glasscase', $.proxy(gcBase.touchendDC, gcBase));
                gcBase.gcDisplayContainer.on('mousemove.glasscase', $.proxy(gcBase.mousemoveHandler, gcBase))
                                         .on('mouseenter.glasscase', $.proxy(gcBase.mouseenterHandler, gcBase))
                                         .on('mouseenter.glasscase', $.proxy(gcBase.config.mouseEnterDisplayCB, gcBase))
                                         .on('mouseleave.glasscase', $.proxy(gcBase.mouseleaveHandler, gcBase))
                                         .on('mouseleave.glasscase', $.proxy(gcBase.config.mouseLeaveDisplayCB, gcBase));
            }

            if (gcBase.config.isShowAlwaysIcons != true) {
                gcBase.gcDisplayArea
                    .on('mouseenter.glasscaseDA', $.proxy(gcBase.showDAIcons, gcBase))
                    .on('mouseleave.glasscaseDA', $.proxy(gcBase.hideDAIcons, gcBase))
                    .on('mousemove.glasscaseDA', function (event) {
                        gcBase.showDAIcons();
                        clearTimeout(gcBase.mouseTimer);
                        gcBase.mouseTimer = setTimeout(function () { gcBase.hideDAIcons(); }, gcBase.config.speedHideIcons);
                    })
                    .on('touchmove.glasscaseDA', function (event) {
                        gcBase.showDAIcons();
                        clearTimeout(gcBase.mouseTimer);
                        gcBase.mouseTimer = setTimeout(function () { gcBase.hideDAIcons(); }, gcBase.config.speedHideIcons);
                        event.preventDefault();
                    });
            }

            gcBase.gcDisplayContainer.on('click.glasscase', function (event) {
                gcBase.toggleOverlay();
            });

            gcBase.gcDisplayDownload.on('click.glasscase', function (event) {
                var canvas = document.createElement('canvas');
                canvas.width = gcBase.gcImageData[gcBase.current].width;
                canvas.height = gcBase.gcImageData[gcBase.current].height;
                var context = canvas.getContext('2d');
                context.drawImage(gcBase.gcDisplayDisplay[0], 0, 0);
                var blob = new Blob();
                canvas.toBlob(function (blob) {
                    saveAs(
			                blob
			            , gcBase.gcDisplayDisplay.attr('src').replace(/^.*[\\\/]/, '')
		            );
                }, 'image/png');
            });
            gcBase.gcDisplayPrevious.on('click.glasscase', function (event) {
                gcBase.previousImage();
            });
            gcBase.gcDisplayNext.on('click.glasscase', function (event) {
                gcBase.nextImage();
            });
            //Overlay
            gcBase.gcOverlayPrevious.on('click.glasscase', function (event) {
                gcBase.previousImage();
            });
            gcBase.gcOverlayNext.on('click.glasscase', function (event) {
                gcBase.nextImage();
            });
            gcBase.gcOverlayClose.on('click.glasscase', function (event) {
                gcBase.toggleOverlay();
            });
            gcBase.gcOverlayContainer.on('click.glasscase', function (event) {
                gcBase.toggleOverlay();
            });
            gcBase.gcOverlayDisplay.on('mouseenter.glasscase', function (event) {
                gcBase.gcOverlayContainer.off('click.glasscase');
            });
            gcBase.gcOverlayDisplay.on('mouseleave.glasscase', function (event) {
                gcBase.gcOverlayContainer.on('click.glasscase', function (event) {
                    gcBase.toggleOverlay();
                });
            });
            if (!gcBase.config.isOverlayFullImage) {
                gcBase.gcOverlayDisplay.on('dblclick.glasscase', function (event) {
                    gcBase.toggleOverlayImgSize();
                });
                gcBase.gcOverlayEnlarge.on('click.glasscase', function (event) {
                    gcBase.toggleOverlayImgSize();
                });
                gcBase.gcOverlayCompress.on('click.glasscase', function (event) {
                    gcBase.toggleOverlayImgSize();
                });
            }
            //General
            $(document).on('keydown', function (event) {
                if (gcBase.config.isKeypressEnabled == true) {
                    if (event.keyCode == 37) { //<-
                        gcBase.previousImage();
                    }

                    if (event.keyCode == 39) {//->
                        gcBase.nextImage();
                    }
                }
                if (event.keyCode == 27) { //esc
                    gcBase.fadeOutOverlay();
                }
            });
            $(window).resize(function () {
                clearTimeout(gcBase.resizeTimer);
                gcBase.resizeTimer = setTimeout(function () { gcBase.resizeGC(); }, 100);
            });
            //Thumbs
            gcBase.gcThumbsLi.on('click.glasscase', function (event) {
                var idx = $(this).index(); gcBase.changeThumbs(idx);
            });
            if (gcBase.config.isHoverShowThumbs == true) {
                gcBase.gcThumbsLi.on('mouseenter', function (event) {
                    var idx = $(this).index(); gcBase.changeThumbs(idx);
                });
            }
            gcBase.gcThumbsAreaPrevious.on('click.glasscase', function (event) {
                gcBase.slide('false', 'previous');
            });
            gcBase.gcThumbsAreaNext.on('click.glasscase', function (event) {
                gcBase.slide('false', 'next');
            });
        }
    };

    //4. Attaching the plugin to the $ object
    $.fn.glassCase = function (options) {
        this.each(function () {
            var instance = $.data(this, 'gcglasscase');
            if (!instance) {
                $.data(this, 'gcglasscase', new GlassCase($(this), options));
            }
        });
    };

})(jQuery, window, document);
</script>
<script type="text/javascript">
        $(document).ready( function () {
            //If your <ul> has the id "glasscase"
            $('#glasscase').glassCase({ 'thumbsPosition': 'bottom', 'widthDisplay' : 300});
        });
    </script>

<script>
function checkOffset() {
  var a=$(document).scrollTop()+window.innerHeight;
  var b=$('#footer-start').offset().top;
  if (a<b) {
    $('#social-float').css('border', '0px');
  } else {
    $('#social-float').css('bottom', (10+(a-b))+'px');
  }
}
$(document).ready(checkOffset);
$(document).scroll(checkOffset);

</script>