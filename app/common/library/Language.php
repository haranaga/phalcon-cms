<?php

namespace Cms;

use Phalcon\Mvc\User\Component;
use Phalcon\Translate\Adapter\NativeArray;

class Language extends Component
{
    private $dir;

    public function setTranslationPath($dir)
    {
        $this->dir = $dir;
    }
    public function getTranslation($dir)
    {
        $this->setTranslationPath($dir);

        // Ask browser what is the best language
        $language = $this->request->getBestLanguage();

        $translationFile = $this->dir. $language . '.php';

        // Check if we have a translation file for that lang
        if (file_exists($translationFile)) {
            require $translationFile;
        } else {
            // Fallback to some default
            require $this->dir. 'en.php';
        }

        // Return a translation object $messages comes from the require
        // statement above
        return new NativeArray(
             [
                 'content' => $messages,
             ]
         );
    }
}
