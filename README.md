
## Who is your favorite Walker

**Who is your favorite Walker - Symfony Based Project**  
_A brief introduction to this project, what it is about, and what it does._

## Table of Contents

- [About the Project](#about-the-project)
- [Installation Instructions](#installation-instructions)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Security](#security)
- [Database Setup and Communication](#database-setup-and-communication)
- [License](#license)

---

### About the Project

Welcome to "Who Is Your Favorite Walker," the ultimate fan site dedicated to the most iconic walkers from The Walking Dead series. This site allows fans like you to explore a curated list of the most memorable walkers from the show and even contribute by submitting your own favorites. Our mission is to celebrate the creativity and impact of the undead in The Walking Dead universe. Whether it's a particularly gruesome walker or one with a unique backstory, this is the place to share and discover them. We hope you enjoy exploring the site and adding your own contributions to the ever-growing list of The Walking Dead Walkers.

---

### Installation Instructions

To get the project running on your server, follow these steps:

1. Clone the repository from GitHub:

   ```bash
   git clone https://github.com/WeissBang/whoisyourfavoritewalker.git
   ```
   or just download the project yourself

2. Install the required dependencies via Composer:

   ```bash
   composer install
   ```

3. Set up the environment configuration:

   If you're running this project on a local server, create a `.env.local` file in the root directory based on the `.env` file. In this file, configure your database connection settings:

   ```
   example: DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
   ```
   !!! Do not forget to create your database (php bin/console doctrine:database:create) !!!

4. Set up the database:

   Run the following commands to create the database schema, run migrations, and load the fixture data (this will pre-populate the database with an example data for you to see so do not fixtures:load if you want to add your own data !).

   ```bash
   php bin/console make:migration
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

5. Start the Symfony local server ("symfony server:stop" if a server is already running):

   ```bash
   symfony serve --no-tls
   ```

   You can then access the project in your browser at `http://127.0.0.1:8000`(!!! This might be different for you !!!).

---

### Project Structure

This section highlights key parts of the project:

- **Main functionality**: Users are able to view and add their own walkers using the form already created that works using the controller to automate the process.
- **Admin Area**: The Admin area handles the admin dashboard, allowing administrators to manage walkers, review them and then edit or delete them if need be.
- **Entities**: The database entities, including `Zombie` and `User` are defined in the `src/Entity/` directory and represent the project's core data models.
- **Security**: Symfony's security component ensures that only authorized users can access the admin section. This is configured in the `security.yaml` file, and the logic to manage roles is present in `AdminController.php`.

---

### Usage

Once the application is running, users can:

- Access to the "Wall of the Dead" to see all the walkers that have been already added.
- Navigate through different pages of the project, each having their own use.
- Admin users can log in to manage settings, view walkers, and make changes to the 'Wall of the Dead' page.

---

### Security

pre-loaded admin:     user:admin  password:1234admin
Security is a critical aspect of this project, particularly for the admin page. Here’s an overview:

- **Admin Access Control**: The database has users that are authorized to access it (in the User table), by using the admin login page you can unlock the admin dashboard if not already logged in. You can add more admin accounts if needed by adding them in the User table in the Database. There is already a preloaded admin by loading the fixtures in so that you can try it out (user:admin - password:1234admin)
  
- **Password Hashing**: All user passwords are hashed using Symfony's default password encoder.

- **Login Protection**: A basic login form and authentication system are implemented using Symfony’s Security component, ensuring that users must authenticate before accessing certain pages.

---

### Database Setup and Communication

The project uses Doctrine ORM for database communication. Here’s how it works:

- **Entity Mapping**: The entities, such as `Zombie` and `User`, are mapped to the database tables via Doctrine annotations.
  
- **Database Migrations**: Migrations are used to version the database schema. If you need to make any changes to the schema, run the following command:

  ```bash
  php bin/console make:migration
  php bin/console doctrine:migrations:migrate
  ```

- **Fixtures**: The project comes with pre-loaded data fixtures to provide some initial game data, which can be loaded using:

  ```bash
  php bin/console doctrine:fixtures:load
  ```

---

### Notes

-The ExceptionListener.php in src/EventListener does not work yet and is a work in progress, however do not remove the file as it will result in fatal errors.
-The project uses Bootstrap but you can change it to something else.
-All custom CSS is located at assets/styles/style.css.

---

### License

MIT License

Copyright (c) 2024 Who is your favorite Walker

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.