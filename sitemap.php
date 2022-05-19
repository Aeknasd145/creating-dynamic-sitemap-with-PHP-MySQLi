<?php header('Content-type: application/xml; charset=utf-8'); 
echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

require_once("connect.php");
$post_query = $conn->query("SELECT * FROM table WHERE condition ");

$site = 'https://'.$_SERVER["HTTP_HOST"];

while($post_reader = mysqli_fetch_array($post_query)){
      echo '
    <url>
      <loc>'.$site.'/'.$post_reader["post_url"].'</loc>
      <lastmod>'.date('c', strtotime($post_reader["post_last_update"])).'</lastmod>
    </url>';  
}

echo '
</urlset>';
?>
