<div class="content">   
    <style>
        .content {
          padding-top: 40px;
          padding-bottom: 40px;
        }
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }
        
        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
    <div class="container">
    
        <div class="row">
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">En attente de publication</span>
                    <span class="icon-stat-value">{{count($articles)}}</span>
                  </div>   
                  <div class="col-xs-4 text-center">
                    <i class="icon-stat-visual bg-primary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Mise à jour maintenant
                </div>    
              </div>    
            </div>    
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Nombre d'article publier</span>
                    <span class="icon-stat-value">{{count($articlespublish)}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="icon-stat-visual bg-secondary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Mise à jour maintenant
                </div>   
              </div>
            </div>
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Revenu d'aujourd'hui</span>
                    <span class="icon-stat-value"></span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Mise à jour maintenant
                </div>
              </div>    
            </div>    
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Ventes d'aujourd'hui</span>
                    <span class="icon-stat-value"></span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Mise à jour maintenant
                </div>    
              </div>    
            </div>    
        </div>  

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Article en attente
                </div>
                <div class="panel-body">
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
                                <td><img src="{{asset('uploads/articles')}}/{{$article->image}}" width="60"/></td>
                                <td class="text-justify">{{$article->title}}</td>
                                <td class="text-justify">{{substr($article->description,0,400)}} <a href="#expand{{$article->id}}" data-toggle="modal"> Développer</a></td>
                                <td>{{$article->category->title}}</td>
                                <td>{{($article->status)? 'Publish':'NoPublish'}}</td>
                                <td>{{$article->created_at}}</td>
                                <td>
                                    <a href= "{{route('admin.editarticle', ['article_slug'=>$article->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                    <a href= "#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer cet article ?') || event.stopImmediatePropagation()"style="margin-left:10px;" wire:click.prevent="deleteArticle({{$article->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                                {{-- fenetre modal --}}
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
                                              <img src="{{asset('uploads/articles')}}/{{$article->image}}" width="100%"/>
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
                    {{$articles->links()}}
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Article publier
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Categorie</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articlespublish as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td><img src="{{asset('uploads/articles')}}/{{$article->image}}" width="60"/></td>
                                <td>{{$article->title}}</td>
                                <td>{{$article->slug}}</td>
                                <td>{{$article->description}}</td>
                                <td>{{$article->category->title}}</td>
                                <td>{{($article->status)? 'Publish':'NoPublish'}}</td>
                                <td>{{$article->created_at}}</td>
                                <td>
                                    <a href= "{{route('admin.editarticle', ['article_slug'=>$article->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                    <a href= "#" onclick="confirm('Etes Vous sur, Voulez- vous supprimer cet article ?') || event.stopImmediatePropagation()"style="margin-left:10px;" wire:click.prevent="deleteArticle({{$article->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$articles->links()}}
                </div>
            </div>
        </div> --}}

    </div>    
</div>
