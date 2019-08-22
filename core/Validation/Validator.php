<?php

namespace Core\Validation;

class Validator implements RulesContract
{
    protected $fields;

    protected $rules = [];

    protected $brokenRules = [];

    public function __construct($fields, $rules)
    {
        $this->fields = $fields;
        $this->rules = $rules;

        $this->parseRules();
    }

    protected function parseRules()
    {
        array_walk($this->rules, function ($ruleValue, $ruleKey) {
            $currentRules = explode('|', $ruleValue);
            array_walk($currentRules, function ($rule) use ($ruleKey) {
                if (method_exists($this, $rule)) {
                    if (!$this->$rule($ruleKey, $this->fields)) {
                        $this->brokenRules[$ruleKey][] = "rule $rule is broken for field ($ruleKey)";
                    }
                } else {
                    $this->brokenRules[$ruleKey][] = "Not illegal rule ($rule)";
                }
            });
        });
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

