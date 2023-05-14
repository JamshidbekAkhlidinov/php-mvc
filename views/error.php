<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 13:12:54
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $exception Exception
 */

?>

<h3 style="background: red; color: yellow; font-size: 30px; text-align: center; ">
    <?= $exception->getCode() ?>
    -
    <?= $exception->getMessage() ?>
</h3>
