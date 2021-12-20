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
                                Toutes les Catégories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route ('admin.addcategorie') }}" class="btn btn-success pull-right">Ajouter une catégorie</a>
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
                                    <th>Nom Catégorie</th>
                                    <th>Slug</th>
                                    <th>Statut</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($categories) > 0 )
                                    @foreach($categories as $category)
                                    <tr>
                                        <td><input type="checkbox" {{($category->status)?'checked="true"':''}} wire:click="status({{$category->id}})"></td>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{($category->status)?'Publier':'NoPublier'}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            <a href="{{ route('admin.editcategorie',['category_slug' => $category->slug]) }}" >
                                            <i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer cette categorie?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <td colspan="3">Aucune donnée n'a été trouvé</td>
                                @endif
                            </tbody>
                        </table>
                        {{-- paginate --}}
                        {{$categories->links()}}
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

