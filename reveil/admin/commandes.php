<?php
$auth = 0;
$adv = 0;
include '../lib/includes.php';

$select = $db->query("SELECT * FROM `commandes` WHERE 1 ORDER BY `id` DESC;");
$result = $select->fetchAll();


?>

<style>
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}














/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
</style>

<table class="tbl">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $category): ?>
                
                    <tr>
                        <td class="border"><?= $category['id']; ?></td>
                        <td class="border"><?= $category['nom']; ?></td>
                        <td class="border"><?= $category['prenom']; ?></td>
                        <td class="border"> <a href="livraison.php?id=<?= $category['id'] ?>"><?= $category['statut']; ?></a></td>

                    </tr>


                <?php endforeach; ?>
                
            </tbody>

        </table>