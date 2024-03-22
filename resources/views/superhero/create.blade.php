<form action="{{ url('/superhero') }}" method="post" enctype="multipart/form-data">
  @csrf
  @include('superhero.form', ['mode'=>'Crear'])
</form>