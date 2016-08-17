<?php

/*
 * Disk-backed H5P libraries.
 *
 * @author Luke Carrier <luke.carrier@avadolearning.com>
 * @copyright 2016 AVADO Learning
 */

defined('MOODLE_INTERNAL') || die;

/** @var \stdClass $plugin */

$plugin->component = 'local_hvplibraries';

$plugin->version  = 2016081700;
$plugin->maturity = MATURITY_ALPHA;

$plugin->requires     = 2013051400; // Moodle 2.6
$plugin->dependencies = array();
