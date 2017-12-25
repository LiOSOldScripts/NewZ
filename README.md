## New-Z
Eines meiner ersten Scripte, welche im Laufe des Jahres 2013 entstanden sind. Sehr rudimentär und leider auch sehr einfach. 
Nutzt zum Teil noch mysql_, nicht mysqli_. 

Es ist ein sehr einfaches Blogging-Script, die alte readme.txt gibt es unten :)


Installationsanleitung: New-Z

1. Upload der im Ordner "upload" befindlichen Dateien
2. Anpassen der config.php - Hier entsprechend der Variablen den Content angeben. Also bei $host -> Host, bei $user den MySQL-User, bei $passwrd das MySQL-Passwort und bei $db die MySQL-Datennbank angeben
3. Angepasste config.php hochlade
4. Importieren der cms_newz.sql aus dem Ordner "sql" in die Datenbank mithilfe eines Datenbanktools (phpMyAdmin wird empfohlen)
5. Einloggen unter URL/administrator. Anfangslogindetails: Username: demo, Passwort: demo