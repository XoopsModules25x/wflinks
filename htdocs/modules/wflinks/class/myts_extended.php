<?php
/**
 * Class: wflTextSanitizer
 * $Id: myts_extended.php v 1.00 21 June 2005 John N Exp $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */
class wflTextSanitizer extends MyTextSanitizer
{

    function htmlSpecialCharsStrip( $text )
    {
        return $this -> htmlSpecialChars( $this -> stripSlashesGPC( $text) );
    }
}
