CREATE TABLE valet_users (
valet_user_id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(20),
password VARCHAR(255),
created_date DATETIME,
CONSTRAINT UC_username UNIQUE(username)
)