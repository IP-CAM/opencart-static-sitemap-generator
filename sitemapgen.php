<?php

/**
 * OpenCart Ukrainian Community
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License, Version 3
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/copyleft/gpl.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please visit http://opencart-ukraine.tumblr.com so we can send you a copy immediately.
 *
 * @category   OpenCart
 * @package    OCU Static Sitemap Generator
 * @copyright  Copyright (c) 2011 Eugene Kuligin by OpenCart Ukrainian Community (http://opencart-ukraine.tumblr.com)
 * @license    http://www.gnu.org/copyleft/gpl.html     GNU General Public License, Version 3
 * @version    $Id: sitemapgen.php 1.2 2011-12-11 22:34:40
 */



/**
 * @category   OpenCart
 * @package    OCU Static Sitemap Generator
 * @copyright  Copyright (c) 2011 Eugene Kuligin by OpenCart Ukrainian Community (http://opencart-ukraine.tumblr.com)
 * @license    http://www.gnu.org/copyleft/gpl.html     GNU General Public License, Version 3
 */

// Load configuration
require_once('config.php');


// Set variables
$siteMapSource = HTTP_SERVER . 'index.php?route=feed/google_sitemap';


// Load main siteMap content
if (!$siteMapContent = @simplexml_load_file($siteMapSource)) {
    error_log(date('Y-m-d H:i:s - ', time()) . 'Source is not exists or does not readable' ."\n", 3, DIR_LOGS . 'sitemapgen.txt');
    die('Update process has failed!');
}


// Write in to the file
if (!file_put_contents(DIR_BASE . 'sitemap.xml', $siteMapContent->asXML())) {
    error_log(date('Y-m-d H:i:s - ', time()) . 'Unable to save content' ."\n", 3, DIR_LOGS . 'sitemapgen.txt');
    die('Update process has failed!');
} else {
    echo 'Update has been successfully completed.';
}
