<?php

/*
 * Disk-backed H5P libraries.
 *
 * @author Luke Carrier <luke.carrier@avadolearning.com>
 * @copyright 2016 AVADO Learning
 */

namespace local_hvplibraries;

use H5PFileStorage;
use local_hvplibraries\exception\not_implemented_exception;
use mod_hvp\file_storage;

defined('MOODLE_INTERNAL') || die;

/**
 * Disk-backed file storage implementation.
 */
class disk_file_storage extends file_storage implements H5PFileStorage {
    /**
     * On-disk path: libraries.
     *
     * @var string
     */
    const PATH_LIBRARIES = '/local/hvplibraries/libraries';

    /**
     * Get the contents of a file from within a specified root.
     *
     * @param string $root
     * @param string $file
     *
     * @return string
     */
    protected static function get_file_contents($root, $file) {
        global $CFG;

        $path = util::join_paths($CFG->dirroot, $root, $file);

        return file_get_contents($path);
    }

    /**
     * Throw on unimplemented method.
     *
     * @param string $method
     *
     * @throws \local_hvplibraries\exception\not_implemented_exception
     */
    protected static function throw_unimpl($method) {
        throw new not_implemented_exception($method);
    }

    /**
     * Warn on implemented method.
     *
     * @param string $method
     */
    protected static function warn_unimpl($method) {
        debugging(util::string('methodnotimplemented', $method));
    }

    /**
     * @override \H5PFileStorage
     */
    public function saveLibrary($library) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function cacheAssets(&$files, $key) {
        static::warn_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function getCachedAssets($key) {
        debugging(util::string('methodnotimplemented', __METHOD__));
    }

    /**
     * @override \H5PFileStorage
     */
    public function deleteCachedAssets($keys) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function getContent($filepath) {
        /* This is ugly, but necessary for the editor to work. It would be nice
         * if we had domain-specific \H5PFileStorage implementations for each
         * file areas. */
        if ($resolvedfile = util::starts_with($filepath, '/libraries')) {
            return static::get_file_contents(static::PATH_LIBRARIES, $resolvedfile);
        }

        parent::getContent($filepath);
    }
}
