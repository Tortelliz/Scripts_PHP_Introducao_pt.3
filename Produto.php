<?php

class Produto {
    private $nome; // Nome do produto
    private $quantidade; // Quantidade em estoque do produto
    private $valor; // Valor unitário do produto

    // Método construtor para inicializar o produto com os dados fornecidos
    public function __construct($nome, $quantidade, $valor) {
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
    }

    // Método para realizar uma compra do produto
    public function compra($quantidadeComprada, $valorUnitario) {
        // Verifica se a quantidade e o valor fornecidos são válidos
        if ($quantidadeComprada > 0 && $valorUnitario > 0) {
            // Atualiza a quantidade e o valor do produto
            $this->quantidade += $quantidadeComprada;
            $this->valor = $valorUnitario;
            return "Compra realizada com sucesso."; // Retorna uma mensagem de sucesso
        } else {
            return "Erro: Quantidade ou valor inválido."; // Retorna uma mensagem de erro
        }
    }

    // Método para realizar uma venda do produto
    public function venda($quantidadeVendida) {
        // Verifica se a quantidade fornecida é válida e está disponível em estoque
        if ($quantidadeVendida > 0 && $quantidadeVendida <= $this->quantidade) {
            // Atualiza a quantidade em estoque do produto
            $this->quantidade -= $quantidadeVendida;
            return "Venda realizada com sucesso."; // Retorna uma mensagem de sucesso
        } else {
            return "Erro: Quantidade inválida ou estoque insuficiente."; // Retorna uma mensagem de erro
        }
    }

    // Método para obter a quantidade em estoque do produto
    public function getQuantidade() {
        return $this->quantidade;
    }

    // Método para obter o valor unitário do produto
    public function getValor() {
        return $this->valor;
    }
}

// Teste de compra e venda do produto
$produto = new Produto("Produto A", 10, 20.50);

echo "Quantidade inicial: " . $produto->getQuantidade() . "\n";
echo "Valor inicial: " . $produto->getValor() . "\n";

$resultadoCompra = $produto->compra(5, 25.75);
echo $resultadoCompra . "\n";
echo "Quantidade após compra: " . $produto->getQuantidade() . "\n";
echo "Valor após compra: " . $produto->getValor() . "\n\n";

$resultadoVenda = $produto->venda(3);
echo $resultadoVenda . "\n";
echo "Quantidade após venda: " . $produto->getQuantidade() . "\n";

?>