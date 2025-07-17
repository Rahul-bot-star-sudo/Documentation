### Insert data in a database
#### create query 
```sql
		String q = "create table table1(tId int(20) primary key auto_increment, tName varchar(200) not null, tCity varchar(400))";
```
#### execute query
```sql
stmt.executeUpdate(q);
		System.out.println("Table created in database");
```

### Sql Query
* show databases;
* use database_name;
* show tables;
* decs table_name;
* select * from table1;