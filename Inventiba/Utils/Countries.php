<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Class Inventiba_Utils_Countries {

    public static function getAll()
    {
         $countries = array(
            'AF' => 'Afganistan',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegowina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian OT',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, Democratic Republic',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia (Hrvatska)',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'TP' => 'East Timor',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard and Mc Donald Islands',
            'VA' => 'Vatican',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran (Islamic Republic of)',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea, Democratic People\'s Republic',
            'KR' => 'Korea, Republic of',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macau',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova, Republic of',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint LUCIA',
            'VC' => 'Saint Vincent and Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia (Slovak Republic)',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and South Sandwich Isl',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SH' => 'St. Helena',
            'PM' => 'St. Pierre and Miquelon',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard and Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania, United Republic of',
            'TH' => 'Thailand',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Minor Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands (British)',
            'VI' => 'Virgin Islands (U.S.)',
            'WF' => 'Wallis and Futuna Islands',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'YU' => 'Yugoslavia',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
            );
        return $countries;
    }
    
    public static function getLocationById($id)
    {
        $countries = array(
            'AF' => 'en',
            'AL' => 'en',
            'DZ' => 'en',
            'AS' => 'en',
            'AD' => 'en',
            'AO' => 'en',
            'AI' => 'en',
            'AG' => 'en',
            'AR' => 'es',
            'AM' => 'en',
            'AW' => 'en',
            'AU' => 'en',
            'AT' => 'en',
            'AZ' => 'en',
            'BS' => 'en',
            'BH' => 'en',
            'BD' => 'en',
            'BB' => 'en',
            'BY' => 'en',
            'BE' => 'en',
            'BZ' => 'en',
            'BJ' => 'en',
            'BM' => 'en',
            'BT' => 'en',
            'BO' => 'es',
            'BA' => 'en',
            'BW' => 'en',
            'BV' => 'en',
            'BR' => 'en',
            'IO' => 'en',
            'BN' => 'en',
            'BG' => 'en',
            'BF' => 'en',
            'BI' => 'en',
            'KH' => 'en',
            'CM' => 'en',
            'CA' => 'en',
            'CV' => 'en',
            'KY' => 'en',
            'CF' => 'en',
            'TD' => 'en',
            'CL' => 'es',
            'CN' => 'en',
            'CX' => 'en',
            'CC' => 'en',
            'CO' => 'es',
            'KM' => 'en',
            'CG' => 'en',
            'CD' => 'en',
            'CK' => 'en',
            'CR' => 'es',
            'CI' => 'en',
            'HR' => 'en',
            'CU' => 'es',
            'CY' => 'en',
            'CZ' => 'en',
            'DK' => 'en',
            'DJ' => 'en',
            'DM' => 'en',
            'DO' => 'es',
            'TP' => 'en',
            'EC' => 'es',
            'EG' => 'en',
            'SV' => 'es',
            'GQ' => 'en',
            'ER' => 'en',
            'EE' => 'en',
            'ET' => 'en',
            'FK' => 'en',
            'FO' => 'en',
            'FJ' => 'en',
            'FI' => 'en',
            'FR' => 'en',
            'GF' => 'en',
            'PF' => 'en',
            'TF' => 'en',
            'GA' => 'en',
            'GM' => 'en',
            'GE' => 'en',
            'DE' => 'en',
            'GH' => 'en',
            'GI' => 'en',
            'GR' => 'en',
            'GL' => 'en',
            'GD' => 'en',
            'GP' => 'en',
            'GU' => 'en',
            'GT' => 'es',
            'GN' => 'en',
            'GW' => 'en',
            'GY' => 'en',
            'HT' => 'en',
            'HM' => 'en',
            'VA' => 'en',
            'HN' => 'es',
            'HK' => 'en',
            'HU' => 'en',
            'IS' => 'en',
            'IN' => 'en',
            'ID' => 'en',
            'IR' => 'en',
            'IQ' => 'en',
            'IE' => 'en',
            'IL' => 'en',
            'IT' => 'en',
            'JM' => 'en',
            'JP' => 'en',
            'JO' => 'en',
            'KZ' => 'en',
            'KE' => 'en',
            'KI' => 'en',
            'KP' => 'en',
            'KR' => 'en',
            'KW' => 'en',
            'KG' => 'en',
            'LA' => 'en',
            'LV' => 'en',
            'LB' => 'en',
            'LS' => 'en',
            'LR' => 'en',
            'LY' => 'en',
            'LI' => 'en',
            'LT' => 'en',
            'LU' => 'en',
            'MO' => 'en',
            'MK' => 'en',
            'MG' => 'en',
            'MW' => 'en',
            'MY' => 'en',
            'MV' => 'en',
            'ML' => 'en',
            'MT' => 'en',
            'MH' => 'en',
            'MQ' => 'en',
            'MR' => 'en',
            'MU' => 'en',
            'YT' => 'en',
            'MX' => 'es',
            'FM' => 'en',
            'MD' => 'en',
            'MC' => 'en',
            'MN' => 'en',
            'MS' => 'en',
            'MA' => 'en',
            'MZ' => 'en',
            'MM' => 'en',
            'NA' => 'en',
            'NR' => 'en',
            'NP' => 'en',
            'NL' => 'en',
            'AN' => 'en',
            'NC' => 'en',
            'NZ' => 'en',
            'NI' => 'en',
            'NE' => 'en',
            'NG' => 'en',
            'NU' => 'en',
            'NF' => 'en',
            'MP' => 'en',
            'NO' => 'en',
            'OM' => 'en',
            'PK' => 'en',
            'PW' => 'en',
            'PA' => 'es',
            'PG' => 'en',
            'PY' => 'es',
            'PE' => 'es',
            'PH' => 'en',
            'PN' => 'en',
            'PL' => 'en',
            'PT' => 'en',
            'PR' => 'es',
            'QA' => 'en',
            'RE' => 'en',
            'RO' => 'en',
            'RU' => 'en',
            'RW' => 'en',
            'KN' => 'en',
            'LC' => 'en',
            'VC' => 'en',
            'WS' => 'en',
            'SM' => 'en',
            'ST' => 'en',
            'SA' => 'en',
            'SN' => 'en',
            'SC' => 'en',
            'SL' => 'en',
            'SG' => 'en',
            'SK' => 'en',
            'SI' => 'en',
            'SB' => 'en',
            'SO' => 'en',
            'ZA' => 'en',
            'GS' => 'en',
            'ES' => 'es',
            'LK' => 'en',
            'SH' => 'en',
            'PM' => 'en',
            'SD' => 'en',
            'SR' => 'en',
            'SJ' => 'en',
            'SZ' => 'en',
            'SE' => 'en',
            'CH' => 'en',
            'SY' => 'en',
            'TW' => 'en',
            'TJ' => 'en',
            'TZ' => 'en',
            'TH' => 'en',
            'TG' => 'en',
            'TK' => 'en',
            'TO' => 'en',
            'TT' => 'en',
            'TN' => 'en',
            'TR' => 'en',
            'TM' => 'en',
            'TC' => 'en',
            'TV' => 'en',
            'UG' => 'en',
            'UA' => 'en',
            'AE' => 'en',
            'GB' => 'en',
            'US' => 'en',
            'UM' => 'en',
            'UY' => 'es',
            'UZ' => 'en',
            'VU' => 'en',
            'VE' => 'es',
            'VN' => 'en',
            'VG' => 'en',
            'VI' => 'en',
            'WF' => 'en',
            'EH' => 'en',
            'YE' => 'en',
            'YU' => 'en',
            'ZM' => 'en',
            'ZW' => 'en'
            );
        return isset($countries[$id]) ? $countries[$id] : null;
    }

    public static function getById($id)
    {
        $countries = self::getAll();
        return isset($countries[$id]) ? $countries[$id] : null;
    }

    public static function getIdByName($country)
    {
        $country = self::ucwordss($country, array("and", "of", "d\'"));
        $countries = self::getAll();
        $posibles = preg_grep('/^' . $country . '.*/', $countries);
        if(count($posibles)) $f = array_keys(array_slice($posibles, 0 , 1));
        return count($posibles) ? $f[0] : null;
    }

    protected static function ucwordss($str, $exceptions) {
        $out = "";
        foreach (explode(" ", $str) as $word) {
        $out .= (!in_array($word, $exceptions)) ? strtoupper($word{0}) . substr($word, 1) . " " : $word . " ";
        }
        return rtrim($out);
    }
}