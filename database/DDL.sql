/*** DDL.sql ***/
CREATE TABLE brand(
  supplier varchar(15)
) ENGINE = INNODB;

CREATE TABLE food(
  item_description varchar(25)
) ENGINE = INNODB;

CREATE TABLE food_category(
  department varchar(15),
  category varchar(15)
) ENGINE = INNODB;

CREATE TABLE transaction(
  transaction_id,
  timedate varchar(16), /*e.g.: '12/11/2015 14:15' */
  quantity integer,
  price decimal(5,2),
  total decimal (7,2)
) ENGINE = INNODB;

CREATE TABLE food_transacion(

) ENGINE = INNODB;

CREATE TABLE customer_type(
  customer_name varchar(10)
) ENGINE = INNODB;

CREATE TABLE employee(
  cashier varchar(30)
) ENGINE = INNODB;

CREATE TABLE operation_type(
  operation_type varchar(10)
) ENGINE = INNODB;

CREATE TABLE payment_method(
  tender_type varchar(10)
) ENGINE = INNODB;

CREATE TABLE card_type(
  card_type varchar(16)
) ENGINE = INNODB;
