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