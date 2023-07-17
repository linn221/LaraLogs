<h3>Dear Subscriber,</h3>

<p>
    Your email has been added to {{ env('APP_NAME') }} subscribe list. You will be receiving a mail for new
    published contents.
    <br>

    If you was not you or other reasons, you can cancel the subscription from
    <x-hyper-link-mail :hLink="route('email.unsub', ['token' => $email->token, 'email' => $email->address])" />
</p>

<p>
    Thanks
</p>
