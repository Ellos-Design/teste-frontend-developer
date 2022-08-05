<?php 
    class Orcamento {
        public function __construct($idCliente, $nomeCliente, $emailCliente, $telCliente, $descOrcamento) {
            $this->idCliente = $idCliente;
            $this->nomeCliente = $nomeCliente;
            $this->emailCliente = $emailCliente;
            $this->telCliente = $telCliente;
            $this->descOrcamento = $descOrcamento;
        }

        public function getNome() {
            return $this->nomeCliente;
        }
        public function getEmail() {
            return $this->emailCliente;
        }
        public function getTel() {
            return $this->telCliente;
        }
        public function getDesc() {
            return $this->descOrcamento;
        }
    }
?>