#!/usr/bin/php
<?php

/*  PEL: PHP EXIF Library.  A library with support for reading and
 *  writing all EXIF headers in JPEG and TIFF images using PHP.
 *
 *  Copyright (C) 2004, 2005  Martin Geisler.
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
 *  Free Software Foundation, Inc., 59 Temple Place, Suite 330,
 *  Boston, MA 02111-1307 USA
 */

/* $Id$ */

error_reporting(E_ALL);

/* This assumes that SimpleTest is installed in a directory parallel
 * to the PEL directory. */
define('SIMPLE_TEST', '../../simpletest/');

require_once(SIMPLE_TEST . 'unit_tester.php');
require_once(SIMPLE_TEST . 'reporter.php');

$test = new GroupTest('All PEL tests');
$test->addTestFile('data-window.php');
$test->addTestFile('convert.php');
$test->addTestFile('ascii.php');
$test->addTestFile('number.php');
$test->addTestFile('undefined.php');


if (is_dir('image-tests')) {
  $image_tests = glob('image-tests/*.php');
  foreach ($image_tests as $image_test)
    if ($image_test != 'image-tests/make-image-test.php')
      $test->addTestFile($image_test);

} else {
  echo "Found no image tests, only core functionality will be tested.\n";
  echo "Image tests are available from http://pel.sourceforge.net/.\n";
}

$test->run(new TextReporter());

?>