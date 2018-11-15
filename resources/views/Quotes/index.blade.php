@extends('Quotes.bootstrap')
@section('myStyle')
<style type="text/css">
.delete{
    text-align-last:right;
}
.card{
    background-color: antiquewhite;
     padding-block-end: 2rem;
    border-spacing: 2rem;
    margin: 1rem;


}


a{
    color: red;

}

</style>
@endsection
@section('content')
<div class="container">
<h3 class="text-center">Latest Quote</h3>

<div class="center">
    @if(count($errors)>0)

    <p class="alert alert-danger">
    @foreach ($errors->all() as $error)

    {{$error}}

    @endforeach
</p>

    @endif
@if(Session::has('quoteData'))
<p class="alert alert-success">
    {{session('quoteData')}}
</p>
@endif

@if(Session::has('deleteQuote'))
<p class="alert alert-danger">
    {{session('deleteQuote')}}
</p>
@endif

   <div class="container">


     <div class="row">
         @if($quoteData)
       @foreach($quoteData as $data)
            <div class="sm">
            <div class="card" style="width: 18rem;">
            <div class="card-body">

{{-- <h4 class="delete"><form action="{{route('quoteCreate.destroy',$data->id)}}" method="DELETE">
<a href="{{$data->id}}">X</h4> </a></form> --}}
<form action="{{route('quoteCreate.destroy',$data->id)}}" method="POST">
     @csrf
                    @method('DELETE')
    <h4 class="delete"><button type="submit" class="btn btn-danger btn-sm">X</button></h4>
</form>


                {{-- <h5 class="card-title">Card title <h4 class="delete"><a href="">X</a></h4></h5> --}}

            <p class="card-text"><b>{{$data->quote}}</b></p>
            <p class="card-text">Created By <a href="{{route('quoteCreate.show',$data->name)}}">{{$data->name}}</a> {{$data->created_at->diffForHumans()}}</p>

            </div>

            </div>

            </div>
            @endforeach
       @endif
            </div>


              </div>

                            <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                {{$quoteData->render()}}


                            </ul>
                            </nav>

                            <h3 class="text-center">Add A Quote</h3>
                        <form action="{{route('quoteCreate.store')}}" method="POST" class="center">

                                     @csrf
                            <div class="from-group text-center">
                            <label for="name">Your Name</label>
                            <input type="name" class="form-control w-25 p-3 mx-auto" id="name"
                             placeholder="Enter Name" name="name" required style="width: 200px;">
                             </div>

                             <div class="form-group text-center">
                                <label for="quote">Your Quote</label>
                                <textarea class="form-control w-25 p-3 mx-auto" id="quote" name="quote" rows="3" style="width: 200px;"></textarea>
                            </div>
                            <div class="mx-auto" style="width:150px;">
                            <button type="submit" class="btn btn-success" >Submit Quote</button>
                            </div>

                            </form>

</div>

</div>
@endsection
