<!DOCTYPE html>
<html lang="fr" defaut-theme="light">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../public/assets/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content">
          <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <div class="card-body py-10">
                <form action="../auth/login" class="space-y-5" method="POST">
                    <?php if (isset($errors)) : ?>
                        <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></g></svg>
                        <input type="email" name="email" required placeholder="exemple@mail.com" required/>
                    </label>
                    <div class="validator-hint hidden">Entrez une adresse email valide</div>
            
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle></g></svg>
                        <input type="password" required name="password" placeholder="Mot de passe" minlength="8"title="Mot de passe" />
                    </label>

                    <a href="" class="text-blue-500 font-medium text-end">Mot de passe oublié ?</a>
                    <button type="submit" class="btn btn-primary w-full my-2">Se connecter</button>
                </form>
            </div>
          </div>
        </div>
    </div>   
</body>
</html>