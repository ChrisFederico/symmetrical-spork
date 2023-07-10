# Laravel test

## Prerequisiti

Assicurati di aver installato Docker sul tuo sistema prima di iniziare.

## Istruzioni

Segui i passaggi seguenti per eseguire il progetto utilizzando Docker:

1. Clona il repository del progetto sul tuo computer.

2. Naviga nella directory del progetto:

```
cd nome_progetto
```

3. Copia il file `.env.example` per creare il file `.env`:

4. Apri il file `.env` e configura le variabili di ambiente, inclusi i dettagli di connessione al database MySQL.

5. Esegui il comando seguente per avviare il container Docker:

```
docker-compose up -d
```

Questo comando avvierà il container Docker per l'applicazione Laravel e il container MySQL.

6. Una volta che i container sono in esecuzione, esegui i seguenti comandi per lanciare le migrations sul progetto e il seeder per popolare le tabelle

```
php artisan migrate
php artisan db:seed UsersSeeder
```

6.b. opzionalmente puoi lanciare una migrate:fresh per azzerare completamente i dati presenti nelle tabelle e rilanciare il seeder per un'installazione pulita:

```
php artisan migrate:fresh
php artisan db:seed UsersSeeder
```

Questo comando popolerà il database con un utente il cui username è root e la password è password.

7. Ora puoi accedere alla tua applicazione Laravel aprendo il browser e visitando:

http://localhost:8000/login

L'applicazione sarà accessibile all'indirizzo sopra indicato. Le credenziali, come detto in precendenza, sono le seguenti:
```
username: root
password: password
```

## Tests

Per lanciare i test è sufficiente digitare il comando:
```
php artisan test
```

## Arresto del container

Per fermare il container Docker, esegui il comando seguente:

```
docker-compose down
```

Questo comando fermerà e rimuoverà il container Docker per l'applicazione e il container MySQL.
