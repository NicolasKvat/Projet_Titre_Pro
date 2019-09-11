<?php
require_once 'header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?>
<div class="d-flex justify-content-center">
    <a href="?page=Ajouter-utilisateur" class="btn btn-primary text-center font-weight-bold m-4">Ajouter un utilisateur</a>
</div>
<table class="table table-bordered  text-center">
    <thead>
    <th>ID</th>    
    <th>Nom</th>
    <th>Prénom</th>
    <th>Status</th>
</thead>
<tbody>
    <?php foreach ($UserList as $user) {
        ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->lastName ?></td>
            <td><?= $user->firstName ?></td>
            <td><?= $user->status ?></td>
            <td><a href="?page=Profil-utilisateur&id=<?= $user->id ?>" class="btn btn-primary btn-block">Voir</a></td>
            <td><a href="?page=Modifier-utilisateur&id=<?= $user->id ?>" class="btn btn-secondary btn-block">Modifier</a></td>
            <td><a href="?page=Supprimer-utilisateur&id=<?= $user->id ?>" class="btn btn-danger btn-block">Supprimer</a></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
<?php
include_once 'footerAdminSpace.php';
