<?php
// This file is part of the Certificate module for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Handles uploading files
 *
 * @package    local_category_img
 * @copyright  Rachitha Rotti<mallamma@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */
 
global $CFG,$DB,$USER;
require_once($CFG->libdir.'/completionlib.php');
require_once("$CFG->libdir/gradelib.php");
require_once("$CFG->dirroot/lib/completionlib.php");
require_once($CFG->dirroot . '/grade/querylib.php');
//Rachita. Getting category image by passing itemid.
function local_category_img($itemid){
	global $DB,$CFG;
	if(!empty($itemid)){
		$context = context_system::instance();
		$contextid = $context->id;
		global $USER;
		$component = 'local_category_img';
		$filearea = 'userfile';
		$fs = get_file_storage();
		$files = $fs->get_area_files($contextid, $component, $filearea, $itemid);

		if(!empty($files)){
			$url2 ='';
			foreach($files as $file) {
				$file->get_filename();
				$url2 = moodle_url::make_pluginfile_url(
					$file->get_contextid(), $file->get_component(), $file->get_filearea(), $file->get_itemid(), $file->get_filepath(), $file->get_filename()
				);
			}
			return $url2;
		}
	}
}
function local_category_img_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options=array()) {


// Make sure the filearea is one of those used by the plugin.

	if ($filearea == 'userfile') {


// Make sure the user is logged in and has access to the module (plugins that are not course modules should leave out the 'cm' part).
		require_login();


// Leave this line out if you set the itemid to null in make_pluginfile_url (set $itemid to 0 instead).
$itemid = array_shift($args); // The first item in the $args array.

// Use the itemid to retrieve any relevant data records and perform any security checks to see if the
// user really does have access to the file in question.

// Extract the filename / filepath from the $args array.
$filename = array_pop($args); // The last item in the $args array.
if (!$args) {
$filepath = '/'; // $args is empty => the path is '/'
} else {
$filepath = '/'.implode('/', $args).'/'; // $args contains elements of the filepath
}

// Retrieve the file from the Files API.
$fs = get_file_storage();
$file = $fs->get_file($context->id, 'local_category_img', $filearea, $itemid, $filepath, $filename);
if (!$file) {
return false; // The file does not exist.
}

// We can now send the file back to the browser - in this case with a cache lifetime of 1 day and no filtering.
// From Moodle 2.3, use send_stored_file instead.
//send_stored_file($file, 0, 0, true, $options); // download MUST be forced - security!

$forcedownload = true;

send_file($file, $file->get_filename(), true, $forcedownload, $options);

}
}