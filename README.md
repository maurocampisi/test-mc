

## Info

Per eseguire il test ho installato l' ultima versione di Laravel (8.40.0) ed ho aggiunto il pacchetto laravel/passport per sfruttare l' autenticazione di tipo OAuth2. Per l' interfaccia ho utilizzato VueJS in modalità SPA sfruttando axios per l' autenticazione e le chiamate API.

## Istruzione installazione

- Scaricare i sorgenti:
```
git clone https://github.com/maurocampisi/test-mc.git
```
- rinominare il file .env.example in .env e modificare i parametri di APP_URL, MIX_PATH (path relativa) e parametri del MYSQL (DB_CONNECTION, DB_HOST, ecc ..)

esempio:

> APP_URL=http://192.168.0.19/test-mc/public
>
> MIX_PATH="/test-mc/public/"

- entrare nel folder ed eseguire i seguenti comandi:

```
npm install
composer update

php artisan migrate
php artisan passport:install
php artisan key:generate

chown -R www-data.www-data storage
npm run dev
```
- aprire sul browser la root del sito ed accedere utilizzando username: **root**  password: **password** 
