CREATE DATABASE IF NOT EXISTS laravel_master;
Use laravel_master;

CREATE TABLE users(
    id           int(255) auto_increment not null,
    role         varchar(20),
    name         varchar(255),
    surname      varchar(255),
    nick         varchar(255),
    email        varchar(255),
    password     varchar(255),
    image        varchar(255),
    created_at   datetime,
    updated_at   datetime,
    remember_token varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDB;

INSERT INTO users VALUES(NULL, 'user', 'Thomas', 'Moreno', 'tunjito', 'thomas@thomas.com', 'pass',null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(NULL, 'user', 'Yordy', 'Moreno', 'ñoño', 'yordy@yordy.com', 'pass',null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(NULL, 'user', 'Martha', 'Moreno', 'mama', 'martha@moreno.com', 'pass',null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(NULL, 'user', 'Manuel', 'Pardo', 'Marciano', 'Manuel@pardo.com', 'pass',null, CURTIME(), CURTIME(), NULL);


CREATE TABLE IF NOT EXISTS images(
    id           int(255) auto_increment not null,
    user_id      int(255),
    image_path   varchar(255),
    description  text,
    created_at   datetime,
    updated_at    datetime,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDB;

INSERT INTO images VALUES(NULL ,1, 'test.jpg', 'imagen de prueba', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL ,1, 'playa.jpg', 'imagen de paseo', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL ,1, 'carro.jpg', 'imagen de auto', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL ,3, 'familia.jpg', 'imagen de todos', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS comments(
     id            int(255) auto_increment not null,
     user_id       int(255),
     image_id      int(255),
     content       text,
     created_at    datetime,
     updated_at    datetime,
     CONSTRAINT pk_comments PRIMARY KEY(id),
     CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
     CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDB;

INSERT INTO comments VALUES(NULL, 1, 4, 'Buena foro en familia', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 1, 'Buena for en playa', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 4, 'Que tan burno', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS likes(

     id               int(255) auto_increment not null,
     user_id          int(255),
     image_id         int(255),
     created_at       datetime,
     updated_at       datetime,
     CONSTRAINT pk_likes PRIMARY KEY(id),
     CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
     CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)

INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME());

)ENGINE=InnoDB;