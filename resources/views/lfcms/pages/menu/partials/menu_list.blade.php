<table class="table">
  <thead>
      <tr>
          <th>Nama Menu</th>
          <th>URL</th>
          <th>Ikon</th>
          <th>Aksi</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($menus as $menu)
          <tr>
              <td>{{ $menu->name }}</td>
              <td>{{ $menu->url }}</td>
              <td>{{ $menu->ikon }}</td>
              <td>
                  <a href="#" class="btn btn-sm btn-primary">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger">Hapus</a>
              </td>
          </tr>
      @endforeach
  </tbody>
</table>
