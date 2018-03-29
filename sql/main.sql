CREATE TABLE `trtt_users`(
	`ID` int AUTO_INCREMENT,
	`name` varchar (66) NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_users_id PRIMARY KEY (ID)
);

INSERT INTO `trtt_users` (name) VALUES ('Admin/Owner');

CREATE TABLE `trtt_roles`(
	`ID` int AUTO_INCREMENT,
	`role` varchar (66) NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_roles_id PRIMARY KEY (ID)
); 

INSERT INTO `trtt_roles` (role) VALUES ('Administrator');

CREATE TABLE `trtt_user_roles`(
	`ID` int AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`role_id` int NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_user_roles_id PRIMARY KEY (ID),
	CONSTRAINT FK_user_roles_user_id FOREIGN KEY (user_id) REFERENCES trtt_users(ID),
	CONSTRAINT FK_user_roles_role_id FOREIGN KEY (role_id) REFERENCES trtt_roles(ID)
);

INSERT INTO `trtt_user_roles` (user_id, role_id) VALUES (1, 1);


CREATE TABLE `trtt_registry_types`(
	`ID` int AUTO_INCREMENT,
	`name` varchar (66) NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	`created_id` int NOT NULL,
	CONSTRAINT PK_registry_types_id PRIMARY KEY (ID),
	CONSTRAINT FK_registry_types_created_id FOREIGN KEY (created_id) REFERENCES trtt_users(ID)
);

INSERT INTO `trtt_registry_types` (name,created_id) VALUES ("Wedding Registry", 1), ("Baby Registry", 1), ("Wishlist", 1);


CREATE TABLE `trtt_customers`(
	`ID` int AUTO_INCREMENT,
	`first_name` varchar (66) NOT NULL,
	`last_name` varchar (66) NOT NULL,
	`email_address` varchar (128) NOT NULL,
	`password` varchar (128) NOT NULL,
	`registry_type_id` int NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_customers_id PRIMARY KEY (ID),
	CONSTRAINT FK_customers_registry_type_id FOREIGN KEY (registry_type_id) REFERENCES trtt_registry_types(ID)
);

CREATE TABLE `trtt_categories`(
	`id` int AUTO_INCREMENT,
	`title` varchar (100) NOT NULL,
	`description` varchar (255) NOT NULL,
	`image` LONGBLOB NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_categories_id PRIMARY KEY (id)
);

ALTER TABLE `trtt_categories` ADD `parent_id` INT, ADD CONSTRAINT FK_categories_category_id
FOREIGN KEY (parent_id) REFERENCES trtt_categories(id);

ALTER TABLE `trtt_categories` DROP FOREIGN KEY FK_categories_category_id;

INSERT INTO `trtt_categories` (id, title, description, parent_id) VALUES(1, "Glassware","Glassware", 0),
(2, "Crockery","Crockery", 0),
(3, "Kitchen Utensils","Kitchen Utensils", 0),
(4, "Linens","Linens", 0),
(5, "Sheets","Sheets", 4),
(6, "Sofa Covers","Sofa Covers", 4),
(7, "Curtains","Curtains", 4),
(8, "Bathroom Accessories","Bathroom Accessories", 0),
(9, "Mini Appliances","Mini Appliances", 0),
(10, "Home Accents","Home Accents", 0);

CREATE TABLE `trtt_products`(
	`id` int AUTO_INCREMENT,
	`title` varchar (66) NOT NULL,
	`description` varchar (66) NOT NULL,
	`price` varchar (128) NOT NULL,
	`image` LONGBLOB NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_products_id PRIMARY KEY (id)
);

CREATE TABLE `trtt_products_categories`(
	`id` int AUTO_INCREMENT,
	`product_id` int NOT NULL,
	`category_id` int NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_products_categories_id PRIMARY KEY (id),
	CONSTRAINT FK_products_categories_product_id FOREIGN KEY (product_id) REFERENCES trtt_products(id),
	CONSTRAINT FK_products_categories_category_id FOREIGN KEY (category_id) REFERENCES trtt_categories(id)
);

ALTER TABLE  `trtt_customers` ADD  `address_1` VARCHAR( 255 ) NOT NULL AFTER  `password` ,
ADD  `address_2` VARCHAR( 255 ) NOT NULL AFTER  `address_1` ,
ADD  `postal_code` VARCHAR( 255 ) NOT NULL AFTER  `address_2` ,
ADD  `state` VARCHAR( 255 ) NOT NULL AFTER  `postal_code` ,
ADD  `city` VARCHAR( 255 ) NOT NULL AFTER  `state` ,
ADD  `country` VARCHAR( 255 ) NOT NULL AFTER  `city`;

