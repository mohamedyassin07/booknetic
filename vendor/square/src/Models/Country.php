<?php



namespace Square\Models;

/**
 * Indicates the country associated with another entity, such as a business.
 * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
 */
class Country
{
    /**
     * Unknown
     */
    const ZZ = 'ZZ';

    /**
     * Andorra
     */
    const AD = 'AD';

    /**
     * United Arab Emirates
     */
    const AE = 'AE';

    /**
     * Afghanistan
     */
    const AF = 'AF';

    /**
     * Antigua and Barbuda
     */
    const AG = 'AG';

    /**
     * Anguilla
     */
    const AI = 'AI';

    /**
     * Albania
     */
    const AL = 'AL';

    /**
     * Armenia
     */
    const AM = 'AM';

    /**
     * Angola
     */
    const AO = 'AO';

    /**
     * Antartica
     */
    const AQ = 'AQ';

    /**
     * Argentina
     */
    const AR = 'AR';

    /**
     * American Samoa
     */
    const AS_ = 'AS';

    /**
     * Austria
     */
    const AT = 'AT';

    /**
     * Australia
     */
    const AU = 'AU';

    /**
     * Aruba
     */
    const AW = 'AW';

    /**
     * Åland Islands
     */
    const AX = 'AX';

    /**
     * Azerbaijan
     */
    const AZ = 'AZ';

    /**
     * Bosnia and Herzegovina
     */
    const BA = 'BA';

    /**
     * Barbados
     */
    const BB = 'BB';

    /**
     * Bangladesh
     */
    const BD = 'BD';

    /**
     * Belgium
     */
    const BE = 'BE';

    /**
     * Burkina Faso
     */
    const BF = 'BF';

    /**
     * Bulgaria
     */
    const BG = 'BG';

    /**
     * Bahrain
     */
    const BH = 'BH';

    /**
     * Burundi
     */
    const BI = 'BI';

    /**
     * Benin
     */
    const BJ = 'BJ';

    /**
     * Saint Barthélemy
     */
    const BL = 'BL';

    /**
     * Bermuda
     */
    const BM = 'BM';

    /**
     * Brunei
     */
    const BN = 'BN';

    /**
     * Bolivia
     */
    const BO = 'BO';

    /**
     * Bonaire
     */
    const BQ = 'BQ';

    /**
     * Brazil
     */
    const BR = 'BR';

    /**
     * Bahamas
     */
    const BS = 'BS';

    /**
     * Bhutan
     */
    const BT = 'BT';

    /**
     * Bouvet Island
     */
    const BV = 'BV';

    /**
     * Botswana
     */
    const BW = 'BW';

    /**
     * Belarus
     */
    const BY = 'BY';

    /**
     * Belize
     */
    const BZ = 'BZ';

    /**
     * Canada
     */
    const CA = 'CA';

    /**
     * Cocos Islands
     */
    const CC = 'CC';

    /**
     * Democratic Republic of the Congo
     */
    const CD = 'CD';

    /**
     * Central African Republic
     */
    const CF = 'CF';

    /**
     * Congo
     */
    const CG = 'CG';

    /**
     * Switzerland
     */
    const CH = 'CH';

    /**
     * Ivory Coast
     */
    const CI = 'CI';

    /**
     * Cook Islands
     */
    const CK = 'CK';

    /**
     * Chile
     */
    const CL = 'CL';

    /**
     * Cameroon
     */
    const CM = 'CM';

    /**
     * China
     */
    const CN = 'CN';

    /**
     * Colombia
     */
    const CO = 'CO';

    /**
     * Costa Rica
     */
    const CR = 'CR';

    /**
     * Cuba
     */
    const CU = 'CU';

    /**
     * Cabo Verde
     */
    const CV = 'CV';

    /**
     * Curaçao
     */
    const CW = 'CW';

    /**
     * Christmas Island
     */
    const CX = 'CX';

    /**
     * Cyprus
     */
    const CY = 'CY';

    /**
     * Czechia
     */
    const CZ = 'CZ';

    /**
     * Germany
     */
    const DE = 'DE';

    /**
     * Djibouti
     */
    const DJ = 'DJ';

    /**
     * Denmark
     */
    const DK = 'DK';

    /**
     * Dominica
     */
    const DM = 'DM';

    /**
     * Dominican Republic
     */
    const DO_ = 'DO';

    /**
     * Algeria
     */
    const DZ = 'DZ';

    /**
     * Ecuador
     */
    const EC = 'EC';

    /**
     * Estonia
     */
    const EE = 'EE';

    /**
     * Egypt
     */
    const EG = 'EG';

    /**
     * Western Sahara
     */
    const EH = 'EH';

    /**
     * Eritrea
     */
    const ER = 'ER';

    /**
     * Spain
     */
    const ES = 'ES';

    /**
     * Ethiopia
     */
    const ET = 'ET';

    /**
     * Finland
     */
    const FI = 'FI';

    /**
     * Fiji
     */
    const FJ = 'FJ';

    /**
     * Falkland Islands
     */
    const FK = 'FK';

    /**
     * Federated States of Micronesia
     */
    const FM = 'FM';

    /**
     * Faroe Islands
     */
    const FO = 'FO';

    /**
     * France
     */
    const FR = 'FR';

    /**
     * Gabon
     */
    const GA = 'GA';

    /**
     * United Kingdom
     */
    const GB = 'GB';

    /**
     * Grenada
     */
    const GD = 'GD';

    /**
     * Georgia
     */
    const GE = 'GE';

    /**
     * French Guiana
     */
    const GF = 'GF';

    /**
     * Guernsey
     */
    const GG = 'GG';

    /**
     * Ghana
     */
    const GH = 'GH';

    /**
     * Gibraltar
     */
    const GI = 'GI';

    /**
     * Greenland
     */
    const GL = 'GL';

    /**
     * Gambia
     */
    const GM = 'GM';

    /**
     * Guinea
     */
    const GN = 'GN';

    /**
     * Guadeloupe
     */
    const GP = 'GP';

    /**
     * Equatorial Guinea
     */
    const GQ = 'GQ';

    /**
     * Greece
     */
    const GR = 'GR';

    /**
     * South Georgia and the South Sandwich Islands
     */
    const GS = 'GS';

    /**
     * Guatemala
     */
    const GT = 'GT';

    /**
     * Guam
     */
    const GU = 'GU';

    /**
     * Guinea-Bissau
     */
    const GW = 'GW';

    /**
     * Guyana
     */
    const GY = 'GY';

    /**
     * Hong Kong
     */
    const HK = 'HK';

    /**
     * Heard Island and McDonald Islands
     */
    const HM = 'HM';

    /**
     * Honduras
     */
    const HN = 'HN';

    /**
     * Croatia
     */
    const HR = 'HR';

    /**
     * Haiti
     */
    const HT = 'HT';

    /**
     * Hungary
     */
    const HU = 'HU';

    /**
     * Indonesia
     */
    const ID = 'ID';

    /**
     * Ireland
     */
    const IE = 'IE';

    /**
     * Israel
     */
    const IL = 'IL';

    /**
     * Isle of Man
     */
    const IM = 'IM';

    /**
     * India
     */
    const IN = 'IN';

    /**
     * British Indian Ocean Territory
     */
    const IO = 'IO';

    /**
     * Iraq
     */
    const IQ = 'IQ';

    /**
     * Iran
     */
    const IR = 'IR';

    /**
     * Iceland
     */
    const IS = 'IS';

    /**
     * Italy
     */
    const IT = 'IT';

    /**
     * Jersey
     */
    const JE = 'JE';

    /**
     * Jamaica
     */
    const JM = 'JM';

    /**
     * Jordan
     */
    const JO = 'JO';

    /**
     * Japan
     */
    const JP = 'JP';

    /**
     * Kenya
     */
    const KE = 'KE';

    /**
     * Kyrgyzstan
     */
    const KG = 'KG';

    /**
     * Cambodia
     */
    const KH = 'KH';

    /**
     * Kiribati
     */
    const KI = 'KI';

    /**
     * Comoros
     */
    const KM = 'KM';

    /**
     * Saint Kitts and Nevis
     */
    const KN = 'KN';

    /**
     * Democratic People's Republic of Korea
     */
    const KP = 'KP';

    /**
     * Republic of Korea
     */
    const KR = 'KR';

    /**
     * Kuwait
     */
    const KW = 'KW';

    /**
     * Cayman Islands
     */
    const KY = 'KY';

    /**
     * Kazakhstan
     */
    const KZ = 'KZ';

    /**
     * Lao People's Democratic Republic
     */
    const LA = 'LA';

    /**
     * Lebanon
     */
    const LB = 'LB';

    /**
     * Saint Lucia
     */
    const LC = 'LC';

    /**
     * Liechtenstein
     */
    const LI = 'LI';

    /**
     * Sri Lanka
     */
    const LK = 'LK';

    /**
     * Liberia
     */
    const LR = 'LR';

    /**
     * Lesotho
     */
    const LS = 'LS';

    /**
     * Lithuania
     */
    const LT = 'LT';

    /**
     * Luxembourg
     */
    const LU = 'LU';

    /**
     * Latvia
     */
    const LV = 'LV';

    /**
     * Libya
     */
    const LY = 'LY';

    /**
     * Morocco
     */
    const MA = 'MA';

    /**
     * Monaco
     */
    const MC = 'MC';

    /**
     * Moldova
     */
    const MD = 'MD';

    /**
     * Montenegro
     */
    const ME = 'ME';

    /**
     * Saint Martin
     */
    const MF = 'MF';

    /**
     * Madagascar
     */
    const MG = 'MG';

    /**
     * Marshall Islands
     */
    const MH = 'MH';

    /**
     * North Macedonia
     */
    const MK = 'MK';

    /**
     * Mali
     */
    const ML = 'ML';

    /**
     * Myanmar
     */
    const MM = 'MM';

    /**
     * Mongolia
     */
    const MN = 'MN';

    /**
     * Macao
     */
    const MO = 'MO';

    /**
     * Northern Mariana Islands
     */
    const MP = 'MP';

    /**
     * Martinique
     */
    const MQ = 'MQ';

    /**
     * Mauritania
     */
    const MR = 'MR';

    /**
     * Montserrat
     */
    const MS = 'MS';

    /**
     * Malta
     */
    const MT = 'MT';

    /**
     * Mauritius
     */
    const MU = 'MU';

    /**
     * Maldives
     */
    const MV = 'MV';

    /**
     * Malawi
     */
    const MW = 'MW';

    /**
     * Mexico
     */
    const MX = 'MX';

    /**
     * Malaysia
     */
    const MY = 'MY';

    /**
     * Mozambique
     */
    const MZ = 'MZ';

    /**
     * Namibia
     */
    const NA = 'NA';

    /**
     * New Caledonia
     */
    const NC = 'NC';

    /**
     * Niger
     */
    const NE = 'NE';

    /**
     * Norfolk Island
     */
    const NF = 'NF';

    /**
     * Nigeria
     */
    const NG = 'NG';

    /**
     * Nicaragua
     */
    const NI = 'NI';

    /**
     * Netherlands
     */
    const NL = 'NL';

    /**
     * Norway
     */
    const NO = 'NO';

    /**
     * Nepal
     */
    const NP = 'NP';

    /**
     * Nauru
     */
    const NR = 'NR';

    /**
     * Niue
     */
    const NU = 'NU';

    /**
     * New Zealand
     */
    const NZ = 'NZ';

    /**
     * Oman
     */
    const OM = 'OM';

    /**
     * Panama
     */
    const PA = 'PA';

    /**
     * Peru
     */
    const PE = 'PE';

    /**
     * French Polynesia
     */
    const PF = 'PF';

    /**
     * Papua New Guinea
     */
    const PG = 'PG';

    /**
     * Philippines
     */
    const PH = 'PH';

    /**
     * Pakistan
     */
    const PK = 'PK';

    /**
     * Poland
     */
    const PL = 'PL';

    /**
     * Saint Pierre and Miquelon
     */
    const PM = 'PM';

    /**
     * Pitcairn
     */
    const PN = 'PN';

    /**
     * Puerto Rico
     */
    const PR = 'PR';

    /**
     * Palestine
     */
    const PS = 'PS';

    /**
     * Portugal
     */
    const PT = 'PT';

    /**
     * Palau
     */
    const PW = 'PW';

    /**
     * Paraguay
     */
    const PY = 'PY';

    /**
     * Qatar
     */
    const QA = 'QA';

    /**
     * Réunion
     */
    const RE = 'RE';

    /**
     * Romania
     */
    const RO = 'RO';

    /**
     * Serbia
     */
    const RS = 'RS';

    /**
     * Russia
     */
    const RU = 'RU';

    /**
     * Rwanda
     */
    const RW = 'RW';

    /**
     * Saudi Arabia
     */
    const SA = 'SA';

    /**
     * Solomon Islands
     */
    const SB = 'SB';

    /**
     * Seychelles
     */
    const SC = 'SC';

    /**
     * Sudan
     */
    const SD = 'SD';

    /**
     * Sweden
     */
    const SE = 'SE';

    /**
     * Singapore
     */
    const SG = 'SG';

    /**
     * Saint Helena, Ascension and Tristan da Cunha
     */
    const SH = 'SH';

    /**
     * Slovenia
     */
    const SI = 'SI';

    /**
     * Svalbard and Jan Mayen
     */
    const SJ = 'SJ';

    /**
     * Slovakia
     */
    const SK = 'SK';

    /**
     * Sierra Leone
     */
    const SL = 'SL';

    /**
     * San Marino
     */
    const SM = 'SM';

    /**
     * Senegal
     */
    const SN = 'SN';

    /**
     * Somalia
     */
    const SO = 'SO';

    /**
     * Suriname
     */
    const SR = 'SR';

    /**
     * South Sudan
     */
    const SS = 'SS';

    /**
     * Sao Tome and Principe
     */
    const ST = 'ST';

    /**
     * El Salvador
     */
    const SV = 'SV';

    /**
     * Sint Maarten
     */
    const SX = 'SX';

    /**
     * Syrian Arab Republic
     */
    const SY = 'SY';

    /**
     * Eswatini
     */
    const SZ = 'SZ';

    /**
     * Turks and Caicos Islands
     */
    const TC = 'TC';

    /**
     * Chad
     */
    const TD = 'TD';

    /**
     * French Southern Territories
     */
    const TF = 'TF';

    /**
     * Togo
     */
    const TG = 'TG';

    /**
     * Thailand
     */
    const TH = 'TH';

    /**
     * Tajikistan
     */
    const TJ = 'TJ';

    /**
     * Tokelau
     */
    const TK = 'TK';

    /**
     * Timor-Leste
     */
    const TL = 'TL';

    /**
     * Turkmenistan
     */
    const TM = 'TM';

    /**
     * Tunisia
     */
    const TN = 'TN';

    /**
     * Tonga
     */
    const TO = 'TO';

    /**
     * Turkey
     */
    const TR = 'TR';

    /**
     * Trinidad and Tobago
     */
    const TT = 'TT';

    /**
     * Tuvalu
     */
    const TV = 'TV';

    /**
     * Taiwan
     */
    const TW = 'TW';

    /**
     * Tanzania
     */
    const TZ = 'TZ';

    /**
     * Ukraine
     */
    const UA = 'UA';

    /**
     * Uganda
     */
    const UG = 'UG';

    /**
     * United States Minor Outlying Islands
     */
    const UM = 'UM';

    /**
     * United States of America
     */
    const US = 'US';

    /**
     * Uruguay
     */
    const UY = 'UY';

    /**
     * Uzbekistan
     */
    const UZ = 'UZ';

    /**
     * Vatican City
     */
    const VA = 'VA';

    /**
     * Saint Vincent and the Grenadines
     */
    const VC = 'VC';

    /**
     * Venezuela
     */
    const VE = 'VE';

    /**
     * British Virgin Islands
     */
    const VG = 'VG';

    /**
     * U.S. Virgin Islands
     */
    const VI = 'VI';

    /**
     * Vietnam
     */
    const VN = 'VN';

    /**
     * Vanuatu
     */
    const VU = 'VU';

    /**
     * Wallis and Futuna
     */
    const WF = 'WF';

    /**
     * Samoa
     */
    const WS = 'WS';

    /**
     * Yemen
     */
    const YE = 'YE';

    /**
     * Mayotte
     */
    const YT = 'YT';

    /**
     * South Africa
     */
    const ZA = 'ZA';

    /**
     * Zambia
     */
    const ZM = 'ZM';

    /**
     * Zimbabwe
     */
    const ZW = 'ZW';
}
