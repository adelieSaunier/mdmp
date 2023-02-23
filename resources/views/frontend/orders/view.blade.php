@extends('layouts.app')

@section('title','Détail de ma commande')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">

                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> Détails
                            <a href="{{ url('commandes') }}" class="btn btn-danger btn-sm float-end">Retour</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Détails de la commande</h5>
                                <hr>
                                <h6>Tracking Id/No.: {{ $order->tracking_no }} </h6>
                                <h6>Date de la commande : {{ $order->created_at->format('d-m-Y h:i A') }} </h6>
                                <h6>Mode de paiement : {{ $order->payment_mode }} </h6>
                                <h6 class="border p-2 text-success">
                                    Statut de la commande : <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Livraison</h5>
                                <hr>
                                <h6>Nom et Prénom : {{ $order->fullname }}</h6>
                                <h6>Mail : {{ $order->email }}</h6>
                                <h6>Télephone : {{ $order->phone }}</h6>
                                <h6>Adresse : {{ $order->address }}</h6>
                                <h6>Code Postal: {{ $order->pincode }}</h6>
                            </div>
                        </div>

                        <br/>
                        <h5>Articles commandés</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
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
                                        <td width="10%">
                                            @if ($orderItem->product->productImages->count() > 0)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" style="width: 50px; height: 50px" alt="No Image" />
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
                                        <td width="10%">${{ $orderItem->price }}</td>
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
            </div>
        </div>
    </div>

@endsection
