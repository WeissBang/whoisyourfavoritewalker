
# README for Your Symfony Project

## Project Title

**Zombie Game - Symfony Based Application**  
_A brief introduction to your project, what it is about, and why it's useful._

## Table of Contents

- [About the Project](#about-the-project)
- [Installation Instructions](#installation-instructions)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Security](#security)
- [Database Setup and Communication](#database-setup-and-communication)
- [Contributing](#contributing)
- [License](#license)

---

### About the Project

This project is a zombie survival game implemented using the Symfony framework. It features an administrative dashboard with secure access and leverages a database to store player progress, game levels, and statistics.

The primary goal of the project is to create a simple web-based game that allows players to explore a zombie-infested world, battle enemies, and manage their resources.

---

### Installation Instructions

To get the project running on your local server, follow these steps:

1. Clone the repository from GitHub:

   ```bash
   git clone https://github.com/YourUsername/zombie-game.git
   cd zombie-game
   ```

2. Install the required dependencies via Composer:

   ```bash
   composer install
   ```

3. Set up the environment configuration:

   If you're running this project on a local server, create a `.env.local` file in the root directory based on the `.env` file. In this file, configure your database connection settings:

   ```
   DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
   ```

4. Set up the database:

   Run the following commands to create the database schema, run migrations, and load the fixture data (this will pre-populate the database with game data).

   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

   > **Note**: The fixtures are already set up with initial game data.

5. Start the Symfony local server:

   ```bash
   symfony serve
   ```

   You can then access the project in your browser at `http://127.0.0.1:8000`.

---

### Project Structure

This section highlights key parts of the project:

- **Game Logic**: All game-related functionality (such as combat mechanics, player health, and enemy behavior) is found in the `src/Controller/GameController.php` file.
- **Admin Area**: The `AdminController.php` handles the admin dashboard, allowing administrators to manage users, game settings, and view analytics.
- **Entities**: The database entities, including `Player`, `GameLevel`, and `Enemy`, are defined in the `src/Entity/` directory and represent the game's core data models.
- **Security**: Symfony's security component ensures that only authorized users can access the admin section. This is configured in the `security.yaml` file, and the logic to manage roles is present in `AdminController.php`.

---

### Usage

Once the application is running, users can:

- Create an account and start playing the game.
- Navigate through different levels of the game, each populated with various enemies and challenges.
- Admin users can log in to manage game settings, view reports, and make changes to player data.

---

### Security

Security is a critical aspect of this project, particularly for the admin page. Here’s an overview:

- **Role-Based Access Control (RBAC)**: The security system in Symfony controls access to different parts of the application based on user roles. Admin users have higher privileges, allowing them to access the `/admin` routes, which are secured in the `security.yaml` file.
  
- **Password Hashing**: All user passwords are hashed using Symfony's default password encoder.

- **Login Protection**: A basic login form and authentication system are implemented using Symfony’s Security component, ensuring that users must authenticate before accessing certain pages.

---

### Database Setup and Communication

The project uses Doctrine ORM for database communication. Here’s how it works:

- **Entity Mapping**: The entities, such as `Player` and `GameLevel`, are mapped to the database tables via Doctrine annotations.
  
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

### Contributing

If you would like to contribute to the project, feel free to fork the repository and create a pull request. Contributions are always welcome!

1. Fork the project
2. Create a new branch (`git checkout -b feature/NewFeature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/NewFeature`)
5. Open a Pull Request

---

### License

This project is licensed under the MIT License.
