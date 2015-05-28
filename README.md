# Xovilichter Dynapso Scraper 1.1 fürs Keyword Monitoring

Der Xovilichter Dynapso Scraper fragt die aktuellen Keyword Platzierungen der Dynapso Contest Seite ab und gibt diese als Array zurück. Ambitionierte SEOs haben so die Möglichkeit ihre eigene Seite und die Xovilichter Konkurrenz Seiten immer im Blick zu behalten ohne ein eigenes [Keyword Monitoring](http://www.keywordmonitoring.de/) zu betreiben.

Das Xovilichter SEO Gewinnspiel von [Xovi](https://github.com/xovilichter/xovi) läuft noch bis zum 19. Juli 2014. Bis dahin werden noch einige Erweiterungen am Scraper folgen. Mehr Informationen gibt es bei [Xovi](http://www.keywordmonitoring.de/tools/xovi/).

## Test

Zum Testen der Funktion kann die test.php Datei aufgerufen werden

```no-highlight
php test.php > test_array.txt
```

## Benutzung

Zur Benutzung kann die Funktion in ein vorhandenes Script geladen und über den Funktionsnamen xovilichter_dynapso_scraper() aufgerufen werden.

```php
<?php 

include('xovilichter_dynapso_scraper.php');
$search_results = xovilichter_dynapso_scraper();
print_r($search_results);
```

## Array Ausgabe

```no-highlight
Array
(
    [last_update] => 2014-05-21 18:15
    [search_results] => Array
        (
            [0] => Array
                (
                    [position] => 1
                    [url] => http://www.xovi.de/xovilichter/
                    [type] => organic
                    [google_plus] => Array
                        (
                        )

                )

            [1] => Array
                (
                    [position] => 2
                    [url] => http://www.habbo.cx/xovilichter
                    [type] => organic
                    [google_plus] => Array
                        (
                        )

                )

            [2] => Array
                (
                    [position] => 3
                    [url] => http://www.dynapso.de/xovilichter/
                    [type] => organic
                    [google_plus] => Array
                        (
                        )

                )

            [3] => Array
                (
                    [position] => 4
                    [url] => http://ronny-marx.de/xovilichter/
                    [type] => organic
                    [google_plus] => Array
                        (
                        )

                )

            [4] => Array
                (
                    [position] => 5
                    [url] => http://www.xovilichter-smx.de/
                    [type] => organic
                    [google_plus] => Array
                        (
                        )

                )

            [5] => Array
                (
                    [position] => 6
                    [url] => http://aus.gerech.net/xovilichter/
                    [type] => organic
                    [google_plus] => Array
                        (
                        )

                )

            ...

        )

)
```
