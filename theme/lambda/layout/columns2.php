<?php
// This file is part of Moodle - http://moodle.org/
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
 *
 * @package   theme_lambda
 * @copyright 2020 redPIthemes
 *
 */
$lambda_body_attributes = 'columns2';
$lambda_body_attributes .= ' has-region-side-pre';
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
if ($hassidepre) {$lambda_body_attributes .= ' used-region-side-pre';} else {$lambda_body_attributes .= ' empty-region-side-pre';}
$blockstyle = theme_lambda_get_setting('block_style');
if ($blockstyle == 0) {$lambda_body_attributes .= ' blockstyle-01';}
if ($blockstyle == 1) {$lambda_body_attributes .= ' blockstyle-02';}
if ($blockstyle == 2) {$lambda_body_attributes .= ' blockstyle-03';}

$hide_breadrumb_setting = theme_lambda_get_setting('hide_breadcrumb');
$hide_breadrumb = ((!isloggedin() or isguestuser()) and $hide_breadrumb_setting);
$left = (!right_to_left());
$standardlayout = FALSE;
if ($PAGE->theme->settings->block_layout == 1) {$standardlayout = TRUE;}
$sidebar = FALSE;
if ($PAGE->theme->settings->block_layout == 2) {$sidebar = TRUE; theme_lambda_init_sidebar($PAGE); $sidebar_stat = theme_lambda_get_sidebar_stat(); $lambda_body_attributes .= ' sidebar-enabled '.$sidebar_stat;}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes("$lambda_body_attributes"); ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<?php if ($sidebar) { ?>
<div id="sidebar" class="">
	<?php echo $OUTPUT->blocks('side-pre');?>
    <div id="sidebar-btn"><span></span><span></span><span></span></div>
</div>
<?php } ?>

<div id="wrapper">

<?php require_once(dirname(__FILE__).'/includes/header.php'); 
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;
?>

<div id="page" class="container-fluid">

    <div id ="page-header-nav" class="clearfix">
    	<?php if (!($hide_breadrumb)) { ?>
        <div id="page-navbar" class="clearfix">
            <div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); echo $OUTPUT->context_header_settings_menu(); echo $regionmainsettingsmenu; ?></nav>
        </div>
        <?php } ?>
    </div>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="<?php if ($sidebar) {echo 'span12';} else {echo 'span9';} ?><?php if ($left) {echo ' pull-left';} ?><?php if ($standardlayout) {echo ' pull-right';} ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php if (!$sidebar) {
        $classextra1 = '';
		$classextra2 = '';
		if (!$standardlayout) {
            $classextra1 = ' pull-right';
        }
        if ($left or (!$left and $standardlayout)) {
            $classextra2 = ' desktop-first-column';
        }
        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra1.$classextra2);
		} ?>
    </div>

    <a href="#top" class="back-to-top"><span class="lambda-sr-only"><?php echo get_string('back'); ?></span></a>

</div>
	<?php if ($CFG->version >= 2018120300) {echo $OUTPUT->standard_after_main_region_html();} ?>
	<footer id="page-footer" class="container-fluid">
		<?php require_once(dirname(__FILE__).'/includes/footer.php'); echo $OUTPUT->login_info();?>
	</footer>
</div>
<?php echo $OUTPUT->lambda_footer_scripts(); ?>
<?php echo $OUTPUT->standard_end_of_body_html() ?>

</body>
</html>