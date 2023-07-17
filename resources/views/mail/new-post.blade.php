<p>
    {{ env('APP_NAME') }} has published a new post on {{ $log->category->name }}, titled
    <i> "{{ $log->title }}" </i>
    <br>
    You many want to check that out by the following link:
    <x-hyper-link-mail :hLink="route('page.log', $log->id)" />
</p>

<p>
    <i>
        this email is sent to {{ $email->address }} if there was a mistake or other reasons, you can cancel the
        subscription
        <x-hyper-link-mail :hLink="route('email.unsub', ['token' => $email->token, 'email' => $email->address])" />
    </i>
</p>
