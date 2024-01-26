<?php

class Locacao {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function cadastrarLocacao() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtenha os dados do formulário
            $idCliente = trim($_POST['id_cliente']);
            $idLivro = trim($_POST['id_livro']);
            $dataLocacao = trim($_POST['data_locacao']);
    
            // Ajuste do formato da data
            $dataLocacaoFormatada = date('Y-m-d', strtotime($dataLocacao));
    
            $clienteExiste = $this->verificarClienteExistente($idCliente);
            $livroExiste = $this->verificarLivroExistente($idLivro);
    
            if (!$clienteExiste || !$livroExiste) {
                echo "<script> alert('Cliente ou livro não existe!') </script>";
                echo "<script> window.location.href = '/locacao/cadastrar' </script>";
                exit();
            }
    
            // Insira os dados da locação no banco de dados
            $stmt = $this->conn->prepare("INSERT INTO locacoes (id_cliente, id_livro, data_locacao) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $idCliente, $idLivro, $dataLocacaoFormatada);
            $executar = $stmt->execute();
    
            if ($executar) {
                echo "<script> alert('Locação cadastrada com sucesso!') </script>";
                echo "<script> window.location.href = '/locacao/listar' </script>";
            } else {
                echo "<script> alert('Erro ao cadastrar locação!') </script>";
                echo "<script> window.location.href = '/locacao/cadastrar' </script>";
            }
        }
    }
    
    private function verificarClienteExistente($idCliente) {
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->bind_param("s", $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->num_rows > 0;
    }
    
    private function verificarLivroExistente($idLivro) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = ?");
        $stmt->bind_param("s", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->num_rows > 0;
    }
    
    public function editarLocacao($id, $id_cliente, $id_livro, $data_devolucao) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = ?");
        $stmt->bind_param("s", $id_livro);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 0) {
            echo "<script> alert('ID do livro não encontrado!') </script>";
            echo "<script> window.location.href = '/Biblioteca/locacao/listar' </script>";
            return;
        }
    
        $stmt = $this->conn->prepare("UPDATE locacoes SET id_cliente = ?, id_livro = ?, data_devolucao = ? WHERE id = ?");
        $stmt->bind_param("ssss", $id_cliente, $id_livro, $data_devolucao, $id);
        $executar = $stmt->execute();
    
        if ($executar) {
            echo "<script> alert('Locação editada com sucesso!') </script>";
            echo "<script> window.location.href = '/Biblioteca/locacao/listar' </script>";
        } else {
            echo "<script> alert('Erro ao editar locação!') </script>";
            echo "<script> window.location.href = '/Biblioteca/locacao/listar' </script>";
        }
    }
    
    public function listarLocacoes() {
        $sql = "SELECT locacoes.id, clientes.nome AS nome_cliente, livros.titulo AS titulo_livro, locacoes.data_locacao FROM locacoes
                JOIN clientes ON locacoes.id_cliente = clientes.id
                JOIN livros ON locacoes.id_livro = livros.id";
        $result = $this->conn->query($sql);
    
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    
    
    public function visualizarLocacao($id) {
        // Verificar se o ID é válido e numérico
        if (!empty($id) && is_numeric($id)) {
            $id = mysqli_real_escape_string($this->conn, $id);
            
            $sql = "SELECT locacoes.id, clientes.nome AS nome_cliente, livros.titulo AS titulo_livro, locacoes.data_locacao FROM locacoes
                    JOIN clientes ON locacoes.id_cliente = clientes.id
                    JOIN livros ON locacoes.id_livro = livros.id
                    WHERE locacoes.id = $id";
            $result = $this->conn->query($sql);
    
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
?>
