<?php
class UsuarioModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function verificarUsuario($email) {
        $query = "SELECT * FROM pacientes WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
    
        // Verifique se o prepare() foi bem-sucedido
        if ($stmt === false) {
            die('Erro na preparação da consulta SQL: ' . $this->conn->error);
        }
    
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result();
    }
    

    public function registrarUsuario($email, $hashed_password) {
        $query = "INSERT INTO pacientes (email, senha) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $hashed_password);
        return $stmt->execute();
    }

    public function cadastrarUsuario($nome, $email, $cpf, $data_nascimento, $endereco, $telefone, $hashed_password) {
        $query = "INSERT INTO pacientes (nome, email, cpf, data_nascimento, endereco, telefone, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssss", $nome, $email, $cpf, $data_nascimento, $endereco, $telefone, $hashed_password);
        return $stmt->execute();
    }

   
}



?>
