<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 5 2023 12:18:4
 *   https://github.com/JamshidbekAkhlidinov
 */

use app\core\form\Form;

/**
 * @var $model app\model\LoginForm
 */

?>

    <h2>
        Login Form
    </h2>
<?php

$form = Form::begin('', 'post');

echo $form->field($model, 'email');
echo $form->field($model, 'password')->passwordField();
?>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php
Form::end();
?>