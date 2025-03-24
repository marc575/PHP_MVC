<!DOCTYPE html>
<html lang="fr" defaut-theme="light">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../public/assets/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content">
          <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <div class="card-body py-10">
                <?php if (isset($_SESSION['message'])) : ?>
                <div role="alert" class="alert alert-success my-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                        <span><?= htmlspecialchars($_SESSION['message']) ?></span>
                </div>
                <?php endif; ?>
                <form action="../auth/register" class="space-y-5" method="POST">
                    <?php if (isset($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <label class="input">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></g></svg>
                        <input type="text" name="username" required placeholder="Nom d'utilisateur" pattern="[A-Za-z][A-Za-z0-9\-]*" minlength="3" maxlength="50" title="Nom d'utilisateur" />
                    </label>
            
                    <label class="input">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></g></svg>
                        <input type="email" name="email" required placeholder="exemple@mail.com" required/>
                    </label>
            
                    <label class="input">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle></g></svg>
                        <input type="password" required name="password" placeholder="Mot de passe" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mot de passe" />
                    </label>
            
                    <label class="input">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle></g></svg>
                        <input type="password" required name="confirm_password" placeholder="Confirmer le mot de passe" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Confirmer le mot de passe" />
                    </label>
                
                    <fieldset class="fieldset">
                        <select class="select" name="role_id">
                            <option disabled selected>Type de compte</option>
                            <option value="1">Administrateur</option>
                            <option value="2">Client</option>
                        </select>
                    </fieldset>

                    <fieldset class="fieldset w-full">
                        <label class="fieldset-label">
                            <input type="checkbox" checked="checked" class="checkbox" name="status" />
                            Activer maintent
                        </label>
                    </fieldset>

                    <button type="submit" class="btn btn-primary w-full my-2">Inscrire</button>
                </form>
                <a href="../users/show" class="text-blue-500 mt-3 font-medium hover:text-blue-900">Voir la liste des contacts</a>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
