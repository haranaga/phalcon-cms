<?php
/**
 * Admin route setting
 */
return [
    '' => [C=>'index', A=>'index'], // admin top
    '/:controller' => [C=>1, A=>'index'],
    '/:controller/:action' => [C=>1, A=>2],
    '/:controller/:action/:params' => [C=>1, A=>2, P=>3],
];
