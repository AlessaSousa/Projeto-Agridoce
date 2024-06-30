# Agridoce

Agridoce é uma plataforma que conecta pessoas através do amor pela comida. 
Proporcionamos um espaço acolhedor para explorar, aprender e celebrar a 
diversidade cultural e criativa da culinária.

## Funcionalidades

- **Página Inicial**: Apresenta a missão do projeto e links para login e cadastro.
- **Cadastro**: O usuário pode fazer o cadastro com nome, email e senha.
- **Login**: O usuário pode logar assim que for feito o cadastro.
- **Perfil**: Área de perfil do usuário, exibe nome e e-mail.
- **Alteração de senha**: O usuário pode fazer a alteração da própria senha.
- **Feed**: Exibe receitas postadas pelos usuários, com informações sobre o autor e uma breve descrição.
- **Receita**: Exibe informações detalhadas sobre uma receita específica, incluindo o nome do autor, título, foto e descrição da receita.
- **Publicação de Receita**: Permite que os usuários publiquem suas próprias receitas.

## Tecnologias Utilizadas

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Banco de Dados**: MySQL

## Estrutura do Projeto
- **imagem**: Pasta contendo imagem.
- **sql**: Pasta contendo o script do banco de dados.
- **style**: Pasta contendo os arquivos CSS para estilização das páginas.
- **alterarSenha**: Página para alteração de senha.
- **cadastro.php**: Página de cadastro de usuário.
- **conexao.php**: Script de conexão com o banco de dados.
- **feed.php**: Página que exibe o feed de receitas.
- **index.html**: Página inicial do projeto.
- **login.php**: Página que login do usuário.
- **perfil.php**: Página de perfil contendo as informações pessoais do usuário.
- **postar_receita.php**: Script de funcionalidade para a postagem da receita.
- **publicacao.php**: Página que permite o usuário fazer a postagem de suas receitas.
- **receita.php**: Página que exibe os detalhes de uma receita específica.
- **sair.php**: Script com funcionalidade deslogar da conta.

## Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/AlessaSousa/Projeto-Agridoce.git
    ```

2. Configure o banco de dados MySQL:

    -  Crie um banco de dados e as tabelas necessárias conforme o esquema abaixo:
    ```sql
      create database agridoce;
      
      use agridoce;
      
      create table receita(
      rec_cod int not null primary key auto_increment,
      titulo varchar(80) not null,
      autor int not null,
      foto varchar(255),
      descricao text not null,
      foreign key (autor) references usuario(cod)
      );
      
      create table usuario(
      cod int not null primary key auto_increment,
      nome varchar(80) not null unique,
      email varchar(100) not null unique,
      senha varchar(255) not null
      );
    ```
4. Abra o seu navegador e digite:
   ```
   localhost/Projeto-Agridoce-main
   ```
