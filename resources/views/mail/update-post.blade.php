<h3>Dear Subscriber,</h3>
<p>
    {{ env('APP_NAME') }} has updated the post you are follwing, <strong> {{ $log->title }} </strong>

    {{-- <strong>* {{ $update_title }}
    </strong> --}}
    You many want to check that out.
    <a href="{{ route('page.log', $log->id) }}" {{ route('page.log', $log->id) }} </a>
        {{-- show tags here for later --}}

        <p>
            you can unfollow the post <a href="#">here</a>
        </p>
</p>