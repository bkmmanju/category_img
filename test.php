<?php//upcoming courses.
public function upcoming_courses_info(){
    global $PAGE;

    $title1  = (empty($PAGE->theme->settings->title1)) ? false : format_text($PAGE->theme->settings->title1);

    $upcoimgcourseimg1 =(empty($PAGE->theme->setting_file_url('upcoimgcourseimg1', 'upcoimgcourseimg1'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg1', 'upcoimgcourseimg1');


    $imgurl1  = (empty($PAGE->theme->settings->imgurl1)) ? false : format_text($PAGE->theme->settings->imgurl1);

    $title2  = (empty($PAGE->theme->settings->title2)) ? false : format_text($PAGE->theme->settings->title2);
    $upcoimgcourseimg2 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg2', 'upcoimgcourseimg2'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg2', 'upcoimgcourseimg2');
    $imgurl2  = (empty($PAGE->theme->settings->imgurl2)) ? false : format_text($PAGE->theme->settings->imgurl2);


    $title3  = (empty($PAGE->theme->settings->title3)) ? false : format_text($PAGE->theme->settings->title3);
    $upcoimgcourseimg3 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg3', 'upcoimgcourseimg3'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg3', 'upcoimgcourseimg3');
    $imgurl3  = (empty($PAGE->theme->settings->imgurl3)) ? false : format_text($PAGE->theme->settings->imgurl3);


    $title4  = (empty($PAGE->theme->settings->title4)) ? false : format_text($PAGE->theme->settings->title4);
    $upcoimgcourseimg4 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg4', 'upcoimgcourseimg4'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg4', 'upcoimgcourseimg4');
    $imgurl4  = (empty($PAGE->theme->settings->imgurl4)) ? false : format_text($PAGE->theme->settings->imgurl4);


    $title5  = (empty($PAGE->theme->settings->title5)) ? false : format_text($PAGE->theme->settings->title5);
    $upcoimgcourseimg5 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg5', 'upcoimgcourseimg5'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg5', 'upcoimgcourseimg5');
    $imgurl5  = (empty($PAGE->theme->settings->imgurl5)) ? false : format_text($PAGE->theme->settings->imgurl5);


    $title6  = (empty($PAGE->theme->settings->title6)) ? false : format_text($PAGE->theme->settings->title6);
    $upcoimgcourseimg6 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg6', 'upcoimgcourseimg6'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg6', 'upcoimgcourseimg6');
    $imgurl6  = (empty($PAGE->theme->settings->imgurl6)) ? false : format_text($PAGE->theme->settings->imgurl6);


    $title7  = (empty($PAGE->theme->settings->title7)) ? false : format_text($PAGE->theme->settings->title7);
    $upcoimgcourseimg7 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg7', 'upcoimgcourseimg7'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg7', 'upcoimgcourseimg7');
    $imgurl7  = (empty($PAGE->theme->settings->imgurl7)) ? false : format_text($PAGE->theme->settings->imgurl7);



    $title8  = (empty($PAGE->theme->settings->title8)) ? false : format_text($PAGE->theme->settings->title8);
    $upcoimgcourseimg8 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg8', 'upcoimgcourseimg8'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg8', 'upcoimgcourseimg8');
    $imgurl8  = (empty($PAGE->theme->settings->imgurl8)) ? false : format_text($PAGE->theme->settings->title8);



    $title9  = (empty($PAGE->theme->settings->title9)) ? false : format_text($PAGE->theme->settings->title9);
    $upcoimgcourseimg9 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg9', 'upcoimgcourseimg9'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg9', 'upcoimgcourseimg9');
    $imgurl9  = (empty($PAGE->theme->settings->imgurl9)) ? false : format_text($PAGE->theme->settings->imgurl9);


    $title10  = (empty($PAGE->theme->settings->title10)) ? false : format_text($PAGE->theme->settings->title10);
    $upcoimgcourseimg10 = (empty($PAGE->theme->setting_file_url('upcoimgcourseimg10', 'upcoimgcourseimg10'))) ? false : $PAGE->theme->setting_file_url('upcoimgcourseimg10', 'upcoimgcourseimg10');
    $imgurl10  = (empty($PAGE->theme->settings->imgurl10)) ? false : format_text($PAGE->theme->settings->imgurl10);

    $upcomingcourse = [
        array(
            'hastitle' => $title1,
            'courseimg' => $upcoimgcourseimg1,
            'courseurl' => $imgurl1
        ),

        array(
            'hastitle' => $title2,
            'courseimg' => $upcoimgcourseimg2,
            'courseurl' => $imgurl2
        ),

        array(
            'hastitle' => $title3,
            'courseimg' => $upcoimgcourseimg3,
            'courseurl' => $imgurl3
        ),

        array(
            'hastitle' => $title4,
            'courseimg' => $upcoimgcourseimg4,
            'courseurl' => $imgurl4
        ),

        array(
            'hastitle' => $title5,
            'courseimg' => $upcoimgcourseimg5,
            'courseurl' => $imgurl5
        ),

        array(
            'hastitle' => $title6,
            'courseimg' => $upcoimgcourseimg6,
            'courseurl' => $imgurl6
        ),

        array(
            'hastitle' => $title7,
            'courseimg' => $upcoimgcourseimg7,
            'courseurl' => $imgurl7
        ),

        array(
            'hastitle' => $title8,
            'courseimg' => $upcoimgcourseimg8,
            'courseurl' => $imgurl8
        ),

        array(
            'hastitle' => $title9,
            'courseimg' => $upcoimgcourseimg9,
            'courseurl' => $imgurl9
        ),

        array(
            'hastitle' => $title10,
            'courseimg' => $upcoimgcourseimg10,
            'courseurl' => $imgurl10
        )];
return $this->render_from_template('theme_fordson/upcomingcourse', $upcomingcourse);

}