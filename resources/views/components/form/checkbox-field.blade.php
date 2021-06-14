<div class="form-check">
    @php
        $inputId = \Illuminate\Support\Str::camel($name).'Input';
        $value = $value ?? false;
        $isHelp = $help ?? false;
        $helpId = $isHelp ? $name.'Help' : null;
    @endphp
    <input name="{{$name}}" type="checkbox"
           class="form-check-input {{$errors->has($name) ? 'is-invalid' : ''}}"
           id="{{$inputId}}"
           @if($isHelp)
           aria-describedby="{{$helpId}}"
           @endif
           @if($value || old($name))
           checked
           @endif>
    <label class="form-check-label" for="{{$inputId}}">{{$label}}</label>
</div>
@if($isHelp)
    <small id="{{$helpId}}" class="form-text text-muted-light">{{$help}}</small>
@endif
