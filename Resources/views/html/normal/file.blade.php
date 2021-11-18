<div class="form-group">
    {!! Form::nLabel($name, $label, $required) !!}
    @php
        $options = ['class' => 'form-control custom-file-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required';
    @endphp
    <div class="custom-file">
        {!! Form::nLabel('Choose file...', $label, $required, ['class' => 'custom-file-label', 'id' => $name .'_file_label']) !!}
        {!! Form::file($name, array_merge($options, $attributes)) !!}
        {!! Form::nError($name, $msg) !!}
    </div>

    @if(($preview[0] ?? false))
        <div class="img-thumbnail mt-2 text-center">
            <img id="{{$name}}_preview" src="{{ asset(($preview[2] ?? '/img/logo-app.png')) }}"
                 height="{{ ($preview[1] ?? 89) }}">
        </div>
        <script>
            document.getElementById("{{$name}}").addEventListener("change", function () {
                var i = this;
                if (i.files && i.files[0]) {
                    var r = new FileReader();
                    r.onload = function (e) {
                        document.getElementById("{{$name}}_preview").setAttribute('src', e.target.result);
                    };
                    r.readAsDataURL(i.files[0]);
                    document.getElementById("{{$name}}_label").innerText = (i.files[0].name ?? "Choose a file");
                }
            });
        </script>
    @endif
    <script>
        document.getElementById('{{$name}}').addEventListener('change', function () {

            var fileName = this.value.split("\\").pop();

            var field = document.getElementById('{{$name .'_file_label'}}');
            field.classList.add("selected");
            field.innerHTML = fileName;
        });
    </script>
</div>
