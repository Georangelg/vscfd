<?php
//echo phpinfo();
$database = "CFDICGV";        # Get these database details from
$hostname = "localhost";  # the web console
$user     = "db2admin";   #
$password = "root";   #
$port     = 50000;          #
//$ssl_port = 50001;          #


$database_g = "SAMPLE";        # Get these database details from
$hostname_g = "localhost";  # the web console
$user_g     = "db2admin";   #
$password_g = "root";   #
$port_g     = 50000;          #
//$ssl_port = 50001;          #

# Build the connection string
#
$driver  = "DRIVER={IBM DB2 ODBC DRIVER};";
$dsn     = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;";
$dsn_g     = "DATABASE=$database_g; " .
           "HOSTNAME=$hostname_g;" .
           "PORT=$port_g; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user_g;" .
           "PWD=$password_g;";
$ssl_dsn = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$ssl_port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;" .
           "SECURITY=SSL;";
$conn_string = $driver . $dsn;     # Non-SSL
//$conn_string = $driver . $ssl_dsn; # SSL
$conn_string = $driver . $dsn_g;     # Non-SSL
# Connect
#
$conn = odbc_connect( $conn_string, "", "" );
if( $conn )
{
    echo "Connection succeeded.";
    //print_r ($conn_string);
    # Disconnect
    #
    odbc_close( $conn );
}
else
{
    echo "Connection failed.";
}


$sql = "SELECT * FROM  ORDER BY breed";
$stmt = db2_prepare($conn, $sql);
$result = db2_execute($stmt);

while ($row = db2_fetch_array($stmt)) {
    printf ("%-5d %-16s %-32s %10s\n", 
        $row[0], $row[1], $row[2], $row[3]);
}
?>