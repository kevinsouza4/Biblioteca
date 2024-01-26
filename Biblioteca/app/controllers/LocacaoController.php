<?php
require 'app/models/Locacao.php';

class LocacaoController {
    private $locacaoModel;

    public function __construct($conn) {
        $this->locacaoModel = new Locacao($conn);
    }

    public function cadastrar() {
        // Lógica para exibir formulário de cadastro de Locação
        include 'app/views/locacao/cadastrar.php';
    }

    public function cadastrarProcessar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->locacaoModel->cadastrarLocacao();
        } else {
            // Redirecione para a listagem de locações
            $this->redirect('/locacao/listar');
        }
    }

    public function editar($id) {
        // Lógica para exibir o formulário de edição ou processar a edição
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Exibir formulário de edição
            $locacao = $this->locacaoModel->visualizarLocacao($id);
            include 'app/views/locacao/editar.php';
        }
         elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Processar a edição
            $idCliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null;
            $idLivro = isset($_POST['id_livro']) ? $_POST['id_livro'] : null;
            $dataLocacao = isset($_POST['data_locacao']) ? $_POST['data_locacao'] : null;
    
            $this->locacaoModel->editarLocacao($id, $idCliente, $idLivro, $dataLocacao);
        } else {
            echo "Método não suportado.";
        }
    }

    public function listar() {
        // Lógica para exibir a lista de Locações
        $locacoes = $this->locacaoModel->listarLocacoes();
        include 'app/views/locacao/listar.php';
    }

    public function visualizar($id = null) {
        // Se o ID não foi fornecido via URL, verifique se foi enviado via POST
        if ($id === null && isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        // Lógica para exibir detalhes da Locação com base no ID
        $locacao = $this->locacaoModel->visualizarLocacao($id);

        // Verificar se a locação foi encontrada
        if ($locacao) {
            include 'app/views/locacao/visualizar.php';
        } else {
            echo "Locação não encontrada.";
        }
    }
}
?>
