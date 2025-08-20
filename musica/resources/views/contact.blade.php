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
        {{-- prettier contact form --}}
        <form method="POST" action="#" class="contact-form">
            @csrf
            <h2 style="margin-bottom:12px">Send us a message</h2>

            <div class="form-grid">
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input id="firstname" name="firstname" type="text" placeholder="Your first name" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input id="lastname" name="lastname" type="text" placeholder="Your last name" required>
                </div>

                <div class="form-group">
                    <label for="email">E‑mail</label>
                    <input id="email" name="email" type="email" placeholder="your@domain.com" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone (optional)</label>
                    <input id="phone" name="phone" type="tel" placeholder="+1 (555) 555-5555">
                </div>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
            </div>

            <div class="form-row" style="align-items:center;justify-content:space-between;margin-top:10px">
                <div class="checkbox-group" style="display:flex;align-items:center;gap:8px">
                    <input type="checkbox" name="subscribe" id="subscribe">
                    <label for="subscribe" style="margin:0">Subscribe to our newsletter</label>
                </div>
                <div>
                    <button type="submit" class="btn">Send</button>
                </div>
            </div>
        </form>

        <style>
            .contact-form { max-width: 820px; }
            .contact-form .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
            .contact-form .form-group { display:flex; flex-direction:column; }
            .contact-form label { font-weight:600; margin-bottom:6px; font-size:0.95rem; }
            .contact-form input[type="text"],
            .contact-form input[type="email"],
            .contact-form input[type="tel"],
            .contact-form textarea {
                padding:10px; border:1px solid #d0d0d0; border-radius:6px; font-size:0.95rem;
                background:#fff; outline:none; width:100%;
            }
            .contact-form input:focus, .contact-form textarea:focus { border-color:#7aa7ff; box-shadow:0 0 0 3px rgba(122,167,255,0.12); }
            .contact-form .form-row { display:flex; align-items:center; }
            @media (max-width:700px) {
                .contact-form .form-grid { grid-template-columns: 1fr; }
                .contact-form .form-row { flex-direction:column; align-items:stretch; gap:10px; }
            }
        </style>

        <script>
            (function(){
                const ta = document.getElementById('message');
                if (!ta) return;
                const resize = () => { ta.style.height = 'auto'; ta.style.height = (ta.scrollHeight) + 'px'; };
                ta.addEventListener('input', resize);
                window.addEventListener('load', resize);
            })();
        </script>
    </section>
@endsection
