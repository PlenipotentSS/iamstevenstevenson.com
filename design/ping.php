<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>';?>
<?php

  function check_alive($url, $timeout = 10) {
    $ch = curl_init($url);

    // Set request options
    curl_setopt_array($ch, array(
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_NOBODY => true,
      CURLOPT_TIMEOUT => $timeout,
      CURLOPT_USERAGENT => "page-check/1.0" 
    ));

    // Execute request
    curl_exec($ch);

    // Check if an error occurred
    if(curl_errno($ch)) {
      curl_close($ch);
      return false;
    }

    // Get HTTP response code
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Page is alive if 200 OK is received
    return $code === 200;
  }

  if (check_alive("https://goelevator.com", 20)) { ?>
<svg xmlns="http://www.w3.org/2000/svg" width="99" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><rect rx="3" width="99" height="20" fill="#555"/><rect rx="3" x="63" width="36" height="20" fill="#4c1"/><path fill="#4c1" d="M63 0h4v20h-4z"/><rect rx="3" width="99" height="20" fill="url(#a)"/><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="32.5" y="15" fill="#010101" fill-opacity=".3">elevator</text><text x="32.5" y="14">elevator</text><text x="80" y="15" fill="#010101" fill-opacity=".3">Up</text><text x="80" y="14">Up</text></g></svg>
  <?php } else { ?>
<svg xmlns="http://www.w3.org/2000/svg" width="99" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><rect rx="3" width="99" height="20" fill="#555"/><rect rx="3" x="63" width="36" height="20" fill="#e05d44"/><path fill="#e05d44" d="M63 0h4v20h-4z"/><rect rx="3" width="99" height="20" fill="url(#a)"/><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="32.5" y="15" fill="#010101" fill-opacity=".3">elevator</text><text x="32.5" y="14">elevator</text><text x="80" y="15" fill="#010101" fill-opacity=".3">Down</text><text x="80" y="14">Down</text></g></svg>
  <?php }

?>