<?php
/**
 * Frontend route setting
 */
return [
    // setup
    '/setup' => [C=>'setup', A=>'index'],
    '/setup/save' => [C=>'setup', A=>'save'],
    // user registration
    '/user/signup' => [C=>'user', A=>'signup'],
    // user sign in
    '/user/signin' => [C=>'user', A=>'signin'],
];
