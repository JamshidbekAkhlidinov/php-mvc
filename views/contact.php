<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 13:12:6
 *   https://github.com/JamshidbekAkhlidinov
 */

use akhlidinov\phpmvc\form\Form;

/**
 * @var $model app\model\ContactForm
 */

?>
<h3 style="background: blue; color: white; font-size: 40px; text-align: center; ">
    Contact
</h3>


<?php $form = Form::begin('','post'); ?>
<?=$form->field($model, 'email') ?>
<?=$form->field($model, 'subject') ?>
<?=$form->field($model, 'body')->textArea() ?>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php Form::end(); ?>