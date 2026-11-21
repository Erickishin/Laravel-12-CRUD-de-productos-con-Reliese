<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar producto #{{ $product->product_id }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #F6F5F2;
      --surface: #FFFFFF;
      --surface-subtle: #FAFAF8;
      --ink: #111827;
      --ink-secondary: #374151;
      --muted: #6B7280;
      --border: #E5E3DC;
      --accent: #1F4E3D;
      --accent-hover: #163A2D;
      --danger: #B91C1C;
      --shadow-md: 0 4px 12px -2px rgba(17, 24, 39, 0.05), 0 1px 3px rgba(17, 24, 39, 0.03);
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      background: var(--bg);
      color: var(--ink);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      font-size: 14px;
      line-height: 1.5;
      -webkit-font-smoothing: antialiased;
    }
    .topbar {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      padding: 12px 24px;
    }
    .topbar-inner {
      max-width: 760px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13px;
    }
    .back-link {
      color: var(--muted);
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .back-link:hover { color: var(--ink); }
    .record-meta {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      color: var(--muted);
    }

    .container {
      max-width: 760px;
      margin: 32px auto 60px;
      padding: 0 24px;
    }
    .page-header {
      margin-bottom: 24px;
    }
    h1 {
      margin: 0;
      font-size: 22px;
      font-weight: 700;
      letter-spacing: -0.025em;
    }
    .page-subtitle {
      margin: 4px 0 0;
      font-size: 13.5px;
      color: var(--muted);
    }
    .section-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      box-shadow: var(--shadow-md);
      margin-bottom: 20px;
      overflow: hidden;
    }
    .section-header {
      padding: 16px 24px;
      border-bottom: 1px solid var(--border);
      background: var(--surface-subtle);
    }
    .section-title {
      margin: 0;
      font-size: 14px;
      font-weight: 600;
    }
    .section-body { padding: 24px; }

    .field { margin-bottom: 18px; }
    .field:last-child { margin-bottom: 0; }
    .grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }
    @media (max-width: 560px) { .grid-2 { grid-template-columns: 1fr; } }

    label {
      display: block;
      margin-bottom: 6px;
      font-size: 13px;
      font-weight: 500;
      color: var(--ink-secondary);
    }
    input, select, textarea {
      width: 100%;
      padding: 9px 12px;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: var(--surface);
      color: var(--ink);
      font-family: inherit;
      font-size: 14px;
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(31, 78, 61, 0.12);
    }
    textarea { min-height: 92px; resize: vertical; }

    .input-affix {
      display: flex;
      align-items: center;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: var(--surface);
      overflow: hidden;
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    .input-affix:focus-within {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(31, 78, 61, 0.12);
    }
    .input-affix span {
      padding: 0 11px;
      color: var(--muted);
      font-size: 13px;
      background: var(--surface-subtle);
      align-self: stretch;
      display: flex;
      align-items: center;
      border-right: 1px solid var(--border);
    }
    .input-affix input {
      border: none;
      box-shadow: none !important;
      border-radius: 0;
    }

    .error {
      margin: 5px 0 0;
      color: var(--danger);
      font-size: 12.5px;
    }
    .footer-bar {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 12px;
      padding-top: 8px;
    }
    .btn-cancel {
      padding: 9px 16px;
      border-radius: 8px;
      border: 1px solid var(--border);
      background: var(--surface);
      color: var(--ink-secondary);
      text-decoration: none;
      font-size: 13.5px;
      font-weight: 500;
    }
    .btn-cancel:hover { background: var(--surface-subtle); color: var(--ink); }
    .btn-submit {
      padding: 9px 18px;
      border: none;
      border-radius: 8px;
      background: var(--accent);
      color: #FFFFFF;
      font-family: inherit;
      font-size: 13.5px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.15s ease;
    }
    .btn-submit:hover { background: var(--accent-hover); }
  </style>
</head>
<body>
  <header class="topbar">
    <div class="topbar-inner">
      <a href="{{ route('products.index') }}" class="back-link">← Productos</a>
      <span class="record-meta">ID #{{ str_pad($product->product_id, 4, '0', STR_PAD_LEFT) }}</span>
    </div>
  </header>

  <main class="container">
    <div class="page-header">
      <h1>Editar producto #{{ $product->product_id }}</h1>
      <p class="page-subtitle">Actualiza los datos principales, precio o existencias de este registro.</p>
    </div>

    <form action="{{ route('products.update', $product) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="section-card">
        <div class="section-header">
          <h2 class="section-title">Información general</h2>
        </div>
        <div class="section-body">
          <div class="field">
            <label for="name">Nombre del producto</label>
            <input id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror
          </div>

          <div class="field">
            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id" required>
              <option value="">Seleccione...</option>
              @foreach ($categories as $category)
                <option value="{{ $category->category_id }}" @selected(old('category_id', $product->category_id) == $category->category_id)>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id') <p class="error">{{ $message }}</p> @enderror
          </div>

          <div class="field">
            <label for="description">Descripción</label>
            <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
            @error('description') <p class="error">{{ $message }}</p> @enderror
          </div>
        </div>
      </div>

      <div class="section-card">
        <div class="section-header">
          <h2 class="section-title">Precio e inventario</h2>
        </div>
        <div class="section-body">
          <div class="grid-2">
            <div class="field">
              <label for="price">Precio unitario</label>
              <div class="input-affix">
                <span>$</span>
                <input type="number" id="price" name="price" min="0" step="0.01" value="{{ old('price', $product->price) }}" required>
              </div>
              @error('price') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
              <label for="stock">Stock disponible</label>
              <div class="input-affix">
                <span>Uds.</span>
                <input type="number" id="stock" name="stock" min="0" step="1" value="{{ old('stock', $product->stock) }}" required>
              </div>
              @error('stock') <p class="error">{{ $message }}</p> @enderror
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bar">
        <a href="{{ route('products.index') }}" class="btn-cancel">Cancelar</a>
        <button type="submit" class="btn-submit">Actualizar producto</button>
      </div>
    </form>
  </main>
</body>
</html>