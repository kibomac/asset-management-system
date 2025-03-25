# Asset Management System

## Overview
The Asset Management System is a web application designed to help organizations efficiently track and manage their assets. This system provides a user-friendly interface for asset tracking, database management, and streamlined operations.

## Features
- Comprehensive asset tracking
- User-friendly interface
- Database management with MySQL
- Dynamic content updates using JavaScript
- Responsive design with CSS

## Project Structure
```
asset-management-system
├── src
│   ├── assets
│   │   ├── css
│   │   │   └── styles.css
│   │   ├── js
│   │   │   └── scripts.js
│   │   └── images
│   ├── components
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── navbar.php
│   ├── config
│   │   └── database.php
│   ├── controllers
│   │   └── AssetController.php
│   ├── models
│   │   └── Asset.php
│   ├── views
│   │   ├── index.php
│   │   ├── add-asset.php
│   │   ├── edit-asset.php
│   │   └── view-asset.php
│   └── helpers
│       └── utils.php
├── sql
│   └── database-schema.sql
├── .gitignore
├── README.md
└── index.php
```

## Installation
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Import the `sql/database-schema.sql` file into your MySQL database.
4. Configure the database connection settings in `src/config/database.php`.
5. Open `index.php` in your web browser to access the application.

## Usage
- Use the navigation bar to access different sections of the application.
- Add, edit, and view assets through the provided forms and views.
- The system will dynamically update the asset list as changes are made.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License.