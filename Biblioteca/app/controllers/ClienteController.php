<?php
require 'app/models/Cliente.php';

class ClienteController {
    private $clienteModel;

    public function __construct($conn) {
        $this->clienteModel = new Cliente($conn);
    }

    public function cadastrar() {
        // Lógica para exibir formulário de cadastro de Cliente
        include 'app/views/cliente/cadastrar.php';
    }

    public function redirect($location) {
        header("Location: $location");
        exit();
    }

    public function cadastrarProcessar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clienteModel->cadastrarCliente();
        } else {
            // Redirecione para a listagem de clientes
            $this->redirect('/cliente/listar');
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $cliente = $this->clienteModel->visualizarCliente($id);
            include 'app/views/cliente/editar.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $novoNome = $_POST['novo_nome']; 
            $novoEmail = $_POST['novo_email'];
            $this->clienteModel->editarCliente($id, $novoNome, $novoEmail);
        } else {
            echo "Método não suportado.";
        }
    }
    


    public function listar() {
        // Lógica para exibir a lista de Clientes
        $clientes = $this->clienteModel->listarClientes();
        include 'app/views/cliente/listar.php';
    }

    public function visualizar($id = null) {
        // Se o ID não foi fornecido via URL, verifique se foi enviado via POST
        if ($id === null && isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        // Lógica para exibir detalhes do Cliente com base no ID
        $cliente = $this->clienteModel->visualizarCliente($id);

        // Verificar se o cliente foi encontrado
        if ($cliente) {
            include 'app/views/cliente/visualizar.php';
        } else {
            echo "Cliente não encontrado.";
        }
    }
}
?>
