<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row" >
  <div>
        <img src="<?php echo URLROOT; ?>/img/index.png" alt="image" style="
    width: 474px;
    height: 400px;
">
        </div>
    <div class="col-md-6 mx-5">
      <div class="card card-body bg-light mt-5" style="margin-bottom: 50px;background-image: url(<?php echo URLROOT; ?>/img/lok.jpg);background-repeat:no-repeat;background-size:170%">
        <h2>CRÉEZ VOTRE COMPTE</h2>
        <p>Veuillez remplir ce formulaire pour vous inscrire</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="name">Nom: <sup>*</sup></label>
            <input type="text" name="name_user" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php  ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
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
          <div class="form-group">
            <label for="ADRESS">Adresse : <sup>*</sup></label>
            <input type="text" name="ADRESS" class="form-control form-control-lg <?php echo (!empty($data['ADRESS_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['ADRESS']; ?>">
            <span class="invalid-feedback"><?php  echo $data['ADRESS_err'];   ?></span>
          </div>
          <div class="form-group">
            <label for="num">téléphone : <sup>*</sup></label>
            <input type="number" name="num" class="form-control form-control-lg <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['num']; ?>">
            <span class="invalid-feedback"><?php echo $data['num_err'];   ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="S'inscrire" class="btn  btn-block">
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>