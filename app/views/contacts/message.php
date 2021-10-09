<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/contacts" class="btn btn-light"><i class="fa fa-backward"></i> Arrière</a>
    <?php 
   
    

    
    
    ?>

<table class="table">
  <tr><th colspan="5"><h3>Message </h3></th></tr>
  <tr>
    <th width="20%">Sujet</th>
    <th width="50%">Message</th>
    <th width="20%">Email</th>
    

    <th width="5%">Action</th>

  </tr>
 <?php
 foreach($data['message']as $key=>$data):
 ?>
  <tr>
    <td><?= $data->sujet?></td>
    <td><?= $data->message?></td>
    <td><?= $data->email?></td>
 
    
    <td>
      
      <button class="btn-danger"><a style="text-decoration:none; color:black; " href="<?php echo URLROOT;?>/contacts/deletmsg/<?= $data->id_contact;?>">Delete</a></button>
    </td>
    <?php endforeach?>
    <td>
    </td>




  </tr>




<tr>
 
</tr>
</table>
</div>
