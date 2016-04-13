<?php
class databaze{
    
    /**
     *
     * @var connection proměná obsahující připojení do databáze
     */
    public static $connection;
    
    /**
     * Připojení do databáze
     * @param resource $host umístění databáze
     * @param string $user specifikuje uživatele
     * @param string $password specifikuje heslo
     * @param string $name název databáze do které se připojujeme
     */
    static function connect($host, $user, $password, $name)
    {
        self::$connection = mysqli_connect($host, $user, $password, $name);
        mysqli_set_charset(self::$connection, "utf8");
    }
    
    /**
     *   Funkce pro výpis dat z databáze do tabulky
     */
    static function showDatabase()
    {
        $query = mysqli_query(self::$connection, "SELECT s.Jmeno , s.Prijmeni , o.Nazev FROM studenti s LEFT JOIN obory o ON o.Id = s.Obory_Id");
        $result = mysqli_fetch_all($query, MYSQL_ASSOC);
        echo ("<table border=1 style=width:30%> <tr> <th>Jméno</th> <th>Příjmení</th> <th>Obor</th> </tr>");
        foreach ($result as $item){
        echo ("<tr> <td>" . $item['Jmeno'] . "</td>");
        echo ("<td>" . $item['Prijmeni']. "</td>");
        echo ("<td>" . $item['Nazev'] . "</td> </tr>");
        }
        echo "</table>";
    }
    
    /**
     * 
     * @param string $jmeno Jméno žáka které se bude přidávat do databáze
     * @param string $prijmeni Příjmení žáka které se bude přidávat do databáze
     * @param int $obor číselný kód oboru ke kterému žák náleží
     */
    static function insert($jmeno, $prijmeni, $obor)
    {
       mysqli_query(self::$connection, "INSERT INTO studenti (Jmeno, Prijmeni, Obory_Id) VALUES ('" . $jmeno . "','" . $prijmeni . "','" . $obor . "')");
    }
    
    /**
     * @param int $id vymaže žáka podle zadaného id
     */   
    static function delete($id)
    {
       mysqli_query(self::$connection, "DELETE FROM studenti WHERE Id = '" . $id . "'");
    }
    
    /**
     * 
     * @param int $id určuje který záznam se bude upravovat
     * @param string $jmeno pokud je zadáno jméno, bude přepsáno v databázi u příslušného žáka
     * @param string $prijmeni pokud je zadáno příjmení, bude přepsáno v databázi u příslušného žáka
     * @param int $obor pokud je zadán obor, bude přepsán v databázi u příslušného žáka
     */
    static function update($id, $jmeno = NULL, $prijmeni = NULL, $obor = NULL){
    if(isset($jmeno)){
        mysqli_query(self::$connection,"UPDATE studenti Set Jmeno = '" . $jmeno . "' WHERE Id = '" . $id . "'" );
    }
    if(isset($prijmeni)){
       mysqli_query(self::$connection,"UPDATE studenti Set Prijmeni = '" . $prijmeni . "'WHERE Id = '" . $id . "'"  ); 
    }
    if(isset($obor)){
       mysqli_query(self::$connection,"UPDATE studenti Set Obory_Id = '" . $obor . "'WHERE Id = '" . $id . "'" ); 
    }
    }
}
