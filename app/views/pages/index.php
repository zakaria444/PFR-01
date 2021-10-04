<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud text-center" style="height: 540px;">
     <script>
	var i = 0; // Start point
	var images = [];
	var time = 3000;

	// Image List
	images[0] = '<?php echo URLROOT; ?>../public/img/90.jpg';
	images[1] = '<?php echo URLROOT; ?>../public/img/91.jpg';
	images[2] = '<?php echo URLROOT; ?>/img/92.jpg';
	images[3] = '<?php echo URLROOT; ?>/img/93.jpg';
  images[4] = '<?php echo URLROOT; ?>/img/94.jpg';
  images[5] = '<?php echo URLROOT; ?>/img/95.jpg';

	// Change Image
	function changeImg(){
		document.slide.src = images[i];
    

		if(i < images.length - 1){
			i++;
		} else {
			i = 0;
		}

		setTimeout("changeImg()", time);
	}

	window.onload = changeImg;

</script>
    
 

<img name="slide" width="1000" height="450">
   
    </div>
  </div> 

<div style="margin-bottom: 15px; margin-left: 125px;">
  <img src='<?php echo URLROOT; ?>/img/top.png'/>
</div>
  <div class="row" style="display: flex; justify-content: center;margin-right:0px;">
  <div class=" w-40 col-2" >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="    background-color:#FDFCE5;">
    <img src="<?php echo URLROOT; ?>/img/96.jpg" style="margin-top: 30px;width: 60%; margin-left: 30px; border: 1px solid #dfe8ec;" >
      <h4 class="card-title" style="margin-top: 30px;margin-left: 30px;font-size:13px;    color: #7b9c36;"  > LATTAFA OUD MOOD 100ML</h4>
     
      <h4 style=" width: 60%;background-color: #FFF5EB;text-align: center; margin-left: 30px;margin-top: 30px;font-size: 23px;font-family: 'FuturaMediumMedium';">199 Dhs</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">aller au magasin</a>
    </div>
    
  </div>
  <div class=" w-40 col-2" >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="    background-color:#FDFCE5;">
    <img src="<?php echo URLROOT; ?>/img/97.jpg" style="margin-top: 30px;width: 60%; margin-left: 30px; border: 1px solid #dfe8ec;" >
      <h4 class="card-title" style="margin-top: 30px;margin-left: 30px;font-size:13px;    color: #7b9c36;"  > NUXE COFFRET PRODIGIEUX FLORALE</h4>
     
      <h4 style=" width: 60%;background-color: #FFF5EB;text-align: center; margin-left: 30px;margin-top: 30px;font-size: 23px;font-family: 'FuturaMediumMedium';">525 Dhs</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">aller au magasin</a>
    </div>
    
  </div>
  <div class=" w-40 col-2" >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="    background-color:#FDFCE5;">
    <img src="<?php echo URLROOT; ?>/img/98.jpg" style="margin-top: 30px;width: 60%; margin-left: 30px; border: 1px solid #dfe8ec;" >
      <h4 class="card-title" style="margin-top: 30px;margin-left: 30px;font-size:13px;    color: #7b9c36;"  > PINGO COUCHES ÉCOLOGIQUES...</h4>
     
      <h4 style=" width: 60%;background-color: #FFF5EB;text-align: center; margin-left: 30px;margin-top: 30px;font-size: 23px;font-family: 'FuturaMediumMedium';">75 Dhs</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">aller au magasin</a>
    </div>
    
  </div>
  <div class=" w-40 col-2" >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="    background-color:#FDFCE5;">
    <img src="<?php echo URLROOT; ?>/img/99.jpg" style="margin-top: 30px;width: 60%; margin-left: 30px; border: 1px solid #dfe8ec;" >
      <h4 class="card-title" style="margin-top: 30px;margin-left: 30px;font-size:13px;    color: #7b9c36;"  > DAYLONG EXTREME SPF 50+...</h4>
     
      <h4 style=" width: 60%;background-color: #FFF5EB;text-align: center; margin-left: 30px;margin-top: 30px;font-size: 23px;font-family: 'FuturaMediumMedium';">205 Dhs</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">aller au magasin</a>
    </div>
    
  </div>
  <div class=" w-40 col-2" >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="    background-color:#FDFCE5;">
    <img src="<?php echo URLROOT; ?>/img/100.jpg" style="margin-top: 30px;width: 60%; margin-left: 30px; border: 1px solid #dfe8ec;" >
      <h4 class="card-title" style="margin-top: 30px;margin-left: 30px;font-size:13px;    color: #7b9c36;"  > SVR DENSITIUM CRÈME 50ML +...</h4>
     
      <h4 style=" width: 60%;background-color: #FFF5EB;text-align: center; margin-left: 30px;margin-top: 30px;font-size: 23px;font-family: 'FuturaMediumMedium';">333 Dhs</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">aller au magasin</a>
    </div>
    
  </div>
  <div style="margin-bottom: 50px; margin-left: 125px;margin-top: 50px;">
  <img src='<?php echo URLROOT; ?>/img/lesvantages.jpg'/>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
