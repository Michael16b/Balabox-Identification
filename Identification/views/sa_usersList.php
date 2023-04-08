<?php
include __ROOT__."/views/header.html";
?>

<body>

<div class="container my-4">
    <h1>Liste des groupes</h1>
    <?php foreach($groups as $group) { ?>
        <?php echo $group; ?>
        <div class="card my-3">
            <div class="card-header">
                <h2><?php echo $group['name']; ?></h2>
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