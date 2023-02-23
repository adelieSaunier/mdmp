

<div>

    @include('livewire.admin.brand.modal')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Marques
                        <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal" >Ajouter une marque</a>
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Catégorie
                                </th>
                                <th>
                                    Slug
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ( $brands as $brand )

                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            <p>Sans catégorie</p>
                                        @endif

                                    </td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Hors-ligne' : 'En ligne' }}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Modifier</a>
                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger">Supprimer</a>
                                    </td>
                                </tr>

                            @empty
                            <tr>
                                <td colspan="5">
                                    Pas de marque enregistrée sur botre site
                                </td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            //$("#addBrandModal").modal({backdrop: false});
            $('#addBrandModal').modal('hide')
            $('#updateBrandModal').modal('hide')
            $('#deleteBrandModal').modal('hide')
        });

        $("#addBrandModal").on('hide.bs.modal', function(){
            $('.modal-backdrop').remove()
        });
        $("#updateBrandModal").on('hide.bs.modal', function(){
            $('.modal-backdrop').remove()
        });
        $("#deleteBrandModal").on('hide.bs.modal', function(){
            $('.modal-backdrop').remove()
        });

    </script>
@endpush

