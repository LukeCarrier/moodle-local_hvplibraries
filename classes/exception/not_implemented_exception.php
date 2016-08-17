<?php

/*
 * Disk-backed H5P libraries.
 *
 * @author Luke Carrier <luke.carrier@avadolearning.com>
 * @copyright 2016 AVADO Learning
 */

namespace local_hvplibraries\exception;

use coding_exception;
use local_hvplibraries\util;

defined('MOODLE_INTERNAL') || die;

/**
 * Method not implemented exception.
 */
class not_implemented_exception extends coding_exception {
    /**
     * @override \coding_exception
     */
    public function __construct($method) {
        parent::__construct(util::string('methodnotimplemented', $method));
    }
}
