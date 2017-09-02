<?php
/**
 * $Id: address.php
 * Module: WF-Links
 * Developer: McDonald
 * Licence: GNU
 *
 * International Address Formats: 	http://www.bitboost.com/ref/international-address-formats.html#Formats
 *								http://www.upu.int/post_code/en/postal_addressing_systems_member_countries.shtml
 */

function wfl_address($street1, $street2, $town, $state, $zip, $country="") {

if ($country == 'Albania') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}	

} elseif ($country == 'Argentina') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}	

} elseif ($country == 'Armenia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}	

} elseif ($country == 'Australia') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
		}
	}		

} elseif ($country == 'Austria') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}	

} elseif ($country == 'Azerbaijan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}	

} elseif ($country == 'Bahamas') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $state;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $state;
	}	

} elseif ($country == 'Bahrain') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}	
 
} elseif ($country == 'Bangladesh') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;-&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;-&nbsp;' . $zip;
	}	

} elseif ($country == 'Barbados') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}	
 
} elseif ($country == 'Belarus') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;	
	}
 
} elseif ($country == 'Belgium') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;	
	}
 
} elseif ($country == 'Belize') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state;	
	}
 
} elseif ($country == 'Benin') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Bermuda') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Bhutan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Bolivia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Bosnia and Herzegovina') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;	
	}
 
} elseif ($country == 'Botswana') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Brazil') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
	}
 
} elseif ($country == 'Brunei Darussalam') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Bulgaria') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;	
	}
 
} elseif ($country == 'Burkina Faso') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Burundi') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Cambodia') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '<br />' . $state . '&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
		}
	}		
 
} elseif ($country == 'Cameroon') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;	
	}
 
} elseif ($country == 'Canada') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
		}
	}		
 
} elseif ($country == 'Cape Verde') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
		}
	}		
 
} elseif ($country == 'Cayman Islands') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}		
 
} elseif ($country == 'Chad') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}		
 
} elseif ($country == 'Chile') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}		
 
} elseif ($country == 'China') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
		}
	}
 
} elseif ($country == 'Colombia') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;-&nbsp;' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '&nbsp;-&nbsp;' . $state;
		} else {
			$address = $street1 . '<br />' . $town;
		}
	}
 
} elseif ($country == 'Comoros') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}		
 
} elseif ($country == 'Congo') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}		
 
} elseif ($country == 'Congo (Dem. Rep.)') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}		
 
} elseif ($country == 'Cook Islands') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Costa Rica') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Croatia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Cuba') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Cyprus') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Czech Republic') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . ',&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . ',&nbsp;' . $town;
	}		
 
} elseif ($country == 'Denmark') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}  
 
} elseif ($country == 'Djibouti') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}  
 
} elseif ($country == 'Dominica') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}  
 
} elseif ($country == 'Dominican Republic') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $state . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $state . '<br />' . $zip . '&nbsp;' . $town;
	}  
 
} elseif ($country == 'Ecuador') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '<br />' . $town;
	}  
 
} elseif ($country == 'Egypt') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	} 
 
} elseif ($country == 'El Salvador') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	} 
 
} elseif ($country == 'Equatorial Guinea') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	} 
 
} elseif ($country == 'Eritrea') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	} 
 
} elseif ($country == 'Estonia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . ',&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . ',&nbsp;' . $town;
	}		
 
} elseif ($country == 'Ethiopia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	} 
 
} elseif ($country == 'Falkland Islands (Malvinas)') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	} 
 
} elseif ($country == 'Faroe Islands') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	} 
 
} elseif ($country == 'Faroe Islands') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Fiji') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $state . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $state . '<br />' . $town;
	}
 
} elseif ($country == 'Finland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'France') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Gabon') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'Gambia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Georgia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Germany') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Ghana') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Gibraltar') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '<br />' . $zip;
		}
	}
 
} elseif ($country == 'Greece') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Greenland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Grenada') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Guatemala') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '-' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '-' . $town;
	}
 
} elseif ($country == 'Guinea') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Guyana') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Haiti') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Honduras') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
	}
 
} elseif ($country == 'Hong Kong') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Iceland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'India') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '-' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '-' . $zip;
	}
 
} elseif ($country == 'Indonesia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {	
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}	
 
} elseif ($country == 'Iraq') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $state . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $state . '<br />' . $zip;
	}	
 
} elseif ($country == 'Ireland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}	
 
} elseif ($country == 'Isle of Man') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '<br />' . $zip;
		}
	}
 
} elseif ($country == 'Israel') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Italy') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Jamaica') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Japan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Jersey') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '<br />' . $zip;
		}
	}
 
} elseif ($country == 'Jordan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Kazakhstan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
	}
 
} elseif ($country == 'Kenya') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'Kiribati') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state;
	}
 
} elseif ($country == 'Kuwait') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Kyrgyzstan') {
	if ($street2) {
		$address = $zip . '&nbsp;' . $town . '<br />' . $street1 . '<br />' . $street2;
	} else {
		$address = $zip . '&nbsp;' . $town . '<br />' . $street1;
	}
 
} elseif ($country == 'Latvia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $zip;
	}
 
} elseif ($country == 'Lebanon') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Lesotho') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Liberia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Libya') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Lithuania') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Luxembourg') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Madagascar') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Malawi') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Malaysia') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
		}	
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
		} else {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
		}	
	}	
 
} elseif ($country == 'Mali') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Malta') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'Mauritania') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Mexico') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
		}	
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town . ',&nbsp;' . $state;
		} else {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
		}	
	}	
 
} elseif ($country == 'Moldova') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Monaco') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Mongolia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $zip;
	}
 
} elseif ($country == 'Montenegro') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Morocco') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Mozambique') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Myanmar') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $zip;
	}
 
} elseif ($country == 'Namibia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Nauru') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Nepal') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Netherlands') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Netherlands Antilles') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'New Zealand') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Nicaragua') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '<br />' . $town;
	}
 
} elseif ($country == 'Niger') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Nigeria') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
		}	
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '&nbsp;' . $zip . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
		}	
	}	
 
} elseif ($country == 'Norway') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Oman') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '<br />' . $town;
	}
 
} elseif ($country == 'Pakistan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '-' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '-' . $zip;
	}	
 
} elseif ($country == 'Palau') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Panama') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state;
	}
 
} elseif ($country == 'Papua New Guinea') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Paraguay') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Peru') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Philippines') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '<br />' . $town;
	}	
 
} elseif ($country == 'Poland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}	
 
} elseif ($country == 'Portugal') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Puerto Rico') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Qatar') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Romania') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town . '<br />' . $state;
		} else {
			$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
		}
	}
 
} elseif ($country == 'Russian Federation') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Rwanda') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Saudi Arabia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Senegal') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Serbia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Seychelles') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Sierra Leone') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Singapore') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Slovakia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Slovenia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Somalia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $zip;
	}
 
} elseif ($country == 'South Africa') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Korea (South)') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . ',&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '<br />' . $state . ',&nbsp;' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . ',&nbsp;' . $zip;
		}
	}
 
} elseif ($country == 'Spain') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Sri Lanka') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'Sudan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '<br />' . $town;
	}
 
} elseif ($country == 'Suriname') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Swaziland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'Sweden') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Switzerland') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Taiwan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Thailand') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state . '&nbsp;' . $zip;
	}	
 
} elseif ($country == 'Tunisia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Turkey') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Turkmenistan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Tuvalu') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state;
	}
 
} elseif ($country == 'Uganda') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Ukraine') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'United Arab Emirates') {
	if ($street2) {
		$address = $street1 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	}
 
} elseif ($country == 'United Kingdom') {
	if ($street2) {
		if ($state) {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
		}
	} else {
		if ($state) {
			$address = $street1 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;
		} else {
			$address = $street1 . '<br />' . $town . '<br />' . $zip;
		}
	}
 
} elseif ($country == 'United States') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . ',&nbsp;' . $state . '&nbsp;' . $zip;
	}
 
} elseif ($country == 'Uruguay') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Uzbekistan') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $zip;
	}
 
} elseif ($country == 'Vatican City State') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Venezuela') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '&nbsp;' . $zip . ',&nbsp' . $state;
	} else {
		$address = $street1 . '<br />' . $town . '&nbsp;' . $zip . ',&nbsp' . $state;
	}
 
} elseif ($country == 'Viet Nam') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '&nbsp' . $zip;
	} else {
		$address = $street1 . '<br />' . $town . '<br />' . $state . '&nbsp' . $zip;
	}
 
} elseif ($country == 'Yemen') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
 
} elseif ($country == 'Zambia') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $zip . '&nbsp;' . $town;
	} else {
		$address = $street1 . '<br />' . $zip . '&nbsp;' . $town;
	}
 
} elseif ($country == 'Zimbabwe') {
	if ($street2) {
		$address = $street1 . '<br />' . $street2 . '<br />' . $town;
	} else {
		$address = $street1 . '<br />' . $town;
	}
  return $address;
     
// Default address   
} else {
  $address = $street1 . '<br />' . $street2 . '<br />' . $town . '<br />' . $state . '<br />' . $zip;          
}

  return $address;
}

?>