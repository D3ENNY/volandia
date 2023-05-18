<?php  
    // Rimuovi eventuali inclusioni precedenti di Autoloader.php
    foreach (get_included_files() as $filename) {
        if (strpos($filename, 'Autoloader.php') !== false) {
            return;
        }
    }
    include '../Autoloader.php';

    class UserManager{

        private $conn;

        public function __construct(){
            $connection = new Connection();
            $this->conn = $connection -> createConnection();
            session_start();
        }

        public function searchUser($email, $table = 'USERS'){
            $query = "SELECT * FROM {$table} WHERE email = :email";
            try{
                $stmt = $this->conn -> prepare($query);
                $stmt -> bindParam(':email', $email);
                $stmt -> execute();
                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "errore nella query -> {$e->getMessage()}";
            }
            return [$result, $table];
        }

        public function registerUser($result, $data){
            $insert = "INSERT INTO USERS (username, email, password) VALUES (:username, :email, :password)";
            if(!$result)
                try{
                    $stmt = $this->conn -> prepare($insert);
                    $stmt -> execute(array(
                        ':username' => $data['username'],
                        ':email' => $data['email'],
                        ':password' => password_hash($data['pw'], PASSWORD_BCRYPT))
                    );
                }catch(PDOException $e){
                    echo "errore nella query {$e->getMessage()}";
                }
            else echo "utente già registrato";
        }

        public function addPassenger($result, $data){
            $insert = "INSERT INTO PASSEGGERI (CF, Nome, Cognome, DataNascita, Nazionalita, tipo_via, nome_via, Citta, n_via, username) VALUES (:CF, :Nome, :Cognome, :DataNascita, :Nazionalita, :tipo_via, :nome_via, :Citta, :n_via, :username)";

            if(!$result)
                try{
                    $stmt = $this->conn -> prepare($insert);
                    $stmt -> execute(array(
                        ':CF' => $data['fc'],
                        ':Nome' => $data['name'],
                        ':Cognome' => $data['surname'],
                        ':DataNascita' => $data['date'],
                        ':Nazionalita' => $data['nationality'],
                        ':tipo_via' => $data['routeType'],
                        ':nome_via' => $data['route'],
                        ':Citta' => $data['city'],
                        ':n_via' => $data['number'],
                        ':username' => $_SESSION['username'])
                    );
                }catch(PDOException $e){
                    echo "errore nella query {$e->getMessage()}";
                }
            else echo "biglietto già acquistato";
        }

        public function loginUser($result, $pw, $user = 'USERS'){
            $file = $user === 'USERS' ? '../../index.php' : '../../pages/admin.php';
            //se è stato trovato un utente nel db logga, se non è stato trovato significa che non c'erano utenti con quella mail
            if($result) 
                if(password_verify($pw, $result[0]['password'])){
                    session_start();
                    $_SESSION['username'] = $result[0]['username'];
                    $_SESSION['userData'] = json_encode($result);
                    ob_start(); //creo l'output buffer
                    header("Location: {$file}");
                    ob_end_flush(); //invio la chiamata al browser e cancello il buffer
                    exit();
                }else echo "password sbagliata";
            else echo "mail o username sbagliato";
        }

    }
?>