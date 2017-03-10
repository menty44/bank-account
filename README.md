# Bank Account Manager

The bank account manager application project I built for my coding test from Pezesha

## Deployment

First, to see the application in action you will need to set up a database and configure the application as follows

Create a database called bank, with table transactions with the following columns
```
id - (an autoincreamenting id also set as primary key)
amount (decimal 10,2)
type (small integer) -an integer to specify whether deposit/withdrawal
count(small integer)increamented to determine if max allowed transactions
date (date) not timestamp
created_at (timestamp)
updated_at (timestamp)
```
###Or simply run the folowing sql queries
```
CREATE DATABASE IF NOT EXISTS `bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

CREATE USER 'bankadmin'@'localhost' IDENTIFIED BY PASSWORD 'hackerGuru2017';

GRANT ALL PRIVILEGES ON `bank`.* TO 'bankadmin'@'localhost' WITH GRANT OPTION;

USE `bank`;

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL,
  `type` smallint(1) NOT NULL,
  `count` smallint(1) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

```
Update the .env file in the project root with your database credentials if you used something different.

If using virtual hosts, you might want to specify the root folder as appdirectory/public

Also ensure you update the app url correctly. e.g. on windows you might have
```
http://localhost/bank
```

### Prerequisites

The application stores data in a database.
The database used is mysql.

## Built With

* [Laravel](https://laravel.com/docs/5.4) - Laravel 5.4 framework
* [apache](https://www.apache.org/) running on apache on Linux Mint KDE
* [composer](https://getcomposer.org/doc/) Dependency Management
