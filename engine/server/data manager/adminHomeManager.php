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
            $query = "select count(*), c.compagnia from VOLI as v inner join COMPAGNIE as c on (v.Cod_IATA = c.Cod_IATA) group by v.Cod_IATA";
            try {
               $stmt = $this->conn -> prepare($query);
               $stmt -> execute();
               $res = $stmt -> fetchAll(PDO::FETCH_ASSOC); 
            } catch (PDOException $e) {
                echo "errore nella query {$e->getMessage()}";
            }
            return $res;
        }
    }

?>