<h2>{{ $job->title }}</h2>

<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">Your job "{{ $title }}" has been posted!</a>
</p>
