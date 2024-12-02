<?php

require_once '../config/conexao.php';

class Users {
    private $conn;
    private $table_name = 'usuarios';

    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $endereco;
    public $senha;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, cpf, endereco,senha) 
                  VALUES (:nome, :email, :cpf, :endereco, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':endereco', $this->endereco);
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna um array de registros
    }
    

    public function getUserById($id) {
        $query = "SELECT nome, email, cpf, endereco FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteById($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
    public function update() {
        try {
            $query = "UPDATE " . $this->table_name . " 
                      SET nome = :nome, email = :email, cpf = :cpf, endereco = :endereco, senha = :senha
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
            $stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
            
    
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erro no banco de dados: " . $e->getMessage());
        }
    }
    
    
    

  

  
    
}
