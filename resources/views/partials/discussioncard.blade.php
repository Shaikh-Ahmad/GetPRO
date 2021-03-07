<div class="shadow">
    @include('partials.discussion-header')
    <div class="card-body">
        <div class="text-center">
            <strong>{{$discussion->title}}</strong>
        </div>
        <hr>
        {!!$discussion->content!!}
    </div>
    <hr>
</div>