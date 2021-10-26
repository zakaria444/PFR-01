<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name_user' => trim($_POST['name_user']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'ADRESS' => trim($_POST['ADRESS']),
          'num' => trim($_POST['num']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'ADRESS_err' => '',
          'num_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Veuillez saisir l e-mail';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Cet email est déjà pris';
          }
        }

        // Validate Name
        if(empty($data['name_user'])){
          $data['name_err'] = 'Veuillez entrer le nom';
        }
        // Validate num
        if(empty($data['num'])){
          $data['num_err'] = 'Veuillez entrer Num';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Veuillez entrer le mot de passe';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Le mot de passe doit être au moins de 6 caractères';
        }

        // Validate Confirm Password
        if(empty($data['ADRESS'])){
          $data['ADRESS_err'] = 'S il vous plaît ADRESSE';
        
        }
       
        

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['ADRESS_err']) && empty($data['num_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('register_success', 'Vous êtes inscrit et pouvez vous connecter');
            redirect('users/login');
          } else {
            die('Quelque chose s est mal passé');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'ADRESS' => '',
          'num' =>'',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'ADRESS_err' => '',
          'num_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Veuillez saisir l e-mail';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Veuillez entrer le mot de passe';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'Aucun utilisateur trouvé';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            
            $data['password_err'] = 'Mot de passe incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id_users;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name_user;
      if($user->role_id==1){
      redirect('produits/store');
    }else{
      redirect('produits');
    }
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }
  }