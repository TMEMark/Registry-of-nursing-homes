<?php

function  selectAdministratori(){
    global $db;
    $query = ("SELECT * FROM administratori");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

function selectAdministratoriUloge(){
    global $db;
    $query = ("SELECT * 
    FROM administratori a 
    INNER JOIN uloge u ON a.uloga = u.idUloga");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
}

function selectKategorije(){
    global $db;
    $query = ("SELECT * FROM kategorije");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

function selectPruzatelji(){
   $query='select';
    $uvjeti='';
    if($_GET['search']){
        $uvjeti=' a.name like :searchUvjet and'; 
    }

    // očistiti zadnji end
    if(strlen($uvjeti)>0){
        $uvjeti=substr($uvjeti,0,strlen($uvjeti)-4);
    }
    //provjeriti echo da li je uvjeti bez zadnje and

    global $db;
    //$query = "SELECT * FROM pruzatelji";
    $statement = $db->prepare($query);

    if(strlen($uvjeti)>0){
        
    }
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

function selectUsluge(){
    global $db;
    $query = ("SELECT * FROM usluge");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

function selectLok(){
    global $db;
    $query = ("SELECT * FROM lokacija");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

function selectPruzUslKat(){
    global $db;
    $query = ("SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
    FROM usluge u
    INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
    INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
    INNER JOIN lokacija l ON l.idLokacije = p.lokacija
    INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
    INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
    GROUP BY p.naziv_pruzatelja");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

function selectPruzLok(){
    global $db;
    $query = ("SELECT * 
    FROM lokacija l 
    INNER JOIN pruzatelji p ON l.idLokacije =  p.lokacija
    ;");
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
};

//funkcija koja iz baze podataka vadi prema id-u korisnika je li admin ili ne

function getAdminRole($idAdmin){
    global $db;
    $query = 'SELECT uloga 
    FROM administratori 
    WHERE idAdmin = :idAdmin;';
    $statement = $db->prepare($query);
    $statement->bindValue(':idAdmin', $idAdmin);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    foreach($array as $keyAdmin){
        $uloga = $keyAdmin['uloga'];
        if($uloga != 1){
            return "moderator";
        }else{
           return "admin";
        };
    } 
}

function checkUsernameExists($username){
    global $db;
    $query = 'SELECT *
    FROM administratori 
    WHERE korisnicko_ime = :username;';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
}

function getLastInserted(){
    global $db;
    $query = 'SELECT * FROM pruzatelji ORDER BY idPruz DESC LIMIT 1;';
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
}

function getLastUsl(){
    global $db;
    $query = 'SELECT * FROM pruzatelji_usluge ORDER BY idPruzUsl DESC LIMIT 1;';
    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
}


