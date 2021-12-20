<div class="col-md-12" style="padding:15px 15px 30px 0px;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Laissez un commentaire</h4> 
            </div>
            <div class="panel-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Félicitation </strong>{{Session::get('message')}}
                    </div>
                @endif
                <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="sendComment">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nom</label>
                        <div class="col-md-10">
                            <input type="text" placeholder="nom" class="form-control input-md" wire:model="name" />
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" placeholder="contact@contact.com" class="form-control input-md" wire:model="email" />
                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Commentaire</label>
                        <div class="col-md-10" wire:ignore>
                            <textarea class="form-control input-md" id="texte" name="texte" cols="30" rows="5" wire:model="texte"></textarea>
                            @error('texte') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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