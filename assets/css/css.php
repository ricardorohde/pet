<?php

header("Content-type: text/css");

$urlImages = dirname(__FILE__).'/..';

function image_to_base64($path_to_image){ 
    $type = pathinfo($path_to_image, PATHINFO_EXTENSION);
    $image = file_get_contents($path_to_image);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
    return $base64;
}

?>

.valor-image {
	position: absolute;
	top: -10px;
	right: 30px;
	background: #FF4500;
	padding: 5px 10px;
	box-shadow: 1px 1px 3px rgba(0,0,0,0.3);
	text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
	color: #fff;
}

.metros-image {
	position: absolute;
	bottom: 0px;
	right: 50px;
	background: transparent;
	color: rgba(255,255,255,0.8);
	font-size: 40px !important;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
}

.descricao-inicial {
	height: 60px;
	overflow: hidden;
}

.conte-inicial {
	margin-top: 15px;
}

.a-anuncio {
	width: 100%;
	display: block;
}

.espaco-top-bottom {
	margin-top: 50px;
	margin-bottom: 150px;
}

span.left {
	margin-left: 2px;
}

span.left-inicial {
	margin-left: 20px;
}

g > text , .ac-legend > table{
	font-size: 10px;
	padding-left: 2px;
	text-transform: capitalize;
}

.title-anuncio {
	white-space: nowrap;
	overflow: hidden;
	margin: 0px;
	padding: 0px;
}

.panel-title {
	text-decoration: none;
	font-size: 15px;
}

.font-80 {
	font-size: 85%;
}

.td-contagem {
	padding-left: 10px;
	color: #777;
	overflow: hidden;
}

.btn.btn-default.icones {
	height: 34px;
}

.count {
	position: absolute;
	top: 20%;
	right: 15%;
	font-size: 14px;
	font-weight: normal;
	background: rgba(200,41,41,0.75);
	color: rgb(255,255,255);
	line-height: 1em;
	padding: 4px 8px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-ms-border-radius: 10px;
	-o-border-radius: 10px;
	border-radius: 10px;
}

.panel-body > h4 {
	margin-top:0px;
	margin-bottom:0px;
}

div.busca-inicial {
	background-color: rgba(0,0,0,0.5);
	border-radius: 5px;
	padding: 15px;
	color: #fff !important;
}

div.anuncio {
	
}

h4.titulo-anuncio {
	margin-top: 0px;
}

.modal-padding {
	padding-left: 2px;
	padding-right: 2px;
}

.padding-left{
	padding-left: 0px;
}

.bottom {
	margin-bottom: 0px;
}

.top {
	margin-top: 10px;
}

.table-config {
	overflow-y:scroll;
	height:300px;
}

.border-bottom-gray {
	border-bottom: 1px solid rgba(0,0,0,0.3);
}

div.jumbotron > div {
	font-family: 'Open Sans','Droid Sans',Arial;
}

div.row {
	font-family: 'Open Sans','Droid Sans',Arial;
}

h5.titulo-inicial {
	font-family: 'Open Sans','Droid Sans',Arial;
	font-size: 18px;
	color: #fff;
	text-shadow: 1px -1px 7px #000;
	margin: 0;
	text-align: center;
	margin: 10px auto;
}

.jumbotron{
	padding-bottom:0px;
}

.espacoTopBottom{
	margin: 100px 0px;
}

/* UTIL */

.centered{
    text-align:center;
}

.bold-font{
	font-weight: bold;
}

textarea { resize: vertical; }

.hand{
	cursor: pointer;
}

.margin-right{
	margin-right: 5px;
}

/* IMAGE */
.thumbnail {
	padding: 0px;
}

.thumbnail.imageViewCadastro {
	overflow: hidden;
    width: 100%;
    height: 119px;
}

.thumbnail.imageUpLoad {
	overflow: hidden;
    width: 100%;
    height: 281px;
}

.thumbnail.imageUpLoad > img {
	margin: auto 0px;
}

.thumbnail.venda {
	padding: 5px;
	-webkit-box-shadow: 0 0 5px 1px rgba(0,0,0,0.3);
	box-shadow: 0 0 5px 1px rgba(0,0,0,0.3);
	cursor:pointer;
}

.indexImage {
	width: 100% !important;
	height: 168px !important;
	overflow: hidden;
	
	background-size: 100% auto !important;
	background-position: center middle !important;
	background-repeat: no-repeat !important;
	
}

.image-border-dashed {
	border:2px #96775A dashed;
}

.shaddow {
	-moz-box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.3);
	-webkit-box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.3);
	box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.3);
}

a , a:hover {
	text-decoration:none;
}

.shadow-image {
	box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
}

/* ALERT */
.alert.ng-hide-remove {
    -moz-transition: 3s linear all;
    -o-transition: 3s linear all;
    -webkit-transition: 3s linear all;
    transition: 3s linear all;
    
    display: block !important;
    opacity: 0;
}

/* LOGIN */

.form-signin{
	max-width: 330px;
	padding: 15px;
	margin: 30px auto;
	background: #eee;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

/* FOOTER */
.footer{
	background:#333;
	background-size: 100% auto;
	padding: 50px 0px 50px 0px;
	color: white;
	margin-top:0px;
}

.footer.programador{
	height: 650px;
	padding: 0px;
	color: white;
}

/* CONTAINER */
.container.page {
	background: transparent;
}

/* TEXT */
h2:before {
    content: "";
    display: inline-block;
    background: url("../images/simbolo/horse.png") no-repeat right;
    width: 50px;
    height: 50px;
}

