<?php
/*  PEL: PHP Exif Library.  A library with support for reading and
 *  writing all Exif headers in JPEG and TIFF images using PHP.
 *
 *  Copyright (C) 2004, 2006, 2007  Martin Geisler.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program in the file COPYING; if not, write to the
 *  Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 *  Boston, MA 02110-1301 USA
 */
set_include_path(dirname(__FILE__) . '/../src/' . PATH_SEPARATOR . get_include_path());

if (realpath($_SERVER['PHP_SELF']) == __FILE__) {
  require_once 'simpletest/autorun.php';
}

class Bug2979466TestCase extends UnitTestCase {

  function __construct() {
    parent::__construct('Bug2979466 Test');
  }

  function testThisDoesNotWorkAsExpected() {
    $file = dirname(__FILE__) . '/images/bug2979466.jpg';

    try {
      require_once 'PelJpeg.php';
      $jpeg = new PelJpeg($file);
    } catch (Exception $e) {
        $this->fail('Test should not throw an exception');
    }
  }
}
