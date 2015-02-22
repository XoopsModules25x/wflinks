<?php
/**
 * Class: wflTextSanitizer
 * $Id: myts_extended.php 9722 2012-06-26 02:30:10Z beckmi $
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

?>