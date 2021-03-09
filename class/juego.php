<?php
//header('Content-Type: application/json;charset=UTF-8');
header("Content-Type: text/html;charset=utf-8");
class juego {
    public function run() {
        $res = array();
        $fun = $_POST['key'];
        switch ($fun) {
            case 'C1':
                $res = $this->create_turno();
                break;
            case 'Q1':
                $res = $this->conocer_turno();
                break;
            case 'Q2':
                $res = $this->ver_pregunta();
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
    
    private function create_turno() {
        
        $mensajes = array();
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $row = array();
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        
        $sql = 'SELECT * FROM order_turno WHERE userid = '.$iduser.' AND juegosid = '.$idjuego;
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $row = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            $mensajes['respuesta'] = 'Su turno es '.$row['turno'];
            $_SESSION['data_turno_antropolys'] = $row['turno'];
            $mensajes['ack'] = $row['turno'];
        }else{
            $pos = 1;
            $sql = 'SELECT * FROM order_turno o WHERE juegosid = '.$idjuego.' ORDER BY o.turno DESC LIMIT 1 ';
            $result1 = $mysqli->query($sql);
            if ($result1->num_rows > 0) {//Si hay resultados…
                $row1 = $result1->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                $pos = $row1['turno'] + 1;
            }
            $sql = "INSERT INTO order_turno (turno,juegosid,userid) VALUES ($pos,$idjuego,$iduser)";
            if($result2 = $mysqli->query($sql)){
                $mensajes['respuesta'] = 'Su turno es '.$pos;
                $mensajes['ack'] = $pos;
                $_SESSION['data_turno_antropolys'] = $pos;
            }
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function conocer_turno() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $mensajes['ack']  = $_SESSION['data_turno_antropolys'];
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        
        $sql = 'SELECT * FROM contestar WHERE juegosid = '.$idjuego;
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) $mensajes['respuesta'] = 'Ya hay respuestas';
        else {
            $mensajes['respuesta'] = 'Sin respuestas';
            if($mensajes['ack']==1){
                $sql = "INSERT INTO turno_actual (juegosid,userid) VALUES ($idjuego,$iduser)";
                $result2 = $mysqli->query($sql);
            }
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function ver_pregunta() {$mensajes = array();
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $mensajes['ack']  = 0;
        $idpregunta = $_POST['idpregunta'];
        $sql = "SELECT * FROM preguntas WHERE idpreguntas = $idpregunta";
        $result1 = $mysqli->query($sql);
        if ($result1->num_rows > 0) {//Si hay resultados…
            $mensajes['ack']  = 1;
            $mensajes['respuesta']  = $result1->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
        }
        
        $this->close_conexion($mysqli);
        return $mensajes;
    }
}

$con = new juego();
$con->run();