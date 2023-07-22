<h3>Dear Subscriber,</h3>
<p>
    {{ env('APP_NAME') }} has {{ $action }} the post you are follwing, <strong> {{ $log->title }} </strong>

    {{-- <strong>* {{ $update_title }}
    </strong> --}}
    You many want to check that out.
    <a href="{{ route('page.log', $log->id) }}" {{ route('page.log', $log->id) }} </a>
        {{-- show tags here for later --}}

        <p>
            You can unfollow the post by the following link.
        <x-hyper-link-mail :hLink="route('email.unfollow', ['token' => $email->token, 'email-address' => $email->address, 'log-id' => $log->id])" />
        </p>
</p>