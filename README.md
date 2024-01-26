Projeto Biblioteca

Este projeto é uma aplicação de gerenciamento de biblioteca desenvolvida em PHP.

Instruções para Instalação

Clone o repositório:

git clone https://github.com/seu-usuario/biblioteca.git

acesse o repositorio

cd biblioteca

Configure as Credenciais do Banco de Dados:

Abra database.sql e atualize as constantes DB_HOST, DB_NAME, DB_USER e DB_PASS com suas próprias credenciais.

Importe o Banco de Dados:

Importe o esquema do banco de dados a partir do arquivo database.sql no seu sistema de gerenciamento de banco de dados (ex: MySQL).

Inicie o Servidor Local:

Se você estiver usando o PHP incorporado, inicie o servidor embutido:

php -S localhost:8000

ou se não estiver, eu utilizei o Apache via XAMPP, aqui esta o link de download do mesmo: https://www.apachefriends.org/pt_br/download.html 

Configuração do Ambiente

Certifique-se de ter PHP instalado em seu sistema. O projeto foi desenvolvido e testado usando PHP 7.4.


Comandos Básicos para Execução

Cadastro de Cliente:

Abra o navegador e acesse http://localhost:8000/cliente/cadastrar.php.

Listagem de Locações:

Abra o navegador e acesse http://localhost:8000/locacao/listar.php.

Edição de Livro:

Abra o navegador e acesse http://localhost:8000/livro/editar.php?id=1 (substitua 1 pelo ID do livro desejado).

Informação Adicional

Este projeto utiliza PHP e MySQL para a persistência de dados.
Certifique-se de configurar corretamente o ambiente antes de iniciar o servidor local.
Consulte os arquivos do projeto para obter mais detalhes sobre a estrutura e implementação.
