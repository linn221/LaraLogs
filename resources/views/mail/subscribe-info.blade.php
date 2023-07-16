<h3>Dear user,</h3>
@if ($action == 'success')
    <p>
        Your email has been added to {{ env('APP_NAME') }} subscribe list. You will be receiving a mail for new
        published contents.
        <br>

        If you was not you, you can cancel the subscription from
        <x-hyper-link-mail :hLink="route('email.unsub', ['token' => $email->token, 'email' => $email->address])" />

        <br>
        <i>
            you can <strong>verify</strong> your email for commenting,
            <x-hyper-link-mail :hLink="route('email.verify', ['token' => $email->token, 'email' => $email->address])" />
        </i>
    </p>
@elseif ($action == 'cancel')
    <p>
        Your subscription has been canceled from {{ env('APP_NAME') }} subscribe list. You will not be receiving mails
        for new published contents.
        <br>
        If you later want to subscribe, use the following link, <strong>you can not subscribe with this email by any
            other
            means.</strong>
        <x-hyper-link-mail :hLink="route('email.resub', ['token' => $email->token, 'email' => $email->address])" />
    </p>
@elseif ($action == 'verified')
    <p>
        Your email has been verified by {{ env('APP_NAME') }}!
    </p>
    But you can still unsubscribe our new posts from the following link:
    <x-hyper-link-mail :hLink="route('email.unsub', ['token' => $email->token, 'email' => $email->address])" />
@endif

<p>
    Thanks!
</p>
