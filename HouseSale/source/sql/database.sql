CREATE DATABASE `work`;

CREATE TABLE `HouseSale`(
    `aloc` int NOT NULL,
    `ngbor` varchar(500) NOT NULL,
    `desc` varchar(1000) NOT NULL,
    `price` int NOT NULL,
    `oper` boolean NOT NULL,
    `codRes` int NOT NULL,
    `pic` varchar(1000),
    `cod` serial,
    CONSTRAINT `vendaPK` PRIMARY KEY (`cod`)
);


SELECT * FROM `HouseSale`

INSERT INTO `HouseSale` (`aloc`, `ngbor`, `desc`, `price`, `oper`, `codRes`) VALUES (3, "Cassino", "Lorem ipsum dolor sit amet consecte", 1400, 0, 1143)

