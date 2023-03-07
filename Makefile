init-db:
	docker exec -i emi-website-oop_db_1 mysql -u admin -ppass < /data/application/init.sql