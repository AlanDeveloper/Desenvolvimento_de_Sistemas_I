CREATE DATABASE `work`;

CREATE TABLE `HouseSale`(
    `cod` int NOT NULL,
    `desc` varchar(1000) NOT NULL,
    `pic` varchar(1000),
    `oper` boolean NOT NULL,
    `ngbor` varchar(500) NOT NULL,
    `price` float NOT NULL,
    `aloc` int NOT NULL,
    CONSTRAINT `housesalePK` PRIMARY KEY(`cod`)
);

INSERT INTO `HouseSale`(`desc`, `pic`, `oper`, `ngbor`, `price`, `aloc`) VALUES ("Alan e narigudo", "www.com.br", 0, "Pais dos Nariz Grande", 10, 2);
'UPDATE `HouseSale` SET desc = '.$house->getDesc().', pic = '.$house->getPic().', oper = '.$house->getOper().', ngbor = '.$house->getNgbor().', price = '.$house->getPrice().', aloc = '.$house->getAloc().' WHERE cod = '.$house->getCod