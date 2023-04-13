# API de gerenciamento de dispositivos IoT
## Contexto
Implementar em laravel uma API Rest para gerenciar clientes.

## Funcionalidades
- Criar, Editar, Buscar e Excluir clientes

## Tecnologias

- Laravel - Laravel é um framework de aplicações web com sintaxe expressiva e elegante.
- JQuery - jQuery é uma biblioteca JavaScript rápida, pequena e rica em recursos.
- Docker - O Docker permite que você separe seus aplicativos de sua infraestrutura para que você possa entregar software rapidamente.

## Instalação

##### Requisito obrigátorio
Antes de tudo você precisa ter o docker e o docker-compose e também o git.
Caso não tenha instalado, aqui alguns links de referência:
- Aqui encontrar os passos para instalação do Docker => https://docs.docker.com/get-docker/ 
- Aqui encontrar os passos para instalação do Docker Compose => https://docs.docker.com/compose/ 
- Aqui encontrar os passos para instalação do git => https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

##### Clone o projeto
Com o git instalado e em um diretório da sua escolha, baixe o projeto:

```sh
git clone https://github.com/YolandoQ/test-solution.git
```

##### Suba o serviço
Com o Docker-compose instalado, execute esse comando na raiz do projeto:

```sh
docker-compose up -d
```

##### Acesse o container
Com o container rodando, execute esse comando na raiz do projeto:

```sh
docker exec -it app-udp8 bash
```

##### Instale as dependências
Após entrar no container você pode executar:

```sh
composer install
```

##### Dê permissões as pastas necessárias
São elas storage/logs e storage/framework, como estamos num ambiente de testes vamos dar todas as permissões, apenas execute:

```sh
chmod -R 777 storage/logs storage/framework
```

##### Pra finalizar vamos rodar as migrations e a seeder
Caso não tenha alterado credenciais nos arquivo do docker basta rodar os comandos de sempre:

```sh
php artisan migrate
```

```sh
php artisan db:seed
```

Pronto, agora é só partir pro abraço, acesse o porjeto na porta configurar(localhost:8000, se nada tiver sido alterado nos arquivos de configuração do docker).