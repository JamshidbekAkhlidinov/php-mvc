<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 5 2023 16:53:19
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $attributes = $this->attributes();
        $tableName = $this->tableName();

        try {
            $params = array_map(fn($attr) => ":$attr", $attributes);
            $statement = self::prepare("
                    INSERT INTO $tableName 
                        (" . implode(',', $attributes) . ") 
                    VALUES
                        (" . implode(',', $params) . ")
                     ");
            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
            $statement->execute();
            return true;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function prepare($sql)
    {
        return Application::$application->db->pdo->prepare($sql);
    }

}

