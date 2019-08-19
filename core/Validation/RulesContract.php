<?php

namespace Core\Validation;

interface RulesContract
{
    public function required($checkedField, $fieldsToCheck);

    public function filled($checkedField, $fieldsToCheck);

}