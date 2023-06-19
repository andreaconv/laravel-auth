<form action="{{ route('admin.project.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Confermi l\'eliminazione del progetto: {{ $project->name }} ?')">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger" title="Elimina">Elimina</button>
</form>
