## Inserting Image to DB using Java
* create table images
```
create table images(id int primary key auto_ ccreate table images(id int primary key auto_increment,pic blob);
```
* if image size is large then use this 
```
 ALTER TABLE images MODIFY pic LONGBLOB;
```

