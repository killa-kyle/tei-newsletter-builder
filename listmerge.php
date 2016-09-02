<?php 

    $api_key = parse_ini_file('config/key.ini');
    $api_key=$api_key['MAILCHIMP_API_KEY'];
    
    require("vendor/autoload.php");
    use \DrewM\MailChimp\MailChimp;
    $MailChimp = new MailChimp($api_key);

    $list_id='f94c921cc3';
    $template_id='233741';
    
    $template = file_get_contents('./templates/newsletter.php');
        ob_start();
        require 'templates/newsletter.php';
    $template = ob_get_clean();
    



    // $result = $MailChimp->get('campaigns/f94c921cc3/content');    

    // $result=$MailChimp->put('campaigns/f94c921cc3/content', [
    //         'html'=> $template
    //     ]);

    /* Update Template */
    $result=$MailChimp->patch('templates/'.$template_id, [
            'name' => 'API Template',            
            'html'=> $template
        ]);


    // $result=$MailChimp->put('campaigns/f94c921cc3/content', [
    //         'content'=> array(
    //             'sections'=>array(
    //                 'edit04'=> '<span>THIS IS AN API CALLLLLLLLL!'
    //         ))
    //     ]);

    if ($MailChimp->success()) {
        echo "<h1>SUCCESS:</h1>";
        echo '<hr/> <br/>';
        echo "<pre>";
            // echo json_encode($result['html']);
        // print_r($MailChimp->getLastRequest());
        // print_r($MailChimp->getLastResponse());
        print_r($result); 
        echo "</pre>";
    
    } else {
        echo 'Last ERROR:';
        echo '<hr/> <br/>';
        echo $MailChimp->getLastError();
    }






 ?>

