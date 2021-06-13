<div class="form-group">
    @php
        $inputId = \Illuminate\Support\Str::camel($name).'Input';
        $requiredClass = isset($required) ? ($required ? 'required' : '') : '';
        $htmlRequired = $htmlRequired ?? false;
        $value = $value ?? '';
        $rows = $rows ?? 5;
        $isHelp = $help ?? false;
        $helpId = $isHelp ? $name.'Help' : null;
    @endphp
    <label for="{{$inputId}}" class="{{$requiredClass}}">{{$label}}</label>
    <textarea name="{{$name}}" rows="{{$rows}}"
              @if(isset($max))
              maxlength="{{$max}}"
              @endif
              class="form-control {{$errors->has($name) ? 'is-invalid' : ''}}"
              @if($isHelp)
              aria-describedby="{{$helpId}}"
              @endif
              @if($htmlRequired)
              required
              @endif
              id="{{$inputId}}">{{ old($name) ?: $value }}</textarea>

    @if($isHelp)
        <small id="{{$helpId}}" class="form-text text-muted-light">{{$help}}</small>
    @endif
</div>
