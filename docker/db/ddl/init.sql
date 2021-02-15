use fxdb;

CREATE TABLE IF NOT EXISTS trade (
    id int AUTO_INCREMENT,
    trading_date date,
    settlement_date date,
    currency_pair_id int,
    trade_type int,
    quantity int,
    entry_price float(8,5),
    exit_price float(8,5),
    stop_loss int,
    profit float(15,5),
    comment text,
    image_id int,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS currency_pair (
    id int,
    currency_pair varchar(7),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS image (
    id int,
    file_name varchar(50),
    PRIMARY KEY(id)
);


insert into currency_pair values(1,'USD/JPY');
insert into currency_pair values(2,'EUR/JPY');
insert into currency_pair values(3,'GBP/JPY');
insert into currency_pair values(4,'AUD/JPY');
insert into currency_pair values(5,'NZD/JPY');
insert into currency_pair values(6,'CAD/JPY');
insert into currency_pair values(7,'EUD/USD');
insert into currency_pair values(8,'GBP/USD');
insert into currency_pair values(9,'AUD/USD');

insert into trade values(1,'2020-12-17','2020-12-17',1,1,10000,105.10000,105.60000,10,5000.00000,null,null);
insert into trade values(2,'2020-12-18','2020-12-18',2,2,10000,125.20000,125.10000,10,-1000.00000,null,null);
insert into trade values(3,'2020-12-19','2020-12-19',4,1,10000,78.50000,78.70000,10,2000.00000,null,null);
