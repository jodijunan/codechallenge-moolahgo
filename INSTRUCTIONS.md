## Installation:
1. Do *git@github.com:homiedopie/codechallenge-moolahgo.git*
2. Run *composer update* if you want to update dependencies or *composer install* if you want to follow whats on the lock file
3. Run *npm install* or *npm install --no-bin-links* for Windows Host OS
4. Run *npm run build* or *npm run watch* to compile the assets or watch (in case you have changes)
5. Point Virtual Host to `public` folder as the entrypoint is there

## Usage
1. Run *cd public && php -S 127.0.0.1:8000*
2. Open browser and access *http://127.0.0.1:8000*
3. Try to add records and observe

## Use with database
- Currently supported strategy is SQLite3 for model
- Required Extensions: `pdo` `pdo_sqlite` `sqlite3`
- To migrate
  1. Add permissions to `storage` folder `chmod -R 777 storage`
  2. Run <site>/migrate/record/up to migrate (create table)
  3. Run <site>/migrate/record/down to rollback (drop table)

Note: Returns 500 whenever there is no table set
- Get records DB link -> GET /ajax/getRecordsDB
- Add record DB Link -> POST /ajax/addRecordDB

## Online Demo
- `http://moolahgo.preshyow.com/`