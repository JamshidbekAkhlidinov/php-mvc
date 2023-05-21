<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 5 2023 12:18:11
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $model app\model\User
 */

use akhlidinov\phpmvc\form\Form;

?>

<h2>
    Register Form
</h2>

<?php
$form = Form::begin('','post');
echo $form->field($model, 'firstname');
echo $form->field($model, 'lastname');
echo $form->field($model, 'email');
echo $form->field($model, 'password')->passwordField();
echo $form->field($model, 'confirmPassword')->passwordField();
?>
<button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php Form::end(); ?>

