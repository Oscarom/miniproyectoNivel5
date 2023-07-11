<form class="flex flex-col gap-3" method="POST" action="{{ route("clase.destroy", $clase->id) }}">
    @csrf
    @method("delete")
    <button type="submit" class="text-white bg-sky-800 p-1 rounded-md">Eliminar</button>
</form>