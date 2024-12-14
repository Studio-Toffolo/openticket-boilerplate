<?php
if( isset( $_SESSION['boilerplate'] ) )
{
    $boilerplate_session = $_SESSION['boilerplate'];

    if( isset( $boilerplate_session['token_expires'] ) && $boilerplate_session['token_expires'] > time() )
    {
        if( isset( $boilerplate_session['access_token'] ) )
        {
            $boilerplate_me = openticketAuth($boilerplate_session['access_token']);
            if( !isset( $boilerplate_me->status_code ) )
            {
                $logged_in = true;
            } else {
                //Error in getting /me, so destroy token
                unset( $_SESSION['boilerplate'] );
            }
        }
    } else {
        //Token expired, so log user out
        unset( $_SESSION['boilerplate'] );
    }
}