<h3> Events terkini</h3>
@foreach ($events as $event)
    <div class="event">
        <div class="row">
            <div class="col-sm-6">
                <div style="font-weight: bold">{{ $event->title }}</div>
            </div>
            <div class="col-sm-6">
                <div class="text-right date">{{ $event->event_time }}</div>
            </div>
        </div>
        <p>{{substr($event->description,0,80) }}...</p>
        <div class="text-right">
            <a href="/event-frontend/{{$event->id}}">See more...</a>
        </div>
    </div>
@endforeach