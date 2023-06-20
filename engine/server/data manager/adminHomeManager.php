<?php
    // Rimuovi eventuali inclusioni precedenti di Autoloader.php
    foreach (get_included_files() as $filename) {
        if (strpos($filename, 'Autoloader.php') !== false) {
            return;
        }
    }
    include '../Autoloader.php';

    class AdminHomeManager{

        private $conn;

        public function __construct(){
            $connection = new Connection();
            $this->conn = $connection -> createConnection();
        }

        public function getFlyCompanyNumber(){
            $query = "SELECT count(*) AS numeroVoli, c.compagnia FROM VOLI AS v INNER JOIN COMPAGNIE AS c ON (v.Cod_IATA = c.Cod_IATA) GROUP BY v.Cod_IATA";
            try {
               $stmt = $this->conn -> prepare($query);
               $stmt -> execute();
               $res = $stmt -> fetchAll(PDO::FETCH_ASSOC); 
            } catch (PDOException $e) {
                echo "errore nella query {$e->getMessage()}";
            }
            return $res;
        }

        public function getModaDepartureHour(){
            $query = "SELECT HOUR(DataPartenza) AS FasciaOrariaPartenza, COUNT(*) AS NumeroVoliPartenza FROM VOLI GROUP BY FasciaOrariaPartenza ORDER BY NumeroVoliPartenza DESC;";
            try {
                $stmt = $this->conn -> prepare($query);
                $stmt -> execute();
                $res = $stmt -> fetchAll(PDO::FETCH_ASSOC); 
             } catch (PDOException $e) {
                 echo "errore nella query {$e->getMessage()}";
             }
             return $res;
        }

        public function getModaArrivalHour(){
            $query = "SELECT CONCAT(HOUR(DataArrivo),':',LPAD(MINUTE(DataArrivo),2,'0')) AS FasciaOrariaArrivo, COUNT(*) AS NumeroVoliArrivo FROM VOLI GROUP BY HOUR(DataArrivo) ORDER BY HOUR(DataArrivo) ASC";
            try {
                $stmt = $this->conn -> prepare($query);
                $stmt -> execute();
                $res = $stmt -> fetchAll(PDO::FETCH_ASSOC); 
             } catch (PDOException $e) {
                 echo "errore nella query {$e->getMessage()}";
             }
             return $res;
        }

        public function formatJson($name, $data, $json=array()){
            $json[$name] = $data;
            return $json;
        }
    }

?>

