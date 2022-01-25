<?php
/*
 * Plugin Name: Booknetic
 * Description: WordPress Appointment Booking and Scheduling system
 * Version: 2.7.7
 * Author: FS-Code
 * Author URI: https://www.booknetic.com
 * License: Commercial
 * Text Domain: booknetic
 */

defined( 'ABSPATH' ) or exit;


// Agea
require_once __DIR__ . '/app/agea/class-agea.php';
require_once __DIR__ . '/app/agea/class-tab.php';


require_once __DIR__ . '/vendor/autoload.php';
new \BookneticApp\Providers\Bootstrap();