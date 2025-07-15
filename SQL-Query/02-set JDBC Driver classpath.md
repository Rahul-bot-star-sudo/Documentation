### How to set JDBC Driver classpath
```summary
today we install jdk
install database like sql
set class_path in command prompt
Download mysql-connector
```
---
---
**Download java vertion**
* Database intall : Oracle, MySql DB , DB2 etc
* Download Mysql letest version
* start mysql
  ```SQL
  mysql -u root -p
  password : Rahul@123
  ```
**use command for show Databases**
```sql
show databases;
```
---
### Download mysql-connector:
"C:\mysql-connector-j-8.0.33.jar"
---
###Add class path in command prompt
```
name : class_path
path : C:\mysql-connector-j-8.0.33.jar,.;
```
**see our driver path is set or not**
```try this comman
C:\Users\rahul>javap -classpath "C:\mysql-connector-j-8.0.33.jar" com.mysql.cj.jdbc.Driver
Compiled from "Driver.java"
public class com.mysql.cj.jdbc.Driver extends com.mysql.cj.jdbc.NonRegisteringDriver implements java.sql.Driver {
  public com.mysql.cj.jdbc.Driver() throws java.sql.SQLException;
  static {};
}
```


