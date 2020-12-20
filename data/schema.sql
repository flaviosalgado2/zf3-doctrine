create table post (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title varchar(255) not null,
    content text not null
);

insert into post(title, content) values ('post 1', 'content 1');

CREATE TABLE users(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(100),
    password VARCHAR(60),
    full_name VARCHAR (150) NOT NULL
);

INSERT INTO users(username, password, full_name) VALUES ('flaviosalgado2@hotmail.com', '$2y$10$F6zMy7t6Wb3jxlCE4nflpuWSf2aQ9RAv3w5/bty9m2gO2Pmls6OzC', 'flaviosalgado');

CREATE TABLE comments(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    content TEXT NOT NULL,
    post_id INTEGER NOT NULL
);

INSERT INTO comments(content, post_id) VALUES ('Comentario 1', 1);
INSERT INTO comments(content, post_id) VALUES ('Comentario 2', 2);
INSERT INTO comments(content, post_id) VALUES ('Comentario 3', 3);
INSERT INTO comments(content, post_id) VALUES ('Comentario 4', 4);