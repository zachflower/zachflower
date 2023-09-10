<?php

/**
 * Check if string is a valid URL
 * 
 * @param string|null $url
 * @return bool
 */
function isUrl(?string $url): bool
{
    if ( empty($url) ) {
        return false;
    }

    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

/**
 * Get environment variable or return default value
 * 
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env(string $key, $default = null): mixed
{
    return getenv($key) ?: $default;
}

/**
 * Print out a string wrapped in a sub tag and followed by a newline
 * and break
 * 
 * @param string $string
 * @return void
 */
function __(string $string): void
{
    $string = trim($string);
    $string = explode("\n", $string);

    foreach ( $string as $line ) {
        echo('<sub>' . PHP_EOL);
        echo ($line . PHP_EOL);
        echo('</sub>' . PHP_EOL);
        echo ('<br />' . PHP_EOL);
    }

    return;
}

/**
 * Pluralize a word based on a count
 * 
 * @param int $count
 * @param string $singular
 * @return string
 */
function pluralize(int $count, string $singular): string
{
    return $count === 1 ? $singular : $singular . 's';
}

/**
 * Pull in a GitHub profile
 * 
 * @param string $username
 * @return stdClass
 */
function getGitHubProfile(string $username): stdClass
{
    $url = 'https://api.github.com/users/' . $username;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'https://github.com/zachflower/zachflower');

    $response = curl_exec($ch);

    curl_close($ch);

    // handle errors
    if ( $response === false ) {
        throw new Exception('Unable to retrieve GitHub profile for ' . $username);
    }

    return json_decode($response);
}

/**
 * Pull in my RSS feed and grab the title and link for each entry
 * 
 * @param string $url
 * @param int $limit
 * @return array
 */
function getFeedEntries(string $url, int $limit = 5): array
{
    $rss = simplexml_load_file($url);
    $items = [];

    if ( $rss === false ) {
        return $items;
    }

    foreach ($rss->entry as $item) {
        $items[] = [
            'title' => (string) $item->title,
            'link' => (string) $item->link['href'],
        ];
    }

    return array_slice($items, 0, $limit);
}

/**
 * Render a template
 * 
 * @param string $template
 * @param array $data
 * @return string
 */
function render(string $template, array $data = []): string
{
    ob_start();

    extract($data);
    include $template;

    return ob_get_clean();
}

/**
 * Generate an SVG image from a template, save it to the filesystem,
 * and return an img tag pointing to the generated image
 * 
 * @param string $template
 * @return string
 */
function renderSVGToFile(string $destination, string $filename, array $data = [], bool $newline = true): string
{
    $filename = __DIR__ . '/templates/svg/' . $filename;

    // render the image
    $image = render($filename, $data);

    // add the .svg extension
    $destination .= '.svg';

    // prepend the destination with the path to the public/svg directory
    $destination = 'public/svg/' . $destination;

    // save the image to the filesystem
    file_put_contents(__DIR__ . '/../' . $destination, $image);

    // return an img tag pointing to the generated image
    return '<picture><img src="' . $destination . '" /></picture>' . ($newline ? '<br />' . PHP_EOL : '');
}