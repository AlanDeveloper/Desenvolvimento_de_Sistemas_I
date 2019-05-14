CREATE TABLE medicament (
    name varchar(100) NOT NULL,
    manufacture varchar(100) NOT NULL,
    amount int NOT NULL,
    controll varchar(3) NOT NULL,
    price int NOT NULL,
    cod serial,
    CONSTRAINT medicamentPK PRIMARY KEY (cod)
);