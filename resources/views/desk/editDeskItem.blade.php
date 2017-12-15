@extends('layouts.app')

@section('content')
    <div class="container content">
        <div class="row">
            <form class="form-horizontal" method="post" action="{{ route('editItem') }}" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for="title">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $deskItem->getTitle() }}"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="description">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="3" class="form-control" id="description" name="description" >{{ $deskItem->getDescription() }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="image"></label>
                    <div class="col-sm-10">
                        <input type="file" id="image" name="image" accept="image/jpeg,image/jpg,image/png,"/>
                        <img id="img-preview" src="">
                    </div>
                </div>

                @if($deskItem->isAdmin())
                    <div class="form-group">
                        <label  class="col-sm-2 control-label" for="Order">Order</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Order" name="queue_order" value="{{ $deskItem->getQueueOrder() }}"/>
                        </div>
                    </div>
                @endif

                <input type="hidden" name="item_id" value="{{ $deskItem->getId() }}">
                {{csrf_field()}}

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 pull-right">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection