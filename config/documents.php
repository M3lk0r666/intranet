<?php

return [
    'categories' => [
        'general' => [
            'name' => 'General',
            'color' => '#6c757d',
            'icon' => 'las la-folder',
            'description' => 'Documentos generales'
        ],
        'tutoriales' => [
            'name' => 'Tutoriales',
            'color' => '#0d6efd',
            'icon' => 'las la-graduation-cap',
            'description' => 'Guías y tutoriales'
        ],
        'manuales' => [
            'name' => 'Manuales',
            'color' => '#198754',
            'icon' => 'las la-book-open',
            'description' => 'Manuales de usuario y técnicos'
        ],
        'formatos' => [
            'name' => 'Formatos',
            'color' => '#6f42c1',
            'icon' => 'las la-file-alt',
            'description' => 'Formatos y plantillas'
        ],
        'contratos' => [
            'name' => 'Contratos',
            'color' => '#fd7e14',
            'icon' => 'las la-file-signature',
            'description' => 'Contratos y acuerdos'
        ],
        'reportes' => [
            'name' => 'Reportes',
            'color' => '#dc3545',
            'icon' => 'las la-chart-bar',
            'description' => 'Reportes y análisis'
        ],
        'presentaciones' => [
            'name' => 'Presentaciones',
            'color' => '#ffc107',
            'icon' => 'las la-file-powerpoint',
            'description' => 'Presentaciones y slides'
        ],
        'Guias On Site' => [
            'name' => 'Guias on Site',
            'color' => '#e542cd',
            'icon' => 'las la-file-alt',
            'description' => 'Guias de apoyo'
        ],
        'otros' => [
            'name' => 'Otros',
            'color' => '#20c997',
            'icon' => 'las la-archive',
            'description' => 'Otras categorías'
        ],
    ],
    
    'max_file_size' => 10240, // 10MB en KB
    'allowed_extensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'zip', 'rar'],
    'storage_path' => 'documents',
];