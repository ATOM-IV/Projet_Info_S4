<?php
$theme = 'style.css';
if (isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], ['style.css', 'style-dark.css'])) {
    $theme = $_COOKIE['theme'];
}
?>
<link id="theme-style" rel="stylesheet" type="text/css" href="<?php echo $theme; ?>">
<script src="../Code_JS/theme-switcher.js" defer></script>