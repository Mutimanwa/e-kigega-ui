<?php
// config/menu_routes.php

// Structure de base des menus par rôle
$menu_structure = [
    'admin' => [
        'dashboard' => [
            'title' => 'Tableau de bord',
            'icon' => 'iconoir-report-columns',
            'path' => '/public/admin/index.php',
            'active' => ['index.php'],
            'permission' => 'admin'
        ],
        'produits' => [
            'title' => 'Gestion de produits',
            'icon' => 'iconoir-box',
            'path' => '/public/admin/produits/',
            'active' => ['produits', 'produits.php', 'produits/'],
            'permission' => 'admin'
        ],
        'depenses' => [
            'title' => 'Gestion des Dépenses',
            'icon' => 'iconoir-wallet',
            'path' => '/public/admin/depenses/',
            'active' => ['depenses', 'depenses.php', 'depenses/'],
            'permission' => 'admin'
        ],
        'clients' => [
            'title' => 'Gestion des clients',
            'icon' => 'iconoir-user-square',
            'path' => '/public/admin/clients/',
            'active' => ['clients', 'clients.php', 'clients/'],
            'permission' => 'admin'
        ],
        'ventes' => [
            'title' => 'Gestion des Ventes',
            'icon' => 'iconoir-shopping-bag',
            'path' => '/public/admin/ventes/',
            'active' => ['ventes', 'ventes.php', 'ventes/'],
            'permission' => 'admin'
        ],
        'stock' => [
            'title' => 'Gestion de stock',
            'icon' => 'iconoir-database',
            'path' => '/public/admin/stock/',
            'active' => ['stock', 'stock.php', 'stock/'],
            'permission' => 'admin'
        ],
        'formations' => [
            'title' => 'Formations',
            'icon' => 'iconoir-graduation-cap',
            'path' => '/public/admin/formations/',
            'active' => ['formations', 'formations.php', 'formations/'],
            'permission' => 'admin'
        ],
        'rapports' => [
            'title' => 'Rapports',
            'icon' => 'iconoir-chart-line',
            'path' => '/public/admin/rapports/',
            'active' => ['rapports', 'rapports.php', 'rapports/'],
            'permission' => 'admin'
        ],
        'ai' => [
            'title' => 'Intelligence Artificielle',
            'icon' => 'iconoir-robot',
            'path' => '/public/admin/ai/',
            'active' => ['ai', 'ai.php', 'ai/'],
            'permission' => 'admin'
        ],
        'utilisateurs' => [
            'title' => 'Utilisateurs',
            'icon' => 'iconoir-user-circle',
            'path' => '/public/admin/utilisateurs/',
            'active' => ['utilisateurs', 'utilisateurs.php', 'utilisateurs/'],
            'permission' => 'admin'
        ],
        'fournisseurs' => [
            'title' => 'Fournisseurs',
            'icon' => 'iconoir-truck',
            'path' => '#',
            'active' => ['fournisseurs'],
            'badge' => 'coming soon',
            'badge_class' => 'text-bg-blue',
            'permission' => 'admin'
        ]
    ],
    
    'comptable' => [
        'dashboard' => [
            'title' => 'Tableau de bord',
            'icon' => 'iconoir-report-columns',
            'path' => '/index.php',
            'active' => ['index.php'],
            'permission' => 'comptable'
        ],
        'depenses' => [
            'title' => 'Gestion des Dépenses',
            'icon' => 'iconoir-wallet',
            'path' => '/public/comptable/depenses/',
            'active' => ['depenses', 'depenses.php', 'depenses/'],
            'permission' => 'comptable'
        ],
        'produits' => [
            'title' => 'Produits',
            'icon' => 'iconoir-box',
            'path' => '/public/comptable/produits/',
            'active' => ['produits', 'produits.php', 'produits/'],
            'permission' => 'comptable'
        ],
        'ventes' => [
            'title' => 'Ventes',
            'icon' => 'iconoir-shopping-bag',
            'path' => '/public/comptable/ventes/',
            'active' => ['ventes', 'ventes.php', 'ventes/'],
            'permission' => 'comptable'
        ],
        'formations' => [
            'title' => 'Formations',
            'icon' => 'iconoir-graduation-cap',
            'path' => '/public/comptable/formations/',
            'active' => ['formations', 'formations.php', 'formations/'],
            'permission' => 'comptable'
        ]
    ],
    
    'responsable' => [
        'dashboard' => [
            'title' => 'Tableau de bord',
            'icon' => 'iconoir-report-columns',
            'path' => '/index.php',
            'active' => ['index.php'],
            'permission' => 'responsable'
        ],
        'produits' => [
            'title' => 'Gestion de produits',
            'icon' => 'iconoir-box',
            'path' => '/public/responsable/produits/',
            'active' => ['produits', 'produits.php', 'produits/'],
            'permission' => 'responsable'
        ],
        'ventes' => [
            'title' => 'Gestion des Ventes',
            'icon' => 'iconoir-shopping-bag',
            'path' => '/public/responsable/ventes/',
            'active' => ['ventes', 'ventes.php', 'ventes/'],
            'permission' => 'responsable'
        ],
        'formations' => [
            'title' => 'Formations',
            'icon' => 'iconoir-graduation-cap',
            'path' => '/public/responsable/formations/',
            'active' => ['formations', 'formations.php', 'formations/'],
            'permission' => 'responsable'
        ]
    ]
];

// Groupes de menus
$menu_groups = [
    [
        'label' => 'Tableau de bord',
        'items' => ['dashboard']
    ],
    [
        'label' => 'Opérations',
        'items' => ['produits', 'ventes', 'stock', 'depenses', 'clients', 'fournisseurs']
    ],
    [
        'label' => 'Administration',
        'items' => ['formations', 'rapports', 'ai'],
        'roles' => ['admin'] // Seulement pour admin
    ],
    [
        'label' => 'Système',
        'items' => ['utilisateurs'],
        'roles' => ['admin'] // Seulement pour admin
    ]
];

// Fonction pour détecter la page active
function is_active_page($active_patterns) {
    $current_uri = $_SERVER['REQUEST_URI'];
    $current_path = parse_url($current_uri, PHP_URL_PATH);
    
    foreach ($active_patterns as $pattern) {
        if (strpos($current_path, $pattern) !== false) {
            return true;
        }
    }
    
    // Vérifier aussi le script en cours
    $current_script = basename($_SERVER['PHP_SELF']);
    if (in_array($current_script, $active_patterns)) {
        return true;
    }
    
    // Vérifier pour l'index
    if ($current_script == 'index.php' && in_array('index.php', $active_patterns)) {
        return true;
    }
    
    return false;
}

// Récupérer le rôle de l'utilisateur (à adapter selon votre système d'authentification)
function get_user_role() {
    // Exemple: récupérer depuis la session
    ob_start();
    if (isset($_SESSION['user_role'])) {
        return $_SESSION['user_role'];
    }
    
    // Par défaut, retourner 'admin' pour le développement
    return 'admin';
}
?>