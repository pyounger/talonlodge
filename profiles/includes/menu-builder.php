<?php
$menuList = Array(
    0 => Array(
        'title' => 'Dashboard',
        'link' => 'index.php',
        'icon' => 'dashboard',
        'children' => Array()
    ),
    1 => Array(
        'title' => 'Management',
        'link' => '#',
        'icon' => 'indent',
        'children' => Array(
            0 => Array(
                'title' => 'Manage Packages',
                'link' => 'manage_packages.php',
                'icon' => 'user',
                'children' => Array(),
            ),
            1 => Array(
                'title' => 'Manage Bar Items',
                'link' => 'manage_barItems.php',
                'icon' => 'gears',
                'children' => Array()
            ),
            2 => Array(
                'title' => 'Activities',
                'link' => 'manage_activities.php',
                'icon' => 'eye',
                'children' => Array()
            ),
            3 => Array(
                'title' => 'Customer',
                'link' => 'manage_customers.php',
                'icon' => 'th',
                'children' => Array()
            ),
            4 => Array(
                'title' => 'Group',
                'link' => 'manage_group.php',
                'icon' => 'th-large',
                'children' => Array()
            ),
            5 => Array(
                'title' => 'Contact',
                'link' => 'contacts_manage.php',
                'icon' => 'user',
                'children' => Array()
            ),
            6 => Array(
                'title' => 'Question',
                'link' => 'manage_questions.php',
                'icon' => 'question',
                'children' => Array()
            ),
            7 => Array(
                'title' => 'Reservation',
                'link' => 'reservation.php',
                'icon' => 'credit-card',
                'children' => Array()
            ),
            8 => Array(
                'title' => 'Rooms',
                'link' => 'manage_rooms.php',
                'icon' => 'windows',
                'children' => Array()
            ),
            9 => Array(
                'title' => 'Fish Record',
                'link' => 'manage_fish.php',
                'icon' => 'gears',
                'children' => Array()
            ),
            10 => Array(
                'title' => 'Log Out',
                'link' => 'logout.php',
                'icon' => 'user',
                'children' => Array()
            )
        )
    )
);
function buildMenu($menuList) {
    $pieces = explode('/', $_SERVER['REQUEST_URI']);
    $page = end($pieces);
    foreach ($menuList as $val => $node) {
        $active = (strpos($page, $node['link']) !== false) ? "active" : " ";
        if (!empty($node['children'])) {
            echo " <li class='submenu " . $active . "'><a class='dropdown' href='" . $node['link'] . "' data-original-title='" . $node['title'] . "'><i class='fa fa-" . $node['icon'] . "'></i><span class='hidden-minibar'> " . $node['title'] . "  <span class='badge bg-primary pull-right'>" . count($node['children']) . "</span></span></a>";
        } else {
            echo "<li class='" . $active . "' ><a href='" . $node['link'] . "' data-original-title='" . $node['title'] . "'><i class='fa fa-" . $node['icon'] . "'></i><span class='hidden-minibar'> " . $node['title'] . "</span></a>";
        }
        if (!empty($node['children'])) {
            echo "<ul>";
            buildMenu($node['children']);
            echo "</ul>";
        }
        echo "</li>";
    }
}
?>