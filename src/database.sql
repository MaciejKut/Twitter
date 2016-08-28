CREATE TABLE Users(
id int PRIMARY KEY AUTO_INCREMENT,
email varchar(255) NOT NULL UNIQUE,
name varchar(255) NOT NULL,
hashed_password VARCHAR(255) NOT NULL
);
