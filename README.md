=== Crypto Coins ===

Simple PHP script for collecting crypto currency data from the [coinmarketcap API](https://coinmarketcap.com/api/) and storing in a MySQL database for further analysis.

# Why not just use the API directly?:
Since the endpoints return the data as JSON you may be asking yourself, what is the point? Why not just cut out the middle man and use the API directly?

Mostly for the purpose of historical data and trend analysis. Once you have your MySQL database full of data, you have flexibility to process how you see fit. 

# Current Routes:

/update - Gets the latest market data and stores the currency price information to the pricedata table.

/daily-winners/{hour|day|week} - Get the top ten performing currencies for a given time period.

/daily-losers/{hour|day|week} Get the ten worst performing currencies for a given time period.

# Application Setup:

Create a MySQL database for the application to use, and import the structure from the sql/crytocoins.sql file.

Add the database credentials for your setup to the config/config.ini file. 

Install [Composer](https://getcomposer.org/) so you can get all of the needed dependencies if you don't have it on your system already. Then run "composer install" to fetch the required dependencies.

# Required Libraries:

Dependencies are for the application are managed by Composer. The external libraries needed are as follows:

* [Redbean ORM](http://www.redbeanphp.com/)
* [Klein](https://github.com/chriso/klein.php)

# Licence

Copyright (C) 2017 [Anthony Mills](http://www.anthony-mills.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.