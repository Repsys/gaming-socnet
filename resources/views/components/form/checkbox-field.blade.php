<div class="form-check">
    @php
        $inputId = \Illuminate\Support\Str::camel($name).'Input';
        $isHelp = $help ?? false;
        $helpId = $isHelp ? $name.'Help' : null;
    @endphp
    <input name="{{$name}}" type="checkbox"
           class="form-check-input {{$errors->has($name) ? 'is-invalid' : ''}}"
           @if($isHelp)
           aria-describedby="{{$helpId}}"
           @endif
           id="{{$inputId}}"
           value="{{ old($name) }}">
    <label class="form-check-label" for="{{$inputId}}">{{$label}}</label>
</div>
@if($isHelp)
    <small id="{{$helpId}}" class="form-text text-muted-light">{{$help}}</small>
@endif
