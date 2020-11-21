<html><head></head>
<body>
	<?php 

        $src = imagecreatefrompng("images/KTA.png");
        $foto = imagecreatefrompng("images/download.jpg.png");
//ngambil ukuran gambar dua
$o_gambar_duaX = imagesx($foto);
$o_gambar_duaY = imagesy($foto);
 
//melakukan merging $filedekode1, $filedekode2, koordinat kiri, koordinat atas, jarak geser kiri, jarak geser kanan, koordinat kanan, koordinat bawah, persen transparansi
 
imagecopymerge( $src, $foto, 250, 300, 20, 30, $o_gambar_duaX, $o_gambar_duaY, 10);

imagepng($src)
?>
	
</body>
</html>