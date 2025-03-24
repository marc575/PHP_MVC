<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/assets/logo.png" type="image/x-icon">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
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
                                Contats
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
            <a href="/" class="text-xl text-blue-900 font-bold">Gestion Utilisateurs</a>
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
                                Contats
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
    
    <div
        class="hero min-h-screen"
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-xl">
                <h1 class="mb-5 text-5xl font-bold">Bienvenue !</h1>
                <p class="mb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis vero tenetur, autem culpa reiciendis 
                dolorem quis laboriosam odio obcaecati exercitationem iure vitae et aliquam eum similique error ut laudantium sed.
                </p>
            </div>
        </div>
    </div>
</body>
</html>