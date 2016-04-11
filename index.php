<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'databaze.php';
        databaze::connect();
        $jmeno = "Tomáš";
        $prijmeni = "Černý";
        $obor = "3";
        databaze::insert($jmeno, $prijmeni, $obor);
        databaze::vypis()
        ?>
    </body>
</html>
