@extends($pathToView.'layout.index')
@section('page-content')
    <div class="pageContent rale">
        <div  id="mohamed" class="container-fluid">
            
                @yield('driver-wrapper')
            
        </div>
    </div>
@endsection
@section('scripts')
<script src="/js/driver/main.js"></script>    
@endsection