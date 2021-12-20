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
                                Tous les utilisateurs
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route ('admin.adduser') }}" class="btn btn-success pull-right">Ajouter un utilisateur</a>
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
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0 )
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->utype}}</td>
                                        <td>{{$user->created_at}}</td>
                                        @if($user->utype != 'ADM')
                                            <td>
                                                <a href="{{ route('admin.edituser',['user_id' => $user->id]) }}" >
                                                <i class="fa fa-edit fa-2x"></i></a>
                                                <a href="#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer cet utilisateur?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{$user->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @else
                                    <td colspan="3">Aucune donnée n'a été trouvé</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

