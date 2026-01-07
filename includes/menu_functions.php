<?php
// includes/menu_functions.php

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
                $menu_html .= generate_menu_item($item, $item_key);
            }
        }
    }
    
    return $menu_html;
}

// Fonction pour générer un item de menu
function generate_menu_item($item, $item_key) {
    $html = '';
    
    // Vérifier si c'est un menu collapse
    if (isset($item['type']) && $item['type'] === 'collapse') {
        $is_active = should_collapse_be_open($item['active'], $item['items'] ?? []) ? 'active' : '';
        $is_expanded = should_collapse_be_open($item['active'], $item['items'] ?? []) ? 'true' : 'false';
        $show_class = should_collapse_be_open($item['active'], $item['items'] ?? []) ? 'show' : '';
        
        $badge_html = '';
        if (isset($item['badge'])) {
            $badge_class = isset($item['badge_class']) ? $item['badge_class'] : 'text-bg-pink';
            $badge_html = '<span class="badge ' . $badge_class . ' ms-auto">' . htmlspecialchars($item['badge']) . '</span>';
        }
        
        $html .= '<li class="nav-item">';
        $html .= '<a class="nav-link ' . $is_active . '" href="#' . $item['id'] . '" data-bs-toggle="collapse" role="button"';
        $html .= ' aria-expanded="' . $is_expanded . '" aria-controls="' . $item['id'] . '">';
        $html .= '<i class="' . $item['icon'] . ' menu-icon"></i>';
        $html .= '<span>' . htmlspecialchars($item['title']) . '</span>';
        $html .= $badge_html;
        $html .= '</a>';
        
        // Sous-menus
        $html .= '<div class="collapse ' . $show_class . '" id="' . $item['id'] . '">';
        $html .= '<ul class="nav flex-column">';
        
        foreach ($item['items'] as $sub_key => $sub_item) {
            $sub_active = is_active_page($sub_item['active']) ? 'active' : '';
            $html .= '<li class="nav-item">';
            $html .= '<a class="nav-link ' . $sub_active . '" href="' . BASE_URL . ltrim($sub_item['path'], '/') . '">';
            $html .= htmlspecialchars($sub_item['title']);
            $html .= '</a>';
            $html .= '</li>';
        }
        
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</li>';
    } else {
        // Menu simple
        $is_active = is_active_page($item['active']) ? 'active' : '';
        $badge_html = '';
        
        if (isset($item['badge'])) {
            $badge_class = isset($item['badge_class']) ? $item['badge_class'] : 'text-bg-pink';
            $badge_html = '<span class="badge ' . $badge_class . ' ms-auto">' . htmlspecialchars($item['badge']) . '</span>';
        }
        
        $html .= '<li class="nav-item">';
        $html .= '<a class="nav-link ' . $is_active . '" href="' . BASE_URL . ltrim($item['path'], '/') . '">';
        $html .= '<i class="' . $item['icon'] . ' menu-icon"></i>';
        $html .= '<span>' . htmlspecialchars($item['title']) . '</span>';
        $html .= $badge_html;
        $html .= '</a>';
        $html .= '</li>';
    }
    
    return $html;
}

// Fonction pour obtenir le titre de la page active
function get_active_page_title() {
    global $menu_structure;
    $role = get_user_role();
    
    if (!isset($menu_structure[$role])) {
        return APP_NAME;
    }
    
    foreach ($menu_structure[$role] as $item) {
        // Vérifier les menus simples
        if (is_active_page($item['active'])) {
            return $item['title'] . ' - ' . APP_NAME;
        }
        
        // Vérifier les sous-menus des collapses
        if (isset($item['type']) && $item['type'] === 'collapse' && isset($item['items'])) {
            foreach ($item['items'] as $sub_item) {
                if (is_active_page($sub_item['active'])) {
                    return $sub_item['title'] . ' - ' . $item['title'] . ' - ' . APP_NAME;
                }
            }
        }
    }
    
    return APP_NAME;
}

// Fonction pour obtenir le chemin du breadcrumb
function get_breadcrumb_items() {
    global $menu_structure;
    $role = get_user_role();
    $breadcrumbs = [];
    
    if (!isset($menu_structure[$role])) {
        return $breadcrumbs;
    }
    
    // Toujours ajouter le dashboard
    $breadcrumbs[] = [
        'title' => 'Tableau de bord',
        'url' => BASE_URL . 'index.php'
    ];
    
    foreach ($menu_structure[$role] as $item) {
        // Vérifier les menus simples
        if (is_active_page($item['active'])) {
            if ($item['title'] !== 'Tableau de bord') {
                $breadcrumbs[] = [
                    'title' => $item['title'],
                    'url' => BASE_URL . ltrim($item['path'], '/')
                ];
            }
            return $breadcrumbs;
        }
        
        // Vérifier les sous-menus des collapses
        if (isset($item['type']) && $item['type'] === 'collapse' && isset($item['items'])) {
            foreach ($item['items'] as $sub_item) {
                if (is_active_page($sub_item['active'])) {
                    $breadcrumbs[] = [
                        'title' => $item['title'],
                        'url' => '#'
                    ];
                    $breadcrumbs[] = [
                        'title' => $sub_item['title'],
                        'url' => BASE_URL . ltrim($sub_item['path'], '/')
                    ];
                    return $breadcrumbs;
                }
            }
        }
    }
    
    return $breadcrumbs;
}
?>