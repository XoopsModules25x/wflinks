<?php
/**
 *
 * Module: WF-Links
 * Developer: McDonald
 * Licence: GNU
 *
 * International Address Formats:    http://www.bitboost.com/ref/international-address-formats.html#Formats
 *                                http://www.upu.int/post_code/en/postal_addressing_systems_member_countries.shtml
 * @param        $street1
 * @param        $street2
 * @param        $town
 * @param        $state
 * @param        $zip
 * @param string $country
 * @return string
 */

function wfl_address($street1, $street2, $town, $state, $zip, $country = '')
{
    if ('Albania' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Argentina' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Armenia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Australia' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
            }
        }
    } elseif ('Austria' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Azerbaijan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Bahamas' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $state;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $state;
        }
    } elseif ('Bahrain' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Bangladesh' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;-&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;-&nbsp;' . $zip;
        }
    } elseif ('Barbados' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Belarus' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Belgium' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Belize' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state;
        }
    } elseif ('Benin' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Bermuda' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Bhutan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Bolivia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Bosnia and Herzegovina' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Botswana' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Brazil' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
        }
    } elseif ('Brunei Darussalam' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state . '&nbsp;' . $zip;
        }
    } elseif ('Bulgaria' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Burkina Faso' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Burundi' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Cambodia' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '<br>' . $state . '&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
            }
        }
    } elseif ('Cameroon' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Canada' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
            }
        }
    } elseif ('Cape Verde' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
            }
        }
    } elseif ('Cayman Islands' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Chad' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Chile' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('China' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
            }
        }
    } elseif ('Colombia' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;-&nbsp;' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '&nbsp;-&nbsp;' . $state;
            } else {
                $address = $street1 . '<br>' . $town;
            }
        }
    } elseif ('Comoros' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Congo' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Congo (Dem. Rep.)' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Cook Islands' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Costa Rica' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Croatia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Cuba' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Cyprus' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Czech Republic' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . ',&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . ',&nbsp;' . $town;
        }
    } elseif ('Denmark' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Djibouti' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Dominica' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Dominican Republic' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $state . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $state . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Ecuador' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '<br>' . $town;
        }
    } elseif ('Egypt' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('El Salvador' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Equatorial Guinea' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Eritrea' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Estonia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . ',&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . ',&nbsp;' . $town;
        }
    } elseif ('Ethiopia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Falkland Islands (Malvinas)' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Faroe Islands' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Fiji' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $state . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $state . '<br>' . $town;
        }
    } elseif ('Finland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('France' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Gabon' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('Gambia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Georgia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Germany' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Ghana' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Gibraltar' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '<br>' . $zip;
            }
        }
    } elseif ('Greece' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Greenland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Grenada' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Guatemala' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '-' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '-' . $town;
        }
    } elseif ('Guinea' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Guyana' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Haiti' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Honduras' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
        }
    } elseif ('Hong Kong' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Iceland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('India' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '-' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '-' . $zip;
        }
    } elseif ('Indonesia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Iraq' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $state . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $state . '<br>' . $zip;
        }
    } elseif ('Ireland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Isle of Man' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '<br>' . $zip;
            }
        }
    } elseif ('Israel' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Italy' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Jamaica' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Japan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Jersey' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '<br>' . $zip;
            }
        }
    } elseif ('Jordan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Kazakhstan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
        }
    } elseif ('Kenya' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('Kiribati' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state;
        }
    } elseif ('Kuwait' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Kyrgyzstan' === $country) {
        if ($street2) {
            $address = $zip . '&nbsp;' . $town . '<br>' . $street1 . '<br>' . $street2;
        } else {
            $address = $zip . '&nbsp;' . $town . '<br>' . $street1;
        }
    } elseif ('Latvia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $zip;
        }
    } elseif ('Lebanon' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Lesotho' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Liberia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Libya' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Lithuania' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Luxembourg' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Madagascar' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Malawi' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Malaysia' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
            } else {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
            }
        }
    } elseif ('Mali' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Malta' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('Mauritania' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Mexico' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
            } else {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
            }
        }
    } elseif ('Moldova' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Monaco' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Mongolia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $zip;
        }
    } elseif ('Montenegro' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Morocco' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Mozambique' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Myanmar' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $zip;
        }
    } elseif ('Namibia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Nauru' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Nepal' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Netherlands' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Netherlands Antilles' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('New Zealand' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Nicaragua' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '<br>' . $town;
        }
    } elseif ('Niger' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Nigeria' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '&nbsp;' . $zip . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
            }
        }
    } elseif ('Norway' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Oman' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '<br>' . $town;
        }
    } elseif ('Pakistan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '-' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '-' . $zip;
        }
    } elseif ('Palau' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
        }
    } elseif ('Panama' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state;
        }
    } elseif ('Papua New Guinea' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Paraguay' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Peru' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Philippines' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '<br>' . $town;
        }
    } elseif ('Poland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Portugal' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Puerto Rico' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Qatar' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Romania' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town . '<br>' . $state;
            } else {
                $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
            }
        }
    } elseif ('Russian Federation' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Rwanda' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Saudi Arabia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Senegal' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Serbia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Seychelles' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Sierra Leone' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Singapore' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Slovakia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Slovenia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Somalia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $zip;
        }
    } elseif ('South Africa' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Korea (South)' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . ',&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '<br>' . $state . ',&nbsp;' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . ',&nbsp;' . $zip;
            }
        }
    } elseif ('Spain' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Sri Lanka' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('Sudan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '<br>' . $town;
        }
    } elseif ('Suriname' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Swaziland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('Sweden' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Switzerland' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Taiwan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip;
        }
    } elseif ('Thailand' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state . '&nbsp;' . $zip;
        }
    } elseif ('Tunisia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Turkey' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Turkmenistan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Tuvalu' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state;
        }
    } elseif ('Uganda' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Ukraine' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('United Arab Emirates' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        }
    } elseif ('United Kingdom' === $country) {
        if ($street2) {
            if ($state) {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
            }
        } else {
            if ($state) {
                $address = $street1 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
            } else {
                $address = $street1 . '<br>' . $town . '<br>' . $zip;
            }
        }
    } elseif ('United States' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
        }
    } elseif ('Uruguay' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Uzbekistan' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $zip;
        }
    } elseif ('Vatican City State' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Venezuela' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '&nbsp;' . $zip . ',&nbsp' . $state;
        } else {
            $address = $street1 . '<br>' . $town . '&nbsp;' . $zip . ',&nbsp' . $state;
        }
    } elseif ('Viet Nam' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '&nbsp' . $zip;
        } else {
            $address = $street1 . '<br>' . $town . '<br>' . $state . '&nbsp' . $zip;
        }
    } elseif ('Yemen' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }
    } elseif ('Zambia' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $zip . '&nbsp;' . $town;
        } else {
            $address = $street1 . '<br>' . $zip . '&nbsp;' . $town;
        }
    } elseif ('Zimbabwe' === $country) {
        if ($street2) {
            $address = $street1 . '<br>' . $street2 . '<br>' . $town;
        } else {
            $address = $street1 . '<br>' . $town;
        }

        return $address;

    // Default address
    } else {
        $address = $street1 . '<br>' . $street2 . '<br>' . $town . '<br>' . $state . '<br>' . $zip;
    }

    return $address;
}
