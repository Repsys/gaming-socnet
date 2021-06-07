@include('components.output.output-field', [
                    'label' => 'Название',
                    'value' => $profile->name ?? ''
                ])
@include('components.output.output-field', [
        'label' => 'Об издателе',
        'value' => $profile->about ?? ''
    ])
