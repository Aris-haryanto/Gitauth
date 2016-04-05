# Gitauth
Github OAuth PHP Library


### How to install

First you must register your application
here [https://github.com/settings/applications/new](https://github.com/settings/applications/new)
then you has detail of your application
like client_id, client_secret and next
copy and put the config in `gitauth/git.php` like below  

```php
$config = array('app_name' => '', //your application name
                'client_id' => '', //change to your application client id
                'client_secreet' => '', //change to your application client secreet
                'redirect_to' => '', //redirect to response page after callback
                'scope' => '', //set scope aplication
                'code' => $code //this automaticaly fill after authorize from github
            );
```
Thats it !

### How to use

#####just have 4 functions
- git_response_callback() -> this function to response after redirect callback from github
- git_authorize_url() -> this to generate link to login with github
- git_user_token() -> to get user access token 
- git_user_data() -> to get user data 

Simple !

### License

See the license [https://github.com/Aris-haryanto/Gitauth/blob/master/LICENSE](https://github.com/Aris-haryanto/Gitauth/blob/master/LICENSE)


### Author


Aris Haryanto
visit my website [https://arindasoft.wordpress.com/](https://arindasoft.wordpress.com/)
