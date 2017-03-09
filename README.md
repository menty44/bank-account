# Bank Account Manager

The bank account manager application project I built for my coding test from Pezesha

## Deployment

First, to see the application in action you will need to set up a database and configure the application as follows

```
Create a database called bank, with table transactions with the following columns

id - (an autoincreamenting id also set as primary key)
amount (decimal 10,2)
type (small integer) -an integer to specify whether deposit/withdrawal
count(small integer)increamented to determine if max allowed transactions
date (date) not timestamp
created_at (timestamp)
updated_at (timestamp)

Then update the .env file in the project root.
If using virtual hosts, you might want to specify the root folder as appdirectory/public
```
### Prerequisites

The application stores data in a database
The database used is mysql.

## Built With

* [Laravel](https://laravel.com/docs/5.4) - Laravel 5.4 framework
* [apache](https://www.apache.org/) running on apache on Linux Mint KDE
* [composer](https://getcomposer.org/doc/) Dependency Management
