CREATE TABLE `contact` ( 
    `contactId` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `dateCreated` DATETIME NOT NULL , 
    `dateUpdated` DATETIME NOT NULL , 
    PRIMARY KEY (`contactId`)
) ENGINE = InnoDB; 