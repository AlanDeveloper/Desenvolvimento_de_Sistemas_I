<?php
    include_once "House.php";
    class HouseSaleDAO{
        private function connect() {
            return mysqli_connect("localhost" , "root", "", "work");
        }
        public function search($cod){
            $db = $this->connect();
            $sql = 'SELECT * FROM `HouseSale` WHERE `cod` = '.$cod;
            $result = mysqli_query($db, $sql);
            while ($row = $result->fetch_assoc()){
                $house = new House($cod ,$row["desc"], $row["pic"], $row["oper"], $row["ngbor"], $row["price"], $row["aloc"]);
            }
            mysqli_close($db);
            if ($house) {
                return $house;
            }else {
                return "Nenhum resultado encontrado";
            }
        }
        public function add($house){
            $db = $this->connect();
            $sql = 'INSERT INTO `HouseSale`(`cod` ,`desc`, `pic`, `oper`, `ngbor`, `price`, `aloc`) VALUES ('.$house->getCod().' ,"'.$house->getDesc().'", "'.$house->getPic().'", '.$house->getOper().', "'.$house->getNgbor().'", '.$house->getPrice().', '.$house->getAloc().')';
            mysqli_query($db, $sql);
            mysqli_close($db);
        }
        public function delete($house){
            $db = $this->connect();
            $sql = 'DELETE FROM `HouseSale` WHERE `cod` = '.$house->getCod();
            mysqli_query($db, $sql);
            mysqli_close($db);
        }
        public function alter($house){
            $db = $this->connect();
            $sql = 'UPDATE `HouseSale` SET `cod` = "'.$house->getCod().'", `desc` = "'.$house->getDesc().'", `pic` = "'.$house->getPic().'", `oper` = '.$house->getOper().', `ngbor` = "'.$house->getNgbor().'", `price` = '.$house->getPrice().', `aloc` = '.$house->getAloc().' WHERE `cod` = "'.$house->getCod().'"';
            var_dump($sql);
            mysqli_query($db, $sql);
            mysqli_close($db);
        }
    }
?>