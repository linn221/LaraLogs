<h3>Dear Subscriber,</h3>
<p>
    {{ env("APP_NAME") }} has published a new post on {{ $log->category }}. You many want to check that out.
    <a href="{{ route('page.log', $log->id) }}"
        {{ route('page.log', $log->id) }}
    </a>
    {{-- show tags here for later --}}

    <p>
        if there was a mistake, you can cancel the subscription <a href="#">here</a>
        <i>remember you will have to validate email address if you want to subscribe again.</i>
    </p>
</p>