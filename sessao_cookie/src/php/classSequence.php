<?php
    class Sequence {
        private $name;
        private $id = 1;

        public function setName ($name) { $this->name = $name; }
        public function getName () { return $this->name; }
        public function getId () { return $this->id+=1; }
    }
?>