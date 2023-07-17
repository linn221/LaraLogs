    <h3>
        Dear Subscriber,
    </h3>
    <p>
        You have been added to our subscription list again. You will be receiving mails for newly published posts.
        <br>
        You are free to cancel subscription from the following link.
        <x-hyper-link-mail :hLink="route('email.unsub', ['token' => $email->token, 'email' => $email->address])" />
    </p>
    <p>
        Thanks
    </p>