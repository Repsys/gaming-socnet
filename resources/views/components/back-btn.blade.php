@section('back-btn')
    @php
        $url = $url ?? url()->previous();
        $text = $text ?? '< Назад <';
    @endphp
    <a class="back-btn btn btn-dark position-absolute ml-3 mt-3" href="{{$url}}">{{$text}}</a>
@endsection
