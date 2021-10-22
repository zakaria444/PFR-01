<?php
  class Produits extends Controller {
    public function __construct(){
      //magic method
      if(!isLoggedIn()){
        redirect('users/login');
      }
      //instantion 
      $this->produitModel = $this->model('Produit');//load tout les function dans model: retine new 
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get posts
      $contacts = $this->produitModel->getProduits();

      $data = [
        'product' => $contacts
      ];

      $this->view('produits/index', $data);
    }
    public function store(){
      
        // Get posts
        $contacts = $this->produitModel->getProduits();
  
        $data = [
          'product' => $contacts
        ];
  
        $this->view('product/store', $data);
      }

    


    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $image_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']) );
        // Insert record
        


        $data = [
          
          'prod_name' => trim($_POST['prod_name']),
          'prod_details' => trim($_POST['prod_details']),
          'prod_prix' => trim($_POST['prod_prix']),
          'prod_title' => $_POST['prod_title'],
          'user_id' => $_SESSION['user_id'],
          'prod_name_err' => '',
          'prod_details_err' => '',
          'prod_title_err' => '',
          'prod_prix_err' => '',
          'img' => $image_base64
        ];

        // Validate data
        if(empty($data['prod_name'])){
          $data['prod_name_err'] = 'Please enter name';
        }
        if(empty($data['prod_details'])){
          $data['prod_details_err'] = 'Please enter details text';
        }
        if(empty($data['prod_prix'])){
          $data['prod_prix_err'] = 'Please enter number text';
        }
        if(empty($data['prod_title'])){
          $data['prod_title_err'] = 'Please enter title text';
        }
        

        // Make sure no errors
        if(empty($data['prod_name_err']) && empty($data['prod_details_err'])&& empty($data['prod_prix_err'])&& empty($data['prod_title_err'])){
          // Validated
          if($this->produitModel->addProduits($data)){
            flash('contact_message', 'Product Added');
            redirect('Produits');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('produits/add', $data);
        }

      } else {
        $data = [
          'prod_name' => '',
          'prod_details' => '',
          'prod_prix' => '',
          'prod_title' => '',
        ];
  
        $this->view('produits/add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id_product' => $id,
          'prod_name' => trim($_POST['prod_name']),
          'prod_details' => trim($_POST['prod_details']),
          'prod_prix' => $_POST['prod_prix'],
          'prod_title' => trim($_POST['prod_title']),
          'user_id' => $_SESSION['user_id'],
          'prod_name_err' => '',
          'prod_details_err' => '',
          'prod_prix_err' => '',
          'prod_title_err' => ''
        ];

        // Validate data
        if(empty($data['prod_name'])){
          $data['prod_name_err'] = 'Please enter Prod Name';
        }
        if(empty($data['prod_details'])){
          $data['prod_details_err'] = 'Please enter Prod Details';

        }
        if(empty($data['prod_prix'])){
          $data['prod_prix_err'] = 'Please enter  Prod Prix';
        }
        if(empty($data['prod_title'])){
          $data['prod_title_err'] = 'Please enter Prod Title';
        }

        // Make sure no errors
        if(empty($data['prod_name_err']) && empty($data['prod_details_err']) && empty($data['prod_prix_err'])&& empty($data['prod_title_err'])){
          // Validated
          if($this->produitModel->updateProduits($data)){
            flash('contact_message', 'Product Updated');
            redirect('produits');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('produits/edit', $data);
        }

      } else {
        // Get existing post from model
        $contact = $this->produitModel->getProduitsById($id);

        // Check for owner
        // if($contact->user_id != $_SESSION['user_id']){
        //   redirect('contacts');
        // }

        $data = [
          'id' => $id,
          'prod_name' => $contact->prod_name,
          'prod_details' => $contact->prod_details,
          'prod_prix' => $contact->prod_prix,
          'prod_title' => $contact->prod_title
        ];
  
        $this->view('produits/edit', $data);
      }
    }

    public function show($id){
      $contact = $this->produitModel->getProduitsById($id);
      $user = $this->userModel->getUserById($contact->id_product);

      $data = [
        'product' => $contact,
        'user' => $user
      ];

      $this->view('produits/show', $data);
    }
    
    public function showproduct($id){
      $contact = $this->produitModel->getProduitsById($id);
      $user = $this->userModel->getUserById($contact->id_product);

      $data = [
        'product' => $contact,
        'user' => $user
      ];

      $this->view('product/showproduct', $data);

    }


    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
       
        
        // Check for owner
        

        if($this->produitModel->deleteProduits($id)){
          flash('contact_message', 'Product Removed');
          redirect('produits');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('produits');
      }
    }
    public function remove($id){
    //   $array = $_SESSION['shopping_cart'];

    //  $key = array_search($id, array_column($array , 'id'));
    // var_dump($key);
    //   unset($_SESSION['shopping_cart'][$key]);
    //   redirect('contacts/store');

    if(!empty($_SESSION["shopping_cart"])) {
      foreach($_SESSION["shopping_cart"] as $key => $product) {
      if($id == $product['id']){
        //remove product from the shopping cart when it matches with the GET  id
      unset($_SESSION["shopping_cart"][$key]);
      flash('contact_message', 'Remove product cart');
      redirect('produits/store');
    }
  }
}

    }
    public function checkout(){
      foreach($_SESSION["shopping_cart"] as $key => $product){
        
      $data=[

      'id_product' => trim( $product['id']),
      'quantity' => trim( $product['quantity']),
      'id_users' => trim($_SESSION['user_id']),

      ];
   
      if($this->produitModel->checkout($data)){
        flash('contact_message', 'thnx for order');
        redirect('produits/store');
      } else {
        die('Something went wrong');
      
    } }


      // var_dump($_SESSION);
    }
    public function commande(){
      

      $contacts = $this->produitModel->getCommande();
      
  
        $data = [
          'product' => $contacts
        ];
  
        $this->view('produits/commande', $data);

    }
    public function contactme(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      $data = [
        'sujet'=>trim($_POST['sujet']),
        'message'=>trim($_POST['message']),
        'id_users' => trim($_SESSION['user_id']),
        'sujet_err' => '',
        'message_err' => '',
      ];
      if(empty($data['sujet'])){
        $data['sujet_err'] = 'Please enter sujet';
      }
      if(empty($data['message'])){
        $data['message_err'] = 'Please enter message text';
      }

      if(empty($data['sujet_err']) && empty($data['message_err'])){
        if($this->produitModel->ContactMe($data)){
          flash('contact_message', 'Mesage Added');
          redirect('product/contact');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('product/contact', $data);
      }

      }
      

      $this->view('product/contact');

    }
    public function message(){
      $message = $this->produitModel->message();

      $data =[
        'message'=>$message
      ];
      $this->view('produits/message',$data);
    }
    public function deletmsg($id){
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // Get existing post from model
        
        // Check for owner
        
  
        if($this->produitModel->deletemsg($id)){
          flash('contact_message', 'Message Removed');
          redirect('produits/message');
        } else {
          die('Something went wrong');
        }
      } else {
        die("something is off");
        redirect('produits/message');
      }
      
      
    }
  public function deletcom($id){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
      // Get existing post from model
      
      // Check for owner
      

      if($this->produitModel->deletecom($id)){
        flash('contact_message', 'Commande Removed');
        redirect('produits/commande');
      } else {
        die('Something went wrong');
      }
    } else {
      die("something is off");
      redirect('produits/commande');
    }
    
    
  }
  public function addtocart($product){
    $prodducy_ids=array();
    //chek if add to cart button has been submit 
    if(filter_input(INPUT_POST, 'add-to-cart')){
      if(isset($_SESSION['shopping_cart'])){
        //keep track how mnay product are in the shopping cart 
        $count =count($_SESSION['shopping_cart']);

        
        //create sequantial array for matching array keys to products id's
        $prod_ids =array_column($_SESSION['shopping_cart'],$product);
        if(!in_array($_SESSION['shopping_cart'] , $prod_ids )){
          var_dump($product);
          $_SESSION['shopping_cart'][$count]=array
        (
          'id'=>($product),
          'name'=>filter_input(INPUT_POST,'prod_name'),
          'prix'=>filter_input(INPUT_POST,'prod_prix'),
          'quantity'=>filter_input(INPUT_POST,'quantity')



        );

        }
        else{
          for ($i = 0 ; $i < count($prod_ids);$i++){
            if($prod_ids[$i] == $product ){
              $_SESSION['shopping_cart'][$i]+= filter_input(INPUT_POST,'quantity');
            }

          }
        }




      }else
      {//if shopping cart dosen't exite crate first product with array key 0
        
        $_SESSION['shopping_cart'][0]=array
        
        (
          'id'=>($product),
          'name'=>filter_input(INPUT_POST,'prod_name'),
          'prix'=>filter_input(INPUT_POST,'prod_prix'),
          'quantity'=>filter_input(INPUT_POST,'quantity'),





        );

      }
    }
    flash('contact_message', 'Add to cart');
    redirect('Produits/store');
echo "<pre>" ;
 var_dump($_SESSION);
 echo "</pre>";
// $this->view('product/store', $_SESSION); 
 }}
