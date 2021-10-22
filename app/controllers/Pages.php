<?php
  class Pages extends Controller {
    public function __construct(){
      //magic method
     
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('produits/store');
      }

      $data = [
        'title' => 'My Product management',
        'description' => 'This is the first page of my product management application'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to manage Product.'
      ];

      $this->view('pages/about', $data);
    }
  }