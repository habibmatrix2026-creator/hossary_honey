<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Responsive Shopping Cart</title>
    @livewireStyles
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --bg: #f8fafc;
            --surface: #ffffff;
            --text: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            padding: 2rem 1rem;
            line-height: 1.5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        h1 {
            margin-bottom: 2rem;
            font-size: 1.75rem;
        }

        .cart-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .cart-wrapper {
                flex-direction: row;
                align-items: flex-start;
            }
        }

        /* Cart Items Section */
        .cart-items {
            flex: 2;
            background: var(--surface);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-details {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .item-img {
            width: 70px;
            height: 70px;
            background-color: #cbd5e1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #fff;
        }

        .item-info .item-name {
            font-weight: 600;
            font-size: 1rem;
        }

        .item-info .item-price {
            color: var(--text-muted);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
        }

        .qty-btn {
            background: none;
            border: none;
            padding: 0.5rem 0.75rem;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            transition: background 0.2s;
        }

        .qty-btn:hover {
            background-color: var(--bg);
        }

        .qty-val {
            padding: 0 0.75rem;
            font-weight: 500;
            min-width: 25px;
            text-align: center;
        }

        .item-total-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .item-total-price {
            font-weight: 600;
            min-width: 70px;
            text-align: right;
        }

        .remove-btn {
            background: none;
            border: none;
            color: var(--danger);
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .remove-btn:hover {
            text-decoration: underline;
        }

        /* Order Summary Section */
        .cart-summary {
            flex: 1;
            background: var(--surface);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: sticky;
            top: 2rem;
        }

        .summary-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 0.75rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            color: var(--text-muted);
        }

        .summary-row.total {
            color: var(--text);
            font-weight: 700;
            font-size: 1.25rem;
            border-top: 1px solid var(--border);
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .checkout-btn {
            width: 100%;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.2s;
        }

        .checkout-btn:hover {
            background-color: var(--primary-hover);
        }

        .empty-message {
            text-align: center;
            color: var(--text-muted);
            padding: 2rem 0;
            display: none;
        }
    </style>
</head>
<body>

@livewire("home.cart")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
@livewireScripts
</body>
</html>
