## Instruções de Instalação

### Clonar o Repositório do GitHub

Clone o repositório do projeto usando o comando abaixo:

```sh
git clone https://github.com/gessicandrade/product-finder.git
```

### Instalar Dependências do Composer

Execute o comando abaixo para instalar as dependências definidas no `composer.json`:

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

### Configurar Variáveis de Ambiente

Copie o arquivo de exemplo `.env` para criar o arquivo `.env`:

```sh
cp .env.example .env
```

### Subir os Containers

Inicie os containers Docker usando o Sail:

```sh
./vendor/bin/sail up -d
```

### Instalar Dependências do NPM

Instale as dependências definidas no `package.json`:

```sh
./vendor/bin/sail npm install
```

### Rodar as Migrations e Inserir Dados Iniciais
Rode as migrations e seeders usando:
```sh
./vendor/bin/sail artisan migrate --seed
```

### Executar o Ambiente de Desenvolvimento

Execute o comando abaixo para iniciar o ambiente de desenvolvimento:

```sh
./vendor/bin/sail npm run dev
```

### Acessar o Projeto

Acesse o projeto no navegador através do endereço:

[http://localhost:8080](http://localhost:8080/)
 - E-mail: test@example.com
 - Senha: password
