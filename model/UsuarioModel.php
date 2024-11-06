<?php

require_once '../config/conexao.php';

class Users {
    private $conn;
    private $table_name = 'usuarios';

    public $nome;
    public $email;
    public $cpf;
    public $data_nascimento;
    public $endereco;
    public $telefone;
    public $senha;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, cpf, data_nascimento, endereco, telefone, senha) 
                  VALUES (:nome, :email, :cpf, :data_nascimento, :endereco, :telefone, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':senha', $this->senha);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao salvar: " . $e->getMessage();
            return false;
        }
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT nome, email, cpf, data_nascimento, endereco, telefone FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, cpf, data_nascimento, endereco, telefone, senha) 
        VALUES (:nome, :email, :cpf, :data_nascimento, :endereco, :telefone, :senha)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        

        return $stmt->execute();
    }

    public function deleteByName() {
        $query = "DELETE FROM " . $this->table_name . " WHERE nome = :nome";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);

        return $stmt->execute();
    }
    

  
    
}
