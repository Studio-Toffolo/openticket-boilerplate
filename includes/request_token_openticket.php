<?php
$token_url = 'https://auth.openticket.tech/token';

//Redirect to OpenticketTech for login
if (isset($_GET['connect']) )
{
    if (!isset($_SESSION['state'])) {
        $_SESSION['state'] = mt_rand(100000,999999);
    }

    header("Location: " . $token_url . "/authorize?" . http_build_query([
        'client_id'     => $env['OAUTH_CLIENT_ID'],
        'redirect_uri'  => $env['OAUTH_REDIRECT_URI'],
        'response_type' => 'code',
        'state'         => $_SESSION['state'],
    ]));
}

//Returned to after approved by OpenTicket
if (isset($_GET['code']))
{

    if (!isset($_SESSION['state'])) {
        die("Session was not set. Please try again");
    }
    if ($_SESSION['state'] !== $_GET['state']) {
        die("Session was not correct");
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL            => $token_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "POST",
        CURLOPT_POSTFIELDS     => json_encode([
            'grant_type'    => 'authorization_code',
            'client_id'     => $env['OAUTH_CLIENT_ID'],
            'client_secret' => $env['OAUTH_CLIENT_SECRET'],
            'redirect_uri'  => $env['OAUTH_REDIRECT_URI'],
            'code'          => $_GET['code']
        ]),
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        die("Error! " . $err);
    } else {
        $tokenData = json_decode($response);
    }

    if (isset($tokenData->access_token))
    {
        $company = $tokenData->info->companies[0];
        $user = openticketAuth( $tokenData->access_token);

        if( isset( $user->status_code ) ) {
            die("Something went wrong! What is often the case, is that you're logging in with the incorrect whitelabel. Please try again!");
        }

        //Setting session info
        $_SESSION['boilerplate']['company_guid'] = $company->guid;
        $_SESSION['boilerplate']['access_token'] = $tokenData->access_token;
        $_SESSION['boilerplate']['token_expires'] = (time() + $tokenData->expires_in);

        //refresh, then you'll be logged in
        header("Location: index.php");

    } else {

        echo "<h2>Woops, something went wrong!</h2>
        <pre>";
        print_r( $response );
        die();
    }
}