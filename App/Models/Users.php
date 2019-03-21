<?php
namespace VS\App\Models;
use VS\Core\Model;
/*
  --
  -- Структура на таблица `users`
  --
    CREATE TABLE `users` (
        `id` int(10) NOT NULL PRIMARY KEY,
        `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `name` varchar(255) NOT NULL,
        `email` varchar(100) NOT NULL,
        `fullname` varchar(100) NOT NULL,
        `password` varchar(100) NOT NULL,
        `role` int(10) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

class Users extends Model{

	public function getAll(){
    $sql = "SELECT * FROM users";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function get($id){
    $sql = "SELECT * FROM users WHERE id=$id";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function create($name, $email, $fullname, $password, $role){
    $sql = "INSERT INTO users (name, email, fullnamebg, fullnameen, password, role) VALUES (:name, :email, :fullname,
       :password, :role)";
    $query = $this->db->prepare($sql);
    $query->execute(array(  ':name'     => $name,
                            ':email'    => $email,
                            ':fullname' => $fullname,
                            ':password' => $password,
                            ':role'     => $role
                        ));
  }

  public function delete($id){
    $sql = "DELETE FROM users WHERE id=$id;";
    $query = $this->db->prepare($sql);
    $query->execute();
    return true;
  }

/**
 *   Метод за проверка на вход / login на потребител
 *   Получава име и парола и ги проверява в базата
 *   Ако има съвпадение, задава сесийна променлива с ID на потребител
 *   и връща TRUE
 *
 *   @param string $username
 *   @param string $password
 *   @return bool
 */
  public function verify($username, $password){
      $users = $this->Users->getAll();
      foreach ($users as $user){
          if($user['name'] === $username && password_verify($password, $user['password'])){
              return true;
          }
      }
      return false;
  }

}
