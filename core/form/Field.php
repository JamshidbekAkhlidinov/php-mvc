<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 5 2023 11:52:51
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core\form;

use app\core\Model;

class Field
{

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';

    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, $attribute)
    {
        $this->model = $model;
        $this->type = self::TYPE_TEXT;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        $model = $this->model;
        $attribute = $this->attribute;
        return sprintf('
                <label class="form-label">%s</label>
                <input type="%s" name="%s" value="%s" class="form-control %s" aria-describedby="dd">
                <div class="invalid-feedback" id="dd">
                    %s
                </div>
        ',
            $model->getLabel($attribute),
            $this->type,
            $attribute,
            $model->{$attribute},
            $model->hasError($attribute) ? 'is-invalid' : '',
            $model->getFirstError($attribute),
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}