  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Sellers</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/sellers/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Sellers</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Sellers</h3>
            </header>
            <div class="panel-body">   <!--<a href="<?php //echo base_url(); ?>admin/sellers/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Seller</button></a>-->
                    <div class="clearfix"></div>
                    <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">      
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>S.NO</th>
                       <th>Shop Name</th>
                         <th>seller Name</th>
                       <th>Address</th>
                       <th>View</th>

                    
                    <!--  <th>seller Email</th>
                      <th>Phone Number</th>
                      <th>License Number</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Edit</th>-->
					  <th>Products View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($sellerdata)): ?>
                  <tbody>
                     <?php $count = $this->uri->segment(4, 0);

   foreach($sellerdata as $seller_data){?>

    <tr>

      <td><?= ++$count ?></td>

      <td><?php  echo $seller_data->seller_shop; ?></td>
      <td><?php  echo $seller_data->seller_name; ?></td>

      <td><?php  echo $seller_data->seller_address; ?></td>

   

        <td><a href="<?php echo base_url(); ?>admin/sellers/view_details/<?php  echo $seller_data->seller_id; ?>"><i class="fa fa-eye" style="font-size:18px"></i></a></td>     

 <!--<td><a href="<?php //echo base_url(); ?>admin/sellers/edit/<?php  //echo $seller_data->seller_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>-->
      
	    <td><a href="<?php echo base_url(); ?>admin/sellers/products_view/<?php  echo $seller_data->seller_id; ?>"><i class="fa fa-eye" style="font-size:18px"></i></a></td>
	 
      <td><a href="<?php echo base_url(); ?>admin/sellers/delete/<?php  echo $seller_data->seller_id; ?>" onclick="return checkDelete('<?php  echo $seller_data->seller_name; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>


    </tr>

    <?php  } ?>

                  </tbody>
                   <?php else: ?>
              <center>
                <strong>No Records Found</strong>
              </center>

              <?php endif; ?>
                </table>
                 <center><?= $this->pagination->create_links(); ?></center>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" Seller?');
}

</script>



     