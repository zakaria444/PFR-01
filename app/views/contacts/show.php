<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/contacts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<div class="show-prod d-flex" style="margin-top: 45px;">
<img  style=" margin:30px;border:solid 1px;  border-radius:10px;padding: 20px;box-shadow: 10px 5px 5px #464848;"  src="data:image/png;base64,<?php echo $data['product']->img; ?>">
<div class="show-title "  style="margin-left: 30px;display: flex;flex-direction: column;justify-content: space-around;">
<h4><?php echo $data['product']->prod_name; ?></h4>
<h4><?php echo $data['product']->prod_details; ?></h4>
<h4><?php echo $data['product']->prod_title; ?></h4>
<h4 style="border:0.5px solid; width: 20%;background-color: #FFF5EB;text-align: center;"><?php echo $data['product']->prod_prix; ?>DH</h4>

</div>
</div>





  <hr>
  <a href="<?php echo URLROOT; ?>/contacts/edit/<?php echo $data['product']->id_product; ?>" class="btn btn-dark">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/contacts/delete/<?php echo $data['product']->id_product; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>


