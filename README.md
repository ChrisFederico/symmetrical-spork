# Progetto Laravel con Docker

Questo è un progetto Laravel configurato per essere eseguito utilizzando Docker. Utilizzando Docker, puoi creare un ambiente isolato per eseguire l'applicazione Laravel insieme a un container MySQL.

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

6. Una volta che i container sono in esecuzione, esegui il seguente comando per eseguire il seeder del database:

```
php artisan db:seed UsersSeeder
```

Questo comando popolerà il database con dati di esempio utilizzando il seeder.

7. Ora puoi accedere alla tua applicazione Laravel aprendo il browser e visitando:

http://localhost:8000

L'applicazione sarà accessibile all'indirizzo sopra indicato.

## Arresto del container

Per fermare il container Docker, esegui il comando seguente:

```
docker-compose up -d
```

Questo comando fermerà e rimuoverà il container Docker per l'applicazione e il container MySQL.
