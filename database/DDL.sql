/*** DDL.sql ***/

CREATE TABLE brand(
  supplier varchar(15) PRIMARY KEY NOT NULL
) ENGINE = INNODB;

CREATE TABLE food(
  item_description varchar(25) NOT NULL,
  sale_record_id long integer REFERENCES transaction(transaction_id),
  supplier varchar(15) REFERENCES brand,
  category varchar(20) REFERENCES food_category,
  unit_price decimal(6,2),
  quantity integer,
  price_total decimal(6,2),
  item_discount decimal(6,2),
  price decimal(6,2),
  PRIMARY KEY(sale_record_id, item_description)
) ENGINE = INNODB;

CREATE TABLE food_category(
  department varchar(15) NOT NULL,
  category varchar(15) NOT NULL,
  PRIMARY KEY (department, category)
) ENGINE = INNODB;

CREATE TABLE transaction(
  transaction_id long integer NOT NULL,
  timedate varchar(20) NOT NULL, /*e.g.: '12/11/2015 14:15' */
  cashier varchar(50) REFERENCES employee(cashier),
  c_type varchar(10) REFERENCES customer_type(customer_name),
  o_type varchar(10) REFERENCES operation_type(type),
  pay_method varchar(10) REFERENCES payment_method(tender_type),
  type_of_card varchar(16) REFERENCES card_type(card),
  receipt_num long integer,
  subtotal decimal(6,2),
  discount decimal(6,2),
  tax decimal(5,2),
  total decimal (7,2),
  PRIMARY KEY (transaction_id, timedate)
) ENGINE = INNODB;

CREATE TABLE food_transacion(
  transaction_id long integer REFERENCES transaction,
  timedate varchar(20) REFERENCES transaction,
  item_description varchar(25) REFERENCES food,
  PRIMARY KEY(transaction_id, timedate, item_description)
) ENGINE = INNODB;

CREATE TABLE customer_type(
  customer_name varchar(10) PRIMARY KEY NOT NULL
) ENGINE = INNODB;

CREATE TABLE employee(
  cashier varchar(30) PRIMARY KEY NOT NULL
) ENGINE = INNODB;

CREATE TABLE operation_type(
  type varchar(10) PRIMARY KEY NOT NULL
) ENGINE = INNODB;

CREATE TABLE payment_method(
  tender_type varchar(10) PRIMARY KEY NOT NULL,
  card_title varchar(20) REFERENCES card_type(card)
) ENGINE = INNODB;

CREATE TABLE card_type(
  card varchar(20) PRIMARY KEY NOT NULL
) ENGINE = INNODB;
