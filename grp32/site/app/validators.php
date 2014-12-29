<?php

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL\s]+$/u', $value);
});

//from http://blog.elenakolevska.com/laravel-alpha-validator-that-allows-spaces/