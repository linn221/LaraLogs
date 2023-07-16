<h3>Dear Subscriber,</h3>
<p>
    {{ env('APP_NAME') }} has published a new post on {{ $log->category->name }}, titled
    <strong> {{ $log->title }}. </strong>
    You many want to check that out by the following link:
    <a href="{{ route('page.log', $log->id) }}">
        {{ route('page.log', $log->id) }}
    </a>
</p>
{{-- show tags here for later --}}

<p>

    <i>
        this email is sent to {{ $email->address }} if there was a mistake, you can cancel the subscription <a
            href="{{ route('email.unsub', ['email' => $email->address, 'token' => $email->token]) }}">here</a>
    </i>
    <br>
    Thanks!
</p>
