<?php

class Usuario {
    public $nome; // Nome do usuário
    public $email; // E-mail do usuário
    public $senha; // Senha do usuário

    // Método construtor para inicializar o usuário com os dados fornecidos
    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    // Método para cadastrar o usuário
    public function cadastrar() {
        // Cadastro do usuário
        echo "Cadastrando usuário: {$this->nome}, {$this->email}\n";
        echo "Usuário cadastrado com sucesso!\n";
    }

    // Método para verificar se o e-mail é válido
    public function verificar_email() {
        // Verificação de e-mail usando a função filter_var com a opção FILTER_VALIDATE_EMAIL
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true; // Retorna true se o e-mail for válido
        } else {
            return false; // Retorna false se o e-mail for inválido
        }
    }

    // Método para realizar o login do usuário
    public function logar($email, $senha) {
        // Verifica se o e-mail e a senha correspondem ao usuário
        if ($email == $this->email && $senha == $this->senha) {
            echo "Usuário logado com sucesso!\n"; // Mensagem de sucesso se as credenciais estiverem corretas
        } else {
            echo "E-mail ou senha incorretos. Tente novamente.\n"; // Mensagem de erro se as credenciais estiverem incorretas
        }
    }
}

// Testes
$usuario1 = new Usuario("Estênio", "estenio@gmail.com", "senha123");
$usuario2 = new Usuario("Maria", "mariazinha@gmail.com", "senha456");

// Teste cadastrar
$usuario1->cadastrar(); // Cadastrar o usuário 1
$usuario2->cadastrar(); // Cadastrar o usuário 2

// Teste logar
$usuario1->logar("estenio@gmail.com", "senha123"); // Logar com credenciais corretas

$usuario2->logar("mariazinha@gmail.com", "senha123"); // Logar com senha incorreta
?>