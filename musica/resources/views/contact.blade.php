@extends('layout.app')

@section('title','Contact - Musica')

@section('content')
    <section class="card">
        <h1>Contact</h1>
        <h5 class="muted">Please don't be afraid to contact us!</h5>
        <p class="small">Email: <a href="mailto:hello@musica.local" class="muted">hello@musica.local</a></p>
        <div class="actions">
            <a class="btn secondary" href="/">Back to Home</a>
        </div>
    </section>
    <section class="card">
        <form>
        <h1>Send us a message!</h1>
        <input type="text" name="firstname" placeholder="Your first name" required>
        <input type="text" name="lastname" placeholder="Your last name" required>
        <input type="email" name="email" placeholder="Your e-mail" required>
        <textarea name="message" placeholder="Your message" required></textarea>
        <input type="checkbox" name="subscribe" id="subscribe">
        <label for="subscribe">Subscribe to our newsletter</label>
        <button type="submit" class="btn">Send</button>
        </form>
    </section>
@endsection
