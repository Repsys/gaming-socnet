<div class="form-group">
    @php
        $inputId = \Illuminate\Support\Str::camel($name).'Input';
        $requiredClass = isset($required) ? ($required ? 'required' : '') : '';
        $htmlRequired = $htmlRequired ?? false;
        $type = $type ?? 'text';
        $value = $value ?? '';
        $isHelp = $help ?? false;
        $helpId = $isHelp ? $name.'Help' : null;
    @endphp
    <label for="{{$inputId}}" class="{{$requiredClass}}">{{$label}}</label>
    <input name="{{$name}}" type="{{$type}}"
           class="form-control {{$errors->has($name) ? 'is-invalid' : ''}}"
           @if($isHelp)
           aria-describedby="{{$helpId}}"
           @endif
           @if($htmlRequired)
           required
           @endif
           id="{{$inputId}}"
           value="{{ old($name) ?: $value}}">

    @if($isHelp)
        <small id="{{$helpId}}" class="form-text text-muted-light">{{$help}}</small>
    @endif
</div>
