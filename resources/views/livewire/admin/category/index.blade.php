
<div class="">

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression de la catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h5>êtes vous sûr de vouloir supprimer la catégorie ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">j'annule</button>
                        <button type="submit" class="btn btn-primary" >je supprime</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert_success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Catégorie
                        <a class="btn btn-sm btn-primary float-end" href="{{ url('admin/category/create') }}">Ajouter</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $categories as $category )
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    {{ $category->status == '1' ? 'Hors ligne': 'En ligne' }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/category/'. $category->id .'/edit') }}" class="btn btn-success">Editer</a>
                                    <a href="#" wire:click="deleteCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    <!-- Pagination -->
                    <div>
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', e => {

            $('#deleteModal').modal('hide')
        });

        $("#deleteModal").on('hide.bs.modal', function(){
            $('.modal-backdrop').remove()
        });

    </script>
@endpush

