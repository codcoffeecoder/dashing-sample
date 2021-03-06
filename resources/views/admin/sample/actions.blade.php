<div class="text-right text-nowrap">
    <a href="{{ route('sample.show', $model->id) }}" class="btn btn-link text-secondary p-1" title="Read"><i class="fas fa-lg fa-eye"></i></a>
    
    @can('update-sample')
        <a href="{{ route('sample.edit', $model->id) }}" class="btn btn-link text-secondary p-1" title="Update"><i class="fas fa-lg fa-edit"></i></a>
    @endcan
    @can('delete-sample')
    <x-dashing::form ajax="true" method="DELETE" action="{{ route('sample.destroy', $model->id) }}" class="d-inline-block" confirm="You won't be able to revert this!">
        <button type="submit" class="btn btn-link text-secondary p-1" title="Delete">
            <i class="fas fa-lg fa-trash-alt"></i>
        </button>
    </x-dashing::form>
    @endcan
</div>
