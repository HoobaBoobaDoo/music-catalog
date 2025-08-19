@extends('layout.app')

@section('title','Home - Musica')

@section('content')
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
@endsection
