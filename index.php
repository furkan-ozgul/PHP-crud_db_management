<?php
        try{
        $VeritabanıBaglantisi = new PDO("mysql:host=localhost;dbname=panelroot;charset=UTF8","root","");


    }catch(PDOException $Hata){
        echo "Bağlantı Hatası <br/> " . $Hata->getMessage();
        die(); 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="500">
<?php 
    $Sorgu   =  $VeritabanıBaglantisi -> prepare("SELECT * FROM users");
    $Sorgu -> execute();

    $KayitSayisi =  $Sorgu -> rowCount();
    $Kayitlar    =  $Sorgu -> fetchAll(PDO::FETCH_ASSOC);

    foreach($Kayitlar as $KayitSatirlari){
      
        ?>

        <tr>
            <td><input type="checkbox"></td>
            <td><?php $KayitSatirlari ?> </td>
        </tr>

        <?php
    }
?>
    </table>
</body>
</html>