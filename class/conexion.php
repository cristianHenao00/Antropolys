<?php
//header('Content-Type: application/json;charset=UTF-8');
header("Content-Type: text/html;charset=utf-8");
class conexion {

    public function run() {
        $res = array();
        $fun = $_POST['key'];
        switch ($fun) {
            case 'C1':
                $res = $this->create_user();
                break;
            case 'Q1':
                $res = $this->login();
                break;
            
        }

        echo json_encode($res); die();
    }

    /* Hacer conexion con la db */

    private function conectar() {
        $mysqli = new mysqli("45.93.101.103", "u341094424_antropolys", "Antropolys2021*", "u341094424_antropolys");

        // Check connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        return $mysqli;
    }

    /* Hacer cierre de conexion con la db */

    private function close_conexion($mysqli) {
        $mysqli->close();
    }

    /* Crear usuario en la db */

    private function create_user() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        
        
        $row = array();
        $sql = 'SELECT * FROM users WHERE email = "'.$_POST['email'].'"';
        
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $mensajes['respuesta'] = 'El email ya existe';
        } else if (array_key_exists('email', $_POST)) {
            
            $email = $_POST['email'];
            $apellido = $_POST['name1'];
            $nombre = $_POST['name'];
            $pass = $_POST['pass'];
            $ciudad = $_POST['ciudad'];
            $fecha = $_POST['fecha'];
            $genero = $_POST['genero'];
            $sql = "INSERT INTO users (email, nombre, apellido, pass, ciudad, fecha_nacimineto, genero) 
                       values ('$email', '$nombre', '$apellido', '$pass', '$ciudad', '$fecha', '$genero')";
            
            $result = $mysqli->query($sql);
            if($result){
                $row = $_POST;
                $row['iduser'] = $mysqli->insert_id;
                $row['rol'] = 'jugador';
                session_start();
                $mensajes['respuesta'] = $row;
                $mensajes['ack'] = 1;
            }
                
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }

    /* */
    private function login() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        
        
        $row = array();
        $sql = 'SELECT * FROM users WHERE email = "'.$_POST['user'].'" AND pass = "'.$_POST['pass'].'"';
        
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $mensajes['ack'] = 1;
            $mensajes['respuesta'] = 'Datos correctos';
            
            $row = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            session_start();//iniciando session 
            $_SESSION['data_user_antropolys'] = $row;
            $mensajes['user'] = $_SESSION['data_user_antropolys'];
            $result1 = $mysqli->query('SELECT j.*, u.nombre, u.apellido, l.name AS longitud, n.name AS nivel
                                        FROM juegos j
                                        INNER JOIN users u ON u.iduser = j.user_create
                                        INNER JOIN longitud l ON l.idlongitud = j.idlongitud
                                        INNER JOIN nivel n ON n.idnivel = j.idnivel
                                        WHERE j.estado = 1');
            if ($result1->num_rows > 0) {
                $row = $result1->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                $mensajes['respuesta'] = 'Juego iniciado';
                $_SESSION['data_game_antropolys'] = $row;
            }
            else $mensajes['respuesta'] = 'Juego nuevo';
            
        }else $mensajes['respuesta'] = 'Datos incorrectos';
        $this->close_conexion($mysqli);
        return $mensajes;
    }

    /* */
  

}

$con = new conexion();
$con->run();