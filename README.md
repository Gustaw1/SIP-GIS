# SIP-GIS
A Student Project

System na tle Google maps pokazuje zbiór stacji benzynowych na terenie Gdańska. 

•	W bazie danych MySQL przechowywane są dane tych punktów. Łączna ilość przechowywanych punktów ze stacjami jest rzędu 20 sztuk. W każdym rekordzie przechowywane są dane zawierające współrzędne geograficzne, nazwę sieci stacji oraz aktualną cenę paliwa.
•	System posiada dwa adresy strony:
1)	Publiczny (index.html)
2)	Prywatny (index.php) 

W pkt. 1 Dostępna jest mapa na której zaznaczone są wszystkie stacje benzynowe dodane do bazy danych MySQL. Brak możliwości edycji danych.

W pkt2. Jest panel administracyjny do którego jest konieczność zalogowania. Jest w nim możliwość dodawania, edytowania i usuwania istniejących danych zarówno w panelu, jak i bezpośrednio na mapie.


Funkcjonalność: 
1.	Z poziomu użytkownika możliwość dodawania  nowych oraz edytowania i usuwania istniejących punktów na mapie
1a. wpisywanie ręczne w panelu administracyjnym
1b. dodawanie, edycja i usuwanie poprzez kliknięcie na mapę
2.	Wyszukiwanie stacji po różnych kryteriach
2a. znajdowanie stacji o najniższej cenie paliwa
3.	Wyznaczanie trasy
3a. znajdowanie najkrótszej trasy pomiędzy zadeklarowanymi punktami


Wykorzystane technologie:
*	HTML5, CSS3
*	PHP
*	MySQL
* JavaScript

HTML i CSS3 - wykorzystany do stworzenia graficznej części serwisu.

PHP - wykorzystany do skryptów związanych z przesyłaniem danych (logowanie, weryfikowanie danych oraz do dodawania, edycji i usuwania nowych rekordów w bazie danych)

MySQL – baza danych współgra z PHP i JavaScript

JavaScript – wykorzystany do wyświetlania mapy i interakcji z użytkownikiem

