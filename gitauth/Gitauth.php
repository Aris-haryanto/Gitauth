<?php 

class Gitauth {
    function __construct($config){
        $this->config = (object) $config;
    }
    function git_response_callback(){
        if(!isset($_SESSION['response'])){
            if($this->config->client_id != '' || 
                $this->config->client_secreet != '' || 
                $this->config->code != '' || 
                $this->config->redirect_to != ''){
                
            //GET USER ACCESS_TOKEN
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL,"https://github.com/login/oauth/access_token");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,'client_id='.$this->config->client_id.
                                                    '&client_secret='.$this->config->client_secreet.
                                                    '&code='.$this->config->code.
                                                    '&accept=application/json');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $server_output = curl_exec($ch);
                $_SESSION['access_token'] = json_decode($server_output);
                $user = $_SESSION['access_token'];
                
                curl_close ($ch);

                
                

            //GET USER RESPONSE
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/user?access_token='.$user->access_token);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: '.$this->config->app_name,'Accept: application/json'));
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $get_response = curl_exec($ch);
                $_SESSION['response'] = json_decode($get_response);

                curl_close($ch);

                header('location: '.$this->config->redirect_to);

            }else{
                echo 'Some config is missing';
            }
        }else{
            header('location: '.$this->config->redirect_to);
        }
    }
    
    function git_authorize_url(){
        return 'https://github.com/login/oauth/authorize?scope='.$this->config->scope.'&client_id='.$this->config->client_id;
    }
    function git_user_token(){
        return $_SESSION['access_token']->access_token;
    }
    function git_user_data(){
        return $_SESSION['response'];
    }
    function git_user_logout($redirect){
        session_destroy();
        
        header('location: '.$redirect);
    }
}
?>