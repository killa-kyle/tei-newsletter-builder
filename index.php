<?php
/**
 * Plugin Name: TEI Newsletter Generator
 * Plugin URI: https://theexpertinstitute.com
 * Description: This plugin generates a Newsletter from blog posts
 * Version: 1.0.0
 * Author: Kyle Rose 
 * Author URI: http://krose.me
 * License: GPL2
 */





/*Get API KEY */
$api_key = parse_ini_file(dirname(__FILE__) . '/config/key.ini');
$api_key=$api_key['MAILCHIMP_API_KEY'];

/*  INCLUDE WRAPPER  */
require(dirname(__FILE__) . "/vendor/autoload.php");
use \DrewM\MailChimp\MailChimp;
$MailChimp = new MailChimp($api_key);


$list_id='f94c921cc3';
$template_id='233741';

$template = file_get_contents(dirname(__FILE__) . '/templates/newsletter.php');
    ob_start();
    require(dirname(__FILE__) .'/templates/newsletter.php');
$template = ob_get_clean();
    

function update_template(){
    global $api_key;
    echo $api_key;

}




add_action('init','update_template');

?>