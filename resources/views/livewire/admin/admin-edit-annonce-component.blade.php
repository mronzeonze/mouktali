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
                                Ajouter une annonce
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.annonces') }}" class="btn btn-success pull-right">Toute les annonces</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Félicitation </strong>{{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="editAnnonce">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Titre</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Titre article" class="form-control input-md" wire:model="title" />
                                    @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Url</label>
                                <div class="col-md-4">
                                    <input type="url" placeholder="https://www.exemple.com" class="form-control input-md" wire:model="url" />
                                    @error('url') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Statut</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="">Statut</option>
                                        <option value="1">Publier</option>
                                        <option value="0">NoPublier</option>
                                    </select>
                                    @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image </label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if($newimage)
                                        <img class="mt-4" src="{{ $newimage->temporaryUrl() }}" width="120" />
                                    @else
                                        <img class="mt-4" src = "{{asset('uploads/annonces')}}/{{$image}}" width="120" />
                                    @endif
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Position</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="location">
                                        <option value="">Selectionnez un emplacement</option>
                                        <option value="top">haut</option>
                                        <option value="left">Gauche</option>
                                        <option value="right">Droit</option>
                                        <option value="bottom">bas</option>
                                    </select>
                                     @error('location') <p class="text-danger">{{$message}}</p> @enderror
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