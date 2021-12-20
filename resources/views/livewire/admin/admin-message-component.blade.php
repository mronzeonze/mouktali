<div>
    <style>
        nav svg{
            height: 20px:
        }
        nav .hidden{
            display: block !important;
        }

        .sclist{
            list-style: none;
        }
        .sclist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size: 16px;
            margin-left: 12px;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
           <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Messages
                            </div>
                        </div>         
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Félicitation </strong>{{Session::get('message')}}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Messages</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($messages) > 0 )
                                    @foreach($messages as $message)
                                    <tr>
                                        <td>{{$message->id}}</td>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->phone}}</td>
                                        <td class="text-justify">{!!substr($message->texte,0,150)!!}<a href="#expand{{$message->id}}" data-toggle="modal"> Développer</a></td>
                                        <td>{{$message->created_at}}</td>
                                        <td><a href="#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer ce message?') || event.stopImmediatePropagation()" wire:click.prevent="deleteMessage({{$message->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a></td>
                                        
                                        {{-- fenetre modal --}}
                                        <div class="modal" id="expand{{$message->id}}">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                                                    <h4 class="modal-title">Message de : {!!$message->name!!}</h4>
                                                  </div>
                                                  <div class="modal-body text-justify">
                                                    {{$message->texte}}
                                                  </div>
                                                  <div class="modal-footer">
                                                    <p>Envoyer le : {{$message->created_at}}</p>
                                                    <p>Téléphone : {{$message->phone}}</p>
                                                    <p>Email : {{$message->email}}</p>
                                                  </div>
                                              </div>
                                            </div>
                                          </div>
                                    </tr>
                                    @endforeach
                                @else
                                    <td colspan="3">Aucune donnée n'a été trouvé</td>
                                @endif
                            </tbody>
                        </table>
                        {{-- paginate --}}
                        {{$messages->links()}}
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

