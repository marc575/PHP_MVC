<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/assets/logo.png" type="image/x-icon">
    <title>Show Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
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
    <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) : ?>
    <section class="container mx-auto mt-10">
        <div class="flex justify-between items-center gap-10 mt-5 mb-5">
            <h1 class="text-xl font-bold mb-5">Listes des clients</h1>
            <?php if (isset($_SESSION['status']) && $_SESSION['status'] === "active") : ?>
            <a href="../auth/register" class="btn btn-primary">Ajouter un client</a>
            <?php endif; ?>
        </div>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] === "active") : ?>
        <div class="overflow-x-auto rounded-box border border-base-200 bg-base-100">
            <table class="table">
                <!-- head -->
                <thead class="bg-base-200">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($users)) : ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th><?= $user['id'] ?></th>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['role_id'] ?></td>
                                <td><?= $user['status'] ?></td>
                                <td>
                                    <a href="../contact/update?id=<?php echo($user['id']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="../contact/delete?id=<?php echo($user['id']); ?>"><i class="fa-solid fa-trash"></i></a>
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