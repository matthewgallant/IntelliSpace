# IntelliSpace

Makerspace Usage &amp; Management Tool

## About

This project is written primarily in PHP for the server-side code. The front-end code is written in HTML, CSS, and JS. The CSS libraries used are custom Bootstrap 4 themes called [Flatly](https://bootswatch.com/flatly/) and [Darkly](https://bootswatch.com/darkly/) by [Bootswatch](https://bootswatch.com) depending on which theme is selected in the database and admin panel.

The main purpose of this project is to allow a makerspace to manage usage information and data primiarily used for acquiring grants and funding. Not only can you view data, but you can also export the data directly into an Excel-compatible file.

## Installation

#### SQL Database

Import the `database.sql` file found in the root of this repo into your SQL server using a tool like phpMyAdmin or Sequel Pro. You then need to edit the `database.conf` file to reflect your database setup (database location, username, password, database name). In addition to this, you may have to edit several `.php` files to reflect the location of your `database.conf` file. For the sake of security, you should place the ```database.conf``` below the root of your web server so that the file is not publically accessible and not potentially exposing your SQL login details.

#### Server Files

All you need to do is upload the contents of the `server` folder to the root folder of your web server and upload the `database.conf` file at least one folder below that or wherever you like so long as you edit the `.php` files that load from that file.

#### Configuring the Installation

##### Installation Info

You will want to configure your site by editing the first row in the `setup` table of your database you just installed as follows:

| Name           | Input                                             |
| -------------- | ------------------------------------------------- |
| id             | 1                                                 |
| system_name    | Your makerspace name                              |
| system_theme   | Color theme (light or dark)                       |
| system_pages   | Pages to show user (Ex: students, classes, tools) |
| system_version | 2.0                                               |

##### Admin Account

You will want to setup an admin account to manage data without using a tool like phpMyAdmin. To do this, create an entry in the `logins` table with the following information: an email, a bcrypt encrypted password (you can create one [here](https://php-password-hash-online-tool.herokuapp.com/password_hash)), and a name. You can then access the admin panel by going to the `admin` folder in a web browser.

##### Usage

To use the site, have users go to the root of your web server. This should automatically redirect them to the check in page.

## License

This software is licensed under the MIT license and is available in LICENSE.md.
