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
            case 'C2':
                $res = $this->save_config();
                break;
            case 'C3':
                $res = $this->save_question();
                break;
            case 'Q2':
                $res = $this->list_preguntas();
                break;
            case 'U1':
                $res = $this->update_avatar();
                break;
        }

        echo json_encode($res); die();
    }

    /* Hacer conexion con la db */

    private function conectar() {
        //$mysqli = new mysqli("45.93.101.103", "u341094424_antropolys", "Antropolys2021*", "u341094424_antropolys");
        $mysqli = new mysqli("localhost", "u341094424_antropolys", "Antropolys2021*", "u341094424_antropolys");

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
        session_start();//iniciando session 
        unset($_SESSION['data_user_antropolys']);
        unset($_SESSION['data_game_antropolys']);
        $row = array();
        $sql = 'SELECT * FROM users WHERE email = "'.$_POST['user'].'" AND pass = "'.$_POST['pass'].'"';
        
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $mensajes['ack'] = 1;
            $mensajes['respuesta'] = 'Datos correctos';
            
            $row = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            
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
    private function save_config() {
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();

        session_start();//iniciando session 
        $sql = 'SELECT j.*, u.nombre, u.apellido, l.name AS longitud, n.name AS nivel
                FROM juegos j
                INNER JOIN users u ON u.iduser = j.user_create
                INNER JOIN longitud l ON l.idlongitud = j.idlongitud
                INNER JOIN nivel n ON n.idnivel = j.idnivel
                WHERE j.estado = 1';
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            $mensajes['respuesta'] = 'Juego iniciado';
            $_SESSION['data_game_antropolys'] = $row;
        }else{
            $user_create = $_SESSION['data_user_antropolys']['iduser'];
            $longitud = $_POST['longitud'];
            $nivel = $_POST['nivel'];
            
            $row = array();
            
            $st_pre = '';
            $preguntas = array();
            $limit = $longitud == 1? 40:80;
            $sql =  "SELECT * FROM preguntas WHERE nivel = $nivel ORDER BY RAND() LIMIT $limit";
            $result4 = $mysqli->query($sql);
            if ($result4->num_rows > 0) {
                while ($fila = $result4->fetch_array(MYSQLI_ASSOC))$preguntas[] = $fila['idpreguntas'];
                $st_pre = implode(",",$preguntas);
            }
            
            $sql = "INSERT INTO juegos (estado, idlongitud, user_create, idnivel, preguntas) 
                        values ('1', '$longitud', '$user_create', '$nivel', '$st_pre')";

            $result = $mysqli->query($sql);
            if($result){
                
                
                $sql = 'SELECT j.*, u.nombre, u.apellido, l.name AS longitud, n.name AS nivel
                            FROM juegos j
                            INNER JOIN users u ON u.iduser = j.user_create
                            INNER JOIN longitud l ON l.idlongitud = j.idlongitud
                            INNER JOIN nivel n ON n.idnivel = j.idnivel
                            WHERE j.estado = 1';
        
                $result = $mysqli->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                $_SESSION['data_game_antropolys'] = $row;
                $mensajes['respuesta'] = "juego creado";
                $mensajes['ack'] = 1;
            }
        }
       
        $this->close_conexion($mysqli);
        return $mensajes;

    }


    private function save_question() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $nivel = $_POST['nivel'];
        $respuestas = $_POST['respuestas'];
        
        foreach ($_FILES as $vAdjunto) {
            $oFichero = fopen($vAdjunto["tmp_name"], 'r');
            $sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
            $img = addslashes($sContenido); $type_img = $vAdjunto['type']; $name = $vAdjunto['name'];
        }
        $row = array();
        if (array_key_exists('idpreguntas', $_POST) && $_POST['idpreguntas']) {//para actualizar la preguna
            $sql = "SELECT * FROM preguntas WHERE idpreguntas = ".$_POST['idpreguntas'];
            $result1 = $mysqli->query($sql);
            if ($result1->num_rows > 0) {//Si hay resultados…
                $pre = $result1->fetch_array(MYSQLI_ASSOC);
                if(array_key_exists('img', $pre)){
                    $row['img'] = isset($type_img)?$this->save_img_preg($img, $type_img, $name, $pre['img']) : $pre['img'];
                }
            }
            
            $sql = 'UPDATE preguntas SET nombre="' .$nombre. '", tipo=' .$tipo. ', nivel=' .$nivel. ', '
                    . ' respuestas="' .$respuestas. '", img = '.$row['img']
                . ' WHERE idpreguntas= ' . $_POST['idpreguntas'];
            if ($result = $mysqli->query($sql)) $mensajes['respuesta'] = 'Se actualizó';

        }else if (array_key_exists('nombre', $_POST)) {//para crear la pregunta
            $row['img'] = isset($type_img)? $this->save_img_preg($img, $type_img, $name): 0;
            $im = $row['img'];
            $sql = "INSERT INTO preguntas (nombre, tipo, nivel, respuestas, img) values ('$nombre', $tipo, $nivel, '$respuestas', $im)";
            
            $result2 = $mysqli->query($sql);
            if($result2){                
                $row['idpreguntas'] = $mysqli->insert_id;
                session_start();
                $mensajes['respuesta'] = $row;
                $mensajes['ack'] = 1;
            }
                
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
  
    private function list_preguntas(){
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        $row = array();
        $sql = 'SELECT *, CASE
                    WHEN tipo = 0 THEN "Abierta" 
                    ELSE "Múltiple"
                END AS clase,
                CASE
                    WHEN nivel = 1 THEN "Normal" 
                    ELSE "Difícil"
                END AS niv 
                FROM preguntas ORDER BY idpreguntas DESC';
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            while ($fila = $result->fetch_array(MYSQLI_ASSOC))$row[] = json_encode($fila);
            $mensajes['ack'] = 1;
            $mensajes['respuesta'] = $row;
        }else{$mensajes['respuesta'] = 'Sin preguntas cargadas';}
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function update_avatar() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        session_start();//iniciando session 
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        $img = $_POST['img'];
        $sql = "UPDATE users SET img=$img WHERE iduser=$iduser";
        //echo '----: '; print_r($_SESSION['data_user_antropolys']);
        if ($result = $mysqli->query($sql)){
            $mensajes['respuesta'] = 'Se actualizó el avatar';
            $mensajes['ack'] = 1;
            $_SESSION['data_user_antropolys']['img'] = $img;
        }else $mensajes['respuesta'] = 'No se actualizó';
        return $mensajes;
    }
    
    private function save_img_preg($img, $type_img, $name, $id = 0){
        $mysqli = $this->conectar();
        if($id){
            $sql = "UPDATE img_preg SET img='$img', type_img='$type_img' , name='$name' WHERE idimg_preg=$id";
            if($result = $mysqli->query($sql)) $id = $id;
            else $id = 0;
        }else{
            $sql = "INSERT INTO img_preg (img, type_img, name) values ('$img', '$type_img', '$name')";
            $result = $mysqli->query($sql);
            if($result) $id = $mysqli->insert_id;
        }
        return $id;
    }

}

$con = new conexion();
$con->run();