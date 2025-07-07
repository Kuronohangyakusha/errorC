<body class="bg-dark-green text-white min-h-screen">
    <main class="container mx-auto px-6 py-8">
        <!-- Welcome Message -->
        <?php if (isset($currentUser)): ?>
            <div class="mb-6">
                <p class="text-gray-300">Bienvenue, <span class="text-green-accent font-semibold"><?= htmlspecialchars($currentUser['nom']) ?></span></p>
                <div class="flex justify-end">
                    <a href="/logout" class="text-red-400 hover:text-red-300 text-sm">Se déconnecter</a>
                </div>
            </div>
        <?php endif; ?>
        
        <h2 class="text-3xl font-bold mb-8">Liste des commandes</h2>

        <!-- Filters -->
        <form method="GET" action="/commande" class="flex space-x-4 mb-8">
            <div class="relative">
                <select name="statut" class="bg-light-gray border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-green-accent">
                    <option value="">Filtrer par statut</option>
                    <option value="paye" <?= (isset($_GET['statut']) && $_GET['statut'] === 'paye') ? 'selected' : '' ?>>Payé</option>
                    <option value="impaye" <?= (isset($_GET['statut']) && $_GET['statut'] === 'impaye') ? 'selected' : '' ?>>Impayé</option>
                </select>
            </div>
            <button type="submit" class="bg-green-accent text-black px-4 py-2 rounded-lg font-semibold hover:bg-green-500">
                Filtrer
            </button>
            <a href="/commande" class="bg-gray-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-500">
                Réinitialiser
            </a>
        </form>

        <!-- Orders Table -->
        <div class="bg-light-gray rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-600">
                            <th class="pb-4 font-medium text-gray-300">Numero Commande</th>
                            <th class="pb-4 font-medium text-gray-300">Client</th>
                            <th class="pb-4 font-medium text-gray-300">Date</th>
                            <th class="pb-4 font-medium text-gray-300">Montant</th>
                            <th class="pb-4 font-medium text-gray-300">Status</th>
                            <th class="pb-4 font-medium text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($commandes) && !empty($commandes)): ?>
                            <?php foreach ($commandes as $commande): ?>
                                <tr class="border-b border-gray-700">
                                    <td class="py-4 font-medium"><?= htmlspecialchars($commande['numero_commande'] ?? '#COM_' . $commande['id']) ?></td>
                                    <td class="py-4 text-gray-300"><?= htmlspecialchars($commande['client_nom'] ?? 'Client inconnu') ?></td>
                                    <td class="py-4 text-gray-300"><?= htmlspecialchars(date('d/m/Y', strtotime($commande['date_commande'] ?? 'now'))) ?></td>
                                    <td class="py-4 text-gray-300"><?= htmlspecialchars(number_format($commande['facture_montant'] ?? 0, 0, ',', ' ')) ?> FCFA</td>
                                    <td class="py-4">
                                        <?php 
                                        $statut = $commande['facture_statut'] ?? 'impaye';
                                        $statutClass = $statut === 'paye' ? 'bg-green-600' : 'bg-gray-600';
                                        $statutText = $statut === 'paye' ? 'payé' : 'impayé';
                                        ?>
                                        <span class="<?= $statutClass ?> text-white px-3 py-1 rounded-full text-sm"><?= $statutText ?></span>
                                    </td>
                                    <td class="py-4">
                                        <a href="/commande/<?= $commande['id'] ?>" class="bg-green-accent text-black px-4 py-2 rounded-lg font-semibold hover:bg-green-500">
                                            voir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-400">
                                    Aucune commande trouvée
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2 mt-8">
                <button class="p-2 text-gray-400 hover:text-white">‹</button>
                <button class="w-8 h-8 bg-green-accent text-black rounded-full font-semibold">1</button>
                <button class="w-8 h-8 text-gray-400 hover:text-white">2</button>
                <button class="w-8 h-8 text-gray-400 hover:text-white">3</button>
                <button class="p-2 text-gray-400 hover:text-white">›</button>
            </div>
        </div>
    </main>
</body>