import java.sql.*;
class InserJDBC{
	public static void main (String[] args) {
		try{
			// Load the MySQL JDBC driver
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Create a connection
            String url = "jdbc:mysql://localhost:3306/world";
            String username = "root";
            String password = "Rahul@123";

            Connection con = DriverManager.getConnection(url, username, password);
	        //create query 
		String q = "create table table1(tId int(20) primary key auto_increment, tName varchar(200) not null, tCity varchar(400))";
		//  String q = "create table table1(tId int(20) primary key auto_increment, tName varchar(200) not null, tCity varchar(400))";

		/*String q="create table table1("
                     + "tId int(20) primary key auto_increment, "
                     + "tName varchar(200) not null, "
                     + "tCity varchar(400))";*/
		//create a statement
		Statement stmt = con.createStatement();

		stmt.executeUpdate(q);
		System.out.println("Table created in database");
		
		con.close();

		}catch(Exception e){
			e.printStackTrace();
		}
	}
}
/*
import java.sql.*;

public class InsertJDBC {
    public static void main(String[] args) {
        try {
            // Load MySQL driver
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Connection
            String url = "jdbc:mysql://localhost:3306/world";
            String user = "root";
            String password = "Rahul@123";
            Connection con = DriverManager.getConnection(url, user, password);

            // SQL query
            String q = "create table table1("
                     + "tId int(20) primary key auto_increment, "
                     + "tName varchar(200) not null, "
                     + "tCity varchar(400))";

            // Create Statement
            Statement stmt = con.createStatement();
            stmt.executeUpdate(q);
            System.out.println("Table created successfully");

            con.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
*/
