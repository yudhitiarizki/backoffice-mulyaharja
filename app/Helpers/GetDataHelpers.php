<?php


namespace App\Helpers;

use App\Models\CompanyProfiles;

class GetDataHelpers
{
    public static function getYouTubeVideoId($url)
    {
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        if (preg_match($pattern, $url, $matches)) return $matches[1];
        return null;
    }

    public static function parseAndCombineTags($text)
    {
        $array = json_decode($text, true);

        if (json_last_error() !== JSON_ERROR_NONE) return null;

        $values = array_column($array, 'value');
        $result = implode('|', $values);

        return $result;
    }

    public static function parseTags($text)
    {
        return $text ? implode(', ', explode('|', $text)) : '';
    }

    public static function get_logo()
    {
        $data = CompanyProfiles::first();
        return $data?->logo;
    }

    public static function get_title()
    {
        $data = CompanyProfiles::first();
        return $data?->name;
    }

    public static function get_public_path($image)
    {
        $url = url('/');

        $path = explode($url . '/', $image);
        return count($path) > 1 ? public_path($path[1]) : null;
    }
}
