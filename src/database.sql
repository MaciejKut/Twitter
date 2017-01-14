CREATE DATABASE Twitter;

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

CREATE TABLE Meesages(
id int PRIMARY KEY Auto_INCREMENT,
sender int,
reciver int,
creation_date DATETIME,
text varchar(255),
status int NOT NULL,
meesage_subject varchar(255),
);

CREATE TABLE meesages_users(
id int AUTO_INCREMENT,
meesage_id int NOT NULL,
user_id int NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(meesage_id) REFERENCES Meesages(id),
FOREIGN KEY(user_id) REFERENCES Users(id)
);
