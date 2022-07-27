<?php

// PHP Login Script Thing
// Developed by Chad Smith
// Web: http://mktgdept.com/
// Download: http://mktgdept.com/php-login-script.zip
// Support: http://posttopic.com/topic/php-login-script
// Twitter: chadsmith
// Google Talk: chad@mktgdept.com
//
// Copyright (C) 2008 Chad Smith
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// Build: 20090107211851

require_once 'conexaosql.php';
class user {

    protected $config = ['username' => array(
            'min' => 3, // minumum username length allowed
            'max' => 24 // maximum username length allowed
        ),
        'password' => array(
            'min' => 5 // minumum password length allowed
        ),
        'site' => array(
          'cookie' => "uahea9eha8he98ahe9"  
        ),
        'pages' => array(
            'login' => '/dlgc/login.php', // login page
        'redirect'=>'/dlgc/' // registration page
        //'manage'=>'manage', // change email page
        //'change'=>'change', // chan.phpge password page
        //'activate'=>'activate' // activation page
        )
    ];

    function __construct() { // generates the user class and determines what we are doing
        session_name($this->config['site']['cookie']);
        session_start();
        if (isset($_GET['logout'])) {
            $this->logout();
        } elseif (isset($_POST['user']) && isset($_POST['password'])) {
            $this->login();
        }
    }

    protected function fail($message) { // fails forward
        $_SESSION['message'] = $message;
        @header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    
    public function getFailMessage(){
        if ( isset($_SESSION['message'])){
            $ret = $_SESSION['message'];
            unset($_SESSION['message']);
            return $ret;
        } else {
            return null;
        }
    }

    private function login() { // processes the login form
        $user = strtolower($_POST['user']);
        $password = $_POST['password'];
        if (strlen($user) < $this->config['username']['min'] || strlen($user) > $this->config['username']['max'] || strlen($password) < $this->config['password']['min']) {
            $this->fail("Usuário e/ou Senha inválidos!");
        } // invalid username or password length 
        if (!$this->is_username($user)) {
            $this->fail("Usuário e/ou Senha inválidos!");
        } // invalid character in username or sql injection attempt
        $password = md5(($password));

        $sql =  new ConexaoSQL("snmp");
        $sql->Conecta();
        $query = $sql->Query("SELECT * FROM user WHERE username = \"$user\" AND password = \"$password\";");
        
        //validar usuário
        if ($sql->Rows()==1) {

            $array = $sql->Arrays();

            session_regenerate_id();
            $_SESSION['thumbprint'] = $this->nonce(session_id() . 'thumbprint', 86400);
            $_SESSION['user']['id'] = $array['iduser'];
            $_SESSION['user']['name'] = $array['name'];
            $_SESSION['user']['email'] = $array['email'];
            $_SESSION['user']['username'] = $array['username'];
            $redirect = (isset($_SESSION['redirect']) ? $_SESSION['redirect'] : $this->config['pages']['redirect']);
            unset($_SESSION['redirect']);
            
            header('Location: ' . $redirect);
            die();
        }
    }

    protected function nonce($str = '', $expires = 300) { // generates a secure nonce
        return md5(date('Y-m-d H:i', ceil(time() / $expires) * $expires) . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $this->config['site']['cookie'] . $str);
    }

    private function logout() { // destroys the session to logout
        
        session_unset();
        session_destroy();
        header('Location: '.$this->config['pages']['login']);
        die();
    }

    private function is_username($str) { // returns true if the username contains only alphanumeric characters
        return !ereg("[^a-z0-9.]", $str);
    }

    private function valid_session() { // returns true if the session is valid
        return ($_SESSION['thumbprint'] == $this->nonce(session_id() . 'thumbprint', 86400));
    }

    public function logged_in() { // returns true if the user is logged in
        return ($this->valid_session() && isset($_SESSION['user']['id']) && isset($_SESSION['user']['name']) && isset($_SESSION['user']['email']));
    }
    
    public function requireLoggedIn(){
        if ( !$this->logged_in()){
            header('Location: '.$this->config['pages']['login']);
            die();
        }
    }

}

$user = new user();
?>