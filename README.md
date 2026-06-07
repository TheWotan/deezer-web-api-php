# Deezer Web API PHP

[![CI](https://github.com/TheWotan/deezer-web-api-php/actions/workflows/ci.yml/badge.svg)](https://github.com/TheWotan/deezer-web-api-php/actions/workflows/ci.yml)
[![Coverage Status](https://coveralls.io/repos/github/TheWotan/deezer-web-api-php/badge.svg?branch=master)](https://coveralls.io/github/TheWotan/deezer-web-api-php?branch=master)

A PHP wrapper for the [Deezer Web API](https://developers.deezer.com/api). Supports public and authenticated requests, automatic retry on rate limit, and PHPStan-compatible return types.

**Requirements:** PHP 7.4+, ext-curl

---

## Installation

```bash
composer require thewotan/deezer-web-api-php
```

---

## Quick Start

### Public requests (no auth required)

Most read endpoints work without an access token:

```php
use Deezer\DeezerAPI;

$deezer = new DeezerAPI();

// Album
$album = $deezer->album->get(302127);
echo $album->title; // "Discovery"

// Artist
$artist = $deezer->artist->get(27);
echo $artist->name; // "Daft Punk"

// Track
$track = $deezer->track->get(3135556);
echo $track->title; // "Harder, Better, Faster, Stronger"

// Search
$results = $deezer->search->search('Daft Punk');
foreach ($results->data as $track) {
    echo $track->title . "\n";
}

// Charts
$charts = $deezer->chart->get(0);
echo $charts->tracks->data[0]->title;
```

### Authenticated requests

User-specific endpoints require an access token obtained via OAuth 2.0:

```php
use Deezer\Session;
use Deezer\DeezerAPI;

// 1. Initialize a session
$session = new Session(
    app_id: 'YOUR_APP_ID',
    secret: 'YOUR_APP_SECRET',
    redirect_uri: 'https://yourapp.com/callback'
);

// 2. Redirect the user to the Deezer authorization page
$authorizeUrl = $session->getAuthorizeUrl([
    'perms' => 'basic_access,email,offline_access',
]);
header('Location: ' . $authorizeUrl);

// 3. Handle the callback (after Deezer redirects back)
// $_GET['code'] is the authorization code
$session->requestAccessToken($_GET['code']);

// 4. Use the API
$deezer = new DeezerAPI();
$deezer->setAccessToken($session->getAccessToken());

$me = $deezer->user->me();
echo $me->name;

$myPlaylists = $deezer->user->getPlaylists();
foreach ($myPlaylists->data as $playlist) {
    echo $playlist->title . "\n";
}
```

---

## Resources

| Resource | Auth | Methods |
|---|---|---|
| `album` | none | `get`, `getComments`, `getFans`, `getTracks` |
| `artist` | none | `get`, `getTop`, `getAlbums`, `getComments`, `getFans`, `getRelated`, `getRadio`, `getPlaylists` |
| `chart` | none | `get`, `getTracks`, `getAlbums`, `getArtists`, `getPlaylists`, `getPodcasts` |
| `comment` | none / required | `get` (public), `delete` (auth) |
| `editorial` | none | `list`, `get`, `getSelection`, `getCharts`, `getReleases` |
| `episode` | required | `get` |
| `genre` | none | `list`, `get`, `getPodcasts`, `getArtists`, `getRadios` |
| `playlist` | none / required | `get`, `getComments`, `getFans`, `getTracks`, `getRadio` (public); `create`, `delete`, `addTracks`, `removeTracks` (auth) |
| `podcast` | required | `get`, `getEpisodes` |
| `radio` | none | `list`, `get`, `getGenres`, `getTop`, `getLists`, `getTracks` |
| `search` | none / required | `search`, `track`, `album`, `artist`, `playlist`, `radio`, `user`, `podcast` (public); `history` (auth) |
| `track` | none | `get` |
| `user` | none / required | `get` (public); `me`, `getAlbums`, `getPlaylists`, and more (auth) |

---

## Options

```php
$deezer = new DeezerAPI([
    'auto_retry' => true,   // retry requests on rate limit (HTTP 429)
]);
```

### auto_retry

When `auto_retry => true`, the library automatically retries a request after receiving HTTP 429, using progressive delays: 1, 2, 5, 10, 30, 60 seconds. After 6 attempts it throws `DeezerRateLimitException`.

```php
use Deezer\DeezerRateLimitException;

try {
    $album = $deezer->album->get(302127);
} catch (DeezerRateLimitException $e) {
    echo "Rate limit. Retry after: " . $e->getRetryAfter() . "s";
}
```

---

## IDE Type Support

All methods are annotated with inline `@return object{...}` shapes. IDEs (PhpStorm, VS Code + Intelephense) provide field-level autocompletion for API responses out of the box, with no plugins required.

---

## Contributing
Contributions are more than welcome! See [CONTRIBUTING.md](/CONTRIBUTING.md) for more info.

## License
MIT license. Please see [LICENSE.md](LICENSE.md) for more info.
