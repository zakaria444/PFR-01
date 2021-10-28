<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row"  style="background-image: url(<?php echo URLROOT; ?>/img/images.jfif);margin-bottom: 200px;margin-top: 80px;" >
    <div class="col-md-6 mx-5" >
      <div class="card card-body bg-light mt-5" style="margin-bottom: 50px;">
        <?php flash('register_success'); ?>
        <h2>Connexion</h2>
        <p>Veuillez renseigner vos identifiants pour vous connecter</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label for="email">Adresse e-mail: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">Pas de compte? S'inscrire</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
  
