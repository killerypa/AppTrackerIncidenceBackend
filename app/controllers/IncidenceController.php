<?php
/**
 * Created by PhpStorm.
 * User: ninja
 * Date: 29/03/2019
 * Time: 10:30
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');

class IncidenceController {

    public function create() {
        $param_name = $_POST['name'];
        $param_last_name = $_POST['lastname'];
        $param_email = $_POST['email'];
        $param_password = $_POST['password'];
        $param_role = $_POST['role'];

        if( isset($param_name) && $param_name !== ''  &&
            isset($param_last_name) && $param_last_name !== ''  &&
            isset($param_email) && $param_email !== ''  &&
            isset($param_password) && $param_password !== ''  &&
            isset($param_role) && $param_role !== '' ){

            $db = new Database();

            $name = $db -> quote($param_name);
            $last_name = $db -> quote($param_last_name);
            $email = $db -> quote($param_email);
            $password = $db -> quote(sha1(md5($param_password)));
            $role = $db -> quote($param_role);

            $rows = $db -> select("SELECT * FROM users WHERE email = " . $email);
            if ($rows != false) {
                echo json_encode("correo ya registrado");
            }else{
                $result = $db -> query("INSERT INTO users ( name, last_name, email, password, role) VALUES ( ". $name . "," . $last_name . "," . $email . "," . $password . "," . $role .")");
                if ($result != false) {
                    $rows = $db -> select("SELECT * FROM users WHERE email = " . $email);
                    echo json_encode($rows);
                }else{
                    echo json_encode(null);
                }
            }
        }else {
            echo json_encode(null);
        }

    }

    public function delete() {

    }

    public function update() {

    }

    public function id($id) {
        $db = new Database();
        $rows = $db -> select("SELECT * FROM users WHERE id = " . $id);
        if ($rows != false) {
            echo json_encode($rows);
        }else{
            echo json_encode(null);
        }
    }

    public function all() {
        $db = new Database();
        $rows = $db -> select("SELECT * FROM users");
        if ($rows != false) {
            echo json_encode($rows);
        }else{
            echo json_encode(null);
        }
    }

    public function get(){
        if(isset($_GET['id']) && $_GET['id'] !== ''){
            $this->id($_GET['id']);
        }else {
            $this ->all();
        }
    }

}