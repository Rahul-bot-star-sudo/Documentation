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
* delet from col_name;
* mysql> SELECT id, LENGTH(pic) AS size_in_bytes FROM images;
```
+----+---------------+
| id | size_in_bytes |
+----+---------------+
|  2 |        601291 |
|  3 |        615124 |
+----+---------------+
```

### take data from the user usin BufferedReader

**first you import the file**
```
import java.io.*;
```
#### take input from the user

```sql
            BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
            System.out.println("Enter your name : ");
            String name = br.readLine();
			System.out.println("Enter your city :");
			String city = br.readLine();
```