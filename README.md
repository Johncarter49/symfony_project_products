# Symfony Product Management Application

A modern web application built with Symfony 7.x for managing products with full CRUD (Create, Read, Update, Delete) operations.

## 🚀 Features

- **Product Management**: Complete CRUD operations for products
- **Modern UI**: Clean and responsive interface built with Twig templates
- **Database Integration**: SQLite database with Doctrine ORM
- **Form Validation**: Built-in form validation and error handling
- **Web Profiler**: Development debugging and profiling tools
- **Data Fixtures**: Sample data for testing and development
- **Migrations**: Database schema version control

## 📋 Requirements

- PHP 8.1 or higher
- Composer
- Symfony CLI (optional but recommended)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Johncarter49/symfony_project_products.git
   cd symfony_project_products
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up the database**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

4. **Load sample data (optional)**
   ```bash
   php bin/console doctrine:fixtures:load
   ```

5. **Start the development server**
   ```bash
   symfony serve
   # or
   php -S localhost:8000 -t public/
   ```

6. **Access the application**
   Open your browser and navigate to `http://localhost:8000`

## 📁 Project Structure

```
├── config/                 # Configuration files
│   ├── packages/          # Package configurations
│   └── routes/            # Route definitions
├── migrations/            # Database migration files
├── public/               # Web-accessible files
├── src/                  # Application source code
│   ├── Controller/       # HTTP controllers
│   ├── DataFixtures/     # Sample data fixtures
│   ├── Entity/           # Doctrine entities
│   ├── Form/             # Form classes
│   └── Repository/       # Data repositories
├── templates/            # Twig templates
│   ├── base.html.twig    # Base template
│   ├── home/             # Home page templates
│   └── product/          # Product-related templates
└── var/                  # Cache and logs
```

## 🎯 Available Routes

- `/` - Home page
- `/product/` - Product listing
- `/product/new` - Create new product
- `/product/{id}` - View product details
- `/product/{id}/edit` - Edit product
- `/product/{id}/delete` - Delete product

## 🗄️ Database Schema

The application uses a simple Product entity with the following fields:

- `id` - Primary key (auto-increment)
- `name` - Product name (string, required)
- `description` - Product description (text, optional)
- `price` - Product price (decimal, required)
- `createdAt` - Creation timestamp (datetime)
- `updatedAt` - Last update timestamp (datetime)

## 🧪 Development

### Running Tests
```bash
php bin/console test
```

### Clearing Cache
```bash
php bin/console cache:clear
```

### Database Operations
```bash
# Create a new migration
php bin/console make:migration

# Run migrations
php bin/console doctrine:migrations:migrate

# Reset database
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

## 🔧 Configuration

The application uses the following key configurations:

- **Database**: SQLite (configured in `.env`)
- **Framework**: Symfony 7.x with full-stack components
- **Templates**: Twig with Bootstrap styling
- **Forms**: Symfony Form component with validation
- **Security**: CSRF protection enabled

## 📦 Dependencies

### Core Symfony Components
- `symfony/framework-bundle` - Core framework
- `symfony/console` - Command line interface
- `symfony/form` - Form handling
- `symfony/validator` - Data validation
- `symfony/twig-bundle` - Template engine

### Database & ORM
- `doctrine/doctrine-bundle` - Doctrine integration
- `doctrine/doctrine-migrations-bundle` - Database migrations
- `doctrine/data-fixtures` - Sample data

### Development Tools
- `symfony/web-profiler-bundle` - Development profiler
- `symfony/maker-bundle` - Code generation

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [Symfony Documentation](https://symfony.com/doc/current/index.html)
2. Review the [Doctrine ORM Documentation](https://www.doctrine-project.org/projects/orm.html)
3. Open an issue in this repository

## 🎉 Acknowledgments

- Built with [Symfony](https://symfony.com/) - The PHP framework for web projects
- Uses [Doctrine ORM](https://www.doctrine-project.org/) for database operations
- Styled with [Bootstrap](https://getbootstrap.com/) for responsive design

---

**Happy coding! 🚀**
