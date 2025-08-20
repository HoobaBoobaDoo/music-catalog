@extends('layout.app')

@section('title','Admin - Records')

@section('content')
    <section class="card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <div>
                <h1>Admin panel</h1>
                <p class="small muted">Manage music records</p>
            </div>
            <div>
                <a class="btn" href="#">Add Record</a>
            </div>
        </div>

        <table aria-label="Records table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th class="small">Genre</th>
                    <th class="small">Producer</th>
                    <th class="small">Songs</th>
                    <th class="small">Release Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td><img src="{{ asset('storage/' . $album->image) }}" alt="Cover for {{ $album->title }}" style="max-width:60px;max-height:60px;object-fit:cover;border-radius:4px"/></td>
                        <td>{{ $album->title }}</td>
                        <td>{{ $album->artist }}</td>
                        <td>{{$album->genre}}</td>
                        <td>{{$album->producer}}</td>
                        <td>{{$album->songs}}</td>
                        <td class="small">{{ $album->release_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="card">
        {{-- prettier album form --}}
    <form method="POST" action="{{ route('albums.store') }}" class="album-form" enctype="multipart/form-data">
            @csrf
            <h2 style="margin-bottom:12px">Add an album</h2>

            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" placeholder="Album title" required>
                </div>

                <div class="form-group">
                    <label for="artist">Artist</label>
                    <input id="artist" name="artist" type="text" placeholder="Artist name" required>
                </div>

                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input id="release_date" name="release_date" type="date" required>
                </div>

                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input id="genre" name="genre" list="genres" placeholder="Choose or type a genre" required>
                    <datalist id="genres">
                        <option>Rock</option>
                        <option>Pop</option>
                        <option>Jazz</option>
                        <option>Electronic</option>
                        <option>Hip Hop</option>
                        <option>Classical</option>
                        <option>Folk</option>
                    </datalist>
                </div>
            </div>

            <div class="form-group">
                <label for="songs">Songs (one per line)</label>
                <textarea id="songs" name="songs" rows="4" placeholder="Track 1&#10;Track 2&#10;Track 3" required></textarea>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="producer">Producer</label>
                    <input id="producer" name="producer" type="text" placeholder="Producer name">
                </div>

                <div class="form-group">
                    <label for="image">Cover Image</label>
                    <input id="image" name="image" type="file" accept="image/*">
                    <div class="cover-preview" aria-hidden="true">
                        <img id="coverPreview" src="#" alt="Cover preview" style="display:none">
                    </div>
                </div>
            </div>

            <div class="form-actions" style="margin-top:12px">
                <button type="submit" class="btn">Add Album</button>
            </div>
        </form>

        {{-- scoped styles --}}
        <style>
            .album-form { max-width: 820px; }
            .album-form .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
            .album-form .form-group { display:flex; flex-direction:column; }
            .album-form label { font-weight:600; margin-bottom:6px; font-size:0.95rem; }
            .album-form input[type="text"],
            .album-form input[type="date"],
            .album-form input[list],
            .album-form input[type="file"],
            .album-form textarea {
                padding:10px; border:1px solid #d0d0d0; border-radius:6px; font-size:0.95rem;
                background:#fff; outline:none;
            }
            .album-form input:focus, .album-form textarea:focus { border-color:#7aa7ff; box-shadow:0 0 0 3px rgba(122,167,255,0.12); }
            .cover-preview img { max-width:140px; max-height:140px; object-fit:cover; border-radius:6px; margin-top:8px; border:1px solid #e6e6e6; }
            .form-actions { text-align:right; }
            @media (max-width:700px) {
                .album-form .form-grid { grid-template-columns: 1fr; }
                .form-actions { text-align:left; }
            }
        </style>

        {{-- small script for cover preview --}}
        <script>
            (function(){
                const cover = document.getElementById('cover');
                const preview = document.getElementById('coverPreview');
                if (!cover || !preview) return;
                cover.addEventListener('change', function(e){
                    const file = e.target.files && e.target.files[0];
                    if (!file) { preview.src = '#'; preview.style.display = 'none'; return; }
                    const reader = new FileReader();
                    reader.onload = function(ev){
                        preview.src = ev.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                });
            })();
        </script>
    </section>
@endsection
