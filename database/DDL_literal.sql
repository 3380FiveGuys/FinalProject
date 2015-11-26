/*** DDL_literal.sql ***/
CREATE TABLE detailed_transactions(
  transaction_id integer,
  transaction_type varchar(20),
  store_code varchar (15),
  item_description varchar(25),
  category varchar(10),
  department varchar(10),
  supplier varchar(15),
  supplier_code varchar(2),
  cost tinyint(1),
  price decimal(3,2),
  quantity integer,
  modifiers integer,
  subtotal decimal(10,2),
  tax decimal(10,2),
  discount integer,
  total decimal(10,2),
  cashier varchar(15),
  timedate varchar(15),
  register varchar(11)
) ENGINE=INNODB;

CREATE TABLE export_transactions_tenders() ENGINE=INNODB;
CREATE TABLE export_transactions() ENGINE=INNODB;
CREATE TABLE sales_report() ENGINE=INNODB;
CREATE TABLE sold_items() ENGINE=INNODB;
