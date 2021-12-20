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
                                Tout les articles ({{$allarticles}}) | Publier ({{$publish}})
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.addarticle') }}" class="btn btn-success pull-right">Ajouter un article</a>
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
                                    <th>Description</th>
                                    <th>Categorie</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td><input type="checkbox" {{($article->featured)?'checked="true"':''}} wire:click="featured({{$article->id}})"></td>
                                    <td>{{$article->id}}</td>
                                    <td><img src="{{asset('storage/assets/images/articles')}}/{{$article->image}}" width="60"/></td>
                                    <td class="text-justify">{{$article->title}}</td>
                                    <td class="text-justify">{{substr($article->description,0,400)}} <a href="#expand{{$article->id}}" data-toggle="modal"> Développer</a></td>
                                    <td>{{$article->category->title}}</td>
                                    <td>{{($article->status)? 'Publish':'NoPublish'}}</td>
                                    <td>{{$article->created_at}}</td>
                                    <td>
                                        <a href= "{{route('admin.editarticle', ['article_slug'=>$article->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href= "#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer cet article ?') || event.stopImmediatePropagation()"style="margin-left:10px;" wire:click.prevent="deleteArticle({{$article->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                    <div class="modal" id="expand{{$article->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                <a href="#" class="close" data-dismiss="modal">&times;</a>
                                                <h4 class="modal-title">Titre : {{$article->title}}</h4>
                                              </div>
                                              <div class="modal-body text-justify">
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <img src="{{asset('storage/assets/images/articles')}}/{{$article->image}}" width="100%"/>
                                                  </div>
                                                  <div class="col-md-8 text-justify">
                                                    {{$article->description}}
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              <div class="modal-footer">
                                                <p>Catégorie: {{$article->category->title}}</p>
                                                <p>Statut: {{($article->status)?'Publish':'NoPublish'}}</p>
                                                <p>Date: {{$article->created_at}}</p>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- paginate --}}
                        {{$articles->links()}}
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

