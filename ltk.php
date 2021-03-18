<?php

/**
 * Plugin Name: Loja Tünkers
 * Plugin URI: https://agencialaf.com
 * Description: Descrição do Loja Tünkers.
 * Version: 0.0.6
 * Author: Ingo Stramm
 * Text Domain: ltk
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('LTK_DIR', plugin_dir_path(__FILE__));
define('LTK_URL', plugin_dir_url(__FILE__));

function ltk_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

require_once 'tgm/tgm.php';
require_once 'classes/classes.php';
require_once 'scripts.php';
require_once 'cmb.php';
require_once 'ltk-shortcode.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/ltk/master/info.json',
    __FILE__,
    'ltk'
);
