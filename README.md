# eco_finance

===================

1. Clone project
    ```bash
    git clone git@github.com:ChernyavskyMikhail/eco_finance.git
    ```

2. Create `database.ini` file
    ```bash
    cp database.ini.dist database.ini
    ```
3. Set correct params


4. Create table
   ```sql
   create table sensor
   (
       id          serial,
       sensor_uuid integer not null,
       temperature double precision not null,
       created_at  timestamp not null
   );
   ```
