<?php

require_once '../config/conexao.php';

class users {
    private $conn;
    private $table_name = 'pacientes';

    public $nome;
    public $email;
    public $cpf;
    public $data_nascimento;
    public $endereco;  // Use `endereco` sem acento
    public $telefone;
    public $senha;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        // Atualizando a consulta para garantir que os parâmetros estejam corretos
        $query = "INSERT INTO " . $this->table_name . " 
                  (nome, email, cpf, data_nascimento, endereco, telefone, senha) 
                  VALUES (:nome, :email, :cpf, :data_nascimento, :endereco, :telefone, :senha)";

        $stmt = $this->conn->prepare($query);

        // Vinculando parâmetros corretamente
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);  // `endereco` sem acento
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);

        // Executa a consulta
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            // Exibir o erro para depuração
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
}
