<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('contact_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Produit</h1>
    
  </div>
  
  
  <div class="col-md-6" >
    <a href="<?php echo URLROOT; ?>/contacts/add" style="margin: 5px;"  class="btn btn-primary pull-right">
      <i class="fa fa-pencil " ></i> Ajouter un produit
    </a>
    <a href="<?php echo URLROOT; ?>/contacts/commande" style="margin: 5px;" class="btn btn-primary pull-right">
      <i class="fa fa-pencil " ></i> Voir demande
    </a>
    <a href="<?php echo URLROOT; ?>/contacts/message" style="margin: 5px;" class="btn btn-primary pull-right">
      <i class="fa fa-pencil " ></i> Voir messages
    </a>
    
  </div>
 
</div>

<div class="container mt-2" >
  
  <div id="categorie" class="row" >
     <?php foreach ($data['product'] as $contact) : ?>
    <div  style="width:100%"  class="col-md-3 col-sm-6 item">
      <div style="width:100%; margin:30px;border:solid 1px;  border-radius:10px;padding: 20px;box-shadow: 10px 5px 5px #464848;"  class="card item-card card-block">
   
    <div ><img src="data:image/png;base64,<?php echo $contact->img; ?> "  style="margin-top: 30px;width: 60%; margin-left: 30px; border: 1px solid #dfe8ec; "></div>  
      <h4 class="card-title" style="margin-top: 30px;margin-left: 30px;font-size:20px;    color: #7b9c36;"   ><?php echo $contact->prod_name; ?></h4>
      <h4 style="width: 60%;background-color: #FFF5EB;text-align: center; margin-left: 30px;margin-top: 30px;font-size: 23px;font-family: 'FuturaMediumMedium';"><?php echo $contact->prod_prix; ?>DH</h4>
       
        <a href="<?php echo URLROOT; ?>/contacts/show/<?php echo $contact->id_product; ?>" class="btn btn-dark">Suite</a>
  </div>
    </div>
    
   

<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
  </div>
  



