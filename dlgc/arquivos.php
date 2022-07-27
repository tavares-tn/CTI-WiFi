<?php

$dir = "/var/squid_acl/";
$Livres = $dir . 'liberados/dominios/sites_liberados';
$LivresTmp = $dir . 'liberados/dominios/sites_liberadosTmp';

//Palavras liberadas
$PL_Livres = $dir . 'liberados/palavras/pl_liberados';
$PL_LivresTmp = $dir . 'liberados/palavras/pl_liberadosTmp';

//
$user_acesso_especial = $dir . 'users/liberados/acessoespecial';
$user_acesso_especialTmp = $dir . 'users/liberados/acessoespecialTmp';

$exp_acesso_especial = $dir . 'liberados/palavras/pl_liberados_acessoespecial';
$exp_acesso_especialTmp = $dir . 'liberados/palavras/pl_liberados_acessoespecialTmp';

//Sites sem senha
$s_senha = $dir . 'liberados/s_senha/s_senha';
$s_senhaTmp = $dir . 'liberados/s_senha/s_senhaTmp';
//
$palavra_s_senha = $dir . 'liberados/s_senha/pl_liberados';
$palavra_s_senhaTmp = $dir . 'liberados/s_senha/pl_liberadosTmp';


//Mac acesso Full
$mac = $dir . 'liberados/mac/mac';
$macTmp = $dir . 'liberados/mac/macTmp';

//IP acesso Full
$ip = $dir . 'liberados/ip/ip';
$ipTmp = $dir . 'liberados/ip/ipTmp';

//
// Inicio dos bloqueios
//
//Bloqueados - Dominios
$Bloqueados = $dir . 'bloqueados/dominios/sites_bloqueados';
$BloqueadosTmp = $dir . 'bloqueados/dominios/sites_bloqueadosTmp';

//Expressao bloqueadas
$PL_Bloqueadas = $dir . 'bloqueados/palavras/pl_bloqueadas';
$PL_BloqueadasTmp = $dir . 'bloqueados/palavras/pl_bloqueadasTmp';

//Extensões bloqueadas
$ext_Bloqueadas = $dir . 'bloqueados/extensoes/ext_bloqueadas';
$ext_BloqueadasTmp = $dir . 'bloqueados/extensoes/ext_bloqueadasTmp';





//
// Inicio default
//
//MAC default
$mac_default = $dir . 'default/mac/mac';
$mac_defaultTmp = $dir . 'default/mac/macTmp';

//IP default
$ip_default = $dir . 'default/ip/ip';
$ip_defaultTmp = $dir . 'default/ip/ipTmp';


//
// Inicio Usuarios
//
//system('sudo users/squid/service');
//Usuários com senhas
$usersquid = $dir . 'users/squid/usersquid';
$usersquidTmp = $dir . 'users/squid/usersquidTmp';

$userblo = $dir . 'users/bloqueados/bloqueados';
$userbloTmp = $dir . 'users/bloqueados/bloqueadosTmp';

$userdefault = $dir . 'users/default/default';
$userdefaultTmp = $dir . 'users/default/defaultTmp';

$userlivre = $dir . 'users/liberados/liberados';
$userlivreTmp = $dir . 'users/liberados/liberadosTmp';
?>