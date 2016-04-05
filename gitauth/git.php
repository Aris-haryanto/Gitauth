<?php 
session_start();
    
require( 'Gitauth.php' );

//set default value
$code = 0;

//get response code from github callback
if(isset($_GET['code'])){
    $code = $_GET['code'];
}

#=================================================================#
# First you must register your application                        #
# here https://github.com/settings/applications/new               #
# then you has detail of your application                         #
# like client_id, client_secret next                              #
# copy and put on the config below                                #
#                                                                 #
#                                                                 #
# Rate, Fork and Share :)                                         #
# https://github.com/Aris-haryanto/Gitauth                        #
#=================================================================#

$config = array('app_name' => '', //your application name
                'client_id' => '', //change to your application client id
                'client_secreet' => '', //change to your application client secreet
                'redirect_to' => '', //redirect to response page after callback
                'scope' => '', //set scope aplication
                'code' => $code //this automaticaly fill after authorize from github
            );

$git = new Gitauth( $config );

?>