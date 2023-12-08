<!-- Table for sql-->
CREATE TABLE users1 (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        username VARCHAR(255) UNIQUE NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        confirmpassword VARCHAR(255) NOT NULL
);
