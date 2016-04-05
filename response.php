<?php
require( 'gitauth/git.php' );

if($git->git_user_token()){
    $user = $git->git_user_data();

    echo '<p><img src="'.$user->avatar_url.'"></p>';
    echo '<p>Hello, '.$user->name.'</p>';
    echo '<p>&nbsp;</p>';
    echo '<p>&nbsp;</p>';
    echo '<p>&nbsp;</p>';
    echo '<p>More response :<p>';
    echo '<pre>';
    print_r($user);
    echo '</pre>';
    echo '<a href="logout.php"><button>Logout</button></a>';
}else{
    echo 'Please Login to access this page';
}
?>