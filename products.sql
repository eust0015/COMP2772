DROP DATABASE IF EXISTS products;
CREATE DATABASE products;

USE products;

CREATE TABLE products(
productID int(3) not null primary key,
productName char(30),
productPrice char(7),
pathName char(50)
);

create user if not exists dbadmin@localhost;
grant all privileges on products.products to dbadmin@localhost;

insert into products values(001, "USB to Lightning Cable", "$45.00", "images/USB to Lightning Cable.png");
insert into products values(002, "10W Wireless Charging Pad", "$49.95", "images/Charging Pad.png");
insert into products values(003, "5W USB Power Adapter", "$29.00", "images/5W USB Power Adapter.png");
insert into products values(004, "Headphones", "$349.00", "images/Headphones.png");
insert into products values(005, "Earphones", "$249.00", "images/Earphones.png");
insert into products values(006, "Power Bank", "$79.95", "images/Power Bank.png");
insert into products values(007, "Silicone Case", "$29.95", "images/Silicone Case.png");
insert into products values(008, "Leather Case", "$59.00", "images/Leather Case.png");
insert into products values(009, "Screen Protector", "$35.00", "images/Screen Protector.png");
insert into products values(010, "Phone Holder", "$49.00", "images/Phone Holder.png");
