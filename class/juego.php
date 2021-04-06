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
                $res = $this->conocer_turno_init();
                break;
            case 'Q2':
                $res = $this->ver_pregunta();
                break;
            case 'C2':
                $res = $this->save_response();
                break;
            case 'C3':
                $res = $this->save_response_otro();
                break;
            case 'Q3':
                $res = $this->conocer_mi_turno();
                break;
            case 'C4':
                $res = $this->saltar_turno();
                break;
            
            
        }

        echo json_encode($res); die();
    }
    
    
    /* Hacer conexion con la db */
    private function conectar() {
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
    
    private function create_turno() {
        
        $mensajes = array();
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $row = array();
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        
        $sql = 'SELECT o.* FROM order_turno o
                INNER JOIN juegos j ON j.idjuegos = o.juegosid
                WHERE o.userid = '.$iduser.' AND o.juegosid = '.$idjuego. ' AND j.ganador = 0';
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $row = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            $mensajes['respuesta'] = 'Su turno es '.$row['turno'];
            $_SESSION['data_turno_antropolys'] = $row['turno'];
            $mensajes['ack'] = $row['turno'];
        }else{
            $pos = 1;
            $sql = 'SELECT o.* FROM order_turno o
                    INNER JOIN juegos j ON (j.idjuegos = o.juegosid)
                    WHERE o.juegosid = '.$idjuego.' AND j.ganador = 0 ORDER BY o.turno DESC LIMIT 1 ';
            $result1 = $mysqli->query($sql);
            if ($result1->num_rows > 0) {//Si hay resultados…
                $row1 = $result1->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                $pos = $row1['turno'] + 1;
            }
            $sql = 'SELECT * FROM juegos j WHERE j.idjuegos = '.$idjuego.' AND j.ganador = 0';
            $result2 = $mysqli->query($sql);
            if ($result2->num_rows > 0) {
                $sql = "INSERT INTO order_turno (turno,juegosid,userid) VALUES ($pos,$idjuego,$iduser)";
                if($result2 = $mysqli->query($sql)){
                    $mensajes['respuesta'] = 'Su turno es '.$pos;
                    $mensajes['ack'] = $pos;
                    $_SESSION['data_turno_antropolys'] = $pos;
                }
            }else{
                $mensajes['ack'] = 0;
                $mensajes['respuesta'] = 'No hay juego';
            }
                
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function conocer_turno_init() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $mensajes['ack']  = $_SESSION['data_turno_antropolys'];
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        
        $sql = 'SELECT * FROM contestar WHERE juegosid = '.$idjuego;
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $sql = 'SELECT * FROM position_juego WHERE juegosid = '.$idjuego.' AND userid = '.$iduser;
            $result1 = $mysqli->query($sql);
            if ($result->num_rows > 0) $mensajes['respuesta'] = $result1->fetch_array(MYSQLI_ASSOC);
        }else {
            $mensajes['respuesta'] = 'Sin respuestas';
            if($mensajes['ack']==1){
                $sql = 'SELECT * FROM turno_actual WHERE juegosid = '.$idjuego;
                $result = $mysqli->query($sql);
                if (!($result->num_rows > 0)) {
                    $sql = "INSERT INTO turno_actual (juegosid,userid) VALUES ($idjuego,$iduser)";
                    $result2 = $mysqli->query($sql);
                }                    
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
        $sql = "SELECT * FROM preguntas p
                -- LEFT JOIN img_preg i ON i.idimg_preg = p.img
                WHERE p.idpreguntas = $idpregunta";
        $result1 = $mysqli->query($sql);
        if ($result1->num_rows > 0) {//Si hay resultados…
            $mensajes['ack']  = 1;
            $mensajes['respuesta']  = $result1->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
        }
        
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function save_response() {
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $idpregunta = $_POST['idpregunta'];
        $respuesta = $_POST['respuesta'];
        $turno = $_POST['turno'];
        $idposicion = $_POST['idposicion'];
        $tiempo = $_POST['tiempo'];
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        
        $sql = "INSERT INTO contestar (userid,idposition,idpregunta,respuesta,juegosid,turno,tiempo) 
                VALUES ($iduser,$idposicion,$idpregunta,'$respuesta',$idjuego,$turno,$tiempo)";
        if($result1 = $mysqli->query($sql)){
            $sql = 'SELECT * FROM turno_actual WHERE juegosid = '.$idjuego;
            $result = $mysqli->query($sql);
            if (($result->num_rows > 0)) {
                $turno_actual  = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                $id_turno_actual = $turno_actual['idturno'];
                $sql = 'SELECT * FROM order_turno t
                        inner join users u on u.iduser = t.userid
                        WHERE t.turno = '.($turno+1) .' AND t.juegosid = '.$idjuego;
                $result2 = $mysqli->query($sql);
                
                if (($result2->num_rows > 0)) {
                    $next_turno  = $result2->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                    $id_user_next_turno = $next_turno['userid'];

                    $sql = 'UPDATE turno_actual SET userid=' .$id_user_next_turno. '
                            WHERE idturno= ' .$id_turno_actual;
                    $result = $mysqli->query($sql);
                    $mensajes['ack']  = 1;
                    $mensajes['respuesta'] = $next_turno;
                }else{
                    $sql = 'SELECT * FROM order_turno t
                    inner join users u on u.iduser = t.userid
                    WHERE t.juegosid = '.$idjuego. ' ORDER BY t.turno LIMIT 1';

                    $result3 = $mysqli->query($sql);
                    if (($result3->num_rows > 0)) {
                        $next_turno  = $result3->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                        $id_user_next_turno = $next_turno['userid'];
                        $sql = 'UPDATE turno_actual SET userid=' .$id_user_next_turno. ' WHERE idturno= ' .$id_turno_actual;
                        $result = $mysqli->query($sql);
                        $mensajes['ack']  = 1;
                        $mensajes['respuesta']  = $next_turno;
                    }
                }
                
                if($_POST['gano']){
                    $sql = 'UPDATE juegos SET ganador=' .$iduser. ', estado = 0 WHERE idjuegos= ' .$idjuego;
                    $result0 = $mysqli->query($sql);
                }
                
                $sql = 'SELECT * FROM position_juego WHERE juegosid = '.$idjuego. ' AND userid = '.$iduser;
                $result5 = $mysqli->query($sql);
                if ($result5->num_rows > 0) {
                    $position_juego  = $result5->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                    $id_position_juego = $position_juego['idposition'];
                    $sql = 'UPDATE position_juego SET position=' .$idposicion. ' WHERE idposition= ' .$id_position_juego;
                    $result6 = $mysqli->query($sql);
                }else{
                    $sql = "INSERT INTO position_juego (position,juegosid,userid) 
                            VALUES ($idposicion,$idjuego,$iduser)";
                    $result6 = $mysqli->query($sql);
                }
   
                
                    
            }
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function save_response_otro() {
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $idpregunta = 0;
        $respuesta = '';
        $idposicion = 0;
        $tiempo = 0;
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        
        
        $turno_de = $_POST['turno_de'];
        
        $sql = 'SELECT * FROM turno_actual WHERE juegosid = '.$idjuego;

        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $turno  = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            $mensajes['respuesta'] = $turno;
            if($turno['userid'] == $turno_de){//si el turno actual es el mismo del parámetro
                $sql = "INSERT INTO contestar (userid,idposition,idpregunta,respuesta,juegosid,turno,tiempo) 
                        VALUES ($turno_de,$idposicion,$idpregunta,'$respuesta',$idjuego,$turno,$tiempo)";
                if($result1 = $mysqli->query($sql)){

                        $turno_actual  = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                        $id_turno_actual = $turno_actual['idturno'];
                        $sql = 'SELECT * FROM order_turno t
                                inner join users u on u.iduser = t.userid
                                WHERE t.turno = '.($turno+1) .' AND t.juegosid = '.$idjuego;
                        $result2 = $mysqli->query($sql);

                        if (($result2->num_rows > 0)) {
                            $next_turno  = $result2->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                            $id_user_next_turno = $next_turno['userid'];

                            $sql = 'UPDATE turno_actual SET userid=' .$id_user_next_turno. '
                                    WHERE idturno= ' .$id_turno_actual;
                            $result = $mysqli->query($sql);
                            $mensajes['ack']  = 1;
                            $mensajes['respuesta'] = $next_turno;
                        }else{
                            $sql = 'SELECT * FROM order_turno t
                            inner join users u on u.iduser = t.userid
                            WHERE t.juegosid = '.$idjuego. ' ORDER BY t.turno LIMIT 1';

                            $result3 = $mysqli->query($sql);
                            if (($result3->num_rows > 0)) {
                                $next_turno  = $result3->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
                                $id_user_next_turno = $next_turno['userid'];
                                $sql = 'UPDATE turno_actual SET userid=' .$id_user_next_turno. ' WHERE idturno= ' .$id_turno_actual;
                                $result = $mysqli->query($sql);
                                $mensajes['ack']  = 1;
                                $mensajes['respuesta']  = $next_turno;
                            }
                        }
                    
                }
            }
        }
        
        
        
        
        
                
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function conocer_mi_turno() {
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        
        $sql = 'SELECT t.*, u.*, j.ganador, o.turno,
                CASE
                    WHEN j.ganador = 0 THEN "NA" 
                    ELSE (SELECT CONCAT(nombre, " ", apellido) FROM users WHERE iduser = j.ganador)
                END AS name_ganador,
                (SELECT idposition FROM contestar WHERE userid = t.userid 
                    ORDER BY idcontestar DESC LIMIT 1) AS pos_otro
                FROM turno_actual t
                INNER JOIN order_turno o ON (o.userid = t.userid AND o.juegosid = t.juegosid)
                INNER JOIN users u ON u.iduser = t.userid
                INNER JOIN juegos j ON idjuegos = t.juegosid
                WHERE t.juegosid = '.$idjuego;

        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $turno  = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            $mensajes['respuesta'] = $turno;
            if($turno['iduser'] == $iduser)$mensajes['ack'] = 1;
            $sql = 'SELECT * FROM position_juego p
                    INNER JOIN users u on u.iduser = p.userid
                    WHERE p.juegosid = '.$idjuego.' and p.userid <> '.$iduser;
            $result1 = $mysqli->query($sql);
            if ($result1->num_rows > 0){
                $mensajes['turnos'] = array();
                while ($fila = $result1->fetch_array(MYSQLI_ASSOC))$mensajes['turnos'][] = $fila;
            } 
        }
        $this->close_conexion($mysqli);
        return $mensajes;
        
    }
    
    
    private function saltar_turno() {
        $mensajes['ack'] = 0;
        session_start();//iniciando session 
        $mysqli = $this->conectar();
        $idjuego = $_SESSION['data_game_antropolys']['idjuegos'];
        $iduser = $_SESSION['data_user_antropolys']['iduser'];
        $turno_de = $_POST['turno_de'];
        
        $sql = 'SELECT t.*, u.*, j.ganador, o.turno,
                CASE
                    WHEN j.ganador = 0 THEN "NA" 
                    ELSE (SELECT CONCAT(nombre, " ", apellido) FROM users WHERE iduser = j.ganador)
                END AS name_ganador,
                (SELECT idposition FROM contestar WHERE userid = t.userid 
                    ORDER BY idcontestar DESC LIMIT 1) AS pos_otro
                FROM turno_actual t
                INNER JOIN order_turno o ON (o.userid = t.userid AND o.juegosid = t.juegosid)
                INNER JOIN users u ON u.iduser = t.userid
                INNER JOIN juegos j ON idjuegos = t.juegosid
                WHERE t.juegosid = '.$idjuego;

        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $turno  = $result->fetch_array(MYSQLI_ASSOC);//array los datos arrojados
            $mensajes['respuesta'] = $turno;
            if($turno['turno'] == $turno_de){//si el turno actual es el mismo del parámetro
                
            }
        }
        $this->close_conexion($mysqli);
        return $mensajes;
        
    }
}

$con = new juego();
$con->run();