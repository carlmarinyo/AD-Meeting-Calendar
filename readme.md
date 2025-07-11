<a name="readme-top">

<br/>

<br />
<div align="center">
  <a href="https://github.com/zyx-0314/">
  </a>

  <h3 align="center">Meeting Calendar</h3>
</div>

<div align="center">
A schedule meeting calendar for organizing and managing meeting times efficiently.
</div>

<br />


![](https://visit-counter.vercel.app/counter.png?page=carlmarinyo/AD-Meeting-Calendar)

[![wakatime](https://wakatime.com/badge/user/018dd99a-4985-4f98-8216-6ca6fe2ce0f8/project/63501637-9a31-42f0-960d-4d0ab47977f8.svg)](https://wakatime.com/badge/user/018dd99a-4985-4f98-8216-6ca6fe2ce0f8/project/63501637-9a31-42f0-960d-4d0ab47977f8)

---

<br />
<br />

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li>
          <a href="#key-components">Key Components</a>
        </li>
        <li>
          <a href="#technology">Technology</a>
        </li>
      </ol>
    </li>
    <li>
      <a href="#rule,-practices-and-principles">Rules, Practices and Principles</a>
    </li>
    <li>
      <a href="#resources">Resources</a>
    </li>
  </ol>
</details>

---

## Overview

This project is a PHP backend setup with environment-based configuration, integrating MongoDB and PostgreSQL for data handling. It uses phpdotenv for secure config loading and Docker Compose for consistent local development. Key components include centralized config management, database connection handlers, and a scalable, refactored code structure.

### Key Components

- Environment config with dotenv
- Centralized DB config loader
- Dockerized development setup
- MongoDB & PostgreSQL integration

### Technology

#### Language
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

#### Framework/Library
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

#### Databases
![MongoDB](https://img.shields.io/badge/MongoDB-47A248?style=for-the-badge&logo=mongodb&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white)

## Rules, Practices and Principles

<!-- Do not Change this -->

1. Always use `AD-` in the front of the Title of the Project for the Subject followed by your custom naming.
2. Do not rename `.php` files if they are pages; always use `index.php` as the filename.
3. Add `.component` to the `.php` files if they are components code; example: `footer.component.php`.
4. Add `.util` to the `.php` files if they are utility codes; example: `account.util.php`.
5. Place Files in their respective folders.
6. Different file naming Cases
   | Naming Case | Type of code         | Example                           |
   | ----------- | -------------------- | --------------------------------- |
   | Pascal      | Utility              | Accoun.util.php                   |
   | Camel       | Components and Pages | index.php or footer.component.php |
8. Renaming of Pages folder names are a must, and relates to what it is doing or data it holding.
9. Use proper label in your github commits: `feat`, `fix`, `refactor` and `docs`
10. File Structure to follow below.

```
AD-Meeting-Calendar
└─ assets
|   └─ css
|   |  └─ style.css
|   └─ img
|   |   
|   └─ js
|   
└─ components
|   └─ componentGroup
|      └─ card.component.php
|   └─ templates
|      └─ nav.component.php
|      └─ foot.component.php
|      └─ head.component.php
└─ database
|   └─ agenda.model.sql
|   └─ meeting_users.model.sql
|   └─ meetings.model.sql
|   └─ users.model.sql
└─ errors
|   └─ login_failed.error.php
└─ handlers
|   └─ mongodbChecker.handler.php
|   └─ postgreChecker.handler.php
|   └─ auth.handler.php
└─ layout
|      └─ main.layout.php
└─ pages
|  └─ login
|     └─ assets
|     |  └─ css
|     |   └─ login.css
|     |  └─ img
|     |   └─ calendar.jpg
|     |   └─ profile.jpg
|     |   └─ settings.jpg
|     |  └─ js
|     └─ login.php
└─ sql
|  └─ New Table Auto Increment Script.sql
|  └─ Old Table Auto Increment.sql
└─ src
└─ staticData
|  └─ dummies
|   └─ agenda.staticData.php
|   └─ meetings.staticData.php
|   └─ meeting_users.staticData.php
|   └─ user.staticData.php
└─ utils
|   └─ dbResetPostgresql.util.php
|   └─ envSetter.util.php
|   └─ htmlEscape.util.php
|   └─ dbMigratePostgresql.util.php
|   └─ dbSeederPostgresql.util.php
|   └─ auth.util.php
└─ .gitignore
└─ bootstrap.php
└─ compose.yaml
└─ composer.json
└─ composer.lock
└─ Dockerfile
└─ index.php
└─ readme.md
└─ router.php
```
> The following should be renamed: name.css, name.js, name.jpeg/.jpg/.webp/.png, name.component.php(but not the part of the `component.php`), Name.utils.php(but not the part of the `utils.php`)

## Resources

| Title        | Purpose                                                                       | Link          |
| ------------ | ----------------------------------------------------------------------------- | ------------- |
| ChatGPT      | Helpful for understanding and debugging PHP logic                             | https://chatgptcom |
| Docker       | Official documentation for Docker command-line interface usage                | https://docs.docker.com/reference/cli/docker/ |
| W3Schools    | Beginner-friendly web development tutorials for PHP, HTML, CSS, and more      | https://www.w3schools.com/ |
