<?php $this->load->helper('msg_helper');


?>
 <div class="right_col" role="main">

      <div class="">

        <!--<div class="page-title">

          <div class="title_right pull-right">

            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

            <form role="form" action="<?php //echo base_url(); ?>admin/orders/search" method="post">

              <div class="input-group">

                <input type="text" name="search" class="form-control" placeholder="Search for...">

                <span class="input-group-btn">

                <button class="btn btn-default" type="submit">Go!</button>

                </span>

                </div>
                </form>

            </div>

          </div>

        </div>-->

        <div class="clearfix"></div>

        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">

            <div class="x_panel">

              <div class="x_title">

                <h2>Categories</h2>

                              <a href="<?= base_url("admin/categories/add_category");?>"><div class="btn btn-primary pull-right">Add Categories</div></a>

                <!--<ul class="nav navbar-right panel_toolbox">

                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>

                  <li><a class="close-link"><i class="fa fa-close"></i></a> </li>

                </ul>-->

                <div class="clearfix"></div>

              </div>
              
           <div><?php echo $this->session->flashdata('message');?></div>

              <div class="x_content table-responsive">

                <table class="table table-bordered">

                 <thead>
          <tr>
            <th>S.No</th>
             <th>Category</th>
            <th>Sub-Category</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>

                  <tbody>
        <?php
		$count = $this->uri->segment(4, 0);
		 foreach ($category as $categories): ?>
         <tr>
            <td><?= ++$count ?></td>
            <td><a href="#" class="catg_name" id="<?php echo $categories->category_id; ?>" ><?php echo $categories->category_name; ?></a></td>
            <td><a href="#" class="sub_catg_name" data-type="text" data-placement="right" data-title="Enter sub Category" id="<?php echo $categories->category_id; ?>" ><?php echo $categories->sub_cat_name; ?></a></td>
            <td><a href="<?= base_url("admin/categories/category_edit/$categories->sub_cat_id") ?>">  <i class="fa fa-edit" style="font-size:18px"></i></a></td>

            <td> <a href="<?= base_url("admin/categories/category_delete/$categories->sub_cat_id")?>" Onclick="return checkDelete();" type="submit" name="actiondelete" value="1"><i class="fa fa-trash" style="font-size:18px"></i></a>


</td>


          </tr>
          <?php endforeach; ?>
        </tbody>

               

                </table>

              </div>

            </div>

          </div>



          <div class="clearfix"></div>

        </div>

      </div>

    </div>

  <script>

  function checkDelete(id)

{

  

return confirm('Are you sure want to delete this category ?');

}

</script>