<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
	.ui-datepicker-calendar{
		padding:10px !important;
		width:300px;
		background:#fff;
	}
	tr{
		padding:10px !important;
	
	}td{
		padding:10px !important;
	
	}
	.ui-icon  {
		padding-right:20px !important;
		cursor: pointer;
		margin:10px 0px;
	}
</style>
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Top Offers</h1>
			<small>Active Offers</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Active Offers</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="faq_main">
  	
   <?php if(!empty($catitemdata))  { ?>
    <div class="container" style="width:100%">
	
      <!--<h1 class="head_title">My Listings</h1>-->
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
	 <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq">
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
 <?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
	   <?php  foreach($catitemdata1 as $catitem_data1 )  {  ?> 
		
		 <a id="btn_chang<?php echo $catitem_data1->category_id;?>" onclick="addtabactive(<?php echo $catitem_data1->category_id;?>);addtabactives(<?php echo $catitem_data1->category_id;?>);" href="#gry<?php echo $catitem_data1->category_id;   ?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a>

	<?php } ?>
        <?php  foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              <div class="tab-pane" id="gry<?php echo $catitem_data->category_id; ?>">
              <?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			
			$nospace = str_replace(' ','',$space);
			
			?>
              <div style="padding:10px;" class="panel panel-default mar_t10">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" onclick="sibcategoryproductlist(<?php echo $subcategory->subcategory_id;  ?>);" href="#collapseOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapseOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
		
	<form  id="frm-example<?php echo $subcategory->subcategory_id;?>" name="frm-example<?php echo $subcategory->subcategory_id;?>" action="" method="POST">
		<table id="example<?php echo $subcategory->subcategory_id;  ?>" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                
				
				<th>Item Name</th>
                <th>Item Code</th>
                <th>Item Cost</th>
                <th>Affer Amount</th>
                <th>Offer Type</th>
                <th>Offer expiry Date and Time</th>                
            </tr>
        </thead>
      
             <tbody>
					<?php $k=1; 
					foreach($subcategory->docs12 as $item_data){
					//echo '<pre>';print_r($item_data);exit;	
						
						?>
					<tr>
						
						<td><?php echo $item_data->item_name;?></td>
						<td><?php echo $item_data->item_code;?></td>
						<td><?php echo $item_data->item_cost;?></td>
						<td><?php echo $item_data->offer_amount;?></td>
						<td>
					<?php if($item_data->offer_type=='1' ){echo "Listing Discount";}
        elseif($item_data->offer_type=='2' ){ ?><?php echo "Cart Discount"; ?> <?php } 
        elseif($item_data->offer_type=='3'){ ?><?php echo "Flat Price Offer";  ?> <?php }
        elseif($item_data->offer_type=='4'){ ?><?php echo "Combo Disoucnt";  ?> <?php }
        else{
          echo "NULL";
        } ?>
						</td>
						
						
						<td><?php echo $item_data->offer_expairdate;?>,&nbsp;<?php echo $item_data->offer_time;?></td>

					</tr>
				  <?php $k++; } ?>
				  </tbody>
    </table>

	
                </div>
              </div>
			<?php }?>
              </div>
             
             
              
            </div>
        <!-- container --> 
	   <?php }?>
      </div>
    </div>
   <?php } else {?>
   
   <div class="container">
	
      <h1 class="head_title">Welcome to the Cart In Hour</h1>
   
   </div>
   
   <?php } ?>
  </div>
   
     

  <!--body end here --> 
  
  <script language="JavaScript" type="text/javascript">
  function addtabactives(val)
{
	$("#btn_chang"+val).removeClass("btn-info");
	$("#btn_chang"+val).addClass("btn-primary");
	var cnt;
    var count =<?php echo $cnt;?>;
	//var cnt='';
	for(cnt = 1; cnt <= count; cnt++){
		if(cnt!=val){
			$("#btn_chang"+cnt).removeClass("btn-primary");
			$("#btn_chang"+cnt).addClass("btn-info");
		}             
	}
			

}
function addtabactive(id)
{
	$("#gry"+id).addClass("active");
	var cnt;
    var nt =<?php echo $cnt;?>;
	//var cnt='';
	for(cnt = 1; cnt <= nt; cnt++){
		if(cnt!=id){
			$("#gry"+cnt).removeClass("active");
		}             
	}
			
}

function checkDelete(id)
{
  
return confirm('Are you sure want to delete "'+id +'" product?');
}
</script>
</section>
  </div> 
  </div>