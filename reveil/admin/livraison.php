<?php
$auth = 0;
$adv = 0;
include '../lib/includes.php';

if(!isset($_GET['id'])){
    die();
}
$id = $db->quote($_GET['id']);
if(isset($_POST['nb'])){
    $db->query("UPDATE `commandes` SET`statut`='" . $_POST['nb'] . "' WHERE `id` = $id");
}
$select = $db->query("SELECT * FROM `commandes` WHERE `id` = $id");
$result = $select->fetch();
?>



<table class="tbl">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Tel</th>
                    <th>Adresse</th>
                    <th>Objet</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td class="border"><?= $result['id']; ?></td>
                        <td class="border"><?= $result['nom']; ?></td>
                        <td class="border"><?= $result['prenom']; ?></td>
                        <td class="border"><?= $result['tel']; ?></td>
                        <td class="border"><?= $result['adresse']; ?></td>
                        <td class="border"><?= $result['object']; ?></td>



                    </tr>


                
            </tbody>



        </table>

            <form action="#" method="post">
                <input type="number" name="nb" value="<?= $result['statut']; ?>" max="4" min="0">
                <input type="submit" value="Done">
            </form>