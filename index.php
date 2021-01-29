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
 * @copyright  mallamma<mallamma@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */

require_once('../../config.php');
require_once('lib.php');
require_once('form/category_img_form.php');
global $DB,$CFG,$USER, $SESSION,$OUTPUT;
//getting categoryid from url.
$catid = optional_param('id','',PARAM_RAW); 
require_login(true);
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_url($CFG->wwwroot . '/local/category_img/index.php');
$title = get_string('title','local_category_img');
$PAGE->navbar->add($title);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->requires->jquery();
//Instantiate category_img_form 
$mform = new category_img_form();
//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect(new moodle_url('/local/category_img/index.php'));
} else if ($fromform = $mform->get_data()) {
  //here I am checking data is exists or not.
  $dataexists = $DB->record_exists('category_img', array('categoryid'=>$fromform->category));
  if($dataexists == 1){
      file_save_draft_area_files($fromform->userfile, $context->id,
'local_category_img', 'userfile',$fromform->userfile, array('subdirs' => true));
    //update record.
    $rowid = $DB->get_field('category_img','id',array('categoryid'=>$fromform->category));
    $update = new stdclass();
    $update->id = $rowid;
    $update->categoryid  = $fromform->category ;
    $update->imgitemid   = $fromform->userfile;
    $update->timecreated = time();
    $data = $DB->update_record('category_img',$update);
    if(!empty($data)){

      redirect(new moodle_url('/local/category_img/index.php'),get_string('update','local_category_img'));
    }
  }else{
      file_save_draft_area_files($fromform->userfile, $context->id,
'local_category_img', 'userfile',$fromform->userfile, array('subdirs' => true));
      // inserting record.
      $insert = new stdclass();
      $insert->categoryid = $fromform->category;
      $insert->imgitemid = $fromform->userfile;
      $insert->timecreated = time();
      $data = $DB->insert_record('category_img', $insert);
      if(!empty($data)){
      redirect(new moodle_url('/local/category_img/index.php'),get_string('insert','local_category_img'));
      }
  }
}
echo $OUTPUT->header();
if(empty($catid)){
  $mform->display();
//creating table.
$html='';
$html.=html_writer::start_tag('table',array('class'=>'table table-striped'));
$html.=html_writer::start_tag('thead');

$html.=html_writer::start_tag('tr');
$html.=html_writer::start_tag('th');
$html.=get_string('serialno','local_category_img');
$html.=html_writer::end_tag('th');
$html.=html_writer::start_tag('th');
$html.=get_string('categoryname','local_category_img');
$html.=html_writer::end_tag('th');
$html.=html_writer::start_tag('th');
$html.=get_string('catimg','local_category_img');
$html.=html_writer::end_tag('th');
$html.=html_writer::start_tag('th');
$html.=get_string('act','local_category_img');
$html.=html_writer::end_tag('th');
$html.=html_writer::end_tag('tr');

$html.=html_writer::end_tag('thead');

$html.=html_writer::start_tag('tbody');
$categorynames = $DB->get_records('category_img');
$counter = 1;
foreach ($categorynames as $categoryname) {
  $html.=html_writer::start_tag('tr');
  $html.=html_writer::start_tag('td');
  $html.=$counter;
  $html.=html_writer::end_tag('td');

  $html.=html_writer::start_tag('td');
  $catname = $DB->get_field('course_categories','name',array('id'=>$categoryname->categoryid));
  $html.=$catname;
  $html.=html_writer::end_tag('td');

  $html.=html_writer::start_tag('td');
  $categoryimg = local_category_img($categoryname->imgitemid);
  $html.=html_writer::start_tag('img',array('src'=>$categoryimg,'width'=>'10%'));
  $html.=html_writer::end_tag('td');

  $html.=html_writer::start_tag('td');
  //getting image link.
  $link=$CFG->wwwroot."/local/category_img/index.php?id=".$categoryname->id."";
  $html.=html_writer::start_tag('a',array('href'=>$link,'class'=>'btn btn-primary'));
  $html.='<i class="fa fa-cog" aria-hidden="true"></i>';
  $html.=html_writer::end_tag('a');
  $html.=html_writer::end_tag('td');

  $html.=html_writer::end_tag('tr');
  $counter++;
}
$html.=html_writer::end_tag('tbody');
$html.=html_writer::end_tag('table');
echo $html;

}else{
  //getting category object.
  $catobject = $DB->get_record('category_img',array('id'=>$catid));
  //set the data to form.
  $data = new stdclass();
  $data->category = $catobject->categoryid;
  $data->userfile = $catobject->imgitemid;
  $mform->set_data($data);

  $mform->display();
}
echo $OUTPUT->footer();