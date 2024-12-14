<?php
class Openticket {

    public $access_token;
    public $company;

	function set_token( $access_token, $company ) {

        $this->access_token = $access_token;
        $this->company = $company;

	}

	function call( $method, $query, $postfields="" )
    {
        $curl = curl_init();

        $headers = [
            "Authorization: Bearer " . $this->access_token,
            "Company: " . $this->company,
            "accept: application/json",
            'Content-Type: application/json'
        ];

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.eventix.io/3.0.0/" . $query,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS => json_encode($postfields, JSON_NUMERIC_CHECK),
        CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "<h2 class='fw-bold mb-3'>Connection could not be made.</h2><p>The connection with Openticket could not be established. Please try again later.</p>";
            die();
        } else {

            $decoded = json_decode( $response );

            if( isset( $decoded->error_description ) && is_string( $decoded->error_description ) )
            {
                echo "<h2 class='fw-bold'>Openticket API error: ".$decoded->status_code."</h2>
                <p>The Openticket API returned this error: <em>" . $decoded->error_description."</em>.";

            } else {
                return $decoded;
            }

        }

	}

    function get( $query, $postfields="" )
    {
        return $this->call( "GET", $query, $postfields );
    }

    function post( $query, $postfields="" )
    {
        return $this->call( "POST", $query, $postfields );
    }

    function put( $query, $postfields="" )
    {
        return $this->call( "PUT", $query, $postfields );
    }

    function delete( $query, $postfields="" )
    {
        return $this->call( "DELETE", $query, $postfields );
    }
}


function openticketAuth( $token )
{
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://auth.openticket.tech/me",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        "Authorization: " . $token,
        "accept: application/json",
        'Content-Type: application/json'
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      
        $decoded = json_decode( $response );

        if( isset( $decoded->error_description ) )
        {
            die("Error! " . $decoded->error_description );
        }

        return $decoded;
    }
}