<div class="form-group">
    @php
        $inputId = \Illuminate\Support\Str::camel($name).'Input';
        $requiredClass = isset($required) ? ($required ? 'required' : '') : '';
        $htmlRequired = $htmlRequired ?? false;
        $multiple = $multiple ?? false;
        $accept = $accept ?? '';
        $isHelp = $help ?? false;
        $helpId = $isHelp ? $name.'Help' : null;
    @endphp
    <label for="{{$inputId}}" class="{{$requiredClass}}">{{$label}}</label>
    <input name="{{$name}}" type="file"
           id="{{$inputId}}"
           class="form-control-file {{$errors->has($name) ? 'is-invalid' : ''}}"
           accept="{{$accept}}"
           @if($isHelp)
           aria-describedby="{{$helpId}}"
           @endif
           @if($htmlRequired)
           required
           @endif
           @if($multiple)
           multiple
           @endif>

    @if($isHelp)
        <small id="{{$helpId}}" class="form-text text-muted-light">{{$help}}</small>
    @endif
</div>
