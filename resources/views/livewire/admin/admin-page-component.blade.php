<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
           <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        A Propos
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Félicitation!!! </strong>{{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="savePages">
                            <div class="form-group">
                                <label class="col-md-2 control-label">A propos de nous</label>
                                <div class="col-md-10" wire:ignore>
                                    <textarea class="form-control input-md" name="description" id="description" rows="20" wire:model="description"></textarea>
                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
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
                selector: '#description',
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    })
                }
            })
        });
    </script>
@endpush