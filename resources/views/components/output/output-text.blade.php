@php
    $text = $text ?: 'Не указано';

    echo clean(mb_strlen($text) >= $max
        ? mb_substr($text, 0, $max).'...'
        : $text);
@endphp
