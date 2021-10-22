<?php
  class Produit {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getProduits(){
      $this->db->query('SELECT * from product');
      //$this pour entre proprite ou ather methode

      $results = $this->db->resultSet();

      return $results;
    }
    public function getCommande(){
      $this->db->query('SELECT * FROM ((checkout INNER JOIN users ON users.id_users = checkout.id_users)INNER JOIN product ON product.id_product = checkout.id_product) ');

      $results = $this->db->resultSet();

      return $results;
    }
    public function ContactMe($data){
      $this->db->query('INSERT INTO contact (sujet, message,id_user)VALUES(:sujet,:message,:id_users)');
      $this->db->bind(':sujet', $data['sujet']);
      $this->db->bind(':message', $data['message']);
      $this->db->bind(':id_users', $data['id_users']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }


    }
    public function message(){
      $this->db->query("SELECT * FROM contact INNER JOIN users ON users.id_users = contact.id_user");

      $result = $this->db->resultSet();
      return $result;
    }
    public function deletemsg($id){
      $this->db->query('DELETE FROM contact WHERE id_contact = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function addProduits($data){
      $this->db->query('INSERT INTO product (prod_name, prod_details, prod_prix, prod_title, img) VALUES(:prod_name, :prod_details, :prod_prix, :prod_title, :img)');
      // Bind values
      $this->db->bind(':prod_name', $data['prod_name']);
      $this->db->bind(':prod_details', $data['prod_details']);
      $this->db->bind(':prod_prix', $data['prod_prix']);
      $this->db->bind(':prod_title', $data['prod_title']);
      $this->db->bind(':img', $data['img']);
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateProduits($data){
      $this->db->query('UPDATE product SET prod_name = :prod_name, prod_details = :prod_details, prod_prix = :prod_prix, prod_title = :prod_title WHERE id_product = :id');
      // Bind values
      $this->db->bind(':id', $data['id_product']);
      $this->db->bind(':prod_name', $data['prod_name']);
      $this->db->bind(':prod_details', $data['prod_details']);
      $this->db->bind(':prod_prix', $data['prod_prix']);
      $this->db->bind(':prod_title', $data['prod_title']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
public function checkout($data){
  $this->db->query('INSERT INTO checkout (id_product,  quantity, id_users) VALUES( :id_product, :quantity, :id_users)');
  $this->db->bind(':id_product', $data['id_product']);
  $this->db->bind(':quantity', $data['quantity']);
  $this->db->bind(':id_users', $data['id_users']);
  
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
    public function getProduitsById($id){
      $this->db->query('SELECT * FROM product WHERE id_product = :id_product');
      $this->db->bind(':id_product', $id);

      $row = $this->db->single();

      return $row;
    }
    public function deletecom($id){
      $this->db->query('DELETE FROM checkout WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

   
    public function deleteProduits($id){
      $this->db->query('DELETE FROM product WHERE id_product = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }