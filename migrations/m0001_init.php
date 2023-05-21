<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 5 2023 10:44:19
 *   https://github.com/JamshidbekAkhlidinov
 */

use akhlidinov\phpmvc\Application;

class m0001_init
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE user(
                    id int AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(255) NOT NULL,
                    firstname VARCHAR(255),
                    lastname VARCHAR(255),
                    status TINYINT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=INNODB";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE user";
        $db->pdo->exec($sql);
    }
}