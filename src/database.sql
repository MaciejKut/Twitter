CREATE TABLE Users(
id int PRIMARY KEY AUTO_INCREMENT,
email varchar(255) NOT NULL UNIQUE,
name varchar(255) NOT NULL,
hashed_password VARCHAR(255) NOT NULL
);

CREATE TABLE Tweet(
id int PRIMARY KEY Auto_INCREMENT,
userId int NOT NULL,
text varchar(144),
creationDate DATETIME,
FOREIGN KEY(UserId) REFERENCES Users(id)
);

CREATE TABLE Comment(
id int PRIMARY KEY Auto_INCREMENT,
id_user int NOT NULL,
id_post int NOT NULL,
creation_date DATETIME,
text varchar(144),
FOREIGN KEY(id_user) REFERENCES Users(id),
FOREIGN KEY(id_post) REFERENCES Tweet(id)
);
