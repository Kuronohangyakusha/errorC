<header class="bg-dark-gray border-b border-gray-700 px-6 py-4">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-green-accent rounded-full flex items-center justify-center">
                <span class="text-xs font-bold text-black">⚗</span>
            </div>
            <h1 class="text-lg font-semibold">L'alchimiste du code</h1>
        </div>
        <nav class="flex space-x-8 items-center">
            <a href="/commande" class="text-white font-semibold">Commandes</a>
            <a href="/form" class="text-white font-semibold">Enregistrer commande</a>
            <a href="#" class="text-gray-300 hover:text-white">Clients</a>
            <a href="#" class="text-gray-300 hover:text-white">Produits</a>
            <?php if (isset($currentUser)): ?>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-300 text-sm"><?= htmlspecialchars($currentUser['nom']) ?></span>
                    <div class="w-8 h-8 bg-gray-600 rounded-full"></div>
                    <a href="/logout" class="text-red-400 hover:text-red-300 text-sm">Déconnexion</a>
                </div>
            <?php endif; ?>
            <a href="/form" class="bg-green-accent text-black p-2 rounded-full hover:bg-green-500">
                <span class="text-lg">+</span>
            </a>
        </nav>
    </div>
</header>