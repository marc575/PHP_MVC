<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/assets/logo.png" type="image/x-icon">
    <title>Update Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a class="px-10 font-bold text-xl">LCs</a>
        </div>
        <div class="flex gap-2">
            <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                        alt="Tailwind CSS Navbar component"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a href="/contact/add">Ajouter un contact</a></li>
                    <li><a href="/contact/show">Voir les contacts</a></li>
                    <li><a href="/logout">Deconnexion</a></li>
                </ul>
            </div>
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
                <form action="../contact/update?id=<?= $user['id'] ?>" class="space-y-4" method="POST">
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
            

                    <fieldset class="fieldset">
                        <select class="select" name="role_id">
                            <option value="1" <?= ($user['role_id'] === 1) ? 'selected' : ''; ?>>Administrateur</option>
                            <option value="2" <?= ($user['role_id'] === 2) ? 'selected' : ''; ?>>Client</option>
                        </select>
                    </fieldset>

                    <fieldset class="fieldset w-full">
                        <label class="fieldset-label">
                            <?php if ($user['status'] === 'active') : ?>
                                <input type="checkbox" checked="checked" class="checkbox" name="status" />
                            <?php else : ?>
                                <input type="checkbox" class="checkbox" name="status" />
                            <?php endif; ?>
                            Activer maintent
                        </label>
                    </fieldset>
            
                    <button type="submit" class="btn btn-primary w-full">Mettre à jour</button>
                </form>
                <?php endif; ?>
                
                <a href="../contact/show" class="text-blue-500 mt-3 font-medium hover:text-blue-900">Voir la liste des contacts</a>
            </div>
          </div>
        </div>
    </div>
</body>
</html>