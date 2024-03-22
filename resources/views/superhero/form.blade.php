<h1>{{ $mode }}</h1>
<label for="name">Nombre:</label>
<input type="text" name="name" value='{{ isset($superhero->name)?$superhero->name:"" }}' id="name">
<br>
<label for="real_name">Nombre real:</label>
<input type="text" name="real_name" value='{{ isset($superhero->real_name)?$superhero->real_name:"" }}' id="real_name">
<br>
<label for="photo_url">Foto</label>
@if(isset($superhero->photo_url))
<img src="{{ asset('storage').'/'.$superhero->photo_url }}" width="100" alt="">
@endif

<input type="file" name="photo_url" value='' id="photo_url">
<br>

<label for="gender">Genero:</label>
<input list="genders" name="gender" value='{{ isset($superhero->gender->name)?$superhero->gender->name:"" }}' id="gender">
<br>
<label for="universe">Universo:</label>
<input list="universes" name="universe" value='{{ isset($superhero->universe->name)?$superhero->universe->name:"" }}' id="universe">
<br>

<input type="submit" value="{{$mode}} datos">
<br>

<datalist id="genders">
  <option value="Hombre">
  <option value="Mujer">
  <option value="Other">
</datalist>

<datalist id="universes">
  <option value="DC">
  <option value="Marvel">
</datalist>

<a href="{{ url('superhero/') }}">Regresar</a>