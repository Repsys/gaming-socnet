@php
    $text = $text ?: 'Не указано';

    if (isset($max)) {
        $text = mb_strlen($text) >= $max
            ? mb_substr($text, 0, $max).'...'
            : $text;
    }

    $text = clean($text);
    echo $text;
@endphp
