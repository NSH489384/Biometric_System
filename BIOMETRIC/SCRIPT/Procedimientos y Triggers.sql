use biometric_system;


DELIMITER //
CREATE PROCEDURE pa_nuevo_ciudad(
IN ID_CIUDAD INT(11),
IN DES_CIUDAD VARCHAR(45),
IN ESTADO_CIUDAD TINYINT(1)
)
BEGIN 
INSERT INTO ciudad (ID_CIUDAD, DES_CIUDAD,ESTADO_CIUDAD)
VALUES (ID_CIUDAD, DES_CIUDAD,ESTADO_CIUDAD);

END //

DELIMITER ;
CALL pa_nuevo_ciudad("$id_ciu","$nom_ciu","$estado");


-- Procedimeinto Registro Cliente
DELIMITER //
CREATE PROCEDURE pa_nuevo_cliente
(
 IN ID_CLIENTE varchar(15),
 IN TD_CLIENTE varchar(10),
 IN DIRECCION varchar(45),
 IN ESTADO tinyint(1),
 IN CONTACTO varchar(15),
 IN TD_CONTACTO varchar(10),
 IN CIUDAD int(11),
 IN EPS int(11)
)
BEGIN 
INSERT INTO cliente(ID_CLIENTE,TD_CLIENTE,DIRECCION,ESTADO_CLIENTE,NUMERO_DOC_CONTACTO_E,TD_CONTACTO_E,FK_CIUDAD,FK_EPS)
VALUES(ID_CLIENTE,TD_CLIENTE,DIRECCION,ESTADO,CONTACTO,TD_CONTACTO,CIUDAD,EPS);
END //

DELIMITER ;
CALL  pa_nuevo_cliente ($id_cl, $td_cl, $direccion_cl,$estado_cl,$contacto_cl,$td_contacto_cl,$ciudad_cl,$eps_cl);

/* procedimiento actualizar Cliente (aun no sirve )
DELIMITER //
CREATE PROCEDURE pa_actualizar_cliente
(
 IN OLD_CLIENTE varchar(15),
 IN TD_CLIENTE varchar(10),
 IN NEW_ID_CLIENTE varchar(15),
 IN NEW_TD_CLIENTE varchar(10),
 IN DIRECCION varchar(45),
 IN ESTADO tinyint(1),
 IN CONTACTO varchar(15),
 IN TD_CONTACTO varchar(10),
 IN CIUDAD int(11),
 IN EPS int(11)
)
BEGIN
UPDATE cliente SET ID_CLIENTE = NEW_ID_CLIENTE, TD_CLIENTE = NEW_TD_CLIENTE, DIRECCION, ESTADO, CONTACTO, TD_CONTACTO, CIUDAD, EPS
WHERE ID_CLIENTE = OLD_CLIENTE;
END //
DELIMITER ;
CALL pa_actualizar_cliente();

select * from cliente; */
