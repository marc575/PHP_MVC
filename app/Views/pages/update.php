<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/logo.png" type="image/x-icon">
    <title>MAJ Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="navbar bg-base-100 shadow-sm px-10">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
                </div>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content font-bold bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li>
                        <a href="/">Accueil</a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                    <li>
                        <a href="../users/show">
                            <?php if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) : ?>
                                Contacts
                            <?php else: ?>
                                Profil
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="/logs">Logs</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <a href="/" class="text-xl text-blue-900 font-bold"><img src="/assets/logo.png" alt="logo" width="50"></a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 font-bold">
                <?php if (isset($_SESSION['user_id'])) : ?>
                <li>
                    <a href="/">Accueil</a>
                </li>
                <li>
                    <a href="../users/show">
                            <?php if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) : ?>
                                Contacts
                            <?php else: ?>
                                Profil
                            <?php endif; ?>
                    </a>
                </li>
                <li>
                    <a href="/logs">Logs</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="navbar-end"></div>
        <?php if (!isset($_SESSION['user_id'])) : ?>
            <a href="/auth/login" class="btn btn-primary">Se connecter</a>
        <?php else: ?>
            <a href="/auth/logout" class="btn btn-outline-primary">Deconnexion</a>
        <?php endif; ?>
        </div>
    </div>
    
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content">
          <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <div class="card-body">
                <?php if (isset($_SESSION['message'])) : ?>
                <div role="alert" class="alert alert-success my-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                        <span><?= htmlspecialchars($_SESSION['message']) ?></span>
                </div>
                <?php endif; ?>
                <form action="../user/update?id=<?= $user['id'] ?>" class="space-y-4" method="POST">
                    <?php if (isset($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (isset($user) && isset($user['username']) && isset($user['email'])) : ?>
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></g></svg>
                        <input type="text" name="username" value="<?php echo $user['username']; ?>" required placeholder="Nom d'utilisateur" minlength="4" maxlength="50" title="Nom d'utilisateur" />
                    </label>
            
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></g></svg>
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" required placeholder="exemple@mail.com" required/>
                    </label>
            
                    <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) : ?>
                    <fieldset class="fieldset">
                        <select class="select" name="role_id">
                            <option value="1" <?= ($user['role_id'] === 1) ? 'selected' : ''; ?>>Administrateur</option>
                            <option value="2" <?= ($user['role_id'] === 2) ? 'selected' : ''; ?>>Client</option>
                        </select>
                    </fieldset>

                    <fieldset class="fieldset w-full">
                        <label class="fieldset-label">
                            <input type="checkbox" <?= ($user['status'] === 'active') ? 'checked="checked"' : ''; ?> class="checkbox" name="status" />
                            Activer maintent
                        </label>
                    </fieldset>
                    <?php endif; ?>
            
                    <button type="submit" class="btn btn-primary w-full">Mettre à jour</button>
                </form>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) : ?>
                <a href="../users/show" class="text-blue-500 mt-3 font-medium hover:text-blue-900">Voir la liste des contacts</a>
                <?php endif; ?>
            </div>
          </div>
        </div>
    </div>
    
    <footer class="footer sm:footer-horizontal bg-neutral text-neutral-content items-center p-4 mt-10">
        <aside class="grid-flow-col items-center">
            <img src="/assets/logo.png" alt="logo" width="50" class="rounded-full">
            <p>Copyright © 2025 - Tous droits reservés | Tatchou Marc</p>
        </aside>
        <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            <a>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
            </svg>
            </a>
            <a>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
            </svg>
            </a>
            <a>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
            </svg>
            </a>
        </nav>
    </footer>
</body>
</html>