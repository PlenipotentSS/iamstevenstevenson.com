<?php 
  header("Content-type: image/svg+xml");
  print('<?xml version="1.0" encoding="iso-8859-1" standalone="no"?>');
  parse_str($_SERVER['QUERY_STRING'], $params);

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

  if (array_key_exists("cookbook",$params)) {
    $commit = $params["cookbook"]
    ?>
<svg height="20" width="198" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="smooth" x2="0" y2="100%"></linearGradient><stop offset="0" stop-color="#bbb" stop-opacity=".1"></stop><stop offset="1" stop-opacity=".1"></stop><mask id="round"><rect fill="#fff" height="20" rx="3" width="198"></rect></mask><g mask="url(#round)"><rect fill="#555" height="20" width="108"></rect><rect fill="#4c1" height="20" width="90" x="108"></rect><rect fill="url(#smooth)" height="20" width="198"></rect></g><g fill="#fff" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11" text-anchor="middle"><text fill="#010101" fill-opacity=".3" x="54" y="15">current commit</text><text x="54" y="14">current commit</text><text fill="#010101" fill-opacity=".3" x="152" y="15"><?php echo $commit ?></text><text x="152" y="14"><?php echo $commit ?></text></g></svg>
    <?php
  } else if (array_key_exists("ip",$params)) {
    $ip = $params["ip"]
    if (check_alive("https://" . $ip, 100)) { ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/SVG/DTD/svg10.dtd">
<svg xmlns="http://www.w3.org/2000/svg" width="99" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><rect rx="3" width="99" height="20" fill="#555"/><rect rx="3" x="63" width="36" height="20" fill="#4c1"/><path fill="#4c1" d="M63 0h4v20h-4z"/><rect rx="3" width="99" height="20" fill="url(#a)"/><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="32.5" y="15" fill="#010101" fill-opacity=".3">elevator</text><text x="32.5" y="14">elevator</text><text x="80" y="15" fill="#010101" fill-opacity=".3">up</text><text x="80" y="14">up</text></g></svg>
    <?php } else { ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/SVG/DTD/svg10.dtd">
<svg xmlns="http://www.w3.org/2000/svg" width="99" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><rect rx="3" width="99" height="20" fill="#555"/><rect rx="3" x="63" width="36" height="20" fill="#e05d44"/><path fill="#e05d44" d="M63 0h4v20h-4z"/><rect rx="3" width="99" height="20" fill="url(#a)"/><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="32.5" y="15" fill="#010101" fill-opacity=".3">elevator</text><text x="32.5" y="14">elevator</text><text x="80" y="15" fill="#010101" fill-opacity=".3">down</text><text x="80" y="14">down</text></g></svg>
    <?php }
  } else {
    if (check_alive("https://goelevator.com", 100)) { ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/SVG/DTD/svg10.dtd">
<svg xmlns="http://www.w3.org/2000/svg" width="99" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><rect rx="3" width="99" height="20" fill="#555"/><rect rx="3" x="63" width="36" height="20" fill="#4c1"/><path fill="#4c1" d="M63 0h4v20h-4z"/><rect rx="3" width="99" height="20" fill="url(#a)"/><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="32.5" y="15" fill="#010101" fill-opacity=".3">elevator</text><text x="32.5" y="14">elevator</text><text x="80" y="15" fill="#010101" fill-opacity=".3">up</text><text x="80" y="14">up</text></g></svg>
    <?php } else { ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/SVG/DTD/svg10.dtd">
<svg xmlns="http://www.w3.org/2000/svg" width="99" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><rect rx="3" width="99" height="20" fill="#555"/><rect rx="3" x="63" width="36" height="20" fill="#e05d44"/><path fill="#e05d44" d="M63 0h4v20h-4z"/><rect rx="3" width="99" height="20" fill="url(#a)"/><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="32.5" y="15" fill="#010101" fill-opacity=".3">elevator</text><text x="32.5" y="14">elevator</text><text x="80" y="15" fill="#010101" fill-opacity=".3">down</text><text x="80" y="14">down</text></g></svg>
    <?php }
  }

?>