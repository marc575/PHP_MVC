<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/assets/logo.png" type="image/x-icon">
    <title>Home</title>
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
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a>Accueil</a></li>
                    <li><a>A Propos</a></li>
                    <li><a>FAQs</a></li>
                </ul>
            </div>
            <a class="text-xl text-blue-500 font-bold">Gestion Utilisateur</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a>Accueil</a></li>
                <li><a>A Propos</a></li>
                <li><a>FAQs</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="/auth/login" class="btn btn-primary">Se connecter</a>
        </div>
    </div>

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] === "active") : ?>
    <section class="container mx-auto mt-10">
    <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) : ?>
        <div class="overflow-x-auto rounded-box border border-base-200 bg-base-100">
            <table class="table">
                <!-- head -->
                <thead class="bg-base-200">
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>login</th>
                        <th>logout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($sessions)) : ?>
                        <?php foreach ($sessions as $session) : ?>
                            <tr>
                                <th><?= $session['id'] ?></th>
                                <td><?= $session['user_id'] ?></td>
                                <td> 
                                <?php 
                                    $login = new DateTime($session['login_time']);
                                    echo $login->format('H:i:s d/m/Y');
                                ?>
                                </td>
                                <td> 
                                <?php 
                                    if ($session['logout_time'] !== null) {
                                        $logout = new DateTime($session['logout_time']);
                                        echo $logout->format('H:i:s d/m/Y');
                                    }
                                ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 2) : ?>
        <div class="overflow-x-auto rounded-box border border-base-200 bg-base-100">
            <table class="table">
                <!-- head -->
                <thead class="bg-base-200">
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>login</th>
                        <th>logout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($sessionsUser)) : ?>
                        <?php foreach ($sessionsUser as $session) : ?>
                            <tr>
                                <th><?= $session['id'] ?></th>
                                <td><?= $session['user_id'] ?></td>
                                <td> 
                                <?php 
                                    $login = new DateTime($session['login_time']);
                                    echo $login->format('H:i:s d/m/Y');
                                ?>
                                </td>
                                <td> 
                                <?php 
                                    if ($session['logout_time'] !== null) {
                                        $logout = new DateTime($session['logout_time']);
                                        echo $logout->format('H:i:s d/m/Y');
                                    }
                                ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        </section>
        <?php endif; ?>
</body>
</html>