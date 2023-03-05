IC group zadání

Dokummentace

index.php : hlavní stránka pro vyhledávání výsledků přes API
wordcloud.php : stránka pro primitivní verzi wordcloudu
OMDb_inc.php : soubor který si nabere data přes FORM a vrátí data o vyhledávání
searchinfo_class: tato classa funguje jako controller pro OMDb vyhledávání. Inherituje sHistory_class
sHistory_class: obsahuje funkce pro čtení a úpravu dat do DB(statistika). Inherituje dbh_class
dbh_class: je to handler pro DB. Nachází se v ní přístup a přístupové údaje do DB.
testpage.css : jednoduchý CSS pro stránky
searchhistory.sql : obsahuje SQL příkaz pro MySQL DB v které se udržuje statistika vyhledávání

workflow vyhledávání: 	index.php -> OMDb_inc.php -> searchinfo_class -> OMDb_inc.php -> index.php
				wordcloud.php -> sHistory_class -> wordcloud.php

DB přístup :
			$username = "root";
			$password = "";
			$dbh = new PDO('mysql:host=localhost;dbname=icpage', $username, $password);

struktura DB
ID(int primary key auto_increment)
dotaz(varchar)					-daný dotaz na film, serial ....
pocet_dotaz(int)					-počet dotazů
