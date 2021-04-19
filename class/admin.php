<?php
//header('Content-Type: application/json;charset=UTF-8');
header("Content-Type: text/html;charset=utf-8");
class conexion {

    public function run() {
        $res = array();
        $fun = $_POST['key'];
        switch ($fun) {
            case 'Q1':
                $res = $this->list_jugadores();
                break;
            case 'Q2':
                $res = $this->list_partidas();
                break;
            case 'Q3':
                $res = $this->list_respuestas();
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

    /* Lista usuarios en la db */
    private function list_jugadores() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        $sql = 'SELECT u.* ,
                (SELECT COUNT(ganador) FROM juegos WHERE ganador = u.iduser) ganados,
                (SELECT COUNT(userid) FROM order_turno WHERE userid = u.iduser) jugados
                FROM users u 
                WHERE u.rol = "jugador"
                ORDER BY ganados';
        
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $mensajes['ack'] = 1;
            $mensajes['respuesta'] = array();
            while ($fila = $result->fetch_array(MYSQLI_ASSOC))$mensajes['respuesta'][] = $fila;
                
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    
    /* Lista juegos en la db */
    private function list_partidas() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        $sql = 'SELECT j.*,
                CONCAT(u1.nombre, " ", u1.apellido ) u_creador,
                CASE
                    WHEN j.ganador > 0 THEN CONCAT(u.nombre, " ", u.apellido )  
                    ELSE "En juego"
                END u_ganador,
                CASE
                    WHEN j.idlongitud = 1 THEN "Corto" 
                    ELSE "Largo"
                END longitud, 
                CASE
                    WHEN j.idnivel = 1 THEN "Normal" 
                    ELSE "Difícil"
                END nivel
                 FROM juegos j
                LEFT JOIN users u ON u.iduser = j.ganador
                LEFT JOIN users u1 ON u1.iduser = j.user_create
                ORDER BY j.creado DESC';
        
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $mensajes['ack'] = 1;
            $mensajes['respuesta'] = array();
            while ($fila = $result->fetch_array(MYSQLI_ASSOC))$mensajes['respuesta'][] = $fila;
                
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    /* Lista respuestas en la db */
    private function list_respuestas() {
        $mensajes = array();
        $mensajes['ack'] = 0;
        $mysqli = $this->conectar();
        $sql = 'SELECT p.*, 
                CASE
                    WHEN p.tipo = 0 THEN "Abierta" 
                    ELSE "Múltiple"
                END AS clase,
                CASE
                    WHEN p.nivel = 1 THEN "Normal" 
                    ELSE "Difícil"
                END AS niv 
                FROM preguntas p';
        
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {//Si hay resultados…
            $mensajes['ack'] = 1;
            $mensajes['respuesta'] = array();
            $row = array();
            while ($fila = $result->fetch_array(MYSQLI_ASSOC)){
                //echo '<pre>$fila: '; print_r($fila); echo '</pre>';
                if(!array_key_exists($fila['idpreguntas'], $row)){
                    $row[$fila['idpreguntas']] = $fila;
                    $row[$fila['idpreguntas']]['correctas'] = 0;
                    $row[$fila['idpreguntas']]['incorrectas'] = 0;
                    $row[$fila['idpreguntas']]['cero'] = 0;
                    $sql1 = 'SELECT c.*
                            FROM contestar c
                            WHERE c.idpregunta = '.$fila['idpreguntas'].'
                            ORDER BY idpregunta;';
                    $result1 = $mysqli->query($sql1);
                    if ($result1->num_rows > 0) {//Si hay resultados…
                        while ($fila1 = $result1->fetch_array(MYSQLI_ASSOC)){
                            $row[$fila['idpreguntas']]['contestadas'][] = $fila1;
                        }
                    }
                }
            }
            $ver = array();
            foreach ($row as $key => $value) {
                    
                if(array_key_exists('contestadas', $value) && !empty($value['contestadas'])){
                    $cont = $value['contestadas'];
                    for($i=0; $i<count($cont); $i++){
                        if($cont[$i]['tiempo'] >0){
                            if($value['clase'] == "Abierta"){
                                if($this->abierta($cont[$i], $value['respuestas'])) $value['correctas'] ++;
                                else $value['incorrectas'] ++;
                            }
                            else  {
                                if($this->multiples($cont[$i], $value['respuestas'])) $value['correctas'] ++;
                                else $value['incorrectas'] ++;
                            }
                            
                            
                        }else $value['cero'] ++;
                         
                    }
                        
                }
                $ver[] = $value;
                //echo '<pre>'; print_r($value); echo '</pre>';
            }
            $mensajes['respuesta'] = $ver;
        }
        $this->close_conexion($mysqli);
        return $mensajes;
    }
    
    private function multiples($contestadas, $resp){
        $correcta = 0;
        $respuetas = explode("-", $resp);
        
        for($i=0; $i<count($respuetas); $i++){
            if(strpos($respuetas[$i],'*') !== false){
                $correcta = $i;
                break;
            }
        }
        if($correcta == $contestadas['respuesta'])  return 1;
        return 0;
    }
    
    private function abierta($contestadas, $resp){
        $respuetas = explode(",", $resp);
        $contes = explode(" ", $contestadas['respuesta']);
        
        for($i=0; $i<count($respuetas); $i++){
            for($k=0; $k<count($contes); $k++){
                if(stripos($respuetas[$i],$contes[$k]) !== false) return 1;
            }
        }
        return 0;
    }

    
}

$con = new conexion();
$con->run();