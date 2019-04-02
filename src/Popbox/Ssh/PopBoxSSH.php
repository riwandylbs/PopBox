<?php

namespace Popbox\Ssh;

class PopBoxSSH
{
    private $host;
    private $port;
    private $username;
    private $password;
    

    public function __construct($setting)
    {
        $this->host = $setting['host'];
        $this->port = $setting['port'];
        $this->username = $setting['username'];
        $this->password = $setting['password'];
    } 

    public function uploadFile($local_dir, $cloud_dir)
    {
        $connection = ssh2_connect($this->host, $this->port);
        ssh2_auth_password($connection, $this->username, $this->password);

        ssh2_scp_send($connection, $local_dir, $cloud_dir, 0644);   
    }
}

?>