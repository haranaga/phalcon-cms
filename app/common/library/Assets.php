<?php
/**
 * This file contains the Asset Manager class
 */
namespace Cms;

/**
 * This class is a wrapper for the built-in-Phalcon Asset Manager.  All it adds is a log of already included assets,
 * so the same URL won't get added multiple times
 */

class Assets extends \Phalcon\Assets\Manager
{

    /** @var array $url_cache A record of all included asset URLs */
    private $url_cache = [];
    private $content_cache = [];

    /**
     * Add a CSS resource
     *
     * @param string $path The path to the resource
     * @param boolean $local See Phalcon documentation: http://docs.phalconphp.com/en/latest/reference/assets.html
     * @param boolean $filter See Phalcon documentation
     * @param array $attributes See Phalcon documentation
     * @return object self To allow chaining
     */
    public function addCss($path, $local = true, $filter = null, $attributes = null)
    {
        if (!in_array($path, $this->url_cache)) {
            $this->url_cache[] = $path;
            return parent::addCss($path, $local, $filter, $attributes);
        } else {
            return $this;
        }
    }

    /**
     * Add a Javascript resource
     *
     * @param string $path The path to the resource
     * @param boolean $local See Phalcon documentation: http://docs.phalconphp.com/en/latest/reference/assets.html
     * @param boolean $filter See Phalcon documentation
     * @param array $attributes See Phalcon documentation
     * @return object self To allow chaining
     */
    public function addJs($path, $local = true, $filter = null, $attributes = null)
    {
        if (!in_array($path, $this->url_cache)) {
            $this->url_cache[] = $path;
            return parent::addJs($path, $local, $filter, $attributes);
        } else {
            return $this;
        }
    }

    public function addInlineJs($content, $filter = null, $attributes = null)
    {
        if (!in_array($content, $this->content_cache)) {
            $this->content_cache[] = $content;
            return parent::addInlineJs($content, $filter, $attributes);
        } else {
            return $this;
        }
    }
}
