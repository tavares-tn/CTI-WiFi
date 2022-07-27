<?php
if (isset($_GET['ip'])) {
    if (ip2long($_GET['ip']) != FALSE) {
        //echo "/sbin/iptables -A PREROUTING -t nat -i eth0 -p tcp -m tcp --dport 9505 -s ".$_GET['ip']." -j DNAT --to-destination 192.168.1.252:9505";
        echo "IP liberado com Sucesso!<br/>";
        exec("/usr/bin/sudo /sbin/iptables -I FORWARD -s " . $_GET['ip'] . " -j LOG");
        exec("/usr/bin/sudo /sbin/iptables -I FORWARD -s " . $_GET['ip'] . " -j LOG");
    }
} else {
    echo "IP Inválido<br/>";
}
/**
  -A PREROUTING -s 189.27.187.232/32 -i eth0 -p tcp -m tcp --dport 9505 -j DNAT --to-destination 192.168.1.252:9505
  -A PREROUTING -s 189.27.187.232/32 -i eth0 -p tcp -m tcp --dport 22 -j DNAT --to-destination 192.168.1.252:22
  -A PREROUTING -s 189.27.187.232/32 -i eth0 -p tcp -m tcp --dport 3050 -j DNAT --to-destination 192.168.1.252:3050

 */
?>

<form name="sercon" method="get" action="<?php echo str_replace("dlgc/", "dlgc/#", $_SERVER['SCRIPT_NAME']); ?>">
    IP: 
    <input type="text" name="ip" /><br />
    <input type="submit" />
</form>
