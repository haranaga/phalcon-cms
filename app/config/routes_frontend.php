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
    // user registration emailed
    '/user/signup_mail' => [C=>'user',A=>'signup_mail'],
    // user registration Done
    '/user/signup_done' => [C=>'user',A=>'signup_done'],
    // user sign in
    '/user/signin' => [C=>'user', A=>'signin'],
];
