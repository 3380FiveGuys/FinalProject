/*** DDL.sql ***/

CREATE TABLE brand(
  supplier varchar(15) PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE food(
  item_description varchar(25),
  transaction_id bigint REFERENCES transaction ON DELETE CASCADE,
  supplier varchar(15) REFERENCES brand ON DELETE CASCADE,
  category varchar(20) REFERENCES food_category ON DELETE CASCADE,
  unit_price decimal(6,2),
  quantity integer,
  price_total decimal(6,2),
  item_discount decimal(6,2),
  price decimal(6,2),
  PRIMARY KEY(transaction_id)
) ENGINE = INNODB;

CREATE TABLE food_category(
  department varchar(15),
  category varchar(15) PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE transaction(
  transaction_id bigint REFERENCES operation_type,
  timedate datetime, /*e.g.: '12/11/2015 14:15' */
  c_name varchar(10) REFERENCES customer_type(customer_name) ON DELETE CASCADE,
  cashier varchar(50) REFERENCES employee(cashier) ON DELETE CASCADE,
  receipt_num varchar(10) REFERENCES payment_method(receipt_num) ON DELETE CASCADE,
  gratuity decimal(6,2),
  subtotal decimal(6,2),
  discount decimal(6,2),
  tax decimal(5,2),
  total decimal (7,2),
  PRIMARY KEY (transaction_id, timedate)
) ENGINE = INNODB;

CREATE TABLE food_transacion(
  transaction_id bigint REFERENCES food,
  timedate datetime REFERENCES transaction,
  PRIMARY KEY(transaction_id, timedate)
) ENGINE = INNODB;

CREATE TABLE customer_type(
  customer_name varchar(10) PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE employee(
  cashier varchar(30) PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE operation_type(
  type varchar(10),
  transaction_id bigint PRIMARY KEY
) ENGINE = INNODB;

CREATE TABLE payment_method(
  tender_type varchar(10),
  receipt_num varchar(20) REFERENCES card_type ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE card_type(
  card varchar(20),
  receipt_num bigint PRIMARY KEY
) ENGINE = INNODB;
