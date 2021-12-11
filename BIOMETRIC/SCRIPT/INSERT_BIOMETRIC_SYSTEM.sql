USE biometric_system;
-- ---------TIPO DOCUMENTO
INSERT INTO tipo_documento(ID_TIPO_DOC,DES_TD, ESTADO_TD) VALUES
("CC","CEDULA CIUDADANIA", 1),
("CE","CEDULA EXTRANJERIA",1),
("PA","PASAPORTE",1),
("TI","TARJETA IDENTIDAD",1);

-- --------------------------- PERSONA
INSERT INTO persona(ID_PERSONA,TD_PERSONA,PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,TELEFONO)
VALUES("1233504764","CC","NOHORA","LISETH","ROJAS","YEPES",3112807335),
("1127947342","CE","JONATHAN","LEONIDAS","MORENO","TROCHEZ",3057500422),
("10873452","TI","CRUZ","CECILIA","BLANDÓN","CORDOBA",3203541236),
("1341233242","PA","CECILIA","BLANDÓN","CORDOBA",3203541236),
("1343203849","TI","NINEDLY","HUEPA","DUCUARA",3125874745);


-- ---------------------- BENEFICIARIO
INSERT INTO beneficiario(ID_BENEFICIARIO,TD_BENEFICIARIO,ESTADO_BENEFICIARIO)
VALUES("10873452","TI",1);




-- ----------------- --- USUARIO 
INSERT INTO usuario(ID_USUARIO,NUMERO_DOC,TD_USUARIO,CONTRASEÑA,CORREO_USUARIO,ESTADO_USUARIO,RECUPERAR_CONTRASEÑA,CAMBIO_CONTRASEÑA)
VALUES(1,"1233504764","CC","raulrojas","norayepes2015@gmail.com.co",1,null,null),
(2,1127947342,"CE","Bogota2020","leonidasmoreno953@gmail.com",1,null,null),
(3,1341233242,"PA","Ceci2040","ccblandon7@misena.edu.co",1,null,null),
(4,1343203849,"TI","ninedly1015","nshuepa@misena.edu.co",1,null,null);


-- -------------------------- ADMINISTRADOR
INSERT INTO administrador(USUARIO_NUMERO_DOC,USUARIO_TD_USUARIO)
VALUES("1233504764","CC");



--  --------------- CIUDAD
insert into ciudad (ID_CIUDAD,DES_CIUDAD,ESTADO_CIUDAD)
values(1,"Bogotá",1);

-- ---------------- EPS
insert into eps(ID_EPS,DES_EPS,ESTADO_EPS)
values(1,"Sanitas",1);


-- -------------- PARENTESCO
insert into parentesco(ID_PARENTESCO,DES_PARENTESCO,ESTADO_PARENTESCO)
values(1,"Esposo(a)",1);

 select *from persona;

-- CONTACTO_EMERGENCIA

insert into contacto_emergencia(ID_CONTACTO,TD_CONTACTO,ESTADO_CONTACTO,ID_PARENTESCO_C)
values("103255444","CE",1,1);


-- -------------  CLIENTE

insert into cliente (ID_CLIENTE,TD_CLIENTE,DIRECCION,ESTADO_CLIENTE,NUMERO_DOC_CONTACTO_E,TD_CONTACTO_E,FK_CIUDAD,FK_EPS)
values("252426272","PA","Cra 54 # 46 SUR",1,"103255444","CE",2,4);



--  ----------------- ROL
INSERT INTO rol (ID_ROL,DESC_ROL,ESTADO_ROL)
values(1,"Administrador",1),
(2,"Cliente",1);


select * from login;

-- ----------------- LOGN
insert into login (ID_LOGIN,NUMERO_DOC_LOG,TIPO_DOC,CONTRASEÑA_LOGIN,ROL_ID_ROL)
values(1,"10873452","TI","25082006",2);


-- ------------ MODELO
insert into modelo_vehiculo(ID_MODELO,DES_MODELO,ESTADO_MODELO)
values(1,"BMW",1);

-- ---------- TIPO VEHICULO 
insert into tipo_vehiculo values
(1,"carro",1);

-- ------------- BIOMETRICO
insert into biometrico values
("BS001");

--  ------------ VEHICULO
insert into vehiculo(PLACA,COLOR,ESTADO_VEHI,FK_TIPO_VEHICULO,FK_MODELO,FK_BIOMETRICO)
values("azs_123","Azul",1,1,3,"BS001");


INSERT INTO `rol_usuario` (`ROL_ID_ROL`, `USUARIO_ID_USUARIO`, `USUARIO_NUMERO_DOC`, `USUARIO_TD_USUARIO`) VALUES
('1', '1', '1233504764', 'CC'), 
('2', '2', '1127947342', 'CE');

select * from rol_usuario






