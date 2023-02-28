@extends('layouts.admin')

@section('title','My Order Details')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Détails de la commande : {{ $order->tracking_no }}
                    <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">
                        <span class="fa fa-arrow-left"></span> Retour
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">
                        <span class="fa fa-download"></span> Télécharger la Facture
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">
                        <span class="fa fa-eye"></span> Voir la Facture
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-info btn-sm float-end mx-1">
                        <span class="fa fa-envelope"></span> Envoyer la facture
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h5>Détails de la commande</h5>
                        <hr>
                        <h6>Id de la commande : {{ $order->id }}</h6>
                        <h6>Référence de la commande : {{ $order->tracking_no }} </h6>
                        <h6>Date de commande : {{ $order->created_at->format('d-m-Y h:i A') }} </h6>
                        <h6>Mode de paiement : {{ $order->payment_mode }} </h6>
                        <h6 class="border p-2 text-success">
                            Statut de la commande : <span class="text-uppercase">{{ $order->status_message }}</span>
                        </h6>
                    </div>
                    <div class="col-md-6">
                        <h5>Détails client</h5>
                        <hr>
                        <h6>Nom : {{ $order->fullname }}</h6>
                        <h6>Mail : {{ $order->email }}</h6>
                        <h6>Téléphone : {{ $order->phone }}</h6>
                        <h6>Adresse : {{ $order->address }}</h6>
                        <h6>Code postal : {{ $order->pincode }}</h6>
                    </div>
                </div>

                <br/>
                <h5>Articles commandés</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Article</th>
                                <th>Image</th>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($order->orderItems as $orderItem)
                            <tr>
                                <td width="10%">{{ $orderItem->id }}</td>
                                <td width="10%">
                                    @if ($orderItem->product->productImages)
                                        <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                        style="width: 50px; height: 50px" alt="">
                                    @else
                                        <img src="" style="width: 50px; height: 50px" alt="">
                                    @endif
                                </td>
                                <td>
                                    {{ $orderItem->product->name }}
                                    @if ($orderItem->productColor)
                                        @if ($orderItem->productColor->color)
                                        <span>- Couleur : {{ $orderItem->productColor->color->name }}</span>
                                        @endif
                                    @endif
                                </td>
                                <td width="10%">{{ $orderItem->price }} €</td>
                                <td width="10%">{{ $orderItem->quantity }}</td>
                                <td width="10%" class="fw-bold">{{ $orderItem->quantity * $orderItem->price }} €</td>
                                @php
                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="fw-bold">Montant Total:</td>
                                <td colspan="1" class="fw-bold">{{ $totalPrice }} €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="card border mt-3">
            <div class="card-body">
                <h4>Mettre à jour le statut de la commande</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Choisir un nouveau statut</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Sélection d'un statut</option>
                                    <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >En cours</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Terminée</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >En attente</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Annulée</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >En cours de livraison</option>
                                </select>
                                <button type="submit" class="btn btn-primary text-white">Mettre à jour</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-7">
                        <br/>
                        <h4 class="mt-3">Status :
                            <span class="text-uppercase">
                                @if ($order->status_message == 'in progress')
                                    En cours
                                    @elseif ($order->status_message == 'completed')
                                        Terminée
                                    @elseif ($order->status_message == 'pending')
                                        En attente
                                    @elseif ($order->status_message == 'cancelled')
                                        Annulée
                                    @elseif ($order->status_message == 'out-for-delivery')
                                        En cours de livraison
                                @endif
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
