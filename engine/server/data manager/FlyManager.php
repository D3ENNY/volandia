<?php
    // Rimuovi eventuali inclusioni precedenti di Autoloader.php
    foreach (get_included_files() as $filename) {
        if (strpos($filename, 'Autoloader.php') !== false) {
            return;
        }
    }
    include '../Autoloader.php';

    class FlyManager{

        private $conn;

        public function __construct(){
            $connection = new Connection();
            $this->conn = $connection -> createConnection();
        }

        public function getQuery($returnDate){
            $endQuery = $returnDate == "one way" ? '>= :departureDate ORDER BY v.DataPartenza ASC' : 'BETWEEN :departureDate AND :returnDate ORDER BY v.DataPartenza ASC';
            return 'SELECT v.*, c.Compagnia FROM VOLI AS v INNER JOIN COMPAGNIE AS c ON (v.Cod_IATA = c.Cod_IATA) WHERE Origine = :depuarture AND Destinazione = :destination AND DataPartenza '.$endQuery;
        }

        public function getFly($query, $data){
            try{
                $stmt = $this->conn -> prepare($query);
                if($data['returnDate'] == "one way") $stmt -> execute(array(":depuarture" => $data['departure'], ":destination" => $data['destination'], "departureDate" => $data['departureDate']));
                else $stmt -> execute(array(":depuarture" => $data['departure'], ":destination" => $data['destination'], "departureDate" => $data['departureDate'], ":returnDate" => $data['returnDate']));
                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "errore nella query {$e->getMessage()}";
            }
            return $result;
        }

        public function addFly($data){
            $insert = "INSERT INTO VOLI VALUES (:numero, :origine, :destinazione, :dataPartenza, :dataArrivo, :capacita, :iata)";
            
            try{
                $stmt = $this->conn -> prepare($insert);
                $stmt -> execute(array(
                    ':numero' => $data['number'],
                    ':origine' => $data['origin'],
                    ':destinazione' => $data['destination'],
                    ':dataPartenza' => $data['departureDate'],
                    ':dataArrivo' => $data['arrivalDate'],
                    ':capacita' => $data['capacity'],
                    ':iata' => $data['codeIATA'])
                );
            }catch(PDOException $e){
                echo "<br>errore nella query <br>{$e->getMessage()}";
            }
        }

        public function generateBoardingPass($data){
            $insert = "INSERT INTO BIGLIETTI VALUES (:code, :date, :amount, :taxes, :number, :cf)";
            for($i = 0; $i < $data['capacity']; $i++){
                try{
                    $stmt = $this->conn -> prepare($insert);
                    $stmt -> execute(array(
                        ':code' => $data['number'] . '-' . $i,
                        ':date' => date("Y-m-d"),
                        ':amount' => '60',
                        ':taxes' => '6',
                        ':number' => $data['number'],
                        ':cf' => 'ROOT')
                    );
                }catch(PDOException $e){
                    echo "<br> errore nella query: <br> {$e->getMessage()}";
                }
            }
        }

        public function sendFly($avaibleFly, $data){
            if($avaibleFly){
                $resultJson = $this ->formatJson($avaibleFly);
                setcookie('avaibleFly', $resultJson, time()+3600, '/');
            }
            $resultJson = json_encode(array("departure" => $data['departure'], "destination" => $data['destination'], "departureDate" => $data['departureDate'], "returnDate" => $data['returnDate']));
            setcookie('requestFly', $resultJson, time()+3600, '/');
            ob_start(); //creo l'output buffer
            header("Location: ../../pages/fly.php");
            ob_end_flush(); //invio la chiamata al browser e cancello il buffer
        }

        private function formatJson($json){
            $result = array();
            foreach($json as $fly){
                $date = date('Y-m-d', strtotime($fly['DataPartenza']));

                if(!isset($result[$date]))
                    $result[$date] = array();
                
                $result[$date][] = $fly;
            }
            return json_encode($result, JSON_PRETTY_PRINT);
        }
    }
?>