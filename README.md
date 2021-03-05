# IntelliSpace

Makerspace Usage &amp; Management Tool

## Installation
#### SQL Database
Import the ```.sql ``` file found in this repo into your database using a tool like phpMyAdmin or manually. You then need to edit the ```database.conf``` file to reflect your database setup (database location, username, password, database name).

#### Server Files
All you need to do is upload the ```Server``` folder to the html root folder of your server, and upload the database.conf file one folder below that. NOTE: please make sure that database.conf file is below the root of your main server folder. Failure to do so would result in your database credentials being publically available on the internet.

#### Configuring the Installation
##### Website Info
You will want to configure your site by editing the first row in the ```setup``` table of your database you just installed. An example of the options would be id = 1, system_name = "Makerspace Website", system_theme = "dark", system_pages = "student, classes, tools", system_version = "2.0".

##### Admin Account
You will want to setup an admin account to manage data without using a tool like phpMyAdmin. To do this, create an entry in the ```logins``` table with the following information: an email, a bcrypt encrypted password (you can create one [here](https://php-password-hash-online-tool.herokuapp.com/password_hash)), and a name. Now you can login at the root of your web server/admin/.

##### Usage
To use the site, have people go to the root of your web server. This should automatically redirect them to a check in page.

## License
This software is licensed under the MIT license and is available in LICENSE.md.