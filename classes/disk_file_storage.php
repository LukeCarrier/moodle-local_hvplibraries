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

defined('MOODLE_INTERNAL') || die;

/**
 * Disk-backed file storage implementation.
 */
class disk_file_storage implements H5PFileStorage {
    protected static function throw_unimpl($method) {
        throw new not_implemented_exception($method);
    }

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
    public function saveContent($source, $id) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function deleteContent($id) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function cloneContent($id, $newId) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function getTmpPath() {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function exportContent($id, $target) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function exportLibrary($library, $target) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function saveExport($source, $filename) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function deleteExport($filename) {
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
    public function getContent($file_path) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function saveFile($file, $contentId) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function cloneContentFile($file, $fromId, $toId) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function getContentFile($file, $contentId) {
        static::throw_unimpl(__METHOD__);
    }

    /**
     * @override \H5PFileStorage
     */
    public function removeContentFile($file, $contentId) {
        static::throw_unimpl(__METHOD__);
    }
}
