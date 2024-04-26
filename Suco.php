<?php

class Suco {
    private $suco = []; // Armazena os sucos cadastrados
    private $vendas = []; // Armazena as vendas realizadas

    // Método para cadastrar um novo suco
    public function cadastrar($sabor, $quantidade_ml, $valor) {
        // Cria um novo suco com os dados fornecidos
        $novoSuco = [
            'sabor' => $sabor,
            'quantidade_ml' => $quantidade_ml,
            'valor' => $valor
        ];
        // Adiciona o novo suco ao array de sucos
        $this->suco[] = $novoSuco;
        return "Suco cadastrado com sucesso."; // Retorna uma mensagem de sucesso
    }

    // Método para realizar uma venda de suco
    public function vender($sabor, $quantidade_vendida) {
        foreach ($this->suco as $key => $suco) {
            if ($suco['sabor'] === $sabor) { // Verifica se o suco está cadastrado
                // Calcula o valor da venda e armazena os detalhes da venda
                $venda = [
                    'sabor' => $sabor,
                    'quantidade_ml' => $quantidade_vendida,
                    'valor' => $suco['valor'] * $quantidade_vendida
                ];
                // Adiciona a venda ao array de vendas
                $this->vendas[] = $venda;
                // Atualiza a quantidade de suco disponível no estoque
                $this->suco[$key]['quantidade_ml'] -= $quantidade_vendida;
                return "Venda realizada com sucesso."; // Retorna uma mensagem de sucesso
            }
        }
        return "Erro: Suco não encontrado."; // Retorna uma mensagem de erro se o suco não estiver cadastrado
    }

    // Método para listar as vendas agrupadas por sabor de suco
    public function listar_vendas() {
        if (empty($this->vendas)) { // Verifica se não há vendas registradas
            return "Não há vendas."; // Retorna uma mensagem informando que não há vendas
        } else {
            $vendasAgrupadas = []; // Inicializa um array para armazenar as vendas agrupadas por sabor
            foreach ($this->vendas as $venda) {
                if (array_key_exists($venda['sabor'], $vendasAgrupadas)) {
                    // Atualiza a quantidade vendida e o valor total para cada sabor de suco
                    $vendasAgrupadas[$venda['sabor']]['quantidade_ml'] += $venda['quantidade_ml'];
                    $vendasAgrupadas[$venda['sabor']]['valor'] += $venda['valor'];
                } else {
                    // Adiciona uma nova entrada para o sabor de suco
                    $vendasAgrupadas[$venda['sabor']] = [
                        'quantidade_ml' => $venda['quantidade_ml'],
                        'valor' => $venda['valor']
                    ];
                }
            }

            $output = ""; // Inicializa uma string vazia para armazenar a saída
            foreach ($vendasAgrupadas as $sabor => $venda) {
                // Concatena os detalhes das vendas agrupadas à string de saída
                $output .= "Sabor: " . $sabor . ", ";
                $output .= "Quantidade Vendida (ml): " . $venda['quantidade_ml'] . ", ";
                $output .= "Valor Total: " . $venda['valor'] . "\n";
            }

            return $output; // Retorna a string de saída com os detalhes das vendas agrupadas por sabor de suco
        }
    }
}

// Teste cadastrar
$suco = new Suco();
echo $suco->cadastrar('Laranja', 500, 5.00) . "\n";
echo $suco->cadastrar('Uva', 750, 6.50) . "\n";

// Teste vender
echo $suco->vender('Laranja', 200) . "\n";
echo $suco->vender('Laranja', 300) . "\n";
echo $suco->vender('Uva', 500) . "\n";

// Teste listar_vendas
echo $suco->listar_vendas() . "\n";

?>