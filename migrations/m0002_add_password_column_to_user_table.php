<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 5 2023 10:44:36
 *   https://github.com/JamshidbekAkhlidinov
 */

use app\core\Application;

class m0002_add_password_column_to_user_table
{
    public function up()
    {
        $db = Application::$application->db;
        $sql = "ALTER TABLE users ADD password VARCHAR(255) NOT NULL AFTER created_at;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$application->db;
        $sql = "ALTER TABLE users DROP password";
        $db->pdo->exec($sql);
    }
}