<?php
/***************************************************************************
 *
 * PHP vCard class v2.0
 * (c) Kai Blankenhorn
 * www.bitfolge.de/en
 * kaib@bitfolge.de
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 ***************************************************************************/

/***************************************************************************
 *
 * Modified for WF-Links by McDonald - March 2008
 **************************************************************************
 * @param $string
 * @return mixed
 */


use XoopsModules\Wflinks;

/**
 * @param $string
 * @return mixed
 */
function vcard_encode($string)
{
    return vcard_escape(vcard_quoted_printable_encode($string));
}

/**
 * @param $string
 *
 * @return mixed
 */
function vcard_escape($string)
{
    return str_replace(';', "\;", $string);
}

/**
 * @param $email
 *
 * @return mixed
 */
function vcardemailcnvrt($email)
{
    $search = [
        "/\ AT /",
        "/\ DOT /",
    ];

    $replace = [
        '@',
        '.',
    ];

    $text = preg_replace($search, $replace, $email);

    return $text;
}

// taken from PHP documentation comments
/**
 * @param     $input
 * @param int $line_max
 *
 * @return string
 */
function vcard_quoted_printable_encode($input, $line_max = 76)
{
    $hex       = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];
    $lines     = preg_split("/(?:\r\n|\r|\n)/", $input);
    $eol       = "\r\n";
    $linebreak = '=0D=0A';
    $escape    = '=';
    $output    = '';

    for ($j = 0, $jMax = count($lines); $j < $jMax; ++$j) {
        $line    = $lines[$j];
        $linlen  = strlen($line);
        $newline = '';
        for ($i = 0; $i < $linlen; ++$i) {
            $c   = substr($line, $i, 1);
            $dec = ord($c);
            if ((32 == $dec) && ($i == ($linlen - 1))) { // convert space at eol only
                $c = '=20';
            } elseif ((61 == $dec) || ($dec < 32)
                      || ($dec > 126)) { // always vcard_encode "\t", which is *not* required
                $h2 = floor($dec / 16);
                $h1 = floor($dec % 16);
                $c  = $escape . $hex[(string)$h2] . $hex[(string)$h1];
            }
            if ((strlen($newline) + strlen($c)) >= $line_max) { // CRLF is not counted
                $output  .= $newline . $escape . $eol; // soft line break; " =\r\n" is okay
                $newline = '    ';
            }
            $newline .= $c;
        } // end of for
        $output .= $newline;
        if ($j < count($lines) - 1) {
            $output .= $linebreak;
        }
    }

    return trim($output);
}

/**
 * Class VCard
 */
class VCard
{
    public $properties;
    public $filename;

    /**
     * @param        $number
     * @param string $type
     */
    public function setPhoneNumber($number, $type = '')
    {
        // type may be PREF | WORK | HOME | VOICE | FAX | MSG | CELL | PAGER | BBS | CAR | MODEM | ISDN | VIDEO or any senseful combination, e.g. "PREF;WORK;VOICE"
        $key = 'TEL';
        if ('' !== $type) {
            $key .= ';' . $type;
        }
        $key                    .= ';ENCODING=QUOTED-PRINTABLE';
        $this->properties[$key] = vcard_quoted_printable_encode($number);
    }

    // UNTESTED !!!

    /**
     * @param $type
     * @param $photo
     */
    public function setPhoto($type, $photo)
    { // $type = "GIF" | "JPEG"
        $this->properties["PHOTO;TYPE=$type;ENCODING=BASE64"] = base64_vcard_encode($photo);
    }

    /**
     * @param $name
     */
    public function setFormattedName($name)
    {
        $this->properties['FN'] = vcard_quoted_printable_encode($name);
    }

    /**
     * @param string $family
     * @param string $first
     * @param string $additional
     * @param string $prefix
     * @param string $suffix
     */
    public function setName($family = '', $first = '', $additional = '', $prefix = '', $suffix = '')
    {
        $this->properties['N'] = "$family;$first;$additional;$prefix;$suffix";
        //  $this -> filename = "$first%20$family.vcf";
        if ('' === $this->properties['FN']) {
            $this->setFormattedName(trim("$prefix $first $additional $family $suffix"));
        }
    }

    /**
     * @param $date
     */
    public function setBirthday($date)
    { // $date format is YYYY-MM-DD
        $this->properties['BDAY'] = $date;
    }

    /**
     * @param string $postoffice
     * @param string $extended
     * @param string $street
     * @param string $city
     * @param string $region
     * @param string $zip
     * @param string $country
     * @param string $type
     */
    public function setAddress(
        $postoffice = '',
        $extended = '',
        $street = '',
        $city = '',
        $region = '',
        $zip = '',
        $country = '',
        $type = ''
    ) {
        // $type may be DOM | INTL | POSTAL | PARCEL | HOME | WORK or any combination of these: e.g. "WORK;PARCEL;POSTAL"
        $key = 'ADR';
        if ('' !== $type) {
            $key .= ";$type";
        }
        $key                    .= ';ENCODING=QUOTED-PRINTABLE';
        $this->properties[$key] = vcard_encode($postoffice) . ';' . vcard_encode($extended) . ';' . vcard_encode($street) . ';' . vcard_encode($city) . ';' . vcard_encode($region) . ';' . vcard_encode($zip) . ';' . vcard_encode($country);

        if ('' === $this->properties["LABEL;$type;ENCODING=QUOTED-PRINTABLE"]) {
            //$this->setLabel($postoffice, $extended, $street, $city, $region, $zip, $country, $type);
        }
    }

    /**
     * @param string $postoffice
     * @param string $extended
     * @param string $street
     * @param string $city
     * @param string $region
     * @param string $zip
     * @param string $country
     * @param string $type
     */
    public function setLabel(
        $postoffice = '',
        $extended = '',
        $street = '',
        $city = '',
        $region = '',
        $zip = '',
        $country = '',
        $type = 'HOME;POSTAL'
    ) {
        $label = '';
        if ('' !== $postoffice) {
            $label .= "$postoffice\r\n";
        }
        if ('' !== $extended) {
            $label .= "$extended\r\n";
        }
        if ('' !== $street) {
            $label .= "$street\r\n";
        }
        if ('' !== $zip) {
            $label .= "$zip ";
        }
        if ('' !== $city) {
            $label .= "$city\r\n";
        }
        if ('' !== $region) {
            $label .= "$region\r\n";
        }
        if ('' !== $country) {
            $country .= "$country\r\n";
        }

        $this->properties["LABEL;$type;ENCODING=QUOTED-PRINTABLE"] = vcard_quoted_printable_encode($label);
    }

    /**
     * @param $address
     */
    public function setEmail($address)
    {
        $this->properties['EMAIL;INTERNET'] = $address;
    }

    /**
     * @param $note
     */
    public function setNote($note)
    {
        $this->properties['NOTE;ENCODING=QUOTED-PRINTABLE'] = vcard_quoted_printable_encode($note);
    }

    /**
     * @param        $url
     * @param string $type
     */
    public function setURL($url, $type = '')
    {
        // $type may be WORK | HOME
        $key = 'URL';
        if ('' !== $type) {
            $key .= ";$type";
        }
        $this->properties[$key] = $url;
    }

    /**
     * @param $comp
     */
    public function setCOMP($comp)
    {
        $this->filename          = "$comp.vcf";
        $this->properties['ORG'] = $comp;
    }

    /**
     * @return string
     */
    public function getVCard()
    {
        $text = "BEGIN:VCARD\r\n";
        $text .= "VERSION:2.1\r\n";
        foreach ($this->properties as $key => $value) {
            $text .= "$key:$value\r\n";
        }
        $text .= 'REV:' . date('Y-m-d') . 'T' . date('H:i:s') . "Z\r\n";
        $text .= "MAILER:PHP vCard class by Kai Blankenhorn\r\n";
        $text .= "END:VCARD\r\n";

        return $text;
    }

    public function getFileName()
    {
        return $this->filename;
    }
    // NOT TESTED -- McDONALD

    /**
     * @param $charset
     */
    public function setADR($charset)
    {
        $this->properties['ADR;CHARSET'] = $charset;
    }
}

require_once __DIR__ . '/header.php';

$lid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);
$lid = (int)$lid;

global $xoopsDB;
$result    = $xoopsDB->query('SELECT title, street1, street2, town, zip, state, country, url, tel, fax, voip, mobile, email, vat FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid);
$vcard_arr = $xoopsDB->fetchArray($result);

$title   = $vcard_arr['title'];
$street1 = $vcard_arr['street1'];
$street2 = $vcard_arr['street2'];
$town    = $vcard_arr['town'];
$zip     = $vcard_arr['zip'];
$state   = $vcard_arr['state'];
$country = Wflinks\Utility::getCountryName($vcard_arr['country']);
$tel     = $vcard_arr['tel'];
$mobile  = $vcard_arr['mobile'];
$fax     = $vcard_arr['fax'];
$voip    = $vcard_arr['voip'];
$url     = $vcard_arr['url'];
$email   = $vcard_arr['email'];
$vat     = $vcard_arr['vat'];
$charset = _CHARSET;

$v = new VCard();

// Set Xoops Character set
$v->setADR($charset);

// Phone number(s)
$v->setPhoneNumber($tel, 'WORK;VOICE;PREF');
$v->setPhoneNumber($mobile, 'WORK;CELL');
$v->setPhoneNumber($fax, 'WORK;FAX');
$v->setPhoneNumber($voip, 'WORK;PCS');

// Name
$v->setName('', '', '', '');

// Birthday
// $v -> setBirthday("1960-07-31");

// Address
$street = $street1;
if ($street2) {
    $street = $street1 . ', ' . $street2;
}
$v->setAddress('', '', $street, $town, $state, $zip, $country, 'WORK');

// Email
$emailaddr = vcardemailcnvrt($email);
$v->setEmail($emailaddr);

// Note
// $v -> setNote("You can take some notes here.\r\nMultiple lines are supported via \\r\\n.");
if ($voip) {
    $v->setNote('VoIP: ' . $voip);
}
if ($vat) {
    $v->setNote(_MD_WFL_VAT . $vat);
}

// Website
$v->setURL($url, 'WORK');

// Company name
$v->setCOMP($title);

$output   = $v->getVCard();
$filename = $v->getFileName();

header("Content-Disposition: attachment; filename=$filename");
header('Content-Length: ' . strlen($output));
header('Connection: close');
header("Content-Type: text/x-vCard; name=$filename");

echo $output;
