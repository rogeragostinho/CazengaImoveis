# CazengaImóveis — Plataforma de Imóveis

Plataforma web para listagem, pesquisa e gestão de imóveis no município do Cazenga, desenvolvida em Laravel 12. Inclui área pública para clientes, área de intermediários e painel administrativo completo.

---

## Pré-requisitos

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

---

## Como executar o projecto

### 1. Clonar o repositório

```bash
git clone https://github.com/seu-usuario/CazengaImoveis.git
cd CazengaImoveis
```

### 2. Configurar o ambiente

```bash
cp .env.example .env
```

Abre o `.env` e ajusta as variáveis da base de dados:

```env
DB_HOST=db
DB_DATABASE=cazenga_imoveis
DB_USERNAME=cazenga
DB_PASSWORD=cazenga
```

### 3. Subir os containers

```bash
docker compose up -d --build
```

### 4. Instalar as dependências PHP

```bash
docker compose exec app composer install
```

### 5. Gerar a chave da aplicação

```bash
docker compose exec app php artisan key:generate
```

### 6. Executar as migrations

```bash
docker compose exec app php artisan migrate
```

### 7. Corrigir permissões

```bash
docker compose exec app bash -c "chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && chmod -R 775 /var/www/storage /var/www/bootstrap/cache"
docker compose exec app bash -c "chmod -R 775 storage/app/public"
```

### 8. Criar link simbólico para ficheiros públicos

```bash
docker compose exec app php artisan storage:link
```

### 9. Aceder à aplicação

Abre o browser em: [http://localhost:8000](http://localhost:8000)

Painel administrativo: [http://localhost:8000/admin](http://localhost:8000/admin)

---

## Funcionalidades

| Módulo | Descrição |
|---|---|
| Catálogo | Listagem e pesquisa de imóveis por contrato, tipo, quartos e preço |
| Imóvel | Página de detalhe com imagens e contactos do responsável |
| Cadastro | Submissão de imóveis por utilizadores (fica em revisão) |
| Intermediários | Gestão de intermediários imobiliários (requer login) |
| Agendamento | Sistema de agendamento de visitas com calendário |
| Mensagens | Envio de mensagens de contacto |
| Perfil | Edição de dados pessoais e password |
| Admin — Imóveis | Aprovar, activar e desactivar imóveis |
| Admin — Utilizadores | Gestão de utilizadores e intermediários |
| Admin — Visitas | Calendário e gestão de visitas agendadas |
| Admin — Configurações | Configurações gerais do site |
| Admin — Movimentos | Histórico de movimentos financeiros |

---

## Stack tecnológica

- **Backend:** Laravel 12 / PHP 8.2
- **Frontend:** Vite / Tailwind CSS / Laravel Breeze / Bootstrap
- **Base de dados:** MySQL 8.0
- **Servidor web:** Nginx
- **Ambiente:** Docker

---

## Comandos úteis

```bash
# Parar os containers
docker compose down

# Ver logs da aplicação
docker compose logs app

# Aceder à base de dados
docker compose exec db mysql -u cazenga -p

# Recompilar assets frontend
docker compose up -d --build node
```

---

## Estrutura Docker

```
├── Dockerfile              # Imagem personalizada PHP 8.2
├── docker-compose.yml      # Orquestração dos containers
└── docker/
    └── nginx.conf          # Configuração do servidor web
```