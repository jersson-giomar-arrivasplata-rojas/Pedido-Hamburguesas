<?php
class users{

public $user;
public $password;

public function getUser(){
 return $this->user;
}
public function setUser($user){
 $this->user=$user;
}
public function getPassword(){
    return $this->password;
}
public function setPassword($password){
    $this->password=$password;
}
}

?>