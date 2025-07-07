<?php
namespace Vendor\Challenge2\controller;

use Vendor\Challenge3\core\AbstractController;
use Vendor\Challenge3\core\SessionManager;
use Vendor\Challenge2\repository\CommandeRepository;

class CommandeController extends AbstractController {
    private CommandeRepository $commandeRepository;
    
    public function __construct() {
        $this->commandeRepository = new CommandeRepository();
    }
    
    public function index() {
        SessionManager::requireAuth();
        
        $filter = [];
        if (isset($_GET['statut']) && !empty($_GET['statut'])) {
            $filter['statut'] = $_GET['statut'];
        }
        if (isset($_GET['client_id']) && !empty($_GET['client_id'])) {
            $filter['client_id'] = $_GET['client_id'];
        }
        
        if (!empty($filter)) {
            $commandes = $this->commandeRepository->selectBy($filter);
        } else {
            $commandes = $this->commandeRepository->selectAll();
        }
        
        $currentUser = SessionManager::getCurrentUser();
        $this->render('commande/listerCommande', compact('commandes', 'currentUser'));
    }
    
    public function edit() {}
    public function show() {}
    public function delete() {}
    
    public function create() {
        SessionManager::requireAuth();
        $currentUser = SessionManager::getCurrentUser();
        $this->render('commande/listerCommande', compact('currentUser'));
    }

    public function store() {
        SessionManager::requireAuth();
        $currentUser = SessionManager::getCurrentUser();
        $this->render('commande/form', compact('currentUser'));
    }
}