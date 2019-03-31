
@include('includes.header')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-6 text-center">
            <h3>
            Blog Management
            </h3>
            <a href="{{route('home')}}"  class="btn btn-primary ">Manage Blog</a>
        </div>
        <div class="col-lg-6 text-center">
            <h3>
            Shop Management
            </h3>
            <a href="{{route('admin.shop')}}" class="btn btn-primary">Manage Shop Items</a>
        </div>
    </div> 
</div>
</body>
 
</html>