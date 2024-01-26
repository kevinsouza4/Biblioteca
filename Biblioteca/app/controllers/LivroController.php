<?php
require 'app/models/Livro.php';

class LivroController {
    private $livroModel;

    public function __construct($conn) {
        $this->livroModel = new Livro($conn);
    }

    public function cadastrar() {
        // Lógica para exibir formulário de cadastro de Livro
        include 'app/views/livro/cadastrar.php';
    }

    public function cadastrarProcessar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->livroModel->cadastrarLivro();
        } else {
            // Redirecione para a listagem de livros
            $this->redirect('/livro/listar');
        }
    }

    public function editar($id) {
        // Lógica para exibir o formulário de edição ou processar a edição
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Exibir formulário de edição
            $livro = $this->livroModel->visualizarLivro($id);
            include 'app/views/livro/editar.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Processar a edição
            $this->livroModel->editarLivro($id);
        } else {
            echo "Método não suportado.";
        }
    }

    public function listar() {
        // Lógica para exibir a lista de Livros
        $livros = $this->livroModel->listarLivros();
        include 'app/views/livro/listar.php';
    }

    public function visualizar($id = null) {
        // Se o ID não foi fornecido via URL, verifique se foi enviado via POST
        if ($id === null && isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        // Lógica para exibir detalhes do Livro com base no ID
        $livro = $this->livroModel->visualizarLivro($id);

        // Verificar se o livro foi encontrado
        if ($livro) {
            include 'app/views/livro/visualizar.php';
        } else {
            echo "Livro não encontrado.";
        }
    }

    public function redirect($location) {
        header("Location: $location");
        exit();
    }
}
?>
