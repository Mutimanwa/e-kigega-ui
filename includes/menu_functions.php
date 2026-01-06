<?php

// Inclure le fichier de configuration
require_once CONFIG_PATH . 'menu_routes.php';

// Fonction pour générer le menu selon le rôle
function generate_menu($role = null) {
    global $menu_structure, $menu_groups;
    
    if (!$role) {
        $role = get_user_role();
    }
    
    // Vérifier si le rôle existe
    if (!isset($menu_structure[$role])) {
        $role = 'admin'; // Rôle par défaut
    }
    
    $menu_html = '';
    $current_role_menu = $menu_structure[$role];
    
    // Générer chaque groupe
    foreach ($menu_groups as $group_index => $group) {
        $group_items = [];
        
        // Filtrer les items par rôle si spécifié
        if (isset($group['roles']) && !in_array($role, $group['roles'])) {
            continue;
        }
        
        // Collecter les items du groupe qui existent pour ce rôle
        foreach ($group['items'] as $item_key) {
            if (isset($current_role_menu[$item_key])) {
                $group_items[$item_key] = $current_role_menu[$item_key];
            }
        }
        
        // Si le groupe a des items, l'afficher
        if (!empty($group_items)) {
            // Ajouter le label du groupe (sauf pour le premier)
            if ($group_index > 0) {
                $menu_html .= '<li class="menu-label mt-2">';
                $menu_html .= '<small class="label-border">';
                $menu_html .= '<div class="border_left hidden-xs"></div>';
                $menu_html .= '<div class="border_right"></div>';
                $menu_html .= '</small>';
                $menu_html .= '<span>' . htmlspecialchars($group['label']) . '</span>';
                $menu_html .= '</li>';
            }
            
            // Ajouter les items du menu
            foreach ($group_items as $item_key => $item) {
                $is_active = is_active_page($item['active']) ? 'active' : '';
                $badge_html = '';
                
                // Ajouter un badge si spécifié
                if (isset($item['badge'])) {
                    $badge_class = isset($item['badge_class']) ? $item['badge_class'] : 'text-bg-pink';
                    $badge_html = '<span class="badge ' . $badge_class . ' ms-auto">' . htmlspecialchars($item['badge']) . '</span>';
                }
                
                $menu_html .= '<li class="nav-item">';
                $menu_html .= '<a class="nav-link ' . $is_active . '" href="' . BASE_URL . ltrim($item['path'], '/') . '">';
                $menu_html .= '<i class="' . $item['icon'] . ' menu-icon"></i>';
                $menu_html .= '<span>' . htmlspecialchars($item['title']) . '</span>';
                $menu_html .= $badge_html;
                $menu_html .= '</a>';
                $menu_html .= '</li>';
            }
        }
    }
    
    return $menu_html;
}

// Fonction pour obtenir le titre de la page active
function get_active_page_title() {
    global $menu_structure;
    $role = get_user_role();
    
    if (!isset($menu_structure[$role])) {
        return APP_NAME;
    }
    
    foreach ($menu_structure[$role] as $item) {
        if (is_active_page($item['active'])) {
            return $item['title'] . ' - ' . APP_NAME;
        }
    }
    
    return APP_NAME;
}

// Fonction pour obtenir le chemin correct selon le rôle
function get_role_path($module) {
    $role = get_user_role();
    $base_paths = [
        'admin' => 'public/admin/',
        'comptable' => 'public/comptable/',
        'responsable' => 'public/responsable/'
    ];
    
    if (isset($base_paths[$role])) {
        return BASE_URL . $base_paths[$role] . $module . '/';
    }
    
    return BASE_URL . 'public/admin/' . $module . '/'; // Par défaut
}
?>