<style>
.form-register {
  max-width: 400px;
  margin: 0 auto;
}

.form-register .form-control {
  border-radius: 0;
  box-shadow: none;
  border-color: #ddd;
}

.form-register button[type="submit"] {
  background: #007bff;
  border-color: #007bff;
}
</style>

<h1>Registrarse</h1>

<form class="form-register" method="POST">

  <!-- Campos del formulario -->
  @csrf

    <div>
        <label>Nombre:</label>
        <input type="text" name="name">
        {{-- Si hay un error tendremos el mensaje --}}
        @if ($errors->has('name'))
        {{ $errors->first('name') }}
        @endif
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email">
        @if ($errors->has('email'))
        {{ $errors->first('email') }}
        @endif
    </div>

    <div>
        <label>Contraseña:</label>
        <input type="password" name="password">
        @if ($errors->has('password'))
        {{ $errors->first('password') }}
        @endif
    </div>

    <div>
        <label>Confirmar contraseña:</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit" disabled>
        <span>Registrarse</span>
        <svg>...</svg>
    </button>

</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $("form").submit(function() {
        $("button[type='submit']").attr('disabled', true);
    });

    $("form").on('ajaxStop', function() {
        $("button[type='submit']").attr('disabled', false);
    });
</script>