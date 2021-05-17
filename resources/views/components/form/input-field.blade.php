<div class="form-group">
    @php
        $inputId = \Illuminate\Support\Str::camel($name).'Input';
        $required = isset($required) ? ($required ? 'required' : '') : false;
        $type = $type ?? 'text';
        $isHelp = $help ?? false;
        $helpId = $isHelp ? $name.'Help' : null;
    @endphp
    <label for="{{$inputId}}" class="{{$required}}">{{$label}}</label>
    <input name="{{$name}}" type="{{$type}}"
           class="form-control {{$errors->has($name) ? 'is-invalid' : ''}}"
           @if($isHelp)
           aria-describedby="{{$helpId}}"
           @endif
           id="{{$inputId}}"
           value="{{ old($name) }}">

    @if($isHelp)
        <small id="{{$helpId}}" class="form-text text-muted-light">{{$help}}</small>
    @endif
</div>
