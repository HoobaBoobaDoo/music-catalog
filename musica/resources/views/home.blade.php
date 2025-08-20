@extends('layout.app')

@section('title','Home - Musica')

@section('content')
@auth
    <section class="hero card">
        <h1>Welcome to Musica</h1>
        <h5>Your one-stop solution for all music needs</h5>
        <div class="actions">
            <a class="btn" href="/admin/records">Browse Catalog</a>
            <a class="btn secondary" href="/contact">Contact Us</a>
        </div>
    </section>

    <section class="card">
        <h3>Featured</h3>
        <p class="muted small">New releases, curated playlists, and staff picks to explore.</p>
    </section>
    @else
    <section class="hero card">
        <h1>Welcome to Musica</h1>
        <h5>Your one-stop solution for all music needs</h5>
        <!-- Login: -->
        <div class="card">
            <h2>Login</h2>
            <form method="POST" action="/login" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">E‑mail</label>
                    <input id="email" name="email" type="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <!-- Register: -->
            <h2>Register</h2>
            <form method="POST" action="/register" class="register-form">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">E‑mail</label>
                    <input id="email" name="email" type="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    @endauth
@endsection
