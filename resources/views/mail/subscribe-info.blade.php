<h3>Dear user,</h3>
@if ($action == 'success')
    <p>
        Your email has been added to {{ env('APP_NAME') }} subscribe list. You will be receiving a mail for new
        published contents.

        If you was not you, you can cancel the subscription from <a
            href="{{ route('email.unsub', ['token' => $email->token, 'email' => $email->address]) }}">unsubscribe
            url</a>.
    </p>
    Thanks!
@elseif ($action == 'cancel')
    <p>
        Your subscription has been canceled from {{ env('APP_NAME') }} subscribe list. You will not be receiving mails
        for new published contents.

    </p>
@elseif ($action == 'verified')
    <p>
        Your email has been verified by {{ env("APP_NAME") }}!
    </p>
@endif

Thanks!