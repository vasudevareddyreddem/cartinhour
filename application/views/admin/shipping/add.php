 <!--main content start-->  <section id="main-content">    <section class="wrapper">      <div class="row">        <div class="col-lg-12">          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Add Shipping Fee</h3>         <ol class="breadcrumb">            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>            <li><i class="fa fa-users" aria-hidden="true"></i>Shipping Fee</li>           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->          </ol>        </div>      </div>      <div class="row">        <div class="col-lg-12">          <section class="panel">            <header class="panel-heading"> Add Shipping Fee</header>            <div class="panel-body">              <form role="form" action="<?php echo base_url(); ?>admin/shipping/insert" method="post">              <div><?php echo $this->session->flashdata('message');?></div>                <div class="form-group nopaddingRight col-md-6 san-lg">                  <label for="exampleInputEmail1">Product Weight in grams</label>                  <input type="text" name="product_weight" id="product_weight" value="<?php echo set_value('product_weight'); ?>" class="form-control">                      <span style="color:red"> <?php echo form_error('product_weight'); ?> </span>                </div>                <div class="form-group nopaddingRight col-md-6 san-lg">                  <label for="exampleInputEmail1">shipping Fee</label>                  <input type="text" name="shipping_charges" id="shipping_charges" value="<?php echo set_value('shipping_charges'); ?>" class="form-control">                      <span style="color:red"> <?php echo form_error('shipping_charges'); ?> </span>                </div>                               <div class="clearfix"></div>                <button type="submit" class="btn btn-primary">Submit</button>                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/shipping';return false;">Cancel</button>              </form>            </div>          </section>        </div>      </div>      <!-- page start-->       <!-- page end-->     </section>  </section>  <!--main content end--> 