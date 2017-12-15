    @foreach($deskItems as $deskItem)
        <div class="desk-item thumbnail">
            <div class="row text-center row-title">
                <span>{{ $deskItem->getTitle() }}</span>
            </div>
            <div class="row">
                <div class="col-xs-4 img-container">
                    <img class="img-thumbnail img-responsive" src="{{ $deskItem->getImagePath() }}">
                </div>
                <div class="col-xs-8">
                    <span>{{ $deskItem->getDescription() }}</span>
                </div>
            </div>
            @if($deskItem->isAdmin() || $deskItem->isOwner())
                <div class="row">
                    <div class="col-xs-12">
                        <div class="pull-right col-xs-2">
                            <form class="col-xs-6" method="post" action="{{ route('delete') }}">
                                <input type="hidden" name="item_id" value="{{ $deskItem->getId() }}">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <form class="col-xs-6" method="post" action="{{ route('edit') }}">
                                <input type="hidden" name="item_id" value="{{ $deskItem->getId() }}">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
