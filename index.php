<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="img/favicon.svg" />
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="img/site.webmanifest" />
    <link href="lib/bootstrap@5.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenon Network &bull; Network of Momentum</title>
</head>
<body class="homepage">

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php" aria-label="Home"></a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="https://zenon.network/">Zenon Network</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/zenon-network/zenon.network/releases/tag/whitepaper">Whitepaper</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.satoshisl1.com/">A Revolution</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://app.uniswap.org/tokens/ethereum/0xb2e96a63479c2edd2fd62b382c89d5ca79f572d3">Buy Zenon</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tools
          </a>

          <ul class="dropdown-menu" aria-labelledby="toolsDropdown">
            <li><a class="dropdown-item" href="frontier-reward.php">Frontier reward</a></li>
            <li><a class="dropdown-item" href="uncollected-rewards.php">Uncollected rewards</a></li>
            <li><a class="dropdown-item" href="unwrap-token-requests.php">Unwrap token requests</a></li>
            <li><a class="dropdown-item" href="liquidity-stake-entries.php">Liquidity stake entries</a></li>
            <li><a class="dropdown-item" href="all-unwrap-token-requests.php">All unwrap token requests</a></li>
            <li><a class="dropdown-item" href="all-unsigned-wrap-token-requests.php">All unsigned wrap token requests</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <span class="nav-link navbar-price" id="navbarPrices"></span>
        </li>

      </ul>
    </div>
  </div>
</nav>


    <main class="homepage-hero">
        <div class="container">
            <div class="logo-wrap">
                <img class="logo" src="img/zn.svg" alt="ZN logo">
            </div>
            <p class="homepage-kicker">Network of Momentum</p>
        </div>
    </main>

<script>
const navbarPrices = document.getElementById('navbarPrices');
if (navbarPrices) {
    fetch('api/prices.php')
        .then(response => response.ok ? response.json() : null)
        .then(payload => {
            if (!payload || !Array.isArray(payload.data)) {
                return;
            }

            navbarPrices.textContent = payload.data
                .filter(item => item.symbol && item.price)
                .map(item => `${item.symbol} $${item.price}`)
                .join(' ');
        })
        .catch(() => {});
}
</script>
<script src="lib/bootstrap@5.3.6/js/bootstrap.bundle.min.js"></script>

</body>
</html>
