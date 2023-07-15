<h3>Dear user,</h3>
<p>
    Your email has been added to {{ env('APP_NAME') }} subscribe list. You will be receiving a mail for new published contents.

    If you was not you, you can cancel the subscription from <a href="{{ route('email.unsub', ['token' => $token]) }}">unsubscribe url</a>.
</p>
Thanks!