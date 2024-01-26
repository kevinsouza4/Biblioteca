<?php

class Cliente {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrarCliente() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome']);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $verificaEmail = $stmt->get_result()->num_rows;

            if ($verificaEmail > 0) {
                $erro[] = "Email já cadastrado";
            }

            if (empty($erro)) {
                $stmt = $this->conn->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
                $stmt->bind_param("ss", $nome, $email);
                $executar = $stmt->execute();

                if ($executar) {
                    echo "<script> alert('Cliente cadastrado com sucesso!') </script>";
                    echo "<script> window.location.href = 'index.php' </script>";
                } else {
                    echo "<script> alert('Erro ao cadastrar cliente!') </script>";
                    echo "<script> window.location.href = 'index.php' </script>";
                }
            } else {
                foreach ($erro as $erro) {
                    echo "<li> $erro </li>";
                }
            }
        }
    }
    
    public function editarCliente($id, $novoNome, $novoEmail) {
        // Verificar se o ID existe
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            echo "<script> alert('ID não encontrado!') </script>";
            echo "<script> window.location.href = '/Biblioteca/cliente/listar' </script>";
            return;
        }
    
        $stmt = $this->conn->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $novoNome, $novoEmail, $id);
        $executar = $stmt->execute();
    
        if ($executar) {
            echo "<script> alert('Cliente editado com sucesso!') </script>";
            echo "<script> window.location.href = '/Biblioteca/cliente/listar' </script>";
        } else {
            echo "<script> alert('Erro ao editar cliente!') </script>";
            echo "<script> window.location.href = '/Biblioteca/cliente/listar' </script>";
        }
    }
    
    public function listarClientes() {
        $sql = "SELECT * FROM clientes";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function visualizarCliente($id) {
        // Verificar se o ID é válido e numérico
        if (!empty($id) && is_numeric($id)) {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        } else {
            return false; // ID inválido
        }
    }
}