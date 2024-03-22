@if(Session::has('message'))
{{ Session::get('message') }}
@endif
<br>
<a href="{{ url('superhero/create') }}">Registrar nuevo superheroe</a>
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Nombre Real</th>
      <th>Genero</th>
      <th>Universo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($superheroes as $superhero)
    <tr>
      <td>{{ $superhero->id}}</td>

      <td>
        <img src="{{ asset('storage').'/'.$superhero->photo_url }}" width='100' alt="">
      </td>

      <td>{{ $superhero->name}}</td>
      <td>{{ $superhero->real_name}}</td>
      <td>{{ $superhero->gender->name}}</td>
      <td>{{ $superhero->universe->name}}</td>
      <td>
        <a href='{{ url('/superhero/'.$superhero->id.'/edit') }}'>
          Editar
        </a>

        | 

        <form action="{{ url('/superhero/'.$superhero->id) }}" method="post">
          @csrf
          {{ method_field('DELETE') }}
          <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>