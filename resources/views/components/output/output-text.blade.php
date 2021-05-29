@php
    $text = $text ?: 'Не указано';

    echo mb_strlen($text) >= $max
        ? mb_substr($text, 0, $max).'...'
        : $text;
@endphp
