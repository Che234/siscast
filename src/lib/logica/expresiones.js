var er_areas = /^[A-Z\a-z\À-ÿ\s+\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\,\-\:]{3,70}$/;
var ex_cedula = /^[0-9\.\a-z\A-Z\s+\-\,\:]{6,89}$/;
var ex_nac = /^[a-z\À-ÿ\A-z\\u00f1\\u00d1]{1,2}$/;
var ex_datcort= /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,70}$/;
var ex_Telefono = /^[0-9\a-z\A-Z\(\)]{2,7}$/;
var ex_Telef= /^[0-9\a-z\A-Z\(\s+\)]{7}$/;
var ex_rif = /^[0-9\.\a-z\A-Z\s+\-]{6,125}$/;
var er_cont= /^[0-9\a-z\A-Z\À-ÿ\\u00f1\\u00d1]{5,97}$/;
var ex_datos= /^[A-Z\À-ÿ\s+\a-z\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1]{3,65}$/;
var ex_carnet=/^[0-9\-\.\A-Z\s+]{1,19}$/;
var ex_telef=/^[0-9\-]{2,18}$/;
var ex_trayec=/^[0-9\À-ÿ\s+\.\,\:\-\a-z\A-Z\\u00f1\\u00d1]{1,35}$/;
var ex_fecha=/^[0-11\-\.\/]{2,55}$/;
var ex_user = /^[0-9\À-ÿ\A-Z\a-z\\u00f1\\u00d1\*\_\@\$\%\&\/]{4,8}$/
var ex_pass = /^[0-9\À-ÿ\a-z\A-Z\\u00f1\\u00d1\*\_\@\$\%\&\/]{6,15}$/
var ex_correo= /^[a-zÀ-ÿA-Z0-9_\\u00f1\\u00d1]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}$/;
var ex_money = /^[0-9\.\,\a-z\A-Z]{1,15}$/
var ex_num = /^[0-9\-\.\/]{1,20}$/
var ex_date = /^[0-12]{4}[-]{1}[0-12]{2}[-]{1}[0-31]{2}$/
var expediente = /^[0-9\.\,\-\:]{1,10}$/
var niveles = /^[0-9\.\-\A-Z\,\a-z\A-Z]{2,22}$/


//VALIDACIONES ESPECIALES LOTE DE TERRENO PROPIO Y SOBRE EL CONSTRUIDO UNA EDIFICACIÓN DE 3 NSOBRE EL CONSTRUIDO UNA EDIFICACIÓN1524
//1.350-2.007 L.R.P
var dirInmue = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,130}$/;
var nivConst = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,15}$/;
var obsInmue = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,68}$/;
var alindInmue = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,108}$/;
var protDirec = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,39}$/;
var numProt = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,17}$/;
var tomProt =/^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,17}$/;
var folioProt = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,13}$/;
var valorInmue = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,13}$/;
var cedPropie = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,70}$/;
var nombre = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,70}$/;
var direcprop = /^[A-Z\À-ÿ\a-z\s+\,\0-9\\u00f1\\u00d1\\u00C1\\u00E1\\u00C9\\u00E9\\u00CD\\u00ED\\u00D3\\u00F3\\u00DA\\u00FA\\u00DC\\u00FC\\u00D1\\u00F1\.\-\/\:\°]{1,66}$/;


//VALIDACIONES ESPECIALES LOTE DE TERRENO PROPIO Y SOBRE EL CONSTRUI