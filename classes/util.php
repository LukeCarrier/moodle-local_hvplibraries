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
     * Join path fragments with the platform's directory separator.
     *
     * @param string[] ...$paths
     *
     * @return string
     */
    public static function join_paths(...$paths) {
        /* We're using '/' instead of DIRECTORY_SEPARATOR because H5P tends to
         * derive lots of paths from URLs. We'll let PHP normalise paths for us
         * for the time being. */
        return implode('/', $paths);
    }

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

    /**
     * Does the string start with the substring?
     *
     * @param string $string    The larger of the two strings.
     * @param string $substring The substring to match at the beginning of the
     *                          string.
     *
     * @return boolean|string The remaining text after the substring if matched,
     *                        else false.
     */
    public static function starts_with($string, $substring) {
        if (substr_compare($string, $substring, 0) > 0) {
            return substr($string, strlen($substring));
        }
        return false;
    }
}
