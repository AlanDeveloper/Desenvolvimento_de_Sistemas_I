<?php
    class Medicament {
        private $name;
        private $manufacture;
        private $amount;
        private $control;
        private $price;
        private $cod;
    
        public function __construct($name, $manufacture, $amount, $control, $price) {
            $this->name = $name;
            $this->manufacture = $manufacture;
            $this->amount = $amount;
            $this->control = $control;
            $this->price = $price;
        }

        public function listAttr() {
            return ";{$this->name};{$this->manufacture};{$this->amount};{$this->control};{$this->price};{$this->cod}";
        }

        public function setName($name) { $this->name = name;}
        public function setManufacture($manufacture) { $this->manufacture = manufacture;}
        public function setAmount($amount) { $this->amount = amount;}
        public function setControl($control) { $this->control = control;}
        public function setPrice($price) { $this->price = price;}
        public function setCod($cod) { $this->cod = $cod;}

        public function getName() { return $this->name;}
        public function getManufacture() { return $this->manufacture;}
        public function getAmount() { return $this->amount;}
        public function getControl() { return $this->control;}
        public function getPrice() { return $this->price;}
        public function getCod() { return $this->cod;}
    }
?>