/*** DDL.sql ***/
/*
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
*/

CREATE TABLE transaction(
  transaction_id long int PRIMARY KEY,
  timedate varchar(16), /*e.g.: '12/11/2015 14:15' */
  quantity integer,
  cashier varchar(50) REFERENCES employee(cashier),
  c_type varchar(10) REFERENCES customer_type(customer_name),
  o_type varchar(10) REFERENCES operation_type(type),
  pay_method varchar(10) REFERENCES payment_method(tender_type),
  type_of_card varchar(16) REFERENCES card_type(card),
  price decimal(5,2),
  total decimal (7,2)
) ENGINE = INNODB;

/*
CREATE TABLE food_transacion(

) ENGINE = INNODB;
*/

CREATE TABLE customer_type(
  customer_name varchar(10) PRIMARY KEY,
) ENGINE = INNODB;

CREATE TABLE employee(
  cashier varchar(30) PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE operation_type(
  type varchar(10) PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE payment_method(
  tender_type varchar(10) PRIMARY KEY,
  card_title varchar(16) REFERENCES card_type(card)
) ENGINE = INNODB;

CREATE TABLE card_type(
  card varchar(16) PRIMARY KEY
) ENGINE = INNODB;
