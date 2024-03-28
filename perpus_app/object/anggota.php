<?php

class Anggota {

    private $conn;
    private $table_name = "anggota";
    
    public $ID;
    public $NIK;
    public $NamaLengkap;
    public $Alamat;
    public $Anggota;
    public $NoTelp;
    public $TglRegistrasi;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (NIK, NamaLengkap, Alamat, NoTelp, TglRegistrasi)" .
                                " VALUES (:NIK, :NamaLengkap, :Alamat, :NoTelp, :TglRegistrasi)";
        
        $result = $this->conn->prepare($query);

        $this->NIK = htmlspecialchars(strip_tags($this->NIK));
        $this->NamaLengkap = htmlspecialchars(strip_tags($this->NamaLengkap));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->TglRegistrasi = date("Y-m-d");

        $result->bindParam(":NIK", $this->NIK);
        $result->bindParam(":NamaLengkap", $this->NamaLengkap);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":TglRegistrasi", $this->TglRegistrasi);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll() {
        // select
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }
    function readOne() {
        // Select by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";
    
        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
        $result->execute();
    
        // Fetch the first (and presumably only) row
        $row = $result->fetch(PDO::FETCH_ASSOC);
    
        // Check if $row is a valid array before accessing its elements
        if ($row) {
            $this->NIK = isset($row["NIK"]) ? $row["NIK"] : null;
            $this->NamaLengkap = isset($row["NamaLengkap"]) ? $row["NamaLengkap"] : null;
            $this->Alamat = isset($row["Alamat"]) ? $row["Alamat"] : null;
            $this->NoTelp = isset($row["NoTelp"]) ? $row["NoTelp"] : null;
        } else {
            // Handle the case where no record is found (optional)
            // You might want to set default values or display an error message.
        }
    }
    
    function update() {
        $query = "UPDATE " . $this->table_name . " SET
            NIK = :NIK,
            NamaLengkap = :NamaLengkap,
            Alamat = :Alamat,
            NoTelp = :NoTelp
            WHERE
            ID = :ID";
    
        $result = $this->conn->prepare($query);
    
        // Bind parameters
        $result->bindParam(":NIK", $this->NIK);
        $result->bindParam(":NamaLengkap", $this->NamaLengkap);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":ID", $this->ID);
    
        // Execute the query
        if ($result->execute()) {
            // Update successful
            return true;
        } else {
            // Update failed
            return false;
        }
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);

        $result->execute();
    }
}

?>