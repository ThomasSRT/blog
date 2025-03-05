<?php
/*Faire le traitement du formulaire

- Tous les champs sont obligatoires

- le nom et le prénom doivent avoir au moins une 2 caractères

- l'email doit être valide

- Afficher le message d'erreur si le formulaire n'est pas valide(sous le champ concerné)

- Faites en sorte de ne pas vider le formulaire si le formulaire n'est pas valide*/

$errors=[];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $email =$_POST['email'] ?? '';

    if (empty($nom)) {
        $erreurs['nom'] = 'Veuillez entrer un nom.';
    } 
    elseif (strlen($nom) < 2) {
        $erreurs['nom'] = 'Le nom doit contenir au moins 2 caractères.';
    }
    else {
        $nom=htmlspecialchars(trim($nom));
    }

        if (empty($prenom)) {
            $erreurs['prenom'] = 'Veuillez entrer un prenom.';
        } elseif (strlen($prenom) < 2) {
            $erreurs['prenom'] = 'Le prenom doit contenir au moins 2 caractères.';
}
else {
    $prenom=htmlspecialchars(trim($prenom));
}
if (empty($email)) {
    $erreurs['email'] = 'Veuillez entrer un nom.';
} 
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email']="L'adresse email n'est pas valide";
}else{
    $email=htmlspecialchars(trim($email));
}

}
include_once 'partials/header.php';
?>
<main class="container-fluid my-4">
    <div class="row">
        <div class="col-md-8 m-auto">
            <h1 class="display-4 fw-normal">Inscription</h1>
            <form action="" method="post" class="mt-4">
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="civilite" value="M" id="male" required>
                        <label class="form-check-label" for="male"><i class="fas fa-male"></i> Monsieur</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="civilite" value="F" id="female">
                        <label class="form-check-label" for="female"><i class="fas fa-female"></i> Madame</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="firstname" placeholder="Prénom" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="lastname" placeholder="Nom" required>
                        </div>
                        <small>
                            <?php echo $errors ??"";?>
                        </small>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> S'inscrire</button>
            </form>
        </div>
</main>

<?php
include_once 'partials/footer.php';
?>