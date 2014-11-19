<?php


switch ($_POST['cid']) {

    case '/_pushState/index.php':
        $content = 'Page Index en Ajax';
        break;
    case '/_pushState/page.php':
        $content = 'Page Normal en Ajax';
        break;
    default:
        $content = 'Page simple en Ajax';
        break;

}



echo json_encode($content);