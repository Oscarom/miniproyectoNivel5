<form class="flex flex-col gap-3" method="POST" action="{{ route("alumno.destroy", $usuario->id) }}">
    @csrf
    @method("delete")
    <button type="submit" class="text-white bg-sky-800 p-1 rounded-md">Eliminar</button>
</form>