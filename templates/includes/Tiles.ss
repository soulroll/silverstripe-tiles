<div class="container">
  <% loop $TileRows %>
    <div class="row">
      <% loop $Tiles %>
        <div class="$Top.TilesClass($Up.ID)">
          <div class="card">
            <h3>$Title</h3>
            <p>$Description</p>
          </div>
        </div>
      <% end_loop %>
    </div>
  <% end_loop %>
</div>
