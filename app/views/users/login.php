<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row"  style="background-image: url(<?php echo URLROOT; ?>/img/image.jfif);margin-bottom: 200px;margin-top: 80px;" >
  <div>
        <img src="<?php echo URLROOT; ?>/img/index.png" alt="image" style="width: 379px;height: 400px;">
  </div>
    <div class="col-md-6 mx-auto" >
      <div class="card card-body bg-light mt-5" style="margin-bottom: 50px;background-image: url(<?php echo URLROOT; ?>/img/lok.jpg);background-repeat:no-repeat;background-size:100%">
      

        
  <form action="<?php echo URLROOT; ?>/users/login" method="post" class="login-admin d-flex justify-content-center" >
<div class="login ">
<?php flash('register_success'); ?>
            <div class="container-xl">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-12">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form " action="" method="post">
                                <h3 class="text-center text-info">Connexion</h3>
                                <div class="form-group">
                                <label for="email">Adresse e-mail: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password"> Mot de passe: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                </div>
                                <div class="form-group " id="sub">
                                <br>
                                    <input type="submit" name="submit" class="btn btn-secondary " value="Se connecter">
                                    
                                </div>
                                
                            </form>
                            </div>
                          </div>
                        </div>
  
  
  
  
