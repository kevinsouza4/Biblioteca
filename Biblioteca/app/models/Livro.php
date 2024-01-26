<?php
class Livro {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrarLivro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $autor = trim($_POST['autor']);
            $anoPublicacao = $_POST['ano_publicacao'];

            $stmt = $this->conn->prepare("INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $titulo, $autor, $anoPublicacao); 
            $executar = $stmt->execute();


            if ($executar) {
                echo "<script> alert('Livro cadastrado com sucesso!'); </script>";
            } else {
                echo "<script> alert('Erro ao cadastrar livro!'); </script>";
            }
        }
    }

    public function editarLivro($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['novo_titulo']);
            $autor = trim($_POST['novo_autor']);
            $anoPublicacao = $_POST['novo_ano_publicacao'];

            $stmt = $this->conn->prepare("UPDATE livros SET titulo = ?, autor = ?, ano_publicacao = ? WHERE id = ?");
            $stmt->bind_param("ssii", $titulo, $autor, $anoPublicacao, $id); 
            $executar = $stmt->execute();

            if ($executar) {
                echo "<script> alert('Livro editado com sucesso!'); </script>";
                echo "<script> window.location.href = 'index.php' </script>";
            } else {
                echo "<script> alert('Erro ao editar livro!'); </script>";
                echo "<script> window.location.href = 'index.php' </script>";
            }
        }
    }

    public function visualizarLivro($id) {
        // Verificar se o ID é válido e numérico
        if (!empty($id) && is_numeric($id)) {
            $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = ?");
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

    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
}