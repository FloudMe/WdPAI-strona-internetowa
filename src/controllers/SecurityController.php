<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/LogRepository.php';

class SecurityController extends AppController
{

    private $userRepository;
    private $logsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->logsRepository = new LogsRepository();
    }

    public function login()
    {
        if (isset($_COOKIE['user'])){
            if (isset($_COOKIE['user'])){
                header("location:javascript://history.go(-1)");
            }
        }

        if(!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

//        print "w security controller: ".$user->getEmail();
//        print "email: ".$email;

        if(!$user)
        {
            return $this->render('login', ['messages' => ['User not exist']]);
        }

//        if($user->getEmail() !== $email)
//        {
//            return $this->render('login', ['messages' => ['User with this email not exist']]);
//        }
//
//        if(password_verify($password, $user->getPassword()))
//        {
//            return $this->render('login',['messages'=>['Wrong password']]);
//        }

        //return $this->>render('projects); to samo co na dole tylko innaczej napisane

        $this->logsRepository->addLog($this->userRepository->getUserDetailsId($user), "log in");

        setcookie('user', $user->getEmail(), time() + (60*60)); //expires after 1 hours

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/projects");
    }

    public function logout(){

        $userEmail = $_COOKIE['user'];
        $user = $this->userRepository->getUser($userEmail);

        $this->logsRepository->addLog($this->userRepository->getUserDetailsId($user), "log out");

        if (isset($_COOKIE['user'])) {
            if ($_GET['logout']) {
                setcookie('user', null, time() - 600); //delete cookies by set time in the past
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/");
                return $this->render('login');

            }
        }
        return $this->render('login');
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if($email == null || $name == null || $surname == null)
        {
            return $this->render('register', ['messages'=> ['Please provide data']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $pass = password_hash($password, PASSWORD_DEFAULT);

        //TODO try to use better hash function
        $user = new User($email, $pass, $name, $surname, 0);

        try {
            $this->userRepository->addUser($user);
        }
        catch (PDOException $e){
            return $this->render('register', ['messages' => ['Email occupied']]);
        }


        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

}