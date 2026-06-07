<?php

declare(strict_types=1);

namespace Deezer;

/**
 * Central PHPStan type definitions for Deezer API response objects.
 *
 * Import in other files with:
 *   @phpstan-import-type TypeName from Types
 *
 * @phpstan-type ArtistMini object{
 *   id: int, name: string, link: string, share: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string,
 *   nb_album: int, nb_fan: int, radio: bool,
 *   tracklist: string, type: string
 * }
 *
 * @phpstan-type AlbumMini object{
 *   id: int, title: string, link: string,
 *   cover: string, cover_small: string, cover_medium: string,
 *   cover_big: string, cover_xl: string,
 *   release_date: string, tracklist: string, type: string
 * }
 *
 * @phpstan-type TrackObject object{
 *   id: int, readable: bool, title: string, title_short: string,
 *   title_version: string, isrc: string, link: string, share: string,
 *   duration: int, track_position: int, disk_number: int, rank: int,
 *   release_date: string, explicit_lyrics: bool,
 *   explicit_content_lyrics: int, explicit_content_cover: int,
 *   preview: string, bpm: float, gain: float,
 *   available_countries: string[], contributors: object[],
 *   md5_image: string, track_token: string,
 *   artist: ArtistMini, album: AlbumMini, type: string
 * }
 *
 * @phpstan-type AlbumObject object{
 *   id: int, title: string, upc: string, link: string, share: string,
 *   cover: string, cover_small: string, cover_medium: string,
 *   cover_big: string, cover_xl: string, md5_image: string,
 *   genre_id: int, genres: object{data: object[]},
 *   label: string, nb_tracks: int, duration: int, fans: int,
 *   release_date: string, record_type: string, available: bool,
 *   tracklist: string, explicit_lyrics: bool,
 *   explicit_content_lyrics: int, explicit_content_cover: int,
 *   contributors: object[], artist: ArtistMini,
 *   type: string, tracks: object{data: TrackObject[], checksum: string}
 * }
 *
 * @phpstan-type PlaylistObject object{
 *   id: int, title: string, description: string, duration: int,
 *   public: bool, is_loved_track: bool, collaborative: bool,
 *   nb_tracks: int, fans: int, link: string, share: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string, checksum: string,
 *   tracklist: string, creation_date: string,
 *   add_date: string, mod_date: string,
 *   md5_image: string, picture_type: string,
 *   creator: object{id: int, name: string, tracklist: string, type: string},
 *   type: string, tracks: object{data: TrackObject[], checksum: string}
 * }
 *
 * @phpstan-type RadioObject object{
 *   id: int, title: string, description: string, share: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string,
 *   tracklist: string, md5_image: string, type: string
 * }
 *
 * @phpstan-type GenreObject object{
 *   id: int, name: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string, type: string
 * }
 *
 * @phpstan-type PodcastObject object{
 *   id: int, title: string, description: string, available: bool,
 *   rating: int, fans: int, link: string, share: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string,
 *   md5_image: string, type: string
 * }
 *
 * @phpstan-type EpisodeObject object{
 *   id: int, title: string, description: string, available: bool,
 *   release_date: string, duration: int, link: string, share: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string, md5_image: string,
 *   podcast: object{id: int, title: string, type: string}, type: string
 * }
 *
 * @phpstan-type CommentObject object{
 *   id: int, text: string, date: int,
 *   author: object{id: int, name: string, tracklist: string, type: string},
 *   type: string
 * }
 *
 * @phpstan-type EditorialObject object{
 *   id: int, name: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string, type: string
 * }
 *
 * @phpstan-type ChartObject object{
 *   tracks: object{data: TrackObject[], total: int},
 *   albums: object{data: AlbumObject[], total: int},
 *   artists: object{data: ArtistMini[], total: int},
 *   playlists: object{data: PlaylistObject[], total: int},
 *   podcasts: object{data: PodcastObject[], total: int}
 * }
 *
 * @phpstan-type UserObject object{
 *   id: int, name: string, lastname: string, firstname: string,
 *   email: string, status: int, birthday: string,
 *   inscription_date: string, gender: string, link: string,
 *   picture: string, picture_small: string, picture_medium: string,
 *   picture_big: string, picture_xl: string,
 *   lang: string, is_kid: bool, explicit_content_level: string,
 *   explicit_content_levels_available: string[],
 *   tracklist: string, type: string
 * }
 *
 * @phpstan-type InfosObject object{
 *   country_iso: string, country: string, open: bool, pop: string,
 *   upload_token: string, upload_token_lifetime: int,
 *   user_token: string, hosts: object, ads: object,
 *   has_podcasts: bool, offers: object[]
 * }
 *
 * @phpstan-type Paginated object{data: object[], total: int, next: string|null}
 */
interface Types
{
}
