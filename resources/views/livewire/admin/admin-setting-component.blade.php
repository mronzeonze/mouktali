<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
           <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Paramètre
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Félicitation!!! </strong>{{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="saveSettings">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="Email..." class="form-control input-md" wire:model="email"/>
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Téléphone</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Téléphone..." class="form-control input-md" wire:model="phone"/>
                                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Téléphone 2</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Téléphone2..." class="form-control input-md" wire:model="phone2"/>
                                    @error('phone2') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Adresse</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Adresse..." class="form-control input-md" wire:model="address"/>
                                    @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Twiter</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Twiter..." class="form-control input-md" wire:model="twiter"/>
                                    @error('twiter') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Facebook..." class="form-control input-md" wire:model="facebook"/>
                                    @error('facebook') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Instagram..." class="form-control input-md" wire:model="instagram"/>
                                    @error('instagram') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">A propos de nous</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control input-md" name="about" id="about" cols="30" rows="10" wire:model="about"></textarea>
                                    @error('about') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){    
            tinymce.init({
                selector: '#about',
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#about').val();
                        @this.set('about', d_data);
                    })
                }
            })
        });
    </script>
@endpush