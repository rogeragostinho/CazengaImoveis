CazengaImóveis 

CazengaImóveis é uma plataforma de compra e venda de imóveis desenvolvida para o município do Cazenga, em Angola. O sistema permite que usuários possam listar, visualizar e interagir com imóveis disponíveis para compra ou venda, proporcionando uma experiência prática e intuitiva para todos os envolvidos.

Uma das principais funcionalidades do sistema é a integração com OpenStreetMap, permitindo aos usuários visualizar a localização exata dos imóveis em um mapa interativo.

Funcionalidades
Cadastro de Imóveis: Usuários podem cadastrar imóveis com informações detalhadas, como preço, localização e características.
Busca e Filtro: Ferramenta de busca que permite filtrar imóveis por preço, tipo, localização e outras variáveis.
Integração com Mapa: Exibição da localização dos imóveis através do OpenStreetMap.
Área Administrativa: Interface para gerenciar os imóveis cadastrados, editar informações e excluir imóveis.
Tecnologias Utilizadas
Backend: Laravel (PHP)
Frontend: Bootstrap, JavaScript
Banco de Dados: MySQL
Mapa: OpenStreetMap
Versionamento: Git, GitHub
Como Rodar o Projeto Localmente
Pré-requisitos
Instalar o PHP: O projeto utiliza o PHP 7.4 ou superior.
Instalar o Composer: O Composer é necessário para gerenciar as dependências do Laravel.
Instalar o MySQL: O banco de dados MySQL deve estar instalado e configurado.
Instalar o Git: Para clonar o repositório e controlar as versões do projeto.
Passos para Execução
Clone o repositório:

bash
Copiar código
git clone https://github.com/rogeragostinho/CazengaImoveis.git
Instale as dependências:

Acesse o diretório do projeto e execute o seguinte comando para instalar as dependências do Laravel:

bash
Copiar código
cd CazengaImoveis
composer install
Configuração do ambiente:

Renomeie o arquivo .env.example para .env e configure as variáveis de ambiente conforme sua necessidade, especialmente as configurações de banco de dados.

bash
Copiar código
cp .env.example .env
Crie as chaves de aplicação:

No diretório do projeto, execute:

vbnet
Copiar código
php artisan key:generate
Crie o banco de dados:

No MySQL, crie um banco de dados com o nome definido no .env e depois execute as migrações para criar as tabelas necessárias:

Copiar código
php artisan migrate
Rodar o servidor:

Para rodar o servidor localmente, execute o comando:

Copiar código
php artisan serve
Acesse o projeto:

Abra o navegador e acesse http://localhost:8000 para visualizar a aplicação.

Contribuições
Este projeto está aberto para contribuições! Se você deseja ajudar com melhorias, correções de bugs ou novas funcionalidades, fique à vontade para fazer um fork do repositório e enviar um pull request. Qualquer sugestão ou feedback também é bem-vindo.

Licença
Este projeto está licenciado sob a MIT License.
