<?php
    class House {
        private $alocation;
        private $ngborhood;
        private $descript;
        private $price;
        private $operation;
        private $codResidence;
        private $pic;
        private $cod;

        public function __construct($alocation, $ngborhood, $descript, $price, $operation, $codResidence, $pic = Null) {
            $this->alocation = $alocation;
            $this->ngborhood = $ngborhood;
            $this->descript = $descript;
            $this->price = $price;
            $this->operation = $operation;
            $this->codResidence = $codResidence;
            $this->pic = $pic;
        }
            
        public function getAloc() {
            return $this->alocation;
        }
        public function getNgBor() { 
            return $this->ngborhood;
        }
        public function getDesc() { 
            return $this->descript;
        }
        public function getPrice() { 
            return $this->price;
        }
        public function getOper() { 
            return $this->operation;
        }
        public function getCodRes() { 
            return $this->codResidence;
        }
        public function getCodPic() { 
            return $this->pic;
        }

        public function setAloc($aloc) { 
            $this->aloc = $aloc;
        }
        public function setNgBor($ngbor) { 
            $this->ngbor = $ngbor;
        }
        public function setDesc($desc) { 
            $this->desc = $desc;
        }
        public function setPrice($price) { 
            $this->price = $price;
        }
        public function setOper($oper) { 
            $this->oper = $oper;
        }
        public function setCodRes($codres) { 
            $this->codres = $codres;
        }
        public function setCodPic($pic) {
            $this->pic = $pic;
        }
    }
?>