<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Productos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #F6F5F2;
      --surface: #FFFFFF;
      --surface-subtle: #FAFAF8;
      --ink: #111827;
      --ink-secondary: #4B5563;
      --muted: #6B7280;
      --border: #E5E3DC;
      --border-strong: #D1CEC4;
      --accent: #1F4E3D;
      --accent-hover: #163A2D;
      --accent-soft: #ECFDF5;
      --accent-border: #A7F3D0;
      --warning: #B45309;
      --danger: #B91C1C;
      --danger-soft: #FEF2F2;
      --shadow-sm: 0 1px 2px rgba(17, 24, 39, 0.04);
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
    /* Top Navigation Bar */
    .topbar {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      padding: 12px 24px;
    }
    .topbar-inner {
      max-width: 1120px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13px;
      color: var(--muted);
    }
    .breadcrumb strong { color: var(--ink); font-weight: 600; }

    .container {
      max-width: 1120px;
      margin: 32px auto;
      padding: 0 24px;
    }
    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      gap: 16px;
      margin-bottom: 24px;
    }
    .page-title {
      margin: 0;
      font-size: 24px;
      font-weight: 700;
      letter-spacing: -0.025em;
      color: var(--ink);
    }
    .page-subtitle {
      margin: 4px 0 0;
      font-size: 13.5px;
      color: var(--muted);
    }
    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 16px;
      border-radius: 8px;
      background: var(--accent);
      color: #FFFFFF;
      font-size: 13.5px;
      font-weight: 500;
      text-decoration: none;
      box-shadow: var(--shadow-sm), inset 0 1px 0 rgba(255,255,255,0.12);
      transition: all 0.15s ease;
    }
    .btn-primary:hover {
      background: var(--accent-hover);
      transform: translateY(-0.5px);
    }
    .toast {
      display: flex;
      align-items: center;
      gap: 10px;
      background: var(--accent-soft);
      color: #065F46;
      border: 1px solid var(--accent-border);
      padding: 11px 16px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 13.5px;
      font-weight: 500;
    }
    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      box-shadow: var(--shadow-md);
      overflow: hidden;
    }
    .table-wrap { overflow-x: auto; }
    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }
    th {
      padding: 11px 16px;
      font-size: 11.5px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--muted);
      background: var(--surface-subtle);
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }
    td {
      padding: 14px 16px;
      border-bottom: 1px solid var(--border);
      vertical-align: middle;
    }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr { transition: background 0.12s ease; }
    tbody tr:hover { background: #FAF9F5; }

    .th-right, .td-right { text-align: right; }
    .mono {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12.5px;
      color: var(--muted);
      font-variant-numeric: tabular-nums;
    }
    .product-name {
      font-weight: 600;
      color: var(--ink);
    }
    .pill {
      display: inline-flex;
      align-items: center;
      padding: 2px 9px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 500;
      background: #F3F2EE;
      color: var(--ink-secondary);
      border: 1px solid var(--border);
    }
    .price {
      font-variant-numeric: tabular-nums;
      font-weight: 600;
      color: var(--ink);
    }
    .stock-indicator {
      display: inline-flex;
      align-items: center;
      justify-content: flex-end;
      gap: 6px;
      font-variant-numeric: tabular-nums;
      font-weight: 500;
    }
    .dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #10B981;
    }
    .dot-low { background: #F59E0B; }
    .dot-out { background: #EF4444; }

    .actions {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 6px;
    }
    .action-btn {
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 12.5px;
      font-weight: 500;
      text-decoration: none;
      border: 1px solid var(--border);
      background: var(--surface);
      color: var(--ink-secondary);
      cursor: pointer;
      font-family: inherit;
      transition: all 0.12s ease;
    }
    .action-btn:hover {
      border-color: var(--border-strong);
      color: var(--ink);
      background: var(--surface-subtle);
    }
    .action-delete {
      border-color: transparent;
      background: transparent;
      color: var(--muted);
    }
    .action-delete:hover {
      background: var(--danger-soft);
      color: var(--danger);
      border-color: #FECACA;
    }
    .empty-state {
      text-align: center;
      padding: 56px 24px !important;
      color: var(--muted);
    }
  </style>
</head>
<body>
  <header class="topbar">
    <div class="topbar-inner">
      <div class="breadcrumb">Inventario / <strong>Productos</strong></div>
      <div>{{ $products->count() }} registros</div>
    </div>
  </header>

  <main class="container">
    <div class="page-header">
      <div>
        <h1 class="page-title">Productos</h1>
        <p class="page-subtitle">Gestiona el catálogo, precios y disponibilidad de inventario.</p>
      </div>
      <a href="{{ route('products.create') }}" class="btn-primary">
        <span>+</span> Nuevo producto
      </a>
    </div>

    @if (session('success'))
      <div class="toast">✓ {{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th style="width: 90px;">ID</th>
              <th>Producto</th>
              <th>Categoría</th>
              <th class="th-right">Precio</th>
              <th class="th-right">Stock</th>
              <th class="th-right" style="width: 160px;">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($products as $product)
              <tr>
                <td class="mono">#{{ str_pad($product->product_id, 4, '0', STR_PAD_LEFT) }}</td>
                <td class="product-name">{{ $product->name }}</td>
                <td>
                  @if ($product->category?->name)
                    <span class="pill">{{ $product->category->name }}</span>
                  @else
                    <span class="mono">—</span>
                  @endif
                </td>
                <td class="td-right price">${{ number_format((float) $product->price, 2) }}</td>
                <td class="td-right">
                  <span class="stock-indicator">
                    <span class="dot {{ $product->stock == 0 ? 'dot-out' : ($product->stock <= 5 ? 'dot-low' : '') }}"></span>
                    {{ $product->stock }}
                  </span>
                </td>
                <td>
                  <div class="actions">
                    <a href="{{ route('products.edit', $product) }}" class="action-btn">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar producto?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="action-btn action-delete">Eliminar</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="empty-state">No hay productos registrados en el catálogo.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>