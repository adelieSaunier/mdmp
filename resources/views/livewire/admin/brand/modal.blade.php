
<!-- BRAND INSERT MODAL -->

<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une marque</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Catégorie principale</label>
                        <select wire:model.defer="category_id" id="category_brand" class="form-control">
                            <option value="">Sélectioner une catégorie</option>
                            @foreach ( $categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Nom de la marque</label>
                        <input wire:model.defer="name" type="text" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug de la marque</label>
                        <input wire:model.defer="slug" type="text" class="form-control">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Hors ligne</label>
                        <input wire:model.defer="status" type="checkbox" >

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal" >Annuler</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder la marque</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- BRAND UPDATE MODAL -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier une marque</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>Chargement...
            </div>
            <div wire:loading.remove>

                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Catégorie principale</label>
                            <select wire:model.defer="category_id" id="category_brand" class="form-control">
                                <option value="">Sélectioner une catégorie</option>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Nom de la marque</label>
                            <input wire:model.defer="name" type="text" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug de la marque</label>
                            <input wire:model.defer="slug" type="text" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Hors ligne</label>
                            <input wire:model.defer="status" type="checkbox" >

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal" >Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier la marque</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- BRAND DELETE MODAL -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer une marque</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div >

                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        Vous voulez supprimer cette marque ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal" >Annuler</button>
                        <button type="submit" class="btn btn-primary">Oui, supprimer</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

