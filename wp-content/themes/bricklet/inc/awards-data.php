<?php
/**
 * Official Awards & Honors Data Helper (79 Awards: 2017 - 2025)
 * Source: https://perumnas.co.id/penghargaan/
 */

function bricklet_get_awards_data() {
    static $cached_awards = null;
    if ($cached_awards !== null) {
        return $cached_awards;
    }

    $json_file = get_template_directory() . '/inc/awards-data.json';
    if (file_exists($json_file)) {
        $content = file_get_contents($json_file);
        $data = json_decode($content, true);
        if (is_array($data)) {
            $cached_awards = $data;
            return $cached_awards;
        }
    }

    return array();
}
