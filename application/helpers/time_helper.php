
<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('time_ago')) {
    function time_ago($timestamp) {
        $current_time = time();
        $timestamp = strtotime($timestamp);

        $time_difference = $current_time - $timestamp;
        $seconds = $time_difference;
        $minutes = round($seconds / 60);
        $hours = round($seconds / 3600);
        $days = round($seconds / 86400);
        $weeks = round($seconds / 604800);
        $months = round($seconds / 2629440);
        $years = round($seconds / 31553280);

        if ($seconds <= 60) {
            return "Just Now";
        } elseif ($minutes <= 60) {
            return $minutes == 1 ? "one minute ago" : "$minutes minutes ago";
        } elseif ($hours <= 24) {
            return $hours == 1 ? "an hour ago" : "$hours hrs ago";
        } elseif ($days <= 7) {
            return $days == 1 ? "yesterday" : "$days days ago";
        } elseif ($weeks <= 4.3) {
            return $weeks == 1 ? "a week ago" : "$weeks weeks ago";
        } elseif ($months <= 12) {
            return $months == 1 ? "a month ago" : "$months months ago";
        } else {
            return $years == 1 ? "one year ago" : "$years years ago";
        }
    }
}
