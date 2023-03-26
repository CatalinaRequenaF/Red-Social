<x-bootstrap-component></x-bootstrap-component>

<form method="POST" action="store">
    @csrf
    <label for="title">Título de la comunidad</label>
    <input name="title"
        type="text"
        placeholder="Titulo"
        class="@error('title') is-invalid @enderror">
    
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="description">Descripcion de la comunidad</label>
    
    <input name ="description"
        type="text"
        placeholder="Descripcion"
        class="@error('description') is-invalid @enderror">
    
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button action="submit">Crear</button>
</form>