<?php

namespace Cms;

use Phalcon\Tag;

class Html extends Tag
{
    public static function test($string = 'test')
    {
        return $string.'***';
    }

    public static function admin_url($path)
    {
        return self::getDI()->get('url')->get('_admin/'.$path);
    }

    public static function backend_url($path)
    {
        return self::getDI()->get('url')->get('_backend/'.$path);
    }

    public static function current_url_update($params=[])
    {
        $base_url = ltrim(self::getDI()->get('router')->getRewriteUri(), '/');

        $query = self::getDI()->get('request')->getQuery();
        unset($query['_url']);

        $new_query = array_merge($query, $params);

        $query_string = [];
        foreach ($new_query as $key => $value) {
            $query_string[] = $key.'='.$value;
        }

        return self::getDI()->get('url')->get($base_url.'?'.implode('&', $query_string));
    }
}
