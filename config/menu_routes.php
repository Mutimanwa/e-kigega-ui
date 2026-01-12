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
        'gestion_depenses' => [
            'title' => 'Gestion des Dépenses',
            'icon' => 'iconoir-wallet',
            'path' => '/public/admin/depenses/',
            'active' => ['depenses', 'depenses.php', 'depenses/'],
            'permission' => 'admin'
        ],
        'gestion_produits' => [
            'title' => 'Gestion de Produits',
            'icon' => 'iconoir-box',
            'type' => 'collapse',
            'id' => 'sidebarProduits',
            'items' => [
                'categories_produits' => [
                    'title' => 'Catégories',
                    'path' => '/public/admin/produits/categories.php',
                    'active' => ['produits/categories.php', 'produits/categories', 'categories-produits']
                ],
                'produits' => [
                    'title' => 'Produits',
                    'path' => '/public/admin/produits/',
                    'active' => ['produits', 'produits.php', 'produits/']
                ],
            ],
            'active' => ['produits', 'produits.php', 'produits/', 'produits/categories.php', 'produits/categories'],
            'permission' => 'admin'
        ],
        'clients' => [
            'title' => 'Gestion des Clients',
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
            'title' => 'Gestion de Stock',
            'icon' => 'iconoir-database',
            'path' => '/public/admin/stock/',
            'active' => ['stock', 'stock.php', 'stock/'],
            'permission' => 'admin'
        ],
        'formations' => [
            'title' => 'Gestion des Formations',
            'icon' => 'iconoir-graduation-cap',
            'path' => '/public/admin/formations/',
            'active' => ['formations', 'formations.php', 'formations/'],
            'permission' => 'admin'
        ],
        'rapports' => [
            'title' => 'Gestion des Rapports',
            'icon' => 'iconoir-stats-report',
            'path' => '/public/admin/rapports/',
            'active' => ['rapports', 'rapports.php', 'rapports/'],
            'permission' => 'admin'
        ],
        'ai' => [
            'title' => 'Outils AI',
            'icon' => 'iconoir-spark',
            'path' => '#',
            'active' => ['ai', 'ai.php', 'ai/'],
            'badge' => 'coming soon',
            'badge_class' => 'text-bg-blue',
            'permission' => 'admin'
        ],
        'utilisateurs' => [
            'title' => 'Gestion des Utilisateurs',
            'icon' => 'iconoir-user-circle',
            'path' => '/public/admin/utilisateurs/',
            'active' => ['utilisateurs', 'utilisateurs.php', 'utilisateurs/'],
            'permission' => 'admin'
        ],
         'log de connexion' => [
            'title' => 'Log de connexion',
            'icon' => 'iconoir-book',
            'path' => '/public/admin/logs/',
            'active' => ['logs', 'logs.php', 'logs/'],
            'permission' => 'admin'
        ],
        'fournisseurs' => [
            'title' => 'Gestion des Fournisseurs',
            'icon' => 'iconoir-truck',
            'path' => '/public/admin/fournisseurs/',
            'active' => ['fournisseurs', 'fournisseurs.php', 'fournisseurs/'],
            'permission' => 'admin'
        ]
    ],
    
    'comptable' => [
        'dashboard' => [
            'title' => 'Tableau de bord',
            'icon' => 'iconoir-report-columns',
            'path' => '/public/comptable/index.php',
            'active' => ['index.php'],
            'permission' => 'comptable'
        ],
           'gestion_depenses' => [
            'title' => 'Gestion des Dépenses',
            'icon' => 'iconoir-wallet',
            'path' => '/public/comptable/depenses/',
            'active' => ['depenses', 'depenses.php', 'depenses/'],
            'permission' => 'comptable'
        ],
        'gestion_produits' => [
            'title' => 'Produits',
            'icon' => 'iconoir-box',
            'type' => 'collapse',
            'id' => 'sidebarProduits',
            'items' => [
                'produits' => [
                    'title' => 'Produits',
                    'path' => '/public/comptable/produits/',
                    'active' => ['produits', 'produits.php', 'produits/']
                ],
                'categories_produits' => [
                    'title' => 'Catégories',
                    'path' => '/public/comptable/produits/categories.php',
                    'active' => ['produits/categories.php', 'produits/categories', 'categories-produits']
                ]
            ],
            'active' => ['produits', 'produits.php', 'produits/', 'produits/categories.php', 'produits/categories'],
            'permission' => 'comptable'
        ],
        'ventes' => [
            'title' => 'Gestion des Ventes',
            'icon' => 'iconoir-shopping-bag',
            'path' => '/public/comptable/ventes/',
            'active' => ['ventes', 'ventes.php', 'ventes/'],
            'permission' => 'comptable'
        ],
        'formations' => [
            'title' => 'Gestion des Formations',
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
            'path' => '/public/responsable/index.php',
            'active' => ['index.php'],
            'permission' => 'responsable'
        ],
        'gestion_produits' => [
            'title' => 'Gestion de Produits',
            'icon' => 'iconoir-box',
            'type' => 'collapse',
            'id' => 'sidebarProduits',
            'items' => [
                'produits' => [
                    'title' => 'Produits',
                    'path' => '/public/responsable/produits/',
                    'active' => ['produits', 'produits.php', 'produits/']
                ],
                'categories_produits' => [
                    'title' => 'Catégories',
                    'path' => '/public/responsable/produits/categories.php',
                    'active' => ['produits/categories.php', 'produits/categories', 'categories-produits']
                ]
            ],
            'active' => ['produits', 'produits.php', 'produits/', 'produits/categories.php', 'produits/categories'],
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
            'title' => 'Gestion desFormations',
            'icon' => 'iconoir-graduation-cap',
            'path' => '/public/responsable/formations/',
            'active' => ['formations', 'formations.php', 'formations/'],
            'permission' => 'responsable'
        ]
    ]
];

// Groupes de menus (inchangé)
$menu_groups = [
    [
        'label' => 'Tableau de bord',
        'items' => ['dashboard']
    ],
    [
        'label' => 'Opérations',
        'items' => ['gestion_produits', 'ventes', 'stock', 'gestion_depenses', 'clients', 'fournisseurs']
    ],
    [
        'label' => 'Administration',
        'items' => ['formations', 'rapports', 'ai'],
        'roles' => ['admin']
    ],
    [
        'label' => 'Système',
        'items' => ['utilisateurs', 'log de connexion'],
        'roles' => ['admin']
    ]
];

// Fonction pour détecter la page active (version optimisée)
function is_active_page($active_patterns) {
    if (!is_array($active_patterns)) {
        return false;
    }
    
    $current_uri = $_SERVER['REQUEST_URI'];
    $current_path = parse_url($current_uri, PHP_URL_PATH);
    
    // Nettoyer le chemin actuel
    $current_path = ltrim($current_path, '/');
    
    foreach ($active_patterns as $pattern) {
        // Si c'est un fichier PHP simple
        if ($pattern == basename($_SERVER['PHP_SELF'])) {
            return true;
        }
        
        // Si le chemin contient le pattern (chemin complet)
        if (strpos($current_path, $pattern) !== false) {
            return true;
        }
        
        // Pour les chemins avec ou sans slash
        if (strpos($current_path, rtrim($pattern, '/')) !== false || 
            strpos($current_path, rtrim($pattern, '/') . '/') !== false) {
            return true;
        }
    }
    
    return false;
}

// Fonction pour vérifier si un menu collapse doit être ouvert
function should_collapse_be_open($item_active_patterns, $current_menu_items = []) {
    // Vérifier si le menu principal est actif
    if (is_active_page($item_active_patterns)) {
        return true;
    }
    
    // Vérifier si un des sous-menus est actif
    foreach ($current_menu_items as $sub_item) {
        if (is_active_page($sub_item['active'])) {
            return true;
        }
    }
    
    return false;
}

// Récupérer le rôle de l'utilisateur
function get_user_role() {
    ob_start();
    if (isset($_SESSION['user_role'])) {
        return $_SESSION['user_role'];
    }
    
    // Pour le développement, déterminer le rôle par l'URL
    $current_url = $_SERVER['REQUEST_URI'];
    if (strpos($current_url, '/comptable/') !== false) {
        return 'comptable';
    } elseif (strpos($current_url, '/responsable/') !== false) {
        return 'responsable';
    }
    
    return 'admin';
}
?>