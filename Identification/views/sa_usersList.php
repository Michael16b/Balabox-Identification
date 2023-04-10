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
                <div class="align-items-center">
                    <form action="/sa_usersList" method="post">
                        <input type="hidden" name="isDeleteGroup" value="<?php echo $group['name']; ?>" />
                        <button type="submit" class="btn btn-danger align-items-center me-3" style="width: 40px; height: 40px;"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-groupname="<?php echo $group['name']; ?>" data-bs-toggle="modal" data-bs-target="#add-member-modal-<?php echo $group['id']; ?>" style="width: 40px; height: 40px;"><i class="fas fa-user-plus"></i></button>
                </div>
        </div>

        <div class="card-body">
            <!-- Affichage des membres du groupe -->
            <h3>Membres :</h3>
            <ul>
                <?php foreach($group['members'] as $member) { ?>
                    <li><?php echo $member['lastname'] . ' ' . $member['firstname'] . ' (' . $member['username'] . ')'; ?></li>
                <?php } ?>
            </ul>
        </div>
        
        <div class="modal fade" id="add-member-modal-<?php echo $group['id']; ?>" tabindex="-1" aria-labelledby="add-member-modal-<?php echo $group['id']; ?>-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center ed">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-member-modal-label">Ajouter un membre à la classe <span id="group-name"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Rechercher un utilisateur..." id="search-users-input">
                        <button class="btn btn-primary" type="button" id="search-users-button">Rechercher</button>
                    </div>
                    <div id="users-list">
                </div>
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn add btn-primary">Ajouter</button>
                        </div>
                    
                </div>
            </div>
        </div>
    <?php } ?>
</div>





<script>
    var groupName = "";
    document.addEventListener("DOMContentLoaded", function() {
        var addMemberButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        var searchUsersButton = document.querySelector("#search-users-button");
        addMemberButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                groupName = this.getAttribute("data-groupname");
                document.getElementById('group-name').innerHTML = groupName;
            });
        });



        



        searchUsersButton.addEventListener("click", function() {
            var searchText = document.querySelector("#search-users-input").value.toLowerCase();
            var usersList = document.querySelector("#users-list");
            usersList.innerHTML = "";
            var count = 0; // variable pour compter le nombre de boutons
            <?php foreach($usersWithoutGroup as $username) { ?>
                if ("<?php echo $username; ?>".includes(searchText)) {
                    var div = document.createElement("div");
                    div.className = "my-2 d-flex justify-content-center";

                    var toggleBtn = document.createElement("input");
                    toggleBtn.setAttribute("type", "checkbox");
                    toggleBtn.setAttribute("class", "btn-check col-2");
                    toggleBtn.setAttribute("id", "<?php echo $username; ?>");
                    toggleBtn.setAttribute("autocomplete", "off");

                    var label = document.createElement("label");
                    label.setAttribute("class", "btn btn-outline-primary col-8 mx-3");
                    label.setAttribute("for", "<?php echo $username; ?>");

                    var labelText = document.createTextNode("<?php echo $username; ?>");
                    label.appendChild(labelText);

                    div.appendChild(toggleBtn);
                    div.appendChild(label);
                    usersList.appendChild(div);
                }
            <?php } ?>


            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener("click", function () {
                    var otherCheckboxes = document.querySelectorAll('input[type="checkbox"]:not(#' + checkbox.id + ')');
                    otherCheckboxes.forEach(function (otherCheckbox) {
                        otherCheckbox.parentNode.parentNode.removeChild(otherCheckbox.parentNode);
                    });
                    
                    if (!checkbox.checked) {
                        searchUsersButton.click();
                    }
                });
            });



            var addMemberModal = document.querySelector("#add-member-modal-");
            var addMemberButton = addMemberModal.querySelector(".add");
            addMemberButton.addEventListener("click", function() {
                var checkedCheckbox = document.querySelector('input[type="checkbox"]:checked');
                if (checkedCheckbox) {
                    var username = checkedCheckbox.id;
                    var formData = new FormData();
                    formData.append("addMember", groupName);
                    formData.append("member", username);

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "/sa_usersList");
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            window.location.reload();
                        }
                    };
                    xhr.send(formData);
                }
            });

});
});


</script>

</body>