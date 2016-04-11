<?php
class databaze{
    
    public static $connection;
    
    /**
     * Připojení do databáze
     * @param resource $host umístění databáze
     * @param string $user specifikuje uživatele
     * @param string $password specifikuje heslo
     * @param string $name název databáze do které se připojujeme
     */
    static function connect(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $name = 'mydb';
        self::$connection = mysqli_connect($host, $user, $password, $name);
        mysqli_set_charset(self::$connection, "utf8");
    }
    /**
     * @param string $query Dotaz do databáze
     * @param string[] $result uložený obsah databáze
     * @param string $item jednotlivý záznam
     */
    static function vypis(){
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
       $query = mysqli_query(self::$connection, "INSERT INTO studenti (Jmeno, Prijmeni, Obory_Id) VALUES ('" . $jmeno . "','" . $prijmeni . "','" . $obor . "')");
    }
}
