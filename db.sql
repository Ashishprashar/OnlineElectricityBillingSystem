--creating main company table
CREATE TABLE `ebill`.`company` ( 
`name` VARCHAR(20) NOT NULL ,
 `com_id` INT(3) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
   `region` VARCHAR(20) NOT NULL ,
    PRIMARY KEY (`com_id`(3))
    ) ENGINE = InnoDB;
--creating supply branch table
CREATE TABLE `ebill`.`supply_branch` ( `name` VARCHAR(20) NOT NULL ,
 `region` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(20) NOT NULL , 
  `b_id` INT(4) NOT NULL , 
  `rate` INT(2) NOT NULL , 
`com_id` FOREIGN KEY (`com_id`) REFERENCES `company`(`com_id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  PRIMARY KEY (`b_id`)
  ) ENGINE = InnoDB;
--creating table for region
CREATE TABLE `ebill`.`region` ( 
`name` VARCHAR(20) NOT NULL , 
`r_id` INT(3) NOT NULL , 
PRIMARY KEY (`r_id`)
`b_id` FOREIGN KEY (`b_id`) REFERENCES `supply_branch`(`b_id`) on DELETE SET NULL
) ENGINE = InnoDB;

--creating table for consumer 
CREATE TABLE `ebill`.`consumer` ( 
`name` VARCHAR(20) NOT NULL , 
`c_id` INT(3) NOT NULL , 
`meter_id` INT(3) NOT NULL , 
`unit_consumed` INT(6) NOT NULL , 

`b_id` FOREIGN KEY (`b_id`) REFERENCES `supply_branch`(`b_id`) on DELETE SET NULL,
PRIMARY KEY(`c_id`)
) ENGINE = InnoDB;
--creating table for consumption record
create table ebill.consump_record(
    record_id int,
    c_id references consumer on delete set null,
    month varchar(20),
    status boolean,
    primary key(record_id)
) ENGINE = InnoDB;


INSERT INTO `company` (`name`, `com_id`, `password`, `region`) VALUES ('companyA', '111', 'admin', 'A'), ('companyB', '112', 'admin', 'B')
