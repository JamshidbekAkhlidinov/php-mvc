# php-mvc-framework

**Clone repository**

    git clone https://github.com/JamshidbekAkhlidinov/php-mvc-framework.git

**Create project**

    composer create-project akhlidinov/php-mvc-framework
    
**.env configuration**

    DB_DSN=mysql:host=localhost;port=3306;dbname=mvc_framework
    DB_USER=root
    DB_PASSWORD=root

**Db migration**
    
    php migration.php

**Running project**

    php -S localhost:8000 public/index.php
