@include('components.output.output-field', [
            'label' => 'Имя',
            'value' => $profile->name ?? ''
        ])
@include('components.output.output-field', [
        'label' => 'Фамилия',
        'value' => $profile->surname ?? ''
    ])
@include('components.output.output-field', [
        'label' => 'Обо мне',
        'value' => $profile->about ?? ''
    ])
