<?php
    include_once('medicament.php');

    class serverDAO {
        public function connectDB() {
            $connection = mysqli_connect('localhost','root','','doidao');
            
            return $connection;
        }
        // public function createDB($name) {
        //     $query = "CREATE DATABASE " . $name;
            
        //     $connection = $this->connectDB();
        //     mysqli_query($connection, $query);

        //     mysqli_close($connection);
        // }
        // public function deleteDB($name) {
        //     $query = "DROP DATABASE " . $name;

        //     $connection = $this->connectDB();
        //     $result = mysqli_query($connection, $query);
        //     mysqli_close($connection);
        // }
        public function insert($object) {
            $connection = $this->connectDB();

            $sql = mysqli_prepare($connection, "INSERT INTO medicament (name, manufacture, amount, controll, price) VALUES (?,?,?,?,?)");

            mysqli_stmt_bind_param($sql, 'ssisi', $object->getName(), $object->getManufacture(),$object->getAmount(), $object->getControl(), $object->getPrice());
            mysqli_stmt_execute($sql);

            mysqli_close($connection);
            echo '<script> setTimeout(() => window.location.href = "../../index.html", 0); </script>';
        }
        public function update($object) {
            $connection = $this->connectDB();

            $sql = mysqli_prepare($connection, "UPDATE medicament SET name = ?, manufacture = ?, amount = ?, controll = ?, price = ? WHERE cod = ?");

            mysqli_stmt_bind_param($sql, 'ssisii', $object->getName(), $object->getManufacture(),$object->getAmount(), $object->getControl(), $object->getPrice(), $object->getCod());
            mysqli_stmt_execute($sql);

            mysqli_close($connection);
            echo '<script> setTimeout(() => window.location.href = "../../list.php", 0); </script>';
        }
        public function delete($code) {
            $connection = $this->connectDB();

            $sql = mysqli_prepare($connection, "DELETE FROM medicament WHERE cod = " . $code);
            mysqli_stmt_execute($sql);

            mysqli_close($connection);
            echo '<script> setTimeout(() => window.location.href = "../../list.php", 0); </script>';
        }
        public function list() {
            $connection = $this->connectDB();

            $sql = "SELECT * FROM medicament";
            $result = mysqli_query($connection, $sql);
            $objs = [];


            while ($row = mysqli_fetch_assoc($result)) {
                $object = new Medicament($row['name'], $row['manufacture'], $row['amount'], $row['controll'], $row['price']);
                $object->setCod($row['cod']);
                
                array_push($objs, $object);
            }
            mysqli_close($connection);
            return $objs;
        }
        public function searchManu($name = '') {
            $connection = $this->connectDB();

            $name = $name == '' ? $name  : 'WHERE manufacture = "' . $name . '"';
            $sql = 'SELECT * FROM medicament ' . $name;

            $result = mysqli_query($connection, $sql);
            $objs = [];
            
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new Medicament($row['name'], $row['manufacture'], $row['amount'], $row['controll'], $row['price']);
                $object->setCod($row['cod']);
                
                array_push($objs, $object);
            }
            mysqli_close($connection);
            return $objs;
        }
        public function searchMedicament($name, $order, $classify) {
            $connection = $this->connectDB();

            if($order != 'select') { 
                $order = explode("-", $order);
                $order[0] = $order[0] != 'big' ? 'ASC' : 'DESC';
                $order = 'ORDER BY ' . strtolower($order[1]) . ' ' . $order[0];
            } else {
                $order = '';
            }
            if($classify != 'select') {
                $classify = explode('-', $classify);
                if ($classify[0] != 'less') {
                    $classify = $classify[0] == 'yes' ? 'controll="yes"' : 'controll="no"';
                } else {
                    $classify = $classify[0] == 'less' ? 'amount < 5' : 'amount > 5';
                }
            }
            $classify = $classify == 'select' ? '' : 'WHERE ' . $classify;
            $name = $name != '' ? 'WHERE name="'.$name.'"' : '';
            
            $sql = 'SELECT * FROM medicament ' . $name . ' ' . $classify . ' ' . $order;
            $result = mysqli_query($connection, $sql);
            $objs = [];
            
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new Medicament($row['name'], $row['manufacture'], $row['amount'], $row['controll'], $row['price']);
                $object->setCod($row['cod']);
                
                array_push($objs, $object);
            }
            mysqli_close($connection);
            return $objs;
        }
    }
?>