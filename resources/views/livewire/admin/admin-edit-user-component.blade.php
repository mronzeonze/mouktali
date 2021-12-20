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
                                Ajouter un utilisateur
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.users') }}" class="btn btn-success pull-right">Tous les utilisateurs</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Félicitation </strong>{{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeUser">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom Complet</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nom utilisteur" class="form-control input-md" wire:model="name" />
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="Email utilisteur" class="form-control input-md" wire:model="email" />
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mot de Passe</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="************" class="form-control input-md" wire:model="password" />
                                    @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirmez votre mot de passe</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="************" class="form-control input-md" wire:model="cpassword" />
                                    @error('cpassword') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Type</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model="utype">
                                        <option value="">Choisir un type...</option>
                                        <option value="ADM">Admin</option>
                                        <option value="USR">Editeur</option>
                                    </select>
                                    @error('utype') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

