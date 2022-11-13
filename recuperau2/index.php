<?php
    header('Conetnt-Type: application/JSON');
    $metodo = $_SERVER['REQUEST_METHOD'];

    switch($metodo){
        case 'GET':
            if($_GET['accion'] == 'docente'){
                try{
                    $conexion = new PDO(
                    "mysql:host=localhost;dbname=utez;charset=UTF8",
                    "root",
                    "root");

                }catch(PDOException $ex){
                    echo $ex->getMessage();
            }
            if(isset($_GET['id'])){

                $sql = 'SELECT * FROM docente';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(':n', $_GET['id']);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                if($rs != null){
                    echo json_encode($rs[0], JSON_PRETTY_PRINT);
                }else{
                    echo "No hay registro de Docentes";
                }
            }else{
                $sql = 'SELECT * FROM docente';
                $pstm = $conexion->prepare($sql);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($rs, JSON_PRETTY_PRINT);
            }

        } else if($_GET['accion'] == 'personaje_id'){
                try{
                    $conexion= new PDO(
                    "mysql:host=localhost;dbname=utez;charset=UTF8",
                    "root",
                    "root");

                }catch(PDOException $ex){
                    echo $ex->getMessage();
            }
            if(isset($_GET['id'])){

                $sql = 'SELECT * FROM docente where docente.id=:id';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(':id', $_GET['id']);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                if($rs != null){
                    echo json_encode($rs[0], JSON_PRETTY_PRINT);
                }else{
                    echo "No hay registro de Docentes";
                }
            }else{
                $sql = 'SELECT * FROM docente where docente.id=:id';
                $pstm = $conexion->prepare($sql);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($rs, JSON_PRETTY_PRINT);
            }

        /////////////////////ESTUDIANTE BUSQUEDA/////////////
        }else if($_GET['accion'] == 'estudiante'){
                try{
                    $conexion = new PDO(
                    "mysql:host=localhost;dbname=utez;charset=UTF8",
                    "root",
                    "root");

                }catch(PDOException $ex){
                    echo $ex->getMessage();
            }
            if(isset($_GET['matricula'])){

                $sql = 'SELECT * FROM estudiante';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(':n', $_GET['matricula']);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                if($rs != null){
                    echo json_encode($rs[0], JSON_PRETTY_PRINT);
                }else{
                    echo "No hay registro de Estudiantes";
                }
            }else{
                $sql = 'SELECT * FROM estudiante';
                $pstm = $conexion->prepare($sql);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($rs, JSON_PRETTY_PRINT);
            }

        }else if($_GET['accion'] == 'matricula'){
                try{
                    $conexion= new PDO(
                    "mysql:host=localhost;dbname=utez;charset=UTF8",
                    "root",
                    "root");

                }catch(PDOException $ex){
                    echo $ex->getMessage();
            }
            if(isset($_GET['matricula'])){

                $sql = 'SELECT * FROM estudiante where estudiante.matricula=:matricula';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(':matricula', $_GET['matricula']);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                if($rs != null){
                    echo json_encode($rs[0], JSON_PRETTY_PRINT);
                }else{
                    echo "No hay registro de Estudiantes";
                }
            }else{
                $sql = 'SELECT * FROM estudiante where estudiante.matricula=:matricula';
                $pstm = $conexion->prepare($sql);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($rs, JSON_PRETTY_PRINT);
            }
            //////////////EVALUACION CONSULTA /////////////
        }else if($_GET['accion'] == 'evaluacion'){
            try{
                $conexion = new PDO(
                "mysql:host=localhost;dbname=utez;charset=UTF8",
                "root",
                "root");

            }catch(PDOException $ex){
                echo $ex->getMessage();
        }
        if(isset($_GET['estudiante'])){

            $sql = 'SELECT * FROM evaluacion';
            $pstm = $conexion->prepare($sql);
            $pstm->bindParam(':n', $_GET['estudiante']);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            if($rs != null){
                echo json_encode($rs[0], JSON_PRETTY_PRINT);
            }else{
                echo "No hay Evaluaciones";
            }
        }else{
            $sql = 'SELECT estudiante AND calificacion FROM estudiante';
            $pstm = $conexion->prepare($sql);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rs, JSON_PRETTY_PRINT);
        }

        }else if($_GET['accion'] == 'matricula'){
            try{
                $conexion= new PDO(
                "mysql:host=localhost;dbname=utez;charset=UTF8",
                "root",
                "root");

            }catch(PDOException $ex){
                echo $ex->getMessage();
        }
        if(isset($_GET['matricula'])){

            $sql = 'SELECT estudiante AND calificacion FROM evaluacion where evaluacion.estudiante=:matricula';
            $pstm = $conexion->prepare($sql);
            $pstm->bindParam(':matricula', $_GET['matricula']);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            if($rs != null){
                echo json_encode($rs[0], JSON_PRETTY_PRINT);
            }else{
                echo "No hay Evaluaciones";
            }
        }else{
            $sql = 'SELECT estudiante AND calificacion FROM evaluacion where evaluacion.estudiante=:matricula';
            $pstm = $conexion->prepare($sql);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rs, JSON_PRETTY_PRINT);
        }
            //////////promedio general de todos los estudiantes.///////
        }else if($_GET['accion']== 'evaluacion'){
            try{
                $conexion= new PDO(
                "mysql:host=localhost;dbname=utez;charset=UTF8",
                "root",
                "root");

            }catch(PDOException $ex){
                echo $ex->getMessage();
        }
        if(isset($_GET['id'])){

            $sql = 'SELECT avg(calificacion) AS Promedio_General FROM evaluacion;';
            $pstm = $conexion->prepare($sql);
            $pstm->bindParam(':n', $_GET['id']);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            if($rs != null){
                echo json_encode($rs[0], JSON_PRETTY_PRINT);
            }else{
                echo "Error al calcular Promedio General";
            }
        }else{
            $sql = 'SELECT avg(calificacion) AS Promedio_General FROM evaluacion;';
            $pstm = $conexion->prepare($sql);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rs, JSON_PRETTY_PRINT);
        }
    }
        ///////-------------------------------------------------/////////////
        break;
        case 'POST':
            if($_GET['accion']== 'docente'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=utez;charset=utf8",
                    "root",
                    "root"
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
                try {
                    $data = json_decode(file_get_contents('php://input'));
                    $sql = 'INSERT INTO docente (nombre, apellidos, fecha_nacimiento, curp, id) VALUES (:nombre, :apellidos, :fecha_nacimiento, :curp, :id)';

                    $pstm = $conexion->prepare($sql);
                    $pstm ->bindParam(':nombre',$data->nombre);
                    $pstm ->bindParam(':apellidos',$data->apellidos);
                    $pstm ->bindParam(':fecha_nacimiento',$data->fecha_nacimiento);
                    $pstm ->bindParam(':curp',$data->curp);
                    $pstm ->bindParam(':id',$data->id);

                    $exec = $pstm->execute();
                    if ($exec) {
                        $_POST['result']=$exec;
                        $_POST['added']=$data->id;
                        echo json_encode($_POST);
                    } else {
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                         
                    }
                    exit();
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
                ////////////////////REGISTRO ESTUDIANTE//////////
            }else if($_GET['accion']== 'estudiante'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=utez;charset=utf8",
                    "root",
                    "root"
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
                try {
                    $data = json_decode(file_get_contents('php://input'));
                    $sql = 'INSERT INTO estudiante (nombre, apellidos, fecha_nacimiento, curp, matricula) VALUES (:nombre, :apellidos, :fecha_nacimiento, :curp, :matricula)';
                    
                    $pstm = $conexion->prepare($sql);
                    $pstm ->bindParam(':nombre',$data->nombre);
                    $pstm ->bindParam(':apellidos',$data->apellidos);
                    $pstm ->bindParam(':fecha_nacimiento',$data->fecha_nacimiento);
                    $pstm ->bindParam(':curp',$data->curp);
                    $pstm ->bindParam(':matricula',$data->matricula);

                    $exec = $pstm->execute();
                    if ($exec) {
                        $_POST['result']=$exec;
                        $_POST['added']=$data->matricula;
                        echo json_encode($_POST);
                    } else {
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                         
                    }
                    exit();
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
                    
            }
        break;

    case 'PUT':
            if($_GET['accion']== 'docente'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=utez;charset=utf8",
                    "root",
                    ""
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
    
                }
                try {
                    $data = json_decode(file_get_contents("php://input"));
                    $sql = "UPDATE docente SET nombre=:nombre, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, 
                    curp=:curp, id=:id WHERE id=:id";

                    $pstm = $conexion->prepare($sql);
                    $pstm ->bindParam(':nombre',$data->nombre);
                    $pstm ->bindParam(':apellidos',$data->apellidos);
                    $pstm ->bindParam(':fecha_nacimiento',$data->fecha_nacimiento);
                    $pstm ->bindParam(':curp',$data->curp);
                    $pstm ->bindParam(':id',$data->id);

                    
                    $exec = $pstm->execute();
                    if ($exec) {
                        $_POST['result']=$exec;
                        $_POST['updated']=$data->id;
                        echo json_encode($_POST);
                    } else {
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                         
                    }
                    exit();
    
                } catch( PDOException $ex){
                    echo $ex->getMessage();
                }
                ///////////update ESTUDIANTE //////////
            }else if($_GET['accion']== 'estudiante'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=utez;charset=utf8",
                    "root",
                    ""
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
    
                }
                try {
                    $data = json_decode(file_get_contents("php://input"));
                    $sql = "UPDATE estudiante SET nombre=:nombre, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, 
                    curp=:curp, matricula=:matricula WHERE matricula=:matricula";

                    $pstm = $conexion->prepare($sql);
                    $pstm ->bindParam(':nombre',$data->nombre);
                    $pstm ->bindParam(':apellidos',$data->apellidos);
                    $pstm ->bindParam(':fecha_nacimiento',$data->fecha_nacimiento);
                    $pstm ->bindParam(':curp',$data->curp);
                    $pstm ->bindParam(':matricula',$data->matricula);

                    $exec = $pstm->execute();
                    if ($exec) {
                        $_POST['result']=$exec;
                        $_POST['updated']=$data->matricula;
                        echo json_encode($_POST);
                    } else {
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                         
                    }
                    exit();
    
                } catch( PDOException $ex){
                    echo $ex->getMessage();
                }
            }

        break;

    case 'DELETE':
        if($_GET['accion']== 'docente'){
            try{
               $conexion = new PDO(
                "mysql:host=localhost;dbname=utez;charset=utf8",
                "root",
                "root"
               );
            }catch( PDOException $ex){
                echo $ex->getMessage();

            }
            try {
                $id = $_GET ['id'];
                $sql = 'DELETE FROM docente WHERE id=:id';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(":id", $id);
                $exec = $pstm->execute();
                if($exec){
                    $_POST['result']=$exec;
                    $_POST['delete']=$id;
                    echo json_encode($_POST);
                }else{
                    $_POST['result']=$exec;
                    echo json_encode($_POST);
                }

            }catch( PDOException $ex){
                echo $ex->getMessage();
            }
            //////////////ELIMINACION ESTUDIANTE/////
        }else if($_GET['accion']== 'estudiante'){
            try{
               $conexion = new PDO(
                "mysql:host=localhost;dbname=utez;charset=utf8",
                "root",
                "root"
               );
            }catch( PDOException $ex){
                echo $ex->getMessage();

            }
            try {
                $id = $_GET ['matricula'];
                $sql = 'DELETE FROM estudiante WHERE matricula=:matricula';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(":matricula", $matricula);
                $exec = $pstm->execute();
                if($exec){
                    $_POST['result']=$exec;
                    $_POST['delete']=$matricula;
                    echo json_encode($_POST);
                }else{
                    $_POST['result']=$exec;
                    echo json_encode($_POST);
                }

            }catch( PDOException $ex){
                echo $ex->getMessage();
            }
        }
        break;
        default:
        echo "Error Metodo Sin soporte"

    }
?>