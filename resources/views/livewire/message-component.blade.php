<div class="wrapper">
    <div class="row" style="margin-top:30px;">
        <div class="col-md-8">
            <div class="col-md-12" style="padding:15px 15px 30px 0px;">				
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <h2>Laissez nous vos messages</h2> 
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Félicitation </strong>{{Session::get('message')}}
                                </div>
                            @endif
                            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="sendMessage">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nom</label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="nom" class="form-control input-md" wire:model="name" />
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" placeholder="contact@contact.com" class="form-control input-md" wire:model="email" />
                                        @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Téléphone</label>
                                    <div class="col-md-8">
                                        <input type="numeric" placeholder="Téléphone" class="form-control input-md" wire:model="phone" />
                                        @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Message</label>
                                    <div class="col-md-8" wire:ignore>
                                        <textarea class="form-control input-md" id="texte" name="texte" cols="30" rows="10" wire:model="texte"></textarea>
                                        @error('texte') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- advertissement right --}}
		@livewire('advertissement')
    </div>
</div>

@push('scripts')
    <script>
        $(function(){    
            tinymce.init({
                selector: '#texte',
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#texte').val();
                        @this.set('texte', d_data);
                    })
                }
            })
        });
    </script>
@endpush