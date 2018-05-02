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

CREATE TABLE `trtt_ocassions`(
	`id` int AUTO_INCREMENT,
	`title` varchar (66) NOT NULL,
	`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_datetime` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_ocassions_id PRIMARY KEY (id)
); 

INSERT INTO `trtt_ocassions` (`title`) VALUES ("Wedding Registry"), ("Personal Wishlist");

CREATE TABLE `trtt_registery_status`(
	`id` int AUTO_INCREMENT,
	`name` varchar (66) NOT NULL,
	`create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` timestamp NULL,
	CONSTRAINT PK_ocassions_id PRIMARY KEY (id)
); 

INSERT INTO `trtt_registery_status` (`name`) VALUES ("in progress"), ("completed"), ("delivered");

CREATE TABLE `trtt_gift_delivery_preference`(
	`id` int AUTO_INCREMENT,
	`name` varchar (66) NOT NULL,
	`create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` timestamp NULL,
	CONSTRAINT PK_gift_delivery_preference_id PRIMARY KEY (id)
); 

INSERT INTO `trtt_gift_delivery_preference` (`name`) VALUES ("delivery"), ("pick up in store");

CREATE TABLE `trtt_customers_shipping_info`(
	`id` int AUTO_INCREMENT,
	`customer_id` int NOT NULL,
	`first_name` varchar (66) NOT NULL,
	`last_name` varchar (66) NOT NULL,
	`address_1` VARCHAR( 255 ) NOT NULL,
	`address_2` VARCHAR( 255 ) NOT NULL,
	`postal_code` VARCHAR( 255 ) NOT NULL,
	`state_id` INT NOT NULL,
	`city_id` INT NOT NULL,
	`country_id` INT NOT NULL,
	`create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` timestamp NULL,
	`status` boolean NULL DEFAULT true,
	CONSTRAINT PK_customers_shipping_info_id PRIMARY KEY (id),
	CONSTRAINT FK_customers_shipping_info_customer_id FOREIGN KEY (customer_id) REFERENCES trtt_customers(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT FK_customers_shipping_info_customer_state_id FOREIGN KEY (state_id) REFERENCES trtt_states(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT FK_customers_shipping_info_customer_city_id FOREIGN KEY (city_id) REFERENCES trtt_cities(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT FK_customers_shipping_info_customer_country_id FOREIGN KEY (country_id) REFERENCES trtt_countries(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE `trtt_registeries`(
	`id` int AUTO_INCREMENT,
	`ocassion_id` int,
	`title` varchar(255),
	`first_name` varchar (66) NOT NULL,
	`last_name` varchar (66) NOT NULL,
	`partner_name` varchar (66) NOT NULL,
	`event_date` char(10) NOT NULL,
	`delivery_preference_id` int NOT NULL,
	`promo_code` char(6),
	`registery_status_id` int,
	CONSTRAINT PK_registeries_id PRIMARY KEY (id),
	CONSTRAINT FK_registeries_ocassion_id FOREIGN KEY (ocassion_id) REFERENCES trtt_ocassions(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT FK_registeries_delivery_preference_id FOREIGN KEY (delivery_preference_id) REFERENCES trtt_gift_delivery_preference(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT FK_registeries_registery_status_id FOREIGN KEY (registery_status_id) REFERENCES trtt_registery_status(id) ON UPDATE CASCADE ON DELETE RESTRICT
);
