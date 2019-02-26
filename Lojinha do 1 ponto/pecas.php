<?php
    class Pecas {
        private $codigo;
        private $nome;
        private $quantidade;
        private $preco;

        public function __construct($codigo, $nome, $quantidade, $preco) {
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->quantidade = $quantidade;
            $this->preco = $preco;
        }

        public function getCodigo() { return $this->codigo;}
        public function getNome() { return $this->nome;}
        public function getQuantidade() { return $this->quantidade;}
        public function getPreco() { return $this->preco;}

        public function setCodigo($cod) { $this->cod = $cod;}
        public function setNome($nome) { $this->nome = $nome;}
        public function setQuantidade($qnt) { $this->quantidade = $qnt;}
        public function setPreco($preco) { $this->preco = $preco;}
    }
?>