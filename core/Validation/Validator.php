<?php

namespace Core\Validation;

class Validator implements RulesContract
{
    protected $fields;

    protected $rules = [];

    protected $brokenRules;

    public function __construct($fields, $rules)
    {
        $this->fields = $fields;
        $this->rules = $rules;

        $this->parseRules();
    }

    protected function parseRules()
    {
        foreach ($this->rules as $ruleKey => $ruleValue) {
            $currentRules = explode('|', $ruleValue);
            foreach ($currentRules as $rule) {
                if (method_exists($this, $rule)) {
                    if (!call_user_func_array([$this, $rule], [$ruleKey, $this->fields])) {
                        $this->brokenRules[$ruleKey][] = "rule $rule is broken for field ($ruleKey)";
                    }
                } else {
                    throw new \Exception("Not illegal rule ($rule)");
                }
            }
        }
    }

    public function isFail()
    {
        return !empty($this->brokenRules);
    }

    public function getBrokenRules()
    {
        return $this->brokenRules;
    }

    public function required($checkedField, $fieldsToCheck)
    {
        return array_key_exists($checkedField, $fieldsToCheck);
    }

    public function filled($checkedField, $fieldsToCheck)
    {
        return !empty($fieldsToCheck[$checkedField]);
    }
}

