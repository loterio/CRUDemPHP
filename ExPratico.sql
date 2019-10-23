CREATE DATABASE exPratico;

USE exPratico;

CREATE TABLE passagensAereas (
cod INTEGER AUTO_INCREMENT PRIMARY KEY,
passageiro VARCHAR(60),
poltrona VARCHAR(10),
dataVoo DATE,
origem VARCHAR(40),
destino VARCHAR(40),
valorPass DOUBLE,
checkin VARCHAR(1)
);

DROP TABLE passagensAereas;
SELECT * FROM passagensAereas;	 

INSERT INTO passagensAereas(passageiro, poltrona, dataVoo, origem, destino, valorPass, checkin) VALUES 
('Hernold','a12','2019-10-17','Vancouver','New York','750','1'),
('Arnold','a02','2019-10-09','Washington','Chicago','320','1'),
('Baguera','e22','2019-10-01','Selva','Montanha','24.99','0'),
('Alex','d09','2019-05-22','New York','Madagascar','9.99','0'),
('Martin','d10','2019-07-07','New York','Madagascar','9.99','0');

