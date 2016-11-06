<?php
class controller_User extends Controller {
    
    public function Show($action, array $params = array()) {

        if (isset($params["register"])) {
            header("Location: index.php?page=User&action=register");
        }
        $data =array();
        switch($action) {
            case 'login':
                $this->Login($params);
                break;
            case 'register':
                $data = array();
                if(isset($params['register_submitted'])) {
                    $data = $this->Register($params);
                }
                $data['view'] = 'register';
                break;
        }
        return $this->Output($data['view'],$data);
    }
    
    //Обрабатываем логин и пароль
    public function Login($params) {
        if(User::Login($params['username'],$params['password'])) {
            header("Location: index.php");
            exit;
        }
    }
    
    //Обрабатываем регистрационные данные
    public function Register($params) {
        if(empty($params['email'])) return false;
        if(empty($params['password'])) return false;
        if($params['password'] != $params['password2']) return false;
        $result = User::AddUser($params['email'], $params['password']);
        if(!$result->error) {
            header("Location: index.php");
            exit;
        }
    }
}
?>