<?php
/*
 Paul Woods

 Turn on error reporting (probably want off when live)
 this will turn it on for each page in our project
 Also enabled sessions w/ session_start()

 All form data is saved to the SESSION

*/
ini_set('display_errors', 1);
error_reporting(E_ALL);

// start a session
session_start();

// Require the autoload file
require_once("vendor/autoload.php");

// Create an instance of the Base class
$f3 = Base::instance();     // i.e. Base f3 = new Base() in java


// Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/info.html');
});

$f3->route('GET|POST /personal', function($f3) {

    // example POST --> SESSION save and forward

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $valid = true;
        // if data is valid

        if ($valid) {
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['last_name'] = $_POST['last_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['phone'] = $_POST['phone'];

            // redirect to summary page
            $f3->reroute('experience');
        }

    }

    $view = new Template();
    echo $view->render('views/personal_info.html');
});

$f3->route('GET|POST /experience', function($f3) {

    // example POST --> SESSION save and forward
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $valid = true;
        // if data is valid

        if ($valid) {
            $_SESSION['biography'] = $_POST['biography'];
            $_SESSION['github'] = $_POST['github'];
            $_SESSION['experience'] = $_POST['experience'];
            $_SESSION['relocate'] = $_POST['relocate'];

            // redirect to summary page
            $f3->reroute('mailing_list');
        }

    }

    $view = new Template();
    echo $view->render('views/experience.html');
});

$f3->route('GET|POST /mailing_list', function($f3) {

    // example POST --> SESSION save and forward
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $valid = true;
        // if data is valid

        if ($valid) {
            $_SESSION['jobs'] = $_POST['jobs'];
            $_SESSION['verticals'] = $_POST['verticals'];
            /*$_SESSION['js'] = $_POST['js'];
            $_SESSION['php'] = $_POST['php'];
            $_SESSION['java'] = $_POST['java'];
            $_SESSION['python'] = $_POST['python'];
            $_SESSION['html'] = $_POST['html'];
            $_SESSION['css'] = $_POST['css'];
            $_SESSION['reactJS'] = $_POST['reactJS'];
            $_SESSION['nodeJS'] = $_POST['nodeJS'];
            $_SESSION['saas'] = $_POST['saas'];
            $_SESSION['healthTech'] = $_POST['healthTech'];
            $_SESSION['agTech'] = $_POST['agTech'];
            $_SESSION['hrTech'] = $_POST['hrTech'];
            $_SESSION['industrialTech'] = $_POST['industrialTech'];
            $_SESSION['cybersecurity'] = $_POST['cybersecurity'];*/
            // redirect to summary page
            $f3->reroute('summary');
        }

    }

    $view = new Template();
    echo $view->render('views/mailing_list.html');
});

$f3->route('GET|POST /summary', function($f3) {

    // example POST --> SESSION save and forward
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $valid = true;
        // if data is valid

        if ($valid) {
//            $_SESSION['food'] = $_POST['food'];
//            $_SESSION['meal'] = $_POST['meal'];

            // redirect to summary page
            $f3->reroute('summary');
        }

    }

    $view = new Template();
    echo $view->render('views/summary.html');
});


$f3->route('GET /success', function() {
    $view = new Template();
    echo $view->render('views/success.html');
});


// Run Fat-Free
$f3->run();                 // -> is the object operator, equiv to . in java

