<h3>
    Dear Subscriber,
</h3>
    <p>
        Your subscription has been canceled from {{ env('APP_NAME') }} subscribe list. You will not be receiving mails
        for new published contents.
        <br>
        If you later want to subscribe, use the following link, <strong>you can not subscribe with this email by any other
            means.</strong>
        <x-hyper-link-mail :hLink="route('email.resub', ['token' => $email->token, 'email' => $email->address])" hText='keep me if you want to subscribe again'/>
    </p>
<p>
    Thanks
</p>