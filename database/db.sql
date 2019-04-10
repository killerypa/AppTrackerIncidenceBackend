use atlastracker;
select * from users;

truncate table users;
 

CREATE TABLE `atlastracker`.`users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(100) NOT NULL , `role` ENUM('administrator','employee','client') NOT NULL DEFAULT 'client' , `status` ENUM('activated','disabled') NOT NULL DEFAULT 'disabled' , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE `user_email` (`email`(255))) ENGINE = InnoDB;