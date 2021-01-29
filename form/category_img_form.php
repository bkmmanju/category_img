
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
 * @copyright  Mallamma Rotti<mallamma@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */
global $CFG;
//moodleform is defined in formslib.php
require_once($CFG->libdir.'/formslib.php');

 
class category_img_form extends moodleform {
    //Add elements to form
    public function definition() {
        global $DB,$CFG;
 
        $mform = $this->_form; // Don't forget the underscore! 
        //creating category dropdown.
        $categories= $DB->get_records('course_categories');

        $category =[];
        $category[] = get_string('selectcat', 'local_category_img');
        foreach ($categories as $cat) {
        	$category[$cat->id] = $cat->name;
        }
        //creating select dropdown.
        $mform->addElement('select', 'category', get_string('cat', 'local_category_img'),  $category);
        //creating filepicker.
        $mform->addElement('filepicker', 'userfile', get_string('catimg','local_category_img'), null);
        //creating array for button.
        $buttonarray=array();
        $buttonarray[] = $mform->createElement('submit', 'submitbutton', get_string('subbtn', 'local_category_img'));
        $buttonarray[] = $mform->createElement('cancel', get_string('cancelbtn', 'local_category_img'));
        $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);
    }

}
