<?php

/*
 * Disk-backed H5P libraries.
 *
 * @author Luke Carrier <luke.carrier@avadolearning.com>
 * @copyright 2016 AVADO Learning
 */

namespace local_hvplibraries;

use lang_string;

defined('MOODLE_INTERNAL') || die;

/**
 * Utility functions.
 */
class util {
    /**
     * Moodle component.
     *
     * @var string
     */
    const MOODLE_COMPONENT = 'local_hvplibraries';

    /**
     * Get a language string.
     *
     * @param string           $string The name of the string to retrieve.
     * @param \stdClass|string $a       An object or string containing
     *                                 substitions to be made to the string's
     *                                 value.
     * @param string          $module  If retrieving a string from another Moodle
     *                                 module, the name of the module.
     *
     * @return \lang_string The language string object.
     */
    public static function string($string, $a=null, $module=null) {
        $module = $module ?: static::MOODLE_COMPONENT;
        return new lang_string($string, $module, $a);
    }

    /**
     * Get a language string immediately.
     *
     * Returns the actual string instead of the intermediary lang_string
     * object, for inconsistent APIs that don't trigger __toString().
     *
     * @param string           $string The name of the string to retrieve.
     * @param \stdClass|string $a      An object or string containing
     *                                 substitions to be made to the string's
     *                                 value.
     * @param string           $module If retrieving a string from another Moodle
     *                                 module, the name of the module.
     *
     * @return string The language string.
     */
    public static function real_string($string, $a=null, $module=null) {
        $module = $module ?: static::MOODLE_COMPONENT;
        return get_string($string, $module, $a);
    }
}
