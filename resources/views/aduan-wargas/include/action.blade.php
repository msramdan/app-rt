<td>
    @can('aduan warga view')
    <a href="{{ route('aduan-wargas.show', $model->id) }}" class="btn btn-primary btn-sm">
        <i class="mdi mdi-eye"></i>
    </a>
@endcan

    @can('aduan warga edit')
        <a href="{{ route('aduan-wargas.edit', $model->id) }}" class="btn btn-success btn-sm">
            <i class="mdi mdi-pencil"></i>
        </a>
    @endcan

    @can('aduan warga delete')
        <form action="{{ route('aduan-wargas.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="mdi mdi-trash-can-outline"></i>
            </button>
        </form>
    @endcan
</td>
