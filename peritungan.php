<?php
$bobot1=10;
$bobot2=15;
$bobot3=15;
$bobot4=10;
$bobot5=15;
$bobot6=10;
$bobot7=15;

$label1="Harga"; 
$kr11="Sangat Murah";
$kr12="Murah";
$kr13="Sedang";
$kr13="Mahal";
$kr15="Sangat Mahal"; 
function getV1($v){
	$h=0;
	if($v=="Sangat Murah"){$h=100;}	
	else if($v=="Murah"){$h=80;}	
	else if($v=="Sedang"){$h=60;}
	else if($v=="Mahal"){$h=40;}
	else if($v=="Sangat Mahal"){$h=20;}
	return $h;
}                                                            
$label2="Ruangan";
$kr21="Sangat Banyak";
$kr22="Banyak";
$kr23="Sedikit";                                                              
function getV2($v){
	$h=0;
	if($v=="Sangat Banyak"){$h=100;}	
	else if("Banyak"){$h=80;}	
	else if($v=="Sedikit"){$h=60;}                                                  
	return $h;
} 

$label3="Traffic";
$kr31="Sangat Ramai";
$kr32="Ramai";
$kr33="Sepi";
function getV3($v){
$h=0;
	if($v=="Sangat Ramai"){$h=100;}	
	else if($v=="Ramai"){$h=80;}	
	else if($v=="Sepi"){$h=60;}
	return $h;
}

$label4="Visibilitas";
$kr41="Sangat Terlihat";
$kr42="Terlihat";
$kr43="Kurang Terlihat";  
$kr44="Tidak Terlihat"                                                                  
function getV4($v){
	$h=0;
	if($v=="Sangat Terlihat"){$h=100;}	
	else if($v=="Terlihat"){$h=80;}	
	else if($v=="Kurang Terlihat"){$h=60;}
	else if($v=="Tidak Terlihat"){$h=40;}
	return $h;
}
                                                                     
$label5="Tempat Parkir";																		   
$kr51="Sangat Luas";
$kr52="Luas";
$kr53="Sempit";                                                                
function getV5($v){
	$h=0;
	if($v=="Sangat Luas"){$h=90;}	
	else if($v=="Luas"){$h=80;}	
	else if($v=="Sempit"){$h=70;}
	return $h;
}

$label6="Akses";
$kr61="Sangat Banyak";
$kr62="Banyak";
$kr63="Sedang"
$kr64="Sedikit"
function getV6($v){
	$h=0;
	if($v=="Sangat Banyak"){$h=100;}	
	else if($v=="Banyak"){$h=80;}
	else if($v=="Sedang"){$h=60;}
	else if($v=="Sedikit"){$h=40;}
	return $h;
}    
                                                              
$label7="Persaingan"; 
$kr71="Sangat Banyak";
$kr72="Banyak"; 
$kr73="Sedikit";
function getV7($v){
	$h=0;
	if($v=="Sangat Banyak"){$h=70;}	 
	else if($v=="Banyak"){$h=80;}
	else if($v=="Sedikit"){$h=100;}
return $h;
}

?>