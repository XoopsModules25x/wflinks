<?php

/**
 * Class: WflTextSanitizer
 *
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */
class WflTextSanitizer extends MyTextSanitizer
{
    /**
     * @param $text
     *
     * @return string
     */
    public function htmlSpecialCharsStrip($text)
    {
        return $this->htmlSpecialChars($this->stripSlashesGPC($text));
    }
}
