<?php
// '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''' //
//                                                                    //
//                  S T U D I O    T O F F O L O                      //
//                      www.toffolo.studio                            //
//                                                                    //
// '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''' //

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

session_start();

$env = parse_ini_file( __DIR__ . '/.env' );
if( empty( $env['OAUTH_CLIENT_ID'] ) || empty( $env['OAUTH_CLIENT_SECRET'] ) || empty( $env['OAUTH_REDIRECT_URI'] ) )
{
    die('Config variables are not set correctly. Open .env and fill in the OAuth credentials of your app!');
}

require_once __DIR__ .'/includes/openticket.php';
require_once __DIR__ .'/includes/request_token_openticket.php';

//Logout functionality, super simple
if( isset( $_GET['logout'] ) )
{
    unset( $_SESSION['boilerplate'] );
}

$logged_in = false;
require_once __DIR__ .'/includes/check_openticket.php';

if( $logged_in )
{
    include_once __DIR__ . "/layout/header.php";

    $openticket = new Openticket();
    $openticket->set_token( $boilerplate_session['access_token'], $boilerplate_session['company_guid'] );

    //Page is set
    if ( !empty($_GET['p'] ) )
    {
        //Include file
        if( file_exists( "pages/".$_GET['p'].".php" ) )
        {
            include("pages/".$_GET['p'].".php");
        } else {
            echo "<h4 class='my-5 text-center opacity-50'>Page not found!</h4>";
        }
    } else {
        echo "<h4 class='my-5 text-center opacity-50'>Welcome back! Select a page to get started.</h4>";
    }

    include_once __DIR__ . "/layout/footer.php";

} else {

    include( __DIR__ . "/layout/login.php");

}