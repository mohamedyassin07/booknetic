<?php



namespace Square\Models;

/**
 * Indicates the associated currency for an amount of money. Values correspond
 * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
 */
class Currency
{
    /**
     * Unknown currency
     */
    const UNKNOWN_CURRENCY = 'UNKNOWN_CURRENCY';

    /**
     * United Arab Emirates dirham
     */
    const AED = 'AED';

    /**
     * Afghan afghani
     */
    const AFN = 'AFN';

    /**
     * Albanian lek
     */
    const ALL = 'ALL';

    /**
     * Armenian dram
     */
    const AMD = 'AMD';

    /**
     * Netherlands Antillean guilder
     */
    const ANG = 'ANG';

    /**
     * Angolan kwanza
     */
    const AOA = 'AOA';

    /**
     * Argentine peso
     */
    const ARS = 'ARS';

    /**
     * Australian dollar
     */
    const AUD = 'AUD';

    /**
     * Aruban florin
     */
    const AWG = 'AWG';

    /**
     * Azerbaijani manat
     */
    const AZN = 'AZN';

    /**
     * Bosnia and Herzegovina convertible mark
     */
    const BAM = 'BAM';

    /**
     * Barbados dollar
     */
    const BBD = 'BBD';

    /**
     * Bangladeshi taka
     */
    const BDT = 'BDT';

    /**
     * Bulgarian lev
     */
    const BGN = 'BGN';

    /**
     * Bahraini dinar
     */
    const BHD = 'BHD';

    /**
     * Burundian franc
     */
    const BIF = 'BIF';

    /**
     * Bermudian dollar
     */
    const BMD = 'BMD';

    /**
     * Brunei dollar
     */
    const BND = 'BND';

    /**
     * Boliviano
     */
    const BOB = 'BOB';

    /**
     * Bolivian Mvdol
     */
    const BOV = 'BOV';

    /**
     * Brazilian real
     */
    const BRL = 'BRL';

    /**
     * Bahamian dollar
     */
    const BSD = 'BSD';

    /**
     * Bhutanese ngultrum
     */
    const BTN = 'BTN';

    /**
     * Botswana pula
     */
    const BWP = 'BWP';

    /**
     * Belarusian ruble
     */
    const BYR = 'BYR';

    /**
     * Belize dollar
     */
    const BZD = 'BZD';

    /**
     * Canadian dollar
     */
    const CAD = 'CAD';

    /**
     * Congolese franc
     */
    const CDF = 'CDF';

    /**
     * WIR Euro
     */
    const CHE = 'CHE';

    /**
     * Swiss franc
     */
    const CHF = 'CHF';

    /**
     * WIR Franc
     */
    const CHW = 'CHW';

    /**
     * Unidad de Fomento
     */
    const CLF = 'CLF';

    /**
     * Chilean peso
     */
    const CLP = 'CLP';

    /**
     * Chinese yuan
     */
    const CNY = 'CNY';

    /**
     * Colombian peso
     */
    const COP = 'COP';

    /**
     * Unidad de Valor Real
     */
    const COU = 'COU';

    /**
     * Costa Rican colon
     */
    const CRC = 'CRC';

    /**
     * Cuban convertible peso
     */
    const CUC = 'CUC';

    /**
     * Cuban peso
     */
    const CUP = 'CUP';

    /**
     * Cape Verdean escudo
     */
    const CVE = 'CVE';

    /**
     * Czech koruna
     */
    const CZK = 'CZK';

    /**
     * Djiboutian franc
     */
    const DJF = 'DJF';

    /**
     * Danish krone
     */
    const DKK = 'DKK';

    /**
     * Dominican peso
     */
    const DOP = 'DOP';

    /**
     * Algerian dinar
     */
    const DZD = 'DZD';

    /**
     * Egyptian pound
     */
    const EGP = 'EGP';

    /**
     * Eritrean nakfa
     */
    const ERN = 'ERN';

    /**
     * Ethiopian birr
     */
    const ETB = 'ETB';

    /**
     * Euro
     */
    const EUR = 'EUR';

    /**
     * Fiji dollar
     */
    const FJD = 'FJD';

    /**
     * Falkland Islands pound
     */
    const FKP = 'FKP';

    /**
     * Pound sterling
     */
    const GBP = 'GBP';

    /**
     * Georgian lari
     */
    const GEL = 'GEL';

    /**
     * Ghanaian cedi
     */
    const GHS = 'GHS';

    /**
     * Gibraltar pound
     */
    const GIP = 'GIP';

    /**
     * Gambian dalasi
     */
    const GMD = 'GMD';

    /**
     * Guinean franc
     */
    const GNF = 'GNF';

    /**
     * Guatemalan quetzal
     */
    const GTQ = 'GTQ';

    /**
     * Guyanese dollar
     */
    const GYD = 'GYD';

    /**
     * Hong Kong dollar
     */
    const HKD = 'HKD';

    /**
     * Honduran lempira
     */
    const HNL = 'HNL';

    /**
     * Croatian kuna
     */
    const HRK = 'HRK';

    /**
     * Haitian gourde
     */
    const HTG = 'HTG';

    /**
     * Hungarian forint
     */
    const HUF = 'HUF';

    /**
     * Indonesian rupiah
     */
    const IDR = 'IDR';

    /**
     * Israeli new shekel
     */
    const ILS = 'ILS';

    /**
     * Indian rupee
     */
    const INR = 'INR';

    /**
     * Iraqi dinar
     */
    const IQD = 'IQD';

    /**
     * Iranian rial
     */
    const IRR = 'IRR';

    /**
     * Icelandic króna
     */
    const ISK = 'ISK';

    /**
     * Jamaican dollar
     */
    const JMD = 'JMD';

    /**
     * Jordanian dinar
     */
    const JOD = 'JOD';

    /**
     * Japanese yen
     */
    const JPY = 'JPY';

    /**
     * Kenyan shilling
     */
    const KES = 'KES';

    /**
     * Kyrgyzstani som
     */
    const KGS = 'KGS';

    /**
     * Cambodian riel
     */
    const KHR = 'KHR';

    /**
     * Comoro franc
     */
    const KMF = 'KMF';

    /**
     * North Korean won
     */
    const KPW = 'KPW';

    /**
     * South Korean won
     */
    const KRW = 'KRW';

    /**
     * Kuwaiti dinar
     */
    const KWD = 'KWD';

    /**
     * Cayman Islands dollar
     */
    const KYD = 'KYD';

    /**
     * Kazakhstani tenge
     */
    const KZT = 'KZT';

    /**
     * Lao kip
     */
    const LAK = 'LAK';

    /**
     * Lebanese pound
     */
    const LBP = 'LBP';

    /**
     * Sri Lankan rupee
     */
    const LKR = 'LKR';

    /**
     * Liberian dollar
     */
    const LRD = 'LRD';

    /**
     * Lesotho loti
     */
    const LSL = 'LSL';

    /**
     * Lithuanian litas
     */
    const LTL = 'LTL';

    /**
     * Latvian lats
     */
    const LVL = 'LVL';

    /**
     * Libyan dinar
     */
    const LYD = 'LYD';

    /**
     * Moroccan dirham
     */
    const MAD = 'MAD';

    /**
     * Moldovan leu
     */
    const MDL = 'MDL';

    /**
     * Malagasy ariary
     */
    const MGA = 'MGA';

    /**
     * Macedonian denar
     */
    const MKD = 'MKD';

    /**
     * Myanmar kyat
     */
    const MMK = 'MMK';

    /**
     * Mongolian tögrög
     */
    const MNT = 'MNT';

    /**
     * Macanese pataca
     */
    const MOP = 'MOP';

    /**
     * Mauritanian ouguiya
     */
    const MRO = 'MRO';

    /**
     * Mauritian rupee
     */
    const MUR = 'MUR';

    /**
     * Maldivian rufiyaa
     */
    const MVR = 'MVR';

    /**
     * Malawian kwacha
     */
    const MWK = 'MWK';

    /**
     * Mexican peso
     */
    const MXN = 'MXN';

    /**
     * Mexican Unidad de Inversion
     */
    const MXV = 'MXV';

    /**
     * Malaysian ringgit
     */
    const MYR = 'MYR';

    /**
     * Mozambican metical
     */
    const MZN = 'MZN';

    /**
     * Namibian dollar
     */
    const NAD = 'NAD';

    /**
     * Nigerian naira
     */
    const NGN = 'NGN';

    /**
     * Nicaraguan córdoba
     */
    const NIO = 'NIO';

    /**
     * Norwegian krone
     */
    const NOK = 'NOK';

    /**
     * Nepalese rupee
     */
    const NPR = 'NPR';

    /**
     * New Zealand dollar
     */
    const NZD = 'NZD';

    /**
     * Omani rial
     */
    const OMR = 'OMR';

    /**
     * Panamanian balboa
     */
    const PAB = 'PAB';

    /**
     * Peruvian sol
     */
    const PEN = 'PEN';

    /**
     * Papua New Guinean kina
     */
    const PGK = 'PGK';

    /**
     * Philippine peso
     */
    const PHP = 'PHP';

    /**
     * Pakistani rupee
     */
    const PKR = 'PKR';

    /**
     * Polish złoty
     */
    const PLN = 'PLN';

    /**
     * Paraguayan guaraní
     */
    const PYG = 'PYG';

    /**
     * Qatari riyal
     */
    const QAR = 'QAR';

    /**
     * Romanian leu
     */
    const RON = 'RON';

    /**
     * Serbian dinar
     */
    const RSD = 'RSD';

    /**
     * Russian ruble
     */
    const RUB = 'RUB';

    /**
     * Rwandan franc
     */
    const RWF = 'RWF';

    /**
     * Saudi riyal
     */
    const SAR = 'SAR';

    /**
     * Solomon Islands dollar
     */
    const SBD = 'SBD';

    /**
     * Seychelles rupee
     */
    const SCR = 'SCR';

    /**
     * Sudanese pound
     */
    const SDG = 'SDG';

    /**
     * Swedish krona
     */
    const SEK = 'SEK';

    /**
     * Singapore dollar
     */
    const SGD = 'SGD';

    /**
     * Saint Helena pound
     */
    const SHP = 'SHP';

    /**
     * Sierra Leonean leone
     */
    const SLL = 'SLL';

    /**
     * Somali shilling
     */
    const SOS = 'SOS';

    /**
     * Surinamese dollar
     */
    const SRD = 'SRD';

    /**
     * South Sudanese pound
     */
    const SSP = 'SSP';

    /**
     * São Tomé and Príncipe dobra
     */
    const STD = 'STD';

    /**
     * Salvadoran colón
     */
    const SVC = 'SVC';

    /**
     * Syrian pound
     */
    const SYP = 'SYP';

    /**
     * Swazi lilangeni
     */
    const SZL = 'SZL';

    /**
     * Thai baht
     */
    const THB = 'THB';

    /**
     * Tajikstani somoni
     */
    const TJS = 'TJS';

    /**
     * Turkmenistan manat
     */
    const TMT = 'TMT';

    /**
     * Tunisian dinar
     */
    const TND = 'TND';

    /**
     * Tongan pa'anga
     */
    const TOP = 'TOP';

    /**
     * Turkish lira
     */
    const TRY_ = 'TRY';

    /**
     * Trinidad and Tobago dollar
     */
    const TTD = 'TTD';

    /**
     * New Taiwan dollar
     */
    const TWD = 'TWD';

    /**
     * Tanzanian shilling
     */
    const TZS = 'TZS';

    /**
     * Ukrainian hryvnia
     */
    const UAH = 'UAH';

    /**
     * Ugandan shilling
     */
    const UGX = 'UGX';

    /**
     * United States dollar
     */
    const USD = 'USD';

    /**
     * United States dollar (next day)
     */
    const USN = 'USN';

    /**
     * United States dollar (same day)
     */
    const USS = 'USS';

    /**
     * Uruguay Peso en Unidedades Indexadas
     */
    const UYI = 'UYI';

    /**
     * Uruguyan peso
     */
    const UYU = 'UYU';

    /**
     * Uzbekistan som
     */
    const UZS = 'UZS';

    /**
     * Venezuelan bolívar soberano
     */
    const VEF = 'VEF';

    /**
     * Vietnamese đồng
     */
    const VND = 'VND';

    /**
     * Vanuatu vatu
     */
    const VUV = 'VUV';

    /**
     * Samoan tala
     */
    const WST = 'WST';

    /**
     * CFA franc BEAC
     */
    const XAF = 'XAF';

    /**
     * Silver
     */
    const XAG = 'XAG';

    /**
     * Gold
     */
    const XAU = 'XAU';

    /**
     * European Composite Unit
     */
    const XBA = 'XBA';

    /**
     * European Monetary Unit
     */
    const XBB = 'XBB';

    /**
     * European Unit of Account 9
     */
    const XBC = 'XBC';

    /**
     * European Unit of Account 17
     */
    const XBD = 'XBD';

    /**
     * East Caribbean dollar
     */
    const XCD = 'XCD';

    /**
     * Special drawing rights (International Monetary Fund)
     */
    const XDR = 'XDR';

    /**
     * CFA franc BCEAO
     */
    const XOF = 'XOF';

    /**
     * Palladium
     */
    const XPD = 'XPD';

    /**
     * CFP franc
     */
    const XPF = 'XPF';

    /**
     * Platinum
     */
    const XPT = 'XPT';

    /**
     * Code reserved for testing
     */
    const XTS = 'XTS';

    /**
     * No currency
     */
    const XXX = 'XXX';

    /**
     * Yemeni rial
     */
    const YER = 'YER';

    /**
     * South African rand
     */
    const ZAR = 'ZAR';

    /**
     * Zambian kwacha
     */
    const ZMK = 'ZMK';

    /**
     * Zambian kwacha
     */
    const ZMW = 'ZMW';

    /**
     * Bitcoin
     */
    const BTC = 'BTC';
}
