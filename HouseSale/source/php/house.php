<?php
    class House {
        private $cod;
        private $desc;
        private $pic;
        private $oper;
        private $ngbor;
        private $price;
        private $aloc;
        public function __construct($cod ,$desc, $pic = NULL, $oper, $ngbor, $price, $aloc) {
            $this->cod = $cod;
            $this->desc = $desc;
            $this->pic = $pic;
            $this->oper = $oper;
            $this->ngbor = $ngbor;
            $this->price = $price;
            $this->aloc = $aloc;
        }
            
        public function getCod() { 
            return $this->cod;
        }
        public function getDesc() { 
            return $this->desc;
        }
        public function getPic() { 
            return $this->pic;
        }
        public function getOper() { 
            return $this->oper;
        }
        public function getNgbor() { 
            return $this->ngbor;
        }
        public function getPrice() { 
            return $this->price;
        }
        public function getAloc() { 
            return $this->aloc;
        }

        public function setCod($value) { 
            $this->cod = $value;
        }
        public function setDesc($value) { 
            $this->desc = $value;
        }
        public function setPic($value) { 
            $this->pic = $value;
        }
        public function setOper($value) { 
            $this->oper = $value;
        }
        public function setNgbor($value) { 
            $this->ngbor = $value;
        }
        public function setPrice($value) { 
            $this->price = $value;
        }
        public function setAloc($value) { 
            $this->aloc = $value;
        }
    }
?>