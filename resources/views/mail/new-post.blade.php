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
    <x-hyper-link-mail :hLink="route('page.log', $log->id)" />
</p>

<p>
    <i>
        this email is sent to {{ $email->address }} if there was a mistake or other reasons, you can cancel the
        subscription
        <x-hyper-link-mail :hLink="route('email.unsub', ['token' => $email->token, 'email' => $email->address])" />
    </i>
    <br>
    @if (!$email->verfied_at)
        <i>
            you can <strong>verify</strong> your email for commenting,
            <x-hyper-link-mail :hLink="route('email.verify', ['token' => $email->token, 'email' => $email->address])" />
        </i>
        <br>
    @endif
    Thanks!
</p>
