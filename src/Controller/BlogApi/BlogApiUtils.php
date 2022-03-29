<?php

namespace App\Controller\BlogApi;

/**
 *
 * Fetches data from fake data generators json
 */
function fetch_fake_data(): array
{
    $raw_data = file_get_contents(__DIR__ . '/fakePosts.json');
    $posts = json_decode($raw_data, true);
    return $posts;
}
