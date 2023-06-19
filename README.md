# laravel-api

## TODO-LIST

-   Fix validator e migration
-   Quando creo un nuovo progetto e mando in validazione una data inferiore a 01-01-1900, quando il formi si refresha per farmi cambiare data, anche se metto una data corretta mi prende la data precedente (quella sbagliata) e non mi valida più il form
-   non inserire date maggiori del giorno corrente
-   Ci sono problemi quando carico manualmente un immagine, devo accertamenti sui campi se ho messo tutti i vari controlli nel caso fossero null8i.

## ProjectSeeder Fix

Si potrebbe verificare un errore con la generazione delle immagini fake nel seeder.
Per risolverla occorre modificare il file `image.php` dentro il modulo vendor di `faker` come indicato [qui](https://stackoverflow.com/questions/67415815/images-from-phpfaker-got-deleted-when-stored-in-storage-app-public-news-folder) e [qui](https://laracasts.com/discuss/channels/laravel/using-faker-to-fake-images-always-returns-false)

Link al file da modificare:

```bash
vendor\fakerphp\faker\src\Faker\Provider\Image.php
```

```php
curl_setopt($ch, CURLOPT_FILE, $fp); //existing line
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//new line
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//new line
$success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200; //existing line
```
