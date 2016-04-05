<?php
require( 'gitauth/git.php' );

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
?>