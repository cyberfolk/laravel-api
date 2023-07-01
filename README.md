# Portfolio API

**Initial commit**: 05/06/23

**Tecnologie:** Laravel, Breeze , PHP, Blade, MySql, Javascript, HTML, CSS e Bootstrap.

⚙️ Ed ecco a voi la Dashboard-API del mio portfolio progetti, uno degli ultimI lavori fatti per boolen

Si tratta di una piattaforma back-end per raccogliere i dati dei miei progetti. Interagisce direttamente con un database sql gestendo i dati tramite operazioni CRUD. Con l'utilizzo del API/ProjectController potrà rispondere alle chiamate API restituendo i dati in formato json. Ci sono tante altre funzionalità interessanti come l'autenticazione tramite breeze, la capacità di gestire email appaggioandosi alla risorsa esterne mailtrap, e la possibilità di mettere un tag e la lista delle tecnologie ai singoli progetti utilizzando relazioni many-tomany e one-to-many.

🔗 Repository:
https://github.com/cyberfolk/laravel-api

## Descrizione:

-   Usare laravel breeze ed il pacchetto Laravel 9 Preset con autenticazione.
-   Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
-   **Autenticazione**: si parte con l'autenticazione e la creazione di un layout per back-office
-   Creazione del modello `Project` con relativa `migrazione`, `seeder`, `controller` e `rotte`
-   Per la parte di back-office creiamo un resource controller `Admin\ProjectController` per gestire tutte le operazioni CRUD dei progetti
-   Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando due form requests.
-   Layout admin con bootstrap

## One-to-many

Aggiungere una nuova entità `Type`, questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.
I task da svolgere sono diversi:

-   Creare la migration per la tabella types
-   Creare il model Type
-   Creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
-   Aggiungere ai model Type e Project i metodi per definire la relazione one to many
-   Visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
-   Permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
-   Gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
-   creare il seeder per il model Type.
-   aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.

## Many-to-many

Aggiungiamo una nuova entità `Technology`, questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.
I task da svolgere sono i medesimi del punto precedente.

## File Storage

Creare il symlink con l’apposito comando artisan `php artisan storage:link` e di aggiungere l’attributo `enctype="multipart/form-data"` ai form di creazione e di modifica, oltre a modificare il file `filesystems.php` e il` .env` per l'uso del disco public

## API

Aggiunngere un nuovo controller `API/ProjectController`, questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.

## Add mail in DB

## TODO-LIST

-   Fix validator e migration
-   Quando creo un nuovo progetto e mando in validazione una data inferiore a 01-01-1900, quando il formi si refresha per farmi cambiare data, anche se metto una data corretta mi prende la data precedente (quella sbagliata) e non mi valida più il form
-   non inserire date maggiori del giorno corrente
-   Ci sono problemi quando carico manualmente un immagine, devo accertamenti sui campi se ho messo tutti i vari controlli nel caso fossero nulli.

## ProjectSeeder Fix

Si potrebbe verificare un errore con la generazione delle immagini fake nel seeder.
Per risolverla occorre modificare il file [image.php](vendor\fakerphp\faker\src\Faker\Provider\Image.php) dentro il modulo vendor di `faker` come indicato [qui](https://stackoverflow.com/questions/67415815/images-from-phpfaker-got-deleted-when-stored-in-storage-app-public-news-folder) e [qui](https://laracasts.com/discuss/channels/laravel/using-faker-to-fake-images-always-returns-false)

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
