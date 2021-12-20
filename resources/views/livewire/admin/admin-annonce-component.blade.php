<div>
    <style>
        nav svg{
            height: 20px:
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
           <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                Toute les annonces ({{$allannonces}}) | Publier ({{$publish}})
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.addannonce') }}" class="btn btn-success pull-right">Ajouter une annonce</a>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Recherchez..." wire:model="searchTerm"/>
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
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Url</th>
                                    <th>Position</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($annonces as $annonce)
                                <tr>
                                    <td><input type="checkbox" {{($annonce->status)?'checked="true"':''}} wire:click="annonce({{$annonce->id}})"></td>
                                    <td>{{$annonce->id}}</td>
                                    <td><img src="{{asset('storage/assets/images/annonces')}}/{{$annonce->image}}" width="60"/></td>
                                    <td>{{$annonce->title}}</td>
                                    <td>{{$annonce->url}}</td>
                                    <td>{{$annonce->location}}</td>
                                    <td>{{$annonce->created_at}}</td>
                                    <td>
                                        <a href= "{{route('admin.editannonce', ['annonce_id'=>$annonce->id])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href= "#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer cet article ?') || event.stopImmediatePropagation()"style="margin-left:10px;" wire:click.prevent="deleteAnnonce({{$annonce->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="wrap-pagination-info">
                            {{-- paginate --}}
                            {{$annonces->links()}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

