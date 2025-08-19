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
                    <th>Title</th>
                    <th>Artist</th>
                    <th class="small">Release Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Song 1</td>
                    <td>Artist A</td>
                    <td class="small">2024-01-01</td>
                </tr>
                <tr>
                    <td>Song 2</td>
                    <td>Artist B</td>
                    <td class="small">2023-01-01</td>
                </tr>
                <tr>
                    <td>Song 3</td>
                    <td>Artist C</td>
                    <td class="small">2022-01-01</td>
                </tr>
                <tr>
                    <td>Song 4</td>
                    <td>Artist D</td>
                    <td class="small">2021-01-01</td>
                </tr>
                <tr>
                    <td>Song 5</td>
                    <td>Artist E</td>
                    <td class="small">2020-01-01</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="card">
        <form>
        <h1>Add an album!</h1>
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="artist" placeholder="Artist" required>
        <input type="date" name="date" placeholder="Release Date" required>
        <input type="text" name="genre" id="genre" placeholder="Genre" required>
        <input type="text" name="songs" placeholder="Songs" required>
        <input type="text" name="producer" placeholder="Producer" required>
        <input type="image" name="cover" placeholder="Cover Image" required>
        <button type="submit" class="btn">Send</button>
        </form>
    </section>
@endsection
