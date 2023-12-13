<?php
$full_input = $_GET;
$id = $full_input['id'];
$links_play = array();

function Getlink($url, $path_local, $id, &$links_play)
{
    $url_parts = explode('/', $url);
    $cloud = end($url_parts);
    // print($cloud."\n");
    $data = file_get_contents($url);
    $reg = '/(.*?)' . $id . '(.*?)\n/';
    preg_match_all($reg, $data, $links);

    // Check if any links are found
    if (count($links[0]) > 0) {
        foreach ($links[0] as $link) {
            $name = $link;
            $full_link = $path_local . "/Movies/" . $name;
            $links_play[] = $full_link;
            // echo $full_link;
            // echo "\n";
            // header("Location: $full_link");
            // exit;
            // http://sv1.vnshare.xyz:5244/d/hiepsv110623/Movies/(60fps)%20(Sub%20Viet)%20The%20White.Storm.3.Heaven.or.Hell.2023.2160p.HQ.WEB-DL.DDP5.1.Atmos.H.265-CHDWEB_OSPVZ2ZLODKF.mkv
        }
    } else {
        // echo "Không có link này. $id";
        // $link = "https://iptvvn.online/DangCapNhat.mkv";
        // header("Location: $link");
        // exit;
    }
}

Getlink("http://sv1.vnshare.xyz:5244/d/local/hiepsv110623%40gmail.com.txt", "http://sv1.vnshare.xyz:5244/d/hiepsv110623", $id, $links_play);
Getlink("http://sv1.vnshare.xyz:5244/d/local/mhien200986%40gmail.com.txt", "http://sv1.vnshare.xyz:5244/d/mhien200986", $id, $links_play);
Getlink("http://sv1.vnshare.xyz:5244/d/local/hoangtrat1954%40gmail.com.txt", "http://sv1.vnshare.xyz:5244/d/hoangtrat1954", $id, $links_play);
Getlink("http://sv1.vnshare.xyz:5244/d/local/hiephhp%40dhhp.edu.vn.txt", "http://sv1.vnshare.xyz:5244/d/hiephhp/", $id, $links_play);
Getlink("http://sv1.vnshare.xyz:5244/d/local/hanhnp%40vimaru.edu.vn.txt", "http://sv1.vnshare.xyz:5244/d/hanhnp", $id, $links_play);
Getlink("http://sv1.vnshare.xyz:5244/d/local/forcef5%40wwddz.onmicrosoft.com_2.txt", "http://sv1.vnshare.xyz:5244/d/vip1", $id, $links_play);

// print_r($links_play);
// Check if $links_play is not empty
if (!empty($links_play)) {
    // Randomly select one link
    $random_link = $links_play[array_rand($links_play)];
    // echo "Randomly selected link: $random_link";
    header("Location: $random_link");
    exit;
} else {
    // echo "Không có link này. $id";
    $link = "http://sv1.vnshare.xyz:5244/d/1drive_iptvvn/XiaoYing_Video_1701276944298.mp4";
    header("Location: $link");
    exit;
}
?>