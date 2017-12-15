@extends('layouts.app')

@section('content')
    <div class="container content">
        <div class="create-new-item pull-right">
            <button class="btn btn-primary btn-group-vertical" data-toggle="modal" data-target="#createNewItem">
                Create new item
            </button>

        </div>

        @include('desk.deskItem', ['deskItems' => $deskItems])

        {{ $links }}
    </div>


    <div class="modal fade" id="createNewItem" role="dialog" aria-labelledby="createNewItem" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="createNewItem">Create new item</h4>
                </div>
                <div class="modal-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" method="post" action="{{ route('create') }}" enctype="multipart/form-data" role="form">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label" for="title">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="description">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Description"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="image"></label>
                            <div class="col-sm-10">
                                <input type="file" id="image" name="image" accept="image/jpeg,image/jpg,image/png,"/>
                                    <img id="img-preview" src="">
                            </div>
                        </div>

                        @if($deskItems[0]->isAdmin())
                            <div class="form-group">
                                <label  class="col-sm-2 control-label" for="queue_order">Order</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="queue_order" name="queue_order" value=""/>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10 pull-right">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection