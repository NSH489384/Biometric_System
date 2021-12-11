USE biometric_system;
-- --------------------------- PERSONA
INSERT INTO persona(ID_PERSONA,TD_PERSONA,PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,TELEFONO)
VALUES("1233504764","CC","NOHORA","LISETH","ROJAS","YEPES",3112807335);
INSERT INTO persona values("103255444","CE","MANUEL","ALBERTO","VASQUEZ","MANCILLA",3114475112);
INSERT INTO persona values("10873452","TI","JEIDY",NULL,"ROJAS","YEPES",3015478974);
INSERT  INTO persona values("12234456","PA","NINEDLY",NULL,"HUEPA","DUCUARA",32134567889);
INSERT  INTO persona values("03010405","CC","CRUZ","CECILIA","BLANDON","CORDOBA",3201239789);
INSERT INTO persona values("1213141516","TI","ALEXANDER",NULL,"YEPES","CERON","3012587478");
INSERT INTO persona values("252426272","PA","FRANCISCO","JAVIER","LONDOÑO","QUINTERO",3025345789);
INSERT INTO persona values("343536373","CC","VALERY","ALEXANDRA","MANCILLA",null,3145759789);
INSERT INTO persona values("454647489","CE","LUIS","JOSE","ROJAS","YEPES",3112807335);
INSERT INTO persona values("25082006","TI","YEINER","RAUL","ROJAS","YEPES",3102587974);
INSERT INTO persona values("24488680","CC","Adriana",null, "jaramillo", "arango",3114790770);
INSERT INTO persona values("1035004082","CE","Adriana",NULL,"leon",NULL,3186150531);
INSERT INTO persona values("1039446153","CC","Albert","santiago","cano","sucerquia",3148602006);
INSERT INTO persona values("1125579040","CE","Ana","maria","jaramillo","cordoba",3127207256);
INSERT INTO persona values("1000090367","TI","Brayan","daniel","cano","pérez",3022649631);
INSERT INTO persona values("1001577783","CC","Camila",NULL,"medina",NULL,2526655);
INSERT INTO persona values("98559269","CE","Carlos","alberto","vargas","vélez",3188896906);
select * from persona

-- ---------------------- BENEFICIARIO
INSERT INTO beneficiario(ID_BENEFICIARIO,TD_BENEFICIARIO,ESTADO_BENEFICIARIO)
VALUES("10873452","TI",1);
INSERT INTO beneficiario VALUES("1035004082","CE",1);
INSERT INTO beneficiario VALUES("1001577783","CC",1);
INSERT INTO beneficiario VALUES("454647489","CE",1);


 

-- ----------------- --- USUARIO 
INSERT INTO usuario(ID_USUARIO,NUMERO_DOC,TD_USUARIO,CONTRASEÑA,CORREO_USUARIO,ESTADO_USUARIO,RECUPERAR_CONTRASEÑA,CAMBIO_CONTRASEÑA)
VALUES(1,"1233504764","CC","raulrojas","nlrojas93@misena.edu.co",1,null,null);
INSERT INTO usuario
VALUES(2,"12234456","PA","avena","nshuepa@misena.edu.co",1,null,null);
INSERT INTO usuario values(2,"252426272","PA","1234megastore","fjlondoño@gmail.com",1,null,null);
INSERT INTO usuario values(3,"10873452","TI","25082006","jyrojas@gmail.com",1,null,null);
INSERT INTO usuario values(4,"1039446153","CC","3148602","ascano@misena.edu.co",1,null,null);
INSERT INTO usuario values(5,"1035004082","CE","leon1234","Adriana_leon@YAHOO.ES",1,null,null);
INSERT INTO usuario values(6,"1213141516","TI","alex3456","ayepes@gmail.com",1,null,null);
INSERT INTO usuario values(7,"98559269","CE","CARLOS5467","carlos.vargas@andercol.com.co",1,null,null);
INSERT INTO usuario values(8,"03010405","CC","Ceci5463","ccblandon@misena.edu.co",1,null,null);




-- -------------------------- ADMINISTRADOR
INSERT INTO administrador(USUARIO_NUMERO_DOC,USUARIO_TD_USUARIO)
VALUES("1233504764","CC");
INSERT INTO administrador VALUES("12234456","PA");
INSERT INTO administrador values("03010405","CC");



--  --------------- CIUDAD
insert into ciudad (ID_CIUDAD,DES_CIUDAD,ESTADO_CIUDAD)
values(1,"Bogotá",1);
insert into ciudad values(2,"Cali",1);
insert into ciudad values(3,"Medellin",1);
insert into ciudad values(4,"Buscaramanga",1);
insert into ciudad values(5,"Neiva",1);

-- ---------------- EPS
insert into eps(ID_EPS,DES_EPS,ESTADO_EPS)
values(1,"Sanitas",1);
insert into eps values(2,"Sura",1);
insert into eps values(3,"Famisanar",1);
insert into eps values(4,"Colsubsidio",1);


-- -------------- PARENTESCO
insert into parentesco(ID_PARENTESCO,DES_PARENTESCO,ESTADO_PARENTESCO)
values(1,"Esposo(a)",1);
insert into parentesco values(2,"Hermano(a)",1);
insert into parentesco values(3,"Tio(a)",1);
insert into parentesco values(4,"Sobrino(a)",1);
insert into parentesco values(5,"Primo(a)",1);
insert into parentesco values(6,"Cuñado(a)",1);
insert into parentesco values(7,"Abuelo(a)",1);

 select *from persona;

-- CONTACTO_EMERGENCIA

insert into contacto_emergencia(ID_CONTACTO,TD_CONTACTO,ESTADO_CONTACTO,ID_PARENTESCO_C)
values("103255444","CE",1,1);
insert into contacto_emergencia values("343536373","CC",1,6);
insert into contacto_emergencia values("25082006","TI",1,2);
insert into contacto_emergencia values("454647489","CE",1,5);


-- -------------  CLIENTE

insert into cliente (ID_CLIENTE,TD_CLIENTE,DIRECCION,ESTADO_CLIENTE,NUMERO_DOC_CONTACTO_E,TD_CONTACTO_E,FK_CIUDAD,FK_EPS)
values("252426272","PA","Cra 54 # 46 SUR",1,"103255444","CE",2,4);
insert into cliente values("10873452","TI","Cra 87 # 23 Norte",1,"343536373","CC",3,1);
insert into cliente values("98559269","CE","Cra 45# 23 sur",1,"454647489","CE",4,3);


--  ----------------- ROL
insert into rol (ID_ROL,DESC_ROL,ESTADO_ROL)
values(1,"Administrador",1);
insert into rol values(2,"Cliente",1);


select * from login;

-- ----------------- LOGN
insert into login (ID_LOGIN,NUMERO_DOC_LOG,TIPO_DOC,CONTRASEÑA_LOGIN,ROL_ID_ROL)
values(1,"10873452","TI","25082006",2);
insert into login values(2,"1233504764","CC","raulrojas",1);
insert into login values(3,"12234456","PA","avena",1);

-- ------------ MODELO
insert into modelo_vehiculo(ID_MODELO,DES_MODELO,ESTADO_MODELO)
values(1,"BMW",1);
insert into modelo_vehiculo values(2,"Mercedes_Benz",1);
insert into modelo_vehiculo values(3,"Lexus",1);
insert into modelo_vehiculo values(4,"Renault",1);
insert into modelo_vehiculo values(5,"Ford",1);
insert into modelo_vehiculo values(6,"Opel",1);

-- ---------- TIPO VEHICULO
insert into tipo_vehiculo values(1,"carro",1);
insert into tipo_vehiculo values(2,"motocicleta",1);

-- ------------- BIOMETRICO
insert into biometrico values("BS001");
insert into biometrico values("BS002");
insert into biometrico values("BS003");

--  ------------ VEHICULO
insert into vehiculo(PLACA,COLOR,ESTADO_VEHI,FK_TIPO_VEHICULO,FK_MODELO,FK_BIOMETRICO)
values("azs_123","Azul",1,1,3,"BS001");
insert into vehiculo values("dep_345","rojo",1,2,5,"BS002");
insert into vehiculo values("SER_235","gris",1,1,6,"BS003");

insert into rol_usuario (ROL_ID_ROL, USUARIO_ID_USUARIO, USUARIO_NUMERO_DOC, USUARIO_ID_USUARIO) VALUES
(1, 2, 252426272, "PA"),
(1, 1, 1233504764, "CC");

INSERT INTO `rol_usuario` (`ROL_ID_ROL`, `USUARIO_ID_USUARIO`, `USUARIO_NUMERO_DOC`, `USUARIO_TD_USUARIO`) VALUES
('1', '2', '252426272', 'PA'), 
('1', '1', '1233504764', 'CC'), 
('2', '3', '10873452', 'TI'), 
('2', '4', '1039446153', 'CC');

select * from rol_usuario






