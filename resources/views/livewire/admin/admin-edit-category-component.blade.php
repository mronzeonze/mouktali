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
                            <div class="col-md-6">
                                Modifier une catégorie
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">Toutes les catégories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Félicitation </strong>{{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom Catégorie</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nom de la catégorie" class="form-control input-md" wire:model="title" wire:keyup="generateslug" />
                                    @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Slug Catégorie</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Slug de la catégorie" class="form-control input-md" wire:model="slug" />
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Statut</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model="status">
                                        <option value="">Choisir statut...</option>
                                        <option value="1">Publish</option>
                                        <option value="0">NoPublish</option>
                                    </select>
                                    @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>