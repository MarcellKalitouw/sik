<div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible alert-alt solid fade show">
                    <button type="button" class="close cls-alert h-100" data-dismiss="alert" aria-label="Close">
                        <span><i class="mdi mdi-close"></i></span>
                    </button>
                    <strong>{{session('success')}}</strong>
                </div>
            @endif
            @if(session('delete'))
                <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
                    <button type="button" class="close cls-alert h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    <strong>{{session('delete')}}</strong> 
                </div>
                
            @endif
            @if(session('error'))
                <div class="alert alert-dark alert-dismissible alert-alt solid fade show">
                    <button type="button" class="close cls-alert h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    <strong>{{session('error')}}</strong> 
                </div>
            @endif
                
            
   

</div>