CREATE TABLE users (
user_id int primary key AUTO_INCREMENT,
username varchar(20),
password varchar(255),
created_date datetime,
CONSTRAINT UC_username UNIQUE(username)
)