create database bdAulaPw3;
use bdAulaPw3;
create table tbCategoria(
	idCategoria int PRIMARY key AUTO_INCREMENT
    ,categoria varchar(40)    
);

create table tbProduto(
	idProduto int PRIMARY key AUTO_INCREMENT
    ,produto varchar(40)
    ,idCategoria int
    ,valor float
    ,img varchar(150)
    ,FOREIGN key (idCategoria) REFERENCES tbCategoria(idCategoria)
);
 create table tbUsuario(
    idUsuario int PRIMARY key AUTO_INCREMENT
    ,usuario varchar(40)
    ,senha varchar(40)
 );

insert into tbusuario values (null,'emyguidi', 'spoke123');

insert into tbcategoria values (null,'Alimentação');
insert into tbcategoria values (null,'Tecnologia');
insert into tbcategoria values (null,'Limpeza');
insert into tbcategoria values (null,'Brinquedos');


insert into tbproduto values(null,'Biscoito',1,3.0, "image/biscoito.jpg");
insert into tbproduto values(null,'Smartphone',2,4000, "image/cel.jpg");
insert into tbproduto values(null,'Aspirador',3,200, "image/aspirador.jpg");
insert into tbproduto values(null,'Barbie',4,59.90, "image/barbie.jpg");