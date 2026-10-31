
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil Gereja | GITJ Gabus</title>
</head>
<body>
    <h1>Edit Profil Gereja GITJ Gabus</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Gereja</label><br>
        <input type="text" name="nama_gereja"
            value="{{ old('nama_gereja', $profil->nama_gereja) }}" required>
        <br><br>

        <label>Sejarah Gereja</label><br>
        <textarea name="sejarah" rows="5">{{ old('sejarah', $profil->sejarah) }}</textarea>
        <br><br>

        <label>Visi</label><br>
        <textarea name="visi" rows="3">{{ old('visi', $profil->visi) }}</textarea>
        <br><br>

        <label>Misi</label><br>
        <textarea name="misi" rows="5">{{ old('misi', $profil->misi) }}</textarea>
        <br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" rows="3">{{ old('alamat', $profil->alamat) }}</textarea>
        <br><br>

        <label>Telepon</label><br>
        <input type="text" name="telepon"
            value="{{ old('telepon', $profil->telepon) }}">
        <br><br>

        <label>Email</label><br>
        <input type="email" name="email"
            value="{{ old('email', $profil->email) }}">
        <br><br>

        <label>URL Google Maps Embed</label><br>
        <input type="url" name="maps_embed_url"
            value="{{ old('maps_embed_url', $profil->maps_embed_url) }}"
            style="width: 350px">
        <br><br>

        <button type="submit">Simpan Profil</button>
        <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
    </form>
</body>
</html>
