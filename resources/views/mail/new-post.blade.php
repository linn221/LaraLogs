<h3>Dear Subscriber,</h3>
<p>
    {{ env('APP_NAME') }} has published a new post on {{ $log->category->name }}, titled
    <strong> {{ $log->title }}. </strong>
    {{-- show tags here for later --}}
    @foreach ($log->tags as $tag)
        {{ $tag->name }}
    @endforeach

    <br>
    You many want to check that out by the following link:
    <a href="{{ route('page.log', $log->id) }}">
        !!{ route('page.log', $log->id) }!!
    </a>
</p>

<p>
    <i>
        this email is sent to {{ $email->address }} if there was a mistake or other reasons, you can cancel the
        subscription
        <a href="{{ route('email.unsub', ['email' => $email->address, 'token' => $email->token]) }}">
            here
        </a>
    </i>
    <br>
    <i>
        you can <strong>verify</strong> your email for commenting,
        <a href="{{ route('email.verify', ['token' => $email->token, 'email' => $email->address]) }}">
            here
        </a>
    </i>
    <br>
    Thanks!
</p>
