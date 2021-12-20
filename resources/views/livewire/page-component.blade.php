<div class="wrapper">
    <div class="row" style="margin-top:30px;">
        <div class="col-md-8">
            <div class="col-md-12" style="padding:15px 15px 30px 0px;">				
                <div class="col-md-12">
                    <H4 class="text-justify">{{($pages)?$pages->description:''}}</H4> 
                </div>
            </div>
        </div>

        {{-- advertissement right --}}
		@livewire('advertissement')
    </div>
</div>
