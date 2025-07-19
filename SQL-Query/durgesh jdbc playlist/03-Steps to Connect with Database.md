### Steps to Connect with Database
#### we download driver and set the class path
* Load the driver :
   - Class.forName("com.mysql.jdbc.Driver") // in a try catch method
   - DriverManager.registerDriver(new com.mysql.jdbc.Driver());
* create a connection :
  - connection con = DriverManager.getConnection("url","username","password");
  - connection con = DriverManager.getConnection("jdbc:mysql://loclhost`//127.0.0.1`:3306/world","root","Rahul@123");
* Create a query, Statement , preparedStatement , CallableStatement
  `eg`
 ```sql
      String q = "select * from students";
      Statement stmt = con.createStatement();
      Resultset set = stmt.executequery(q);
 ```
* Process the data :
  ```sql
  while(set.next()){
  int id = set.getInt("studentID");
  String name = set.getString("studentName");
  System.out.println(id);
  System.out.println(name);
  }
  ```
* Close the connection
  - con.close();
