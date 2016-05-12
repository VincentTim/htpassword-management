<?php


class htpasswd {

    var $fp;
    var $filename;
    var $path = '/var/www/pass/';

    function user_add($file, $username,$password) {

        echo $file;

        $cmd = 'htpasswd -b '.$this->path.''.strtolower($file).' '.$username.' '.$password.'';
        shell_exec(escapeshellcmd($cmd));

    }

    function user_delete($file, $username,$password) {

        $cmd = 'htpasswd -D '.$this->path.''.strtolower($file).' '.$username.' '.$password.'';
        shell_exec(escapeshellcmd($cmd));
        
    }

    function customer_add($client, $username, $password){
        $cmd = 'htpasswd -b -c '.$this->path.'.htpasswd_'.strtolower($client).' '.$username.' '.$password.'';
        shell_exec(escapeshellcmd($cmd));
    }

    function customer_delete($file){
        if(file_exists($this->path.''.$file)){
            unlink($this->path.''.$file);    
        }
    }

    function get_lines($filename){

        $handle = fopen($this->path.''.$filename, "r");

        $arrayFile = array();

        while(!feof($handle)){

            $line = fgets($handle);
            $members = explode('\n', $line);

            foreach($members as $userLine){
                $users = explode(':', trim($userLine));
                if(!empty($userLine)){
                    array_push($arrayFile, $users[0]);
                }
            }

        }

        fclose($handle);

        return $arrayFile;


    }

    function getFiles()
    {
        
        $arrayFiles = scandir($this->path);
        $arrayOutput = array();

        foreach($arrayFiles as $file){
            if(preg_match('/.htpasswd_([a-z])/', $file) == '1'){
                array_push($arrayOutput, $file);
            }
        }

        return $arrayOutput;

    }

    function strReplace($text){
        return strtoupper(str_replace('.htpasswd_', '', $text));
    }

}

?>