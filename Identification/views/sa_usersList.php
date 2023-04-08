<?php
include __ROOT__."/views/header.html";
?>

<body>

<div class="container my-4">
    <h1>Liste des groupes</h1>
    <?php foreach($groups as $group) { ?>
        <div class="card my-3">
            <div class="card-header d-flex justify-content-between align-items-center"> 
                <h2 class="mb-0"><?php echo $group['name']; ?></h2>
                <form action="/sa_usersList" method="post">
                    <input type="hidden" name="isDeleteGroup" value="<?php echo $group['name']; ?>" />
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
            <div class="card-body">
                <p><?php echo $group['description']; ?></p>
                <h3>Membres :</h3>
                <ul>
                    <?php foreach($group['members'] as $member) { ?>
                        <li><?php echo $member['lastname'] . ' ' . $member['firstname'] . ' (' . $member['username'] . ')'; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>


</body>