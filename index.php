<?php
if (isset($_POST['download'])) {
    $url = trim($_POST['url']);

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $error = "Invalid URL!";
    } else {
        $filename = basename(parse_url($url, PHP_URL_PATH));

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Location: $url");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Universal Downloader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Universal Video / File Downloader</h1>
    <p>Paste any direct download link</p>

    <?php if (isset($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="url" name="url" placeholder="Paste file or video link here..." required>
        <button type="submit" name="download">Download Now</button>
    </form>

    <footer>
        <span>Built with PHP</span>
    </footer>
</div>

</body>
</html>
