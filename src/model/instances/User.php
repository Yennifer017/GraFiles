<?php

class User {

    const ADMIN_ROL = "ADMIN";
    const EMPLEADO_ROL = "EMPLEADO";

    
    private $username;
    private $rol;
    private $password;
    private $name;
    private $lastname;
    private $email;

    public function __construct(
            $username = '', 
            $rol = '', 
            $password = '', 
            $name = '', 
            $lastname = '', 
            $email = ''
        ) {
        $this->username = $username;
        $this->rol = $rol;
        $this->password = $password;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    // Getters
    public function getUsername() {
        return $this->username;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

?>
