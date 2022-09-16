<?php

function searchTest($search,$zupanija,$usluga,$kategorija){
    global $db;
    if(isset($search) && strlen($search) > 0){
        $querySearch = "SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
        FROM usluge u
        INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
        INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
        INNER JOIN lokacija l ON l.idLokacije = p.lokacija
        INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
        INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
        WHERE p.naziv_pruzatelja like '%$search%' OR p.email like '%$search%' OR l.naziv_lokacije like '%$search%' OR p.adresa like '%$search%' OR p.kontakt like '%$search%' 
        OR p.URL_stranice like '%$search%' OR p.napomena like '%$search%' OR u.naziv_usluge like '%$search%' OR k.naziv_kategorije like '%$search%'
        GROUP BY p.naziv_pruzatelja";

        $statement = $db->prepare($querySearch);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        if($count > 0){
            $array = $statement->fetchAll();
            $statement->closeCursor();
            return $array;
        }
    }

    else if(isset($zupanija) && strlen($zupanija) > 10){
        $queryZupanija = "SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
        FROM usluge u
        INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
        INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
        INNER JOIN lokacija l ON l.idLokacije = p.lokacija
        INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
        INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
        WHERE p.naziv_pruzatelja like '%$zupanija%' OR p.email like '%$zupanija%' OR l.naziv_lokacije like '%$zupanija%' OR p.adresa like '%$zupanija%' OR p.kontakt like '%$zupanija%' 
        OR p.URL_stranice like '%$zupanija%' OR p.napomena like '%$zupanija%' OR u.naziv_usluge like '%$zupanija%' OR k.naziv_kategorije like '%$zupanija%'
        GROUP BY p.naziv_pruzatelja";
        $statement1 = $db->prepare($queryZupanija);
        if ($statement1->execute()) {
            $count = $statement1->rowCount();
        };
        if($count > 0){
            $array1 = $statement1->fetchAll();
            $statement1->closeCursor();
            return $array1;
        }
        
    }

    else if(isset($usluga) && strlen($usluga) > 8){
        $queryUsluga = "SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
        FROM usluge u
        INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
        INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
        INNER JOIN lokacija l ON l.idLokacije = p.lokacija
        INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
        INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
        WHERE p.naziv_pruzatelja like '%$usluga%' OR p.email like '%$usluga%' OR l.naziv_lokacije like '%$usluga%' OR p.adresa like '%$usluga%' OR p.kontakt like '%$usluga%' 
        OR p.URL_stranice like '%$usluga%' OR p.napomena like '%$usluga%' OR u.naziv_usluge like '%$usluga%' OR k.naziv_kategorije like '%$usluga%'
        GROUP BY p.naziv_pruzatelja";

        $statement = $db->prepare($queryUsluga);
        $statement->execute();
        $array2 = $statement->fetchAll();
        $statement->closeCursor();

        return $array2;
    }    
    else if(isset($kategorija)){
        $queryKategorija = "SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
        FROM usluge u
        INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
        INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
        INNER JOIN lokacija l ON l.idLokacije = p.lokacija
        INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
        INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
        WHERE p.naziv_pruzatelja like '%$kategorija%' OR p.email like '%$kategorija%' OR l.naziv_lokacije like '%$kategorija%' OR p.adresa like '%$kategorija%' OR p.kontakt like '%$kategorija%' 
        OR p.URL_stranice like '%$kategorija%' OR p.napomena like '%$kategorija%' OR u.naziv_usluge like '%$kategorija%' OR k.naziv_kategorije like '%$kategorija%'
        GROUP BY p.naziv_pruzatelja";

        $statement = $db->prepare($queryKategorija);
        $statement->execute();
        $array3 = $statement->fetchAll();
        $statement->closeCursor();

        return $array3;
    }
    else{
        $query = "SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
        FROM usluge u
        INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
        INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
        INNER JOIN lokacija l ON l.idLokacije = p.lokacija
        INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
        INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
        GROUP BY p.naziv_pruzatelja";

        $statement = $db->prepare($query);
        $statement->execute();
        $array4 = $statement->fetchAll();
        $statement->closeCursor();

        return $array4;
    }
}

function search($search,$zupanija,$usluga,$kategorija){
    global $db;
    $whereArr = array();
    if($search != "") $whereArr[] = "search = {$search}";
    if($zupanija != "") $whereArr[] = "zupanija = {$zupanija}";
    if($usluga != "") $whereArr[] = "usluga = {$usluga}";
    if($kategorija != "") $whereArr[] = "kategorija = {$kategorija}";

    $whereArr = array();

    $whereStr = implode(" AND ", $whereArr);


    $query = "SELECT DISTINCT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
    FROM usluge u
    INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
    INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
    INNER JOIN lokacija l ON l.idLokacije = p.lokacija
    INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
    INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
    GROUP BY p.naziv_pruzatelja
    WHERE {$whereStr}";

    $statement = $db->prepare($query);
    $statement->execute();
    $array = $statement->fetchAll();
    $statement->closeCursor();

    return $array;
}

function searchddd(){
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
}


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
    global $db;
    $query = ("SELECT * FROM pruzatelji");
    $statement = $db->prepare($query);
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


