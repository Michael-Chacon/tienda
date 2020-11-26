CREATE DATABASE tienda;
use tienda;

CREATE TABLE usuarios(
    id int(255) auto_increment not null,
    nombre varchar(200) not null,
    apellidos varchar(200) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    rol varchar(20),
    imagen varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null, 'admin', 'admin', 'admin@gmail.com', 'adminroot', 'admin', null);

CREATE TABLE categorias(
    id int(255) auto_increment not null,
    nombre varchar(255) not null,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDb;

insert into categorias VALUES(null, 'manga corta');
insert into categorias VALUES(null, 'buzo');

CREATE TABLE productos(
    id int(255) auto_increment not null,
    categoria_id int(255) not null,
    nombre varchar(200) not null,
    descripcion text not null,
    precio float(100,2) not null,
    stock int(255) not null,
    oferta VARCHAR(2),
    fecha date not null,
    imagen VARCHAR (255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_productos_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos(
    id int(255) auto_increment not null,
    usuario_id int(255) not null,
    ciudad VARCHAR (255) not null,
    barrio varchar(200) not null,
    direccion VARCHAR (200) not null,
    costo float(255,2) not null,
    estado VARCHAR (50) not null,
    fecha date not null,
    hora  time,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedidos_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;


CREATE TABLE lineas_pedidos(
    id int(255) auto_increment not null,
    pedido_id int(255) not null,
    producto_id int (255) not null,
    CONSTRAINT pk_lineas_pedido PRIMARY KEY (id),
    CONSTRAINT fk_lineas_pedido FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_lineas_productos FOREIGN KEY (producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;

