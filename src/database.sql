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
creationDate DATE,
FOREIGN KEY(UserId) REFERENCES Users(id)
);
