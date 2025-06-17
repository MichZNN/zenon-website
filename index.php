<?php
require_once("wznn_data.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link href="https://zenon.turmin.com/lib/bootstrap@5.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://zenon.turmin.com/css/index.css" rel="stylesheet">
    <link href="https://zenon.turmin.com/css/custom.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenon Network &bull; Network of Momentum</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#"></a>

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
            <li><a class="dropdown-item" href="https://zenon.turmin.com/frontier-reward.php">Frontier reward</a></li>
            <li><a class="dropdown-item" href="https://zenon.turmin.com/uncollected-rewards.php">Uncollected rewards</a></li>
            <li><a class="dropdown-item" href="https://zenon.turmin.com/unwrap-token-requests.php">Unwrap token requests</a></li>
            <li><a class="dropdown-item" href="https://zenon.turmin.com/liquidity-stake-entries.php">Liquidity stake entries</a></li>
            <li><a class="dropdown-item" href="https://zenon.turmin.com/all-unwrap-token-requests.php">All unwrap token requests</a></li>
            <li><a class="dropdown-item" href="https://zenon.turmin.com/all-unsigned-wrap-token-requests.php">All unsigned wrap token requests</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <span class="nav-link"><?php if(isset($wznn_price_usd)) echo '&dollar;' . $wznn_price_usd; ?></span>
        </li>

      </ul>
    </div>
  </div>
</nav>


    <div class="container">
        <div class="logo">
            <div>Z</div>
            <div class="N">N</div>
        </div>
    </div>

<script src="lib/bootstrap@5.3.6/js/bootstrap.bundle.min.js"></script>

</body>
</html>
