<?php
namespace Vendor\Challenge2\controller;

use Vendor\Challenge3\core\AbstractController;
use Vendor\Challenge3\core\SessionManager;
use Vendor\Challenge3\core\Validator;
use Vendor\Challenge2\repository\PersonneRepository;

class SecurityController extends AbstractController {
    private PersonneRepository $personneRepository;
    
    public function __construct() {
        $this->personneRepository = new PersonneRepository();
    }
    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Validation
            Validator::isEmpty($login, 'login', 'Le login est requis');
            Validator::isEmpty($password, 'password', 'Le mot de passe est requis');
            
            if (Validator::isValid()) {
                $user = $this->personneRepository->selectByLoginAndPassword($login, $password);
                
                if ($user) {
                    // Connexion réussie
                    SessionManager::set('user_id', $user['id']);
                    SessionManager::set('user_login', $user['login']);
                    SessionManager::set('user_nom', $user['nom']);
                    SessionManager::set('user_matricule', $user['matricule']);
                    
                    header('Location: /commande');
                    exit;
                } else {
                    Validator::addError('auth', 'Login ou mot de passe incorrect');
                }
            }
        }
        
        $this->create();
    }
    
    public function index() {}
    public function edit() {}
    public function show() {}
    public function delete() {}
    
    public function create() {
        $this->Layout = 'LayoutConnexion.html.php';
        $errors = Validator::getErrors();
        $this->render('Security/connexion.html', compact('errors'));
    }
    
    public function logout() {
        SessionManager::destroy();
        header('Location: /');
        exit;
    }
}