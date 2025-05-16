<?php
// searsh.php

$searches = array('patient', 'medicine', 'facture', 'supplies', 'officials', 'nurse', 'noticeboard', 'timetable', 'syllabus', 'notes', 'marks', 'bus service', 'settings');
$pages = array_map(fn($page) => $page . '.php', $searches);

// Créer les alias dynamiques (3 premières lettres)
$aliases = [];
foreach ($searches as $item) {
    $abbr = substr($item, 0, 3);
    $aliases[$abbr] = $item;
}

if (isset($_POST['search'])) {
    $search = trim($_POST['search']);
    $search = strtolower($search);

    // Vérifier si le search est une abréviation
    if (isset($aliases[$search])) {
        $search = $aliases[$search];
    }

    foreach ($searches as $index => $item) {
        if (str_contains($item, $search)) {
            header('Location: ' . $pages[$index]);
            exit;
        }
    }

    echo "Page non trouvée.";
} else {
    echo "Aucune recherche effectuée.";
}
